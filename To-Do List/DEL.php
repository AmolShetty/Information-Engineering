<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['zname'])) {
        $txt = $_POST['fname']."|".$_POST['lname']."|".$_POST['zname'];
        $contents = file_get_contents($_COOKIE['varname'].".txt");
                    $contents = str_replace($txt, '', $contents);
                    file_put_contents($_COOKIE['varname'].".txt", $contents);
    }
}
?>
