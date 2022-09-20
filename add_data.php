<?php
require 'query.php';
require 'postchecker.php';
define("RECAPTCHA_V3_SECRET_KEY", '6LfcvQMiAAAAAHHz2I-qIfhsY8eBs_RxXeGyyfTD');

$token = $_POST['token'];
$action = $_POST['action'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);

if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
    // valid submission
    // go ahead and do necessary stuff
    $contact = new PostChecker([
        'name' => 'string[2;255]',
        'firstname' => 'string[2;255]',
        'description' => 'text[0;3000]',
        'email' => 'email[3;255]',
        'myImage' => 'image[0;2000000]'
    ]);
    $database = new Query('hacker');
    $result = $contact->check();
    if(!$result['_hasError']) {
        $database->executeQuery("insert into formulaire
    (name, lastname, description, email, myImage)
    values
    (?, ?, ?, ?, ?)", [
            $result['name'],
            $result['firstname'],
            $result['description'],
            $result['email'],
            $result['myImage']
        ]);
        echo  "Formulaire Envoyer avec Succès";
    }
} else {
    // spam submission
    // show error message
    echo  "Erreur Formulaire Captcha";
}

