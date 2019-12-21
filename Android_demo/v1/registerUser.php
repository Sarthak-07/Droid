<?php
require_once '../includes/DbOperation.php';
$response=array();
$db;
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(
        isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password']))
    {
        $db =new DbOperation();

       if($db->createUser($_POST['username'],$_POST['password'],$_POST['email']))
       {
           $response['error']=false;
           $response['message']="successful";
       }
       else{
        $response['error']=true;
        $response['message']="error";
    }
    }
    else{
        $response['error']=true;
        $response['message']="fields are missing";
    }
}
else{
    $response['error']=true;
    $response['message']='Invalid Request';
}
echo json_encode($response);