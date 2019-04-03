<?php

    if(isset($_POST["logout"])){
        $_SESSION = array();
        if(session_destroy()) {
            echo "<meta http-equiv='refresh' content=1>";
        }
    }

?>
<h2>Profil</h2>
<form method="post" enctype="multipart/form-data" action="">
        <input type = "submit" name="logout" value = "Kijelentkezés" class="btn btn-primary"/><br/>
</form>