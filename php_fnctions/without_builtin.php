<?php
function CalculateDays()
{
	$StartDate=$_POST['start_date'];
	$EndDate=$_POST['end_date'];
	$StartDate = strtotime($StartDate);
	$EndDate = strtotime($EndDate);
	$difference = $StartDate-$EndDate;
	return intval(floor(abs($difference)/ 86400));
}

function ReverseText()
{
	$InputText=$_POST['input_text'];
	$TextArray=explode(",",$InputText);
	$ArrayLength=count ($TextArray);
	$ReverseArray=array();
	global $j;
	for($j=0,$i=$ArrayLength-1;$i>=0;$i--,$j++)
	{
		$ReverseArray[$j]=$TextArray[$i];
		$j++;
	}
	return implode(UniqueOutput($ReverseArray));
}

function UniqueOutput($InputArray)
{
	$OutputArray = array();

	foreach($InputArray as $InputArrayItem)
	{
	foreach($OutputArray as $OutputArrayItem) 
		if($OutputArrayItem == $InputArrayItem) continue 2;
	$OutputArray[] = $InputArrayItem;
	}
	return $OutputArray;
}

echo CalculateDays();
echo "<br>";
print_r (ReverseText());

