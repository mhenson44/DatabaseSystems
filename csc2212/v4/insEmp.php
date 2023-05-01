<html>
<body>
<?php
   require("utility.php");
   $dbconn = connectToDB();

   $first=cleanInput($_GET['first']);
   $last=cleanInput($_GET['last']);
   $date=cleanInput($_GET['date']);
   $job=cleanInput($_GET['jc']);
   $years=cleanInput($_GET['years']);

   $first=$dbconn->real_escape_string($first);   
   $last=$dbconn->real_escape_string($last);   
   $date=$dbconn->real_escape_string($date);   
   $job=$dbconn->real_escape_string($job);   
   $years=$dbconn->real_escape_string($years);   


   echo "name: $first $last $date $job $years<br>\n";
   $sql="insert into EMPLOYEE (EMP_FNAME, EMP_LNAME, EMP_HIREDATE,JOB_CODE,EMP_YEARS) values ('$first','$last', '$date','$job',$years);";
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
