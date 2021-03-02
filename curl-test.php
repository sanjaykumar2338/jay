<?php 

// From URL to get webpage contents. 
$url = "https://api.data.gov/ed/collegescorecard/v1/schools?api_key=X7j0EMf0lMpN9w25qh78h0DhDpNDxKhFmsBrmi7w"; 
$url = "https://api.data.gov/ed/collegescorecard/v1/schools?api_key=quv6Wcn0LmbxylkVqgoyhaa5U9Pbp3udZ1e5HSRw";

// Initialize a CURL session. 
$ch = curl_init(); 

// Return Page contents. 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

//grab URL and pass it to the variable. 
curl_setopt($ch, CURLOPT_URL, $url); 

$result = curl_exec($ch); 
$array = json_decode($result);

echo "<pre>";
print_r($array);
echo "</pre>";

?> 
