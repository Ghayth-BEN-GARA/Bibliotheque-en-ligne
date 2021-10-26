<li><a href = "gestion_compte.php">Gestion des comptes</a></li>
<li><a href = "gestion_livre.php">Gestion des livres</a></li>
<li class = "dropdown submenu">
  <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">Réservations</a>
  <ul class = "dropdown-menu other_dropdwn">
    <li><a href = "demandes_reservation.php">Demandes</a></li>
    <li><a href = "statistique_reservation.php">Statistiques</a></li>
    <li><a href = "historique_reservation.php">Historique</a></li>
  </ul>
</li>
<li class = "dropdown submenu">
  <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">Université Sesame</a>
  <ul class = "dropdown-menu other_dropdwn">
    <li><a href = "profil_admin.php?email=<?php echo $_SESSION['admin'];?>">Profil</a></li>
    <li><a href = "#" id = "logout" name = "logout" onclick = "logoutUtilisateur()">Déconnexion</a></li>
  </ul>
</li>
