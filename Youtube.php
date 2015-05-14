<?php 

class Youtube {

       private  $doc;

        function __construct($channel){

              $this->doc = new DOMDocument();
              $this->doc->load('https://gdata.youtube.com/feeds/api/users/'.$channel.'/uploads');

        }



    function videoList(){

    $list= Array();

        $videos= $this->doc->getElementsByTagName('entry');

        foreach ($videos as $video) {

            $listElement=Array();

            $title=$video->getElementsByTagName('title')->item(0)->nodeValue;
            $id= explode("http://gdata.youtube.com/feeds/api/videos/",($video->getElementsByTagName('id')->item(0)->nodeValue))[1];
            $thumbnail=$video->getElementsByTagName('thumbnail')->item(0)->getAttribute('url');
            $duration=$video->getElementsByTagName('duration')->item(0)->getAttribute('seconds');

            $listElement['id']=$id;
            $listElement['titre']=$title;
            $listElement['thumbnail']=$thumbnail;
            $listElement['duration']=gmdate("H:i:s", $duration);


            $list[]=$listElement;

        }

        return json_encode($list);

    }




}

?>
