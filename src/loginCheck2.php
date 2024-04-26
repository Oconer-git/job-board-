<?php
    include 'config.php';
    session_start();

    if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `business_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $name['name'] = $row['firstName'];
        $_SESSION['emp_id'] = $row['id'];
        $_SESSION['pass']= $row['password'];
        $id = $name['name'];
        header('location:profileEmp.php?id='.$id.'');
    }else{
        $message[] = 'incorrect email or password!';
    }
}
?>