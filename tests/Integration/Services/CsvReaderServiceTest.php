<?php

namespace Tests\Integration\Services;

use PHPUnit\Framework\TestCase;
use App\Services\StorageService;
use App\Services\CsvReaderService;

class CsvReaderServiceTest extends TestCase
{
    
    /**
     * @test
     */
    public function create_csvReader_instance()
    {

        //Arrange
        $csvHandler = new CsvReaderService;
        //Assert 
        $this->assertInstanceOf(CsvReaderService::class, $csvHandler);
    }

    /**
     * @test
     */
    public function result_csvReader_result_not_empty()
    {

        //Arrange
        $csvHandler = new CsvReaderService;
        $storageService = new StorageService($csvHandler);
        //Act 

        $objectResult = $storageService->getAllCriteria(['page' => 1, 'limit' => 1]);
        //Assert
        $this->assertCount(1, $objectResult);
    }
}
