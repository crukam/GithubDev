<?php

namespace Tests\Unit;

use App\Models\Developer;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class DeveloperModel extends TestCase
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
     * Test send error when search a no existant username.
     */
    public function testCanReturnErrorWhenUsernameNotInTable()
    {
        $userName = "@ada16";
        $developer =  Developer::findByuserName($userName);
        
        $this->assertNull($developer);
    }
    /**
     * Test return object if username in database
     */
    public function testReturnObjectWhenUsernameInDatabase()
    {
        $userName = "ada16";
        $developer =  Developer::findByuserName($userName);
        $this->assertIsObject($developer);
    }
}
