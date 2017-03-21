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