<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

spl_autoload_register(function($classes){
 include("class/".$classes.".php");
});

?>

<?php
$student = new student();

if(isset($_POST['sub'])){
$name=$_POST['name'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];

$student->setName($name);
$student->setFname($fname);
$student->setLname($lname);

}

if($student->store()){
  echo"Data inserted successfully.";
}


if(isset($_POST['edit'])){
$upid=$_POST['uid'];
$name=$_POST['name'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];

$student->setName($name);
$student->setFname($fname);
$student->setLname($lname);



if($student->update($upid)){
  echo"Data updated successfully.";
}
}

?>



<table align="center" border="2">
    <tr>
        <td>cid</td>
        <td>Name</td>
        <td>Fname</td>
        <td>Lname</td>
        <td>Action</td>
    </tr>

  <?php
  
  
  foreach($student->readAll() as $key => $value){
 ?>
    <tr>
        <td><?php echo $value['cid']; ?></td>
        <td><?php echo $value['name'];?></td>
        <td><?php echo $value['fname'];?></td>
        <td><?php echo $value['lname'];?></td>
        <td><?php echo"<a href='index.php?action=edit&id=".$value['cid']."'>Edit</a>" ?></td>
  </tr>

    <?php
    
  }
    ?>

</table>

<?php

if(isset($_GET['action']) && $_GET['action'] == 'edit'){
$edt= $_GET['id'];
$result=$student->edit($edt);


?>

<form action="" method="post">
<table>
  <tr>
    <td><input type="hidden" name="uid" value="<?php echo $result['cid']; ?>"></td>
  </tr>
  <tr>
    
    <td>Name:</td>
    <td><input type="text" name="name" value="<?php echo $result['name']?>"></td>
  </tr>

   <tr>
    <td>First Name:</td>
    <td><input type="text" name="fname" value="<?php echo $result['fname']?>"></td>
  </tr>

   <tr>
    <td>Last Name:</td>
    <td><input type="text" name="lname" value="<?php echo $result['lname']?>"></td>
  </tr>

  <tr>
    <td><input type="submit" name="edit"></td>
  </tr>
</table>
</form>

<?php
}else{


?>
<form action="" method="post">
<table>
  <tr>
    <td>Name:</td>
    <td><input type="text" name="name" placeholder="Enter your name..."></td>
  </tr>

   <tr>
    <td>First Name:</td>
    <td><input type="text" name="fname" placeholder="First name..."></td>
  </tr>

   <tr>
    <td>Last Name:</td>
    <td><input type="text" name="lname" placeholder="Last name..."></td>
  </tr>

  <tr>
    <td><input type="submit" name="sub"></td>
  </tr>
</table>
</form>
<?php

}


?>

</body>
</html>