<?php

use CRM_Landingpages_ExtensionUtil as E;

class CRM_Landingpages_Form_Edit extends CRM_Core_Form {
  public function buildQuickForm(): void {
    $this->setTitle('Landingspagina');

    $this->addFormElements();
    $this->addFormButtons();

    $this->assign('elementNames', $this->getRenderableElementNames());
    parent::buildQuickForm();
  }

  public function postProcess(): void {
    $values = $this->exportValues();
    CRM_Landingpages_BAO_LandingPage::saveDefault('Shortcuts', $values['header'], $values['footer'], $values['left'], $values['right']);

    CRM_Utils_System::redirect(CRM_Utils_System::url('civicrm/landingpage/show', 'reset=1'));

    parent::postProcess();
  }

  private function addFormElements() {
    $this->add('wysiwyg', 'header', 'Header', ['class' => 'big'], FALSE);
    $this->add('wysiwyg', 'left', 'Linker kolom', ['class' => 'big'], FALSE);
    $this->add('wysiwyg', 'right', 'Rechter kolom', ['class' => 'big'], FALSE);
    $this->add('wysiwyg', 'footer', 'Footer', ['class' => 'big'], FALSE);
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

    $landingPage = CRM_Landingpages_BAO_LandingPage::getDefault();
    if ($landingPage) {
      $defaults['header'] = $landingPage['header_text'];
      $defaults['footer'] = $landingPage['footer_text'];
      $defaults['left'] = $landingPage['left_text'];
      $defaults['right'] = $landingPage['right_text'];
    }

    return $defaults;
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
