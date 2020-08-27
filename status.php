<?php
$req=$_GET["q"];
//$r1=explode(",",$req,1);
//$src=$r1[0];
//echo $req;
$con=mysqli_connect("localhost","root","","shivadb");
if(!$con)
{
    die("Connection failed: ".mysqli_connect_error());
}
$sql="SELECT * FROM corona_status WHERE state='$req'";

$result=mysqli_query($con,$sql);

//echo strval(mysqli_num_rows($result));
if (mysqli_num_rows($result) > 0 ) {
   $row = mysqli_fetch_assoc($result);
    //if((/$row["total_pop"])>($row1["positive"]/$row1["total_pop"]))
    //{
        echo "Positive : ".strval($row["positive"])."   and Total Population : ".strval($row["total_pop"]);
        exit();
    //}
    
}
else
{
    echo "No record Found\n";
}
?>