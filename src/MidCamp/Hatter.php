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
    echo "\n\n\nInstalling Hatter style-guide assets ...\n\n";

    /** @var Composer $composer */
    $composer = $event->getComposer();

    // Figure out the source path.
    $vendor_path = $composer->getConfig()->get('vendor-dir');
    $source_path = "{$vendor_path}/midcamp/hatter/src/content/assets/";

    // Figure out the destination path.
    $extra = $composer->getPackage()->getExtra();
    $destination_path = realpath("$vendor_path/../{$extra['styleguide']['theme-path']}");

    // Find the names of directories in the source directory.
    foreach (glob($source_path . '/*' , GLOB_ONLYDIR) as $source) {
      $parts = explode("/", $source);
      $dir_name = end($parts);

      // Copy all the directories in the source directory into the theme.
      if (is_dir($source)) {
        copy($source, "{$destination_path}/{$dir_name}");
        echo "Copied $source to {$destination_path}/{$dir_name}";
      }
      else {
        echo "Could not copy $source to {$destination_path}/{$dir_name}";
      }
    }
  }

}