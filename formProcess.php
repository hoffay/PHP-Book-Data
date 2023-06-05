<html>
<body>
<?php
$sql1="SELECT BT,AD,PD,BA,AN,PN,publDate,SUBSTRING(publDate,1, CHAR_LENGTH(publDate) - 8) 
AS noTime 
FROM auth,book,publ
WHERE (BT LIKE 'R%' OR BT LIKE 'S%' OR BT LIKE 'T1' OR BT LIKE 'T2' OR (publDate >= CURDATE() - INTERVAL 62 DAY )) and BP=PN AND BA=AN;";

$sql2="SELECT BT,AN,AD,BA,BT,AN,publDate, PD, SUBSTRING(publDate,1, CHAR_LENGTH(publDate) - 8)
AS noTime 
FROM auth,book,publ
LEFT JOIN book ON BA = AN
LEFT JOIN publ ON BP = PN;";


$servername = "127.0.0.1";
$dbname = "ryahof";
$username = $_POST['user'];
$password = $_POST['pass'];
$name = $_POST['name'];
$q1 = $_POST['query1'];
$q2 = $_POST['query2'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("<b>Authentication Failure:      </b>". $name." ". $username);
}
else{
print("<b>Authentication Sucess:      </b>".$name." ".$username);
}
echo "<br>";
if($q1==TRUE)
print "<b>Query 1 is: </b>". $sql1 . "<br>";

if($q2==TRUE)
print "<b>Query 2 is: </b>". $sql2 . "<br>";

if($q1 == FALSE && $q2 == FALSE)
print "<b>No querry was selected</b><br>";


// Create connection

if($q1==TRUE){
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
  echo "<table border='1'>
  <tr><th colspan='4'>Query1</th></tr>
  <tr>
<th>Book Title</th>
<th>Publisher Address</th>
<th>Author name</th>
<th>Publish Date</th>
</tr>";
  while($row = $result1->fetch_assoc()) {
    echo "<tr><td>" . $row["BT"] . "</td>" . "<td>" . $row["PD"] ."</td>" . "<td>". $row["AN"] . "</td>" . "<td>" . $row["noTime"] . "</td></tr>";
  }
  echo "</table>";
}
}
if($q2==TRUE){
        $result2 = $conn->query($sql2);
        
        if ($result2->num_rows > 0) {
          echo "<table border='1'>
          <tr><th colspan='5'>Query2</th></tr>
          <tr>
        <th>Author Name</th>
        <th>Author Address</th>
        <th>Book Title</th>
        <th>Publisher Date</th>
        <th>Publisher Address</th>
        </tr>";
          while($row = $result2->fetch_assoc()) {
            echo "<tr><td>" . $row["AN"] . "</td>" . "<td>" . $row["AD"] ."</td>" . "<td>". $row["BT"] . "</td>" . "<td>" . $row["noTime"] . "</td>" . "<td>". $row["PD"] . "</td></tr>";
          }
          echo "</table>";
        }
}
echo "formCreation.php";
$file = 'formCreation.php';
$orig = file_get_contents($file);
$a = htmlentities($orig);
echo '<code>';
echo '<pre>';
echo $a;
echo '</pre>';
echo '</code>';

echo "formProcess.php";
$file = 'formProcess.php';
$orig = file_get_contents($file);
$a = htmlentities($orig);
echo '<code>';
echo '<pre>';
echo $a;
echo '</pre>';
echo '</code>';
?>