<?php
/**
 * @file Hatter.php
 * Defines the composer install scripts for the Hatter theme integration.
 */
namespace MidCamp;

use Composer\Composer;
use Composer\Script\Event;

class Hatter
{
  public static function installAssets(Event $event) {

    $extra = $event->getComposer()->getPackage()->getExtra();
    var_dump($extra);

    echo "\n\n\nInstalling Assets for {$event->getName()}...\n\n\n";
  }

}