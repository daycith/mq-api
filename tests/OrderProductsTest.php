<?php

use Illuminate\Http\Response;

class OrderProductsTest extends TestCase
{

    /** @test **/
    public function should_validate_order_param()
    {

        $this->get("/api/v1/orderproducts");
        $this->seeStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /** @test **/
    public function should_validate_that_order_exists()
    {

        $this->get("/api/v1/orderproducts?order_id=-1");
        $this->seeStatusCode(Response::HTTP_NOT_FOUND);
    }



    /** @test **/
    public function should_return_a_valid_response()
    {

        $this->get("/api/v1/orderproducts?order_id=1");
        $this->seeStatusCode(Response::HTTP_OK);

        $this->seeJsonStructure(["data" => [
            "toBeShipped",
            "needToBeProvided"
        ]]);
    }
}
