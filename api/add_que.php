<?php include_once "./db.php";
if(isset($_POST['subject'])){
    $que['text']=$_POST['subject'];
    $que['vote']=0;
    $que['subject_id']=0;
    $Que->save(($que));
    $subject_id=$Que->max('id'); 
}
if(isset($_POST['option'])){
    foreach($_POST['option'] as $option){
        $opt['text']=$option;
        $opt['vote']=0;
        $opt['subject_id']=$subject_id;
        $Que->save($opt);
    }
}
to("../back.php?do=que");