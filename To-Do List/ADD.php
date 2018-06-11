<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['zname'])) {
        $txt = $_POST['fname']."|".$_POST['lname']."|".$_POST['zname'];
        $myfile = fopen($_COOKIE['varname'].".txt", "a") or die("Unable to open file!");
            fwrite($myfile, $txt."\n");
            fclose($myfile);
    }
}
?>
