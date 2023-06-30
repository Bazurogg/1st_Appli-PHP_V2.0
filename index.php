<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Mon panier simulator</title>
</head>
<body>

    <div class="main">

        <h1>Add a product</h1>
    
        <form action="traitement.php" method="post"> 
    
            <!-- "action" indique le fichier cible du formulaire lorsque l'utilisateur soumets le formulaire.
    
            Et "method" précise par quelle méthode HTTP les données du formulaire sont transmises au serveur.
    
            La méthode "POST" est choisie ici à défaut de "GET" pour ne pas encombrer L'URL avec les données du formulaire -->
    
            <p>
                <label>
    
                    Name of product :
                    <input type="text" name="name">
    
                </label>
    
            </p>
            
            <p>
                <label>
    
                    Price of product :
                    <input type="number " name="name" step"any" name="price">
    
                </label>
    
            </p>
            
            <p>
                <label>
    
                    Desired quantity :
                    <input type="number " name="qtt" step"any" value="1">
    
                </label>
    
            </p>
    
            <p>
    
                <input type="submit" name="submit" value="Add product">
    
            </p>
    
        </form>
        
    </div>

    
    
</body>
</html>