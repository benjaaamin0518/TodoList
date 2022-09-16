

    
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
$name=$_POST["sara"];
$how_user=$_POST["how_user"];
$password=conection($name);
if($_POST["title"]!=""){
    if($how_user==$name){
        $file_name_c=f($name);

        $file_id=@fopen("id.csv","a");

        $todo_f=todo($name);
        $write=array($file_name_c,$todo_f);
fputcsv($file_id,$write);
fclose($file_id);
//$text=str_replace(['\r\n','\r'],PHP_EOL,$_POST["about"]);
//$tayp=str_replace(',','，',$text);
$search = ["\r\n", "\r", "\n"];
$replace = [PHP_EOL, PHP_EOL, PHP_EOL];

    $text=str_replace($search, $replace,$_POST["about"] );
    $text=preg_replace('/(")/', '”', $text);

    $tayp=str_replace(',','，',$text);

$lines=explode(PHP_EOL,$tayp);
$sp=-1;
$tmp=count($lines);

foreach($lines as $line){
    $sp++;

    if(!(($tmp-1)-$sp)){
        $py[$sp]=$line;
    }
    else{
        $py[$sp]=$line."＜ｂｒ＞";
    }
   
}
$abouts=implode($py);
$file_todo=@fopen($todo_f,"a");
$write_todo=array($file_name_c,$_POST["title"],$_POST["year"],$_POST["month"],$abouts,$name);
$write_todo='"' . implode('","', $write_todo) . '"'."\n";

fwrite($file_todo,$write_todo);
fclose($file_todo);

    echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
    <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
    <center><div class="box11">
    <p>'.$file_name_c.'を作成しました。login.phpにもどって確認してみてください。<br><br>
    <button type="submit" class="btn btn-primary">はい</button>
    </p>
    
    </div></center></div></form></center>';
    }
    else{
        $file_name_c=f($name);
        before($name);
        $hoge = file("world_todo.txt");

        $file_id2=@fopen("id.csv","a");
        $write2=array($file_name_c,$hoge[0]);
fputcsv($file_id2,$write2);
fclose($file_id2);
//$text=str_replace(['\r\n','\r'],PHP_EOL,$_POST["about"]);
//$tayp=str_replace(',','，',$text);
$search = ["\r\n", "\r", "\n"];
$replace = [PHP_EOL, PHP_EOL, PHP_EOL];

$text=str_replace($search, $replace,$_POST["about"] );
$text=preg_replace('/(")/', '”', $text);

$tayp=str_replace(',','，',$text);

$lines=explode(PHP_EOL,$tayp);
$sp=-1;
$tmp=count($lines);
foreach($lines as $line){
    $sp++;

    if(!(($tmp-1)-$sp)){
        $py[$sp]=$line;
       
    }
    else if(str_replace('"','',$line)!==""){
        $py[$sp]=$line."＜ｂｒ＞";
       
    }
}
$abouts=implode($py);
$file_todo_w=@fopen("world_todo.csv","a");
$write_todo_w=array($file_name_c,$_POST["title"],$_POST["year"],$_POST["month"],$abouts,$name);
$write_todo_w='"' . implode('","', $write_todo_w) . '"'."\n";

fwrite($file_todo_w,$write_todo_w);
fclose($file_todo_w);

    echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
    <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
    <center><div class="box11">
    <p>'.$file_name_c.'を作成しました。login.phpにもどって確認してみてください。<br><br>
    <button type="submit" class="btn btn-primary">はい</button>
    </p>
    
    </div></center></div></form></center>';

    }
    
}
else{
    echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
    <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
    <center><div class="box11">
    <p>作成ができませんでした<br>お手数ですがもう一度やり直してください。<br><br>
    <button type="submit" class="btn btn-primary">はい</button>
    </p>
    
    </div></center></div></form></center>';


}
//nsamなどのid番号の選定
function f($asp){
    $i=0;

$file=@fopen("id.csv","r");
while($fix=fgetcsv($file,1000)){
    list($a[$i],$b[$i])=$fix;
    $i++;
}$i--;
$i2=1;
$d=0;
$name=$asp;
if($i>-1){
while($d==0){
$c=0;
$pa2=$i;
$file_name=$name.$i2;

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
    $file_name_c=$name."1";
}

return  $file_name_c;
}
//passwordの取得
function conection($tp){
    $file=@fopen("pass.csv","r");
    $i=0;

    while($fix=fgetcsv($file,1000)){
        list($a[$i],$b[$i],$c[$i],$d[$i],$e[$i],$f[$i])=$fix;
    if(($a[$i]==$tp)){
        break;
    }
        $i++;
    }
       $password=$b[$i];
       return $password;   
}
//todo?.csvのファイル名の取得
function todo($tp){
    $file=@fopen("pass.csv","r");
    $i=0;

    while($fix=fgetcsv($file,1000)){
        list($a[$i],$b[$i],$c[$i],$d[$i],$e[$i],$f[$i])=$fix;
    if(($a[$i]==$tp)){
        break;
    }
        $i++;
    }
       $files=$c[$i];
       return $files;   
}

function before($tpp){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $ssp=file("a_iGJ4SCedkndYLMX8xs.txt");
        $to=$ssp[0];
        $title =$tpp.'さんがリストを共有しました';
        $message = "タイトル:".$_POST["title"]."\n\n目標:".$_POST["year"]."年".$_POST["month"]."月\n\n内容:".$_POST["about"]."\n\n詳しい内容は以下のページにてご確認ください。\n\nhttp://contents181.starfree.jp/todo/push.php";
      
        mb_send_mail($to, $title, $message);
    
}

?>