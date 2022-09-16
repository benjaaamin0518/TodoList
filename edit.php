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

//取得したid
$id=$_POST["sara"];
//取得したuser_id
$name=$_POST["name"];
//共有かユーザー名か
$how_user=$_POST["how_user"];
//idのファイル元
$file_name=f($id);
//パスワード
$password=conection($name);
if($_POST["title"]!=""){
    //共有と入力
    if($how_user=="共有"){
        //完了済みに入っているとき
        if($_POST["check"]==1){
            //world_deleteを更新
        if($file_name=="world_delete.csv"){
        //同じファイルなのでidリストは変えずファイルの中だけ変更する
        before($name,$_POST["check"]);
        $fff="world_delete.csv";
        f_check($fff,$id,$file_name);
        echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
        <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
        <center><div class="box11">
        <p>'.$id.'を変更しました。login.phpにもどって確認してみてください。<br><br>
        <button type="submit" class="btn btn-primary">はい</button>
        </p>
        
        </div></center></div></form></center>';
    

        }
        //共有してチェックを入れる
        else{
            //同じファイルではないのでidリストは変えファイルの中も変更する
            $fff="world_delete.csv";
            before($name,$_POST["check"]);

            f_check($fff,$id,$file_name);
            echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
            <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
            <center><div class="box11">
            <p>'.$id.'を変更しました。login.phpにもどって確認してみてください。<br><br>
            <button type="submit" class="btn btn-primary">はい</button>
            </p>
            
            </div></center></div></form></center>';
        }
    }
    else if($_POST["check"]==""){
        if($file_name=="world_todo.csv"){
            //同じファイルなのでidリストは変えずファイルの中だけ変更する
            after($name,$_POST["check"]);
            $fff="world_todo.csv";

            f_check($fff,$id,$file_name);
        echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
            <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
            <center><div class="box11">
            <p>'.$id.'を変更しました。login.phpにもどって確認してみてください。<br><br>
            <button type="submit" class="btn btn-primary">はい</button>
            </p>
            
            </div></center></div></form></center>';
        
    
            }
            //共有してチェックを入れる
            else if($file_name!="world_todo.csv"){
                //同じファイルではないのでidリストは変えファイルの中も変更する
                after($name,$_POST["check"]);
                $fff="world_todo.csv";

                f_check($fff,$id,$file_name);
                echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
                <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
                <center><div class="box11">
                <p>'.$id.'変更しました。login.phpにもどって確認してみてください。<br><br>
                <button type="submit" class="btn btn-primary">はい</button>
                </p>
                
                </div></center></div></form></center>';
            }
    }

    }
    else{
        //完了済みに入っているとき
        if($_POST["check"]==1){
            //world_deleteを更新
            $dele=file_conect($name);
        if($file_name==$dele){
        //同じファイルなのでidリストは変えずファイルの中だけ変更する
        $fff=$dele;
        f_check($fff,$id,$file_name);
    echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
        <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
        <center><div class="box11">
        <p>'.$id.'を変更しました。login.phpにもどって確認してみてください。<br><br>
        <button type="submit" class="btn btn-primary">はい</button>
        </p>
        
        </div></center></div></form></center>';
    

        }
        //共有してチェックを入れる
        else{
            //同じファイルではないのでidリストは変えファイルの中も変更する
            $fff=$dele;
            f_check($fff,$id,$file_name);
            echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
            <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
            <center><div class="box11">
            <p>'.$id.'を変更しました。login.phpにもどって確認してみてください。<br><br>
            <button type="submit" class="btn btn-primary">はい</button>
            </p>
            
            </div></center></div></form></center>';
        }
    }
    
        else if($_POST["check"]!=1){
        $dele2=file_conect2($name);

        if($file_name==$dele2){
            //同じファイルなのでidリストは変えずファイルの中だけ変更する
            $fff=$dele2;
            f_check($fff,$id,$file_name);
        echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
            <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
            <center><div class="box11">
            <p>'.$id.'を変更た。login.phpにもどって確認してみてください。<br><br>
            <button type="submit" class="btn btn-primary">はい</button>
            </p>
            
            </div></center></div></form></center>';
        
    
            }
            //共有してチェックを入れる
            else{
                //同じファイルではないのでidリストは変えファイルの中も変更する
                $fff=$dele2;
                f_check($fff,$id,$file_name);
                echo '<center><form action="login.php" method="POST"><input  type="text" style="opacity:0;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="password" value="'.$password.'"><div class="box21">
                <p><input  type="text" style="font-size:18px;width:50px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="user" value="'.$name.'">さんによる新規作成</p>
                <center><div class="box11">
                <p>'.$id.'を変更しました。login.phpにもどって確認してみてください。<br><br>
                <button type="submit" class="btn btn-primary">はい</button>
                </p>
                
                </div></center></div></form></center>';
            }
    }
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

$file1=@fopen("id.csv","r");
while($fix1=fgetcsv($file1,1000)){
    list($a1[$i],$b1[$i])=$fix1;
if($a1[$i]==$asp){
    $cp=$b1[$i];
break;
}
    $i++;
}
$i--;
return  $cp;
fclose($file1);

}
function file_conect($tp){
    $file2=@fopen("pass.csv","r");
    $i=0;

    while($fix2=fgetcsv($file2,1000)){
        list($a2[$i],$b2[$i],$c2[$i],$d2[$i],$e2[$i],$f2[$i])=$fix2;
    if(($a2[$i]==$tp)){
        break;
    }
        $i++;
    }
       $password=$d2[$i];
       fclose($file2);

       return $password;   
}
function file_conect2($tp){
    $file3=@fopen("pass.csv","r");
    $i=0;

    while($fix3=fgetcsv($file3,1000)){
        list($a3[$i],$b3[$i],$c3[$i],$d3[$i],$e3[$i],$f3[$i])=$fix3;
    if(($a3[$i]==$tp)){
        break;
    }
        $i++;
    }
       $password=$c3[$i];
       fclose($file3);

       return $password;   
}

function file_conect3(){
    $file1230=@fopen("pass.csv","r");
    $i=0;

    while($fix1230=fgetcsv($file1230,1000)){
        list($a1230[$i],$b1230[$i],$c1230[$i],$d1230[$i],$e1230[$i],$f1230[$i])=$fix1230;
        $responce[$i]=$f1230[$i];
        $i++;
    }

       fclose($file1230);

       return $responce;   
}



//passwordの取得
function conection($tp){
    $file4=@fopen("pass.csv","r");
    $i=0;

    while($fix4=fgetcsv($file4,1000)){
        list($a4[$i],$b4[$i],$c4[$i],$d4[$i],$e4[$i],$f4[$i])=$fix4;
    if(($a4[$i]==$tp)){
        break;
    }
        $i++;
    }
       $password=$b4[$i];
       fclose($file4);

       return $password;   
}

function f_check($tpt,$tm,$file_name){
    $id=$tm;


    //todo1.csvからidが重なる部分を削除する。
    $file_s1=@fopen($file_name,"r");
    $i=0;
    while($fix1=fgetcsv($file_s1,1000)){
        list($a1[$i],$b1[$i],$c1[$i],$d1[$i],$e1[$i],$f1[$i])=$fix1;
    if($a1[$i]==$id){
        $abc=$f1[$i];
        $task=$e1[$i];
    $i++;
    }
    else{
        

        $search = ["\r\n", "\r", "\n"];
        $replace = [PHP_EOL, PHP_EOL, PHP_EOL];
        
        $db=preg_replace('/(")/', '”', $e1[$i]);
        //echo $e1[$i];
        $text2=str_replace($search, '',$db );

        $lines=explode(PHP_EOL,$text2);
        $sp=-1;
    $tmp=count($lines);
    foreach($lines as $line){
        $sp++;

        if(!(($tmp-1)-$sp)){
            $py[$sp]=str_replace('"','',$line);

        }
        else{
            $py[$sp]=str_replace('"','',$line)."＜ｂｒ＞";
 
        }
        
    }
       
    $abouts2=implode(str_replace(PHP_EOL,'',$py));
    $abouts2=str_replace(PHP_EOL,'',$abouts2);
        //echo $abouts2;
        $wp[]="$a1[$i],$b1[$i],$c1[$i],$d1[$i],".'"'.$abouts2.'"'.",$f1[$i]\n";
    $i++;
    }
    }
    $file_s2=@fopen($file_name,"w");

    foreach($wp as $value){
        fwrite($file_s2,$value);
    }
    fclose($file_s2);

    //id.csvに新たなファイル場所を明記させる
    $file_s_id2=@fopen("id.csv","r");
    $i2=0;
    while($fix2=fgetcsv($file_s_id2,1000)){
        list($a2[$i2],$b2[$i2])=$fix2;
    if($a2[$i2]==$id){
    $i2++;
    }
    else{
        $wp2[]="$a2[$i2],$b2[$i2]\n";
    $i2++;
    }
    
    }

    fclose($file_s_id2);

    $file_s2_2=@fopen("id.csv","w");

    foreach($wp2 as $value2){
        fwrite($file_s2_2,$value2);
    }

    fclose($file_s2_2);

    $file_s2_3=@fopen("id.csv","a");
    $ppp="$id,$tpt\n";
    fwrite($file_s2_3,$ppp);

    fclose($file_s2_3);
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
        
            $py[$sp]=str_replace('"','',$line);

        }
        else {
            $py[$sp]=str_replace('"','',$line)."＜ｂｒ＞";
 
        }
       
        
    }
       
        
        $abouts=implode(str_replace(PHP_EOL,'',$py));
        $abouts=str_replace(PHP_EOL,'',$abouts);
    //world_delete.csvに記述
    if($task!=$abouts){
        // ヘッダー送信
        $file_todo=@fopen($tpt,"a");
        // エスケープされたものを変換

// UTF-8 を Shift_JIS に変換
        $title=$_POST["title"]; $year=$_POST["year"]; $month=$_POST["month"];
           $write_todo=array($id,$title,$year,$month,$abouts,$abc);
        $write_todo='"' . implode('","', $write_todo) . '"'."\n";
        echo $write_todo;
        fwrite($file_todo,$write_todo);
        fclose($file_todo);


    }
    else{
        $file_todo2=@fopen($tpt,"a");
        $title2=$_POST["title"]; $year2=$_POST["year"]; $month2=$_POST["month"];
      $write_todo2=array($id,$title2,$year2,$month2,$task,$abc);
      $write_todo2='"' . implode('","', $write_todo2) . '"'."\n";
      echo "a::$write_todo2";


        fwrite($file_todo2,$write_todo2);
        fclose($file_todo2);

    
    }
}
// //world_delete.csv上書き
// function rewd($wc,$tp){
//     $file_s6=@fopen($wc,"r");
//     $i=0;
//     $id=$tp;
//     while($fix6=fgetcsv($file_s6,1000)){
//         list($a6[$i],$b6[$i],$c6[$i],$d6[$i],$e6[$i],$f6[$i])=$fix6;
//     if($a6[$i]==$id){
//     $abc=$f6[$i];
//     $i++;
//     }
//     else{
//         $wp[]="$a6[$i],$b6[$i],$c6[$i],$d6[$i],".'"'.$e6[$i].'"'.",$f6[$i]\n";
//     $i++;
//     }
//     }
//     $file_s7=@fopen($wc,"w");
    
