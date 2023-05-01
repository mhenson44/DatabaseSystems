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

   $result = $dbconn->query($sql);
   if($result) {
      printf("<br>\n");
      #process one row at a time...
      while($row=$result->fetch_assoc()) {
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
