<?php
    require_once '../other_php/connexion_data_base.php';
    $email = $_GET['email'];
    $query = "SELECT * FROM utilisateur WHERE email_user = '$email' ORDER BY prenom_user";
    $result = mysqli_query($cnx,$query);
    $number_of_rows = mysqli_num_rows($result);
    $liste = array();

    if($number_of_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
            $temp = array();
            $temp['email'] = $row['email_user'];
            $temp['nom'] = $row['nom_user'];
            $temp['prenom'] = $row['prenom_user'];
            $temp['genre'] = $row['genre_user'];
            $temp['date_naissance'] = $row['date_naissance_user'];
            $temp['cin'] = $row['cin_user'];
            $temp['mobile'] = $row['mobile_user'];
            $temp['date_creation'] = $row['date_creation_user'];
            array_push($liste,$temp);
        }
    }
    
    echo json_encode($liste);
    mysqli_close($cnx);
?>