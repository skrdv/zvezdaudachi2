<?php
drupal_add_js('http://vk.com/js/api/share.js');
drupal_add_js('http://userapi.com/js/api/openapi.js');

// remove a tag from the head for Drupal 7
function zvezdaudachi2_html_head_alter(&$head_elements) {
  unset($head_elements['system_meta_generator']);
}

function zvezdaudachi2_menu_tree($variables) {

    if (isset($variables['element']) AND in_array($variables['element']['#original_link']['menu_name'],array('menu-school-menu','menu-student-menu'))){
        return '<ul class="list-unstyled">' . $variables['tree'] . '</ul>';
    }else{
        return bootstrap_menu_tree($variables);
    }
}
function zvezdaudachi2_menu_link($variables)
{
    if (in_array($variables['element']['#original_link']['menu_name'],array('menu-school-menu','menu-student-menu'))){
        $element = $variables['element'];
        $sub_menu = '';
        if ($element['#below']) {
            $sub_menu = drupal_render($element['#below']);
            $sub_menu = '<div class="submenu">' . $sub_menu . '<div class="clearfix"></div></div>';
        }
        $output = l($element['#title'], $element['#href']);
        return '<li>' . $output . $sub_menu . "</li>\n";
    }else{
        return bootstrap_menu_link($variables);
    }
}

function zvezdaudachi2_textfield($variables){
    $element = $variables['element'];
    $element['#attributes']['type'] = 'text';
    element_set_attributes($element, array(
        'id',
        'name',
        'value',
        'size',
        'maxlength',
    ));
    _form_set_class($element, array('form-text'));

    $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

    $extra = '';
    if ($element['#autocomplete_path'] && drupal_valid_path($element['#autocomplete_path'])) {
        drupal_add_library('system', 'drupal.autocomplete');
        $element['#attributes']['class'][] = 'form-autocomplete';
        $attributes = array();
        $attributes['type'] = 'hidden';
        $attributes['id'] = $element['#attributes']['id'] . '-autocomplete';
        $attributes['value'] = url($element['#autocomplete_path'], array('absolute' => TRUE));
        $attributes['disabled'] = 'disabled';
        $attributes['class'][] = 'autocomplete';
        $output = '<div class="input-group">' . $output . '</div>';
        $extra = '<input' . drupal_attributes($attributes) . ' />';
    }
    return $output . $extra;
}


function zvezdaudachi2_theme(&$existing, $type, $theme, $path) {

    $items=array();
    $items['user_login'] = array(
        'template' => 'templates/user-login',
        'render element' => 'form'
    );

    return $items;
}
function zvezdaudachi2_preprocess_user_login(&$variables) {
    $variables['rendered'] = drupal_render_children($variables['form']);
}

function zvezdaudachi2_field_widget_form_alter(&$element, &$form_state, $context){
    if(isset($element[0]['#field_name']) && isset($element[0]['#type']) && $element[0]['#type']=='media' && preg_match('/zagruzka_[a-z0-9]+_etap/i',$element[0]['#field_name'])){
        $element['#file_upload_title']='Работа может быть загружена с компьютера, принимаются ссылки с сайтов Youtube.com  и VK.com';
    }
}
function zvezdaudachi2_element_info_alter(&$type) {
    if (isset($type['text_format']['#process'])){
        foreach ($type['text_format']['#process'] as &$callback) {
            if ($callback === 'filter_process_format') {
                $callback = 'zvezdaudachi2_process_format';
            }
        }
    }
}
function zvezdaudachi2_process_format($element) {
    $fields = array(
        'field__vkontakte'
    );
    $element = filter_process_format($element);
    if (isset($element['#field_name']) && in_array($element['#field_name'], $fields)){
        $element['format']['#access'] = FALSE;
    }
    return $element;
}

