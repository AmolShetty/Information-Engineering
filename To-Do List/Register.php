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

<?php $nameErr = $pwdErr= $Err =$done= "";?>

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
            $myfile = fopen("UP.txt", "a") or die("Unable to open file!");
            $txt = $NAME."|".$PWD;
            fwrite($myfile, $txt."\n");
            fclose($myfile);
            setcookie($NAME, $NAME, time() + (86400 * 30), "/");
            $file = fopen($_COOKIE[$NAME].".txt", 'w') or die('Error opening file: '+$file_name);
            fclose($file);
            $done = 'Registration Done!';
            header("Location: Login.php");
            }
        }
    }

?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style = "text-align: center; margin-top: 10%; border: 3px solid maroon; padding: 1%; margin-left: 15%; margin-right: 15%; background-color: white;" >
    USERNAME: <input type="text" name="name" required><br><br>
    PASSWORD: <input type="password" name="pwd" required><br><br>
<input type="submit" value="REGISTER" class="button button1">
<?php echo $done; ?>
</form>
</body>
</html>

<?php echo $Err ?>
