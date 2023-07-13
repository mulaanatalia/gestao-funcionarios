<?php @session_start(); 

function callapi($url, $requesttype="GET", $data=[]){
    $curl = curl_init();

    $array = array(
    // CURLOPT_PORT => "5000",
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $requesttype,
    );
    if(!empty($data)){
        $array[CURLOPT_POSTFIELDS] = json_encode($data);
    }
    
    $array[CURLOPT_COOKIE] = "session=eyJ1c3VhcmlvX2lkIjo0fQ.ZEPcTg.n7ev28KBwhihaZlcP4w-3U43qTs";
    $array[CURLOPT_HTTPHEADER] = array(
        // "Authorization: Bearer ".$_SESSION['access_token'],
        'Content-Type: application/json'
    );
    curl_setopt_array($curl, $array);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return json_decode($err);
    } else {
        return json_decode($response);
    }


}