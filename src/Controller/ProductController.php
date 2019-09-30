<?php

namespace App\Controller;

use FOS\RestBundle\View\View;
use App\Services\StorageService;
use App\Services\CsvReaderService;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Swagger\Annotations as SWG;


class ProductController extends AbstractFOSRestController
{

    // /**
    //  * @Get("/api")
    //  */
    // public function index(){
    //     $data = ['name' => 'marco', 'surname' => 'picasso'];

    //     return View::create($data, Response::HTTP_OK);
    // }

    /**
     * Retrive Data
     * @Get("api/flyers")
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Returns the data from a source",
     *     @SWG\Schema(type="json")
     * )
     * )
     * @SWG\Tag(name="flyers")
     * 
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
        return View::create($data, Response::HTTP_OK);
    }
}
