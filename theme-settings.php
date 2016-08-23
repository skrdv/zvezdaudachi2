<?php
function zu_form_system_theme_settings_alter(&$form, $form_state) {
    $form['links'] = array(
        '#type' => 'fieldset',
        '#title' => 'Ссылки в шаблоне',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['links']['add_node_konkurs_school'] = array(
        '#type' => 'textfield',
        '#title' => 'Ссылка на страницу отправки работы для школьников',
        '#description' => 'Ссылка на страницу добавления ноды "Конкурс. Школьники".',
        '#default_value' => theme_get_setting('add_node_konkurs_school')
    );
    $form['links']['add_node_konkurs_student'] = array(
        '#type' => 'textfield',
        '#title' => 'Ссылка на страницу отправки работы для студентов',
        '#description' => 'Ссылка на страницу добавления ноды "Конкурс.Студенты".',
        '#default_value' => theme_get_setting('add_node_konkurs_student')
    );
}