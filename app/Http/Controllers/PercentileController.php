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
        if (!is_array($studentsData) && $studentsData===false) {
            return view('percentile', ['students' => [], 'errors' => ['Error occurred while reading file.']]);    
        }
    	$scoreFrequency = $this->percentile->getInterestFrequency($studentsData);
        if (!is_array($scoreFrequency) && $scoreFrequency===false) {
            return view('percentile', ['students' => [], 'errors' => ['Data is not in required format.']]);    
        }        
        try {
            //getting percentile data    
            $students = [];             
            foreach ($studentsData as $student) {
                $percentile = $this->percentile->getPercentile($studentsData, $scoreFrequency, $student[2]); 
                if ($percentile === false) {
                    throw new Exception("Error occurred while calculating percentile");                    
                }
                $students[] = ['id' => $student[0], 'name' => $student[1], 'score' => $student[2], 'percentile' => $percentile];
            } 
            return view('percentile', ['students' => $students, 'errors' => []]);   
        } catch (\Exception $e) {
            return view('percentile', ['students' => [], 'errors' => ['Error occurred while calculating percentile.']]);
        }	
    }
}
