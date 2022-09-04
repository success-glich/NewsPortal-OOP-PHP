<?php
require_once("../newsportal/admin/class/common.class.php");

class Category extends Common {
    public $id , $name,$rank,$status,$created_by,$created_date,$modified_by,$modified_date;
    function save(){
        // print_r($this);

        $sql="insert into tbl_category (name,rank,status,created_date,created_by) 
          values ('$this->name','$this->rank','$this->status','$this->created_date','$this->created_by');";
        //   echo $sql;
        return $this->insert($sql) ;
    }

        
    

    function edit(){
        $sql="update tbl_category set name='$this->name',rank='$this->rank',status='$this->status',modified_by='$this->modified_by',modified_date='$this->modified_date' where id =$this->id;";
        
        return $this->update($sql) ;
   
    

    }

    function remove(){
        $sql="Delete  from tbl_category where id ='$this->id'";
        $status= $this->delete($sql);
        if($status){
            header('location:list_category.php');
        }else{
            die('Category Delete Error for id:'.$this->id);
        }

    }

    function retrive(){
        $sql="select * from tbl_category";
        return $this->select($sql);
        

    }
    function getCategoryById(){
        $sql="select * from tbl_category where id= '$this->id'";
        return $this->select($sql);
        

    }

   function getAllActiveCategory(){
    $sql="select * from tbl_category where status= '1' order by rank,name ";
    return $this->select($sql);
   }
}

?>