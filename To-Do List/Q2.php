<!DOCTYPE html>
<html>
<head>
<title>TO DO LIST</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="Q2.css">
<script type="text/javascript" src="Q2.js"></script>
</head>

<body>

<div id="myDIV" class="header">
  <h2 style="margin:5px">My To Do List</h2>

<form name="1">
<h3<>Title</h3><br>
<!-- <input type="text" id="myInput" placeholder="Title..." style="background-color: lightgrey"><br> -->
<textarea id="myInput" rows="5" cols="80" style="background-color: lightgrey"></textarea><br>
<h3<>Created Date</h3><br>
<input type="Date" id="CreatedDate" style="background-color: lightgrey"><br>
<h3<>Due Date</h3><br>
<input type="Date" id="DueDate" style="background-color: lightgrey"><br><br>
<input class="addBtn" type="button" onclick="NewF(); submitForm();"  value="ADD" >
</form>
</div>

<table id="myTable">
  <tr>
    <th style="width: 50%">Task</th>
    <th>Created</th>
    <th>Due</th>
    <th style="width: 5%">Remove</th>
  </tr>


<?php
$var_value = $_COOKIE['varname'];
$myfile = fopen($var_value.".txt", "r") or die("Unable to open file!");
            // Output one line until end-of-file
            while(!feof($myfile)) {
                $arr = explode("|",fgets($myfile));
                if(!empty($arr[0]) && !empty($arr[1])){
                $task =  $arr[0];
                $Created =  $arr[1];
                $Due = $arr[2];
                $z = date("d", strtotime($Created));
                $y = date("d", strtotime($Due));
                $x = $y - $z;
                if($x >= 3){
                  $col = "violet";
                }
                else if($x==2){
                  $col = "indigo";
                }
                 else if($x==1){
                  $col = "blue";
                }
                 else if($x==0){
                  $col = "green";
                }
                 else if($x==-1){
                  $col = "yellow";
                }
                 else if($x==-2){
                  $col = "orange";
                }
                 else if($x<=-3){
                  $col = "red";
                }
                else{
                  $col = "grey";
                }
                echo "<tr style='background-color:$col'>"."<td style='width: 50%''>".$task."</td>"."<td>".$Created."</td>"."<td>".$Due."</td>"."<td class='cl style='width: 5%''>"."&#10005;"."</td>"."</tr>";
                }
              }

              echo "<script> var close = document.getElementsByClassName('cl');
                    var i;
                    for (i = 0; i < close.length; i++) {
                    close[i].onclick = function() {
                    var tr = this.parentElement;
                    var j;
                    var c = [];
                    var len = tr.cells.length;
                    for (j = 0; j < len; j++) {
                        var t = tr.cells[j].innerHTML;
                        c[j]= t;
                      }
                    var xhttpz = new XMLHttpRequest();
                    var x =c[0];
                    var y = c[1];
                    var z = c[2];
                    xhttpz.open('POST', 'DEL.php', true);
                    xhttpz.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhttpz.send('fname='+x+'&lname='+y+'&zname='+z);
                    tr.style.display = 'none';

                    }
                  }
                  </script>";
?>

</table>
<!--
<ul id="myUL">
</ul>
<p id="demo"> TEST</p>-->
</body>
</html>
