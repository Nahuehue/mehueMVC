<?php 
//esto tiene que ir en controllers
//TODO=para hacer despues//para mi xd ayudarme a mi mismo
$GLOBALS['TITLE'] = 'Mi simple blog';
$GLOBALS['SUBTITLE'] = 'Hecho con php puro y bootstrap 5';
$GLOBALS['COVER'] = "home-bg.jpg";
include "views/header.php";

?>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
<?php if ($this->data["articulos"] == null){ ?>
	<h1>No hay articulos disponibles</h1>
<?php }else{
	foreach ($this->data["articulos"] as $articulo) {
 ?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="<?php echo URL_BASE . "Articulo/" . $articulo->getId(); ?>">
                            <h2 class="post-title"><?php echo $articulo->getTitulo(); ?></h2>
                            <h3 class="post-subtitle"><?php echo $articulo->getSubtitulo(); ?></h3>
                        </a>
                        <p class="post-meta">
                            Publicado por
                            <a href="#!"><?php echo $articulo->getUsuario()->getNombre(); ?></a>
                            en <?php echo date_format($articulo->getFechacreacion(),"F d, Y "); ?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
<?php 
	} 
}?>
                    <!-- Pager
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>-->
                </div>
            </div>
        </div>

<?php include "views/footer.php"; ?>n