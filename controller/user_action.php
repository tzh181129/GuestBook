<?php
header('Content-type:application/json');
include_once '../includes/user.php';

if ($_POST['action'] == "login") {
    session_start();
    $loginname = $_POST['loginname'];
    $_SESSION['loginname'] = $loginname;
    $login = new User();
    $array = $login->getUserByName($loginname);
    foreach ($array as $k => $v) {
        $id = $v['id'];
        $_SESSION['id'] = $id;
    }

    if ($array != null) {
        $result = array('msg' => 'aaaa');
        echo(json_encode($result));
    } else {
        return false;
    }

} elseif ($_POST['action'] == "register") {

    $username = $_POST['username'];
    $sex = $_POST['sex'];
    $image = $_POST['image'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $userpwd = $_POST['userpwd'];
    date_default_timezone_set("Asia/Shanghai");
    $regtime = date("Y-m-d h:i:s A l");
    $register = new User();
    $array = $register->insert($username, $sex, $image, $email, $phone, $userpwd, $regtime);
    if ($array != null) {
        $result = array('msg' => 'aaaa');
        echo(json_encode($result));
    } else {
        return false;
    }
}
?>