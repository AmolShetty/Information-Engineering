/* // Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

 // Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
} */

/*
// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var DueDate = document.getElementById("DueDate").value;
  var Created_Date = document.getElementById("CreatedDate").value;
  var t = document.createTextNode(inputValue + "  " + "Due Date is " + DueDate + " Created Date was " + Created_Date);
  li.appendChild(t);
  var Due = (new Date(DueDate)).getDate();
  var Create = (new Date(Created_Date)).getDate();
  var x = Due - Create;
  //document.getElementById("demo").innerHTML = x;
  if(x >= 3){
    li.style.backgroundColor = "violet";
  }
  else if(x==2){
    li.style.backgroundColor = "indigo";
  }
   else if(x==1){
    li.style.backgroundColor = "blue";
  }
   else if(x==0){
    li.style.background = "green";
  }
   else if(x==-1){
    li.style.backgroundColor = "yello";
  }
   else if(x==-2){
    li.style.backgroundColor = "orange";
  }
   else if(x<=-3){
    li.style.backgroundColor = "red";
  }
  else{
    li.style.backgroundColor = "grey";
  }

  if (inputValue === '') {
    alert("You must write something!");
  }
  else if (DueDate === '') {
    alert("You must enter a DueDate");
  }
  else if (Created_Date === '') {
    alert("You must enter a Created Date");
  }else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);
  var close = document.getElementsByClassName("close");
  var i;
  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
*/
function NewF() {
  var inputValue = document.getElementById("myInput").value;
  var DueDate = document.getElementById("DueDate").value;
  var Created_Date = document.getElementById("CreatedDate").value;
  if (inputValue === '') {
    alert("You must write something!");
  }
  else if (DueDate === '') {
    alert("You must enter a DueDate");
  }
  else if (Created_Date === '') {
    alert("You must enter a Created Date");
  }else {


  var table = document.getElementById("myTable");
  var row = table.insertRow(-1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);

  var Due = new Date((new Date(DueDate).toUTCString())).getUTCDate();
  var Create = new Date((new Date(Created_Date).toUTCString())).getUTCDate();
  var x = Due - Create;
  //document.getElementById("demo").innerHTML = Create;
  if(x >= 3){
    row.style.backgroundColor = "violet";
  }
  else if(x==2){
    row.style.backgroundColor = "indigo";
  }
   else if(x==1){
    row.style.backgroundColor = "blue";
  }
   else if(x==0){
    row.style.background = "green";
  }
   else if(x==-1){
    row.style.backgroundColor = "yellow";
  }
   else if(x==-2){
    row.style.backgroundColor = "orange";
  }
   else if(x<=-3){
    row.style.backgroundColor = "red";
  }
  else{
    row.style.backgroundColor = "grey";
  }
  cell1.innerHTML = inputValue;
  cell2.innerHTML = Created_Date;
  cell3.innerHTML = DueDate;
  cell4.innerHTML = "\u00D7";
  cell4.className ="cl";

  var xhttp = new XMLHttpRequest();
  var x =document.getElementById("myInput").value;
  var y = document.getElementById("CreatedDate").value;
  var z = document.getElementById("DueDate").value;
  xhttp.open("POST", "ADD.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("fname="+x+"&lname="+y+"&zname="+z);

  cell4.onclick = function() {
    var tr = this.parentElement;
    tr.style.display = "none";
    var i;
    var c = [];
    var len = tr.cells.length;
    for (i = 0; i < len; i++) {
        var t = tr.cells[i].innerHTML;
        c[i]= t;
      }
    var xhttpz = new XMLHttpRequest();
    var x =c[0];
    var y = c[1];
    var z = c[2];
    xhttpz.open("POST", "DEL.php", true);
    xhttpz.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttpz.send("fname="+x+"&lname="+y+"&zname="+z);

}
  /*
  var close = document.getElementsByClassName("cl");
  var i;
  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
      }
    } */
  }
  document.getElementById("myInput").value = "";
  document.getElementById("CreatedDate").value = "";
  document.getElementById("DueDate").value = "";
}
