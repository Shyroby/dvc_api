<?php

namespace App\Controller\Rest;

use FOS\RestBundle\View\View;
use App\Services\StorageService;
use App\Services\CsvReaderService;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;



class ProductController extends AbstractFOSRestController
{

    /**
     * @Get("/flyers")
     */
    public function getAll(Request $request)
    {

        /**
         * StorageService instance with the specific reader
         */
        $adapter = new StorageService(new CsvReaderService);

        /**
         * call the getAllCriteria method to retrive 
         * all the matches according to query 
         */
        $criteria = $request->query->all();
        $data = $adapter->getAllCriteria($criteria);

        /**
         * FOSREST viewlayer
         */


        // // $data = [
        // //     'errors' => $errors,
        // // ];
        return View::create($data, Response::HTTP_OK);
    }
}
