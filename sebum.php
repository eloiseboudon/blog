<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 14/12/2017
 * Time: 13:41
 */
function connexion_sql()
{
    $servername = 'letiqueteheloise.mysql.db';
    $database = 'letiqueteheloise';
    $username = 'letiqueteheloise';
    $password = "L3tiqu3tt3";

    $db = mysqli_connect($servername, $username, $password, $database)
    or die("Impossible de se connecter : " . mysqli_error($db));

    mysqli_set_charset($db, 'UTF8');

    return $db;
}


$bdd = connexion_sql();


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: <cure-de-sebum@gouv.fr>" . "\r\n";


$message = '<html>
    <head>
        <title>Le sébum c\'est la vie</title>
    </head>
    <body>
        Bonjour Mesdames, <br/> <br/>

Il a été porté à notre connaissance que vos filles étaient en pleine cure de sébum 
mais que le soutien n\'était pas au rendez-vous. <br/>
Aussi nous nous permettons de vous
 rappeler que la cure de sébum requiert des sacrifices importants :
  <ul>
  <li>abandon de vie sociale,</li>
<li>fuite des miroirs,</li>
<li>réduction des snaps et des posts instagrams,</li>
<li>dignité mise en péril,</li>
<li>camouflage de la chevelure... </li>
</ul>
   

Au ministère du sébum, nous sommes fiers de vos filles pour leurs sacrifices. <br/>
Nous attendons la même chose de votre part, de la même façon que Brigitte (maman d\'Eva) supporte sa fille dans cet engagement. <br/>
Prenez exemple sur Bribri, ne méprisez plus jamais le sébum de vos filles. <br/>Nous espérons ne plus avoir à vous rappeler à l\'ordre de la sorte. 
<br/><br/> 
Sébumement vôtre, <br/>
Le Ministère du sébum</body>
    </html>';



$email = "Labouhaidar@gmail.com;boudon.pascale@laposte.net";

if(mail($email, 'Attention: sébum', $message, $headers)){
    echo "ok";
}else{
    echo "ko";
}