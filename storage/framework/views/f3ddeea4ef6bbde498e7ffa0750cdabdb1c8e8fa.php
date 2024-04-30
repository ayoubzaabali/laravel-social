
<?php $__env->startSection('content'); ?>
<form method="POST" id="CoverForm"  enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>

<!--COVER SECTION START -->
		<section class="cover-sec" style="height: 100%;background-attachment:fixed" >
            <?php if(is_null($data['user_info'][0]->cover)): ?>
			<img id="cov-img" style="height:350px;"  src="<?php echo asset('profile_prop/images/resources/cover.jpg')  ?>"   alt="">
            <?php else: ?>
 			<img id="cov-img" style="height:400px;background-size:cover"  src="<?php echo e(url('/').'/storage/app/'.$data['user_info'][0]->cover, false); ?>"   alt="">
            <?php endif; ?>
			<div class="add-pic-box">
				<div class="container">
					<div class="row no-gutters">
						<div class="col-lg-12 col-sm-12" <?php echo e($data['hide'], false); ?>>					
                          <input type="file" id="files" name="cover">
                             <label for="files">Change Image</label>
						</div>
					</div>
				</div>
			</div>
		</section>
   
    </form>

<!--COVER SECTION ENDS -->

		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="main-left-sidebar">
									<div class="user_profile">
                                        <form method="POST" id="ProfileForm"   enctype="multipart/form-data" >
                                         <?php echo csrf_field(); ?>

										<div class="user-pro-img">
                                            <?php if(is_null($data['user_info'][0]->photo)): ?>
                                           <img id="myphoto" src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            <?php else: ?>
                                            <img id="myphoto"src="<?php echo e(url('/').'/storage/app/'.$data['user_info'][0]->photo, false); ?>"alt="">
                                             <?php endif; ?>
                                        
											<div class="add-dp" id="OpenImgUpload" <?php echo e($data['hide'], false); ?> >
												<input type="file" id="ProfilePhoto" name="ProfilePhoto">
												<label for="ProfilePhoto"><i class="fas fa-camera"></i></label>												
											</div>
										</div><!--user-pro-img end-->
										<div class="user_pro_status">
											<ul class="flw-status">
												<li>
													<span>Following</span>
													<b><?php echo e($data['user_info']['following'], false); ?></b>
												</li>
												<li>
													<span>Followers</span>
													<b><?php echo e($data['user_info']['followers'], false); ?></b>
												</li>
											</ul>
										</div><!--user_pro_status end-->
									    </form>

									</div><!--user_profile end-->
									<div class="suggestions full-width">
										<div class="sd-title">
											<h3>Events</h3>
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
                                                    <i class="fas fa-arrow-alt-circle-right"></i></a></span>
											</div>
                                            
								        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
										
										
										
											
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
								</div><!--main-left-sidebar end-->
							</div>
							<div class="col-lg-6">
								<div class="main-ws-sec">
									<div class="user-tab-sec rewivew">
										<h3><?php echo e($data['user_info'][0]->name, false); ?></h3>
										<div class="star-descp">
											<span>E Socials</span>
											<ul>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
											</ul>
											
										</div><!--star-descp end-->
                                            <div class="tab-feed st2 settingjb">
											<ul>
												<li data-tab="feed-dd" class="active">
													<a href="#" title="">
														<img src="images/ic1.png" alt="">
														<span>Posts</span>
													</a>
												</li>
											
												
											
												
												
											</ul>
										</div><!-- tab-feed end-->
									</div><!--user-tab-sec end-->
                                    

                                    
                                    <!--product-feed-tab start IMPORTANT-->
									<div class="product-feed-tab current" id="feed-dd">
                                        							<div class="post-topbar" <?php echo e($data['hide'], false); ?>>
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
                                                 <?php endif; ?>												<li><a class="post-jb active" href="#" title="">Create an Event</a></li>
											</ul>
										</div><!--post-st end-->
				              </div>
										<div class="posts-section">
                    <hr style="height:0.5px;border-width:0;color:gray;background-color:gray">

                      <?php if( count($data['pub'])==0): ?>
                      <h2 style="font-size:1.5em"><b style="font-weight:bolder">No Posts on any Events yet</b></h2>
                      
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
														<li><img src="<?php echo asset('profile_prop/images/icon8.png')  ?>"  alt=""><span>Ensa</span></li>
														<li><img src="<?php echo asset('profile_prop/images/icon9.png')  ?>"  alt=""><span>Tnager</span></li>
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
														<li>
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
									<div class="message-btn">
                                      <?php $enc= Crypt::encryptString($data['user_info'][0]->id) ; ?>
                                                                                                        
                                         <?php if($data['hide']=="hidden"): ?>
                                        <ul style="list-style:none;color:#ffffff;cursor:pointer">
                                         <?php else: ?>
                                        <ul hidden style="list-style:none;color:#ffffff;cursor:pointer">
 
                                        
                                        <?php endif; ?>
                                        <?php if(App\lib\Users::FollowExist(Auth::id(),$data['user_info'][0]->id)==1): ?>
										<li onclick="parsar(this)" data="<?php echo e($enc, false); ?>" ><a  title=""><i class="fas fa-user-plus"></i>Unfollow</a>
                                         <?php else: ?>
                                        <li  onclick="parsar(this)" data="<?php echo e($enc, false); ?>" ><a  title=""><i class="fas fa-user-plus"></i>Follow</a>
                                        <?php endif; ?>
                                        </li>
                                        </ul>
                                            
                                    </div>
                                    
								
								</div><!--right-sidebar end-->
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>


		<div class="overview-box" id="overview-box">
			<div class="overview-edit">
				<h3>Overview</h3>
				<span>5000 character left</span>
				<form>
					<textarea></textarea>
					<button type="submit" class="save">Save</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->



		<div class="overview-box" id="experience-box">
			<div class="overview-edit">
				<h3>Experience</h3>
				<form>
					<input type="text" name="subject" placeholder="Subject">
					<textarea></textarea>
					<button type="submit" class="save">Save</button>
					<button type="submit" class="save-add">Save & Add More</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

		<div class="overview-box" id="education-box">
			<div class="overview-edit">
				<h3>Education</h3>
				<form>
					<input type="text" name="school" placeholder="School / University">
					<div class="datepicky">
						<div class="row">
							<div class="col-lg-6 no-left-pd">
								<div class="datefm">
									<input type="text" name="from" placeholder="From" class="datepicker">	
									<i class="fa fa-calendar"></i>
								</div>
							</div>
							<div class="col-lg-6 no-righ-pd">
								<div class="datefm">
									<input type="text" name="to" placeholder="To" class="datepicker">
									<i class="fa fa-calendar"></i>
								</div>
							</div>
						</div>
					</div>
					<input type="text" name="degree" placeholder="Degree">
					<textarea placeholder="Description"></textarea>
					<button type="submit" class="save">Save</button>
					<button type="submit" class="save-add">Save & Add More</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

		<div class="overview-box" id="location-box">
			<div class="overview-edit">
				<h3>Location</h3>
				<form>
					<div class="datefm">
						<select>
							<option>Country</option>
							<option value="pakistan">Pakistan</option>
							<option value="england">England</option>
							<option value="india">India</option>
							<option value="usa">United Sates</option>
						</select>
						<i class="fa fa-globe"></i>
					</div>
					<div class="datefm">
						<select>
							<option>City</option>
							<option value="london">London</option>
							<option value="new-york">New York</option>
							<option value="sydney">Sydney</option>
							<option value="chicago">Chicago</option>
						</select>
						<i class="fa fa-map-marker"></i>
					</div>
					<button type="submit" class="save">Save</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

		<div class="overview-box" id="skills-box">
			<div class="overview-edit">
				<h3>Skills</h3>
				<ul>
					<li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
					<li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
					<li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
				</ul>
				<form>
					<input type="text" name="skills" placeholder="Skills">
					<button type="submit" class="save">Save</button>
					<button type="submit" class="save-add">Save & Add More</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

		<div class="overview-box" id="create-portfolio">
			<div class="overview-edit">
				<h3>Create Portfolio</h3>
				<form>
					<input type="text" name="pf-name" placeholder="Portfolio Name">
					<div class="file-submit">
						<input type="file" id="file">
						<label for="file">Choose File</label>	
					</div>
					<div class="pf-img">
						<img src="images/resources/np.png" alt="">
					</div>
					<input type="text" name="website-url" placeholder="htp://www.example.com">
					<button type="submit" class="save">Save</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

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

    <div class="post-popup pst-pj">
  <div class="post-project">
    <h3>Post a Document</h3>
    <div class="post-project-fields">
      <form method="POST" action="<?php echo e(route('addDoc'), false); ?>" enctype="multipart/form-data"> <?php echo csrf_field(); ?> <div class="row">
          <div class="col-lg-12">
            <input required type="text" name="title" placeholder="Title">
          </div>
          <div class="col-lg-12">
            <div class="inp-field">
              <select required name="event">
                <option selected disabled>List of Events Available For you</option> <?php $__currentLoopData = $data['events']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($events->id, false); ?>"><?php echo e($events->titre, false); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
              <li>
                <button class="active" type="submit" value="post">Post</button>
              </li>
              <li>
                <a href="#" title="">Cancel</a>
              </li>
            </ul>
          </div>
        </div>
      </form>
    </div>
    <!--post-project-fields end-->
    <a href="#" title="">
      <i class="la la-times-circle-o"></i>
    </a>
  </div>
  <!--post-project end-->
