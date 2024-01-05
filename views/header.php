<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
        	<?php echo  $GLOBALS['TITLE']; ?>
        </title>
        <?php echo $GLOBALS['IN_HEAD']; ?>
        <link rel="icon" type="image/x-icon" href="<?php echo URL_BASE; ?>public/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo URL_BASE; ?>public/css/styles.css" rel="stylesheet" />
    </head>
    <body>
    	<?php include "menu.php"; ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo URL_BASE . "public/img/" .$GLOBALS['COVER']; ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1><?php echo $GLOBALS['TITLE'] ; ?></h1>
                            <span class="subheading"><?php echo $GLOBALS['SUBTITLE'] ; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>