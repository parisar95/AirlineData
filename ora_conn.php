<html>
<?php
$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = dbhost.ugrad.cs.ubc.ca)(PORT = 1522)))(CONNECT_DATA=(SID=ug)))";
$username = htmlentities($_GET['username']);
$password = htmlentities($_GET['password']);
if ($c=OCILogon($username, $password, $db)) {
  echo "Successfully connected to Oracle.\n";
  OCILogoff($c);
} else {
  $err = OCIError();
  echo "Oracle Connect Error " . $err['message'];
}
//echo $username;
//echo $password;
?>
</html>
