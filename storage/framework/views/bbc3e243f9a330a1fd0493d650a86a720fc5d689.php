
<?php $__env->startSection('content'); ?>

		<section class="companies-info">
			<div class="container">
				<div class="company-title">
					<h3>Users Suggestions</h3>
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
                        
                        <?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php    $encrypted = Crypt::encryptString("$user->id") ;?>
                        
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
                                       <?php if(is_null($user->photo)): ?>
                                           <img id="myphoto" src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            <?php else: ?>
                                            <img id="myphoto"src="<?php echo e(url('/').'/storage/app/'.$user->photo, false); ?>"alt="">
                                             <?php endif; ?>									<h3><?php echo e($user->name, false); ?></h3>
									<h4>Ensa Tnager</h4>
									<ul>
                                        <?php if(App\lib\Users::FollowExist(Auth::id(),$user->id)==1){?>
										<li onclick="parser(this)" data="<?php echo e($encrypted, false); ?>"><a id="ff" href="#" title="" class="follow">Unfollow</a></li>
                                         <?php }else{ ?>
                                         <li onclick="parser(this)" data="<?php echo e($encrypted, false); ?>"><a id="ff" href="#" title="" class="follow">Follow</a></li>

                                       <?php }  ?>

										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="<?php echo e(url('/'), false); ?>/profile/<?php echo e($encrypted, false); ?>." title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div><!--companies-list end-->
				<div class="process-comm">
					<div class="spinner">
						<div class="bounce1"></div>
						<div class="bounce2"></div>
						<div class="bounce3"></div>
					</div>
				</div><!--process-comm end-->
			</div>
		</section><!--companies-info end-->
        <script type="application/javascript">
           
            function parser(dat){
                     var data=dat.getAttribute('datas');
                     var fan=dat.firstChild.innerText;
                     dat.firstChild.innerText='Wait..';
                    // window.open("<?php echo e(url('/'), false); ?>"+"/unfollow/"+data+"/1");
                     if(fan=="Follow"){
                       loadDoc(dat);  
                     }else{
                      functionConfirm("Unfollow this user's all events ? ", function yes(){loadDoc2(dat,1)}, function no(){loadDoc2(dat,0)})
                      }
                     
                     }
            
            function loadDoc(dat) {
                    var data=dat.getAttribute('data');
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if(this.responseText=="OK"){
                         dat.firstChild.innerText='Unfollow';
                       }
                     
                    }
                      };
                    xhttp.open("GET", "<?php echo e(url('/'), false); ?>"+"/follow/"+data, true);
                    xhttp.send();
                    }
            
            function loadDoc2(dat,test) {
                    var data=dat.getAttribute('data');
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                                                console.log(this.responseText);

                        if(this.responseText=="OK"){
                         dat.firstChild.innerText='Follow';
                       }
                     
                    }
                      };
                    xhttp.open("GET", "<?php echo e(url('/'), false); ?>"+"/unfollow/"+data+"/"+test, true);
                    xhttp.send();
                    }
            
        function functionConfirm(msg, myYes, myNo)
         {
            var confirmBox = $("#confirm");
            confirmBox.find(".message").text(msg);
            confirmBox.find(".yes,.no").unbind().click(function()
            {
              off();
            });
            confirmBox.find(".yes").click(myYes);
            confirmBox.find(".no").click(myNo);
            confirmBox.show();
            on();

         }
 function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
 var confirmBox = $("#confirm");
 document.getElementById("overlay").style.display = "none";
 confirmBox.hide();

}

function offf() {
 var confirmBox = $("#confirm");
 document.getElementById("overlay").style.display = "none";
 confirmBox.hide();
document.getElementById("ff").innerText='Unfollow';
  
}

        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('profile_propreties.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/7/d421602321/htdocs/ENT/DOCS20/resources/views/profile_propreties/profiles.blade.php ENDPATH**/ ?>