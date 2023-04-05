<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/settings.css">
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include_once __DIR__ . ("/modules/side_navabar.php"); ?>
    <header>
        <a href="home.php"><img class="back" src="img-sae/back.svg" alt=""></a>
        <h1>Paramètres du compte</h1>
    </header>
    
    <main>
        <div class="container">
            <form action="update-account.php">
                <div type="submit" class="content-account">
                    <button id="button-account">Mettre à jour vos données d'authentification</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>