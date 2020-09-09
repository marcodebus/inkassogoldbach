
<?php

$url = "https://sourceway.de/de/mahnapi/interface";
$data = Array(
    "apikey"    => "",                // Ihr API-Schlüssel
    "demo"      => "0",               // Achtung! Es entstehen Kosten!
    "anrede"    => "1",
    "firstname" => "Max",
    "lastname"  => "Mustermann",
    "address"   => "Eurode-Park 1",
    "postcode"  => "52134",
    "city"      => "Herzogenrath",
    "reason1"   => "Webspace",
    "amount1"   => 19.99,
    "date1"     => "02.01.2019",
    "reason2"   => "Server",
    "amount2"   => 59.99,
    "date2"     => "02.01.2019",
    "porto"     => 2.50,
    "ruecklast" => 6.00,
    "gz"        => "Kunde 1234",
    "reference" => "1234-2019-01-02",
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$res = curl_exec($ch);
curl_close($ch);

if (!$res || !is_array($res = @json_decode($res, true))) {
    die("Fehlerhafte Antwort");
}

if ($res['status'] != "1000") {
    die("Fehler: " . $res['message'] . " (" . $res['status'] . ")");
}

file_put_contents(__DIR__ . "/Mahnantrag.pdf", base64_decode($res['file']));
echo "Mahnantrag erfolgreich generiert [ <a href=\"Mahnantrag.pdf\">Herunterladen</a> ]";
