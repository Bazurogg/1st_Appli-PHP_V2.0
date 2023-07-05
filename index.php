<?php

    session_start();

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c892bba6ed.js" crossorigin="anonymous"></script>
    <title>Mon panier simulator</title>
</head>
<body>

    <div class="main">

        <div class="nav-box">

            <div class="cart-navbar" id="nav-bar">

                <div class="navbar-iconbox" id="toggle-icon">

                    <!-- <i class="fa-solid fa-basket-shopping"></i> -->
                    <i class="fa-solid fa-bars" id="toggle-bars"></i>

                </div>

                <div class="navbar">

                    <div class="nav-btn"><a href="index.php"><i class="fa-solid fa-cart-arrow-down nav-icon"></i></a></div>

                    <div class="nav-btn"><a href="recap.php"><i class="fa-solid fa-basket-shopping nav-icon"></i></a></div>

                </div>

            </div>

        </div>

        <div class="form-box">

            <h1>Add a product</h1>
        
            <form action="traitement.php?action=add" method="post"> 
        
                <!-- "action" indique le fichier cible du formulaire lorsque l'utilisateur soumets le formulaire.
        
                Et "method" précise par quelle méthode HTTP les données du formulaire sont transmises au serveur.
        
                La méthode "POST" est choisie ici à défaut de "GET" pour ne pas encombrer l'URL avec les données du formulaire -->
        
                <p>
                    <label>
    
                        <input type="text" name="name" class="input-bar" placeholder="Name of product">
        
                    </label>
        
                </p>
                
                <p>
                    <label>
    
                        <input type="number" step="any" name="price" class="input-bar" placeholder="Price of product">
        
                    </label>
        
                </p>
                
                <p>
                    <label>
        
                        <input type="number" name="qtt" step"any" class="input-bar" placeholder="Desired quantity">
        
                    </label>
        
                </p>
        
                <p>
        
                    <input type="submit" name="submit" value="Add to basket" class="add-btn">
        
                </p>
        
            </form>

        </div>

        <div class="txtalert-box">

            <span>InfoBox (WIP)</span>

            <div class="txt-alert">

                <?php

                    $totalGeneral = 0;

                    $qttTotal = 0;
     
                    // $_SESSION['alert'] = "Hello ! To Start please add an article.";
                    // unset($_SESSION['alert']);
                    
                    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                        
                        // $_SESSION['alert'] = "Hello ! To Start please add an article.";
                        
                        if (isset($_SESSION['alert'])){
                                
                            echo "<p class='p-alert'>" . $_SESSION['alert'] . "</p>";
                            unset($_SESSION['alert']);

                        }

                        // echo "<p class='info-txt'>Hello ! To Start please add an article.</p>";
                        

                        // echo "<p class='p-alert'>" . $_SESSION['alert'] . "</p>";
                        // if (isset($_SESSION['alert'])){
                            
                        //     echo "<p class='p-alert'>" . $_SESSION['alert'] . "</p>";
                        //     unset($_SESSION['alert']);

                        // }
                            

                        
                        
                    } else {


                        foreach($_SESSION['products'] as $index => $product) {

                            $totalGeneral += $product['total'];
                            
                            $qttTotal += $product['qtt'];

                            // echo "<p class='p-alert'>" . $_SESSION['alert'] . "</p>";
                            if (isset($_SESSION['alert'])){
                                
                                echo "<p class='p-alert'>" . $_SESSION['alert'] . "</p>";
                                unset($_SESSION['alert']);
    
                            }
                            

                        }
                        

                        echo "There are : " . "<td><strong>".$qttTotal."</strong></td>" . " articles in your basket.";
                        echo "<p>Your total amount is : " . "<strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></p>"."<br>";
                    
                    }
                ?>

            </div>

        </div>

    </div> 

    <script src="myscript.js"></script>

</body>
</html>