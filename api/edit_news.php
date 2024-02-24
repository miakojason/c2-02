<?php include_once "./db.php";
if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx=>$id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
        }else{
            $row=$News->find($id);
            $row['sh']=(isset($_POST['sh'] && in_array($id,$_POST['sh'])))?1:0;
        }
    }
}