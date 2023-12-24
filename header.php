<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>K-beh</title>
    <link rel="icon" href="./img/bglogo.png" type="image/png">
    
 

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
   
    <link rel="stylesheet" href="style1.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!--  Magnific Popup css file  -->
    <link rel="stylesheet" href="./vendor/Magnific-Popup/dist/magnific-popup.css">


    <!--  Owl-carousel css file  -->
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">

    <!--  Datatables  -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


    <!--  custom css file  -->
        <!--  custom css file  -->
        <link rel="stylesheet" href="./css/style.css">


    <!--  Responsive css file  -->
    <link rel="stylesheet" href="./css/responsive.css">

        <?php
        // require functions.php file
        require ('functions.php');
        ?>

<style>
   
      </style>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous" defer></script> -->
</head>


<body>


    <!-- Primary Navigation -->
    <header class="header_area" >
        <div class="main-menu">
            <nav style="background-color:#000000;" class="navbar navbar-expand-lg navbar-light">
            <a href="index.php" class="logo"><img src="./img/kkdbase.png"  alt="logo"></a>
                <button style="background-color:#fff;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span  style="color:#fff;" class="navbar-toggler-icon"></span>              
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a style="color:white;"class="nav-link"  href="index.php" >Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a style="color:white;" class="nav-link" href="aboutus.php">About Us</a>
                        </li>
                            <?php 
                        
                        if(isset($_SESSION["clientid"]) != ""){
                    
                            ?> 
                            <li class="nav-item">
                             <a style="color:white;" class="nav-link" href="cart.php">Cart</a>
                             </li>

                             <li class="nav-item">
                             <a style="color:white;" class="nav-link" href="myorders.php">View Orders</a>
                             </li>


                             <li class="nav-item">
                             <a style="color:white;" class="nav-link" href="logout.php">Sign out</a>
                             </li>
                            <?php
                        }else{
                        
                            ?> 

                            <li class="nav-item">
                            <a style="color:white;" class="nav-link" href="Login.php">Sign in</a>
                            </li>
                            <?php
                            
                        }
                        
                        ?>

                    </ul>
                </div>
            </nav>
        </div>

                    </body>

    </header>
<!-- !start #header -->

<!-- start #main-site -->
<main id="main-site">