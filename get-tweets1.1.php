<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); 
 
$twitteruser = "lifelynl";
$notweets = 20;
$consumerkey = "a4fVzrGebBLv0A9lDRYQ";
$consumersecret = "mZclww5m0PTBGGLXGC9i96EZKwCCVXPJzIx5F8BVg";
$accesstoken = "2224557678-dzf0eRN9uwxTEIaeVACFu23moknIoxv5FaPBGzU";
$accesstokensecret = "Sr64XAX7Ms5xAHoeVxzRQgG6XiSjjTJUPOSJF7HEPpB6t";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>