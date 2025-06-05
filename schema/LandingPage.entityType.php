<?php
use CRM_Landingpages_ExtensionUtil as E;

return [
  'name' => 'LandingPage',
  'table' => 'civicrm_landing_page',
  'class' => 'CRM_Landingpages_DAO_LandingPage',
  'getInfo' => fn() => [
    'title' => E::ts('Landing Page'),
    'title_plural' => E::ts('Landing Pages'),
    'description' => E::ts('Landing Page'),
    'log' => TRUE,
    'label_field' => 'title',
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => E::ts('ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => E::ts('Unique LandingPage ID'),
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'title' => [
      'title' => E::ts('Title'),
      'sql_type' => 'varchar(255)',
      'input_type' => 'Text',
      'description' => E::ts('Title'),
    ],
    'header_text' => [
      'title' => E::ts('Header Text'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'description' => E::ts('header'),
    ],
    'footer_text' => [
      'title' => E::ts('Footer Text'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'description' => E::ts('footer'),
    ],
    'left_text' => [
      'title' => E::ts('Left Text'),
      'sql_type' => 'text',
      'input_type' => 'TextArea',
      'description' => E::ts('left'),
    ],
    'add_to_dashboard' => [
      'title' => E::ts('Add To Dashboard'),
      'sql_type' => 'boolean',
      'input_type' => 'Checkbox',
      'description' => E::ts('add to dashboard'),
    ],
  ],
];
