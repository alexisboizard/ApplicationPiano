<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/settings.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include_once __DIR__ . ("/modules/side_navabar.php"); ?>
    <header>
        <a href="home.php"><img class="back" src="img-sae/back.svg" alt=""></a>
        <h1>Paramètres Audio</h1>
    </header>
    
    <main>
        <div class="container">
            <div class="content-audio">
                <p>Volume</p>
                <input type="range" min="1" max="100" value="25" id="volume-bar">
                <p>Value: <span id="value"></span></p>
            </div>
        </div>
    </main>


    
    <script>
        var slider = document.getElementById("volume-bar");
        var output = document.getElementById("value");
        output.innerHTML = slider.value;
        slider.oninput = function() 
        {
            output.innerHTML = this.value;
        }
    </script>

</body>
</html>