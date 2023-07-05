<?php

    session_start();
    
    $_SESSION['alert'] = " ";

    if(isset($_GET['action'])) {

        switch($_GET['action']){

            case "add":
                
            
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
                        $_SESSION['alert'] = "Congrats ! You have succesfully added : " . "$qtt" . " " . "$name" . " to your basket.";
                        
                    } else {
            
                        $_SESSION['alert'] = "Please add correctly an article !";
                        // unset($_SESSION['alert']);
                        header("location:index.php");
            
                    }
                
                }
                break;

            case "deleteAll":

                if (isset($_SESSION['products'])){

                    unset($_SESSION['products']);

                    $_SESSION['alert'] = "Your have canceled your basket !";
                    
                } else {
                    
                    $_SESSION['alert'] = "Your basket is already empty !";

                }

                break;
            
            case "deleteItem":
            
                if (isset($_GET['id'] ) && (isset($_SESSION['products'][$_GET['id']]))){ // Vérification si "action est bien appelé via l'url.
                    
                    $_SESSION['alert'] = "Your have removed " . $_SESSION['products'][$_GET['id']]['name'] . " from your basket !";
                    unset($_SESSION['products'][$_GET['id']]);
                    $_SESSION['products'] = array_values($_SESSION['products']);
                    
                    header("location:recap.php");
                    
                    
                    die(); //On stop l'exécution du script similaire à "exit()"

                }
                break;

            case "increaseItem":

                if (isset($_GET['id'] ) && (isset($_SESSION['products'][$_GET['id']]))){

                    $index = $_GET['id']; // Affectation de l'index la valeur "id" récupérer par la méthode $_GET.
                    
                    $_SESSION['products'][$index]['qtt']++;  // on incrémente la valeur de "qtt" de l'index correspondant.

                    $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['price']*$_SESSION['products'][$index]['qtt'];
    
                    header("location:recap.php");

                    die();

                }
                break;
                
            case "decreaseItem":
                
                if (isset($_GET['id'] ) && (isset($_SESSION['products'][$_GET['id']]))){

                    $index = $_GET['id'];

                    if ($_SESSION['products'][$index]['qtt'] > 1){ // On veux que lorsque la quantité tombe à zéro on supprime le produit cible.

                        $_SESSION['products'][$index]['qtt']--; // On décrémente la "qtt" de l'index correspondant.

                        $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['price']*$_SESSION['products'][$index]['qtt'];
        
                        header("location:recap.php");
    
                        die();

                    } else {

                        unset($_SESSION['products'][$index]);
                        
                        $_SESSION['alert'] = "Your have removed " . $_SESSION['products'][$_GET['id']]['name'] . " from your basket !";
                        
                        header("location:recap.php");

                        die();
                    }
                }
                break;
            
            default:
                
                break;    
              

        }
        
    }


    header("location:index.php");

?>