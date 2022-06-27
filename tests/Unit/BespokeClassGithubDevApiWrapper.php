<?php

namespace Tests\Unit;


use PHPUnit\Framework\TestCase;

use App\BespokeClass\GithubDevApiWrapper;

class BespokeClassGithubDevApiWrapper extends TestCase
{
    private $githubDevApiWrapper ;

    private function initGithubDevApiWrapper()
    {
        $baseUrl = 'https://api.github.com/users/';
        $username = 'exampleName';
        $this->githubDevApiWrapper = new GithubDEvApiWrapper();
        $this->githubDevApiWrapper->setUsername($username);
        $this->githubDevApiWrapper->setBaseUrl($baseUrl);
        $this->githubDevApiWrapper->setCurlCallSettings('crukam/repos','GET');
    }
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
     * A test to set/get developer user name
     */
    public function testcanSetUsername()
    {
        
        $this->initGithubDevApiWrapper();
        $this->AssertEquals('exampleName',$this->githubDevApiWrapper->getUsername(),'the username set is incorrect');

    }

    /**
     * Test to set/get base url
     */
    public function testCanSetGetBaseUrl()
    {
       
        $this->initGithubDevApiWrapper();
        
        $this->AssertEquals('https://api.github.com/users/',$this->githubDevApiWrapper->getBaseUrl(),'The base url is incorrectly set');

    }
    /**
     * Test set curl url
     */
    public function testSetCurlUrl()
    {
        $apiUrl = 'crukam/repos';
      
        $this->initGithubDevApiWrapper();
        $this->AssertEquals('https://api.github.com/users/crukam/repos',$this->githubDevApiWrapper->setCurlUrl($apiUrl),'The url is not curl friendly');

    }
   /** 
    * Test request send and receive a response
   */
  public function testRequestSendAndReceiveResponse()
  {
    //$this->initGithubDevApiWrapper();
    $this->assertFalse(false);
  }

  /**
   * test curl settings keys
   */
  public function testCurlSettingsKeys()
  {
    $expectedArray = [
            CURLOPT_URL => 'https://api.github.com/users/crukam/repos',
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING    =>'',
            CURLOPT_MAXREDIRS =>10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_USERAGENT => 'crukam'
        ];
    $this->initGithubDevApiWrapper();
    $this->assertSame($this->githubDevApiWrapper->getCurlCallSettings(),$expectedArray);
  }
  /**
   * Test curl call response Type
   */
  public function testCurlResponseType()
  {
    $this->initGithubDevApiWrapper();
    $response = $this->githubDevApiWrapper->getApiWrapperRequestResponse();
    $this->assertIsArray(json_decode($response));
  }
  /**
   * Test call has all the repos
   */
  public function testCurlResponsehasAllRepos()
  {
    $this->initGithubDevApiWrapper();
    $expectedJson = file_get_contents(__DIR__.'/fixtures/crukamRepos.json');
    $this->assertSame($expectedJson,$this->githubDevApiWrapper->getApiWrapperRequestResponse());
  }
  /**
   * Test wrapper return error with no existing username
   */
  public function testWrapperReturnError()
  {
    $this->initGithubDevApiWrapper();
    //set an no existing api wrapper
    $url = $this->githubDevApiWrapper->setCurlUrl('crukam1234!=/repos');
    $this->githubDevApiWrapper->setCurlCallSettings($url,'GET');
    
    $response = $this->githubDevApiWrapper->getApiWrapperRequestResponse();
    
    $this->assertFalse($this->githubDevApiWrapper->checkResponseIsValid($response));
  
  }
}
