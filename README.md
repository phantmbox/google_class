# google_class
Convert addresses to lat & long

# Usage 

Start by creating a new object: `<objectname>` = new google_maps();

Now you can add addresses you want to be converted:
`<objectname>`->addnew(`<address>`);

Get the array of information about the address:
`<array>` = `<objectname>`->address;

Example:
$latlng = new google_maps();
$latlng->addnew("Damsterdiep, Groningen");
$result = $latlng->address;
