<?php
namespace Percentile\Repositories;

use Percentile\Repositories\PercentileInterface;

class PercentileRepository implements PercentileInterface {

	/**
	 * to get frequency of score of interest
	 * @param $studentsData array participant data
	 * @return array 
	 */
	public function getInterestFrequency($studentsData)
	{
        $frquencyScores = array_count_values(array_column($studentsData, 2));
        return $frquencyScores;
	}

	/**
	 * to get percentile of score of interest
	 * @param $studentsData array participant data
	 * @param $scoreFrequency array frequency of scores
	 * @param $scoreOfInterest current score of interest
	 */
	public function getPercentile($studentsData, $scoreFrequency, $scoreOfInterest)
	{
		//getting scores of students less than score of interest
		$lessScoresArr = array_filter($studentsData, function ($student) use ($scoreOfInterest) {
														return floatval($student[2]) < floatval($scoreOfInterest);
													}) ;
		//calculating percentile
		$percentile = ((count($lessScoresArr)+(0.5*$scoreFrequency[$scoreOfInterest]))/count($studentsData))*100;
        return round($percentile, 2);
	}	
}