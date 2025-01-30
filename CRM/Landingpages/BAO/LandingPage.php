<?php

use CRM_Landingpages_ExtensionUtil as E;

class CRM_Landingpages_BAO_LandingPage extends CRM_Landingpages_DAO_LandingPage {

  public static function create(&$params) {
    $landingPage = new CRM_Landingpages_DAO_LandingPage();
    $landingPage->copyValues($params);
    return $landingPage->save();
  }


  public static function retrieve($params, &$defaults) {
    return self::commonRetrieve(self::class, $params, $defaults);
  }
}
