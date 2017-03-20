<?php
	error_reporting(-1);
	ini_set('display_errors',1);
	setcookie('username', htmlentities($_POST['username']));
	setcookie('password', htmlentities($_POST['password']));
?>

<html>

<body>
    <form>
        <button type="submit" formaction="cust.php">Customer</button>
    </form>
</body>

</html>


