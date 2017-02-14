<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Percentile\Repositories\PercentileRepository;

class PercentileRepositoryTest extends TestCase
{
	private $students = [
    		[1, 'A', '2.45'],
    		[2, 'B', '3.92'],
    		[3, 'C', '2.45'],
    		[4, 'D', '3.92'],    
    		[5, 'E', '4.03'],		    		    		
    	];
	private $frequency;
    /**
     * Testing getting interest frequency
     *
     * @return void
     */
    public function testGetInterestFrequency()
    {
    	$percentile = new PercentileRepository();
    	$this->frequency = $percentile->getInterestFrequency($this->students);
    	$this->assertEquals(['2.45'=>2, '3.92'=>2, '4.03'=>1], $this->frequency);
    }

    /**
     * Testing getting percentile
     *
     * @return void
     */
    public function testGettingPercentile()
    {
    	$r['2.45'] = 2;
    	$r['3.92'] = 2;    	
    	$r['4.03'] = 1;
    	$percentile = new PercentileRepository();
    	$percentilePercentage1 = $percentile->getPercentile($this->students, $r, '2.45');
    	$this->assertEquals(20, $percentilePercentage1);
    	$percentilePercentage2 = $percentile->getPercentile($this->students, $r, '3.92');
    	$this->assertEquals(60, $percentilePercentage2); 
    	$percentilePercentage3 = $percentile->getPercentile($this->students, $r, '4.03');
    	$this->assertEquals(90, $percentilePercentage3);     	   	
    }
}
