<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="replay.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <a href="home.php"><img class="back" src="img-sae/back.svg" alt=""></a>
    <h1>REPLAY</h1>
    <?php
        include('includes/database.php');

        $stmt = $db->prepare("SELECT * FROM replay where userId = :id");
        $stmt->execute(
            [
                'id' => $_SESSION['user']['id']
            ]
            );
        $result = $stmt->fetchAll();
        $cpt = 1;
        echo "<div class='container'>";
        foreach($result as $i){
            echo '<div class="content" onclick="addVideo()">';
            echo '<p class="first-para"> Leçon n°'.$cpt.'</p>';  
            echo '<p>'.$i["date"].'</p>';
            echo '</div>';
            $cpt = $cpt + 1;
        }
        echo "</div>"
    ?>
    <video></video>

    
    <?php include_once __DIR__ . ("/modules/footer.php"); ?>
    <script src="hand.js"></script>
</body>
</html>