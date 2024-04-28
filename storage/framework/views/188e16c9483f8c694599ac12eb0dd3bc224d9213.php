
<?php $__env->startSection('content'); ?>
<?php    $encrypted = Crypt::encryptString($data['event_info'][0]->id) ; ?>

<form method="POST" id="CoverForm"  enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>

<!--COVER SECTION START -->
		<section class="cover-sec" style="height: 100%" >
            <?php if(is_null($data['event_info'][0]->photo)): ?>
			<img id="cov-img" data="<?php echo e($encrypted, false); ?>" style="height:350px;"  src="<?php echo asset('profile_prop/images/resources/cover-img.jpg')  ?>"   alt="">
            <?php else: ?>
 			<img id="cov-img" data="<?php echo e($encrypted, false); ?>" style="height:400px;background-size:cover"  src="<?php echo e(url('/').'/storage/app/'.$data['event_info'][0]->photo, false); ?>"   alt="">
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
								
                                    
                                      <div class="widget widget-jobs">
										<div class="sd-title">
											<h3>Event Owner</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
                                          
                                        <div class="user-profy">
                                        
                                            <?php if(is_null($data['event_info'][0]->usphoto)): ?>
								            <img style="max-height:40px;" src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            <?php else: ?>
                                            <img style="max-height:40px;" src="<?php echo e(url('/').'/storage/app/'.$data['event_info'][0]->usphoto, false); ?>" alt="">
                                            <?php endif; ?>
                                            
                                            <?php    $encryptede = Crypt::encryptString($data['event_info'][0]->user_id) ;?>


													<h3><?php echo e($data['event_info'][0]->usname, false); ?></h3>
													<span>Ensa Tanger</span>
                                            
													<ul>
                                    <?php if($data['hide']!="hidden"){?>
                                    <?php if(App\lib\Users::FollowExist(Auth::id(),$data['event_info'][0]->user_id)==1){?>
										<li onclick="parser(this)" data="<?php echo e($encryptede, false); ?>"><a  id ="ff" href="#" title="" class="follow">Unfollow</a></li>
                                         <?php }else{ ?>
                                         <li onclick="parser(this)" data="<?php echo e($encryptede, false); ?>"><a id ="ff"href="#" title="" class="follow">Follow</a></li>

                                       <?php }  ?>														<li><a href="#" title="" class="envlp"><i class="fa fa-envelope"></i></a></li>
                                            <?php }  ?>	
													</ul>
                                             <?php
                                                $profile_id = Crypt::encryptString($data['event_info'][0]->user_id) ;
                                                    ?> 
													<a href="<?php echo e(url('/'), false); ?>/profile/<?php echo e($profile_id, false); ?>" title="">View Profile</a>
								     </div><!--user-profy end-->
										
									    </div>
                                    
                                    
									<div class="suggestions full-width">
										<div class="sd-title">
											<h3>Event Followers</h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">
                                            

											<div class="suggestion-usd">
												<img src="images/resources/s1.png" alt="">
												<div class="sgt-text">
												<ul class="flw-status">
												<li>
													<b><?php echo e($data['event_info']['followers'], false); ?></b>
												</li>
											</ul>
												</div>
											</div>
                                            
	
										
										
											
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
                                    
                                    
                                      
                                    
                                    
                                  
                                    
								</div><!--main-left-sidebar end-->
                              
							</div>
                            
							<div class="col-lg-6">
                                 
								<div class="main-ws-sec">
                                   
									<div class="user-tab-sec rewivew">
                                        
										<h3><?php echo e($data['event_info'][0]->titre, false); ?></h3>
                                        
                                      
										<div class="star-descp">
											<span>Ecole Nationale des Sciences Appliquées Tanger</span>
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
												<li data-tab="info-dd">
													<a href="#" title="">
														<img src="images/ic2.png" alt="">
														<span>Info</span>
													</a>
												</li>
												
												<li data-tab="portfolio-dd">
													<a href="#" title="">
														<img src="images/ic3.png" alt="">
														<span>Photos</span>
													</a>
												</li>
												
												
											</ul>
										</div><!-- tab-feed end-->
									</div><!--user-tab-sec end-->
                                    

                                    
                                    <!--product-feed-tab start IMPORTANT-->
									<div class="product-feed-tab current" id="feed-dd">
                                        							<div class="post-topbar" <?php echo e($data['hide'], false); ?>>
										<div class="user-picy">
											<img src="images/resources/user-pic.png" alt="">
										</div>
										<div class="post-st" >
											<ul>
                                                <?php if(count($data['events'])==0): ?>
												<li hidden ><a class="post_project" href="#" title="">Post a Document</a></li>
                                                <?php else: ?>
                                                <li ><a class="post_project" href="#" title="">Post a Document</a></li>
                                                 <?php endif; ?>												<li><a class="post-jb active" href="#" title="">Create an Event</a></li>
											</ul>
										</div><!--post-st end-->
				              </div>
										<div class="posts-section">
                                            <?php $followExist=0 ?>
                                <?php if(App\lib\Event::FollowExist(Auth::id(),$data['event_info'][0]->id)==1): ?>
                                           <?php $followExist=1 ?>
                                <?php endif; ?>
                                <?php if($data['hide']=="" or $followExist==1  ): ?>
                                        <?php $__currentLoopData = $data['pub']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
															<span><img src="<?php echo asset('profile_prop/images/clock.png')  ?>"  alt=""><?php echo e($pub->date_creation, false); ?> </span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="<?php echo asset('profile_prop/images/icon8.png')  ?>"  alt=""><span>Ensa</span></li>
														<li><img src="<?php echo asset('profile_prop/images/icon9.png')  ?>"  alt=""><span>Tnager</span></li>
													</ul>
													<ul class="bk-links">
														<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
														<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
													</ul>
												</div>
												<div class="job_descp">
													<h3><?php echo e($pub->titre, false); ?></h3>
												
                                                    
                                                       
         
													<p><?php echo e($pub->descr, false); ?></p>
                                               <?php
                                                $encrypted = Crypt::encryptString("$pub->id") ;
                                                    ?>  
                                                           <div id="FileUpload" data="<?php echo e($encrypted, false); ?>" onclick="parserDown(this)" >
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
                                           
                                                    
													<ul class="skill-tags">
														<li><a href="#" title="">HTML</a></li>
														<li><a href="#" title="">PHP</a></li>
														<li><a href="#" title="">CSS</a></li>
														<li><a href="#" title="">Javascript</a></li>
														<li><a href="#" title="">Wordpress</a></li> 	
													</ul>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="#"><i class="fas fa-heart"></i> Like</a>
															<img src="images/liked-img.png" alt="">
															<span>25</span>
														</li> 
														<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>
													</ul>
													<a href="#"><i class="fas fa-eye"></i>Views 50</a>
												</div>
											</div><!--post-bar end-->
									       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php endif; ?>
											<div class="process-comm">
												<div class="spinner">
													<div class="bounce1"></div>
													<div class="bounce2"></div>
													<div class="bounce3"></div>
												</div>
											</div><!--process-comm end-->
										</div><!--posts-section end-->
									</div><!--product-feed-tab end-->



									<div class="product-feed-tab" id="info-dd">
										<div class="user-profile-ov">
											<h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. Nunc eu augue nec arcu efficitur faucibus. Aliquam accumsan ac magna convallis bibendum. Quisque laoreet augue eget augue fermentum scelerisque. Vivamus dignissim mollis est dictum blandit. Nam porta auctor neque sed congue. Nullam rutrum eget ex at maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget vestibulum lorem.</p>
										</div><!--user-profile-ov end-->


										<div class="user-profile-ov">
											<h3><a href="#" title="" class="skills-open">Interests</a> <a href="#" title="" class="skills-open"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-plus-square"></i></a></h3>
											<ul>
												<li><a href="#" title="">HTML</a></li>
												<li><a href="#" title="">PHP</a></li>
												<li><a href="#" title="">CSS</a></li>
												<li><a href="#" title="">Javascript</a></li>
												<li><a href="#" title="">Wordpress</a></li>
												<li><a href="#" title="">Photoshop</a></li>
												<li><a href="#" title="">Illustrator</a></li>
												<li><a href="#" title="">Corel Draw</a></li>
											</ul>
										</div><!--user-profile-ov end-->
									</div><!--product-feed-tab end-->
                                    
                                    

                                    
                                    
                                    
									<div class="product-feed-tab" id="portfolio-dd">
										<div class="portfolio-gallery-sec">
											<h3>Portfolio</h3>
											<div class="portfolio-btn">
												<a href="#" title=""><i class="fas fa-plus-square"></i> Add Portfolio</a>
											</div>
											<div class="gallery_pf">
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img1.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img2.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img3.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img4.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img5.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img6.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img7.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img8.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img9.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img10.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
												</div>
											</div><!--gallery_pf end-->
										</div><!--portfolio-gallery-sec end-->
									</div><!--product-feed-tab end-->

								</div><!--main-ws-sec end-->
							</div>
							<div class="col-lg-3">
								<div class="right-sidebar">
                                    
                                    <div class="message-btn">
                                      <?php $enc= Crypt::encryptString($data['event_info'][0]->id) ; ?>
                                        <?php if($data['hide']==""){?>
                                                            
                                        <ul style="list-style:none;color:#ffffff;cursor:pointer" hidden>
                                        
 
                                        <?php if($followExist==1): ?>
										<li onclick="purse(this)" data="<?php echo e($enc, false); ?>" ><a  title=""><i class="fas fa-user-plus"></i>Unfollow</a>
                                         <?php else: ?>
                                        <li  onclick="purse(this)" data="<?php echo e($enc, false); ?>" ><a  title=""><i class="fas fa-user-plus"></i>Follow</a>
                                        <?php endif; ?>
                                        
                                        
                                        </li>
                                        </ul>
                                        <?php }else{?>
                                        <ul style="list-style:none;color:#ffffff;cursor:pointer" >
                                        
 
                                        <?php if($followExist==1): ?>
										<li onclick="purse(this)" data="<?php echo e($enc, false); ?>" ><a  title=""><i class="fas fa-user-plus"></i>Unfollow</a>
                                         <?php else: ?>
                                        <li  onclick="purse(this)" data="<?php echo e($enc, false); ?>" ><a  title=""><i class="fas fa-user-plus"></i>Follow</a>
                                        <?php endif; ?>
                                        
                                        
                                        </li>
                                        </ul>                                       
                                        <?php }?>
                                            
                                    </div>
									
									<div class="widget widget-portfolio">
										<div class="wd-heady">
											<h3>Event Photos</h3>
											<img src="images/photo-icon.png" alt="">
										</div>
										<div class="pf-gallery">
											<ul>
												<li><a href="#" title=""><img src="images/resources/pf-gallery1.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery2.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery3.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery4.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery5.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery6.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery7.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery8.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery9.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery10.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery11.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery12.png" alt=""></a></li>
											</ul>
										</div><!--pf-gallery end-->
									</div><!--widget-portfolio end-->
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
								<textarea name="description" required placeholder="Description"></textarea>
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" value="post">Post</button></li>
									<li><a href="#" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->

