<?php
session_start();
$_SESSION['history']['last-page'] = $_SESSION['history']['actual-page'];
$_SESSION['history']['actual-page'] = 'lesson.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> PianoHelper </title>
    <link rel="stylesheet" href="/css/lesson.css">
    <link rel="stylesheet" href="/css/sidebar.css">
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
  <main>
    <article>
      <div class="camera">
          <video class="input_video3" style="display: none;" ></video>
          <canvas class="output3" width="1920" height="1080"></canvas>
      </div>
    </article>

    <aside>
      
      <button> START </button>
      <script type="text/javascript">
          // Ici on apelle la fonction
      </script>
      <div id="start" class="boutonRecord" onclick="this.classList.toggle('active')">
        <div class="fondRecord" x="0" y="0" width="200" height="200"></div>
        <div class="iconeRecord" width="200" height="200">
          <div class="partie gauche" x="0" y="0" width="200" height="200" fill="#fff"></div>
          <div class="partie droite" x="0" y="0" width="200" height="200" fill="#fff"></div>
        </div>
        <div class="point"></div>
      </div>
      <button class="control3">Upload</button>
    </aside>
  </main>
    
  </section>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=Y2caizh6"></script>
  <script type="module" src="firebase.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@ffmpeg/ffmpeg/dist/ffmpeg.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@mediapipe/control_utils/control_utils.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils/drawing_utils.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.js" crossorigin="anonymous"></script>
  <script type="module" src="js/hands.js"></script>
  <script type="module" src="js/fonctions.js"></script>
  <script type="module" src="js/metronome.js"></script>
  <script src="script.js"></script>

</body>
</html>
