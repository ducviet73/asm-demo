<?php
function check_user($user,$pass){
    $sql="SELECT * FROM user WHERE user='".$user."' AND pass='".$pass."'";
    return get_one($sql);
 }
?>

