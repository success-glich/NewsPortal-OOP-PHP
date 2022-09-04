<?php
require_once('../newsportal/admin/class/common.class.php');
class News extends Common{
    public $id,$category_id,$title,$short_description,$description,$feature_key,$breaking_key,$feature_image,$created_date,$modified_date,$created_by,$modified_by;


     function save(){
         $sql="insert into tbl_news (category_id,title,short_description,description,breaking_Key,feature_image,create_date,created_by) 
          values ('$this->category_id','$this->title','$this->short_description','$this->description','$this->breaking_key','$this->feature_image','$this->created_date','$this->created_by');";
        //   echo $sql;
        return $this->insert($sql) ;
     }
     function edit(){
        // print_r($this);
        if(isset($this->feature_image)){
            $sql="update tbl_news set title='$this->title',category_id='$this->category_id',short_description='$this->short_description',modified_by='$this->modified_by',feature_image='$this->feature_image',modified_date='$this->modified_date' where id =$this->id;";
            echo $sql;
        
        }else{
            $sql="update tbl_news set title='$this->title',category_id='$this->category_id',short_description='$this->short_description',modified_by='$this->modified_by',modified_date='$this->modified_date' where id =$this->id;";
        }
        // $sql="update tbl_category set name='$this->name',rank='$this->rank',status='$this->status',modified_by='$this->modified_by',modified_date='$this->modified_date' where id =$this->id;";
        
        return $this->update($sql) ;
   

    }
     function remove(){
        $sql="delete from tbl_news where id =$this->id";
        $status= $this->delete($sql);
        if($status){
            header('location:list_news.php');
        }else{
            die('News Delete Error for id:'.$this->id);
        }
    }


    
     function retrive(){
        $sql="select * from tbl_news";
        // echo $sql;
        return $this->select($sql);
    }
    function getNewsByID(){
        $sql="select * from tbl_news where id= '$this->id'";
        return $this->select($sql);
        

    }
    function getLatestNews(){
        $sql="select * from tbl_news order by create_date desc limit 4";
        // echo $sql;
        return $this->select($sql);
    }
    function getSliderNews(){
        $sql="SELECT * FROM `tbl_news` WHERE  breaking_Key =1 limit 5;";
        // echo $sql;
        return $this->select($sql);
    }
    function getFeatureNewsByCategory(){
        // echo $catid;
        $sql="SELECT * from tbl_news where category_id=$this->category_id
                 and feature_key=1 
                     limit 1 ";
                      
                    //   echo $sql;
                    // echo $sql;
                    // die;
        return $this->select($sql);
       }

}





    ?>