<?php
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
            ),
        ));

        if(!$validation->passed()){
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

                header('Location: /properties');
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
