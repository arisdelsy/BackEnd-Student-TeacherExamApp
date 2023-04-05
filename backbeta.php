<?php
//-----------------MIDDLE ====> BACK---------------------
$data = $_POST;
$username = $data['ucid'];
$password = $data['password'];
//------------------CONNECTING TO DB---------------------
$con = mysqli_connect("sql2.njit.edu", "ab2473", "AE(r!}Z4X4", "ab2473");
$sql = "SELECT * FROM `Credentials` WHERE Uname='$username' AND Pass='$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
mysqli_close($con);
if($row['Pass']!=NULL)
    $hash_pass = password_hash($row['Pass'],1);
$result_arr = array('username' => $row['Uname'], 'password' => $hash_pass, 'role' => $row['Role']);
//-----------------BACK ====> MIDDLE---------------------
echo (json_encode($result_arr));
?> 

