<html>
<body>
<div id="flightSearch">
    <h2>Search For a Flight</h2>
    <b>Search by Dates</b>
    <form method="POST" action="cust.php">
        <table>
	    <tr>
                <td>Departure Airport</td>
                <td><input type="input" name="depacode"></td>
            </tr>
            <tr>
                <td>Departure Date</td>
                <td><input type="date" name="dDate"></td>
            </tr>
	    <tr>
                <td>Arrival Airport</td>
                <td><input type="input" name="arracode"></td>
            </tr>
            <tr>
                <td>Arrival Date</td>
                <td><input type="date" name="aDate"></td>
            </tr>
            <tr>
                <td>Number of Passengers</td>
                <td><input type="number" name="numPass"></td>
            </tr>
            <tr>
                <td>
                    <button type="submit" value="submit" name="searchDateSubmit">Search</button>
                </td>
            </tr>
        </table>
    </form>
    <b>Search by Flight Number</b>
    <form method="POST" action="cust.php">
        <table>
	    <tr>
                <td>Flight Number</td>
                <td><input type="input" name="fno"></td>
            </tr>
            <tr>
                <td>Departure Date</td>
                <td><input type="date" name="dDate"></td>
            </tr>
            <tr>
                <td>
                    <button type="submit" value="submit" name="searchFnoSubmit">Search</button>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php

	error_reporting(-1);
	ini_set('display_errors',1);


    	if (array_key_exists('searchDateSubmit', $_POST)) {

		require('sqlfn.php');
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		$db_conn = dbConn($username, $password);
		date_default_timezone_set ('UTC');

		$dDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['dDate'])))."'";
		$depacode = "'".$_POST['depacode']."'";
		$aDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['aDate'])))."'";
		$arracode = "'".$_POST['arracode']."'";
		$numPass = "'".$_POST['numPass'];

		if ($dDate === "'1970-01-01'") $dDate = 'dateflight';
		if ($depacode === "''") $depacode = 'depacode';
		if ($aDate === "'1970-01-01'") $aDate = 'arrdate';
		if ($arracode === "''") $arracode = 'arracode';

		$result = executePlainSQL("select * from flight where dateflight = $dDate and depacode = $depacode and arrdate = $aDate and arracode = $arracode");
		OCICommit($db_conn);
		dbDisconn($db_conn);

        } else if (array_key_exists('searchFnoSubmit', $_POST)) {

		require('sqlfn.php');
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		$db_conn = dbConn($username, $password);
		date_default_timezone_set ('UTC');

		$fno = "'".$_POST['fno']."'";
		$dDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['dDate'])))."'";

		if ($fno === "''") $fno = 'fno';
		if ($dDate === "'1970-01-01'") $dDate = 'dateflight';

		$result = executePlainSQL("select * from flight where dateflight = $dDate and fno = $fno");
		OCICommit($db_conn);
		dbDisconn($db_conn);
		
	} else {
		return;
	}

	echo '<table><thead><td>Flight No.</td><td>Departure Airport</td><td>Arrival Airport</td><td>Departure Date</td><td>Arrival Date</td></thead>';


	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
	    	echo "<tr>";
		echo "<td>" . $row[0] . "</td>";
		echo "<td>" . $row[3] . "</td>";
		echo "<td>" . $row[6] . "</td>";
		echo "<td>" . $row[1] . "</td>";
		echo "<td>" . $row[4] . "</td>";
		echo "</tr>";
	}      
	
	echo '</table>';  

?>

<script>

function 