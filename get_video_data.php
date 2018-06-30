<?php
//header('Content-Type: Application/json') ;

require __DIR__ . '/vendor/autoload.php';




    




function get_data($id) {

    $API_KEY = "YOUR_GOOGLE_API_KEY_HERE!!!!!!!!!!!!!!!!";
    $client = new Google_Client();
    $client->setDeveloperKey($API_KEY);
    
    $youtube = new Google_Service_YouTube($client);
    
    $videos = $youtube->videos->listVideos("snippet,statistics,contentDetails", array(
        'id' => $id
    ));
    
    
    
    $title = $videos[0]['snippet']['localized']['title'];
    $description = $videos[0]['snippet']['localized']['description'];
    $channel_id = $videos[0]['snippet']['channelId'];
    $channel_name = $videos[0]['snippet']['channelTitle'];
    $date_published = $videos[0]['snippet']['publishedAt'];
    $tags = $videos[0]['snippet']['tags'];
    $thumbnail = $videos[0]['snippet']['thumbnails']['maxres']['url'];
    
    $comments_count = $videos[0]['statistics']['commentCount'];
    $dislikes = $videos[0]['statistics']['dislikeCount'];
    $likes = $videos[0]['statistics']['likeCount'];
    $views = $videos[0]['statistics']['viewCount'];

    $result = [$title,
               $description,
               $channel_id,
               $channel_name, 
               $date_published, 
               $tags, 
               $thumbnail,
               $comments_count,
               $dislikes,
               $likes,
               $views
            ];
    

    return $result;
    // $result = (object)[];
    // $result->title = $title;
    // $result->description = $description;
    // $result->channelID = $channel_id;
    // $result->channelName = $channel_name;
    // $result->tags = $tags;
    // $result->thumbnail = $thumbnail;
    
    // $myJSON = json_encode($result);
    // echo $myJSON;
    
}




?>
