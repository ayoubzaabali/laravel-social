<!DOCTYPE html>
<html>

<head>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<meta charset="UTF-8">
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
    <link rel="stylesheet" href="<?php echo asset('profile_prop/css/animate.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('profile_prop/css/bootstrap.min.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('profile_prop/css/jquery.range.css')  ?>">
     <link rel="stylesheet" href="<?php echo asset('profile_prop/css/line-awesome.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('profile_prop/css/line-awesome-font-awesome.min.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('profile_prop/vendor/fontawesome-free/css/all.min.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('profile_prop/css/font-awesome.min.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('profile_prop/lib/slick/slick.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('profile_prop/lib/slick/slick-theme.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('profile_prop/css/style.css')  ?>">
    <link rel="stylesheet" href="<?php echo asset('profile_prop/css/responsive.css')  ?>">
  <style>
    
/* === Wrapper Styles === */
#FileUpload {
  justify-content: center;
}
.wrapper2 {
  margin-bottom: 30px;
  padding: 0px;
  border-radius: 10px;
  background-color: white;
  width: 100%;

}

/* === Upload Box === */
.upload {
  margin: 10px;
  height: 85px;
  border: 8px dashed #e6f5e9;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 5px;
}
.upload p {
  margin-top: 12px;
  line-height: 0;
  font-size: 22px;
  color: #0c3214;
  letter-spacing: 1.5px;
}
.upload__button {
  background-color: #e6f5e9;
  border-radius: 10px;
  padding: 0px 8px 0px 10px;
}
.upload__button:hover {
  cursor: pointer;
  opacity: 0.8;
}

/* === Uploaded Files === */
.uploaded {
  width: 100%;
  background-color: #E44D3A;
  border-radius: 10px;
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  align-items: center;
   cursor: pointer;
}
.uploaded:hover {
 opacity: 0.8;
}
.file {
  display: flex;
  flex-direction: column;
}
.file__name {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: baseline;
  width: 300px;
  line-height: 0;
  font-size: 18px;
  letter-spacing: 1.5px;
  
}
.file__name p{
color: #FFFFFF;
  
}
.fa-times:hover {
  cursor: pointer;
  opacity: 0.8;
}
.fa-file-pdf , .fa-image {
  padding: 15px;
  font-size: 40px;
  color: #FFFFFF;
} 
#confirm
{
            display: none;
            background-color: #F2F2F2;
            border: 1px solid #E44D3A;
            position: fixed;
            width: 250px;
            left: 50%;
            top: 50%;
            margin-left: -100px;
            padding: 6px 8px 8px;
            box-sizing: border-box;
            text-align: center;
            z-index: 2;
    padding: 15px;
}
         #confirm button {
            background-color: coral;
            display: inline-block;
            border-radius: 5px;
            padding: 5px;
            text-align: center;
            width: 100px;
            cursor: pointer;
         }
         #confirm .message
         {
            text-align: left;
         }
      #confirm .yes{
          background-color: aquamarine;
      }
  #overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 1;
  cursor: pointer;
}

      
      
</style>
    
    
    
</head>
    
<?php /**PATH C:\xampp\htdocs\laravel\Edocs\resources\views/profile_propreties/features/header.blade.php ENDPATH**/ ?>