<?php

use Illuminate\Http\Response;

class AvailableProductsTest extends TestCase
{
    /** @test **/
    public function should_return_a_valid_response()
    {

        $this->get("/api/v1/products/availableproducts");
        $this->seeStatusCode(Response::HTTP_OK);

        $this->seeJsonStructure(["data" => ["*" => [
            "id",
            "name",
            "in_stock",
            "total_ordered"
        ]]]);
    }
}
