<?php
/**
 * @param $profile_data
 * @param $profile
 * @param $field_gorod_term
 *
 */


if($profile->type == 'student') {
    $field_uchebnzaved_student_values = field_info_field('field_uchebnzaved_student');
    $field_uchebnzaved_student_values=$field_uchebnzaved_student_values['settings']['allowed_values'];
    $field_uchebnzaved = $field_uchebnzaved_student_values[$profile_data->field_uchebnzaved_student->value()];

    $field_kurs_values = field_info_field('field_kurs');
    $field_kurs_values=$field_kurs_values['settings']['allowed_values'];
    $field_kurs = $field_kurs_values[$profile_data->field_kurs->value()];

}else{
    $field_number = trim($profile_data->field_number->value());
    $field_klacc3 = trim($profile_data->field_klacc3->value());
    $field_uchebnzaved = $profile_data->field_uchebnzaved3->value();
}

?>

<a href="/user/<?php echo  $node->uid;?>">
    <strong><?php echo $profile_data->field_nazvanie3->value()?></strong>
</a>
<div style="margin-bottom: 10px"><?php echo $field_gorod_term->name;?></div>

<?php if($profile->type == 'school') {
    print render(field_view_field('profile2', $profile, 'field_field_srednvozrast4', 'value'));
    echo render(field_view_field('profile2', $profile, 'field_kolvouch3', 'value'));?>
    <?php echo $field_uchebnzaved;?></strong><?php if(!empty($field_nazvuchebn)){?>, <?php echo $field_nazvuchebn?><?php }?>
    <?php if(isset($field_number) && !empty($field_number)){?>№ <?php echo $field_number?><?php }?><?php if(!empty($field_klacc3)){?>, <?php echo $field_klacc3?> класс<?php }?>
<?php }else{?>
    <?php echo render(field_view_field('profile2', $profile, 'field_kolvouch3', 'value'));?>
    <?php if(!empty($field_nazvuchebn)){?><strong><?php echo $field_uchebnzaved;?></strong>: <?php echo $field_nazvuchebn?><?php }?>
    <?php if(!empty($field_fakultet)){?><?php echo $field_fakultet?> факультет<?php }?>
    <?php if(!empty($field_kurs)){ echo $field_kurs; ?>, курс<?php }?>

<?php }?>
<?php echo render(field_view_field('profile2', $profile, 'field_pedagog', 'value'));?>
<?php if(isset($content['field_category_school']))echo render($content['field_category_school']);?>

