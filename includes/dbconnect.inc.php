<?php
@$link = mysql_connect('localhost', 'root', 'Federation123');
mysql_select_db('wikis', $link);

$google_client_id   = '410890732747-q1h7kk4tt2s9gnu40knibe8oof5tegfi.apps.googleusercontent.com';
$google_client_secret   = 'o2Wuq3SYDoVZMDd1N3y2bman';
$google_redirect_url    = 'http://localhost:8080/wiki-legacy/';
$google_developer_key   = 'AIzaSyAPSXwZObB9e7vfOS3GoJQ85Fbuo8Kd9Q8';


?>