function zvezdaudachi2_webform_date($variables) {
    $element = $variables['element'];

    //Save the data from the array into variables.
    $day = $element['day'];
    $month = $element['month'];
    $year = $element['year'];

    //Remove these keys from the array.
    unset($element['day']);
    unset($element['month']);
    unset($element['year']);

    //Re-add the data to the array in the correct order.
    $element['day'] = $day;
    $element['month'] = $month;
    $element['year'] = $year;

    $element['year']['#attributes']['class'] = array('year form-control');
    $element['month']['#attributes']['class'] = array('month form-control');
    $element['day']['#attributes']['class'] = array('day form-control');

    // Add error classes to all items within the element.
    if (form_get_error($element)) {
        $element['year']['#attributes']['class'][] = 'error';
        $element['month']['#attributes']['class'][] = 'error';
        $element['day']['#attributes']['class'][] = 'error';
    }

    $class = array('webform-container-inline');

    // Add the JavaScript calendar if available (provided by Date module package).
    if (!empty($element['#datepicker'])) {
        $class[] = 'webform-datepicker';
        $calendar_class = array('webform-calendar');
        if ($element['#start_date']) {
            $calendar_class[] = 'webform-calendar-start-' . $element['#start_date'];
        }
        if ($element['#end_date']) {
            $calendar_class[] = 'webform-calendar-end-' . $element['#end_date'];
        }
        $calendar_class[] ='webform-calendar-day-' . variable_get('date_first_day', 0);

        $calendar = theme('webform_calendar', array('component' => $element['#webform_component'], 'calendar_classes' => $calendar_class));
    }
    $output = '';
    $output .= '<div class="' . implode(' ', $class) . '">';
    $output .= drupal_render_children($element);
    $output .= isset($calendar) ? $calendar : '';
    $output .= '</div>';

    return $output;
}
function zvezdaudachi2_process_page(&$vars, $hooks)
{
    global $user;
    if (isset($vars['tabs']['#primary']) && is_array($vars['tabs']['#primary']) && sizeof($vars['tabs']['#primary'])) {
        foreach ($vars['tabs']['#primary'] as $key => $tab) {
            if($vars['tabs']['#primary'][$key]['#link']['path']=='messages/list'){
                unset($vars['tabs']['#primary'][$key]);
            }
            if ($tab['#link']['page_callback'] == 'likebtn_likes_page') {
                unset($vars['tabs']['#primary'][$key]);
            }
        }
    }
    //индекс пункта меню для текущей сраницы
    $currentMlId = db_select('menu_links', 'ml')
        ->condition('ml.link_path', $_GET['q'])
        ->fields('ml', array('mlid'))
        ->execute()
        ->fetchField();



    $node_type=null;
    $vars['pageIndexMainMenuFirstLevel']=1;
    switch($node_type){
        case 'news':
            $vars['pageIndexMainMenuFirstLevel']=5;
        break;
        default:
            $index=1;
            $is_found=false;
            if(!drupal_is_front_page() && isset($vars['page']['navigation']['system_main-menu'])){
                foreach ($vars['page']['navigation']['system_main-menu'] as $mlIdFirstLevel => $menuItemFirstLevel){
                    if (!is_array($menuItemFirstLevel)) break;
                    if ($mlIdFirstLevel != $currentMlId) {
                        $isHaveInChild=false;
                        //может есть в потомках?
                        if (isset($menuItemFirstLevel['#below']) && !empty($menuItemFirstLevel['#below']) && is_array($menuItemFirstLevel['#below'])) {
                            foreach($menuItemFirstLevel['#below'] as $mlIdSecondLevel=>$menuItemSecondLevel){
                                if($mlIdSecondLevel==$currentMlId){
                                    $isHaveInChild=true;
                                }
                            }
                        }
                        if($isHaveInChild){
                            $is_found=true;
                            break;
                        }
                        $index++;
                    } else {
                        $is_found=true;
                        break;
                    }
                }
            }
            $vars['pageIndexMainMenuFirstLevel']=($is_found)?$index:1;
        break;
    }
}

