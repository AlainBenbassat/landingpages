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
