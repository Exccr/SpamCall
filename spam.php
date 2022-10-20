<?php

echo "
    ____            _____
   / __ \__  ______/ /   |____
  / /_/ / / / / __  / /| /_  /
 / _, _/ /_/ / /_/ / ___ |/ /_
/_/ |_|\__,_/\__,_/_/  |_/___/
\n\n";

function spamCall($api, $nomer, $jumlah) {
	$url = "https://spamertelpon.herokuapp.com/?key=". $api ."&nohp=". $nomer;
	$loop = 0;
	while ($loop < $jumlah) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($curl);
		curl_close($curl);
		$res = json_decode($response, true);
		if ($res['status'] !== "success") {
			echo "Minimal beli Api Key! \n";
		} else {
			echo "Spam ke " . $loop . " berhasil dikirim! \n";
		}
		sleep(30);
		$loop++;
	}
}

echo "Masukan Nomor : ";
$nomor = trim(fgets(STDIN));
echo "Masukan Jumlah : ";
$jumlah = trim(fgets(STDIN));
echo "Masukan Key : ";
$key = trim(fgets(STDIN));

spamCall($key, $nomor, $jumlah);