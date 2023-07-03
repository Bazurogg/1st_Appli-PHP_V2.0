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

        <div class="nav-box" id="navbox" onclick="togglePlz()">

            <div class="cart-navbar">

                <div class="navbar-iconbox">

                    <i class="fa-solid fa-basket-shopping"></i>

                </div>

                <ul class="ul-navbar">

                    <li class="nav-btn"><a href="/index.php">Fruits Basket</a></li>

                    <li class="nav-btn"><a href="/recap.php">Recap</a></li>

                </ul>

            </div>

        </div>

        <div class="form-box">

            <h1>Add a product</h1>
        
            <form action="traitement.php" method="post"> 
        
                <!-- "action" indique le fichier cible du formulaire lorsque l'utilisateur soumets le formulaire.
        
                Et "method" précise par quelle méthode HTTP les données du formulaire sont transmises au serveur.
        
                La méthode "POST" est choisie ici à défaut de "GET" pour ne pas encombrer L'URL avec les données du formulaire -->
        
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

            <span>Alert box WIP</span>

            <div class="txt-alert">

            </div>

        </div>

    </div>

    

    <script src="/script.js"></script>

</body>
</html>