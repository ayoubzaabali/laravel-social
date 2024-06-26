
<?php $__env->startSection('content'); ?>


<!--COVER SECTION ENDS -->

		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="main-left-sidebar">
                                   
                                    
                                    <!--User srats-->
                                    <div class="user-data full-width">
										<div class="user-profile">
											<div class="username-dt">
												<div class="usr-pic">
								<?php if(is_null($data['user_info'][0]->photo)): ?>
			                         <img   src="<?php echo asset('profile_prop/images/default.jpg')  ?>"   alt="">
                                <?php else: ?>
 			                         <img  src="<?php echo e(url('/').'/storage/app/'.$data['user_info'][0]->photo, false); ?>"   alt="">
                                <?php endif; ?>
												</div>
											</div><!--username-dt end-->
											<div class="user-specs">
												<h3><?php echo e($data['user_info'][0]->name, false); ?></h3>
												<span>E Socials</span>
											</div>
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<li>
												<h4>Following</h4>
												<span><?php echo e($data['user_info']['following'], false); ?></span>
											</li>
											<li>
												<h4>Followers</h4>
												<span><?php echo e($data['user_info']['followers'], false); ?></span>
											</li>
											<li>
												<a href="<?php echo e(url('/').'/profile', false); ?>" title="">View Profile</a>
											</li>
										</ul>
									</div>
                                    <!--User end-->
                                    

                                    <!--suggestions start-->
									<div class="suggestions full-width">
										<div class="sd-title">
											<h3>My Events</h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">
                                            
                                        <?php $__currentLoopData = $data['events']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php    $encrypted_event = Crypt::encryptString("$event->id") ;?>

											<div class="suggestion-usd">
												<img src="images/resources/s1.png" alt="">
												<div class="sgt-text">
													<h4><?php echo e($event->titre, false); ?></h4>
													<span><b>Followers :</b> <?php echo e($event->count, false); ?></span>
												</div>
												<span>
												<a href="<?php echo e(url('/'), false); ?>/Event/<?php echo e($encrypted_event, false); ?>">
													<i class="fas fa-arrow-alt-circle-right"></i>
