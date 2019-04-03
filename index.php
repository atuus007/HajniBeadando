<?php
	include("config/config.php");
	$page = GetPage();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP Shit</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<link href="style/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body  background="style/animus.gif">
		<div class='wrapper'>
			<header>
				<a href="https://abstergo.org/">
					<img border="10" alt="W3Schools" src="style/logo.png" width="10%">
				</a>

				<div class="header_text">
					<h1>Abstergo Entertaiment</h1>
					<p>...powered by Abstergo Inc.</p>
				</div>
				
				<section class="logged_user">
					<label>
						<?php 
						if(isset($_SESSION['username'])){
							echo "Üdv ".$_SESSION["first_name"]." ".$_SESSION["last_name"]." (".$_SESSION['username'].")!";
						}
						?>
					<label>
				</section>
				<section class="nav">
					<nav>
						<?php echo ListMenu($page);?>
					</nav>
				</section>
			</header>
			<aside>
				<section class="block_search">
					<form method=get action="http://www.google.com/search">
						<input type=text name=q size=23 maxlength=255 value=""><br>
						<input type=submit name=btng value="keresés">
					</form>
					<script type="text/javascript" src="http://www.google.com/cse/tools/onthefly?form=searchbox_demo&lang=hu"></script>
				</section>
			</aside>
			<article>
				<section class="content">
					<?php include("content/".$page.".php");?>
				</section>
			</article>

		</div>
	</body>
</html>
