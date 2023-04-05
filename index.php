
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
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> PianoHelper </title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/sidebar.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
<body>
<?php include_once __DIR__ . ("/modules/side_navabar.php"); ?>
  <section class="home-section">
    <?php
        if(isset($_SESSION)){
            echo "<h1> Bonjour "  . $_SESSION["user"]["firstname"]. ", </h1>";
            
        }else{
            echo "<h1> Bonjour Inconnu,</h1>";
        }
    ?>
    <div class="cards" id="tuto">
        <i class="fa-solid fa-xmark" id="close" onclick="closeTuto()"></i>
        <div class="card1" id="card1">
            <h2 class="title-card">Tutoriel : La navigation</h2>
            <p>
                La navigation sur cette application se fait via le menu en bas de la page
                <div class="nav-explain">
                    <div class="tuto-part">
                        <img src="../img/home.svg" alt="" srcset=""> pour retourner à l'accueil
                    </div>
                    <div class="tuto-part">
                        <img src="../img/plus.svg" alt="" srcset=""> pour démarrer une nouvelle leçon
                    </div>
                    <div class="tuto-part">
                    <img src="../img/video.svg" alt="" srcset=""> afin de voir les leçons que vous avez enregistrées
                    </div>
                    <div class="tuto-part">
                        <img src="../img/gear.svg" alt="" srcset=""> pour accéder aux paramètres de l'application
                    </div>
                </div>
            </p>
        </div>
        <div class="card2" id="card2">
            <h2 class="title-card">Tutoriel : Placement du téléphone</h2>
            <p>
                Dans l'onglet pour démarrer une nouvelle leçon, vous aurez le retour de la caméra avant de votre téléphone, il faudra alors placer votre smartphone à une distance d'environ 30cm au dessus de votre clavier, caméra avant vers les touches.
            </p>
        </div>
        <div class="card3" id="card3">
            <h2 class="title-card">Tutoriel : Le fonctionnement</h2>
            <p>
                Cette application analyse la position de vos doigts afin de vous donner des corrections pour que vous jouiez de façon optimale, elle utilise de l'intelligence artificielle pour savoir la position de vos doigts à tout instant.
            </p>
        </div>
        <div class="arrows">
            <i class="fa-solid fa-arrow-left left-arrow" id="left" onclick="prev()"></i>
            <i class="fa-solid fa-arrow-right right-arrow" id="right" onclick="next()"></i>
        </div>

    </div> 
    <div class="container test">
        <p class="first-para">Reprendre la leçon</p>
    </div>
    <div class="stats">
        <h3>Statistiques du mois</h3> 
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
    
  </section>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script type="module" src="firebase.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@ffmpeg/ffmpeg/dist/ffmpeg.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@mediapipe/control_utils/control_utils.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils/drawing_utils.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.js" crossorigin="anonymous"></script>
  <script type="module" src="js/hands.js"></script>
  <script type="module" src="js/fonctions.js"></script>
  <script type="module" src="js/metronome.js"></script>
  <script src="js/tutorial.js"></script>
  <script src="js/sidebar.js"></script>

</body>
</html>
