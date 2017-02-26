
<?php
/**
*  
*/
class searchFlight  
{

$searchFlight = new searchFlight();
$searchFlight->send_and_save();



include "task.xml"

$xml = new simplexml_load_file("task.xml");
foreach ($xml->ItineraryOptions[0]->ItineraryOption as $ItineraryOption) {
	switch((string) $ItineraryOption['From']) {
  case 'DME':
     echo $ItineraryOption; , '<br>';
     break;
 }
 $ItineraryOption_From=$ItineraryOption;

 switch((string) $ItineraryOption['To']) {
  case 'OVB':
     echo $ItineraryOption , '<br>';
     break;
  }
$ItineraryOption_To=$ItineraryOption;
 foreach($xml->FlightSegment[0]->Departure as $Departure)
 {
 	switch((string) $Departure['Time']){
 		case '2013-06-05T10:00:00+04:00':
 			echo $Departure,'<br>';
 			break;
 				}

 }
 
foreach ($xml->ShopOptions[0]->ShopOption as $ShopOption) {
switch ((string) $ShopOption['Airlines'] ){
	case 'U6':
	echo $ShopOption,'<br>';
		break;

}	


}

foreach ($xml->ItineraryOption[0]->FlightSegment[1]->FlightSegment as $FlightSegment) {

switch((string) $FlightSegment['Flight'] ) {
	case '355':
		echo $FlightSegment,'<br>';
		break;
	

}


}

foreach ($xml->Fares[0]->Fare[0]->PaxType as $PaxType)
{
switch ((string) $PaxType['AgeCat']) {
	case 'ADT':
echo $PaxType,'<br>';
		break;
	
} 
switch ((string)$PaxTypeADT['Count']) {
		case '2':
	echo $PaxType,'<br>';
		break;
	
}



}
oreach ($xml->Fares[0]->Fare[0]->PaxType[1]->PaxType as $PaxTypeINF)
{
switch ((string) $PaxTypeINF['AgeCat']) {
	case 'INF':
echo $PaxTypeINF,'<br>';
		break;
	
} 
switch ((string)$PaxTypeINF['Count']) {
		case '1':
	echo $PaxType,'<br>';
		break;
	
}



}

foreach ($xml->Fare[0]->Price as $Price ) {
switch ((string)){
	case '377040.00':
	echo $Price,'<br>';
		break;	
}

}

if($db= @mysql_connect("task.xml.txt")
{

mysql_select_db("task");
echo "База данных найдена!";
 $InsertIntoAirpots_1 = ("INSERT INTO $Airports(id,code,name,country) VALUES('id','$ItineraryOption_From','Домодево','Россия')");	
 $InsertIntoAirpots_2= ("INSERT INTO $Airports(id,code,name,country) VALUES('id','$ItineraryOption_To','Внуково','Россия')");	
	$resultInsertInAirports=mysql_query($InsertIntoAirpots_1,$InsertIntoAirpots_2) or die ("Error".mysql_error());
$SelectAirports_1=mysql_query("SELECT id,code FROM $Airports WHERE id='id',code='$ItineraryOption_From'");
$SelectAirports_2=mysql_query("SELECT id,code FROM $Airports WHERE id='id',code='$ItineraryOption_To'");
$resultSelectFromAirports=mysql_query($SelectAirports_1,$SelectAirports_2) or die ("Error".mysql_error());
 $InsertIntoFlights= ("INSERT INTO $Flights(id,from,to,back,start,stop,adult,infant,price) VALUES('$FlightSegment','$ItineraryOption_From','$ItineraryOption_To','1','$Departure','$Departure','$PaxTypeADT','$PaxTypeINF','$Price')");	


}else
{
	echo "id существует!";
}
mysql_close($db);

 }  



	
?>



