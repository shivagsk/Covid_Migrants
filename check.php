<?php
$req=$_GET["q"];
$r1=explode(",",$req,2);
$src=$r1[0];
$des=$r1[1];
$con=mysqli_connect("localhost","root","","shivadb");
if(!$con)
{
    die("Connection failed: ".mysqli_connect_error());
}
$sql="SELECT positive,total_pop FROM corona_status WHERE state='$src'";

$result=mysqli_query($con,$sql);
$sql1="SELECT positive,total_pop FROM corona_status WHERE state='$des'";

$result1=mysqli_query($con,$sql1);

if (mysqli_num_rows($result) > 0 and mysqli_num_rows($result1)>0) {
   $row = mysqli_fetch_assoc($result);
   $row1 = mysqli_fetch_assoc($result1);
    if(($row["positive"]/$row["total_pop"])>($row1["positive"]/$row1["total_pop"]))
    {
        echo "1";
        exit();
    }
    else if(($row["positive"]/$row["total_pop"])<($row1["positive"]/$row1["total_pop"]))
    {
        echo "0";
        exit();
    }
    else{
        if($row["total_pop"]>$row1["total_pop"])
        {
            echo "1";
            exit();
        }
        else
        {
            echo "0";
            exit();
        }
    }   
}
else
{
    echo "No record Found\n";
}
?>