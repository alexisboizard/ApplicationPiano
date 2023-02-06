<?php 
    session_start();
    include __DIR__ . "/includes/show_replay.php";
    $_SESSION['history']['last-page'] = $_SESSION['history']['actual-page'];
    $_SESSION['history']['actual-page'] = 'replay.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/replay.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <a href="index.php"><img class="back" src="img/back.svg" alt=""></a>
    <h1>REPLAY</h1>
    <?php
        ob_start();
        include('includes/database.php');

        $collection = $client->ptut->replay;
        $result = $collection->find([
            'userId' => $_SESSION['user']['id']
        ]);
        
        $cpt = 1;
        $output = ob_get_clean();
        echo "<div class='container'>";
        foreach($result as $i){
            echo '<a href="?id='.$i['_id'].'">';
            echo '<div class="content">';
            echo '<p class="first-para"> Leçon n°'.$cpt.'</p>';  
            echo '<p>'.$i["date"].'</p>';
            echo '</div>';
            echo '</a>';
            $cpt = $cpt + 1;
        }
        echo "</div>"
    ?>
    <video></video>

    
    <?php include_once __DIR__ . ("/modules/footer.php"); ?>
</body>
</html>