<?php


  if(isset($_GET['submit'])){
    $a = $_GET['sdegree'];
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
  <title>degree Input</title>
</head>
<body>

  <form action="#" method="GET">
    <fieldset>
      <legend>DEGREE</legend>
            <tr>

          <td><input type="radio" name="gender" value="" >  SSC 
        <input type="radio" name="gender" value="" > HSC
        <input type="radio" name="gender" value="" > BSc
        
      </td>
    </tr>

      
      <input type="submit" name="submit" value="Submit">
    </fieldset>
  </form>
</body>
</html>