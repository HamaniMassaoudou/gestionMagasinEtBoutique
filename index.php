<?php $connection = mysqli_connect("localhost","root","","db_warehouse");
    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="d-fle" id="wrapper">

        <?php include('memu.php');?>

         <!--------Sidebar end here------>
         <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle-navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="navbar-item-drropdown">
                        <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropddown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-2"></i>Ali Sani
                       </a>
                       <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="#" class="dropdown-item">Profil</a></li>
                        <li><a href="#" class="dropdown-item">Settings</a></li>
                        <li><a href="#" class="dropdown-item">Logout</a></li>
                       </ul>

                    </li>
                </ul>
            </div>
            </nav>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-item-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php

                                        $sqlProduit = "select count(*) from produit";
                                        $requeteProduit = mysqli_query($connection, $sqlProduit);
                                        $Donnees = mysqli_fetch_all($requeteProduit);
                                        foreach ($Donnees as $Donnee){
                                            echo "<option value='".$Donnee[0]."'> ".$Donnee[0]." </option>";
                                        }  

                                     ?>
                                </h3>
                                <p class="fs-5">Produits</p>
                            </div> 
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-item-center rounded">
                            <div>
                                <h3 class="fs-2">  
                                    <?php

                                        $sqlBoutique = "select count(*) from boutique";
                                        $requeteBoutique = mysqli_query($connection, $sqlBoutique);
                                        $Donnees = mysqli_fetch_all($requeteBoutique);
                                        foreach ($Donnees as $Donnee){
                                            echo "<option value='".$Donnee[0]."'> ".$Donnee[0]." </option>";
                                        }  

                                     ?></h3>
                                <p class="fs-5">Boutiques</p>
                            </div> 
                            <i class="fas fa-hand-holding fs-1 primary-text border rounded-full secondary-bg p-3"></i>    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-item-center rounded">
                            <div>
                                <h3 class="fs-2">
                                      <?php

                                        $sqlLivraison = "select count(*) from livraisonfournisseur_has_produit";
                                        $requeteLivraison = mysqli_query($connection, $sqlLivraison);
                                        $Donnees = mysqli_fetch_all($requeteLivraison);
                                        foreach ($Donnees as $Donnee){
                                            echo "<option value='".$Donnee[0]."'> ".$Donnee[0]." </option>";
                                        }  

                                     ?>
                                </h3>
                                <p class="fs-5">Livraisons</p>
                            </div> 
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-item-center rounded">
                            <div>
                                <h3 class="fs-2">
                                      <?php

                                        $sqlFournisseur = "select count(*) from fournisseur";
                                        $requeteFournisseur = mysqli_query($connection, $sqlFournisseur);
                                        $Donnees = mysqli_fetch_all($requeteFournisseur);
                                        foreach ($Donnees as $Donnee){
                                            echo "<option value='".$Donnee[0]."'> ".$Donnee[0]." </option>";
                                        }  

                                     ?>
                                </h3>
                                <p class="fs-5">Fournisseurs</p>
                            </div> 
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>    
                        </div>
                    </div>  
                </div>
            </div>
         </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function (){
            el.classList.toggle("toggled")
        }
    </script>
  </body>
</html>