<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 21/07/15
 * Time: 15:56
 */

namespace Socialize;


use Socialize\Instagram\InstagramClient;
use Socialize\Twitter\TwitterClient;

class SocialFactory {
    protected  $twitter_settings;
    protected  $instagram_settings;

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
     * @return mixed
     */
    public function getInstagramSettings()
    {
        return $this->instagram_settings;
    }

    /**
     * @param mixed $instagram_settings
     */
    public function setInstagramSettings($instagram_settings)
    {
        $this->instagram_settings = $instagram_settings;
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
            case "instagram":
                $socialclient = new InstagramClient($this->getInstagramSettings());
                break;
        }
        $result = $socialclient->getProfileInfo($ricerca);

        return $result;
    }
}