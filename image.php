<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    // this will allow only jpg file and png
     // this will allow only jpg file and png
     $allow_tyes=['image/jpeg', 'image/png'];
     // this will print the array of out put
     $error=[];
     // it is image file information 
     // the actual file name
     $file_name= $_FILES['image']['name'];
     // this is the temperory file name where the file is store
     $file_tmp = $_FILES['image']['tmp_name'];
     // and this the image tye the image is what type of it
     $file_type = $_FILES['image']['type'];
     $path_upload='upload-image/';
    //  concetenation
    $final_file=$path_upload . $file_name;

    if(!in_array($file_type, $allow_tyes)){
        // this will check if the file is already exist in the folder
        $error[]="This type of file is not allowed";
    
    }
    
    $move_file=false;
    if(count($error)==0){
        $move_file=true;
    }
    if(count($error)==0){
        move_uploaded_file($file_tmp,$final_file);
        echo "file is success";
        echo '<img src="' . $final_file . '">';

    }

}
if(isset($error) && count($error)>0){
    // this will print the error message
    print $error . "<br>";
}
?>

<div >
    <form  action="" method="Post" enctype="multipart/form-data">
        <input class="border-2  border-green-300" type="file" name="image">
        <input class="border-2  border-green-300"  type="submit">
    </form>
</div>