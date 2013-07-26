<?php

require_once(dirname(__FILE__).'/../../../config/ProjectConfiguration.class.php');

$configuation = ProjectConfiguration::getApplicationConfiguration('pc_frontend', 'prod', true);

new sfDatabaseManager($configuation);

// main

$fp = fopen('plugins/opPostalCodePlugin/data/csv/KEN_ALL.CSV', 'r');
while ($data = fgetcsv($fp))
{
  $postalCode = new PostalCode();
  $postalCode->setPostalCode($data[2]);
  $postalCode->setPrefecture($data[6]);
  $postalCode->setMunicipality($data[7]);
  $postalCode->setAddress($data[8]);
  $postalCode->save();
}

fclose($fp);
