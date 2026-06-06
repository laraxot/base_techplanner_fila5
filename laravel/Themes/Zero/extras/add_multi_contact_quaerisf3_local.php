<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

$base_url = 'http://quaerisf3.local';
<<<<<<< HEAD
// $base_url = 'https://manager.quaeris.it';
$login = '/api/user/login';
=======
//$base_url = 'https://manager.quaeris.it';$login = '/api/user/login';
>>>>>>> 8215f950 (.)
$addContact = '/api/quaeris/add-contact-multi';
$email = 'marco.sottana@gmail.com';
$pass = 'prova123';

$ch = curl_init($base_url.$login);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$post = ['email' => $email, 'password' => $pass];

curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

$response = curl_exec($ch);
<<<<<<< HEAD
// die('<pre>'.print_r($response, true).'<hr>'.curl_error($ch).'</pre>['.__LINE__.']');

$json = json_decode($response);
// die('<pre>'.print_r($response, true).'<hr>'.curl_error($ch).'</pre>['.__LINE__.']');

$data = [
    'a1' => [
        'survey_pdf_id' => '10',
=======
//die('<pre>'.print_r($response, true).'<hr>'.curl_error($ch).'</pre>['.__LINE__.']');


$json = json_decode($response);
//die('<pre>'.print_r($response, true).'<hr>'.curl_error($ch).'</pre>['.__LINE__.']');


$data = [
    'a1'=>[        'survey_pdf_id' => '10',
>>>>>>> 8215f950 (.)
        'mobile_phone' => '321456789',
        'email' => 'test@email.com',
        'language' => 'it',
        'usesleft' => 1,

        'first_name' => 'Giacomo',
        'last_name' => 'Giocomo',
        'attribute_1' => '123',
        'attribute_2' => '123',
        'attribute_3' => '123',
    ],
<<<<<<< HEAD
'a2' => [
        'survey_pdf_id' => '10',
=======
    'a2'=>[        'survey_pdf_id' => '10',
>>>>>>> 8215f950 (.)
        'mobile_phone' => '321456789',
        'email' => 'aldo@email.com',
        'language' => 'it',
        'usesleft' => 1,
<<<<<<< HEAD

        'first_name' => 'Aldo',
=======
            'first_name' => 'Aldo',
>>>>>>> 8215f950 (.)
        'last_name' => 'Aldo',
        'attribute_1' => '123',
        'attribute_2' => '123',
        'attribute_3' => '123',
<<<<<<< HEAD
],

];

// die(print_r(http_build_query($data),true));
// die('<pre>'.print_r(curl_postfields_flatten($data),true).'</pre>');

=======
    ]
    
    
];

//die(print_r(http_build_query($data),true));
//die('<pre>'.print_r(curl_postfields_flatten($data),true).'</pre>');
>>>>>>> 8215f950 (.)
$headers = [
    // 'Content-Type: application/json',  //error
    'Authorization: Bearer '.$json->data->token,
    'Content-type: multipart/form-data',
];

curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_URL => $base_url.$addContact,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_VERBOSE => true,
<<<<<<< HEAD
// CURLOPT_POSTFIELDS => curl_postfields_flatten($data),
    CURLOPT_POSTFIELDS => ['data' => json_encode($data)],
]);
=======
    //CURLOPT_POSTFIELDS => curl_postfields_flatten($data),
    CURLOPT_POSTFIELDS => ['data'=>json_encode($data)],]);
>>>>>>> 8215f950 (.)

$response = curl_exec($ch);

// echo htmlspecialchars($response);
// exit('['.__LINE__.']');
echo '<pre>'.print_r($response, true).'</pre>';

curl_close($ch);

<<<<<<< HEAD
function curl_postfields_flatten($data, $prefix = '')
{
    if (! is_array($data)) {
        return $data; // in case someone sends an url-encoded string by mistake
    }

    $output = [];
    foreach ($data as $key => $value) {
        $final_key = $prefix ? "{$prefix}[{$key}]" : $key;
        if (is_array($value)) {
            // @todo: handle name collision here if needed
            $output += curl_postfields_flatten($value, $final_key);
        } else {
            $output[$final_key] = $value;
        }
    }

    return $output;
}
=======

function curl_postfields_flatten($data, $prefix = '') {
    if (!is_array($data)) {
      return $data; // in case someone sends an url-encoded string by mistake
    }
  
    $output = array();
    foreach($data as $key => $value) {
      $final_key = $prefix ? "{$prefix}[{$key}]" : $key;
      if (is_array($value)) {
        // @todo: handle name collision here if needed
        $output += curl_postfields_flatten($value, $final_key);
      }
      else {
        $output[$final_key] = $value;
      }
    }
    return $output;
  }
>>>>>>> 8215f950 (.)
