<?php
require 'vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('firebase_credentials.json');
$database = $factory->createDatabase();

echo "Firebase setup successful!";
?>
cl