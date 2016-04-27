<?php
/*

Oxygen Webhelp plugin
Copyright (c) 1998-2015 Syncro Soft SRL, Romania.  All rights reserved.
Licensed under the terms stated in the license file EULA_Webhelp.txt 
available in the base directory of this Oxygen Webhelp plugin.

*/

class ExistingPageFilter implements IFilter{
	private $baseDir;
	private $pageField;
	/**
	 * Constructor
	 */
	function __construct($baseDir,$field){
		$this->baseDir=$baseDir;
		$this->pageField=$field;
	}
	/**
	 * 
	 * @see IFilter::filter()
	 */
	public function filter($AssociativeRowArray){
		// __BASE_DIR__
		$toReturn=true;
		$file=$this->baseDir.DIRECTORY_SEPARATOR.str_replace("/", DIRECTORY_SEPARATOR, $AssociativeRowArray[$this->pageField]);
		if (!file_exists($file)){
			$toReturn = false;
		}
		return  $toReturn;
	}
	public function getSqlFilterClause(){
		return null;
}
}
?>