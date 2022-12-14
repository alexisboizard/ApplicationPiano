<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <a href="home.php"><img class="back" src="img-sae/back.svg" alt=""></a>
    <div class="main">
        <a href=""><img src="img-sae/profil-xxl.svg" class="profil" alt=""></a>
    </div>
    <form action="includes/signin.php" method="post" id="signinForm">
        <label for="email">Email</label>
        <input type="text" placeholder="Email" id="email" name="email">
        <label for="password">Password</label>
        <input type="password" placeholder="Mot de passe" id="password" name="password">
        <input class="submit" type="submit" value="Valider" name="login">
    </form>
    <p class="to-register">Pas de compte ? <em><a href="register.php">S'inscrire</a></em></p>
    <script type="module" src="auth.js"></script>
    
    <?php include_once __DIR__ . ("/modules/footer.php"); ?>
    
</body>
</html>