@extends('profile_propreties.layout')
@section('content')

		<section class="companies-info">
			<div class="container">
			
				<div class="companies-list">
					<div class="row">
                        
                    	<div class="post-bar">
                             <div class="post_topbar">
                                 <?php  $pub=$data['pub']   ?>
													<div class="usy-dt">
                                            @if(is_null($pub->usphoto))
                                           <img style="max-height:40px;" src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            @else
                                            <img style="max-height:40px;"src="{{url('/').'/storage/app/'.$pub->usphoto}}"alt="">
                                             @endif
														<div class="usy-name">
															<h3>{{$pub->usname}}</h3>
															<span><img src="<?php echo asset('profile_prop/images/clock.png')  ?>"  alt="">{{$pub->date_creation}} </span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
													
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="<?php echo asset('profile_prop/images/icon8.png')  ?>"  alt=""><span>Ensa</span></li>
														<li><img src="<?php echo asset('profile_prop/images/icon9.png')  ?>"  alt=""><span>Tnager</span></li>
													</ul>
													
												</div>
												<div class="job_descp">
													<h3>{{$pub->titre}}</h3>
													<ul class="job-dt">
								        <li><a href="#" title="">{{$pub->evtitre}}</a></li>
				
													</ul>
                                                    
                                                       
         
													<p>{{$pub->descr}}</p>
                                               <?php
    $encrypted = Crypt::encryptString("$pub->id") ;
                                                    ?>  
                                                           <div id="FileUpload" data="{{$encrypted}}" onclick="parser(this)" >
                                                             <div class="wrapper2">
                                                               <div class="uploaded uploaded--three">
                                                                 <i class="fa fa-file fa-file-pdf" aria-hidden="true"></i>
                                                                 <div class="file">
                                                                   <div class="file__name">
                                                                     <p>{{$pub->original_name}}</p>
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
                                                            @if(App\lib\Docs::liked($pub->id,Auth::id()))
															<a href="#me" data="{{$pub->id}}"   onclick="like(this)" class='active'><i class="fas fa-heart"></i> Like</a>
                                                            @else
                                                            <a href="#me" data="{{$pub->id}}"   onclick="like(this)" ><i class="fas fa-heart"></i> Like</a>
                                                            @endif
                                                            
															<img src="<?php echo asset('profile_prop/images/liked-img.png')  ?>" alt="">
															
														</li> 
                                                        <li data="{{$pub->likes}}" class='likes_hov' onclick="people_liked_it(this)">
                                                         <span>{{count($pub->likes)}}</span>
                                                        </li>
														<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment {{count($pub->coms)}}</a></li>
													</ul>
													<a  onclick='people(this)' data='{{$pub->downloads}}'><i class="fas fa-download"></i>  Downloads {{count($pub->downloads)}}</a>
                                				   
													<a  onclick='view(this)' data='{{$pub->viewers}}'><i class="fas fa-eye"></i>
                                                    Views {{count($pub->viewers)}}</a>
												</div>
											<div class="comment-section">
												<a id="uih" data="{{$pub->coms}}" onclick='viewAll(this)' class="plus-ic">
													<i class="la la-plus"></i>
                                                    
												</a>
												<div class="comment-sec">
													
															
															<ul id="coms">
                                                                @if(count($pub->coms)>0)
																<li style="background-color:#F1F1F1;border:1px;padding:10px;margin-buttom:20px">
																	<div class="comment-list">
																		<div class="bg-img">
																			<img src="<?php echo asset('profile_prop/images/clock.png')  ?>" alt="">
																		</div>
																		<div class="comment">
                                                                            <span>
                                                                                @if(is_null($pub->coms[0]->cphoto))
                                                                                <img style="width:30px;" src="<?php echo asset('profile_prop/images/default.jpg')  ?>" alt="">
                                                                                @else
                                                                                <img style="width:30px;" src="{{url('/').'/storage/app/'.$pub->coms[0]->cphoto}}" alt="">
                                                                                @endif
                                                                                <h3>{{$pub->coms[0]->cname}}</h3> {{$pub->coms[0]->cdate}}</span>
																			
                                                                            <p>{{$pub->coms[0]->content}} </p>
																			
																			
																		</div>
																	</div><!--comment-list end-->
																</li>
                                                              
                                                                @endif
                                                               
															</ul>
														
												</div><!--comment-sec end-->
												<div style="margin-top:10px"class="post-comment">
													<div class="cm_img">
														<img src="images/resources/bg-img4.png" alt="">
													</div>
													<div class="comment_box">
															<input type="text" placeholder="Post a comment">
															<button data="{{$pub->id}} " onclick="comment(this)" >Send</button>
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
                    window.open("{{url('/')}}"+"/download/"+data);
                     }
                     

</script>
    @endsection
