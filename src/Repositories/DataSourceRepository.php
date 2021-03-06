<?php
/**
 * DataSourceRepository is used to extract data from csv file
 *
 * This file implements DataSourceInterface to implemet its function
 */
namespace Percentile\Repositories;

use Percentile\Repositories\DataSourceInterface;
use League\Csv\Reader;

class DataSourceRepository implements DataSourceInterface {

	/**
	 * to get students data
	 * @param $file string file to be checked for importing data
	 * @return mixed array or boolean
	 */
	public function getData($file)
	{
		try {
			//Reading file from where data need to be imported
			$reader = Reader::createFromPath($file);
			$results = $reader->fetchAll();
			$data = [];
			foreach ($results as $result) {
				$data[] = array_map('trim', $result);
			}
			return $data;
	    } catch (\Exception $e) {
	    	return false;
	    }
	}

}