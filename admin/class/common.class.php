<?php
define ('DB_HOST','localhost');
define('DB_NAME','db_project_news');
define ('DB_USERNAME','root');
define('DB_PASSWORD','');
abstract class Common{
    abstract function save();
    abstract function edit();
    abstract function remove();
    abstract function retrive();

    function set($key, $value){
        $this->$key =$this->validate($value);
    }
    function get($key){
        return $this->key;
    }
    function insert($sql){
        try{
            $conn = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

        }catch (Exception $e){
            die($e);
        }
        if($conn->query($sql)){

            return $conn->insert_id;

        }else{
            return "false";
        }
    }
    function select($sql){
        try{
            $conn = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

        }catch (Exception $e){
            die($e);
        }
        $result=$conn->query($sql);
        $data=[];
        if($result->num_rows>0){
            while($d=$result->fetch_object()){
                    array_push($data,$d);
            }
        }
        return $data;
}
public function delete($sql){
    try{
        $conn = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

    }catch (Exception $e){
        die($e);
    }
    if($conn->query($conn)){
        return true;
    }else{
        return false;
    }
}
function update($sql){
    try{
        $conn=new  mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    }catch(Exception $e){
        die ($e);
    }
    if($conn->query($sql)){
        return true;
    }else{
        return false;
    }
}
function validate($value){
    try{
        $conn=new  mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    }catch(Exception $e){
        die ($e);
    }
     $value=  $conn->real_escape_string($value);
       return $value;
   }
}




