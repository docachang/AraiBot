
<?php

//TwistOAuth�̎��s
require_once('TwistOAuth.phar');


//�L�[�ƃg�[�N���̐ݒ�
$consumer_key = "VVDhJ8TUioCUpDND6NWo4xuIL";
$consumer_secret = "dj3JeMkVLAFYD2XO43Twm1zgGjzfIcMLtw82R0qsdHTQ29ouTf";
$access_token = "908499373322944513-ak6xdRWnoRiCtslT70nj2CJrfcHyopt";
$access_token_secret = "y80hIUKwqfDRMzF7mDNDAgXaCB6meF7YtiIhR50Incq6P";

//list�̓ǂݍ��݂ƃ��b�Z�[�W�̎擾
$filelist = file('list.txt');
if( shuffle($filelist) ){
  $message = $filelist[0];
}


// TwitterAPI�ɐڑ����邠���鐳�펞�̏����͂��̃u���b�N�̒��ōs��
try {
    // �N���f���V��������
    $to = new TwistOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
    // �c�C�[�g
    $status = $to->post('statuses/update', ['status' => $message ]);
    // ���X�|���X�m�F(�ُ펞�ɂ�catch�ɃW�����v���邽�߁A�����ւ̓��B�͐������Ӗ�����)
    var_dump($status);
} catch (TwistException $e) {
    // �G���[��\��
    echo "[{$e->getCode()}] {$e->getMessage()}";
}


?>