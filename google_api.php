<?php

/*

#############################
Bierling PJ - ICTservicenoord
#############################

##########################
Class functie google_maps
##########################

Functie: address to lat/lng

Start: 				<obj> = new google_maps();
Add address:		<obj>.addnew(<adres>);
Fetch Array:		<arr> = <obj>->address;
	
*/

class google_maps {
	/* declare vars */
	static $address=[];
	static $geo ;
	
    public function __construct (){
		
	}
	
    /* add new address to search*/
	public function addnew ($item){
		/* get geo from google */
		$this->geo = $this->__google($item);
		/* add address to array */
		$this->address[] = ["street"=>$item,"geo"=>$this->geo];
	}
	
	/* get geo from google */
	private function __google ($search) {
		/* start curl - get data */
		$ch = curl_init();	 
		curl_setopt($ch, CURLOPT_URL, "http://maps.google.com/maps/api/geocode/json?address=".$search."&sensor=false");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);
		/* data to json object */
		$responses = json_decode($response);
		/* get lat and lng from google object */
		$lat = $responses->results[0]->geometry->location->lat;
		$long = $responses->results[0]->geometry->location->lng;
		/* return lat, lng array */
		return array($lat, $long);
	}
}

/* start convert address to geo example */
/* create new object */
$google = new google_maps();
/* add some addresses */
$google->addnew("graauwedijk+27+overschild+nederland");
$google->addnew("graauwedijk+70+overschild+nederland");

/* check - print info */
echo "<pre>";
/* print array object */
print_r($google->address);
echo "</pre>";

?>