<?php
$dir_file_mp3='data_file/mp3';
$files = glob($dir_file_mp3.'/*'); // get all file names
foreach($files as $file){ // iterate files
    if(is_file($file)){
        $file_name=basename($file);
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $query_check_info=mysqli_query($link,"SELECT data_file.name_file FROM data_file WHERE data_file.name_file =  '$file_name' LIMIT 1 ");
        $txt_class='';
        if(mysqli_num_rows($query_check_info)==0){
            $txt_class='error';
        }
        echo '<div class="item_file '.$txt_class.'"><a href="'.$url.'/file/'.$file_name.'">'.$file_name.'</a> <span class="buttonPro small" onclick="check_file(\''.$url.'/'.$file.'\')"><i class="fa fa-search" aria-hidden="true"></i></span></div>';
        if($ext!='mp3'){
            unlink($file);
        }
    }
}