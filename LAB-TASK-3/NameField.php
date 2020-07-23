
<html>
<head>
	<title></title>
</head>
<body>
  <h2>name </h2>
   <form method="post" action="" name="form">
   <input type="text" name="himi"> <br>
   <input type="submit" name="" value="submit">
     
   </form>
<?php
$name="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
       
     $name=$_POST["himi"];
     if(strlen($name)<1 || $name=="")
     {
        echo "textfield must be filled";

     }
     else { 

         if (is_numeric($name[0]))

         {
            echo "First letter cannot be numeric ";         

         }
           else{

                 if ($name[0]=="" && $name[1]=="")
                   {

                      echo "Name Must contain atleast 2 letter";

                    }
                     else { 

                             $length=strlen($name);
                             for($i=0; $i<$length; $i++)
                               {
                                    if($name[$i]>"a" || $name[$i]<"z" || $name[$i]>"A" || $name[$i]<"Z" || $name[$i]=="." || $name[$i]=="-")
                                            echo $name;

                                    	else 	
                                             {

                                              echo "only chararecters are allowed";

                                             }
                                    		


                               }

                                                              


                          }

                } 


           }



}



?>

</body>
</html>