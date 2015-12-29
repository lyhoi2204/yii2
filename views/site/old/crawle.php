<div class="breadcrumbs column">
                	<p><a href="#">Home.</a>   \\   <a href="#">Categories.</a>   \\   World News.</p>
                </div>
                
<div class="main-content">

<?php

$url = 'http://khoahoc.tv/ao-khoac-chong-tham-nuoc-thay-the-ao-mua-ma-van-sanh-dieu-67633';
        
        $context = stream_context_create(
    array (
        'http' => array (
            'follow_location' => false // don't follow redirects
        )
    )
);
$html = file_get_contents($url, false, $context);

var_dump($html);







?>





</div>