</a>
												</span>
											</div>
                                            
								        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                                    <?php if(count($data['events'])==0): ?>
										<div class="view-more">
												<a href="#" title="">you have no events yet</a>
											</div>
										<?php endif; ?>
										
										
										
											
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
                                    
                                    
								</div><!--main-left-sidebar end-->
							</div>
							<div class="col-lg-6">
								<div class="main-ws-sec">
								

                                    
                                    <!--product-feed-tab start IMPORTANT-->
									<div class="product-feed-tab current" id="feed-dd">
                                        							<div class="post-topbar" >
																	<div class="user-picy">
                    <?php if(is_null($data['user_info'][0]->photo)): ?>
                    <img  src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                    <?php else: ?>
                   <img  src="<?php echo e(url('/').'/storage/app/'.$data['user_info'][0]->photo, false); ?>" alt="">
                    <?php endif; ?>

										</div>
										<div class="post-st" >
											<ul>
                                                <?php if(count($data['events'])==0): ?>
												<li hidden ><a class="post_project active" href="#" title="">Post a Document</a></li>
                                                <?php else: ?>
                                                <li ><a class="post_project active" href="#" title="">Post a Document</a></li>
                                                 <?php endif; ?>
												<li><a class="post-jb active" href="#" title="">Create an Event</a></li>
											</ul>
										</div><!--post-st end-->
				              </div>
                                        
                                        
                                        
										<div class="posts-section">
                                            
                                           <div class="top-profiles">
											<div class="pf-hd">
												<h3>Top Profiles</h3>
												<i class="la la-ellipsis-v"></i>
											</div>
											<div class="profiles-slider">
                                                
                                           
											
												
												
												                          
                       <?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php    $encrypted_user = Crypt::encryptString("$user->id") ;?>
                                                
												<div class="user-profy">
                                           <?php if(is_null($user->photo)): ?>
                                           <img id="myphoto" style="width:50px;height:50px"  src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            <?php else: ?>
                                            <img id="myphoto" style="width:50px;height:50px"  src="<?php echo e(url('/').'/storage/app/'.$user->photo, false); ?>"alt="">
                                             <?php endif; ?>									
                                                    <h3><?php echo e($user->name, false); ?></h3>													
                                                    
													<span>E Socials</span>
													<ul>
                                  <?php if(App\lib\Users::FollowExist(Auth::id(),$user->id)==1){?>
										<li onclick="paysar(this)" data="<?php echo e($encrypted_user, false); ?>"><a id="ff" href="#" title="" class="followw">Unfollow</a></li>
                                         <?php }else{ ?>
                                         <li onclick="paysar(this)" data="<?php echo e($encrypted_user, false); ?>"><a id="ff" href="#" title="" class="followw">Follow</a></li>

                                       <?php }  ?>                                                        
                                                        
                                                        
														<li><a href="<?php echo e(url('/soon'), false); ?>" title="" class="envlp"><i class="fa fa-envelope"></i></a></li>
													</ul>
													<a href="<?php echo e(url('/'), false); ?>/profile/<?php echo e($encrypted_user, false); ?>" title="">View Profile</a>
												</div><!--user-profy end-->
											
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                                                
												
											</div><!--profiles-slider end-->
										</div><!--top-profiles end-->

                                            
                                            
                                            

                                         <?php if( count($data['pub'])==0): ?>
		                                   <h2 style="font-size:1.5em"><b style="font-weight:bolder">No News for you for now.</b></h2>
                                         <?php endif; ?>
                                            
                                            
                                        <?php $__currentLoopData = $data['pub']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $dc_id = Crypt::encryptString("$pub->id") ;?>
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
                                            <?php if(is_null($pub->usphoto)): ?>
                                           <img style="max-height:40px;" src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            <?php else: ?>
                                            <img style="max-height:40px;"src="<?php echo e(url('/').'/storage/app/'.$pub->usphoto, false); ?>"alt="">
                                             <?php endif; ?>
														<div class="usy-name">
															<h3><?php echo e($pub->usname, false); ?></h3>
															<span><img src="<?php echo asset('profile_prop/images/clock.png')  ?>"  alt=""><a style="color:#B2C2DD" href="<?php echo e(url('/').'/Doc/'.$dc_id, false); ?>"><?php echo e($pub->date_creation, false); ?></a> </span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Delete</a></li>
															
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="<?php echo asset('profile_prop/images/icon8.png')  ?>"  alt=""><span>E</span></li>
														<li><img src="<?php echo asset('profile_prop/images/icon9.png')  ?>"  alt=""><span>Socials</span></li>
													</ul>
													
												</div>
												<div class="job_descp">
													<h3><?php echo e($pub->titre, false); ?></h3>
													<ul class="job-dt">
								        <li><a href="#" title=""><?php echo e($pub->evtitre, false); ?></a></li>
				
													</ul>
                                                    
                                                       
         
													<p><?php echo e($pub->descr, false); ?></p>
                                               <?php
    $encrypted = Crypt::encryptString("$pub->id") ;
                                                    ?>  
                                                           <div id="FileUpload" data="<?php echo e($encrypted, false); ?>" onclick="parser(this)" >
                                                             <div class="wrapper2">
                                                               <div class="uploaded uploaded--three">
                                                                 <i class="fa fa-file fa-file-pdf" aria-hidden="true"></i>
                                                                 <div class="file">
                                                                   <div class="file__name">
                                                                     <p><?php echo e($pub->original_name, false); ?></p>
                                                                   </div>
                                                                             <div class="progress">
          <div class="progress-bar bg-success  progress-bar-animated" style="width:100%;opacity:0.3"></div>
        </div>
                                                                 </div>
                                                               </div>
                                                             </div>
                                                           </div>  
                                           
                                                    
													
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li >
															<?php if(App\lib\Docs::liked($pub->id,Auth::id())): ?>
															<a href="#me" data="<?php echo e($pub->id, false); ?>"   onclick="like(this)" class='active'><i class="fas fa-heart"></i> Like</a>
                                                            <?php else: ?>
                                                            <a href="#me" data="<?php echo e($pub->id, false); ?>"   onclick="like(this)" ><i class="fas fa-heart"></i> Like</a>
                                                            <?php endif; ?>
															<img src="<?php echo asset('profile_prop/images/liked-img.png')  ?>" alt="">
															
														</li> 
                                                        <li data="<?php echo e($pub->likes, false); ?>" class='likes_hov' onclick="people_liked_it(this)">
                                                         <span id="pubLikes"><?php echo e(count($pub->likes), false); ?></span>
                                                        </li>
														<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment <?php echo e(count($pub->coms), false); ?></a></li>
													</ul>
													<a  onclick='people(this)' data='<?php echo e($pub->downloads, false); ?>'><i class="fas fa-download"></i>  Downloads <?php echo e(count($pub->downloads), false); ?></a>
                                				   
													<a  onclick='view(this)' data='<?php echo e($pub->viewers, false); ?>'><i class="fas fa-eye"></i>
                                                    Views <?php echo e(count($pub->viewers), false); ?></a>
												</div>
                                                
								    <div class="comment-section">
												<a style="display:none" id="uih" data="<?php echo e($pub->coms, false); ?>" onclick='viewAll(this)' class="plus-ic">
													<i class="la la-plus"></i>
                                                    
												</a>
												<div class="comment-sec">
													
															
															<ul id="coms">
                                                                <?php if(count($pub->coms)>0): ?>
																<?php $__currentLoopData = $pub->coms->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
																<li style="background-color:#F1F1F1;border:1px;padding:10px;margin-buttom:20px">
																	<div class="comment-list">
																		<div class="bg-img">
																			<img src="<?php echo asset('profile_prop/images/clock.png')  ?>" alt="">
																		</div>
																		<div class="comment">
                                                                            <span>                    
                                                                              
                                                                            

                                                                                <?php if(is_null($com->cphoto)): ?>
                                                                                <img style="width:30px" src="<?php echo asset('profile_prop/images/default.jpg')  ?>" alt="">
                                                                                <?php else: ?>
                                                                                <img style="width:30px;height:35px" src="<?php echo e(url('/').'/storage/app/'.$com->cphoto, false); ?>" alt="">
                                                                                <?php endif; ?>


                                                                                <h3><?php echo e($com->cname, false); ?></h3> <?php echo e($com->cdate, false); ?></span>
																			
                                                                            <p><?php echo e($com->content, false); ?> </p>
																			
																			
																		</div>
																	</div><!--comment-list end-->
																</li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                               
															</ul>
														
												</div><!--comment-sec end-->
												<div style="margin-top:10px"class="post-comment">
													<div class="cm_img">
														<img src="images/resources/bg-img4.png" alt="">
													</div>
													<div class="comment_box">
															<input type="text" placeholder="Post a comment">
															<button data="<?php echo e($pub->id, false); ?> " onclick="comment(this)" >Send</button>
													</div>
												</div><!--post-comment end-->
											</div><!--comment-section end-->
											</div><!--post-bar end-->
									       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											<!-- <div class="process-comm">
												<div class="spinner">
													<div class="bounce1"></div>
													<div class="bounce2"></div>
													<div class="bounce3"></div>
												</div>
											</div>process-comm end -->
										</div><!--posts-section end-->
									</div><!--product-feed-tab end-->



								
                                    

                                    
                                    
                                   

								</div><!--main-ws-sec end-->
							</div>
							<div class="col-lg-3">
								<div class="right-sidebar">
								
                                    <div class="widget widget-jobs">
										<div class="sd-title">
											<h3>Top Events</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
                                        
										<div class="jobs-list">
                                            <?php $a=1 ?>
                                        <?php $__currentLoopData = $data['trends']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
											<div class="job-info">
												<div class="job-details">
													<h3><?php echo e($trend->titre, false); ?></h3>
													<p><?php echo e($trend->date_creation, false); ?></p>
												</div>
												<div class="hr-rate">
													<span><?php echo e($a, false); ?></span>
                                                    
												</div>
											</div><!--job-info end-->
                                          <?php $a=$a+1 ?>

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div><!--jobs-list end-->
									</div>
                                    
                                    
                                    
								</div><!--right-sidebar end-->
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>


	<div class="post-popup pst-pj">
			<div class="post-project">
				<h3>Post a Document</h3>
				<div class="post-project-fields">
					<form method="POST" action="<?php echo e(route('addDoc'), false); ?>"  enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>
						<div class="row">
							<div class="col-lg-12">
								<input required type="text" name="title" placeholder="Title">
							</div>
							<div class="col-lg-12">
								<div class="inp-field">
									<select required name="event">
                                       <option selected disabled>List of Events Available For you</option>

                                        <?php $__currentLoopData = $data['events']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($events->id, false); ?>" ><?php echo e($events->titre, false); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>

							<div class="col-lg-12">
				             <div class="inp-field">
                                      <input required name="doc" type="file" style="  border: 2px dotted #E44D3A;  white-space: nowrap;" />
								</div>

							</div>
							<div class="col-lg-12">
								<textarea required name="description" placeholder="Description"></textarea>
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" value="post">Post</button></li>
									<li><a href="#" onclick="document.querySelector('#Cdocs').click()" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" id="Cdocs" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
	<div class="post-popup views">
			<div class="post-project">
				<h3>Document Views</h3>
                
            	<div class="post-project-fields">
				         <div class="col-lg-12" id='messi'>
				      
                           
                             
                             

							</div>
                    
				</div><!--post-project-fields end-->
                
				<a  title="" style="color:#ffffff"><i class="la la-times-circle-o"></i></a>
				
		</div><!--post-project-popup end-->
		</div><!--post-project-popup end-->

