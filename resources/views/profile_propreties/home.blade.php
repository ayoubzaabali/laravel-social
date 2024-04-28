@extends('profile_propreties.layout')
@section('content')


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
								@if(is_null($data['user_info'][0]->cover))
			                         <img   src="<?php echo asset('profile_prop/images/default.jpg')  ?>"   alt="">
                                @else
 			                         <img  src="{{url('/').'/storage/app/'.$data['user_info'][0]->photo}}"   alt="">
                                @endif
												</div>
											</div><!--username-dt end-->
											<div class="user-specs">
												<h3>{{$data['user_info'][0]->name}}</h3>
												<span>Ecole Nationale des Sciences Appliquées Tanger</span>
											</div>
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<li>
												<h4>Following</h4>
												<span>{{$data['user_info']['following']}}</span>
											</li>
											<li>
												<h4>Followers</h4>
												<span>{{$data['user_info']['followers']}}</span>
											</li>
											<li>
												<a href="{{url('/').'/profile'}}" title="">View Profile</a>
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
                                            
                                        @foreach($data['events'] as $event)

											<div class="suggestion-usd">
												<img src="images/resources/s1.png" alt="">
												<div class="sgt-text">
													<h4>{{$event->titre}}</h4>
													<span><b>Followers :</b> {{$event->count}}</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
                                            
								        @endforeach
	
										
										
										
											<div class="view-more">
												<a href="#" title="">View More</a>
											</div>
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
										<img src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">

										</div>
										<div class="post-st" >
											<ul>
                                                @if(count($data['events'])==0)
												<li hidden ><a class="post_project" href="#" title="">Post a Document</a></li>
                                                @else
                                                <li ><a class="post_project" href="#" title="">Post a Document</a></li>
                                                 @endif
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
                                                
                                           
											
												
												
												                          
                       @foreach($data['users'] as $user)
                    <?php    $encrypted_user = Crypt::encryptString("$user->id") ;?>
                                                
												<div class="user-profy">
                                           @if(is_null($user->photo))
                                           <img id="myphoto" style="width:50px;height:50px"  src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            @else
                                            <img id="myphoto" style="width:50px;height:50px"  src="{{url('/').'/storage/app/'.$user->photo}}"alt="">
                                             @endif									
                                                    <h3>{{$user->name}}</h3>													
                                                    
													<span>Ensa Tnager</span>
													<ul>
                                  <?php if(App\lib\Users::FollowExist(Auth::id(),$user->id)==1){?>
										<li onclick="paysar(this)" data="{{$encrypted_user}}"><a id="ff" href="#" title="" class="followw">Unfollow</a></li>
                                         <?php }else{ ?>
                                         <li onclick="paysar(this)" data="{{$encrypted_user}}"><a id="ff" href="#" title="" class="followw">Follow</a></li>

                                       <?php }  ?>                                                        
                                                        
                                                        
														<li><a href="#" title="" class="envlp"><i class="fa fa-envelope"></i></a></li>
													</ul>
													<a href="{{url('/')}}/profile/{{$encrypted_user}}" title="">View Profile</a>
												</div><!--user-profy end-->
											
										@endforeach	
                                                
												
											</div><!--profiles-slider end-->
										</div><!--top-profiles end-->

                                            
                                            
                                            
                                            
                                            
                                            
                                        @foreach($data['pub'] as $pub)
                                        <?php $dc_id = Crypt::encryptString("$pub->id") ;?>
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
                                            @if(is_null($pub->usphoto))
                                           <img style="max-height:40px;" src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            @else
                                            <img style="max-height:40px;"src="{{url('/').'/storage/app/'.$pub->usphoto}}"alt="">
                                             @endif
														<div class="usy-name">
															<h3>{{$pub->usname}}</h3>
															<span><img src="<?php echo asset('profile_prop/images/clock.png')  ?>"  alt=""><a style="color:#B2C2DD" href="{{url('/').'/Doc/'.$dc_id}}">{{$pub->date_creation}}</a> </span>
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
														<li >
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
                                                                <li style="background-color:#F1F1F1;border:1px;padding:10px;   margin-top: 20px;">
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
									       @endforeach

											<div class="process-comm">
												<div class="spinner">
													<div class="bounce1"></div>
													<div class="bounce2"></div>
													<div class="bounce3"></div>
												</div>
											</div><!--process-comm end-->
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
                                        @foreach($data['trends'] as $trend)
                                            
											<div class="job-info">
												<div class="job-details">
													<h3>{{$trend->titre}}</h3>
													<p>{{$trend->date_creation}}</p>
												</div>
												<div class="hr-rate">
													<span>{{$a}}</span>
                                                    
												</div>
											</div><!--job-info end-->
                                          <?php $a=$a+1 ?>

										@endforeach
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
					<form method="POST" action="{{ route('addDoc') }}"  enctype="multipart/form-data" >
                            @csrf
						<div class="row">
							<div class="col-lg-12">
								<input required type="text" name="title" placeholder="Title">
							</div>
							<div class="col-lg-12">
								<div class="inp-field">
									<select required name="event">
                                       <option selected disabled>List of Events Available For you</option>

                                        @foreach($data['events'] as $events)
										<option value="{{ $events->id }}" >{{ $events->titre }}</option>
                                        @endforeach
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
									<li><a href="#" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
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
<div class="post-popup job_post">
			<div class="post-project">
				<h3>Post an Event</h3>
				<div class="post-project-fields">
					<form method="POST" action="{{ route('addEvent') }}"  enctype="multipart/form-data" >
                        @csrf
				<input required id="fileElem" type="file" onchange="handler(this)" style="display:none" name="EventPhoto"  />
						<div class="row">
							<div class="col-lg-12">
								<input required type="text" name="title" placeholder="Title">
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
                      function parser(dat){
                     var data=dat.getAttribute('data');
                    window.open("{{url('/')}}"+"/download/"+data);
                     }
                     
                     
                      
             
                     
                    
                
             
                
                </script>
                
                
                        <script type="application/javascript">
           
            function paysar(dat){
                     var data=dat.getAttribute('datas');
                     var fan=dat.firstChild.innerText;
                     dat.firstChild.innerText='Wait..';
                    // window.open("{{url('/')}}"+"/unfollow/"+data+"/1");
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
                    xhttp.open("GET", "{{url('/')}}"+"/follow/"+data, true);
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
                    xhttp.open("GET", "{{url('/')}}"+"/unfollow/"+data+"/"+test, true);
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

@endsection
