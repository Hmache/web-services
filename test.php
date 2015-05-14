<?php

include('Youtube.php');

$yt= new Youtube('taylorswiftvevo'); // id d'user/channel

$videos=$yt->videoList();

echo( $videos);

?>