</div>
<!--post-project-popup end-->

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
                <a href="#" title="">Cancel</a>
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




                 <script type="text/javascript">
                'use strict'
                    var fileElem = document.getElementById("fileElem");
                    var URL2="<?php echo e(url('/'), false); ?>";

                     
                
                function viewAll(dat){
                    
                   var json=JSON.parse(dat.getAttribute('data')) ;
                   var ul=dat.nextElementSibling.children[0] ;
                   var html="";
                   for(let i=0;i<json.length;i++){
                      if(json[i]['cphoto']==null){
                        html=html+" <li style='background-color:#F1F1F1;border:1px;padding:10px;margin-top:20px'> <div class='comment-list'> <div class='bg-img'> <img src='<?php echo asset('profile_prop/images/clock.png') ?>' > </div> <div class='comment'> <span><img style='width:30px;' src='<?php echo asset('profile_prop/images/default.jpg') ?>' ><h3>"+json[i]['cname']+"</h3> "+json[i]['cdate']+"</span> <p>" +json[i]['content']+" </p> </div> </div><!--comment-list end--> </li>";  i 
                       }else{

                        html=html+" <li style='background-color:#F1F1F1;border:1px;padding:10px;margin-top:20px'> <div class='comment-list'> <div class='bg-img'> <img src='<?php echo asset('profile_prop/images/clock.png') ?>' > </div> <div class='comment'> <span><img style='width:35px;' src='"+URL2+"/storage/app/"+json[i]['cphoto']+"' ><h3>"+json[i]['cname']+"</h3> "+json[i]['cdate']+"</span> <p>" +json[i]['content']+" </p> </div> </div><!--comment-list end--> </li>";                            
                       }                    
                   }
                    ul.innerHTML=html;
                } 
                     
                     function comment(dat){
                         console.log("ok");
                    var data=dat.getAttribute('data');
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       //dat.classList.toggle(this.responseText);
                        dat.previousElementSibling.value="";
                        
                       console.log(this.responseText);
                        
                     reload(dat);
                    }
                      };
                   
                        xhttp.open("GET", "<?php echo e(url('/'), false); ?>"+"/comment/"+data+"/"+dat.previousElementSibling.value, true);
                        xhttp.send();
                     }
                     
                     
                    function reload(dat){
                    var ul=document.getElementById("coms");
                    var data=dat.getAttribute('data');
                    var xhttp = new XMLHttpRequest();
                    var test=ul.innerHTML;
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       //dat.classList.toggle(this.responseText);
                        
                       var json=JSON.parse(this.responseText);
                       
                       if(json['cphoto']==null){
                        ul.innerHTML= test+"<li style='background-color:#F1F1F1;border:1px;padding:10px;  margin-top: 20px;'> <div class='comment-list'> <div class='bg-img'> <img src='<?php echo asset('profile_prop/images/clock.png') ?>' > </div> <div class='comment'> <span><img style='width:30px;' src='<?php echo asset('profile_prop/images/default.jpg') ?>' ><h3>"+json['cname']+"</h3> "+json['cdate']+"</span> <p>" +json['content']+" </p> </div> </div><!--comment-list end--> </li>";   
                       }else{
                        var URL2="<?php echo e(url('/'), false); ?>";
                        ul.innerHTML=test+" <li style='background-color:#F1F1F1;border:1px;padding:10px;margin-top:20px'> <div class='comment-list'> <div class='bg-img'> <img src='"+URL2+"/storage/app/"+json['cphoto']+"' > </div> <div class='comment'> <span><img style='width:35px;' src='"+URL2+"/storage/app/"+json['cphoto']+"' ><h3>"+json['cname']+"</h3> "+json['cdate']+"</span> <p>" +json['content']+" </p> </div> </div><!--comment-list end--> </li>";                            
                       }
                       
                     
                    }
                      };
                   
                        xhttp.open("GET", "<?php echo e(url('/'), false); ?>"+"/getLatest/"+data, true);
                        xhttp.send(); 
                    }
                     
                     
                  
                     
                    function like(dat) {

                    var data=dat.getAttribute('data');
                    var stat=dat.classList[0];
                    console.log(stat);
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       dat.classList.toggle(this.responseText);
      
                       
                     
                    }
                      };
                    if(stat=="active"){
                        xhttp.open("GET", "<?php echo e(url('/'), false); ?>"+"/dislike/"+data, true);

                    }else{
                        xhttp.open("GET", "<?php echo e(url('/'), false); ?>"+"/like/"+data, true);
                    }
                    
                    xhttp.send();
                    
                  }
                     
                
                function people_liked_it(v){
                         document.getElementsByClassName('views')[0].children[0].children[0].innerHTML="Liked By";
                         var URL="<?php echo e(url('/'), false); ?>";
                         var col12=document.getElementById('messi');
                         document.getElementsByClassName('views')[0].classList.toggle('active');
                         document.getElementsByClassName('views')[0].children[0].children[2].onclick=function(ev){
                             col12.innerHTML="";
                             document.getElementsByClassName('views')[0].classList.remove('active');
                             document.getElementsByClassName('wrapper')[0].classList.remove('overlay');
                         }
                         document.getElementsByClassName('wrapper')[0].classList.add('overlay');
                         var data= JSON.parse(v.getAttribute('data')) ;
                         
                         for(let i=0;i<data.length;i++){
                         var sug= document.createElement("div");
                         sug.classList.add('suggestion-usd');
                         var img= document.createElement("img");
                         img.style.width="30px";
                         if(data[i]['dphoto']==null){
                         img.setAttribute("src",URL+"/profile_prop/images/default.jpg");  
                         }else{
                         img.setAttribute("src",URL+"/storage/app/"+data[i]['lphoto']);
                         }
                         sug.appendChild(img);
                         var txt= document.createElement("div");
                         txt.classList.add("sgt-text");
                         var h4= document.createElement("h4");
                         h4.innerText=data[i]['lname'];
                         var span1= document.createElement("span");
                         span1.innerText=data[i]['ldate'];
                         txt.appendChild(h4);
                         txt.appendChild(span1);
                         sug.appendChild(txt);
                         var span2= document.createElement("span");
                         var I= document.createElement("i");
                         I.classList.add('la');
                         I.classList.add('la-plus');
                         var aI= document.createElement("a");
                         aI.setAttribute("href",URL+"/profile/"+data[i]['user_id']);
                         span2.appendChild(aI);
                         span2.appendChild(I);
                         sug.appendChild(span2);
                         col12.appendChild(sug);
                         

                        
                             
                         }
                         

                        
                        

                     
                     }  
                     
                     
                     
                      function people(v){
                         document.getElementsByClassName('views')[0].children[0].children[0].innerHTML="Downloaded By";
                         var URL="<?php echo e(url('/'), false); ?>";
                         var col12=document.getElementById('messi');
                         document.getElementsByClassName('views')[0].classList.toggle('active');
                         document.getElementsByClassName('views')[0].children[0].children[2].onclick=function(ev){
                             col12.innerHTML="";
                             document.getElementsByClassName('views')[0].classList.remove('active');
                             document.getElementsByClassName('wrapper')[0].classList.remove('overlay');
                         }
                         document.getElementsByClassName('wrapper')[0].classList.add('overlay');
                         var data= JSON.parse(v.getAttribute('data')) ;
                         
                         for(let i=0;i<data.length;i++){
                         var sug= document.createElement("div");
                         sug.classList.add('suggestion-usd');
                         var img= document.createElement("img");
                         img.style.width="30px";
                         if(data[i]['dphoto']==null){
                         img.setAttribute("src",URL+"/profile_prop/images/default.jpg");  
                         }else{
                         img.setAttribute("src",URL+"/storage/app/"+data[i]['dphoto']);
                         }
                         sug.appendChild(img);
                         var txt= document.createElement("div");
                         txt.classList.add("sgt-text");
                         var h4= document.createElement("h4");
                         h4.innerText=data[i]['dname'];
                         var span1= document.createElement("span");
                         span1.innerText=data[i]['ddate'];
                         txt.appendChild(h4);
                         txt.appendChild(span1);
                         sug.appendChild(txt);
                         var span2= document.createElement("span");
                         var I= document.createElement("i");
                         I.classList.add('la');
                         I.classList.add('la-plus');
                         var aI= document.createElement("a");
                         aI.setAttribute("href",URL+"/profile/"+data[i]['user_id']);
                         span2.appendChild(aI);
                         span2.appendChild(I);
                         sug.appendChild(span2);
                         col12.appendChild(sug);
                         

                        
                             
                         }
                         

                        
                        

                     
                     }
                     
                     
                     
                     
                     
                    function view(v){
                         document.getElementsByClassName('views')[0].children[0].children[0].innerHTML="Document Views";
                         var URL="<?php echo e(url('/'), false); ?>";
                         var col12=document.getElementById('messi');
                         document.getElementsByClassName('views')[0].classList.toggle('active');
                         document.getElementsByClassName('views')[0].children[0].children[2].onclick=function(ev){
                             col12.innerHTML="";
                             document.getElementsByClassName('views')[0].classList.remove('active');
                             document.getElementsByClassName('wrapper')[0].classList.remove('overlay');
                         }
                         document.getElementsByClassName('wrapper')[0].classList.add('overlay');
                         var data= JSON.parse(v.getAttribute('data')) ;
                        
                         for(let i=0;i<data.length;i++){
                         var sug= document.createElement("div");
                         sug.classList.add('suggestion-usd');
                         var img= document.createElement("img");
                         img.style.width="30px";
                         if(data[i]['vphoto']==null){
                         img.setAttribute("src",URL+"/profile_prop/images/default.jpg");  
                         }else{
                         img.setAttribute("src",URL+"/storage/app/"+data[i]['vphoto']);
                         }
                         sug.appendChild(img);
                         var txt= document.createElement("div");
                         txt.classList.add("sgt-text");
                         var h4= document.createElement("h4");
                         h4.innerText=data[i]['vname'];
                         var span1= document.createElement("span");
                         span1.innerText=data[i]['vdate'];
                         txt.appendChild(h4);
                         txt.appendChild(span1);
                         sug.appendChild(txt);
                         var span2= document.createElement("span");
                         var I= document.createElement("i");
                         I.classList.add('la');
                         I.classList.add('la-plus');
                         var aI= document.createElement("a");
                         aI.setAttribute("href",URL+"/profile/"+data[i]['user_id']);
                         span2.appendChild(aI);
                         span2.appendChild(I);
                         sug.appendChild(span2);
                         col12.appendChild(sug);
                         

                        
                             
                         }
                         

                        
                        

                     
                     }
                    
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
                     
                     
                     
                   document.getElementById('ProfilePhoto').onchange=function(ev){
                        document.getElementById("myphoto").setAttribute("src","<?php echo asset('profile_prop/images/wait.gif')  ?>");

                       loadDoc222(ev.target);
                        // ev.style.display='block'  ;
                        // ev.style.display='block'  ;
                        // console.log(ev);
                       // ev.value=null;
                    }
                                   
                function loadDoc222(dat) {
                    var form = document.getElementById('ProfileForm');
                    var formData = new FormData(form);
                    formData.append("ProfilePhoto", dat.files[0]);

                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myres=JSON.parse(this.response);
                        if(myres['val']=="OK"){
                            document.getElementById("myphoto").setAttribute("src","<?php echo e(url('/'), false); ?>"+"/storage/app/"+myres['path']);
                            console.log("<?php echo e(url('/'), false); ?>"+"/storage/app/"+myres['path']);
                        }
                       }
                      }
                    
                     
                    
                    xhttp.open("POST", "<?php echo e(url('/'), false); ?>"+"/sendPhoto");
                    xhttp.send(formData);

                    }
                     
                     
                     
                     document.getElementById('files').onchange=function(ev){
                        document.getElementById("cov-img").setAttribute("src","<?php echo asset('profile_prop/images/wait.gif')  ?>");

                        loadDoc555(ev.target);
                        // ev.style.display='block'  ;
                        // ev.style.display='block'  ;
                        // console.log(ev);
                       // ev.value=null;
                    }
                     
                
                function loadDoc555(dat) {
                    var form = document.getElementById('CoverForm');
                    var formData = new FormData(form);
                    formData.append("cover", dat.files[0]);

                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myres=JSON.parse(this.response);
                        if(myres['val']=="OK"){
                            document.getElementById("cov-img").setAttribute("src","<?php echo e(url('/'), false); ?>"+"/storage/app/"+myres['path']);
                            console.log("<?php echo e(url('/'), false); ?>"+"/storage/app/"+myres['path']);
                        }
                       }
                      }
                    
                     
                    
                    xhttp.open("POST", "<?php echo e(url('/'), false); ?>"+"/sendCover");
                    xhttp.send(formData);

                    }
                
                </script>
                
                
                  <script type="application/javascript">
           
            function parsar(dat){
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
                     console.log("follow");
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

<?php echo $__env->make('profile_propreties.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\social\resources\views/profile_propreties/UserProfile.blade.php ENDPATH**/ ?>