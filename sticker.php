<?php
function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
$sticker= array('http://cdn-img.easyicon.net/png/11707/1170781.gif','http://cdn-img.easyicon.net/png/11794/1179498.gif','http://cdn-img.easyicon.net/png/11852/1185218.gif','http://cdn-img.easyicon.net/png/12026/1202676.gif','http://cdn-img.easyicon.net/png/12027/1202773.gif','http://cdn-img.easyicon.net/png/12027/1202775.gif','http://cdn-img.easyicon.net/png/11759/1175970.gif','http://cdn-img.easyicon.net/png/11759/1175990.gif','http://cdn-img.easyicon.net/png/11858/1185862.gif','http://cdn-img.easyicon.net/png/11858/1185880.gif','http://cdn-img.easyicon.net/png/11858/1185898.gif','http://cdn-img.easyicon.net/png/5216/521695.gif','http://cdn-img.easyicon.net/png/11317/1131798.gif','http://cdn-img.easyicon.net/png/11318/1131800.gif',);
$sticker=$sticker[rand(0,count($sticker)-1)];
$yx=opendir('myToken'); while($isi=readdir($yx)){ if($isi != '.' && $isi != '..'){ $access_token=$isi;
if(file_exists('sticker.txt')){ $log=json_encode(file('sticker.txt')); }else{ $log=''; }
$stat=json_decode(auto('https://graph.facebook.com/me/home?fields=id&limit=12&access_token='.$access_token),true);
for($i=1;$i<=count($stat[data]);$i++){if(!ereg($stat[data][$i-1][id],$log)){$x=$stat[data][$i-1][id].'~'; $y= fopen('sticker.txt','a'); fwrite($y,$x); fclose($y);
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/comments?attachment_url='.$sticker.'&message=　&access_token='.$access_token.'&method=POST');
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/likes?access_token='.$access_token.'&method=POST');
}
}
}
}
?>
