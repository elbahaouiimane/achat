<?php
function getAuthToken() {
    $url = 'https://192.168.1.78:50000/b1s/v1/Login';
    $data = json_encode([
        "CompanyDB" => "SAP",
        "UserName" => "STAGIAIRE_2",
        "Password" => "123456"
    ]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}
?>