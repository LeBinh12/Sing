<?php
   function GetCategory($name){
    $accessToken = array(
        'Content-Type: application/json',
        'Authorization: Bearer YOUR_ACCESS_TOKEN'
    );
    // $encodedSearchTerm = urlencode($name);//Mã hóa từ khóa tìm kiếm
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://ac.mp3.zing.vn/complete?type=artist,song,key,code&num=500&query=$name ");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $accessToken);




$response = curl_exec($ch);
curl_close($ch);


if ($response) {
    $data = json_decode($response, true);
     
    // Lấy danh sách bài hát từ dữ liệu JSON
    if ($data["result"]) {
        $songs = $data['data'][0]['song'];
        foreach ($songs as $song) {
            $songName = $song['name'];
            echo $songName . "<br>";
        }
    } else {
        echo "Không tìm thấy bài hát.";
        
    }
} else {
    echo "Lỗi kết nối.";
    
}
}


?>