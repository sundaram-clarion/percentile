<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\PercentileController;
use App;

class PercentileTest extends TestCase
{
    /**
     * Testing percentile page
     *
     * @return void
     */
    public function testPercentilePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('students');
    }  

    /**
     * Testing with error while reading data
     *
     * @return void
     */
    public function testWithErrorInReadingData()
    {
        $dataSource = \Mockery::mock('Percentile\Repositories\DataSourceInterface');
        $dataSource->shouldReceive('getData')->once()->andReturn(false);
        $percentileObj = \Mockery::mock('Percentile\Repositories\PercentileInterface');
        $percentileController = new PercentileController($dataSource, $percentileObj);
	    $pResult = $percentileController->percentileInfo(); 
	    $res = \Response::make($pResult); 
	    $view = $res->original;
        $this->assertEquals('Error occurred while reading file.', $view['errors'][0]);        
    }     
}
