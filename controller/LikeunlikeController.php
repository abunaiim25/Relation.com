<?php
session_start();
include('../config/dbcon.php');
include('Function.php');


$userid = $_SESSION['auth_user']['user_id'];
$postid = $_POST['postid'];
$type = $_POST['type'];
 
$query = "SELECT COUNT(*) AS cntpost FROM like_unlike WHERE postid=".$postid." and user_id=".$userid;
 
$result = mysqli_query($conn,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];
 
if($count == 0){
    $insertquery = "INSERT INTO like_unlike(userid,postid,type) values(".$userid.",".$postid.",".$type.")";
    mysqli_query($conn,$insertquery);
}else {
    $updatequery = "UPDATE like_unlike SET type=" . $type . " where user_id=" . $userid . " and post_id=" . $postid;
    mysqli_query($conn,$updatequery);
}
 
$query = "SELECT COUNT(*) AS cntLike FROM like_unlike WHERE type=1 and post_id=".$postid;
$result = mysqli_query($conn,$query);
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];
 
$query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike WHERE type=0 and post_id=".$postid;
$result = mysqli_query($conn,$query);
$fetchunlikes = mysqli_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];
 
$return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);
 
echo json_encode($return_arr);
?>