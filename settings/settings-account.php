<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="settings.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <a href="home.php"><img class="back" src="img-sae/back.svg" alt=""></a>
        <h1>Paramètres</h1>
    </header>
    
    <main>
        <div class="container">
            <form action="../update-account.php">
                <div type="submit" class="content-account">
                    <button id="button-account">Changer vos données d'authentification</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="navbar">
        <a href="../home.php"><img src="../img-sae/home.svg" alt="icon"></a>
        <a href="../lesson.php"><img src="../img-sae/plus.svg" alt="icon"></a>
        <a href="../replay.php"><img src="../img-sae/video.svg" alt="icon"></a>
        <a href="settings.php"><img src="../img-sae/gear.svg" alt="icon"></a>
    </footer>
</body>
</html>