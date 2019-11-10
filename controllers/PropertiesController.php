<?php

class PropertiesController
{
    public function index()
    {
        $properties = App::get('database')->selectAll('properties');
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $validate = new Validation();
            $validation = $validate->check($_POST, array (
                'address' => array(
                    'required' => true,
                    'min' => 1
                ),
                'description' => array(
                    'required' => true,
                    'min' => 6
                ),
                'country' => array(
                    'required' => true,
                    'min' => 1
                ),
                'town' => array(
                    'required' => true,
                    'min' => 1
                ),
                'county' => array(
                    'required' => true,
                    'min' => 1
                ),
                'postcode' => array(
                    'required' => true,
                    'min' => 1
                ),
                'price' => array(
                    'required' => true,
                    'min' => 1
                ),
                'bedrooms' => array(
                    'min' => 1,
                    'max' => 9
                ), 
                'bathrooms' => array(
                    'min' => 1,
                    'max' => 9
                )
            ));
    
            if($validation->passed()){
                $property = new Property;
                try {
                    $property->create([
                        'uuid' => \Ramsey\Uuid\Uuid::uuid4(),
                        'address' => Input::get('address'),
                        'description' => Input::get('description'),
                        'country' => Input::get('country'),
                        'town' => Input::get('town'),
                        'county' => Input::get('county'),
                        'postcode' => Input::get('postcode'),
                        'price' => (int)Input::get('price'),
                        'num_bedrooms' => (int)Input::get('bedrooms'),
                        'num_bathrooms' => (int)Input::get('bathrooms'),
                        'property_type_id' => (int)Input::get('property_type'),
                        'type' => Input::get('type')
                    ]);
                    Redirect::to('/properties');
                }
                catch(Exception $e) {
                    die($e->getMessage());
                }
            }
            else {
                foreach($validation->errors() as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Error!</strong> <?=$error ?>
                    </div>
            <?php endforeach;
    
            }
        }
    }

    public function show()
    {
        $property = App::get('database')->where('properties', 'uuid', Input::get('uuid'));
        return view('properties.show', compact('property'));
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
        $property = App::get('database')->delete('properties', 'uuid', Input::get('uuid'));
        Redirect::to('/properties');
    }

    public function populate()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => App::get('config')['api']['url'] . "?api_key=" . App::get('config')['api']['app_key'],
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
            if(App::get('database')->where('properties', 'uuid', $property['uuid'])){
                continue;
            }
            $p = new Property;
            try {
                $p->create([
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
                ]);
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
        Redirect::to('/properties');
        //header('Location: /properties');
    }

}