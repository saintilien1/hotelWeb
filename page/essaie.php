<?php
//$dateTime1 = "12/30/2020";
$dateTime1 = "30-10-2020";
$dateTime2 = "04/14/2020";
 $dateTimeObject1 = new DateTime($dateTime1);
 $dateTimeObject2 = new DateTime($dateTime2);

 $date = DateTime::createFromFormat('d-m-Y', $dateTime1)->format('Y-m-d');

echo $date;

?>