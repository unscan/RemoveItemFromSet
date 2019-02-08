<?php

include ("file_containing_api_key.php");

$set_id = $_POST["set_id1"];
$barcode = $_POST["barcode1"];

$info = simplexml_load_file('set_item.xml');



$info->members->member->id = $barcode;
file_put_contents('set_item.xml',$info->saveXML());
// save the updated document

$xml = file_get_contents("set_item.xml");
$URL = "https://api-eu.hosted.exlibrisgroup.com/almaws/v1/conf/sets/$set_id?id_type=BARCODE&op=delete_members&apikey=$apikey";

    //setting the curl parameters.
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,$URL);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        if (curl_errno($ch)) 
    {
        // moving to display page to display curl errors
          echo curl_errno($ch) ;
          echo curl_error($ch);
    } 
    else 
    {
        //getting response from server
        $response = curl_exec($ch);
         print_r($response);
         curl_close($ch);
    }

?>