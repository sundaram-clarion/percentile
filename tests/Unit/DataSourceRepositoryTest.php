<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Percentile\Repositories\DataSourceRepository;
use org\bovigo\vfs\vfsStream;

class DataSourceRepositoryTest extends TestCase
{
    /**
     * testing getting data with unknown file
     *
     * @return void
     */
    public function testGetDataWithWrongFile()
    {
    	$dataSource = new DataSourceRepository();
    	$this->assertFalse($dataSource->getData('abc.txt'));
    }

    /**
     * testing getting data with file with data
     *
     * @return void
     */
    public function testGetDataWithFile()
    {
    	$structure = ['data.csv' => '522471US    ,"Eugene Rivera    ",   3.50'];
        $root = vfsStream::setup('root', null, $structure); 
    	$dataSource = new DataSourceRepository();
    	$data = $dataSource->getData($root->url().'/data.csv');
    	$this->assertEquals([['522471US', 'Eugene Rivera', '3.50']], $dataSource->getData($root->url().'/data.csv'));         	
    }    
}
