<?php
include_once '../database/mysql_helper.php';
class Guestbook{
    private $content, $createtime,$id,$recontent, $retime,$reply_id;

    public function _construct($content,$createtime,$id,$recontent,$retime,$reply_id){
        $this->content=$content;
        $this->createtime=$createtime;
        $this->id=$id;
        $this->recontent=$recontent;
        $this->retime=$retime;
        $this->reply_id=$reply_id;

    }

    public function insert($user_id,$content, $createtime)
    {
        $conn=new DBHelper();
        $sql = "insert into message(user_id,content,createtime) values('$user_id','$content','$createtime')";
        $result = $conn->all($sql);
        return $result;
    }

    public function select()
    {
        $conn=new DBHelper();
        $sql = "select id,user_id,content,createtime from message";
        $result = $conn->select($sql);
        if($result===FALSE){
            return FALSE;
        }else{
            return $result;
        }
    }
    public function getId($user_id)
    {
        $conn=new DBHelper();
        $sql = "select id from message where user_id='$user_id'";
        $result=$conn->select($sql);
        if($result===FALSE){
            return FALSE;
        }else{
            return $result;
        }
    }

    public function delete($id)
    {
        $conn=new DBHelper();
        $sql="delete from message where id='$id'";
        $result=$conn->all($sql);
        if($result===FALSE){
            return FALSE;
        }else {
            return $result;
        }
    }
    public function reply_insert($reply_id,$recontent,$retime){
        $conn=new DBHelper();
        $sql="insert into reply(reply_id,recontent,retime) values('$reply_id','$recontent','$retime')";
        $result=$conn->all($sql);
        return $result;
    }
    public function reply_select($reply_id)
    {
        $conn=new DBHelper();
        $sql = "select id,reply_id,recontent,retime from reply where reply_id=$reply_id";
        $result = $conn->select($sql);
        if($result===FALSE){
            return FALSE;
        }else{
            return $result;
        }
    }

    public function reply_delete($id)
    {
        $conn=new DBHelper();
        $sql="delete from reply where id='$id'";
        $result=$conn->all($sql);
        if($result===FALSE){
            return FALSE;
        }else {
            return $result;
        }

    }

}