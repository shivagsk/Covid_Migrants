<?php
$req=$_GET["q"];
$r1=explode(",",$req,2);
//$r1=str_word_count($req,1);
//$user=strval($r1[0]);
//$pass=strval($r1[1]);
$user=$r1[0];
$pass=$r1[1];
//var_dump($r1[0]);
//var_dump($r1[1]);
//echo $user."welcome to my world.";
// Create connection
$conn = mysqli_connect("localhost","root","","shivadb");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT user, pass FROM login";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
    $f=0;
  while($row = mysqli_fetch_assoc($result)) {
      if($user==$row["user"] and $pass==$row["pass"])
      {
          $f=1;
          echo "login successful";
          break;
      }
      else if($user==$row["user"] and $pass!=$row["pass"])
      {
          $f=1;
          echo "Incorrect Password..";
          break;
      }
      else if($user!=$row["user"] and $pass==$row["pass"])
      {
          $f=1;
          echo "Invalid username..";
          break;
      }
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
    if($f==0)
    {
        echo "You are new user.. Register before login";
        exit();
    }
        
    else
    {}
    
} else {
  echo "You are new user.. Register before login";
}

mysqli_close($conn);
?>
