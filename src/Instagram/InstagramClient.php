<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 21/07/15
 * Time: 19:29
 */

namespace Socialize\Instagram;


use Socialize\SocialClientContract;

class InstagramClient implements SocialClientContract {
    protected $settings ;

    function __construct($settings)
    {
        $this->settings = $settings;

    }

    public function getProfileInfo($ricerca)
    {
        $result = $this->curl_file_get_contents("https://api.instagram.com/v1/users/search?client_id=".$this->settings['client_id']."&q=" .$ricerca);
        #first result
        $result = json_decode($result,true);
        if (count($result->data > 0)) {
            $result = $result->data[0];
        }

        $second_result = $this->curl_file_get_contents("https://api.instagram.com/v1/users/" . $result['id'] . "?client_id=".$this->settings['client_id']."");
        $second_result = json_decode($second_result,true);

        return array_merge($result,$second_result);

    }

    protected function curl_file_get_contents($url) {
        $curl = curl_init();
        $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';

        curl_setopt($curl, CURLOPT_URL, $url); //The URL to fetch. This can also be set when initializing a session with curl_init().
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); //TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5); //The number of seconds to wait while trying to connect.

        curl_setopt($curl, CURLOPT_USERAGENT, $userAgent); //The contents of the "User-Agent: " header to be used in a HTTP request.
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE); //To follow any "Location: " header that the server sends as part of the HTTP header.
        curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE); //To automatically set the Referer: field in requests where it follows a Location: redirect.
        curl_setopt($curl, CURLOPT_TIMEOUT, 10); //The maximum number of seconds to allow cURL functions to execute.
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //To stop cURL from verifying the peer's certificate.
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

        $contents = curl_exec($curl);
        curl_close($curl);
        return $contents;
    }
}