<?php


  if(isset($_GET['submit'])){
    $a = $_GET['sgender'];
    if($a == ""){
      echo "Invalid request";
    }else{
      echo $a;
    }
  }
  
?>


<!DOCTYPE html>
<html>
<head>
  <title>gender Input</title>
</head>
<body>

  <form action="#" method="GET">
    <fieldset>
      <legend>GENDER</legend>
        <tr>

        <td><input type="radio" name="gender" value="" >  Male 
        <input type="radio" name="gender" value="" > Female
        <input type="radio" name="gender" value="" > Other</td>
      
        </tr>
      
      <input type="submit" name="submit" value="Submit">
    </fieldset>
  </form>
</body>
</html>
