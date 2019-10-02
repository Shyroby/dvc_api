<?php

namespace Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase {
    
    /**
     * @test
     */
    public function get_data_from_query_string()
    {
        $client = static::createClient();

        $client->request('GET', '/api/flyers', ['page' => 1, 'limit' => 1]);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}