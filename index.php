<?php
require_once __DIR__."/vendor/autoload.php";
use App\Data;



$data = new Data();
echo $data->info();
//echo $data->randNumber();
//echo $data->time();
//echo "<pre>";
//echo $data->modifiers();
//echo "<br>";
//echo "<br>";
//echo $data->localization();
//
//echo $data->seeding();
//
//print_r($data->internals());
