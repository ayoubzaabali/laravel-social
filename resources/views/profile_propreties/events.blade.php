@extends('profile_propreties.layout')
@section('content')

		<section class="companies-info">
			<div class="container">
				<div class="company-title">
					<h3>Latest Events</h3>
				</div><!--company-title end-->
        @if( count($data['events'])==0)
            <div style="margin-left:20px" class="col-lg-3 col-md-4 col-sm-6 col-12">
            <b style="font-weight:bolder !important;">no events to show</b>
            </div>
            @endif
				<div class="companies-list">
					<div class="row">
           
                        
                        @foreach($data['events'] as $event)
                    <?php    $encrypted = Crypt::encryptString("$event->id") ;?>
                        
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
                                       @if(is_null($event->photo))
                                           <img id="myphoto" src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            @else
                                            <img style="width:100px;height:100px" id="myphoto"src="{{url('/').'/storage/app/'.$event->photo}}"alt="">
                                             @endif									<h3>{{$event->titre}}</h3>
									<h4>Ensa Tnager</h4>
									<ul>
                                        <?php
                          if(App\lib\Event::FollowExist(Auth::id(),$event->id)==1){
                                        ?>
                                        
										<li onclick="parser(this)" data="{{$encrypted}}"><a id="ff" href="#" title="" class="follow">Unfollow</a></li>
                                         <?php }else{ ?>
                                         <li onclick="parser(this)" data="{{$encrypted}}"><a id="ff" href="#" title="" class="follow">Follow</a></li>

                                       <?php }  ?>

										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="{{url('/')}}/Event/{{$encrypted}}." title="" class="view-more-pro">View Event</a>
							</div><!--company_profile_info end-->
						</div>
					@endforeach
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
                     dat.firstChild.innerText='Wait..';
                    // window.open("{{url('/')}}"+"/unfollow/"+data+"/1");
                     if(fan=="Follow"){
                       loadDoc(dat);  
                     }else if(fan=="Unfollow"){
                      loadDoc2(dat);  
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
                    xhttp.open("GET", "{{url('/')}}"+"/followev/"+data, true);
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
                    xhttp.open("GET", "{{url('/')}}"+"/unfollowev/"+data, true);
                    xhttp.send();
                    }
            
      

        </script>
    @endsection
