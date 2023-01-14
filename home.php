<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location: /login.php');
    }
    if(!isset($_SESSION['hisotry']['actual-page'])){
        $_SESSION['history']['actual-page'] = null;
    }
    $_SESSION['history']['last-page'] = $_SESSION['history']['actual-page'];
    $_SESSION['history']['actual-page'] = 'home.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <a class="login-button fa-2x" href="login.php">
        <img src="img-sae/profil.svg" alt="" srcset="">
    </a>
    <?php
            if(isset($_SESSION)){
                echo "<h1> Bonjour "  . $_SESSION["user"]["firstname"]. ", </h1>";
            }else{
                echo "<h1> Bonjour Inconnu,</h1>";
            }
    ?>    
    <div class="container test">
        <p class="first-para">Reprendre la leçon</p>
    </div>
    <div class="stats">
        <h2>Statistique du mois</h2> 
        <div class="container top">
            <p class="first-para"><em>Streaks</em></p>
            <p><strong>10 jours de pratique à la suite</strong></p>
        </div>
        <div class="bottom-part">
            <div class="right">
                <div class="container container-bot r1">
                    <p class="first-para">8H de leçons</p>
                </div>
                <div class="container container-bot r2">
                    <p class="first-para">Niveau</p>
                    <p>13</p>
                </div>
            </div>
            <div class="container container-bot left ">
                <p class="first-para">Note moyenne</p>
                <p>14.3/20</p>
            </div>
        </div>
    </div>
    
    <?php include_once __DIR__ . ("/modules/footer.php"); ?>
</body>
</html>