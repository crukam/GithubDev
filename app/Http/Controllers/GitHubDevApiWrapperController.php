<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BespokeClass\GithubDevApiWrapper;
use App\Models\Developer;
use App\Models\DeveloperRepository;
use App\Models\Language;
use App\Http\Resources\DeveloperResource;

class GitHubDevApiWrapperController extends Controller
{
    
    /**
     * function helper to get developer repos data
     */
    private function getDevRepoData(Request $request)
    {
        $GithubDevApiWrapper = new GithubDevApiWrapper();
        $GithubDevApiWrapper->setBaseUrl('https://api.github.com/users/');
        $GithubDevApiWrapper->setCurlCallSettings($request->query()['userName'].'/repos','GET');
        return $GithubDevApiWrapper->getApiWrapperRequestResponse();
       // return file_get_contents('/home/claude/githubDev/tests/Unit/fixtures/errorResponse.json');
        
    }
    /**
     * A basic function to get the developer avatar picture
     */
    public function getDevAvatar($devRepoData)
    {
        
        foreach(json_decode($devRepoData) as $repo)
        {
            if(!$repo->fork) return json_encode([
                                        'userName'=>$repo->owner->login,
                                        'avatarUrl'=>$repo->owner->avatar_url
                                    ]);
        }
        
        return json_encode([
            'message'=>'Guthub user has only forked repos',
            'error'=>true
        ]);
    }
    /**
     * A function to get the repositories ressource for the database
     */
    public function getDevRessource($devRepoData)
    {
        $repositories = [];
        foreach(json_decode($devRepoData) as $repo)
        {
            if(!$repo->fork)
            {
                $repositories [] = ['userName'=>$repo->owner->login,'name'=>$repo->name,'language'=>$repo->languages_url];
            }
        }
        return json_encode($repositories);
    }
    /**
     * A simple function to get the language from repository ressource
     */
    public function getLanguages($repository)
    {
        $GithubDevApiWrapper = new GithubDevApiWrapper();
        $GithubDevApiWrapper->setBaseUrl('https://api.github.com/repos/');
        $GithubDevApiWrapper->setCurlCallSettings($repository->userName.'/'.$repository->name. '/languages','GET');
        return $GithubDevApiWrapper->getApiWrapperRequestResponse();
        
    }
     /**
     * Show developer data
     * 
     * @param Request $request
     * @return json 
     */
    public function index( Request $request)
    {
        //$devData = $this->getDevData($request);
        $devRepos = $this->getDevRepoData($request);
        //check whether we have a valid response from Github API

        if(isset(json_decode($devRepos)->message))
        {
            if(json_decode($devRepos)->message == "Not Found")
            {
                return json_encode(['code'=>400,'message'=>'The developer '.$request->query()['userName'].' can not be found.']);
            }
            else
            {
                return json_encode(['code'=>401,'message'=>'Unauthorised access']);
            }
        }
        $devData = $this->getDevAvatar($devRepos);
        $reposData = $this->getDevRessource($devRepos);
        //save developer
        
        $developer = Developer::firstOrNew(
            ['userName'=>json_decode($devData)->userName],
            ['avatarUrl'=>json_decode($devData)->avatarUrl]
        );

        $developer->save();
        //save developer repositories and attach repositories and languages (if developer is not in the database)
        
        
        foreach(json_decode($reposData) as $repo)
        {
            
            $repository = DeveloperRepository::firstOrNew(
                ['name'=>$repo->name]
            );
            
            $developer->repositories()->save($repository );

            $languages [] = json_decode($this->getLanguages($repo));
            
            foreach($languages as $lang)
            {
                foreach((array)$lang as $key=>$value)
                {
                   
                    $language = Language::firstOrNew(
                        ['name'=>$key]
                    );
                    
                    $language->save();
                    if(!$repository->languages->contains($language))
                        $repository->languages()->attach($language, ['numberOfLignesOfCode'=>$value]);
                    
                }
            }
            
        }
        
        return $developer;
        
    }
    /**
     * Show developer data
     * 
     * @param Request $request
     * @return json 
     */
    public function show( Request $request)
    {
        
        $developer  = Developer::where('userName', $request->query()['userName'])->get();
        return $developer->isEmpty() ? $this->index($request) : $developer;
    }
}
