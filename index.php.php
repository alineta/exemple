<?php

    require_once("dbconnect.php");
     
    $sql = "SELECT * FROM produit";
     
    $stmt = $connexion->query($sql);
     
    $produits = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Shop</title>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
</head>
<header>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="index.php?page=panier.php">Voir le panier</a>
    </nav>
</header>
<body>
    <main id="shop">
        <section id="produits">
        <?php    
            foreach($produits as $produit){
                include "produit.php";
            }
        ?>
        </section>
        <aside id="panier">
            <h2>Basket</h2>
            <div id="liste-panier">
                <?php include "controller_panier.php";?>
            </div>
        </aside>
    </main>
    <script src="https://kit.fontawesome.com/5bda009b12.js" crossorigin="anonymous">
    </script>
    <script>
        $("article a").on("click", function(event){
            event.preventDefault()
            $.post(
                "controller_panier.php",
                {
                    "pid" : $(this).data("id")
                },
                function(response){
                    $("#liste-panier").html(response)       
                }
            )
        })   
    </script>
</body>
</html>