<?php
// Your code here!
error_reporting(0);
date_default_timezone_set('Asia/Tokyo');
$data=$_POST["csv"];
$user=$_POST["user"];

$url ="$data";
$sp=[];
$i=0;
$csv = file($url);


$file = $csv;
foreach ( $file as $l ) {
$l=explode(',',$l);
$flag="";
$i2=$i+1;
$l[2]=preg_replace('/(")/','',$l[2]);
$l[3]=preg_replace('/(")/','',$l[3]);
if($l[2]<0||preg_replace('/(")/','',$l[2])==""){
    $l[2]=date("Y");
if($l[3]<0||preg_replace('/(")/','',$l[3])==""){
    $l[3]=date("m");
    $flag=date("d");
}
}
if($flag){
    $sp2=array("start"=>"$l[2]-$l[3]-$flag","end"=>"$l[2]-$l[3]-$flag","name"=>"$user-$l[1]","id"=>"Task$i2","progress"=>0,"description"=>"$l[4]");

}

else if($l[2]==date("Y")&&($l[3]==date("m")||$l[3]>date("m"))){
    $m=date("m");
    $y=date("Y");
    $d=date("d");
    $sp2=array("start"=>"$y-$m-$d","end"=>"$l[2]-$l[3]-31","name"=>"$user-$l[1]","id"=>"Task$i2","progress"=>0,"description"=>"$l[4]");

}
else if($l[2]>date("Y")){
    $m=date("m");
    $y=date("Y");
    $d=date("d");
    $sp2=array("start"=>"$y-$m-$d","end"=>"$l[2]-$l[3]-31","name"=>"$user-$l[1]","id"=>"Task$i2","progress"=>0,"description"=>"$l[4]");
 
}
else{
    $sp2=array("start"=>"$l[2]-$l[3]-1","end"=>"$l[2]-$l[3]-31","name"=>"$user-$l[1]","id"=>"Task$i2","progress"=>0,"description"=>"$l[4]");

}   
$sp[$i]=$sp2;
$i++;
}
header("Content-type: application/json; charset=UTF-8");
echo json_encode($sp);
exit;
?>