function zvezdaudachi2_webform_number($variables){
    $variables['element']['#attributes'] = array('class' => array('form-control'));
    return theme_webform_number($variables);
}
function zvezdaudachi2_webform_email($variables){
    $variables['element']['#attributes'] = array('class' => array('form-control'));
    return theme_webform_number($variables);
}
function zvezdaudachi2_pager($variables) {
    $output = "";
    $items = array();
    $tags = $variables['tags'];
    $element = $variables['element'];
    $parameters = $variables['parameters'];
    $quantity = $variables['quantity'];

    global $pager_page_array, $pager_total;

    // Calculate various markers within this pager piece:
    // Middle is used to "center" pages around the current page.
    $pager_middle = ceil($quantity / 2);
    // Current is the page we are currently paged to.
    $pager_current = $pager_page_array[$element] + 1;
    // First is the first page listed by this pager piece (re quantity).
    $pager_first = $pager_current - $pager_middle + 1;
    // Last is the last page listed by this pager piece (re quantity).
    $pager_last = $pager_current + $quantity - $pager_middle;
    // Max is the maximum page number.
    $pager_max = $pager_total[$element];

    // Prepare for generation loop.
    $i = $pager_first;
    if ($pager_last > $pager_max) {
        // Adjust "center" if at end of query.
        $i = $i + ($pager_max - $pager_last);
        $pager_last = $pager_max;
    }
    if ($i <= 0) {
        // Adjust "center" if at start of query.
        $pager_last = $pager_last + (1 - $i);
        $i = 1;
    }

    // End of generation loop preparation.
    // @todo add theme setting for this.
    $li_first = theme('pager_first', array(
        'text' => (isset($tags[0]) ? $tags[0] : t('first')),
        'element' => $element,
        'parameters' => $parameters,
    ));
    $li_previous = theme('pager_previous', array(
        'text' => (isset($tags[1]) ? $tags[1] : t('previous')),
        'element' => $element,
        'interval' => 1,
        'parameters' => $parameters,
    ));
    $li_next = theme('pager_next', array(
        'text' => (isset($tags[3]) ? $tags[3] : t('next')),
        'element' => $element,
        'interval' => 1,
        'parameters' => $parameters,
    ));
    // @todo add theme setting for this.
    $li_last = theme('pager_last', array(
        'text' => (isset($tags[4]) ? $tags[4] : t('last')),
        'element' => $element,
        'parameters' => $parameters,
    ));
    if ($pager_total[$element] > 1) {
        // @todo add theme setting for this.
        if ($li_first) {
            $items[] = array(
                'class' => array('pager-first'),
                'data' => $li_first,
            );
        }
        if ($li_previous) {
            $items[] = array(
                'class' => array('prev'),
                'data' => $li_previous,
            );
        }
        // When there is more than one page, create the pager list.
        if ($i != $pager_max) {
            if ($i > 1) {
                $items[] = array(
                    'class' => array('pager-ellipsis', 'disabled'),
                    'data' => '<span>…</span>',
                );
            }
            // Now generate the actual pager piece.
            for (; $i <= $pager_last && $i <= $pager_max; $i++) {
                if ($i < $pager_current) {
                    $items[] = array(
                        // 'class' => array('pager-item'),
                        'data' => theme('pager_previous', array(
                            'text' => $i,
                            'element' => $element,
                            'interval' => ($pager_current - $i),
                            'parameters' => $parameters,
                        )),
                    );
                }
                if ($i == $pager_current) {
                    $items[] = array(
                        // Add the active class.
                        'class' => array('active'),
                        'data' => l($i, '#', array('fragment' => '', 'external' => TRUE)),
                    );
                }
                if ($i > $pager_current) {
                    $items[] = array(
                        'data' => theme('pager_next', array(
                            'text' => $i,
                            'element' => $element,
                            'interval' => ($i - $pager_current),
                            'parameters' => $parameters,
                        )),
                    );
                }
            }
            if ($i < $pager_max) {
                $items[] = array(
                    'class' => array('pager-ellipsis', 'disabled'),
                    'data' => '<span>…</span>',
                );
            }
        }
        // End generation.
        if ($li_next) {
            $items[] = array(
                'class' => array('next'),
                'data' => $li_next,
            );
        }
        // @todo add theme setting for this.
        if ($li_last) {
            $items[] = array(
                'class' => array('pager-last'),
                'data' => $li_last,
            );
        }
        return '<div class="text-center">' . theme('item_list', array(
            'items' => $items,
            'attributes' => array('class' => array('pagination')),
        )) . '</div>';
    }
    return $output;
}

function zvezdaudachi2_form_alter(&$form,&$form_state,$form_id){



    if (drupal_multilingual()) {
        if ($form_id == 'user_register_form' || ($form_id == 'user_profile_form' && $form['#user_category'] == 'account')) {
            if (count(element_children($form['locale'])) > 1) {
                $form['locale']['language']['#access'] = FALSE;
            }
            else {
                $form['locale']['#access'] = FALSE;
            }
        }
    }
    if(in_array($form_id,array('konkurs_school_node_form','konkurs_student_node_form'))){
        $form['#attributes']['class'][]='form-konkurs';
    }

}
function zvezdaudachi2_username_alter(&$name, $account){
    $profile= null;
    if(!$profile = profile2_load_by_user($account->uid, 'student')){
        $profile= profile2_load_by_user($account->uid, 'school');
    }

    if($profile){
        $profileData = entity_metadata_wrapper('profile2', $profile->pid);
        if($profile->type =='student'){
            $name = $profileData->field_familiya3->value() . ' ' . $profileData->field_name3->value();
        }else{
            if ($profileData->field_odinilikol3->value() == 'Коллектив') {
                $name = $profileData->field_nazvanie3->value();
            } else {
                $name = $profileData->field_familiya3->value() . ' ' . $profileData->field_name3->value();
            }
        }
    }
}
function zvezdaudachi2_form_user_register_form_alter(&$form,&$form_state){


    if(arg(2)){
        $form["#submit"][] ='profile2_form_submit_handler';
        foreach (profile2_get_types() as $type_name => $profile_type) {
            if($type_name==arg(2)){
                if (empty($form_state['profiles'][$type_name])) {
                    $form_state['profiles'][$type_name] = profile2_create(array('type' => $type_name));
                }
                profile2_attach_form($form, $form_state);
                // Wrap each profile form in a fieldset.
                $form['profile_' . $type_name] += array(
                    '#type' => 'fieldset',
                    '#title' => check_plain($profile_type->getTranslation('label')),
                );
            }
        }
    }
}

