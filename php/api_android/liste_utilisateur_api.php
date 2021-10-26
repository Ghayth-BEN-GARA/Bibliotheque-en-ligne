<?php
    require_once '../other_php/connexion_data_base.php';
    $query = "SELECT * FROM utilisateur ORDER BY prenom_user";
    $result = mysqli_query($cnx,$query);
    $number_of_rows = mysqli_num_rows($result);
    $liste = array();

    if($number_of_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
            $temp = array();
            $temp['email'] = $row['email_user'];
            $temp['nom'] = $row['nom_user'];
            $temp['prenom'] = $row['prenom_user'];
            array_push($liste,$temp);
        }
    }
    
    echo json_encode($liste);
    mysqli_close($cnx);
?>