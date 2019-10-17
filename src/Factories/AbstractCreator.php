<?php

namespace App\Factories;

use App\Services\StorageService;

abstract class AbstractCreator {

    abstract function make(string $source): StorageService ;
}