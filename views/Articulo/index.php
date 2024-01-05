<?php 
$articulo = $this->data["articulo"];
$GLOBALS['TITLE'] = $articulo->getTitulo();
$GLOBALS['SUBTITLE'] = $articulo->getSubtitulo();
$GLOBALS['COVER'] = "articulo-".(string)$articulo->getId().".jpg";
include "views/header.php";
?>


        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <?php echo $articulo->getContenido(); ?>
                    </div>
                </div>
            </div>
        </article>


<?php include "views/footer.php"; ?>n