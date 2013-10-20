<?php
class Zend_View_Helper_BaseUrl {
	/*
	* Retourne l'url pr�fix�e automatiquement
	* exemple: $pathFile = '/css/style.css'
	*/
	function baseUrl($pathFile){
		$fc = Zend_Controller_Front::getInstance()->getBaseUrl();
		$fc = $fc . $pathFile;
		return $fc;
	}
}
