<?php
error_reporting(0);
$i=0;
$key=0;
$user=$_POST["user"];
$password=$_POST["password"];

$file=@fopen("pass.csv",r);
if($user==""||$password==""){
	header( "Location:push2.php" );

}
else{
while($fix=fgetcsv($file,1000)){
    list($a[$i],$b[$i],$c[$i],$d[$i],$e[$i],$f[$i])=$fix;
if(($a[$i]==$user&&$b[$i]==$password)){
    $key++;
    break;
}
    $i++;
}
if($key==1){
    $p=0;
    $delete=0;
    $world=0;
    $world_delete=0;
    $todo_f=@fopen($c[$i],r);
    $todo_delete=@fopen($d[$i],r);
    $world_todo_f=@fopen("world_todo.csv","r");
    $world_delete_f=@fopen("world_delete.csv","r");
    $kengen_f=@fopen("kengen.csv","r");

    while($fix2=fgetcsv($todo_f,1000)){
        list($a2[$p],$b2[$p],$c2[$p],$d2[$p],$e2[$p],$f2[$p])=$fix2;
        $p++;
    }
    $p--;
    while($fix3=fgetcsv($todo_delete,1000)){
        list($a3[$delete],$b3[$delete],$c3[$delete],$d3[$delete],$e3[$delete],$f3[$delete])=$fix3;
        $delete++;
    }
    $delete--;
    while($fix4=fgetcsv($world_todo_f,1000)){
        list($a4[$world],$b4[$world],$c4[$world],$d4[$world],$e4[$world],$f4[$world])=$fix4;
        $world++;
    }
    $world--;
    while($fix5=fgetcsv($world_delete_f,1000)){
        list($a5[$world_delete],$b5[$world_delete],$c5[$world_delete],$d5[$world_delete],$e5[$world_delete],$f5[$world_delete])=$fix5;
        $world_delete++;
    }
    $world_delete--;
    $i6=0;
    while($fix6=fgetcsv($kengen_f,1000)){
      list($a6[$i6])=$fix6;
  if(($a6[$i6]==$user)){
      $kengen++;
      break;
  }
      $i6++;
  }

$delete2=$delete;
    $p2=$p;
    $world2=$world;
    $world_delete2=$world_delete;

    $backup_f=@fopen("backup.csv","r");
    $call=0;
    while($fix_K=(fgetcsv($backup_f,1000))){
     list($a_K[$call],$b_K[$call],$c_K[$call],$d_K[$call])=$fix_K;
     $call++;
    }
    $call--;
   
	echo '
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="footer.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/frappe-gantt/0.5.0/frappe-gantt.css">
<style type="text/css">
.modal-dialog-fluid {
  max-width: inherit;
  width: 98%;
  margin-left: 15px;
}
.gmap-css-responsive {
  height: 0;
  overflow: hidden;
  position: relative;
  padding-bottom: 56.25%;
}
.gmap-css-responsive iframe {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/frappe-gantt/0.5.0/frappe-gantt.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
    </script>
    <title>Document</title>
</head>
<body>

    <!-- 検索表示 -->

    <div class="modal fade bd-example-modal-xl" id="exampleModal335" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width:100%;height:100%;">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="exampleModalLabel">ガントチャート&nbsp;&nbsp;<a class="btn btn-sm btn-outline-success" target="brank" href="test.html" role="button">開く</a></h4>
    </div>
    <div class="modal-body" style="height:830px;">
    <div class="gmap-css-responsive" style="height:810px;">
	<iframe src="test.html" frameborder="0" style="border:0" allowfullscreen ></iframe>
</div>
      </div>
    </div>
    </div>  </div>
    
    <div class="modal fade" id="KengenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
    
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <form action="backup.php" method="POST">
    
          <h4 class="modal-title" id="KengenModal"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.$a[$i].'">&nbsp;&nbsp;さんによるバックアップの確認</h4>
        </div>
        <div class="modal-body">
        ';
        if($call==-1){
          echo '作成日:まだ作成されていません<br>ディレクトリ:まだ作成されていません<br><br>バックアップを作成しますか？</div>
          <div class="modal-footer">
  
          ';
        }
          else{
            echo '作成日:'.$b_K[$call].'-'.$c_K[$call].'-'.$d_K[$call].'
            <br>ディレクトリ:/backup/'. $a_K[$call].'<br><br>バックアップを作成しますか？</div>
            <div class="modal-footer">
            <button type="button" style="margin-right:10%;" class="btn btn-danger" data-toggle="modal" data-target="#KengenModal2" data-whatever="@mdo">復元</button>

            ';


          }
        echo '

          <button type="button" class="btn btn-default" data-dismiss="modal">いいえ</button>
          <button type="submit" class="btn btn-primary">はい</button>
          </form>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" id="KengenModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
    
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <form action="backup_copy.php" method="POST">
    
          <h4 class="modal-title" id="KengenModal2"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.$a[$i].'">&nbsp;&nbsp;さんによるバックアップの確認</h4>
        </div>
        <div class="modal-body">
        <label for="age">ディレクトリを選択</label>


        ';
        $cou=$call;

              echo '  <select name="how_dir" class="form-select form-select-lg mb-3"  aria-label=".form-select-lg example">';
            while($cou>-1){
              echo '<option value="'.$a_K[$cou].'">'.$a_K[$cou].'</option>';
              $cou--;
            }
            echo '</select>';


        echo '
          </div>
          <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">いいえ</button>
          <button type="submit" class="btn btn-primary">はい</button>
          </form>
        </div>
      </div>
    </div>
    </div>




<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
    
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <form action="create.php" method="POST">
    
          <h4 class="modal-title" id="exampleModalLabel2"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.$a[$i].'">さんの編集</h4>
        </div>
        <div class="modal-body">
                        <div class="form-group">
                        <select name="how_user" class="form-select form-select-lg mb-3"  aria-label=".form-select-lg example">
      <option value="'.$a[$i].'">'.$a[$i].'</option>
      <option value="共有">共有</option>
    </select>
                          <label for="nickname">タイトル</label>
                          <input type="text" name="title" class="form-control title-form" value=""placeholder="タイトル">
                        </div>
    
                        <div class="form-group">
                          <label for="age">目標</label>
                          <input type="text" name="year" style="width:40%;" value="" class="form-control" placeholder="例:2021">年
                          <input type="text" name="month" style="width:40%;" value="" class="form-control" placeholder="例:3">月
                                                </div>
                                                <div class="form-group">
                                                <label for="nickname">内容</label>
                                                <textarea   name="about" wrap="hard" value="" placeholder="例:2018-2-2 作業開始"  class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                                              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary kakunin">作成する</button>
          </form>
        </div>
      </div>
    </div>
    </div>';
      $add=$p;
  $kasan=3;
$heikin_a=0;
while($add>-1){
echo ' <div class="modal fade" id="exampleModal'.$kasan.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <form action="edit.php" method="POST">

      <h4 class="modal-title" id="exampleModalLabel'.$kasan.'"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.$a2[$add].'"><input  type="text" style="opacity:0;width:0px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="name" value="'.$a[$i].'">&nbsp;&nbsp;の編集</h4>
    </div>
    <div class="modal-body">
                    <div class="form-group">
                    <select name="how_user" class="form-select form-select-lg mb-3"  aria-label=".form-select-lg example">
  <option value="'.$a[$i].'">'.$a[$i].'</option>
  <option value="共有">共有</option>
</select>
                      <label for="nickname">タイトル</label>
                      <input type="text" name="title" class="form-control" value="'.h($b2[$add]).'"placeholder="タイトル">
                    </div>

                    <div class="form-group">
                      <label for="age">目標</label>
                      <input type="text" name="year" style="width:40%;" value="'.h($c2[$add]).'" class="form-control" placeholder="例:2021">年
                      <input type="text" name="month" style="width:40%;" value="'.h($d2[$add]).'" class="form-control" placeholder="例:3">月
                                            </div>
                                            <div class="form-group">
                                            <label for="nickname">内容</label>
                                            <textarea  name="about" value="" wrap="hard" placeholder="例:2018-2-2 作業開始"  class="form-control" id="exampleFormControlTextarea1" rows="8">'.h2($e2[$add]).'</textarea>
                                          </div>
                                          <label class="control-label">完了</label>
                                          <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="check" value="1" class="custom-control-input" id="custom-check-1">
                                            <label class="custom-control-label"  for="custom-check-1">済み</label>
                                        
                                          </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
      <button type="submit" class="btn btn-primary">検索する</button>
      </form>
    </div>
  </div>
</div>
</div>



<div class="modal fade" id="exampleModal2_'.$kasan.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <form action="delete.php" method="POST">

      <h4 class="modal-title" id="exampleModalLabel2_'.$kasan.'"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.$a[$i].'"><input  type="text" style="opacity:0;width:0px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="name" value="'.$a[$i].'">&nbsp;&nbsp;さんによる削除の確認</h4>
    </div>
    <div class="modal-body">
    <input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara2" value="'.$a2[$add].'">を削除します、よろしいですか？       
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">いいえ</button>
      <button type="submit" class="btn btn-primary">はい</button>
      </form>
    </div>
  </div>
</div>
</div>
';
$add--;
$kasan++;
$heikin_a++;
}
$heikin_b=0;
while($delete2>-1){
    echo ' <div class="modal fade" id="exampleModal'.$kasan.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
    
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <form action="edit.php" method="POST">
    
          <h4 class="modal-title" id="exampleModalLabel'.$kasan.'"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.$a3[$delete2].'"><input  type="text" style="opacity:0;width:0px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="name" value="'.$a[$i].'">&nbsp;&nbsp;の編集</h4>
        </div>
        <div class="modal-body">
                        <div class="form-group">
                        <select  name="how_user" class="form-select form-select-lg mb-3"  aria-label=".form-select-lg example">
      <option value="'.$a[$i].'">'.$a[$i].'</option>
      <option value="共有">共有</option>
    </select>
                          <label for="nickname">タイトル</label>
                          <input type="text" name="title" class="form-control" value="'.h($b3[$delete2]).'"placeholder="タイトル">
                        </div>
    
                        <div class="form-group">
                          <label for="age">目標</label>
                          <input type="text" name="year" style="width:40%;" value="'.h($c3[$delete2]).'" class="form-control" placeholder="例:2021">年
                          <input type="text" name="month" style="width:40%;" value="'.h($d3[$delete2]).'" class="form-control" placeholder="例:3">月
                                                </div>
                                                <div class="form-group">
                                                <label for="nickname">内容</label>
                                                <textarea  name="about" value="" wrap="hard" placeholder="例:2018-2-2 作業開始" class="form-control" id="exampleFormControlTextarea1" rows="8">'.h2($e3[$delete2]).'</textarea>
                                              </div>
                                              <label class="control-label">完了</label>
                                              <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  name="check" value="1" checked="checked" class="custom-control-input" id="custom-check-1">
                                                <label class="custom-control-label"  for="custom-check-1">済み</label>
                                            
                                              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-primary">検索する</button>
          </form>
        </div>
      </div>
    </div>
    </div>


    <div class="modal fade" id="exampleModal2_'.$kasan.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <form action="delete.php" method="POST">

      <h4 class="modal-title" id="exampleModalLabel2_'.$kasan.'"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.$a[$i].'"><input  type="text" style="opacity:0;width:0px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="name" value="'.$a[$i].'">&nbsp;&nbsp;さんによる削除の確認</h4>
    </div>
    <div class="modal-body">
    <input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara2" value="'.$a3[$delete2].'">を削除します、よろしいですか？       
    </div>
    <div class="modal-footer">
                  
      <button type="button" class="btn btn-default" data-dismiss="modal">いいえ</button>
      <button type="submit" class="btn btn-primary">はい</button>
      </form>
    </div>
  </div>
</div>
</div>
    ';
    $delete2--;
    $kasan++;
    $heikin_b++;
    }
 $heikin_c=0;
    while($world2>-1){
        echo ' <div class="modal fade" id="exampleModal'.$kasan.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
        
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <form action="edit.php" method="POST">
        
              <h4 class="modal-title" id="exampleModalLabel'.$kasan.'"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.$a4[$world2].'"><input  type="text" style="opacity:0;width:0px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="name" value="'.$a[$i].'">&nbsp;&nbsp;の編集</h4>
            </div>
            <div class="modal-body">
                            <div class="form-group">
                            <select name="how_user" class="form-select form-select-lg mb-3"  aria-label=".form-select-lg example">
                            <option value="共有">共有</option>
                            <option value="'.$a[$i].'">'.$a[$i].'</option>
        </select>
                              <label for="nickname">タイトル</label>
                              <input type="text" name="title" class="form-control" value="'.h($b4[$world2]).'"placeholder="タイトル">
                            </div>
        
                            <div class="form-group">
                              <label for="age">目標</label>
                              <input type="text" name="year" style="width:40%;" value="'.h($c4[$world2]).'" class="form-control" placeholder="例:2021">年
                              <input type="text" name="month" style="width:40%;" value="'.h($d4[$world2]).'" class="form-control" placeholder="例:3">月
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="nickname">内容</label>
                                                    <textarea name="about"  value="" wrap="hard" placeholder="例:2018-2-2 作業開始" class="form-control" id="exampleFormControlTextarea1" rows="8">'.h2($e4[$world2]).'</textarea>
                                                  </div>
                                                  <label class="control-label">完了</label>
                                                  <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"  name="check" value="1" class="custom-control-input" id="custom-check-1">
                                                    <label class="custom-control-label"  for="custom-check-1">済み</label>
                                                
                                                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
              <button type="submit" class="btn btn-primary">検索する</button>
              </form>
            </div>
          </div>
        </div>
        </div>
    
        <div class="modal fade" id="exampleModal2_'.$kasan.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
    
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <form action="delete.php" method="POST">
    
          <h4 class="modal-title" id="exampleModalLabel2_'.$kasan.'"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.$a[$i].'">&nbsp;&nbsp;さんによる削除の確認</h4>
        </div>
        <div class="modal-body">
        <input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly"name="sara2" value="'.$a4[$world2].'">を削除します、よろしいですか？       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">いいえ</button>
          <button type="submit" class="btn btn-primary">はい</button>
          </form>
        </div>
      </div>
    </div>
    </div>
        ';
        $world2--;
        $kasan++;
        $heikin_c++;
        }
        $heikin_d=0;
        while($world_delete2>-1){
            echo ' <div class="modal fade" id="exampleModal'.$kasan.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
            
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <form action="edit.php" method="POST">
            
                  <h4 class="modal-title" id="exampleModalLabel'.$kasan.'"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.h($a5[$world_delete2]).'"><input  type="text" style="opacity:0;width:0px;appearance:none;color:#ffffff;background:none;border:none;"readonly="readonly" name="name" value="'.$a[$i].'">&nbsp;&nbsp;の編集</h4>
                </div>
                <div class="modal-body">
                                <div class="form-group">
                                <select name="how_user" class="form-select form-select-lg mb-3"  aria-label=".form-select-lg example">
              <option value="共有">共有</option>
              <option value="'.$a[$i].'">'.$a[$i].'</option>

            </select>
                                  <label for="nickname">タイトル</label>
                                  <input type="text" name="title" class="form-control" value="'.h($b5[$world_delete2]).'"placeholder="タイトル">
                                </div>
            
                                <div class="form-group">
                                  <label for="age">目標</label>
                                  <input type="text" name="year" style="width:40%;" value="'.h($c5[$world_delete2]).'" class="form-control" placeholder="例:2021">年
                                  <input type="text" name="month" style="width:40%;" value="'.h($d5[$world_delete2]).'" class="form-control" placeholder="例:3">月
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="nickname">内容</label>
                                                        <textarea  name="about" value="" wrap="hard" placeholder="例:2018-2-2 作業開始" class="form-control" id="exampleFormControlTextarea1" rows="8">'.h2($e5[$world_delete2]).'</textarea>
                                                      </div>
                                                      <label class="control-label">完了</label>
                                                      <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" checked="checked" name="check" value="1" class="custom-control-input" id="custom-check-1">
                                                        <label class="custom-control-label"  for="custom-check-1">済み</label>
                                                    
                                                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                  <button type="submit" class="btn btn-primary">検索する</button>
                  </form>
                </div>
              </div>
            </div>
            </div>
        
            <div class="modal fade" id="exampleModal2_'.$kasan.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
        
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <form action="delete.php" method="POST">
        
              <h4 class="modal-title" id="exampleModalLabel2_'.$kasan.'"><input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara" value="'.$a[$i].'">&nbsp;&nbsp;さんによる削除の確認</h4>
            </div>
            <div class="modal-body">
            <input  type="text" style="font-size:16px;width:50px;appearance:none;background:none;border:none;"readonly="readonly" name="sara2" value="'.$a5[$world_delete2].'">を削除します、よろしいですか？       
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">いいえ</button>
              <button type="submit" class="btn btn-primary">はい</button>
              </form>
            </div>
          </div>
        </div>
        </div>
            ';
            $world_delete2--;
            $kasan++;
            $heikin_d++;
            }
    
$goukei_ab=$heikin_a+$heikin_b;
$heikin_ab=100/$goukei_ab;
$kekka=$heikin_ab*$heikin_b;
$kekka_comp=round($kekka);
echo '
        <nav  class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top " style="position:fixed;width:100%;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">'.$a[$i].'さんのTodo</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="push.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>    
        
<center>
        <table class="table" style="position:relative;top:100px;width:80%;">
        <thead>
          <tr>
            <th scope="col">個人のToDo</th>
            <td style="border-bottom:none;">';
            if($kekka_comp>0){
             echo  '<div class="progress" style="width:30%;height:16px;position:absolute;top:11px;margin-left:20px;background-color:#DDDDDD;">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"style="width: '.$kekka_comp.'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            '.$kekka_comp.'%
            </div>
            </div>';
            }
            else{
              echo  '<div class="progress" style="width:30%;height:16px;position:absolute;top:11px;margin-left:20px;background-color:#DDDDDD;">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
              0%
              </div>
              </div>';
  
            }
            echo '</td>
          </tr>
        </thead>
        <tbody>';

       $add2=$p;
       $kasan2=3;
       $year=date("Y");
       $month=date("n");
       $month_add=$month+1;
if($add2==-1){
    echo'
    <tr>
    <th scope="row" style="width:50%;">
   
データがありません。
</th>
  <td></td>
  <td></td>
  <td></td>
  <td>

  </td>
 
</tr>';


}
while($add2>-1){
    echo '   <tr>
    <th scope="row" style="width:50%;"><a data-toggle="collapse" href="#collapseExample'.$kasan2.'" aria-expanded="false" aria-controls="collapseExample">'.h($b2[$add2]).'</a>      
    <div class="collapse" id="collapseExample'.$kasan2.'">
    <div class="border p-3" >
    <p class="autolink">'.nl2brr(h($e2[$add2])).'</p>
                </div>
    </div>
    
    </th>';
    if($year==$c2[$add2]){
        if($month==$d2[$add2]){
            echo '<td style="width:10%;"><font color="blue">今月中</font></td>';
    
        }
        else if($month_add==$d2[$add2]){
            echo '<td style="width:10%;"><font color="#191970">来月中</font></td>';
    
        }
        else if($month<$d2[$add2]){
          echo '<td style="width:10%;"><font color="#2e8b57">余裕</font></td>';

         }
        else{
            echo '<td style="width:10%;"><font color="red">超過</font></td>';

        }
    }
    else if($year>$c2[$add2]&&($c2[$add2]!=""||$c2[$add2]!=0)){
        echo '<td style="width:10%;"><font color="red">超過</font></td>';
     
    }
    else if($year<$c2[$add2]){
        echo '<td style="width:10%;"><font color="#2e8b57">余裕</font></td>';
      
    }
    else{
        echo '<td style="width:10%;">-</td>';
      
    }
    
    echo '<td style="width:13%;">'.h($c2[$add2]).'-'.h($d2[$add2]).'</td>
    <td style="width:10%;">'.h($f2[$add2]).'</td>
    <td style="width:10%;">
    <button type="button"  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal'.$kasan2.'" data-whatever="@mdo">編集</button>
    <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal2_'.$kasan2.'" data-whatever="@mdo">削除</button>

    </td>
    
    </tr>';
    $add2--;
    $kasan2++;
    
           }
    
       echo '</tbody>
      </table>
      <table class="table" style="position:relative;top:100px;width:80%;">
      <thead>
        <tr>
          <th scope="col" style="width:50%;">個人(終了済み)</th>
        </tr>
      </thead>
      <tbody>';
      $delete3=$delete;

      if($delete3==-1){
        echo'
        <tr>
        <th scope="row">
       
    データがありません。
    </th>
      <td></td>
      <td></td>
      <td></td>
      <td>
    
      </td>
     
    </tr>';
    
    
    }
    while($delete3>-1){
        echo '   <tr>
        <th scope="row" style="width:50%;"><a data-toggle="collapse" href="#collapseExample'.$kasan2.'" aria-expanded="false" aria-controls="collapseExample">'.h($b3[$delete3]).'</a>      
        <div class="collapse" id="collapseExample'.$kasan2.'">
        <div class="border p-3" >
        <p class="autolink">'.nl2brr(h($e3[$delete3])).'</p>
                    </div>
        </div>
        
        </th>';
  
          
      
        echo '<td style="width:10%;">完了</td><td style="width:13%;">'.h($c3[$delete3]).'-'.h($d3[$delete3]).'</td>
        <td style="width:10%;">'.h($f3[$delete3]).'</td>
        <td style="width:10%;">
        <button type="button"  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal'.$kasan2.'" data-whatever="@mdo">編集</button>
        <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal2_'.$kasan2.'" data-whatever="@mdo">削除</button>

        </td>
        
        </tr>';
        $delete3--;
        $kasan2++;
        
               }
               $goukei_cd=$heikin_d+$heikin_c;
               $heikin_cd=100/$goukei_cd;
               $kekka2=$heikin_cd*$heikin_d;
               $kekka_comp2=round($kekka2);
               
               echo '</tbody></table><table class="table" style="position:relative;top:100px;width:80%;">
               <thead>
                 <tr>
                   <th scope="col">共有のToDo</th>
                   <td style="border-bottom:none;">';
                   if($kekka_comp2>0){
                    echo  '<div class="progress" style="width:30%;height:16px;position:absolute;top:11px;margin-left:20px;background-color:#DDDDDD;">
                   <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"style="width: '.$kekka_comp2.'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                   '.$kekka_comp2.'%
                   </div>
                   </div>';
                   }
                   else{
                     echo  '<div class="progress" style="width:30%;height:16px;position:absolute;top:11px;margin-left:20px;background-color:#DDDDDD;">
                     <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                     0%
                     </div>
                     </div>';
         
                   }
                  echo '</td>
                 </tr>
               </thead>
               <tbody>';
       
              $world3=$world;
              $year=date("Y");
              $month=date("n");
              $month_add=$month+1;
       if($world3==-1){
           echo'
           <tr>
           <th scope="row" style="width:50%;">
          
       データがありません。
       </th>
         <td></td>
         <td></td>
         <td></td>
         <td>
       
         </td>
        
       </tr>';
       
       
       }
       while($world3>-1){
           echo '   <tr>
           <th scope="row" style="width:50%;"><a data-toggle="collapse" href="#collapseExample'.$kasan2.'" aria-expanded="false" aria-controls="collapseExample">'.h($b4[$world3]).'</a>      
           <div class="collapse" id="collapseExample'.$kasan2.'">
           <div class="border p-3" >
           <p class="autolink">'.nl2brr(h($e4[$world3])).'</p>
                       </div>
           </div>
           
           </th>';
           if($year==$c4[$world3]){
               if($month==$d4[$world3]){
                   echo '<td style="width:10%;"><font color="blue">今月中</font></td>';
           
               }
               else if($month_add==$d4[$world3]){
                   echo '<td style="width:10%;"><font color="#191970">来月中</font></td>';
           
               }
               else if($month<$d4[$world3]){
                echo '<td style="width:10%;"><font color="#2e8b57">余裕</font></td>';

               }
               else{
                   echo '<td style="width:10%;"><font color="red">超過</font></td>';
       
               }
           }
           else if($year>$c4[$world3]&&($c4[$world3]!=""||$c4[$world3]!=0)){
               echo '<td style="width:10%;"><font color="red">超過</font></td>';
            
           }
           else if($year<$c4[$world3]){
               echo '<td style="width:10%;"><font color="#2e8b57">余裕</font></td>';
             
           }
           else{
               echo '<td style="width:10%;">-</td>';
             
           }
           
           echo '<td style="width:13%;">'.h($c4[$world3]).'-'.h($d4[$world3]).'</td>
           <td style="width:10%;">'.h($f4[$world3]).'</td>
           <td style="width:10%;">
           <button type="button"  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal'.$kasan2.'" data-whatever="@mdo">編集</button>';
          if($a[$i]==$f4[$world3]){
           echo '&nbsp;<button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal2_'.$kasan2.'" data-whatever="@mdo">削除</button>';
          }
          echo ' </td>
           
           </tr>';
           $world3--;
           $kasan2++;
           
                  }
           
              echo '</tbody>
             </table>
             <table class="table" style="position:relative;top:100px;width:80%;">
             <thead>
               <tr>
                 <th scope="col">共有(終了済み)</th>
               </tr>
             </thead>
             <tbody>';
             $world_delete3=$world_delete;
       
             if($world_delete3==-1){
               echo'<tr>
               <th scope="row" style="width:50%;">
              
           データがありません。
           </th>
             <td></td>
             <td></td>
             <td></td>
             <td>
           
             </td>
            
           </tr>';
           
           
           }
           while($world_delete3>-1){
               echo '   <tr>
               <th scope="row" style="width:50%;"><a data-toggle="collapse" href="#collapseExample'.$kasan2.'" aria-expanded="false" aria-controls="collapseExample">'.h($b5[$world_delete3]).'</a>      
               <div class="collapse" id="collapseExample'.$kasan2.'">
               <div class="border p-3" >
               <p class="autolink">'.nl2brr(h($e5[$world_delete3])).'</p>
                           </div>
               </div>
               
               </th>';
         
                 
             
               echo '<td style="width:10%;">完了</td><td style="width:13%;">'.h($c5[$world_delete3]).'-'.h($d5[$world_delete3]).'</td>
               <td style="width:10%;">'.h($f5[$world_delete3]).'</td>
               <td style="width:10%;">
               <button type="button"  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal'.$kasan2.'" data-whatever="@mdo">編集</button>';
               if($a[$i]==$f5[$world_delete3]){
                echo '&nbsp;<button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal2_'.$kasan2.'" data-whatever="@mdo">削除</button>';
            }
     
       
              echo ' </td>
               
               </tr>';
               $world_delete3--;
               $kasan2++;
               
                      }
           
       
       



echo'</tbody>
    </table>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
<br><br>
<br><br>


</center>

        <footer class="footer" style="position:fixed;">
          <div class="container">
          <div class="search">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                <!-- 検索ボタン -->
                <center>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal335"  >ガントチャート</button>
                <button type="button" style="width:23%;" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">新規作成</button>
               
                ';
                if($kengen==1){
                  echo '<button type="button" style="margin-right:10%;width:28%;" class="btn btn-success" data-toggle="modal" data-target="#KengenModal" data-whatever="@mdo">バックアップ</button>
                  ';
                }

                echo ' </center>
                </div>
            </div>
          </div>
        </div>

          </div>
        </footer>
        <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
                  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                  <script type="text/javascript" src="code.js" ></script>
                  </body>
</html>
                 
          
          '
      

     ;
    
    
    
    
    
    }
else{
	header( "Location:push2.php" );
}
    }
    function h($s) {
      $s=preg_replace('/(")/', "", $s);
              return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
              }
          function h2($s) {
              $res=str_replace("＜ｂｒ＞","\n", $s);
            return preg_replace('/(")/', "", $res);
            
      
            }
            function nl2brr($text)
            {
                      $res2=str_replace("＜ｂｒ＞", "<br>", $text);
              return preg_replace('/(")/', "", $res2);
            }
            function nl2brr2($text)
            {
      $text=str_replace("＜ｂｒ＞", "\r\n", $text);
              return preg_replace('/(")/', "", $text);
            }
              ?>
      