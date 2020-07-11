<?php

use Illuminate\Http\Response;

class BestSellerTest extends TestCase
{
    /** @test **/
    public function should_return_a_valid_response()
    {

        $this->get("/api/v1/products/bestseller");
        $this->seeStatusCode(Response::HTTP_OK);

        $this->seeJsonStructure(["data" => ["*" => [
            "id",
            "name",
            "sales"
        ]]]);
    }
}
