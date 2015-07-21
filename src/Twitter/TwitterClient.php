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
        $getfield = '?screen_name='.$ricerca;

        return $this->api
            ->setGetfield($getfield)//http_build_query($getfields)
            ->buildOauth($URL,$METHOD)
            //->setPostfields($getfields)
            ->performRequest();

    }
}