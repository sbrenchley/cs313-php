<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  $dbUrl = getenv('HEROKU_POSTGRESQL_DEFAULT_URL');
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
   catch (PDOException $ex) {
     print "<p>error: $ex->getMessage() </p>\n\n";
     die();
   }
?>
