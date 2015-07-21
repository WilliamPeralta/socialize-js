<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 21/07/15
 * Time: 20:52
 */

namespace Socialize;


class SocialProfileModel {
    protected $username;
    protected $name;
    protected $profile_picture;
    protected $social;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProfilePicture()
    {
        return $this->profile_picture;
    }

    /**
     * @param mixed $profile_picture
     */
    public function setProfilePicture($profile_picture)
    {
        $this->profile_picture = $profile_picture;
    }

    /**
     * @return mixed
     */
    public function getSocial()
    {
        return $this->social;
    }

    /**
     * @param mixed $social
     */
    public function setSocial($social)
    {
        $this->social = $social;
    }

}