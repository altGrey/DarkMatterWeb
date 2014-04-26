<?php
/*  DarkMatterWeb is 3D Web Social Communications Web Software.
	DarkMatterWeb is Copyright (c) 2014 Joel Ward (White Rabbit),
	but is released under open source license with the MIT License
	with hopes that humanity in general may freely benefit from
	our development work on this effort. 
	======= */

include(pathPRIVATE.'includes/dbLIB.php');
include(pathPRIVATE.'includes/commonLIB.php');
$dmt['master'] = getLocalConfig($dmt,$varkey,"master");
if (!isset($_SESSION['token'])) {
	$_SESSION['token'] = md5(uniqid(rand(), true));
}
$dmt['token'] = $_SESSION['token'];
$dmt['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION = initSession($_SESSION);
$_SESSION = agentSession($_SESSION,$_SERVER['HTTP_USER_AGENT']);
$dmt['get'] = safeGet($_GET);
define("unixtime",time());
define("prettytime",getPrettyTime(unixtime));
$dmt['plugin']['define']['types'] = array("pre","run","post");
$xtt = 0;
while(isset($dmt['plugin']['define']['types'][$xtt])) {
	$dmt['indexCALL']['result'][0] = myquery("SELECT COUNT() FROM `".dbprfx."plugins-list` where `plugin-type` = '".$dmt['plugin']['define']['types'][$xtt]."' AND (`plugin-flags` LIKE ';;ALL|ALL;;' AND `plugin-flags` NOT LIKE ';;DENY|'.".$dmt['get']['id'].";;')");
	if(mysql_result($dmt['indexCALL']['result'][0],0) > 0)) {
		$dmt['indexCALL']['result'][1] = myquery("SELECT * FROM `".dbprfx."plugins-list` where `plugin-type` = '".$dmt['plugin']['define']['types'][$xtt]."' AND (`plugin-flags` LIKE ';;ALL|ALL;;' AND `plugin-flags` NOT LIKE ';;DENY|'.".$dmt['get']['id'].";;')");
		$xii = 0;
		while($xii <= mysql_result($dmt['indexCALL']['result'][0],0)) {
			$dmt['indexCALL']['array'][1] = myarray($dmt['indexCALL']['result'][1]);
			if(file_exists(pathPRIVATE."plugins/plg-".$dmt['indexCALL']['array'][1]['plugin-name']."/".$dmt['plugin']['define']['types'][$xtt].".php")) {
				include(pathPRIVATE."plugins/plg-".$dmt['indexCALL']['array'][1]['plugin-name']."/".$dmt['plugin']['define']['types'][$xtt].".php");
			}
			$xii++;
		}
		
	}
	$xtt++;
}