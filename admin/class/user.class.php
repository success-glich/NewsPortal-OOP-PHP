<?php
require_once("../admin/class/common.class.php");
class User{
    public $id, $username,$email,$last_logi,$status,$role;
    
    public function login(){
        $this->password =md5($this->password);
        $sql="select * from tbl_user where email='$this->email' and password ='$this->password' and status=1";
        // $conn=new  mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
        $conn=new  mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $u =$result->fetch_object();
            session_start();
            $_SESSION["name"]=$u->name;
            $_SESSION["email"]=$u->email;
            $_SESSION["role"]=$u->role;
            $_SESSION["username"]=$u->role;
            header('location:dashboard.php');
        }else{
            return "Login Failed";
        }

    }
}



?>