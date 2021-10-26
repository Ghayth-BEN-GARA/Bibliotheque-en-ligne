<?php
$host = 'localhost';
$user = 'root';
$password = '';
$nomBd = 'bibliotheque';
$cnx = mysqli_connect($host, $user, $password, $nomBd);
$email = $_SESSION['email'];

$requete = "SELECT * FROM utilisateur WHERE email_user = '$email'";
$result = mysqli_query($cnx,$requete) or die("Erreur : Requéte erroné");
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $nom = $row['prenom_user'];
      $nom .= ' ';
      $nom .= $row['nom_user'];
    }
  }
  ?>
  <ul class = "nav navbar-nav navbar-right">
    <li><a href = "../index.php">Accueil</a></li>
    <li class = "dropdown submenu">
      <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">Bibliothèque</a>
      <ul class = "dropdown-menu other_dropdwn">
        <li><a href = "bibliotheque.php">Informations</a></li>
        <li><a href = "services.php">Services</a></li>
        <li><a href = "gallerie.php">Gallerie</a></li>
      </ul>
    </li>
    <li class = "dropdown submenu">
      <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">Livres</a>
      <ul class = "dropdown-menu other_dropdwn">
        <li><a href = "choix_livre.php">Liste des livres</a></li>
        <li><a href = "reserve_livre.php">Réserver des livres</a></li>
        <li><a href = "etat_reserve.php">Etats des réservations</a></li>
      </ul>
    </li>
    <li class = "dropdown submenu">
      <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><?php echo $nom;?></a>
      <ul class = "dropdown-menu other_dropdwn">
        <li><a href = "profil.php?email=<?php echo $email;?>">Profil</a></li>
        <li><a href = "#" id = "logout" name = "logout" onclick = "logoutUtilisateur()">Déconnexion</a></li>
      </ul>
    </li>
      <li><a href = "contact.php">Contact</a></li>
  </ul>
