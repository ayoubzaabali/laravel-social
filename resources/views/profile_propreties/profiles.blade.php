@extends('profile_propreties.layout')
@section('content')

		<section class="companies-info">
			<div class="container">
				<div class="company-title">
					<h3>Suggested Profiles</h3>
				</div><!--company-title end-->

        @if( count($data['users'])==0)
            <div style="margin-left:20px" class="col-lg-3 col-md-4 col-sm-6 col-12">
            <b style="font-weight:bolder !important;">no suggestions available at the moment.</b>
            </div>
            @endif


				<div class="companies-list">
					<div class="row">
                        
                        @foreach($data['users'] as $user)
                    <?php    $encrypted = Crypt::encryptString("$user->id") ;?>
                        
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
                                       @if(is_null($user->photo))
                                           <img id="myphoto" src="<?php echo asset('profile_prop/images/default.jpg')  ?>"alt="">
                                            @else
                                            <img id="myphoto"src="{{url('/').'/storage/app/'.$user->photo}}"alt="">
                                             @endif									<h3>{{$user->name}}</h3>
									<h4>E Socials</h4>
									<ul>
                                        <?php if(App\lib\Users::FollowExist(Auth::id(),$user->id)==1){?>
										<li onclick="parser(this)" data="{{$encrypted}}"><a id="ff" href="#" title="" class="follow">Unfollow</a></li>
                                         <?php }else{ ?>
                                         <li onclick="parser(this)" data="{{$encrypted}}"><a id="ff" href="#" title="" class="follow">Follow</a></li>

                                       <?php }  ?>

										<li><a  href="{{url('/soon')}}" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="{{url('/')}}/profile/{{$encrypted}}." title="" class="view-more-pro">View Profile</a>
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
    @endsection
