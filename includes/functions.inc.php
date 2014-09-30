<?php

function clean_wiki($data){
	$data = str_replace('http://www.myaiesec.net/content/viewwiki.do?contentid=', 'view_wiki.php?id=', $data);
	$data = str_replace('viewwiki.do?contentid=', 'view_wiki.php?id=', $data);
	return $data;
}

function get_committee($code){
	$result = mysql_query("SELECT * from `committees` WHERE `committee_id`=$code");
	$row = mysql_fetch_assoc($result);
	return $committee_name = $row['committee_name'];
}

?>