<div class="post-popup job_post">
			<div class="post-project">
				<h3>Post an Event</h3>
				<div class="post-project-fields">
					<form method="POST" action="<?php echo e(route('addEvent'), false); ?>"  enctype="multipart/form-data" >
                        <?php echo csrf_field(); ?>
				<input required id="fileElem" type="file" onchange="handler(this)" style="display:none" name="EventPhoto"  />
						<div class="row">
							<div class="col-lg-12">
								<input required  type="text" name="title" placeholder="Title">
							</div>
							
							<div class="col-lg-6">
								<div class="price-br">
									<!-- === File Upload ===
Design a file upload element. Is it the loading screen and icon? A progress element? Are folders being uploaded by flying across the screen like Ghostbusters? ;)  
-->

<div id="FileUpload">
  <div class="wrapper2">
    <div id="fileSelect" class="upload">
      <p><span class="upload__button">Event Cover</span></p>
    </div>
    <div class="uploaded uploaded--one" style="display:none">
      <i class="far fa-image"></i>
      <div  class="file"  >
        <div  class="file__name" >
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
									<li><button class="active" type="submit" value="post">Post</button></li>
									<li><a href="#" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
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
                      
                     function parserDown(dat){
                     var data=dat.getAttribute('data');
                    window.open("<?php echo e(url('/'), false); ?>"+"/download/"+data);
                     }
                     
                     
                     
                     
                     document.getElementById('files').onchange=function(ev){
                        document.getElementById("cov-img").setAttribute("src","<?php echo asset('profile_prop/images/wait.gif')  ?>");

                        loadDoc45(ev.target);
                        // ev.style.display='block'  ;
                        // ev.style.display='block'  ;
                        // console.log(ev);
                       // ev.value=null;
                    }
                     
                
                function loadDoc45(dat) {
                    var form = document.getElementById('CoverForm');
                    var formData = new FormData(form);
                    formData.append("cover", dat.files[0]);
                    formData.append("id", document.getElementById("cov-img").getAttribute('data')
);

                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myres=JSON.parse(this.response);
                        if(myres['val']=="OK"){
                            document.getElementById("cov-img").setAttribute("src","<?php echo e(url('/'), false); ?>"+"/storage/app/"+myres['path']);
                            console.log("<?php echo e(url('/'), false); ?>"+"/storage/app/"+myres['path']);
                        }else{
                            console.log(this.response);
                        }
                       }
                      }
                    
                     
                    
                    xhttp.open("POST", "<?php echo e(url('/'), false); ?>"+"/sendEventCover");
                    xhttp.send(formData);

                    }
                
                </script>
        <script type="application/javascript">
           var myglobal=0;
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
             myglobal=1;
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
            <script type="application/javascript">
           
            function purse(dat){
                     var fan=dat.firstChild.innerText;
                     dat.firstChild.innerText='Wait..';
                    // window.open("<?php echo e(url('/'), false); ?>"+"/unfollow/"+data+"/1");
                     if(fan=="Follow"){
                       loadDocev(dat);  
                     }else if(fan=="Unfollow"){
                      loadDocev2(dat);  
                      }
                     
                     }
            
            function loadDocev(dat) {
                    var data=dat.getAttribute('data');
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if(this.responseText=="OK"){
                         dat.firstChild.innerText='Unfollow';
                       }
                     
                    }
                      };
                    xhttp.open("GET", "<?php echo e(url('/'), false); ?>"+"/followev/"+data, true);
                    xhttp.send();
                    }
            
            function loadDocev2(dat) {
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
                

			</div><!--post-project end-->
		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile_propreties.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\Edocs\resources\views/profile_propreties/Event_home.blade.php ENDPATH**/ ?>