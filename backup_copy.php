<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript">  


$(function() {
 
  // 一旦hide()で隠してフェードインさせる
  $('.box21').hide().fadeIn(1300);
  $('.box11').hide().fadeIn(700);

});    </script>
<style type="text/css">
.box21{
    width:50%;
    position:relative;
    top:150px;
    font-siZe:18px;
    left:0;
    padding: 0.5em 1em;
    background: -moz-linear-gradient(#ffb03c, #ff708d);
    background: -webkit-linear-gradient(#ffb03c, #ff708d);
    background: linear-gradient(to right, #ffb03c, #ff708d);
    box-shadow: 5px 10px 20px rgba(0, 0, 0, 0.22);
    border-radius:15px;

    color: #FFF;
}
.box21 p {
    margin: 0; 
    padding: 0;
}
.box11{
    width:90%;
    font-siZe:18px;

    padding: 50px;
    margin: 2em 0;
    color: #5d627b;
    background: white;
    border-top: solid 3px #5d627b;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.22);
}
.box11 p {
    margin: 0; 
    padding: 0;
}

</style>
</head>
<?php
error_reporting(0);
$password=conection($_POST["sara"]);
$how_dir=$_POST["how_dir"];
$file_f="backup/$how_dir";
$file_pass="backup/$how_dir/pass.csv";

$file=@fopen($file_pass,"r");
while($fix=fgetcsv($file,1000)){
    list($a[$i],$b[$i],$c[$i],$d[$i],$e[$i],$f[$i])=$fix;
    $enter=$file_f.'/'.$c[$i];
    $enter2=$file_f.'/'.$d[$i];

    copy($enter,$c[$i]);
    copy($enter2,$d[$i]);

    $i++;
}
$enter3=$file_f.'/'."world_todo.csv";
$enter4=$file_f.'/'."world_delete.csv";
$enter5=$file_f.'/'."id.csv";
$enter6=$file_f.'/'."pass.csv";

copy($enter3,"world_todo.csv");
copy($enter4,"world_delete.csv");
copy($enter5,"id.csv");
copy($enter6,"pass.csv");


echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
<p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$_POST["sara"].'">さんによる復元が完了しました</p>
<center><div class="box11">
<p>バックアップを復元しました。<br><br>
<button type="submit" class="btn btn-primary">戻る</button>
</p>

</div></center></div></form></center>';



    //passwordの取得
function conection($tp){
    $file=@fopen("pass.csv","r");
    $i=0;
    while($fix3=fgetcsv($file,1000)){
        list($a[$i],$b[$i],$c[$i],$d[$i],$e[$i],$f[$i])=$fix3;
    if(($a[$i]==$tp)){
        break;
    }
        $i++;
    }
       $password=$b[$i];
       fclose($file);
       return $password;   
}
function f($asp){
    $i=0;

$file=@fopen("backup.csv","r");
while($fix=fgetcsv($file,1000)){
    list($a[$i],$b[$i],$c[$i],$d[$i])=$fix;
    $i++;
}$i--;
$i2=1;
$d=0;
$name=$asp;
if($i>-1){
while($d==0){
$c=0;
$pa2=$i;
$file_name=$name.'('.$i2.')';

while($pa2>-1){
    if($file_name==$a[$pa2]){
        $c=1;

    }
    $pa2--;
}
if($c==0){
    $d=1;
    $file_name_c=$file_name;
}
$i2++;

}
}
else{
    $file_name_c=$name.'('.$i2.')';
}

return  $file_name_c;
}

?>