<html>
<body>

<table><tr valign="top"><td width="40%">

<div id="editTicket">
    <h2>Edit a Reservation</h2>
    Leave fields blank to keep current value
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
	    <tr>
                <td>Ticket ID</td>
                <td><input type="input" name="tid" required></td>
            </tr>
	    <tr>
                <td>Flight No.</td>
                <td><input type="input" name="fno"></td>
            </tr>
	    <tr>
                <td>Depatrure Date</td>
                <td><input type="date" name="dateflight"></td>
            </tr>
	    <tr>
                <td>Passenger ID</td>
                <td><input type="input" name="pid"></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="editResSubmit">Edit</button></td>
            </tr>
        </table>
    </form>
</div>

<div id="removeTicket">
    <h2>Remove a Reservation</h2>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
	    <tr>
                <td>Ticket ID</td>
                <td><input type="input" name="tid" required></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="removeResSubmit">Remove</button></td>
            </tr>
        </table>
    </form>
</div>

<div id="editCapacity">
    <h2>Edit Model Capacity</h2>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
        <tr>
                <td>Model Number</td>
                <td><input type="input" name="model" required></td>
            </tr>
        <tr>
                <td>New Capacity</td>
                <td><input type="input" name="capacity" required></td>
            </tr>
        <tr>
                <td><button type="submit" value="submit" name="editCapacitySubmit">Edit</button></td>
            </tr>
        </table>
    </form>
</div>

<div id="viewModelInfo">
    <h2>View Model Info</h2>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
        <tr>
                <td>Model Number</td>
                <td><input type="input" name="model" required></td>
            </tr>
        <tr>
                <td><button type="submit" value="submit" name="viewModelInfo">View Bruh</button></td>
            </tr>
        </table>
    </form>
</div>

<div id="editFlightTimes">
    <h2>Edit a Flight</h2>
    Leave fields blank to keep current value
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
	    <tr>
                <td>Flight No.</td>
                <td><input type="input" name="fno" required></td>
            </tr>
	    <tr>
                <td>Depatrure Date</td>
                <td><input type="date" name="dateflight" required></td>
            </tr>
	    <tr>
                <td>Depatrure Time</td>
                <td><input type="time" name="deptime"></td>
            </tr>
	    <tr>
                <td>Arrival Time</td>
                <td><input type="time" name="arrtime"></td>
            </tr>
	    <tr>
                <td>Aircraft ID</td>
                <td><input type="input" name="regno"></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="editFlightSubmit">Edit</button></td>
            </tr>
        </table>
    </form>
</div>

<div id="addFlight">
    <h2>Add a Flight</h2>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
	    <tr>
                <td>Flight No.</td>
                <td><input type="input" name="fno" required></td>
            </tr>
	    <tr>
                <td>Depatrure Date</td>
                <td><input type="date" name="dateflight" required></td>
            </tr>
	    <tr>
                <td>Depatrure Time</td>
                <td><input type="time" name="deptime" required></td>
            </tr>
	    <tr>
                <td>Depatrure Airport</td>
                <td><input type="input" name="depacode" required></td>
            </tr>
	    <tr>
                <td>Arrival Date</td>
                <td><input type="date" name="arrdate" required></td>
            </tr>
	    <tr>
                <td>Arrival Time</td>
                <td><input type="time" name="arrtime" required></td>
            </tr>
	    <tr>
                <td>Arrival Airport</td>
                <td><input type="input" name="arracode" required></td>
            </tr>
	    <tr>
                <td>Aircraft ID</td>
                <td><input type="input" name="regno" required></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="addFlightSubmit">Add</button></td>
            </tr>
        </table>
    </form>
</div>


<div id="removeFlight">
    <h2>Remove a Flight</h2>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
	    <tr>
                <td>Flight No.</td>
                <td><input type="input" name="fno" required></td>
            </tr>
	    <tr>
                <td>Depatrure Date</td>
                <td><input type="date" name="dateflight" required></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="removeFlightSubmit">Remove</button></td>
            </tr>
        </table>
    </form>
</div>

</td><td>

<?php

	error_reporting(-1);
	ini_set('display_errors',1);

    date_default_timezone_set('UTC');
    $hasRequiredFields = false;
    $print = true;

    if (array_key_exists('removeFlightSubmit', $_POST)) {
        $fno = "'".$_POST['fno']."'";
        $dateflight = "'".strtoupper(date('Y-m-d', strtotime($_POST['dateflight'])))."'";

        if ($fno !== "''" && $dateflight !== "'1970-01-01'")
            $hasRequiredFields = true;

       
        // $query = "delete from crewassn where fno = $fno and dateflight = $dateflight"; 
        $query = "delete from flight where fno = $fno and dateflight = $dateflight";
        // $query2 = "delete from ticket where fno = $fno and dateflight = $dateflight";
        $print = false;
    }

    if (array_key_exists('editCapacitySubmit', $_POST)) {
        $model = "'".$_POST['model']."'";
        $capacity = "'".$_POST['capacity']."'";

        if ($model != "'" && $capacity != "'")
            $hasRequiredFields = true;

        $query = "update modelinfo set capacity = $capacity where model = $model";

        $print = false;
    }

    if (array_key_exists('viewModelInfo', $_POST)) {
    	$model = "'".$_POST['model']."'";

    	if ($model != "'")
    		$hasRequiredFields = true;

    	$query = "select * from modelinfo where model = $model";

    }
    if (array_key_exists('viewModelInfo', $_POST)) {
    	require('sqlfn.php');
    	$username = $_COOKIE['username'];
    	$password = $_COOKIE['password'];
   		$db_conn = dbConn($username, $password);
    	$result = executePlainSQL($query);

    	OCICommit($db_conn);
    	dbDisconn($db_conn);

    	echo '<table border="1"><thead>'.
        '<td><b>Model No.</b></td>'.
        '<td><b>Capacity</b></td>'.
        '</thead>';

        if ($print != true) {
        	return;
        }

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        	echo "<tr align = 'center'>";
        	echo "<td>" . $row[0] . "</td>";
        	echo "<td>" . $row[1] . "</td>";
        	echo "</tr>";
        }
        echo '</table>';

    } else

    if ($hasRequiredFields) {

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
    if ($print != true){
        return;
    }


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

<?php
	echo "<hr>";
	include("cust.php");
	echo "<hr>";
	include("crew.php");
?>

</body>
</html>