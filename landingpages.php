<?php

require_once 'landingpages.civix.php';

use CRM_Landingpages_ExtensionUtil as E;

function landingpages_civicrm_config(&$config): void {
  _landingpages_civix_civicrm_config($config);
}

function landingpages_civicrm_install(): void {
  _landingpages_civix_civicrm_install();
}

function landingpages_civicrm_enable(): void {
  _landingpages_civix_civicrm_enable();
}

function landingpages_civicrm_permission(array &$permissions): void {
  $permissions['view landing pages'] = [
    'label' => E::ts('View landing pages'),
    'description' => E::ts('Allows listing and viewing landing pages.'), // Optional but encouraged
    'implied_by' => ['administer landing pages']
  ];
  $permissions['administer landing pages'] = [
    'label' => E::ts('Administer landing pages'),
    'description' => E::ts('Allows creating, editing, deleting landing pages.'),
    'implies' => ['view landing pages']
  ];
}

function landingpages_civicrm_navigationMenu(&$menu) {
  _landingpages_civix_insert_navigation_menu($menu, 'Administer/System Settings', [
    'label' => E::ts('Landing Pages'),
    'name' => 'landingpages',
    'url' => 'civicrm/search#/display/Landing_Pages/Landing_Pages',
    'permission' => 'administer landing pages',
  ]);
}
