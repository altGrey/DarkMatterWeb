<?php
/*  DarkMatterWeb is 3D Web Social Communications Web Software.
	DarkMatterWeb is Copyright (c) 2014 Joel Ward (White Rabbit),
	but is released under open source license with the MIT License
	with hopes that humanity in general may freely benefit from
	our development work on this effort. 
	======= */

//MySQL Query Database
function myquery($itt,$varkey,$query) {
	mysql_connect($itt['$varkey']['db']['dbhost'], $itt['$varkey']['db']['dbuser'], $itt['$varkey']['db']['dbpass']);
	mysql_select_db($itt['$varkey']['db']['dbname']);
	$result = mysql_query($query);
	if (!mysql_errno() && @mysql_num_rows($result) > 0) {
}
else {
$result="not";
}
	mysql_close();
	return $result;
}
// MySQL Num Rows
function myrows($result) {
	$rows = @mysql_num_rows($result);
	return $rows;
}
// MySQL fetch array
function myarray($result) {
	$array = mysql_fetch_array($result);
	return $array;
}
// MySQL escape string
function myescape($query) {
	$escape = mysql_escape_string($query);
	return $escape;
}