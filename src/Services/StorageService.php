<?php

namespace App\Services;


class StorageService {

    private $source;

    //Take the instance of the needed reader or source
    public function __construct(AdapterInterface $source)
    {
        $this->source = $source;
    }

    //get all the results
    public function getAllCriteria(array $request){

        return $this->source->getAll($request);
    }
}