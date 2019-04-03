<?php
	session_start();
	$oldalak = array(
		"kezdolap" => array("fajl"=>'kezdolap', "menuszoveg"=>"Kezdőlap"),
		"galeria" => array("fajl"=>'galeria', "menuszoveg"=>"Galéria"),
		"kapcsolat" => array("fajl"=>'kapcsolat', "menuszoveg"=>"Kapcsolat"),
		"gyik" => array("fajl"=>'gyik', "menuszoveg"=>"GYIK"),
		"login" => array("fajl"=>'login', "menuszoveg"=>"Bejelentkezés"),
		
	);
	
	
	function ListMenu($page){

		global $oldalak;
		if(isset($_SESSION["username"]))
			$oldalak["login"]["menuszoveg"]="Profil";
		else{
			$oldalak["login"]["menuszoveg"]="Bejelentkezés";
		}
		$kiir='<ul>';
		foreach($oldalak as $oldalnev => $oldalleir){
			if ($oldalleir["fajl"] == $page) {
				$kiir .= '<li><a class="aktiv" href="?pid='.$oldalnev.'">'.$oldalleir["menuszoveg"].'</a></li>';
			} else {
				$kiir .= '<li><a href="?pid='.$oldalnev.'">'.$oldalleir["menuszoveg"].'</a></li>';
			}
		}
		$kiir .= '</ul>';
		return $kiir;
	}
	function GetPage() {
		global $oldalak;
		$page = $oldalak["kezdolap"]["fajl"];
		if (isset($_GET["pid"]) and isset($oldalak[$_GET["pid"]])) {
			$pid = $oldalak[$_GET["pid"]]["fajl"];
			if (file_exists("content/".$pid.".php"))
			  $page = $pid;
		}
		return $page;
	}
?>