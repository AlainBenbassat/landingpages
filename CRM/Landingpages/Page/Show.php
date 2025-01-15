<?php
use CRM_Landingpages_ExtensionUtil as E;

class CRM_Landingpages_Page_Show extends CRM_Core_Page {

  public function run() {
    Civi::resources()->addStyleFile('landingpages', 'css/style.css');

    CRM_Utils_System::setTitle(E::ts('Shortcuts'));

    $landingPage = CRM_Landingpages_BAO_LandingPage::getDefault();
    if ($landingPage) {
      $this->assign('header', $landingPage['header_text']);
      $this->assign('footer', $landingPage['footer_text']);
      $this->assign('left', $landingPage['left_text']);
      $this->assign('right', $landingPage['right_text']);
    }

    parent::run();
  }

}
