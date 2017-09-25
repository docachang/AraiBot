
<?php

//TwistOAuthの実行
require_once('TwistOAuth.phar');


//キーとトークンの設定
$consumer_key = "VVDhJ8TUioCUpDND6NWo4xuIL";
$consumer_secret = "dj3JeMkVLAFYD2XO43Twm1zgGjzfIcMLtw82R0qsdHTQ29ouTf";
$access_token = "908499373322944513-ak6xdRWnoRiCtslT70nj2CJrfcHyopt";
$access_token_secret = "y80hIUKwqfDRMzF7mDNDAgXaCB6meF7YtiIhR50Incq6P";

//listの読み込みとメッセージの取得
$filelist = file('list.txt');
if( shuffle($filelist) ){
  $message = $filelist[0];
}


// TwitterAPIに接続するあらゆる正常時の処理はこのブロックの中で行う
try {
    // クレデンシャル生成
    $to = new TwistOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
    // ツイート
    $status = $to->post('statuses/update', ['status' => $message ]);
    // レスポンス確認(異常時にはcatchにジャンプするため、ここへの到達は成功を意味する)
    var_dump($status);
} catch (TwistException $e) {
    // エラーを表示
    echo "[{$e->getCode()}] {$e->getMessage()}";
}


?>