<?php
function checkInscriptionDate(){
    if(checkConcours()){
        $today = date("Y-m-d");
        $debut = $_SESSION["debut_inscription"];
        $fin = $_SESSION["fin_inscription"];
        if($debut <= $today && $today <= $fin){
            return true;
        }else{
            return false;
        }
    }
}
?>