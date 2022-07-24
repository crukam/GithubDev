<?php

namespace App\BespokeClass;

use  App\Http\Controllers\GitHubDevApiWrapperController;

class GithubDevApiWrapperFakeController extends GitHubDevApiWrapperController
{
    protected $jsonData;

    public function __construct($json)
    {
        $this->jsonData = $json;
    }

    /**
     * Simulate github API return
     */
    public function getData(string $url)
    {
        return ['Endpoint'=>$url,'data'=>$this->jsonData];
    }
}