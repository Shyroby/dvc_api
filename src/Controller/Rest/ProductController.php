<?php

namespace App\Controller\Rest;

use App\Factories\AbstractCreator;
use App\Factories\ReaderFactory;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;



class ProductController extends AbstractFOSRestController
{

    /**
     * @Get("/flyers")
     */
    public function getAll(Request $request, ReaderFactory $creator)
    {

        /**
         * autowire the reader factory 
         */
        $adapter = $creator->make('csv');

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
