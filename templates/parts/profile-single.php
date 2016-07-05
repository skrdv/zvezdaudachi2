<?php
/**
 * @param $profile_data
 * @param $profile
 * @param $field_gorod_term
 *
 */

if($profile->type == 'student'){
    $field_uchebnzaved_student_values = field_info_field('field_uchebnzaved_student');
    $field_uchebnzaved_student_values=$field_uchebnzaved_student_values['settings']['allowed_values'];
    $field_uchebnzaved = $field_uchebnzaved_student_values[$profile_data->field_uchebnzaved_student->value()];


    $field_kurs_values = field_info_field('field_kurs');
    $field_kurs_values=$field_kurs_values['settings']['allowed_values'];
    $field_kurs = $field_kurs_values[$profile_data->field_kurs->value()];

    $field_fakultet = $profile_data->field_fakultet->value();


}else{
    $field_klacc3=trim($profile_data->field_klacc3->value());
    $field_number=trim($profile_data->field_number->value());
    $field_uchebnzaved = $profile_data->field_uchebnzaved3->value();
}



$name=$profile_data->field_name3->value();
$surname=$profile_data->field_familiya3->value();

?>
<div>
    <a href="/user/<?php echo  $node->uid;?>">
        <strong>
            <?php
            if(!empty($name) || !empty($surname)){?>
                <?php echo $name.' '.$surname?>
            <?php }else{?>
                <?php echo $name?>
            <?php }?>
        </strong>
    </a>
    &nbsp;
    <?php echo $profile_data->field_vozrats4->value();?> лет
</div>
<div>
    <?php if($profile->type == 'school'){?>
        <?php echo  $field_kurs;?>
        <?php if(isset($field_number) && !empty($field_number)){?>№ <?php echo $field_number?><?php }?><?php if(!empty($field_klacc3)){?>, <?php echo $field_klacc3?> класс<?php }?>

    <?php }else{?>
        <?php echo $field_nazvuchebn?> <?php if(!empty($field_kurs)){?>,<?php echo $field_kurs; ?> курс<?php }?>
    <?php }?>
    <br>
    <em><?php echo ($field_gorod_term)?$field_gorod_term->name:''?></em>
</div>
<div style="margin-top: 5px">
    <?php if($profile->type == 'school'){?>
        <?php  echo render(field_view_field('profile2', $profile, 'field_nazvuchebn3', 'value'));?>
    <?php }else{?>
        <div>
            <?php if(!empty($field_fakultet)){?><?php echo $field_fakultet?> факультет<?php }?>
            <?php echo $field_kurs; ?> курс
        </div>
    <?php }?>
    <div style="margin-top: 5px">
        <?php  echo render(field_view_field('profile2', $profile, 'field_pedagog', 'value'));?>
    </div>
</div>
<?php if(isset($content['field_category_schools'])) echo render($content['field_category_schools']);?>

