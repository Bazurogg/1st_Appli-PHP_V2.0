<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Summary</title>
    <link rel="stylesheet" href="stylerecap.css">
</head>
<body>

    <div class="main-recap">

        <div class="nav-box">

        <div class="cart-navbar" id="nav-bar">

            <div class="navbar-iconbox" onclick="toggleNav()">

                <i class="fa-solid fa-basket-shopping"></i>

            </div>

            <ul class="ul-navbar">

                <li class="nav-btn"><a href="index.php">Fruits Basket</a></li>

                <li class="nav-btn"><a href="recap.php">Recap</a></li>

            </ul>

        </div>




        <?php

            if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                
                echo "<p>Aucun produit en session ... </p>";
                
            } else {

                echo "<table>",
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
                $qttTotal = 0;

                foreach($_SESSION['products'] as $index => $product) {

                    echo "<tr>",

                            "<td>".$index."</td>",
                            "<td>".$product['name']."</td>",
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "<td>".$product['qtt']."</td>",
                            "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",

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

            }

            echo "<br>";

            echo "Il y a : " . "<td><strong>".$qttTotal."</strong></td>" . " articles dans votre panier.";

        ?>
        
    </div>

</body>
</html>