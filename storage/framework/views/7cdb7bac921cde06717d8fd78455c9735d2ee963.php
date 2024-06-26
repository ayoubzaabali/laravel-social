
<?php $__env->startSection('content'); ?>

		<section class="companies-info">
			<div class="container">
				<div class="company-title">
					<h3>Latest Events</h3>
				</div><!--company-title end-->
        <?php if( count($data['events'])==0): ?>
            <div style="margin-left:20px" class="col-lg-3 col-md-4 col-sm-6 col-12">
            <b style="font-weight:bolder !important;">no events to show</b>
            </div>
            <?php endif; ?>
				<div class="companies-list">
					<div class="row">
           
                        <?php $__currentLoopData = $data['events']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <?php   
                    
                    $encrypted = Crypt::encryptString("$event->id") ; 
                    $event_info=App\lib\Event::Event_info($event->id,Auth::id());
                    $data['event_info']=$event_info;

                    if(is_null($data['event_info']['active'])){
                    $intval=0 ;
                    }else{
                     $intval= (int)$data['event_info']['active']->active;
                    }
                    
                    ?>
                        
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
                                       <?php if(is_null($event->photo)): ?>
                                           <img id="myphoto" src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            <?php else: ?>
                                            <img style="width:100px;height:100px" id="myphoto"src="<?php echo e(url('/').'/storage/app/'.$event->photo, false); ?>"alt="">
                                             <?php endif; ?>									<h3><?php echo e($event->titre, false); ?></h3>
									<h4>E Socials</h4>
									<ul>
                                        <?php
                          if(App\lib\Event::FollowExist(Auth::id(),$event->id)==1){
                                        ?>
                    
                    <?php if($intval==1): ?>
										<li  style="color:#fff;cursor:pointer" onclick="parser(this)" data="<?php echo e($encrypted, false); ?>"><a id="ff" title="" class="follow">Unfollow</a></li>
                    <?php else: ?>
										<li style="color:#fff;cursor:pointer" data="<?php echo e($encrypted, false); ?>"><a id="ff"  title="" class="follow">Pending..</a></li>
                    <?php endif; ?>

                                         <?php }else{ ?>
                                         <li style="color:#fff;cursor:pointer" onclick="parser(this)" data="<?php echo e($encrypted, false); ?>"><a id="ff"  title="" class="follow">Follow</a></li>

                                       <?php }  ?>

										<li><a href="<?php echo e(url('/soon'), false); ?>" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="<?php echo e(url('/'), false); ?>/Event/<?php echo e($encrypted, false); ?>." title="" class="view-more-pro">View Event</a>
							</div><!--company_profile_info end-->
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div><!--companies-list end-->
				<!-- <div class="process-comm">
					<div class="spinner">
						<div class="bounce1"></div>
						<div class="bounce2"></div>
						<div class="bounce3"></div>
					</div>
				</div>process-comm end -->
			</div>
		</section><!--companies-info end-->
        <script type="application/javascript">
           
            function parser(dat){
                     var fan=dat.firstChild.innerText;
                    
                    // window.open("<?php echo e(url('/'), false); ?>"+"/unfollow/"+data+"/1");
                     if(fan=="Follow"){
                      dat.firstChild.innerText='Wait..';
                       loadDoc(dat);  
                     }else if(fan=="Unfollow"){
                      dat.firstChild.innerText='Wait..';
                      loadDoc2(dat);  
                      }
                     
                     }
            
            function loadDoc(dat) {
                    var data=dat.getAttribute('data');
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      if(this.responseText==1){
                         dat.firstChild.innerText='Unfollow';
                        
                        }else if(this.responseText==0) {
                           dat.firstChild.innerText='Pending..';
                          //  dat.onclick=(){

                          //  }
                         }
                     
                    }
                      };
                    xhttp.open("GET", "<?php echo e(url('/'), false); ?>"+"/followev/"+data, true);
                    xhttp.send();
                    }
            
            function loadDoc2(dat) {
                    var data=dat.getAttribute('data');
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if(this.responseText=="OK"){
                         dat.firstChild.innerText='Follow';
                       }
                     
                    }
                      };
                    xhttp.open("GET", "<?php echo e(url('/'), false); ?>"+"/unfollowev/"+data, true);
                    xhttp.send();
                    }
            
      

        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('profile_propreties.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\social\resources\views/profile_propreties/events.blade.php ENDPATH**/ ?>