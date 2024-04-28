<!DOCTYPE html>
<html>

<head>
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

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
.likes_hov{
    cursor: pointer;
        
      } 
.likes_hov:hover{
    opacity:0.8;
        
      } 
      .plus-ic{
          cursor: pointer;
      }
            .plus-ic:hover{
            opacity: 0.5

      }
   




html {
  font-size: 62.5%;
  height: 100%;
  display: flex; 
}
body { width: 100%; margin: auto; }

.option-group {
  width: 100%;
  max-width: 400px;
  height: 100px;
  position: relative;
  border-radius: 0.25em;
  font-size: 4rem;
  margin: 0.2em auto;
//  will-change: transform;
  transform: translateZ(0);
}

.option-container {
  display: flex; 
  justify-content: center;
  align-items: stretch;
  width: 120%;
  height: 80%;
  margin: 0 -10%;
}

.option {
  overflow: hidden;
  flex: 1;
  display: block;
  padding: 0.5em;
  background: #FFF;
  position: relative;
  margin: 0em;
  margin-right: 0.2em;
  &:last-child { margin-right: 0; }
  
  border-radius: 0.25em;
  
  display: flex;
  justify-content: flex-end;
  align-items: flex-start;
  flex-direction: column;
  
  cursor: pointer;
  
  opacity: 0.5;
  transition-duration: 0.8s, 0.6s;
  transition-property: transform, opacity;
  transition-timing-function: cubic-bezier(.98,0,.22,.98), linear;
  will-change: transform, opacity;
}

.option__indicator {
  display: block;
  transform-origin: left bottom;
  transition: inherit;
  will-change: transform;
  position: absolute;
  top: 0.5em;
  right: 0.5em;
  left: 0.5em;
  
  &:before,
  &:after {
    content: '';
    display: block;
    border: solid 2px #64D6EE;
    border-radius: 50%;
    width: 0.25em;
    height: 0.25em;
    position: absolute;
    top: 0;
    right: 0;
  }
  
  &:after {
    background: #64D6EE;
    transform: scale(0);
    transition: inherit;
    will-change: transform;
  }
}

.option-input {
  position: absolute;
  top: 0;
  z-index: -1;
  visibility: hidden;
}

.option__label {
  display: block;
  width: 100%;
  text-transform: uppercase;
  font-size: 1.5em;
  font-weight: bold;
  
  transform-origin: left bottom;
  transform: translateX(20%) scale(0.7);
  transition: inherit;
  will-change: transform;

  sub { 
    margin-left: 0.25em;
    font-size: 0.4em;
    display: inline-block; 
    vertical-align: 0.3em;
  }
  
  &:after {
    content: '';
    display: block;
    border: solid 2px #64D6EE;
    width: 100%;
    transform-origin: 0 0;
    transform: scaleX(0.2);
    transition: inherit;
    will-change: transform;
  }
}

.option:last-child {
  .option__label { transform: translateX(0%) scale(0.7); }
  .option__indicator { transform: translateX(-20%); }
}

.option-input:checked ~ .option {
  transform: translateX(-20%) translateX(0.2em);
  .option__indicator { transform: translateX(0%); }
  .option__label { transform: translateX(40%) scale(0.7); }
}

.option-input:first-child:checked ~ .option {
  transform: translateX(20%) translateX(-0.2em);
  .option__indicator { transform: translateX(-40%); }
  .option__label { transform: translateX(0%) scale(0.7); }
}

.option-input:nth-child(1):checked ~ .option:nth-of-type(1),
.option-input:nth-child(2):checked ~ .option:nth-of-type(2) {
  opacity: 1;
  .option__indicator { transform: translateX(0); &::after { transform: scale(1); } }
  .option__label,
  .option__label::after { transform: scale(1); }
}

</style>
    
    
    
</head>
    
<?php /**PATH /homepages/7/d421602321/htdocs/ENT/DOCS20/E/resources/views/profile_propreties/features/header.blade.php ENDPATH**/ ?>