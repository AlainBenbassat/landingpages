<?php

use CRM_Landingpages_ExtensionUtil as E;

class CRM_Landingpages_Form_Edit extends CRM_Core_Form {
  public $_id;

  public function buildQuickForm(): void {
    if ($this->getLandingPageId()) {
      $this->setTitle(E::ts('Edit Landing Page'));
    }
    else {
      $this->setTitle(E::ts('Create Landing Page'));
    }

    $this->addFormElements();
    $this->addFormButtons();

    $this->assign('elementNames', $this->getRenderableElementNames());
    parent::buildQuickForm();
  }

  public function postProcess(): void {
    $values = $this->exportValues();

    $params = [
      'id' => $values['id'],
      'title' => $values['title'],
      'header_text' => $values['header_text'],
      'footer_text' => $values['footer_text'],
      'left_text' => $values['left_text'],
      'right_text' => $values['right_text'],
    ];
    CRM_Landingpages_BAO_LandingPage::create($params);

    CRM_Utils_System::redirect(CRM_Utils_System::url('civicrm/search#/display/Landing_Pages/Landing_Pages'));

    parent::postProcess();
  }

  private function addFormElements() {
    $this->add('hidden', 'id', $this->getLandingPageId());
    $this->add('text', 'title', E::ts('Title'), [], TRUE);
    $this->add('wysiwyg', 'header_text', E::ts('Header'), []);
    $this->add('wysiwyg', 'left_text', E::ts('Left column'), []);
    $this->add('wysiwyg', 'right_text', E::ts('Right column'), []);
    $this->add('wysiwyg', 'footer_text', E::ts('Footer'), []);
  }

  private function addFormButtons() {
    $this->addButtons([
      [
        'type' => 'submit',
        'name' => E::ts('Submit'),
        'isDefault' => TRUE,
      ],
      [
        'type' => 'cancel',
        'name' => E::ts('Cancel'),
      ],
    ]);
  }

  public function setDefaultValues() {
    $defaults = parent::setDefaultValues();

    $id = $this->getLandingPageId();
    if ($id) {
      CRM_Landingpages_BAO_LandingPage::retrieve(['id' => $id], $defaults);
    }

    return $defaults;
  }

  private function getLandingPageId() {
    if ($this->_id === NULL) {
      $id = CRM_Utils_Request::retrieve('id', 'Positive');
      if ($id) {
        $this->_id = (int)$id;
      }
    }
    return $this->_id;
  }

  private function getRenderableElementNames(): array {
    $elementNames = [];
    foreach ($this->_elements as $element) {
      /** @var HTML_QuickForm_Element $element */
      $label = $element->getLabel();
      if (!empty($label)) {
        $elementNames[] = $element->getName();
      }
    }
    return $elementNames;
  }

}
