<?php
/**
 * PercentileInterface is a contract to calculate percentile
 *
 * This file is contract that can be implemented by any files
 */
namespace Percentile\Repositories;

interface PercentileInterface {

	public function getInterestFrequency($studentsData);

	public function getPercentile($studentsData, $scoreFrequency, $scoreOfInterest);	
}