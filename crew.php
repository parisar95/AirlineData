<html>
<body>

<table><tr valign="top"><td width="40%">

<div id="assnSearch">
    <h2>View Flight Assignments</h2>
    <form method="POST" action="crew.php">
        <table>
	    <tr>
                <td>Employee ID</td>
                <td><input type="input" name="eid"></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="searchFltAssnSubmit">Search</button></td>
            </tr>
        </table>
    </form>
</div>


<div id="passengerSearch">
    <h2>View Flight Passengers</h2>
    <form method="POST" action="crew.php">
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
                <td><button type="submit" value="submit" name="searchPassSubmit">Search</button></td>
            </tr>
        </table>
    </form>
</div>

</td><td>

<?php

	error_reporting(-1);
	ini_set('display_errors',1);

	date_default_timezone_set ('UTC');
	$hasRequiredFields = false;

    	if (array_key_exists('searchFltAssnSubmit', $_POST)) {

		$eid = "'".$_POST['eid']."'";

		if ($eid !== "''") $hasRequiredFields = true;

		$query = "select * from flight f where f.fno in (select c.fno from crewassn c where eid = $eid)";

        } else if (array_key_exists('searchPassSubmit', $_POST)) {

		$fno = "'".$_POST['fno']."'";
		$dDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['dDate'])))."'";

		if ($fno !== "''" && $dDate !== "'1970-01-01'")	$hasRequiredFields = true;

		$query = "select * from flight where dateflight = $dDate and fno = $fno";
		$query2 = "select p.pid, p.pname, t.tid from passenger p, ticket t where t.pid = p.pid and t.dateflight = $dDate and t.fno = $fno";

		
	}

	if ($hasRequiredFields) {

		require('sqlfn.php');
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		$db_conn = dbConn($username, $password);
		$result = executePlainSQL($query);

		if (array_key_exists('searchPassSubmit', $_POST))
			$result2 = executePlainSQL($query2);

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

		if (array_key_exists('searchPassSubmit', $_POST)) {
					
			echo '</br><table border="1"><thead>'.
				'<td><b>Passenger ID</b></td>'.
				'<td><b>Name</b></td>'.
				'<td><b>Ticket ID</b></td>'.
			     '</thead>';

			while ($row = OCI_Fetch_Array($result2, OCI_BOTH)) {
		    		echo "<tr  align='center'>";
				echo "<td>" . $row[0] . "</td>";
				echo "<td>" . $row[1] . "</td>";
				echo "<td>" . $row[2] . "</td>";
				echo "</tr>";
			}   
		}
	}
?>

</td></tr>

</body>
</html>