function zvezdaudachi2_preprocess_html(&$vars, $hook){
    if( current_path() == 'user/register' ){
        drupal_goto('content/register');
    }
    $vars['THEMEPATH']='/sites/all/themes/zvezdaudachi2';
}

function zvezdaudachi2_get_add_konkurs_link(){
    global $user;
    $url = null;
    if($user){
        if(in_array(3,array_keys($user->roles))
            || in_array(4,array_keys($user->roles))
            || in_array(5,array_keys($user->roles))){

            $url =  '/node/add';
        }else{
            if (node_access('create', 'konkurs_school', $user)) {
                $url = theme_get_setting('add_node_konkurs_school');
            } elseif (node_access('create', 'konkurs_student', $user)) {
                $url = theme_get_setting('add_node_konkurs_student');
            } else {
                $url = '/user/login?redirect=add_node_konkurs';
            }
        }
    }else{
        $url =  '/user/login?redirect=add_node_konkurs';
    }
    return $url;
}

function zvezdaudachi2_get_currnet_menu_name(){


    $menu_school_name = 'menu-school-menu';
    $menu_student_name = 'menu-student-menu';
    $school_division = 'school';
    $student_division = 'student';

    global $user;

    // Landin_page 1-8 исключения
    if (current_path()=='node/90116') {
            return false;
        }
        if (current_path()=='node/92221') {
            return false;
        }
        if (current_path()=='node/92220') {
            return false;
        }

     // Конец лендингов
    //на главной свое меню
    if(drupal_is_front_page()){
        return false;
    }

    //Меню в форме авторизации. Берется из кук

    /*if(current_path()=='user/login' && isset($_COOKIE['division'])){
        if($_COOKIE['division']=='school'){
           return $menu_school_name;
        }
        if($_COOKIE['division']=='student'){
            return $menu_student_name;
        }
        return null;
    }*/

    //В профиле меню берем исходя из роли, для админов скрываем меню
    if(preg_match('#^user/[0-9]+#',current_path())){
        if(isset($_SESSION['profile_name'])){
            if($_SESSION['profile_name'] == 'school'){
                $_SESSION['division'] = $school_division;
                return $menu_school_name;
            }
            if($_SESSION['profile_name'] == 'student'){
                $_SESSION['division'] = $student_division;
                return $menu_student_name;
            }
        }
        return null;
    }


    //По типу ноды
    if(arg(0)=='node'){
        $node=node_load(arg(1));
        if($node->type == 'konkurs_school'){
            $_SESSION['division'] = $school_division;
            return $menu_school_name;
        }if($node->type == 'konkurs_student'){
            $_SESSION['division'] = $student_division;
            return $menu_student_name;
        }
    }



    //статичные страницы school
    if(in_array(arg(1),array(83758,12914))){
        $_SESSION['division'] = $school_division;
        return $menu_school_name;
    }elseif(in_array(arg(0),array('konkurs-school'))){
        $_SESSION['division'] = $school_division;
        return $menu_school_name;
    }


    //статичные страницы student
    if(in_array(arg(1),array(88685,88687))){
        $_SESSION['division'] = $student_division;
        return $menu_student_name;
    }elseif(in_array(arg(0),array('konkurs-student'))){
        $_SESSION['division'] = $student_division;
        return $menu_student_name;
    }

    //Если прошли на страницу регистрации студента, минуя выбор на главной
    if(current_path()=='user/register/student'){
        $_SESSION['division'] = $student_division;
        return $menu_student_name;
    }
    //Если прошли на страницу регистрации школьник, минуя выбор на главной
    if(current_path()=='user/register/school'){
        $_SESSION['division'] = $school_division;
        return $menu_school_name;
    }


    //Если ничего не нашлось то смотрим через какой раздел зашли
    //ВСЕГДА ПРОВЕРТЬ ВПОСЛЕДНЮЮ ОЧЕРЕДЬ!
    if(isset($_SESSION['division'])){
        if($_SESSION['division'] == "student"){
            $_SESSION['division'] = $student_division;
            return $menu_student_name;
        }elseif($_SESSION['division'] == "school"){
            $_SESSION['division'] = $school_division;
            return $menu_school_name;
        }
    }

    //Если совсем ничего не нашлось...
    if(current_path()=='user/login' || current_path() == 'node/83759'){
        return null;
    }
}


function zvezdaudachi2_preprocess_page(&$variables, $hook) {
   //some other stuff
if (isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__type__'. $variables['node']->type;
    $variables['theme_hook_suggestions'][] = "page__node__" . $variables['node']->nid;
  }
}

/*

function zvezdaudachi2_preprocess_page(&$variables) {
    if (!empty($variables['node']) && !empty($variables['node']->type)) {
        $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;
    }
}

*/
