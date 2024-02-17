<?php function flags($nationalite)
{
    $base_path = "../../assets/vendors/images/flags/";

    $nationalite_images = array(
        "Togo" => "Togo.png",
        "Bénin" => "Benin.png",
        "Côte d'ivore" => "RCI.png",
        "Congo Brazaville" => "Congo.png",
        "Tchad" => "Tchad.png",
        "Niger" => "Niger.png",
        "Burkina Faso" => "Burkina.png",
        "Cameroun" => "Cameroun.png",
        "Gabon" => "Gabon.svg",
        "Congo" => "RDC.png",
        "Centrafrique" => "RCA.png",
        "Sénégal" => "Senegal.png"
    );

    if (array_key_exists($nationalite, $nationalite_images)) {
        return $base_path . $nationalite_images[$nationalite];
    } else {
        return $base_path . "default.png";
    }
}
