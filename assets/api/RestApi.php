<?php
    $url = 'http://mp3.zing.vn/html5xml/song-xml/kmJHTZHNCVaSmSuymyFHLH';
    $response = file_get_contents($url);

    $data = json_decode($response, true);

    


?>