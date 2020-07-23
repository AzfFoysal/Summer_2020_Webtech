<html>
<head>
	<title>DATE OF BIRTH</title>
</head>
<body>
     <h4>DATE OF BIRTH</h4>
     <H5>DD     MM      YY</H5>
   <form>

  <form method="post" action="" name="form">
   <input type="text" name ="DATE"> 
   <input type="text" name ="DATE">
   <input type="text" name ="DATE"> <br>

   <input type="submit" name="submit" value="Submit">  
<?php

$date="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
      if (empty($_POST["date"])) 
      {
            echo "date is required";
      }
       else
       {
            echo $date;
       }

}



?>

   </form>

</body>
</html>
