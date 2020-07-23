<?php


  if(isset($_GET['submit'])){
    $a = $_GET['sblood_group'];
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
  <title>Blood Group Input</title>
</head>
<body>

  <form action="#" method="GET">
    <fieldset>
      <legend>Blood_Group</legend>
                <tr>

          <td>
            <select name="">
        <option value="">A+</option>
        <option value="">A-</option>
        <option value="">B+</option>
        <option value="">O+/option>
        <option value="">B-</option>
        <option value="">AB+</option>
        <option value="">AB-</option>
        <option value="">O-</option>
      </select></td>
        </tr>

      
      <input type="submit" name="submit" value="Submit">
    </fieldset>
  </form>
</body>
</html>