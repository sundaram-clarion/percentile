<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Percentile\Repositories\DataSourceInterface;
use Percentile\Repositories\PercentileInterface;

class PercentileController extends Controller
{
	private $dataSource;
	private $pecentile;

	public function __construct(DataSourceInterface $dataSource, PercentileInterface $percentile)
	{
		$this->dataSource = $dataSource;
		$this->percentile = $percentile;
	}

    public function percentileInfo()
    {
    	$studentsData = $this->dataSource->getData(base_path().'/data/data.csv');
    	$scoreFrequency = $this->percentile->getInterestFrequency($studentsData);
        //getting percentile data    
        $students = [];             
        foreach ($studentsData as $student) {
            $percentile = $this->percentile->getPercentile($studentsData, $scoreFrequency, $student[2]); 
            $students[] = ['id' => $student[0], 'name' => $student[1], 'score' => $student[2], 'percentile' => $percentile];
        } 
        return view('percentile', ['students' => $students]);   	
    }
}
