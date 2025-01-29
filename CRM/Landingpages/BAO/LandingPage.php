<?php

use CRM_Landingpages_ExtensionUtil as E;

class CRM_Landingpages_BAO_LandingPage extends CRM_Landingpages_DAO_LandingPage {
  public static function getDefault() {
    return \Civi\Api4\LandingPage::get(FALSE)
      ->setLimit(1)
      ->execute()
      ->first();
  }

  public static function saveDefault($header, $title, $footer, $left, $right) {
    $defaultLadingPage = self::getDefault();
    if ($defaultLadingPage) {
      \Civi\Api4\LandingPage::update(FALSE)
        ->addValue('title', $title)
        ->addValue('header_text', $header)
        ->addValue('footer_text', $footer)
        ->addValue('left_text', $left)
        ->addValue('right_text', $right)
        ->addWhere('id', '=', $defaultLadingPage['id'])
        ->execute();
    }
    else {
      \Civi\Api4\LandingPage::create(FALSE)
        ->addValue('title', $title)
        ->addValue('header_text', $header)
        ->addValue('footer_text', $footer)
        ->addValue('left_text', $left)
        ->addValue('right_text', $right)
        ->execute();
    }
  }
}
