<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  $dbUrl = getenv('DATABASE_URL');
  if (empty($dbUrl)) {
    $dbUrl = "postgres://me:public@localhost:5432/public";
  }
  $dbopts = parse_url($dbUrl);

  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"],'/');

   try {
     $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
   }
   catch (Exception $ex) {
     echo $ex->getMessage();
//     print "<p>error: $ex->getMessage() </p>\n\n";
     die();
   }
?>
