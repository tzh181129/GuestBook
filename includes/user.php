<?php
include_once '../database/mysql_helper.php';

class User
{
    private $username;
    private $sex;
    private $image;
    private $email;
    private $phone;
    private $userpwd;
    private $regtime;
    private $id;
    public $dname;

    public function _construct($username, $sex, $image, $email, $phone, $userpwd, $regtime, $id, $dname)
    {
        $this->username = $username;
        $this->sex = $sex;
        $this->image = $image;
        $this->email = $email;
        $this->phone = $phone;
        $this->userpwd = $userpwd;
        $this->regtime = $regtime;
        $this->id = $id;
        $this->dname = $dname;
    }

    public function insert($username, $sex, $image, $email, $phone, $userpwd, $regtime)
    {
        $conn = new DBHelper();
        $sql = "insert into user (username,sex,image,email,phone,userpwd,regtime) 
                  values('$username','$sex','$image','$email','$phone','$userpwd','$regtime')";
        $result = $conn->all($sql);
        if ($result === FALSE) {
            return FALSE;
        } else {
            return $result;
        }
    }

    public function getUserByName($dname)
    {
        $conn = new DBHelper();
        $sql = "select id,username,sex,image,email,phone from user where username='$dname'";
        $result = $conn->select($sql);
        if ($result === FALSE) {
            return FALSE;
        } else {
            return $result;
        }
    }
}
