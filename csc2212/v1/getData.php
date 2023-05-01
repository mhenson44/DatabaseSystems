<html>
<body>
<?php
   //$_GET works with the get action in a web form
   //EID is the name of the input from that form
   $eid=$_GET['EID'];
   $pwd=$_GET['Password'];
   //now this script has the values the user entered.
   printf("EID: %s  --- Password: %s\n",$eid,$pwd);
?>
</body>
</html>
