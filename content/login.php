<?php
    include_once("config/config.php");
    include("config/connect.php");
    $username = $password ="";
    $username_err = $password_err = "";
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }

        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
        if(empty($username_err) && empty($password_err)){
            $sql = "SELECT id, username,first_name,last_name ,password FROM users WHERE username = ?";
            if($stmt = mysqli_prepare($conn, $sql)){

                mysqli_stmt_bind_param($stmt, "s", $param_username);
                $param_username = $username;
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        mysqli_stmt_bind_result($stmt, $id, $username,$first_name, $last_name, $hashed_password);

                        if(mysqli_stmt_fetch($stmt)){
                            if(md5($password) == $hashed_password){

                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                $_SESSION["first_name"] = $first_name;
                                $_SESSION["last_name"] = $last_name;

                            }else{
                                $password_err = "The password you entered was not valid.";
                                echo "The password you entered was not valid.<br>";
                            }
                        }
                    }else{
                        $username_err = "No account found with that username.";
                        echo "No account found with that username.<br>";
                    }
                }else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    }
    if(isset($_SESSION["username"])){
        include("content/profile.php");
    }else{

        echo "<h2>".$oldalak["login"]["menuszoveg"]."</h2>";
        print "
        <form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
            <label>Felhasználónév:</label><br/>
            <input type = \"text\" name = \"username\" class = \"box\"/><br/>
            <label>Jelszó:</label><br/><input type = \"password\" name = \"password\" class = \"box\" /><br/>

            <div class=\"form-group\">
                <input type = \"submit\"  name=\"login\" value = \"Bejelentkezés\" class=\"btn btn-primary\"/>
            </div>
        </form>";
    }
?>
