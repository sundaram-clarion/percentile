<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Percentile\Repositories\DataSourceInterface;

class PercentileController extends Controller
{
	private $dataSource;

	public function __construct(DataSourceInterface $dataSource)
	{
		$this->dataSource = $dataSource;
	}

    public function testData()
    {
    	$data = $this->dataSource->getData(base_path().'/data/data.csv');
    }
}
