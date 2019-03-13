<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<!--<style>
html *
{
   font-family: Arial !important;
}
table.calendar {
	border-left: 1px solid #999;
}
tr.calendar-row {
}
td.calendar-day {
	min-height: 80px;
	font-size: 11px;
	position: relative;
	vertical-align: top;
}
* html div.calendar-day {
	height: 80px;
}
td.calendar-day:hover {
	background: #eceff5;
}
td.calendar-day-np {
	background: #eee;
	min-height: 80px;
}
* html div.calendar-day-np {
	height: 80px;
}
td.calendar-day-head {
	background: #ccc;
	font-weight: bold;
	text-align: center;
	width: 120px;
	padding: 5px;
	border-bottom: 1px solid #999;
	border-top: 1px solid #999;
	border-right: 1px solid #999;
}
div.day-number {
	background: #999;
	padding: 5px;
	color: #fff;
	font-weight: bold;
	float: right;
	margin: -5px -5px 0 0;
	width: 20px;
	text-align: center;
}
td.calendar-day, td.calendar-day-np {
	width: 120px;
	padding: 5px;
	border-bottom: 1px solid #999;
	border-right: 1px solid #999;
}
</style>-->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Booking calendar</title>
<link href="jquery-ui.css" rel="stylesheet">
<!--<script src="jquery-1.10.2.js"></script>
<!--<script src="jquery-ui.js"></script>-->
<!--<script src="lang/datepicker-fi.js"></script>-->
<script>
    $(function() {
	<!--$.datepicker.setDefaults($.datepicker.regional['fi']);-->
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
	  regional: "fi",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });  </script>
</head>

<body>

<h1>Booking calendar</h1>
<table >
    <!--border="1" cellpadding="5" width="800"-->
	<tr>
		<td valign="top">
		<form action="book.php" method="post">
			<h3>Make booking</h3>
			<p><input checked="checked" name="service" type="radio" value="Physiotherapy" />Physiotherapy 
			| <input name="service" type="radio" value="Jaccuzi" />Jaccuzi
			| <input name="service" type="radio" value="Sauna" />Sauna | 
			<input name="service" type="radio" value="Massage" />Massage</p>
			<table style="width: 70%">
				
				<tr>
					<td>Reservation date:</td>
					<td>
			<input id="from" name="day" required="" type="text" /></td>
                   
					
				</tr>
				<tr>
                     <td>Reservation time:</td>
					<td>&nbsp;</td>
                   
					<td> <select name="time">
			<option selected="selected">09:00-10:00</option>
			<option>10:00-11:00</option>
			<option>11:00-12:00</option>
			<option>12:00-13:00</option>
			<option>13:00-14:00</option>
			<option>14:00-15:00</option>
			<option>15:00-16:00</option>
			<option>16:00-17:00</option>
			<option>17:00-18:00</option>
			<option>18:00-19:00</option>
			<option>19:00-20:00</option>
			<option>20:00-21:00</option>
			
			</select>
			</td>
				</tr>
			</table>
			
			<input name="book" type="submit" value="Book" />
		</form>
		</td>
		<td valign="top">
		<h3>Cancel booking</h3>
		<form action="cancel.php" method="post">
			<p></p>
			ID: <input name="id" required="" type="text" /><br />
			<br>
			<p><input name="cancel" type="submit" value="Cancel" /></p>
		</form>
		</td>
	</tr>
</table>
<?php
/* draws a calendar */
function draw_calendar($month,$year){

	include 'config.php';

	// Create connection
	$conn = mysqli_connect($servername, $username, $password,  $dbname);

	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			$current_epoch = mktime(0,0,0,$month,$list_day,$year);
			
			$sql = "SELECT * FROM $booktb WHERE $current_epoch = day";
						
			$result = mysqli_query($conn, $sql);
    		
    		if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {
					if($row["canceled"] == 1) $calendar .= "<font color=\"grey\"><s>";
    				$calendar .= "<b>" . $row["service"] . "</b><br>ID: " . $row["id"] . "<br>" . $row["username"]  . "<br>";
    				if($current_epoch == $row["day"] ) {
    					$calendar .= "Booking is: " .  $row["time"]. "<br><hr><br>";
    				}
                    
					if($row["canceled"] == 1) $calendar .= "</s></font>";
    			}
			} else {
    			$calendar .= "No bookings";
			}
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	mysqli_close($conn);
	
	/* all done, return result */
	return $calendar;
}

include 'config.php';

$d = new DateTime(date("Y-m-d"));
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

?>

</body>

</html>
