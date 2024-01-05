<?php 

 
class HomeController extends Controller
{
	function __construct()
	{
		$this->data["articulos"] = ArticuloService::getAll();
		$this->render();
	}
}

?>