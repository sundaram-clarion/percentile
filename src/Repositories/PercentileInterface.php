<?php
namespace Percentile\Repositories;

interface PercentileInterface {

	public function getInterestFrequency($studentsData);

	public function getPercentile($studentsData, $scoreFrequency, $scoreOfInterest);	
}