<?php
    function GetCategory($name) {
    $accessToken = 'YOUR_ACCESS_TOKEN';
    $url = "http://ac.mp3.zing.vn/complete?type=artist,song,key,code&num=500&query=" . urlencode($name);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $accessToken
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $data = json_decode($response, true);

        // Lấy danh sách bài hát từ dữ liệu JSON
        if ($data["result"]) {
            $songs = $data['data'][0]['song'];
            
            foreach ($songs as $song) {
                
                ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
    <div class="member">
      <div class="member-img">
        <img src=" <?php echo $song["thumb"]?>" class="img-fluid" alt="">
      
      </div>
      <div class="member-info">
        <form action="index.php?Page=Views/Page/PlayMusic.php&IdSing=<?php echo $song["id"]?>" method="post">
        <h4><?php echo  $song["name"] ?></h4>
        <span><?php echo $song["artist"] ?></span>
        <button type="button" class="btn btn-outline-primary" name="PlaySing"><i class="bi bi-play"></i>Nghe Nhạc</button>
    </form>
    
      </div>
    </div>
  </div>
                <?php
            }
            
        } else {
            echo "Không tìm thấy bài hát.";
        }
    } else {
        echo "Lỗi kết nối.";
    }
}


?>