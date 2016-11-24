<?php
require_once 'OrganizationInput.php';
function CalculateDays()
{
	$StartDate=$_POST['StartDate'];
	$EndDate=$_POST['EndDate'];
	$StartDate = date_create($StartDate);
	$EndDate = date_create($EndDate);
	$interval = date_diff($StartDate, $EndDate);
	return $interval;
}

function ReverseText()
{
	$InputText=$_POST['InputText'];
	$ReverseText=strrev($InputText);
	$TextArray=explode(",",$ReverseText);
	$output=array_unique($TextArray);
	return implode($output);
}

function ConvertDate()
{
	$InputDateTime=$_POST['DateTime'];
	echo "User input:".$InputDateTime."<br>";	
	$USDateTime= date("Y-m-d h:i:s",strtotime("-10 hours 30 minutes",strtotime($InputDateTime)));
	$UKDateTime= date("Y-m-d h:i:s",strtotime("-5 hours 30 minutes",strtotime($InputDateTime)));
	echo "US date and time:".$USDateTime."<br>";
	echo "UK date and time:".$UKDateTime;
}

ConvertDate();
echo "<br>"."<br>";
echo "No.of days between two dates:";
print_r(CalculateDays());
echo "<br>"."<br>";
echo "Reversed output of input text with each character occuring only once:".ReverseText()."<br>";

?>
