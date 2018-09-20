<?php
include_once '../includes/guestbook.php';
header("content-type:application/json");
session_start();
$user_id=$_SESSION['id'];
$login = new Guestbook();
$array = $login->getId($user_id);
foreach ($array as $k => $v) {
    $id = $v['id'];
    $_SESSION['id'] = $id;
}

if($_GET['action']=="look") {
    $dbhelper = new Guestbook();
    $users = $dbhelper->select();
    echo json_encode($users);
}
else if($_GET['action']=="allreply"){
    $reply_id = $_GET['reply_id'];
    $reply = new Guestbook();
    $users = $reply->reply_select($reply_id);
    echo json_encode($users);
}
else if($_GET['action']=="delete") {
    $id = $_GET['id'];
    $guestbook = new Guestbook();
    $delete = $guestbook->delete($id);
    if ($delete != null) {
        $result = array('msg' => 'aaaa');
        echo(json_encode($result));
    } else {
        return false;
    }
}
?>