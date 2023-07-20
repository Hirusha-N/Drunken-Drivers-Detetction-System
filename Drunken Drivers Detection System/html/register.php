

<?php 
require 'config.php';

  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time =$_POST['time'];
    $location= $_POST['location'];
 

 $stmt = $conn->prepare("insert into recodes(id,name,date,time,location) value(?,?,?,?,?)");
 $stmt->bind_param("sssss",$id,$name,$date,$time,$location);
 $stmt->execute();

 echo "<script>window.location='index.html' ;</script>";
 $stmt->close();
 $conn->close();
		
  };



?>


