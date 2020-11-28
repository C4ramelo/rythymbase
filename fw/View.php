<?php

// fw/view.php


abstract class View {

	public function render() {
		include '../html/'.get_class($this).'.php'; //get_class se le manda una referencia y devuelve un string con el nombre de la clase
	}


}