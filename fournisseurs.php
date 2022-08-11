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
    <title>page|fournisseur</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
        <?php require_once('memu.php');?>
         <!--------Sidebar end here------>
         <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Gestion des fournisseurs</h2>
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
                        <i class="fas fa-user me-2"></i>John Doe
                       </a>
                       <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="#" class="dropdown-item">Profile</a></li>
                        <li><a href="#" class="dropdown-item">Settings</a></li>
                        <li><a href="#" class="dropdown-item">Logout</a></li>
                       </ul>

                    </li>
                </ul>
            </div>
            </nav>

                <section>
                    <div class="container">
                        <h3>Formulaire d'enregistrement des fournisseurs</h3>
                        <form method="post" action="">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="nomFournisseur" placeholder="Nom">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="prenomFournisseur" placeholder="Prénom">
                            </div>
                            <div class="mb-3">
                                <input type="int" class="form-control" name="telFournisseur" placeholder="téléphone">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="emailFournisseur" placeholder="Adresse email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="paysFournisseur" placeholder="Pays">
                            </div>
                            <button type="submit" class="btn btn-primary form-control">Enregistrer</button>
                        </form>
                    </div>
                </section>

                 <?php
                    if (isset($_POST['nomFournisseur']) && $_POST['nomFournisseur'] != "" ){
                        $nomFournisseur = trim($_POST['nomFournisseur']);
                        $prenomFournisseur = trim($_POST['prenomFournisseur']); 
                        $telFournisseur = trim($_POST['telFournisseur']);
                        $emailFournisseur = trim($_POST['emailFournisseur']);
                        $paysFournisseur = trim($_POST['paysFournisseur']);
                        $sql="INSERT INTO fournisseur (nomFournisseur,prenomFournisseur, telFournisseur, emailFournisseur,paysFournisseur) 
                        VALUES ('$nomFournisseur','$prenomFournisseur', $telFournisseur, '$emailFournisseur', '$paysFournisseur')";
                        $requete = mysqli_query( $connection,$sql);
                        if($requete){
                            echo ("ENREGISTREMENT REUSSI !");
                        } else{ 
                            echo("ERREUR D'ENREGISTREMENT !");
                        }
                    }
                ?>  

                <section>
                    <div class="container">
                        <h3>Liste des fournisseurs</h3>
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                  <td>ID</td>
                                  <td>NOM</td>
                                  <td>PRENOM</td>
                                  <td>TELEPHONE</td>
                                  <td>EMAIL</td>
                                  <td>PAYS</td>
                                  <td>OPTIONS</td>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $sql1 = "select * from fournisseur";
                                    $requete1 = mysqli_query($connection,$sql1);
                                    $Donnees = mysqli_fetch_all($requete1);
                                    foreach ($Donnees as $Donnee){
                                        echo "<tr>    
                                            <td>".$Donnee[0]."</td>
                                            <td>".$Donnee[1]."</td>
                                            <td>".$Donnee[2]."</td>
                                            <td>".$Donnee[3]."</td>
                                            <td>".$Donnee[4]."</td>
                                            <td>".$Donnee[5]."</td>
                                            <td>
                                                <a href='editFournisseur.php'><button class='btn btn-primary'>Edit</button></a>
                                                <a href='deleteFourniseur.php'><button class='btn btn-danger'>Suppr</button></a>
                                            </td>
                                        </tr>";
                                        }
                                   ?>
                            </tbody>
                        </table>

                    </div>
                </section>
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