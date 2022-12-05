<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lesson.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@mediapipe/control_utils@0.1/control_utils.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <main>
        <div class="camera">
            <video class="input_video3" style="display: none;" ></video>
            <canvas class="output3" width="1920" height="1080"></canvas>
        </div>
        <div id="start" class="white-circle">
            <div class="red-circle" id="circle"></div>
            <div class="red-square" id="square"></div>
        </div>
        <div class="metronome">
            <div class="dot"></div>
            <p id="metronome_button">
                Metronome
            </p>
        </div>
        <div class="control3"></div>
    </main>
    <div class="right-side" id="right">
        <div class="right-content">
            <h3>Commentaire</h3>
            <p>Lorem ipsum dolor.</p>
        </div>
        <div class="right-content">
            <h3>Commentaire</h3>
            <p>Lorem ipsum dolor.</p>
        </div>
        <div class="right-content">
            <h3>Commentaire</h3>
            <p>Lorem ipsum dolor.</p>
        </div>
        <div class="right-content">
            <h3>Commentaire</h3>
            <p>Lorem ipsum dolor.</p>
        </div>
        <div class="right-content">
            <h3>Commentaire</h3>
            <p>Lorem ipsum dolor.</p>
        </div>
        <div class="right-content">
            <h3>Commentaire</h3>
            <p>Lorem ipsum dolor.</p>
        </div>
    </div>
    <footer class="navbar">
        <a href="home.php"><img src="img-sae/home.svg" alt="" srcset=""></a>
        <a href="lesson.php"><img src="img-sae/plus.svg" alt="" srcset=""></a>
        <a href="replay.php"><img src="img-sae/video.svg" alt="" srcset=""></a>
        <a href="settings.php"><img src="img-sae/gear.svg" alt="" srcset=""></i></a>
    </footer>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="module" src="firebase.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@ffmpeg/ffmpeg/dist/ffmpeg.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/control_utils/control_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils/drawing_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.js" crossorigin="anonymous"></script>
    <script type="module" src="hands.js"></script>
    <script src="metronome.js"></script>
</body>
</html>