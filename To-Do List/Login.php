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

<?php $nameErr = $pwdErr= $Err =""; ?>
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$username=$user=$password=$pwd="";

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
            // Output one line until end-of-file
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
            }
        }
            fclose($myfile);

            if($NAME===$user && $PWD===$pwd){
            setcookie('varname', $user, time() + (86400 * 30), "/");
            header("Location:Q2.php");
            }
            else{
            $Err =  "Invalid Username or/and Password. Please Try Again.";
            }
        }
    }


?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style = "text-align: center; margin-top: 10%; border: 3px solid maroon; padding: 1%; margin-left: 15%; margin-right: 15%; background-color: white;" >
USERNAME: <input type="text" name="name"><span class="error">* <?php echo $nameErr;?></span><br><br>
PASSWORD: <input type="password" name="pwd"><span class="error">* <?php echo $pwdErr;?></span><br><br>
<input type="submit" class="button button1"><br><br>
<input type="submit" value="REGISTER" formaction="Register.php" class="button button1"><br><br>
<input type="submit" value="DELETE" formaction="delete.php" class="button button1"><br><br>
<?php echo $Err ?>
</form>
</body>
</html>

