<?php

namespace ICO\ACF;

// Check if ACF is used with another plugin, if not already called, use this one
if (!class_exists('acf')) {
    add_filter('acf/settings/path', __NAMESPACE__ . '\\my_acf_settings_path');

  function my_acf_settings_path($path)
  {
      // update path
      $path = get_template_directory() . '/acf/';

      // return
      return $path;
  }

  add_filter('acf/settings/dir', __NAMESPACE__ . '\\my_acf_settings_dir');

  function my_acf_settings_dir($dir)
  {
      // update path
      $dir = get_template_directory() . '/acf/';

      // return
      return $dir;
  }

  include_once(get_template_directory() . '/acf/acf.php');
}

//Include the /acf folder in the places to look for ACF Local JSON files
add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
});

add_filter('acf/settings/save_json', function ($path) {
    $path = get_template_directory() . '/acf-json';
    return $path;
});
