@include('profile_propreties.features.header')
    

<body class="sign-in">
	

	<div class="wrapper">		
                              
		<div class="sign-in-page">
			<div class="signin-popup">
				<div class="signin-pop">
					<div class="row">
						<div class="col-lg-6">
							<div class="cmp-info">
								<div class="cm-logo">
									<img  src="<?php echo asset('profile_prop/images/cm-logo.png')  ?>" alt="">
									<p>Ensa Docs,  is a global GED platform where you can share document create and independent professionals connect and collaborate with your class proffesors and admins</p>
								</div><!--cm-logo end-->	
								<img  src="<?php echo asset('profile_prop/images/cm-main-img.png')  ?>"  alt="">			
							</div><!--cmp-info end-->
						</div>
						<div class="col-lg-6">
							<div class="login-sec">
								<ul class="sign-control">
									<li data-tab="tab-1" class="current" ><a href="#" title="">Sign in</a></li>				
									<li data-tab="tab-2"><a href="#" title="">Sign up</a></li>				
								</ul>			
								<div class="sign_in_sec current" id="tab-1">
									
									<h3>Sign in</h3>
									<form method="POST" action="{{ route('login') }}" >
                                        @csrf

										<div class="row">
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input  type="email" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror"  >
													<i class="la la-user"></i>
												</div><!--sn-field end-->
                                                
											</div>
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
													<i class="la la-lock"></i>
												</div>
											</div>
											<div class="col-lg-12 no-pdd">
												<div class="checky-sec">
													<div class="fgt-sec">
														<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
														<label for="remember">
															<span></span>
														</label>
														<small>Remember me</small>
													</div><!--fgt-sec end-->
													<a href="http://docs.smart-ensa.com/" title="">Back Home ?</a>
												</div>
                                                
											</div>
											<div class="col-lg-12 no-pdd">
												<button type="submit" value="submit">Sign in</button>
											</div>
										</div>
									</form>
								
								</div><!--sign_in_sec end-->
								<div class="sign_in_sec" id="tab-2">
									<div class="signup-tab">
										<i class="fa fa-long-arrow-left"></i>
										<h2>johndoe@example.com</h2>
										<ul>
											<li data-tab="tab-3" class="current"><a href="#" title="">User</a></li>
										</ul>
									</div><!--signup-tab end-->	
									<div class="dff-tab current" id="tab-3">
										<form method="POST" action="{{ route('register') }}">
                                                    @csrf

											<div class="row">
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" name="name" placeholder="Full Name"
                                                               class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
														<i class="la la-user"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
														<i class="la la-globe"></i>
													</div>
												</div>

												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
														<i class="la la-lock"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
														<i class="la la-lock"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="checky-sec st2">
														<div class="fgt-sec">
															<input type="checkbox" name="cc" id="c2">
															<label for="c2">
																<span></span>
															</label>
															<small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
														</div><!--fgt-sec end-->
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<button type="submit" value="submit">Get Started</button>
												</div>
											</div>
										</form>
									</div><!--dff-tab end-->
									
								</div>		
							</div><!--login-sec end-->
						</div>
					</div>		
				</div><!--signin-pop end-->
			</div><!--signin-popup end-->
			<div class="footy-sec">
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
					<p><img src="<?php echo asset('profile_prop/images/copy-icon.png')  ?>"  alt="">Copyright 2019</p>
				</div>
			</div><!--footy-sec end-->
		</div><!--sign-in-page end-->


	</div><!--theme-layout end-->



<script type="text/javascript"  src="<?php echo asset('profile_prop/js/jquery.min.js')  ?>"></script>
<script type="text/javascript"  src="<?php echo asset('profile_prop/js/popper.js')  ?>"></script>
<script type="text/javascript"  src="<?php echo asset('profile_prop/js/bootstrap.min.js')  ?>"></script>
<script type="text/javascript"  src="<?php echo asset('profile_prop/lib/slick/slick.min.js"')  ?>"></script>
<script type="text/javascript"  src="<?php echo asset('profile_prop/js/script.js')  ?>"></script>
<script type="text/javascript">
    'use strict'
    window.onload= function(){
         var variableRecuperee = <?php
    if(isset($variableAPasser)){
           echo json_encode($variableAPasser);
       }
             
             ?>;
  if(variableRecuperee==1){
      document.getElementsByClassName("sign-control")[0].children[1].click() ;

  }

    }

    
 </script>

</body>

</html>