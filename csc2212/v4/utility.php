<?php
   function connectToDB()  
   {
      $dbhost="localhost";
      $dbuser="mhenson";
      $dbpass="1641578";
      $dbname="S2022_mhenson_db";
      
      logMsg("Connecting to $dbhost:$dbname with user $dbuser");
      $dbconn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
      if($dbconn->connect_error) {
         logMsg('Connect Error('.mysqli_connect_errno().') '.mysqli_connect_error());
         logMsgAndDie("Error connecting to $dbhost with user $dbuser",$dbconn);
      }
       logMsg("Success - connecting to $dbhost:$dbname with user $dbconn");
      return $dbconn; #tell the caller the connecting database instance

   }

   function logMsg($message)
   {
      error_log($message); #to your PHP_errors.log....
   }
   
   function logMsgAndDie($message,$dbconn)
   {
      error_log($message); #to your PHP_errors.log....
      if($dbconn->connect_error)
         die('Uknown problem related to connecting to database');
       else 
         die('See error log for details'.mysql_error($dbconn));
   }

   function cleanInput($data)
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

?>
