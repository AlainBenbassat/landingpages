<?php

use CRM_Landingpages_ExtensionUtil as E;

/**
 * Collection of upgrade steps.
 */
class CRM_Landingpages_Upgrader extends CRM_Extension_Upgrader_Base {
  public function install(): void {
  }

  public function postInstall(): void {
  }

   public function uninstall(): void {
   }

   public function enable(): void {
   }

   public function disable(): void {
   }

   public function upgrade_1001(): bool {
     E::schema()->createEntityTable('upgrade/MyEntity.entityType.php');
     return TRUE;
   }

  public function upgrade_1002(): bool {
    $this->ctx->log->info('Applying update 1002 - add field Available for Dashboard');
    E::schema()->alterSchemaField('LandingPage', 'add_to_dashboard', [
      'title' => E::ts('Add To Dashboard'),
      'sql_type' => 'boolean',
      'input_type' => 'Checkbox',
      'description' => E::ts('add to dashboard'),
    ]);
    return TRUE;
  }
}
