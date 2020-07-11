<?php

use Illuminate\Http\Response;

class ProductsToShipTest extends TestCase
{
    /** @test **/
    public function should_return_a_valid_response()
    {

        $this->get("/api/v1/products/toship");
        $this->seeStatusCode(Response::HTTP_OK);

        $this->seeJsonStructure(["data" => ["*" => [
            "id",
            "name",
            "order_id",
            "address",
            "to_be_listed",
            "carrier"
        ]]]);

    }
}
