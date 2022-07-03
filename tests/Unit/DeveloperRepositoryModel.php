<?php
namespace Tests\Unit;


//use PHPUnit\Framework\TestCase;
//use Illuminate\Foundation\Testing\TestCase;
//use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\TestCase;

use App\Models\DeveloperRepository;

class DeveloperRepositoryModel extends TestCase
{
    public function testgetAll()
    {
        $repopsitoryInstance = new DeveloperRepository();
        $repositories =  $repopsitoryInstance->all();
        $this->assertInstanceOf('App\Models\DeveloperRepository',$repositories[0]);
    }
}
?>