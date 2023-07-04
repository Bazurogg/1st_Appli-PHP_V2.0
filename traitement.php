<?php

    session_start();

    $_SESSION['alert'] = " ";

    if(isset($_POST['submit'])) {  // vérification de la présence  de la clé "submit" dans le tableau $_POST qui correspond à l'attribut "name" du bouton.

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if($name && $price && $qtt) {

            $product = [

                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt

            ];
            
            $_SESSION['products'][] = $product;
            $_SESSION['alert'] = "Congrats ! You have succesfully added : " . "$name" . " to your basket.";
            
        } else {

            $_SESSION['alert'] = "Veuillez ajouter correctement l'article !";

        }
    
    }

    header("location:index.php");

    

?>