#!/usr/bin/env php
<?php
include(__DIR__ . '/../init.inc.php');
$fp = gzopen($_SERVER['argv'][1], 'r');
$curl = curl_init();
while ($line = fgets($fp)) {
    list($id, $data) = explode(',', $line, 2);
    $url = getenv('SEARCH_URL') . '/company/company/' . $id;
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $ret = curl_exec($curl);
}
