<html>
<head>
	<title></title>
</head>
<body>
  <h2>EMAIL </h2>
   <form method="post" action="" name="form">
   <input type="text" name ="email"> <br>
   <input type="submit" name="" value="submit">
     
   <form>
<?php
$email="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
       
     $email=$_POST["email"];
     if(strlen($email)<1 || $email=="")
     {
        echo "textfield must be filled";

     }

      else

     {
        if (!filtervar($email,FILTER_VALIDATE_EMAIL))
        {
             echo "invalid email formate";

        }
         else 
         {
            echo $email;

         }

      }  

}
?>
   </form>

</body>
</html>
