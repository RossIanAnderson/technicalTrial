<?php

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $app['config']['api']['url'] . "?api_key=" . $app['config']['api']['app_key'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$response = json_decode($response, true);
foreach($response['data'] as $property){
  if($app['db']->where('properties', 'uuid', $property['uuid'])){
    continue;
  }
  $p = new Property;
  try {
    $p->create(array(
        'uuid' => $property['uuid'],
        
        'address' => $property['address'],
        'description' => $property['description'],
        'country' => $property['country'],
        'town' => $property['town'],
        'county' => $property['county'],
        'postcode' => null,
        'price' => (int)$property['price'],
        'num_bedrooms' => (int)$property['num_bedrooms'],
        'num_bathrooms' => (int)$property['num_bathrooms'],
        'property_type_id' => (int)$property['property_type'],
        'type' => $property['type'],

        'image_url' => $property['image_full'],
        'thumb_url' => $property['image_thumbnail'],
        'latitude' => $property['latitude'],
        'longitude' => $property['longitude']
    ));
  }
  catch(Exception $e){
    die($e->getMessage());
  }
}
header('Location: /properties');


