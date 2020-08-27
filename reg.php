<?php
$req=$_GET["q"];
$r1=explode(",",$req,3);

//$r1=str_word_count($req,1);
//$user=strval($r1[0]);
//$pass=strval($r1[1]);
$user=strval($r1[0]);
$pass=strval($r1[2]);
$email=strval($r1[1]);
//var_dump($r1[0]);
//var_dump($r1[1]);
//echo $user." 1 ".$pass." 1 ".$email;
// Create connection
$conn = mysqli_connect("localhost","root","","shivadb");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT '$user', '$pass' FROM login WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
    echo "0";
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
   else
    {
       $sql1 = "INSERT INTO login (user, pass, email) VALUES ('$user', '$pass', '$email')";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_query($conn, $sql1)) {
        echo "1";
        } else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
       }
    }
mysqli_close($conn);
?>
