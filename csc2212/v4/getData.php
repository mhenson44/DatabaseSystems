<html>
<body>
<?php
   require("utility.php");
   $dbconn = connectToDB();

   //$_GET works with the get action in a web form
   //EID is the name of the input from that form
   $eid=$_GET['EID'];
   $pwd=$_GET['Password'];
   $year=$_GET['Year'];
   echo "EID: $eid --- Password: $pwd\n";

   $sql="select EMP_NUM, EMP_FNAME, EMP_YEARS from EMPLOYEE where EMP_YEARS=$year;";
   logMsg($sql);

   if($result= $dbconn->prepare($sql)) {
      $result->bind_param("ss", $eid,$pwd,$year);
      $result->execute();

 
      printf("<br>\n");
      #process one row at a time...
      $result->bind_result($eid, $pwd,$year);
      while($result->fetch()) {
         printf("ID: %s ",$row["EMP_NUM"]);
         printf("FIRST: %s ",$row["EMP_FNAME"]);
         printf("years: %d <br>\n",$row["EMP_YEARS"]);
      }
      $result->free();
   }
   $dbconn->close();



?>
</body>
</html>
