<?php

namespace App\Factories;

use App\Services\CsvReaderService;
use App\Services\StorageService;

class ReaderFactory extends AbstractCreator {

    /**
     * factory method
     */
    public function make(string $source): StorageService
    {
        switch($source){
            case 'csv':
            return new StorageService(new CsvReaderService);
        }
    }

}