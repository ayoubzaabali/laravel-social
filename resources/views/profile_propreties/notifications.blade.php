@extends('profile_propreties.layout')
@section('content')

		<section class="companies-info">
			<div class="container">
							<div class="company-title" style="padding:0">
					<h3>All Notifications</h3>
				</div><!--company-title end-->
                
                
                <div class="notification-box noti" id="notification" style="display:block;width:100%;float:left;position:static">
									<div class="nt-title">
										<h4>{{count($notifs)}}</h4>
									</div>
									<div class="nott-list" >
                                                                 
                                         @foreach( $notifs as $notif)
                                       <?php   $usr_id = Crypt::encryptString("$notif->user_id") ;
                                               $ev_id = Crypt::encryptString("$notif->event_id") ;
                                                $dc_id = Crypt::encryptString("$notif->document_id") ;
                                        ?>

										<div style="cursor:pointer;  " class="notfication-details" >
							  				<div class="noty-user-img"> 
                                                @if(is_null($notif->usphoto))
  							  					<img src="<?php echo asset('profile_prop/images/default.jpg')  ?>" alt="">
                                              
                                                @else
							  					<img  src="{{url('/').'/storage/app/'.$notif->usphoto}}" alt="">
                                                @endif
							  				</div>
							  				<div  class="notification-info">

							  					<h3><a href="{{url('/').'/profile/'.$usr_id}}" title="">{{$notif->usname}}</a> Uploaded a <a href="{{url('/').'/Doc/'.$dc_id}}">document</a> on <a href="{{url('/').'/Event/'.$ev_id}}" title="">{{$notif->titre}}</a> on <a >{{$notif->date_creation}}</a>
                                                     @if($notif->new==0)
                                                    <img style="width:30px;height:30px;float:right" src="<?php echo asset('profile_prop/images/new.gif')  ?>" alt="">                                      @endif                                               
                                                
                                                </h3>
							  				</div><!--notification-info -->
						  				</div>
						  			@endforeach
						  				
						  
						  				
									</div><!--nott-list end-->
								</div><!--notification-box end-->
                
				<div class="companies-list">
					<div class="row">
                        
                    	
					</div>
				</div><!--companies-list end-->
				
			</div>
		</section><!--companies-info end-->
   
    @endsection
