<html>
<body>
<?php
   require("utility.php");
   $dbconn = connectToDB();
   
   //Will use later
   $eid=$_GET['EID'];
   echo "Deleted EID: $eid<br>\n";
   
   $sql="delete from EMPLOYEE where EMP_NUM='$eid';";
   echo "$sql<br>\n";
   logMsg($sql);

   $result = $dbconn->query($sql);
   if(result) {
      printf("Success:<br>\n");
      $result->free();
   } else {
      printf("Failure:<br>\n");
   }
   $dbconn->close(); 
?>
</body>
</html>
