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
$id=$_POST["sara2"];
$id_file=tovo($id);
$file_s=@fopen($id_file,"r");
$i=0;
while($fix=fgetcsv($file_s,1000)){
    list($a[$i],$b[$i],$c[$i],$d[$i],$e[$i],$f[$i])=$fix;
if($a[$i]==$id){

$i++;
}
else{
    $wp[]="$a[$i],$b[$i],$c[$i],$d[$i],$e[$i],$f[$i]\n";
$i++;
}
}
$file_s2=@fopen($id_file,"w");

foreach($wp as $value){
    fwrite($file_s2,$value);
}
fclose($file_s2);
$file_w=@fopen("id.csv","r");
$i5=0;
while($fix2=fgetcsv($file_w,1000)){
    list($a2[$i5],$b2[$i5])=$fix2;
if($a2[$i5]==$_POST["sara2"]){
    $i5++;

}

else{
    $wp2[]="$a2[$i5],$b2[$i5]\n";
    $i5++;

}
}
$file_w2=@fopen("id.csv","w");

foreach($wp2 as $value2){
    fwrite($file_w2,$value2);
}
fclose($file_w2);
echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
<p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$_POST["sara"].'">さんによる削除が完了しました</p>
<center><div class="box11">
<p>'.$id.'を削除しました。login.phpにもどって確認してみてください。<br><br>
<button type="submit" class="btn btn-primary">はい</button>
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
//id.csv内のidと紐づくtodo?.csvのファイル名の取得
function tovo($tp){
    $file34=@fopen("id.csv","r");
    $i2=0;
    $tp2=$tp;
    while($fix4=fgetcsv($file34,1000)){
        list($a[$i2],$b[$i2])=$fix4;
    if(($a[$i2]==$tp2)){
        break;
    }
        $i2++;
    }
       $files=$b[$i2];
       fclose($file34);

       return $files;   
}

?>