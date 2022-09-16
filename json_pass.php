<?php
// Your code here!
// $_POST["csv"]
error_reporting(0);
$data="pass.csv";
$url =$data;
$sp=[];
$i=0;
$csv = file($url);
$file = $csv;
foreach ( $file as $l ) {
$l=explode(',',$l);
if($l[2]){
    $sp2=array("csv"=>"$l[2]","user"=>"$l[0]");
    $sp[$i]=$sp2;
$i++;
}

}
$sp[$i]=array("csv"=>"world_todo.csv","user"=>"共有");
header("Content-type: application/json; charset=UTF-8");
echo json_encode($sp);
exit;
?>