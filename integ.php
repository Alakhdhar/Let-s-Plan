
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="home.css"/>
    </head>
<body>

<?php
mysqli_set_charset($connexion, "utf8");
if($c==1 ||$c==2 ||$c==3){
$reql= "SELECT messages,image FROM message WHERE choix='{$c}' ORDER BY id_message DESC";
$resultatl = mysqli_query ($connexion, $reql ) ;
  if(!$resultatl){
     echo" requête incorrecte \n";
     echo mysqli_error($connexion);
   }
   else {
   $pwdl = mysqli_fetch_assoc($resultatl);
   echo'<div class="pub" ><table border="1" style="width: 740px;height:350px;" ; solid  >';
   $compt=0;
   while($pwdl && $compt<11) {
       $h=$pwdl["messages"];
       $o=$pwdl["image"];
       $compt+=1;
       echo"<tr><td>".$h;
       echo'<hr><img src="./upload/'.$o.'" style="width:300px; height:300px;background-color:white;border-radius:10px;"> ';
       echo "</tr></td> <br>";
       $pwdl= mysqli_fetch_assoc($resultatl);
   }
  echo'</div>';
  }
}
?>
</table>

</body>
</html>


