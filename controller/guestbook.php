<?php
header('Content-type:application/json');
include_once '../includes/guestbook.php';
session_start();
if ($_POST['action'] == "publish") {

    $user_id = $_SESSION['id'];
    $content = $_POST['content'];

    date_default_timezone_set("Asia/Shanghai");
    $createtime = date("Y-m-d h:i:s A l");

    $guestbook = new Guestbook();
    $array = $guestbook->insert($user_id, $content, $createtime);

    if ($array != null) {
        $result = array('msg' => 'aaaa');
        echo(json_encode($result));
    } else {
        return false;
    }

} elseif ($_POST['action'] == "reply") {

    $reply_id = $_SESSION['id'];
    $recontent = $_POST['recontent'];

    date_default_timezone_set("Asia/Shanghai");
    $retime = date("Y-m-d h:i:s A l");

    $guestbook = new Guestbook();
    $array = $guestbook->reply_insert($reply_id, $recontent, $retime);
    if ($array != null) {
        $result = array('msg' => 'aaaa');
        echo(json_encode($result));
    } else {
        return false;
    }

}