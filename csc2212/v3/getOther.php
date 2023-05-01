<html>
<body>
<?php
   require("utility.php");
   $dbconn = connectToDB();

   //$_GET works with the get action in a web form
   //EID is the name of the input from that form
   $eid=$_GET['EID'];
   $pwd=$_GET['Password'];
   $yr=$_GET['Year'];
   //now this script has the values the user entered.
   printf("EID: %s  --- Password: %s  --- Year: %s\n",$eid,$pwd,$yr);

   #setup query in a string
   $sql="select EMP_NUM, EMP_FNAME, EMP_YEARS from EMPLOYEE;";
   #send query to databse engine, the database engine responds
   #and the php script saves all info in result object.
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
   if (mysqli_query($conn, $sql)) {
       echo "Record deleted successfully";
   } else {
    echo "Error deleting record: " . mysqli_error($conn);
   }

   $dbconn->close();



?>
</body>
</html>
