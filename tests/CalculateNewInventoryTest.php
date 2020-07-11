<?php

use Illuminate\Http\Response;

class CalculateNewInventoryTest extends TestCase
{
    /** @test **/
    public function should_return_a_valid_response()
    {

        $this->get("/api/v1/calculate_inventory");
        $this->seeStatusCode(Response::HTTP_OK);

        $this->seeJsonStructure(["data" => ["*" => [
            "id",
            "name",
            "in_stock",
            "ordered",
            "new_stock"
        ]]]);
    }
}
