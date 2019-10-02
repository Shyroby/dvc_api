<?php

namespace Tests\Unit\Services;


use PHPUnit\Framework\TestCase;
use App\Services\AdapterInterface;
use App\Services\CsvReaderService;

class CsvReaderUnitTest extends TestCase {
    

    /**
     * @test
     */
    public function is_instance_of_adapter_interface(){

        $csvHandler = new CsvReaderService;
        $this->assertInstanceOf(AdapterInterface::class, $csvHandler);
    }
    
    /**
     * @test
     */
    public function it_should_get_data_from_csv_file(){

        $csvHandler = new CsvReaderService;
        $data = array("page" => 1, "limit" => 1);
        $result = $csvHandler->getAll($data);

        $this->assertCount(1,$result);

    }

    /**
     * @test
     */
    public function get_the_right_type_return(){

        $csvHandler = new CsvReaderService;
        $data = array();
        $result = $csvHandler->getAll($data);

        $this->assertIsObject($result);
    }
    
}