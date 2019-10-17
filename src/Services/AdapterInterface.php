<?php 

namespace App\Services;

use Traversable;

Interface AdapterInterface {

    public function getAll(array $request);
}