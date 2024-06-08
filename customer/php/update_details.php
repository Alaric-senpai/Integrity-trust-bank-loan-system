<?php

require '../../client.php';

require '../config/database.php';
try{
    $users->createIndex(['id_number' => 1], ['unique' => true]);
}catch(Exception $e){
    echo $e->getMessage();
}

if(isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $fname= $_POST['name'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $idnum = $_POST['id_number'];
    $phone = $_POST['phone'];

    $existingUserById = $users->findOne(['id_number' => $idnum]);
    if ($existingUserById) {
        $_SESSION['exists'] = "ID number already exists";
        header("Location:".home."profile_details.php");
        exit();
    }

    try{
        $recordUpdate = $users->updateOne(
            ['email'=>$email],
            [
                '$set'=> ['firstname'=> $fname, 'lastname'=> $sname, 'username' => $uname, 'phone_number'=> $phone, 'id_number'=>$idnum],
            ]
        );
        if($recordUpdate->getModifiedCount() == 1){
            $_SESSION['updateok'] = "Details upload was sucessfull";
            header("location:".home."profile.php");
            exit();
        }else{
            echo "record update failed";
            die();
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

}else{
    // echo "push method not supported"
    header("location:".home."profile.php");
    exit();
    
}