<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 21/07/15
 * Time: 16:03
 */

namespace Socialize\Twitter;


use Socialize\SocialClientContract;
use Socialize\SocialProfileModel;

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
        $getfield = 'screen_name='.$ricerca;

        $result =  $this->api
            ->setGetfield($getfield)//http_build_query($getfields)
            ->buildOauth($URL,$METHOD)
            //->setPostfields($getfields)
            ->performRequest();

        $data = json_decode($result,true);

        $model = new SocialProfileModel();
        $model->setData($data);
        $model->setName($data['name']);
        $model->setSocial('twitter');
        $model->setFollowersCount($data['followers_count']);
        $model->setUsername($data['screen_name']);
        $model->setProfilePicture($data['profile_image_url']);

        return $model;
    }
}