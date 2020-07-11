<?php

use App\Traits\JsonReader;

class JsonReaderTest extends TestCase
{
    use JsonReader;
    /** @test **/
    public function should_return_json_from_a_valid_path()
    {
        $path = storage_path() . "/json/orders-merqueo.json";
        $data = $this->readJson($path);

        $this->assertTrue($data != null);
    }
    /** @test **/
    public function should_return_null_from_an_invalid_path()
    {
        $path = storage_path() . "/json/x.json";
        $data = $this->readJson($path);

        $this->assertTrue($data == null);
    }
}
