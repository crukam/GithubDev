<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\BespokeClass\GithubDevApiWrapper;
use App\BespokeClass\GithubDevApiWrapperFakeController;
use App\Http\Controllers\GitHubDevApiWrapperController;

class GitHubDevApiWrapperControllerTest extends TestCase
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
     * Test get dev data from githubApi
     */
    public function testGetDevData()
    {
        
        $jsonFixture = json_encode(file_get_contents(__DIR__.'/fixtures/crukamDev.json'));
        $GithubDevApiWrapperFakerControler = new GithubDevApiWrapperFakeController($jsonFixture);
        $response = $GithubDevApiWrapperFakerControler->getData('https://api.github.com/users/crukam');
        $this->assertJsonStringEqualsJsonString($response['data'],$jsonFixture);
        
    }
    /**
     * Test get developer avatar
     */
    public function testGetDevAvatar()
    {
        
        $jsonReposFixture = file_get_contents(__DIR__.'/fixtures/crukamRepos.json');
        $GithubDevApiWrapperFakerControler = new GithubDevApiWrapperFakeController($jsonReposFixture);
        $response = $GithubDevApiWrapperFakerControler->getData('https://api.github.com/users/crukam/repos');
        $gitHubDevApiWrapperController = new GitHubDevApiWrapperController();
        $devAvatarData = $gitHubDevApiWrapperController->getDevAvatar($response['data']);
        $this->assertEquals(json_decode($devAvatarData)->userName,'crukam');
    }
    /**
     * Test get developer repositories ressources
     */
    public function testGetDevRessource()
    {
        $jsonReposFixture = file_get_contents(__DIR__.'/fixtures/crukamRepos.json');
        $GithubDevApiWrapperFakerControler = new GithubDevApiWrapperFakeController($jsonReposFixture);
        $response = $GithubDevApiWrapperFakerControler->getData('https://api.github.com/users/crukam/repos');
        $gitHubDevApiWrapperController = new GitHubDevApiWrapperController();
        $this->assertIsArray(json_decode($gitHubDevApiWrapperController->getDevRessource($response['data'])));
    }
    /**
     * Test get repository languages
     */
    public function testGetRepositoryLanguages()
    {   
        $jsonReposFixture = file_get_contents(__DIR__.'/fixtures/crukamRepos.json');
        $GithubDevApiWrapperFakerControler = new GithubDevApiWrapperFakeController($jsonReposFixture);
        $response = $GithubDevApiWrapperFakerControler->getData('https://api.github.com/users/crukam/repos');
        $gitHubDevApiWrapperController = new GitHubDevApiWrapperController();
        $repositories = json_decode($gitHubDevApiWrapperController->getDevRessource($response['data']));
        $this->assertIsObject(json_decode($gitHubDevApiWrapperController->getLanguages($repositories[0])));
    }
}
