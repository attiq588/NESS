<?php
/**
 *	@File name:	example.php
 *	@todo: 	example
 *	@author:	zhys9 @ 2008-03-24 <email>zhys99@gmail.com</email>
 */
 require './ParseXml.class.php';
 
 $xml = new ParseXml();
 $xml->LoadFile("./test.xml");
 //$xml->LoadString($xmlString);
 //$xml->LoadRemote("http"//www.yourdomain.com/dir/filename.xml", 3);
 $dataArray = $xml->ToArray();
 
 print_r($dataArray);
?>