<?php 

namespace App\Services;

use Generator;

Interface AdapterInterface {

    public function getAll(array $request);
}