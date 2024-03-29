<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <a href="index.php"><img class="back" src="img/back.svg" alt=""></a>
    <div class="main">
        <a href=""><img src="img/profil-xxl.svg" class="profil" alt=""></a>
    </div>
    <form action="includes/signup.php" method="post" id="signup-form">
        <div class="form-top">
            <label for="surname">Prénom</label>
            <input type="text" name="firstname" id="firstname" placeholder="Prénom">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" placeholder="Nom">
        </div>
        <label for="email">Email</label>
        <input type="text" placeholder="Email" id="email" name="email">
        <label for="password">Password</label>
        <input type="password" placeholder="Mot de passe" id="password" name="password">
        <label for="phone">Tel.</label>
        <input type="tel" placeholder="Numéro de téléphone" id="phone" name="phone">
        <input class="submit" type="submit" value="Valider" name="login" id="submit">
    </form>
    <p class="to-register">Déja un compte ? <em><a href="login.php">Se connecter</a></em></p>
    
    <script type="module" src="js/auth.js"></script>
</body>
</html>