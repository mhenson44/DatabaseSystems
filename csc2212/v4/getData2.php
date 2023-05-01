<html>
<body>
<?php
   require("utility.php");
   $dbconn = connectToDB();

   $eid=cleanInput($_GET['EID']);
   $pwd=cleanInput($_GET['Password']);
   $year=cleanInput($_GET['Year']);

   $eid=$dbconn->real_escape_string($eid);
   $pwd=$dbconn->real_escape_string($pwd);
   $year=$dbconn->real_escape_string($year);


   echo "After -> EID: $eid --- Password: $pwd --- Years: $year<br>\n";

   $sql="select EMP_NUM, EMP_FNAME, EMP_YEARS from EMPLOYEE where EMP_YEARS=?;";
   logMsg($sql);
   echo "$sql<br>\n";

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
