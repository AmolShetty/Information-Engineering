<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>


    .error {color: #FF0000;}
    .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

  .button1 {
    background-color: white;
    color: black;
    border: 2px solid maroon;
}
.button1:hover {
    background-color: maroon;
    color: white;
}
...
</style>
</head>
<body style="background-color: grey;">

<?php $nameErr = $pwdErr= $Err =$user=$pwd=$username=$password= "";?>

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Username is required";
      }
    else {
        $NAME = test_input($_POST["name"]);
        if (empty($_POST["pwd"])) {
            $pwdErr = "Password is required";
        }
        else {
            $PWD = test_input($_POST["pwd"]);

            $myfile = fopen("UP.txt", "r") or die("Unable to open file!");
            while(!feof($myfile)) {
                    $arr = explode("|",fgets($myfile));
                    if(!empty($arr[0]) && !empty($arr[1])){
                        $username =  test_input($arr[0]);
                        $password =  test_input($arr[1]);
                }
                if($NAME===$username && $PWD===$password){
                    $user = $username;
                    $pwd = $password;
                    break;
                }
                else{
                    $Err = "No such Username & password combination found. Please check and retry.";
                }
            }
                if($NAME===$user && $PWD===$pwd){
                    $contents = file_get_contents("UP.txt");
                    $x = $NAME."|".$PWD;
                    $contents = str_replace($x, '', $contents);
                    file_put_contents("UP.txt", $contents);
                    header("Location: Login.php");
                }




            /*
            file_put_contents($dir, $contents);
            $myfile = fopen("UP.txt", "a") or die("Unable to open file!");
            $txt = $NAME."|".$PWD;
            fwrite($myfile, $txt."\n");
            fclose($myfile);
            echo 'alert(Registration Done!)';
            header("Location: Login.php" );
            */
            }

    }
}
?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style = "text-align: center; margin-top: 10%; border: 3px solid maroon; padding: 1%; margin-left: 15%; margin-right: 15%; background-color: white;">
    USERNAME: <input type="text" name="name" required><br><br>
    PASSWORD: <input type="password" name="pwd" required><br><br>
<input type="submit" value="DELETE" class="button button1"><br>
<?php echo $Err ?>
</form>
</body>
</html>