//     foreach($wp as $value){
//         fwrite($file_s7,$value);
//     }

//     fclose($file_s7);
//     $file_s8=@fopen($wc,"a");
//     $db=preg_replace('/(")/', '”', $_POST["about"]);
//     $tect=str_replace(['<br>','＜ｂｒ＞'], '',$db );
//     $search = ["\r\n", "\r", "\n"];
//     $replace = [PHP_EOL, PHP_EOL, PHP_EOL];
    
//     $text=str_replace($search, $replace,$tect);

//     $lines=explode(PHP_EOL,$text);
//     $sp=-1;
//     foreach($lines as $line){
// $sp++;
//         $py[$sp]=str_replace('"','',$line)."＜ｂｒ＞";
        
//     }

//     $abouts=implode($py);
//     $abouts='"'.str_replace('"','',$abouts).'"';
    
//     $title=$_POST["title"]; $year=$_POST["year"]; $month=$_POST["month"];
//    $abouts=str_replace(PHP_EOL,'',$abouts);  $wp2="$id,$title,$year,$month,".'"'.$abouts.'"'.",$abc\n";
//     fwrite($file_s8,$wp2);
//     fclose($file_s8);

// }
function before($tpp,$ps){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $ssp=file_conect3();
    $ssp=implode(',',$ssp);
        $to=$ssp;
       // echo $to;
        $url=file("url.txt");
        $url=$url[0];
        $title =$tpp.'さんが共有リストを変更しました';
        $message = "タイトル:".$_POST["title"]."\n\n目標:".$_POST["year"]."年".$_POST["month"]."月\n\n内容:".$_POST["about"]."\n\n完成済み\n\n詳しい内容は以下のページにてご確認ください。\n\n".$url;
        mb_send_mail($to, $title, $message);

        }
    
function after($tpp,$ps){
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $ssp=file_conect3();
    $ssp=implode(',',$ssp);
            $to=$ssp;
            //echo $to;
        $url=file("url.txt");
        $url=$url[0];
        $title =$tpp.'さんが共有リストを変更しました';
        $message = "タイトル:".$_POST["title"]."\n\n目標:".$_POST["year"]."年".$_POST["month"]."月\n\n内容:".$_POST["about"]."\n\n未実施\n\n詳しい内容は以下のページにてご確認ください。\n\n".$url;

        mb_send_mail($to, $title, $message);
    
}

?>
