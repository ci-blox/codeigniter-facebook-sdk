<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Facebook SDK Wrapper for CodeIgniter / Ignition Go
 *
 * Sample helpers for Facebook PHP SDK
 *
 * @package     CI-Blox/Ignition-Go
 * @category    Helpers
 * @author      Bob Lennes
 * @license     MIT
 * @link        https://github.com/ci-blox/codeigniter-facebook-sdk
 * @version     1.0.0
 */

    use Facebook\Facebook as FB;
    use Facebook\Exceptions\FacebookResponseException;
    use Facebook\Exceptions\FacebookSDKException;


/*
Samples
 
*/
function fb_getProfileInfo($fblib) {

    $response = $fblib->request('get','me','fields=link,name,email,albums.limit(5){name, photos.limit(6){name, picture, tags.limit(6)}},posts.limit(5)', $token);

    $respBasic = $fblib->request('get','me','fields=link,name,email', $token);

    $respAlbums = $fblib->request('get','me','fields=albums.limit(2){name, photos.limit(6){name, picture, tags.limit(6)}}', $token);

    $respLikes = $fblib->request('get','me','fields=likes.limit(5)', $token);

    print_r($respBasic);
    print_r($response);
    print_r($respAlbums);
    print_r($respLikes);
}

    /**
     * Upload image or video to user profile
     * pass in facebook library reference 
     *
     * @param        $fblib
     * @param        $path_to_file
     * @param array  $params
     * @param string $type
     * @param null   $access_token
     *
     * @return array
     */
    function fb_fileToUpload($fblib, $path_to_file, $params = [], $type = 'image', $access_token = null)
    {
        if ($type === 'image')
        {
            $data = ['source' => $fblib->object()->fileToUpload($path_to_file)] + $params;
            $endpoint = '/me/photos';
        }
        elseif ($type === 'video')
        {
            $data = ['source' => $fblib->object()->videoToUpload($path_to_file)] + $params;
            $endpoint = '/me/videos';
        }
        else
        {
            return $fblib->logError(400, 'Invalid upload type ' . $type);
        }
        try
        {
            $response = $fblib->object()->post($endpoint, $data, $access_token);
            return $response->getDecodedBody();
        }
        catch(FacebookSDKException $e)
        {
            return $fblib->logError($e->getCode(), $e->getMessage());
        }
    }