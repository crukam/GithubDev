<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class GithubDevWrapperFakeControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    /**
     * Test constructor fake constructor
     */
    public function testFakeConstructor()
    {
        $jsonFixture = json_encode(file_get_contents(__DIR__.'/fixtures/crukamDev.json'));

        $this->assertJson($jsonFixture);
    }
}
