<?php
use CRM_Landingpages_ExtensionUtil as E;

class CRM_Landingpages_Page_Show extends CRM_Core_Page {

  public function run() {
    Civi::resources()->addStyleFile('landingpages', 'css/style.css');

    $id = CRM_Utils_Request::retrieve('id', 'Positive', NULL, TRUE);
    $defaults = [];

    $landingPage = CRM_Landingpages_BAO_LandingPage::retrieve(['id' => $id], $defaults);
    if ($landingPage) {
      CRM_Utils_System::setTitle($defaults['title']);
      $this->assign('header', $defaults['header_text']);
      $this->assign('footer', $defaults['footer_text']);
      $this->assign('left', $defaults['left_text']);
      $this->assign('right', $defaults['right_text']);
    }
    else {
      CRM_Utils_System::setTitle(E::ts('Page not found'));
    }

    parent::run();
  }

}
