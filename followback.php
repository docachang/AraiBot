
<?php


//TwistOAuth�̎��s
require_once('TwistOAuth.phar');


//�L�[�ƃg�[�N���̐ݒ�
$consumer_key = "VVDhJ8TUioCUpDND6NWo4xuIL";
$consumer_secret = "dj3JeMkVLAFYD2XO43Twm1zgGjzfIcMLtw82R0qsdHTQ29ouTf";
$access_token = "908499373322944513-ak6xdRWnoRiCtslT70nj2CJrfcHyopt";
$access_token_secret = "y80hIUKwqfDRMzF7mDNDAgXaCB6meF7YtiIhR50Incq6P";


// OAuth�I�u�W�F�N�g����
$to = new TwitterOAuth(
    $consumer_key,
    $consumer_secret,
    $access_token,
    $access_token_secret
);

// �t�H���[���Ă���A�J�E���g��ID��ǂݍ���
$friends_ids = $to->get('friends/ids');
// $friends_list= $to->get('friends/list');
 
// �t�H�����[�̏���Ǎ���
$followers_list = $to->get('followers/list');
 
// �J�E���^�̏�����
$cnt_f = 0;
$cnt_r = 0;
 
// �t�H�����[���Ƃɉ�
foreach ( $followers_list->users as $itr => $usr) {
 
    $cond =(empty($friends_ids->ids) || !in_array($usr->id, $friends_ids->ids))//
        && !($usr->protected); 
    if ($cond) {
        $req_f = $to->post('friendships/create', ['user_id' => $usr->id]);
        if ($req_f) {
            $cnt_f += 1;
            // ���v���C
            $reply = '@'.$usr->screen_name.//
            ' �t�H���[���肪�Ƃ��Ȃ̂��I';
            $req_r = $to->post('statuses/update',['status'=>$reply]);
            if ($req_r) $cnt_r += 1;
            }   
          if ($cnt == 30) break;
    }   
}
 
print "Auto followed $cnt_f user(s). \n";
print "$cnt_r poke message(s) were send. \n";

?>