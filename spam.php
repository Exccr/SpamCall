<?php

echo "
    ____            _____
   / __ \__  ______/ /   |____
  / /_/ / / / / __  / /| /_  /
 / _, _/ /_/ / /_/ / ___ |/ /_
/_/ |_|\__,_/\__,_/_/  |_/___/
\n
**************************************
*                                    *
* Github : github.com/Exccr          *
* Facebook : fb.com/rud.az.9         *
* Instagram : instagram.com/rud.az_  *
*                                    *
**************************************
\n\n";

function spamCall($api, $nomer, $jumlah, $delay) {
	$url = "https://spamertelpon.herokuapp.com/v1?key=". $api ."&target=". $nomer;
	$loop = 0;
	while ($loop < $jumlah) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($curl);
		curl_close($curl);
		$res = json_decode($response, true);
		if ($res['status'] !== true) {
			echo "Minimal beli Api Key! \n";
		} else {
			echo "Spam ke " . $loop + 1 . " berhasil dikirim! \n";
		}
		sleep($delay);
		$loop++;
	}
}

echo "Masukan Nomor : ";
$nomor = trim(fgets(STDIN));
echo "\nMasukan Jumlah : ";
$jumlah = trim(fgets(STDIN));
echo "\nMasukan jeda : ";
$delay = trim(fgets(STDIN));
if (!$delay) {
	$delay = "30";
}
echo "\nMasukan Key : ";
$key = trim(fgets(STDIN));

spamCall($key, $nomor, $jumlah, $delay);
