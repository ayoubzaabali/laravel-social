
<?php $__env->startSection('content'); ?>

		<section class="companies-info">
			<div class="container">
							<div class="company-title" style="padding:0">
					<h3>All Notifications</h3>
				</div><!--company-title end-->
                
                
                <div class="notification-box noti" id="notification" style="display:block;width:100%;float:left;position:static">
									<div class="nt-title">
										<h4><?php echo e(count($notifs), false); ?></h4>
									</div>
									<div class="nott-list" >
                                                                 
                                         <?php $__currentLoopData = $notifs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php   $usr_id = Crypt::encryptString("$notif->user_id") ;
                                               $ev_id = Crypt::encryptString("$notif->event_id") ;
                                                $dc_id = Crypt::encryptString("$notif->document_id") ;
                                        ?>

										<div style="cursor:pointer;  " class="notfication-details" >
							  				<div class="noty-user-img"> 
                                                <?php if(is_null($notif->usphoto)): ?>
  							  					<img src="<?php echo asset('profile_prop/images/default.jpg')  ?>" alt="">
                                              
                                                <?php else: ?>
							  					<img  src="<?php echo e(url('/').'/storage/app/'.$notif->usphoto, false); ?>" alt="">
                                                <?php endif; ?>
							  				</div>
							  				<div  class="notification-info">

							  					<h3><a href="<?php echo e(url('/').'/profile/'.$usr_id, false); ?>" title=""><?php echo e($notif->usname, false); ?></a> Uploaded a <a href="<?php echo e(url('/').'/Doc/'.$dc_id, false); ?>">document</a> on <a href="<?php echo e(url('/').'/Event/'.$ev_id, false); ?>" title=""><?php echo e($notif->titre, false); ?></a> on <a ><?php echo e($notif->date_creation, false); ?></a>
                                                     <?php if($notif->new==0): ?>
                                                    <img style="width:30px;height:30px;float:right" src="<?php echo asset('profile_prop/images/new.gif')  ?>" alt="">                                      <?php endif; ?>                                               
                                                
                                                </h3>
							  				</div><!--notification-info -->
						  				</div>
						  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  				
						  
						  				
									</div><!--nott-list end-->
								</div><!--notification-box end-->
                
				<div class="companies-list">
					<div class="row">
                        
                    	
					</div>
				</div><!--companies-list end-->
				
			</div>
		</section><!--companies-info end-->
   
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('profile_propreties.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\social\resources\views/profile_propreties/notifications.blade.php ENDPATH**/ ?>