<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c892bba6ed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylerecap.css">
    <title>Product Summary</title>
</head>
<body>

    <div class="main">

        <div class="nav-box">
            
            <div id="nav-bar">
    
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
            
        <div class="recaptable-box">

            <?php

                $qttTotal = 0;

                if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                    
                    echo "<p class='recap-alert'>There are no article in your cart yet.</p>";
                    
                } else {

                    echo 
                    
                        "<div class='tbl-header'>",
                            "<table cell>",
                                "<thead>",
                                    "<tr>",
                                        "<th>#</th>",
                                        "<th>Name</th>",
                                        "<th>Price</th>",
                                        "<th>Quantity</th>",
                                        "<th>Total</th>",
                                    "</tr>",
                                "</thead>",
                                "<tbody>";
                        
                            $totalGeneral = 0;
                    

                    foreach($_SESSION['products'] as $index => $product) {

                        echo "<tr>",

                                "<td>".$index."</td>",
                                "<td>".$product['name']."</td>",
                                "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                                "<td>".$product['qtt']."</td>",
                                "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                                "<td class='manip'>"."<a href='traitement.php?action=increaseItem&id=$index' style='text-decoration:none;'>"."<button id='addonclick'>+</button>"."</a>"."<button id='dumpbtn'>"."<a href='traitement.php?action=deleteItem&id=$index' style='text-decoration:none;'>supprimer</a>"."</button>"."<a href='traitement.php?action=decreaseItem&id=$index' style='text-decoration:none;'>"."<button id='removeonclick'>-</button>"."</a>"."</td>",

                            "</tr>";

                        $totalGeneral += $product['total'];
                        $qttTotal += $product['qtt'];
                    }

                    echo    "<tr>",
                            
                                "<td colspan = 4>Total Price : </td>",
                                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",

                            "</tr>",
                        
                        "</tbody>",

                    "</table>";

                echo "Il y a : " . "<td><strong>".$qttTotal."</strong></td>" . " articles dans votre panier.";
                }

                echo "<br>";
            
                if(!empty($_SESSION['products'])) {
                ?>

                    <a href = 'traitement.php?action=deleteAll'><button id="dumpout">Cancel basket</button></a>

                <?php
                }
                ?>




            
            <div class="txt-alert">

                <?php

                    if (isset($_SESSION['alert'])){
                                        
                        echo "<p class='p-alert'>" . $_SESSION['alert'] . "</p>";
                        unset($_SESSION['alert']);
                        
                    }
                
                ?>

            </div>

        </div>
    
    </div>



    <script src="myscript.js"></script>

</body>
</html>