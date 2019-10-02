<?php

namespace Tests\Integration\Services;

use PHPUnit\Framework\TestCase;
use App\Services\StorageService;
use App\Services\CsvReaderService;

class StorageServiceTest extends TestCase {
    
    /**
     * @test
     */
    public function it_should_get_data_from_give_source(){

        //Arrange
        $csvHandler = new CsvReaderService;
        $storage = new StorageService($csvHandler);
        //Act
        $data = array("page" => 1, "limit" => 1);
        $result = $storage->getAllCriteria($data);
        //Assert
        $this->assertCount(1,$result);

    }

}