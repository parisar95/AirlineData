<html>
<body>

<table><tr valign="top"><td width="40%">

<div id="flightSearch">
    <h2>Search For a Flight</h2>
    <b>Search by Dates</b>
    <form method="POST" action= <?php __FILE__ ?> >
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
                <td><button type="submit" value="submit" name="searchDateSubmit">Search</button></td>
            </tr>
        </table>
    </form>
    <b>Search by Flight Number</b>
    <form method="POST" action= <?php __FILE__ ?> >
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
                <td><button type="submit" value="submit" name="searchFnoSubmit">Search</button></td>
            </tr>
        </table>
    </form>
</div>


<div id="reservationSearch">
    <h2>Search For a Reservation</h2>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
	    <tr>
                <td>Ticket ID</td>
                <td><input type="input" name="tid"></td>
            </tr>
	    <tr>
                <td>Passenger ID</td>
                <td><input type="input" name="pid"></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="searchResSubmit">Search</button></td>
            </tr>
        </table>
    </form>
</div>

</td><td>

<?php

	error_reporting(-1);
	ini_set('display_errors',1);

	date_default_timezone_set ('UTC');
	$hasAtLeastOneField = false;

    	if (array_key_exists('searchDateSubmit', $_POST)) {

		$dDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['dDate'])))."'";
		$depacode = "'".$_POST['depacode']."'";
		$aDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['aDate'])))."'";
		$arracode = "'".$_POST['arracode']."'";
		$numPass = "'".$_POST['numPass'];

		if ($dDate === "'1970-01-01'")	$dDate = 'dateflight'; 		else $hasAtLeastOneField = true;
		if ($depacode === "''")		$depacode = 'depacode';		else $hasAtLeastOneField = true;
		if ($aDate === "'1970-01-01'")	$aDate = 'arrdate';		else $hasAtLeastOneField = true;
		if ($arracode === "''")		$arracode = 'arracode';		else $hasAtLeastOneField = true;

		$query = "select * from flight where dateflight = $dDate and depacode = $depacode and arrdate = $aDate and arracode = $arracode";

        } else if (array_key_exists('searchFnoSubmit', $_POST)) {

		$fno = "'".$_POST['fno']."'";
		$dDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['dDate'])))."'";

		if ($fno === "''")		$fno = 'fno'; 			else $hasAtLeastOneField = true;
		if ($dDate === "'1970-01-01'")	$dDate = 'dateflight'; 		else $hasAtLeastOneField = true;

		$query = "select * from flight where dateflight = $dDate and fno = $fno";
		
	} else if (array_key_exists('searchResSubmit', $_POST)) {

		$tid = "'".$_POST['tid']."'";
		$pid = "'".$_POST['pid']."'";

		if ($tid === "''") $tid = 'tid';	else $hasAtLeastOneField = true;
		if ($pid === "''") $pid = 'pid';	else $hasAtLeastOneField = true;

		$query = "select f.fno, f.dateflight, deptime, depacode, arrdate, arrtime, arracode, regno from flight f, (select fno, dateflight from ticket where tid = $tid and pid = $pid) k where f.fno = k.fno and f.dateflight = k.dateflight";
		
	}

	if ($hasAtLeastOneField) {

		require('sqlfn.php');
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		$db_conn = dbConn($username, $password);
		$result = executePlainSQL($query);
		OCICommit($db_conn);
		dbDisconn($db_conn);
		
		echo '<table border="1"><thead>'.
			'<td><b>Flight No.</b></td>'.
			'<td><b>Departure Airport</b></td>'.
			'<td><b>Arrival Airport</b></td>'.
			'<td><b>Departure Date</b></td>'.
			'<td><b>Arrival Date</b></td>'.
		     '</thead>';


		while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		    	echo "<tr  align='center'>";
			echo "<td>" . $row[0] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			echo "<td>" . $row[6] . "</td>";
			echo "<td>" . $row[1] . "</td>";
			echo "<td>" . $row[4] . "</td>";
			echo "</tr>";
		}      
	
		echo '</table>';
	}  

?>

</td></tr></table>

</body>
</html>