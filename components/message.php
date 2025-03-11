<?php
if(isset($success_msg)){
   foreach($success_msg as $message){
      echo '<script>swal("'.$message.'", "" ,"success");</script>';
   }
}

if(isset($warning_msg)){
   foreach($warning_msg as $message){
      echo '<script>swal("'.$message.'", "" ,"warning");</script>';
   }
}

if(isset($info_msg)){
   foreach($info_msg as $message){
      echo '<script>swal("'.$message.'", "" ,"info");</script>';
   }
}

if(isset($error_msg)){
   foreach($error_msg as $message){
      echo '<script>swal("'.$message.'", "" ,"error");</script>';
   }
}
?>
