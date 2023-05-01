<html>
<body>
<?php
   require("utility.php");
   $dbconn = connectToDB();
   
   $sql="select EMP_NUM from EMPLOYEE;";
   $result = $dbconn->query($sql);
   if($result) {
      printf("<br>\n");
      #process one row at a time...
      while($row=$result->fetch_assoc()) {
         printf("ID: %s<br>\n",$row[0]);
      }
      $result->free();
   }
   $dbconn->close();
?>
      


      <form action="delEmp.php" method="get">
      Employee ID:   <input type="text" name="EID"<br>
      <input type="submit" value="Submit">
            </form>

      </body>

</html>
