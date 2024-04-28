
<?php $__env->startSection('content'); ?>

		<section class="companies-info">
			<div class="container">
			
				<div class="companies-list">
					<div class="row">
                        
                    	<div class="post-bar">
                             <div class="post_topbar">
                                 <?php  $pub=$data['pub']   ?>
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
                                                            <?php if(App\lib\Docs::liked($pub->id,Auth::id())): ?>
															<a href="#me" data="<?php echo e($pub->id, false); ?>"   onclick="like(this)" class='active'><i class="fas fa-heart"></i> Like</a>
                                                            <?php else: ?>
                                                            <a href="#me" data="<?php echo e($pub->id, false); ?>"   onclick="like(this)" ><i class="fas fa-heart"></i> Like</a>
                                                            <?php endif; ?>
                                                            
															<img src="<?php echo asset('profile_prop/images/liked-img.png')  ?>" alt="">
															
														</li> 
                                                        <li data="<?php echo e($pub->likes, false); ?>" class='likes_hov' onclick="people_liked_it(this)">
                                                         <span><?php echo e(count($pub->likes), false); ?></span>
                                                        </li>
														<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment <?php echo e(count($pub->coms), false); ?></a></li>
													</ul>
													<a  onclick='people(this)' data='<?php echo e($pub->downloads, false); ?>'><i class="fas fa-download"></i>  Downloads <?php echo e(count($pub->downloads), false); ?></a>
                                				   
													<a  onclick='view(this)' data='<?php echo e($pub->viewers, false); ?>'><i class="fas fa-eye"></i>
                                                    Views <?php echo e(count($pub->viewers), false); ?></a>
												</div>
											<div class="comment-section">
												<a id="uih" data="<?php echo e($pub->coms, false); ?>" onclick='viewAll(this)' class="plus-ic">
													<i class="la la-plus"></i>
                                                    
												</a>
												<div class="comment-sec">
													
															
															<ul id="coms">
                                                                <?php if(count($pub->coms)>0): ?>
																<li style="background-color:#F1F1F1;border:1px;padding:10px;margin-buttom:20px">
																	<div class="comment-list">
																		<div class="bg-img">
																			<img src="<?php echo asset('profile_prop/images/clock.png')  ?>" alt="">
																		</div>
																		<div class="comment">
                                                                            <span>
                                                                                <?php if(is_null($pub->coms[0]->cphoto)): ?>
                                                                                <img style="width:30px;" src="<?php echo asset('profile_prop/images/default.jpg')  ?>" alt="">
                                                                                <?php else: ?>
                                                                                <img style="width:30px;" src="<?php echo e(url('/').'/storage/app/'.$pub->coms[0]->cphoto, false); ?>" alt="">
                                                                                <?php endif; ?>
                                                                                <h3><?php echo e($pub->coms[0]->cname, false); ?></h3> <?php echo e($pub->coms[0]->cdate, false); ?></span>
																			
                                                                            <p><?php echo e($pub->coms[0]->content, false); ?> </p>
																			
																			
																		</div>
																	</div><!--comment-list end-->
																</li>
                                                              
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
					</div>
				</div><!--companies-list end-->
				
			</div>
		</section><!--companies-info end-->
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
     <script>
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
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('profile_propreties.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/7/d421602321/htdocs/ENT/DOCS20/resources/views/profile_propreties/doc.blade.php ENDPATH**/ ?>