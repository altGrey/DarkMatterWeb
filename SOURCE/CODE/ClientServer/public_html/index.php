<?php
/*  DarkMatterWeb is 3D Web Social Communications Web Software.
	DarkMatterWeb is Copyright (c) 2014 Joel Ward (White Rabbit),
	but is released under open source license with the MIT License
	with hopes that humanity in general may freely benefit from
	our development work on this effort. 
	======= */

session_start();
function procheck() { return TRUE; }
include("path.php");
include(pathREL.'config/common/defCONFIG.php');
include(pathPRIVATE.'indexCALL.php');