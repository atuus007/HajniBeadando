<?php
$upload_dir = "images/";
$cols = 6;

$i =1;
$image_data_list = "no";

//Ha hiányzik a mappa, akkor ezt írja ki
	if (!is_dir("$upload_dir")) {
		echo "<p class=\"entry\">Hiba: A feltöltési mappa ($upload_dir) nem érhető el!</p>";
		echo "\n</section>
				\n</article>
				\n";
		echo include("oldal/footer.php");
		echo "\n</div>
				\n</body>
				\n</html>";
	exit(); //kilépés a scriptből
   }

// A megjelenítő tábla készítése:
echo "<table id=\"kepek\">
		<tr>";


$opendir = opendir($upload_dir);

while ($file = readdir($opendir)) {
        //megnézzük a fájlokat
        if($file != '..' && $file !='.' && $file !=''){
              
                if (!is_dir($file)){

					$imgsize = getimagesize ($upload_dir."".$file);
					$file_size = filesize($upload_dir."".$file);

		        if ($file_size >= 1048576){
					$show_filesize = number_format(($file_size / 1048576),2) . " MB";
		        }elseif ($file_size >= 1024){
					$show_filesize = number_format(($file_size / 1024),2) . " kB";
		        }elseif ($file_size >= 0){
					$show_filesize = $file_size . " bytes";
		        }else{
					$show_filesize = "0 bytes";
				}
				$last_modified = date ("Y.m.d.", filemtime($upload_dir."".$file));
			
				if ($imgsize[0] > 100){
					$base_img = "<img id=\"kepek\" src=\"$upload_dir$file\">";
				}else{
					$base_img = "<img id=\"kepek_kicsi\" src=\"$upload_dir$file\">";
				}
				
				//A kilistázó megjelenítése
				if ($image_data_list == "yes") {
					$all_stuff =  "<td class=\"data_yes\">Fájlnév: $file<hr>
									<p class=\"center\">
									<a href=\"$upload_dir$file\" target=\"_blank\">$base_img</a>
									</p>
									<p class=\"left\">
									Méret: $show_filesize
									<br>Felbontás: $imgsize[0]x$imgsize[1]px
									<br>Dátum: $last_modified
									</p>";
				}else{
					$all_stuff =  "<td class=\"data_no\"><a href=\"$upload_dir$file\" target=\"_blank\">
                                       $base_img</a>";
				}
				
				if (is_int($i / $cols)){
					echo "$all_stuff</td></tr><tr>";
				}else{
					echo "$all_stuff</td>";
                }
				$i++;
        }
	}
}
closedir($opendir);
clearstatcache();
echo "</tr>
</table>";
?>
