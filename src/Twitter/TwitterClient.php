<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 21/07/15
 * Time: 16:03
 */

namespace Socialize\Twitter;


use Socialize\SocialClientContract;

class TwitterClient  implements  SocialClientContract{
    protected $settings ;
    protected $api;
    function __construct($settings)
    {
        $this->settings = $settings;
        $this->api = new \TwitterAPIExchange($this->settings);

    }

    public function getProfileInfo($ricerca){
        $URL = 'https://api.twitter.com/1.1/users/show.json';
        $METHOD = 'get';
        $getfield = 'screen_name='.$ricerca;


        return $this->api->request($URL,$METHOD,$getfield);
        /*return $this->api->buildOauth($URL,$METHOD)
            ->setGetfield($getfield)//http_build_query($getfields)
            //->setPostfields($getfields)
            ->performRequest();*/

    }
}