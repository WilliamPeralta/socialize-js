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
        $METHOD = 'GET';
        $getfields = array(
            'screen_name' => $ricerca
        );
        return $this->api->buildOauth($URL,$METHOD)
            ->setGetfield(urlencode($getfields))
            ->performRequest();

    }
}