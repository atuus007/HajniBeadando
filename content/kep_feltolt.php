<?php
$upload_dir = "images/";
$size_bytes = 1048576;
$extlimit = "yes";
$limitedext = array(".gif",".jpg",".png",".jpeg");

if (!is_dir("$upload_dir")) {
	echo "<p class=\"entry\">Hiba: A feltöltési mappa ($upload_dir) nem érhető el!</p>";
	exit();
}

if (!is_writeable("$upload_dir")){
	echo "<p class=\"entry\">
	Hiba: a feltöltési mappa: ($upload_dir) NEM írható, változtasd a CHMOD-ot ('777')-re!";

	exit();
}

if(isset($_POST['uploadform'])){

	$file_tmp = $_FILES['filetoupload']['tmp_name'];
	$file_name = $_FILES['filetoupload']['name'];
	$file_size = $_FILES['filetoupload']['size'];

	if (!is_uploaded_file($file_tmp)){
		echo "<p class=\"entry\">
			Hiba: Nem válaszott ki fájlt feltöltésre.
		</p>";
		echo "<meta http-equiv='refresh' content=2>";
		exit();
	}
	if ($file_size > $size_bytes){
		echo "<p class=\"entry\">
		Hiba: a Fájl mérete meghaladja a megengedett limitet:
		<strong>"
			. $size_bytes / 1024 / 1024 .
		"</strong>
		MB.
		</p>";
		echo "<meta http-equiv='refresh' content=2>";
		exit();
	}

	$ext = strrchr($file_name,'.');
	if (($extlimit == "yes") && (!in_array(strtolower($ext),$limitedext))) {
		echo "<p class=\"entry\">
				Hiba: Nem megfelelő a fájl neve!
			</p>";
		echo "<meta http-equiv='refresh' content=2>";
		exit();
	}

	if(file_exists($upload_dir.$file_name)){
		echo "<p class=\"entry\">
			Hoppá! Egy ilyen nevű fájl már található a szerveren: <strong>$file_name</strong>
			</p>";
		echo "<meta http-equiv='refresh' content=2>";
		exit();
	}

	$file_name = str_replace(' ', '_', $file_name);

	if (move_uploaded_file($file_tmp,$upload_dir.$file_name)) {
		echo "
		<p class=\"entry\">A fájlod (
			<strong>
				<a href=\"$upload_dir$file_name\" target=\"_blank\">
					$file_name
				</a>
			</strong>)
			sikeresen feltöltve!
		</p>";
		echo "<meta http-equiv='refresh' content=2>";
		exit();
	}else{
		echo "
		<p class=\"entry\">
			Hiba történt a fájl feltöltésében. Próbáld újra!
		</p>";
		echo "<meta http-equiv='refresh' content=2>";
		exit();
	}
}else{
	echo
		"<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">"
		// ."<h3>Képfeltöltés</h3>"
		."<p class=\"entry\">Válassza ki a fájlt feltöltésre!<br>";
		// ."Érvényes kiterjesztések:"
		// for($i=0;$i<count($limitedext);$i++){
		// 	if (($i<>count($limitedext)-1)){
		// 		$commas=", ";
		// 	}else{
		// 		$commas="";
		// 	}
		// 	$all_ext = $limitedext[$i].$commas;
		// 	echo $all_ext;
		// }
	echo "<br>"
		// ."Max fájl méret: ". $size_bytes / 1024 / 1024 ."MB</p>"
		."<input type=\"file\" name=\"filetoupload\" accept=\"image/jpeg, image/png, image/gif\" >"
		."<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"$size_bytes\">"
		."<br>"
		."<input type=\"Submit\" name=\"uploadform\" value=\"Feltöltöm\">"
		."</form>";
}
?>
