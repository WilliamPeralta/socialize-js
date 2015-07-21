<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 21/07/15
 * Time: 16:20
 */
die("ok");
include_once("vendor/autoload.php");

$socialize = new \Socialize\SocialFactory();

$socialize->setTwitterSettings(array(
    'oauth_access_token' => "YOUR_OAUTH_ACCESS_TOKEN",
    'oauth_access_token_secret' => "YOUR_OAUTH_ACCESS_TOKEN_SECRET",
    'consumer_key' => "tszYO6ESUQs6YD3F0iyVzZX44",
    'consumer_secret' => "NGgN9lFFY4w5TA7JgEFS8T4PpbREySnJlPZfbN5sQE1hBWh1EO"
));

$socialize->getProfile("twitter",'cocacola');