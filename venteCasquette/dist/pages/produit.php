<?php
require_once("../bd/fonctions.php");
if($_GET["id"] != ""){
$produit = afficherLeProduitParId($_GET["id"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/search.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body style="width: 80%;margin: auto;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Atap WEB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                </ul>
                <form id="standard" method="post" action="#">
                    <input type="text" class="search-txt-input" name="nameSearch" maxlength="100">
                    <input type="submit" name="btnSearch" value="search" class="search-button">
                </form>

                <form class="d-flex">
                    <a class="btn btn-outline-dark" href="./pages/inscription.php">
                        <i class="bi bi-person-circle"></i>
                        Inscription
                    </a>

                    <a class="btn btn-outline-dark" href="pages/panier.php">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">1</span>
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <main style="display: flex;align-items: center;">
        <div class="produit" style="width: 50%;/* display: flex; */padding: 3% 0 0 3%;flex-direction: column;align-items: center;">
            
            <?='<img src="../assets/produits/'.$produit['image'].'" class="img-responsive" alt="" style="width: 100%;/* height: 100%; */margin: auto;border-radius: 9%;">'?>
            <h2 class="nomProduit" style="margin-left: 3%;"><?=$produit['nomProduit']?></h2>
        </div>

        <div class="description" style="margin-left: 5%;">
            <h2>Marque <?=$produit['marque']?></h2>
            <h2>Prix: <?=$produit['prix']?></h2>
        </div>
    </main>

</body>

</html>