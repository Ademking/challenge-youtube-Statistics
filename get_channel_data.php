<?php


require __DIR__ . '/vendor/autoload.php';





function get_data_channel($id_channel) {

    $API_KEY = "AIzaSyDLNCqoMe9MnZRemfn7in3euNAWs7ygcg8";
    $client2 = new Google_Client();
    $client2->setDeveloperKey($API_KEY);
    
    $youtube = new Google_Service_YouTube($client2);
    
    
    $videos = $youtube->channels->listChannels("snippet,contentDetails,statistics", array(
        'id' => $id_channel
    ));
    
    
    $nb_sub = $videos[0]['statistics']['subscriberCount'];
    $nb_videos = $videos[0]['statistics']['videoCount'];
    $nb_views = $videos[0]['statistics']['viewCount'];
    
    $result = [$nb_sub, $nb_videos, $nb_videos];
    return $result;
    
}


?>