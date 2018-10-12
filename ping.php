<?php
header('Content-type: application/json');
error_reporting(0);

$domains = array('ping.chigo.cf','ping.chigo.ga','ping.chigo.gq','ping.chigo.ml','ping.chigo.tk');
foreach($domains as $host) {
    $timehost = time().'.'.$host;
    $res = dns_get_record($timehost, DNS_A);
    //$resarr[] = $timehost;
    $resarr[] = $res[0]['ip'];
}

$c = json_encode($resarr);
file_put_contents('res.json', $c);
echo $c;
