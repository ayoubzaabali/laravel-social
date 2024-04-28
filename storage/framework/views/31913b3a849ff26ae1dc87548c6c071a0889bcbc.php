<?php echo $__env->make('profile_propreties.features.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body oncontextmenu="return false;">

<div id="overlay" onclick="offf()"></div>

      <div id="confirm" >
         <div class="message"></div>
         <button class="yes">Yes</button>
         <button class="no">No</button>
      </div>
	<div class="wrapper">	
<?php $data = App\lib\Users::mydata(Auth::id())  ?>
		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="index.html" title=""><img src="<?php echo asset('profile_prop/images/logo.png')  ?>"  alt=""></a>
					</div><!--logo end-->
        
					<div class="search-bar" hidden>
						<form>
							<input type="text" name="search" placeholder="Search...">
							<button type="submit"><i class="la la-search"></i></button>
						</form>
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
								<a href="<?php echo e(url('/'), false); ?>" title="">
									<span><img src="<?php echo asset('profile_prop/images/icon1.png')  ?>"  alt=""></span>
									Home
								</a>
							</li>
							<li>
								<a href="<?php echo e(url('/'), false); ?>/profile" title="">
									<span><img src="<?php echo asset('profile_prop/images/icon2.png')  ?>" alt=""></span>
									My Profile
								</a>
								
							</li>
						
                            
							<li>
								<a  href="<?php echo e(url('/'), false); ?>/profiles" title="">
									<span><img src="<?php echo asset('profile_prop/images/icon4.png')  ?>"alt=""></span>
									Suggestions
								</a>
								<ul>
									<li><a href="<?php echo e(url('/'), false); ?>/events" title="">Others Events</a></li>
									<li><a href="<?php echo e(url('/'), false); ?>/profiles" title="">Other Users</a></li>
								</ul>
							</li>
							
						
							<li>
								<a href="#" title="" class="not-box-open">
									<span class="animated"><img  src="<?php echo asset('profile_prop/images/icon7.png')  ?>"  alt=""></span>
									Notification
								</a>
                             <?php $notifs= App\lib\Notif::MyNotificationsTen(Auth::id());  ?>

								<div class="notification-box noti" id="notification">
									<div class="nt-title">
										<h4><?php echo e(count($notifs), false); ?></h4>
									</div>
									<div class="nott-list" id='notlist'>
                                                                 
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

							  					<h3><a href="<?php echo e(url('/').'/profile/'.$usr_id, false); ?>" title=""><?php echo e($notif->usname, false); ?></a> Uploaded a <a href="<?php echo e(url('/').'/Doc/'.$dc_id, false); ?>">document</a> on <a href="<?php echo e(url('/').'/Event/'.$ev_id, false); ?>" title=""><?php echo e($notif->titre, false); ?></a> at <a ><?php echo e($notif->date_creation, false); ?></a>
                                                    <?php if($notif->new==0): ?>
                                                    <img style="width:30px;height:30px;float:right" src="<?php echo asset('profile_prop/images/new.gif')  ?>" alt="">                                      <?php endif; ?>
                                                   </h3>
							  				</div><!--notification-info -->
						  				</div>
						  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  				
						  
						  				<div class="view-all-nots">
						  					<a href="<?php echo e(url('/').'/Notifications/', false); ?>" title="">View All Notification</a>
						  				</div>
									</div><!--nott-list end-->
								</div><!--notification-box end-->
							</li>
						</ul>
					</nav><!--nav end-->
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->
					<div class="user-account">
						<div class="user-info" style="width:150px;">
                              <?php if(is_null($data->photo)): ?>
			                <img  style="width:30px;height:30px" src="<?php echo asset('profile_prop/images/resources/cover-img.jpg')  ?>"   alt="">
                            <?php else: ?>
							<img style="width:30px;height:30px"  src="<?php echo e(url('/').'/storage/app/'.$data->photo, false); ?>" alt="">
                            <?php endif; ?>
							<a  href="#" title=""><?php echo e($data->name, false); ?></a>
							<i class="la la-sort-down"></i>
						</div>
						<div class="user-account-settingss">
							<h3 class="tc"><a href="<?php echo e(url('/').'/logouut ', false); ?>" title="">Logout</a></h3>
						</div><!--user-account-settingss end-->
					</div>
				</div><!--header-data end-->
			</div>
		</header><!--header end-->	
        
        <?php echo $__env->yieldContent('content'); ?>

           <footer>
			<div class="footy-sec mn no-margin">
				<div class="container">
					<ul>
						<li><a href="help-center.html" title="">Help Center</a></li>
						<li><a href="about.html" title="">About</a></li>
						<li><a href="#" title="">Privacy Policy</a></li>
						<li><a href="#" title="">Community Guidelines</a></li>
						<li><a href="#" title="">Cookies Policy</a></li>
						<li><a href="#" title="">Career</a></li>
						<li><a href="forum.html" title="">Forum</a></li>
						<li><a href="#" title="">Language</a></li>
						<li><a href="#" title="">Copyright Policy</a></li>
					</ul>
					<p><img src="<?php echo asset('profile_prop/images/copy-icon2.png')  ?>"  alt="">Copyright 2019</p>
					<img class="fl-rgt"src="<?php echo asset('profile_prop/images/logo2.png')  ?>" alt="">
				</div>
			</div>
		</footer>	
    </div>
	


<script type="text/javascript"  src="<?php echo asset('profile_prop/js/jquery.min.js')  ?>"></script>
<script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>
<script type="text/javascript"  src="<?php echo asset('profile_prop/js/popper.js')  ?>"></script>
<script type="text/javascript"  src="<?php echo asset('profile_prop/js/bootstrap.min.js')  ?>"></script>
<script type="text/javascript"   src="<?php echo asset('profile_prop/js/jquery.range-min.js"')  ?>"></script>
<script type="text/javascript"  src="<?php echo asset('profile_prop/lib/slick/slick.min.js"')  ?>"></script>
<script type="text/javascript"  src="<?php echo asset('profile_prop/js/script.js')  ?>"></script>

<script type="text/javascript">
   'use strict' 
    var mylist=document.getElementById('notlist');
    var URL="<?php echo e(url('/'), false); ?>";
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
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       //dat.classList.toggle(this.responseText);
                        
                       var json=JSON.parse(this.responseText);
                       if(json['cphoto']==null){
                        ul.innerHTML=" <li style='background-color:#F1F1F1;border:1px;padding:10px;  margin-top: 20px;'> <div class='comment-list'> <div class='bg-img'> <img src='<?php echo asset('profile_prop/images/clock.png') ?>' > </div> <div class='comment'> <span><img style='width:30px;' src='<?php echo asset('profile_prop/images/default.jpg') ?>' ><h3>"+json['cname']+"</h3> "+json['cdate']+"</span> <p>" +json['content']+" </p> </div> </div><!--comment-list end--> </li>";   
                       }else{
                        var URL2="<?php echo e(url('/'), false); ?>";

                        ul.innerHTML=" <li style='background-color:#F1F1F1;border:1px;padding:10px;margin-top:20px'> <div class='comment-list'> <div class='bg-img'> <img src='"+URL2+"/storage/app/"+json['cphoto']+"' > </div> <div class='comment'> <span><img style='width:35px;' src='"+URL2+"/storage/app/"+json['cphoto']+"' ><h3>"+json['cname']+"</h3> "+json['cdate']+"</span> <p>" +json['content']+" </p> </div> </div><!--comment-list end--> </li>";                            
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
    handleNotification();
    
    function handleNotification(){
    var type=     typeof mylist.firstElementChild.children[1];
        if(type=='undefined'){
           lastnotif=0;

        }else{
          var lastnotif=mylist.firstElementChild.children[1].children[0].children[3].innerText;

        }
        
        
        
        
     getMynotification(lastnotif); 
    }
    
    function getMynotification(lastnotif) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var aui=CreateElement(JSON.parse(this.responseText));
        if(aui!="n"){
            var myVar = setTimeout(handleNotification, 3000);
        }
    }
  };
  xhttp.open("GET", URL+"/getMynotification/"+lastnotif, true);
  xhttp.send();
}

    function CreateElement(myjson){
        if(myjson.length==0){
            return("handler");
        }else{
            for(let i =0 ;i<myjson.length;i++){
            var not_det = document.createElement("div"); 
            not_det.setAttribute("class",'notfication-details');
            not_det.style.animationIterationCount = "infinite";
            var not_usr_img = document.createElement("div"); 
            not_usr_img.setAttribute("class",'noty-user-img');
            var img = document.createElement("img"); 
            if(myjson[i]['usphoto']==null){
            img.setAttribute("src",URL+"/profile_prop/images/default.jpg");
            }else{
            img.setAttribute("src",URL+"/storage/app/"+myjson[i]['usphoto']);
            }
            not_usr_img.appendChild(img);
            not_det.appendChild(not_usr_img);

            var user_info=document.createElement("div"); 
            user_info.setAttribute("class",'notification-info');
            var h3=document.createElement("h3"); 
            var a1=document.createElement("a"); 
            a1.setAttribute("href",URL+"/profile/"+myjson[i]['user_id']);
            a1.innerText=myjson[i]['usname'];
            h3.appendChild(a1);
            var t1 = document.createTextNode(" Uploaded a ");
            h3.appendChild(t1);
            var a2=document.createElement("a"); 
            a2.setAttribute("href",URL+"/Doc/"+myjson[i]['document_id']);
            a2.innerText="document";
            h3.appendChild(a2);            
            var t2 = document.createTextNode(" on ");
            h3.appendChild(t2);   
            var a3=document.createElement("a"); 
            a3.setAttribute("href",URL+"/Event/"+myjson[i]['event_id']);
            a3.innerText=myjson[i]['titre'];
            h3.appendChild(a3);
            var t3 = document.createTextNode(" at ");
            h3.appendChild(t3);
            var a4=document.createElement("a"); 
            a4.innerText=myjson[i]['date_creation'];
            h3.appendChild(a4);
            if(myjson[i]['new']==0){
                var img2 = document.createElement("img");
                img2.style.width="30px";
                img2.style.height="30px";
                img2.style.float="right";
                img2.setAttribute("src",URL+"/profile_prop/images/new.gif");
                h3.appendChild(img2);

            }
            //addlist
            user_info.appendChild(h3);
            not_det.appendChild(user_info);
            not_det.classList.add("animated");
            not_det.classList.add("headShake");
            mylist.insertBefore(not_det,mylist.children[0]);
            }
            mylist.parentElement.previousElementSibling.firstElementChild.classList.remove("flash");
            mylist.parentElement.previousElementSibling.firstElementChild.classList.add("flash");
            var integ = parseInt(mylist.previousElementSibling.firstElementChild.innerText, 10); 
            mylist.previousElementSibling.firstElementChild.innerText=integ+myjson.length;
            $.playSound(URL+"/profile_prop/images/notification.mp3");

          
        }
        
        
        
    }

    
</script>

</body>

</html>
        <?php /**PATH /homepages/42/d841511542/htdocs/DocsSmartEnsa/E/resources/views/profile_propreties/layout.blade.php ENDPATH**/ ?>