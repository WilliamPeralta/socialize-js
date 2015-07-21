<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 21/07/15
 * Time: 16:05
 */

namespace Socialize;


interface SocialClientContract {
    public function getProfileInfo($ricerca);
}