<?php
session_start();
require_once("../bd/fonctions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/panier.css">
    <title>Document</title>
</head>
<body>
<div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted"><?=count($_SESSION['produitsPanier'])?> items</div>
                        </div>
                    </div>
                    <?php
                    foreach ($_SESSION['produitsPanier'] as $produit ) {
                        $tousLesMedias = afficherLesImagesParId($produit);                             
                        $nbMedia = count($tousLesMedias);
                        for ($i = 0; $i < $nbMedia; $i++) {
                        echo '<div class="row border-top border-bottom"><div class="row main align-items-center"><div class="col-2"><img class="img-fluid" src="../assets/produits/'.$tousLesMedias[$i]->image.'"></div><div class="col"><div class="row text-muted">Casquette</div><div class="row">'.$tousLesMedias[$i]->nomProduit.'</div></div><div class="col"><a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a></div><div class="col">$'.$tousLesMedias[$i]->prix.'</div></div></div>';
                        }
                    }
                    ?>                        
                    <div class="back-to-shop"><a href="../index.php">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>                                     
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">$<?php  ?></div>
                    </div>
                    <button class="btn">CHECKOUT</button>
                </div>
            </div>
            
        </div>
</body>
</html>