<?php
namespace Civi\Api4;

/**
 * LandingPage entity.
 *
 * Provided by the landingpages extension.
 *
 * @package Civi\Api4
 */
class LandingPage extends Generic\DAOEntity {


  public static function permissions() {
    return [
      'meta' => ['access CiviCRM'],
      'default' => ['administer landing pages'],
      'get' => ['view landing pages'],
    ];
  }

}
