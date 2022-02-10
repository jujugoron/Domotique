<?php
include('../Parametres.php');
if(isset($_POST['code']))
{
     
    $hash=hash("sha256",htmlspecialchars($_POST['code']));
    
    if($code !== "" )
    {
        if($hash=="a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3") //code correct
        {
           header('Location: ../connected.html');
        }
        else
        {
           header('Location: ../login.html'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: ../login.html'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: ../login.html');
}

?>