<?php
/**
 * DataSourceInterface is a contract to upload csv file
 *
 * This file is contract that can be implemented by any class 
 */
namespace Percentile\Repositories;

interface DataSourceInterface {

	public function getData($file);
	
}