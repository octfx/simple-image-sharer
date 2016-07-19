<?php
if(isset($match['params']['imgid'])){
    $id = str_replace(array('.', '/', '\\'), '', $match['params']['imgid']);
    $id = strip_tags($id);

    $result = glob (imagedir.$id.'.*');
    if(!empty($result)){
        $mime = mime_content_type($result[0]);
        if(!empty($mime)){
            header('content-type: '.$mime);
            readfile($result[0]);
        }else{
            include basedir.'/start.html';
        }
    }else{
        include basedir.'/start.html';
    }
}