<!-- start event post -->

<div class="post-popup job_post">
  <div class="post-project">
    <h3>Post an Event</h3>
    <div class="post-project-fields">
      <form method="POST" action="<?php echo e(route('addEvent'), false); ?>" enctype="multipart/form-data"> <?php echo csrf_field(); ?> <input required id="fileElem" type="file" onchange="handler(this)" style="display:none" name="EventPhoto" />
        <div class="row">
          <div class="col-lg-12">
            <input required type="text" name="title" placeholder="Title">
          </div>
          <div class="col-lg-12">
            <div class="option-group">
              <div class="option-container">
                <input value="1" class="option-input" checked id="option-1" type="radio" name="options" />
                <input value="0" class="option-input" id="option-2" type="radio" name="options" />
                <label class="option" for="option-1">
                  <span class="option__indicator"></span>
                  <span class="option__label"> Public </span>
                </label>
                <label class="option" for="option-2">
                  <span class="option__indicator"></span>
                  <span class="option__label"> Private </span>
                </label>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="price-br">
              <!-- === File Upload ===
Design a file upload element. Is it the loading screen and icon? A progress element? Are folders being uploaded by flying across the screen like Ghostbusters? ;)  
-->
              <div id="FileUpload">
                <div class="wrapper2">
                  <div id="fileSelect" class="upload">
                    <p>
                      <span class="upload__button">Event Cover</span>
                    </p>
                  </div>
                  <div class="uploaded uploaded--one" style="display:none">
                    <i class="far fa-image"></i>
                    <div class="file">
                      <div class="file__name">
                        <p id="fileName">DZADZADZ.pdf</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <ul>
              <li>
                <button class="active" type="submit" value="post">Post</button>
              </li>
              <li>
                <a href="#" onclick="document.querySelector('#Cdocs').click()" title="">Cancel</a>
              </li>
            </ul>
          </div>
        </div>
      </form>
    </div>
    <a href="#" title="">
      <i class="la la-times-circle-o"></i>
    </a>
  </div>
</div>
<!--post-event end-->


				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
                 <script type="text/javascript">
                'use strict'
                    var fileElem = document.getElementById("fileElem");

                     document.getElementById('fileSelect').onclick=function(){
                           if (fileElem) {
                           fileElem.click();
                         
                           
                           }}
                     function extract(fullPath){
                                     if (fullPath) {
                                         var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                                         var filename = fullPath.substring(startIndex);
                                         if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                                             filename = filename.substring(1);
                                                                              }
                                                                      return(filename);
                                     }
                     }
                   function handler(fileg){
                               document.getElementById("fileName").innerText= extract(fileg.value);
                               document.getElementsByClassName("uploaded--one")[0].style.display='';

                           }
                     
                     var link= document.getElementById('FileUpload');
                      function parser(dat){
                     var data=dat.getAttribute('data');
                    window.open("<?php echo e(url('/'), false); ?>"+"/download/"+data);
                     }
                     
                     
                      
             
                     
                    
                
             
                
                </script>
                
                
                        <script type="application/javascript">
           
            function paysar(dat){
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
  

			</div><!--post-project end-->
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile_propreties.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\social\resources\views/profile_propreties/home.blade.php ENDPATH**/ ?>