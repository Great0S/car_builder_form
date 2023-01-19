<?php 

require_once(plugin_dir_path(__FILE__) . '..\functions.php');
require_once(plugin_dir_path(__FILE__) . '..\includes\data.php');

$array = data_to_array($file, $cars_data, $cars_file);
$brands = get_brands_array($array);

// get_data($array, $condition, $pos, $prev_pos);