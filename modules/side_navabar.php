<?php

if(isset($_SESSION['user']['firstname']) && isset($_SESSION['user']['email']) && !empty($_SESSION['user']['firstname']) && !empty($_SESSION['user']['email'])){
  $nom1 = $_SESSION['user']['firstname'];
  $email1 = $_SESSION['user']['email'];
  
}else {
  $nom1 = " ";
  $email1 = " ";
}

?>
<div class="sidebar">
    <div class="logo-details">
      <i class=''></i>
        <div class="logo_name">PianoHelper</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="index.php">
          <i class='bx bx-home'></i>
          <span class="links_name">Accueil</span>
        </a>
         <span class="tooltip">Accueil</span>
      </li>
      <li>
       <a href="lesson.php">
         <i class='bx bx-camera'></i>
         <span class="links_name">Séance</span>
       </a>
       <span class="tooltip">Séance</span>
     </li>
     <li>
       <a href="replay.php">
         <i class='bx bx-save'></i>
         <span class="links_name">Replay</span>
       </a>
       <span class="tooltip">Replay</span>
     </li>
     <li>
       <a href="settings.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Paramètres</span>
       </a>
       <span class="tooltip">Paramètres</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <div class="name_job">
             <div class="name"><?php echo $nom1 ?></div>
             <div class="job"><?php echo $email1 ?></div>
           </div>
         </div>
         <?php
            if(isset($_SESSION['user'])){?>
                <a href="../includes/disconnect.php">
                  <i class='bx bx-log-out' id="log_out" ></i>
                </a>
                <?php
            }else{
                ?>
                <a href="../login.php">
                  <i class='bx bx-log-in' id="log_out" ></i>
                </a>
                <?php
            }
          ?>
     </li>
    </ul>
</div>