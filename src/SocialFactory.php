<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 21/07/15
 * Time: 15:56
 */

namespace Socialize;


use Socialize\Twitter\TwitterClient;

class SocialFactory {
    protected  $twitter_settings;

    /**
     * @return mixed
     */
    public function getTwitterSettings()
    {
        return $this->twitter_settings;
    }

    /**
     * @param mixed $twitter_settings
     */
    public function setTwitterSettings($twitter_settings)
    {
        $this->twitter_settings = $twitter_settings;
    }

    /**
     * @param $social
     * @param $ricerca
     */
    public function getProfile($social,$ricerca){
        switch($social){
            case "twitter":
                $socialclient = new TwitterClient($this->getTwitterSettings());
                break;
        }
        $result = $socialclient->getProfileInfo($ricerca);
        var_dump($result);
    }
}