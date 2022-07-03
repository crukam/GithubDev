<?php

namespace  App\BespokeClass;

class GithubDevApiWrapper 
{
    private string $username; //developer username to query
    private string $baseUrl; // Api wrapper base url
    private array $curlSettings; // Api wrapper curl call settings
    private array $postJsonArray; // Array for post request data
    private array $signature; // array for authentification

    /**
     * Set developer username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get developer username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set Api wrapper base url
     */
    public function setBaseUrl($url)
    {
        $this->baseUrl = $url;
    }

    /**
     * Get Api wrapper base url
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * set curl url call
     */
    public function setCurlUrl($url)
    {
        return $this->baseUrl.$url;
    }

    /**
     * Set curl call settings
     */
    public function setCurlCallSettings($url,$requestMethod)
    {
        $this->curlSettings = [
            CURLOPT_URL =>  $this-> setCurlUrl($url),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $requestMethod,
            CURLOPT_USERAGENT => 'crukam'
        ];
    }

    /**
     *Get curl call settings 
     * 
     */ 
    public function getCurlCallSettings()
    {
        return $this->curlSettings;
    }

    /**
     * Get curl call settings
     */
    public function getJsonArrayCurlCallSettings()
    {
        return !empty($this->postJsonArray) ? $this->postJsonArray : [];
    }

    /**
     * send request and return response
     */
    public function getApiWrapperRequestResponse()
    {
       //create a new curl resource
        $curl = curl_init();

        //set url and other options
        curl_setopt_array($curl,$this->curlSettings);
        
        //grab the response
        $response = curl_exec($curl);

        //close curl handler
        curl_close($curl);
        
        
        return  $response;
      

    }
    /**
     * Check response is valid
     */
    public function checkResponseIsValid($response)
    {
        return !(isset(json_decode($response)->message) && (json_decode($response)->message == 'Not Found'));
    }

    /**
     * filter response to no forked repo
     */
    public function getApiWrapperRequestResponseFiltered($response)
    {
        if($this->checkResponseIsValid($response))
        {
            return array_filter(json_decode($response), function($repo){
                return $repo->fork == false;
            });
        }
        return [];
    }
}
?>