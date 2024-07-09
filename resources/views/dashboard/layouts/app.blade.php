<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>{{ config('app.name') }} | @yield('title')</title>
	
	<!-- FAVICONS ICON -->
    <link rel="stylesheet" href="{{ asset('fillow/css/bootstrap.min.css') }}">
	<link rel="shortcut icon" type="image/png" href="{{ asset('themes/fillow/images/favicon.png') }}">
	<link href="{{ asset('themes/fillow/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
	<link href="{{ asset('themes/fillow/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('themes/fillow/vendor/nouislider/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('fillow/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fillow/css/dataTables.bootstrap4.min.css') }}">
	<link
            href="{{ asset('themes/fillow/vendor/datatables/css/jquery.dataTables.min.css') }}"
            rel="stylesheet"
        />
        <!-- Custom Stylesheet -->
        <link
            href="{{ asset('themes/fillow/vendor/jquery-nice-select/css/nice-select.css') }}"
            rel="stylesheet"
        />
	
	<!-- Style css -->
    <link href="{{ asset('themes/fillow/css/style.css') }}" rel="stylesheet">
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
            <a href="/dashboard" class="brand-logo">
				<svg class="logo-abbr" width="55" height="55" viewbox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z" fill="url(#paint0_linear)"></path>
					<defs>
					</defs>
				</svg>
				<div class="brand-title">
                <h2 class="">Admin</h2>
                    @if(auth()->check())
                    <span class="brand-sub-title">Halo, {{ auth()->user()->name }}</span>
                    @endif
				</div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        @include('dashboard.layouts.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        
        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('dashboard.layouts.sidemenu')
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		


		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Developed by <a href="devsign.website" target="_blank">devsign </a><script> document.write(new Date().getFullYear())</script></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('themes/fillow/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('themes/fillow/vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('themes/fillow/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('fillow/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fillow/css/dataTables.bootstrap4.min.css') }}">
	<!-- Apex Chart -->
	<script src="{{ asset('themes/fillow/vendor/apexchart/apexchart.js') }}"></script>
	
	<script src="{{ asset('themes/fillow/vendor/chart.js/Chart.bundle.min.js') }}"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('themes/fillow/vendor/peity/jquery.peity.min.js') }}"></script>
	<!-- Dashboard 1 -->
	<script src="{{ asset('themes/fillow/js/dashboard/dashboard-1.js') }}"></script>
	
	<script src="{{ asset('themes/fillow/vendor/owl-carousel/owl.carousel.js') }}"></script>
	  <!-- Datatable -->
	  <script src="{{ asset('themes/fillow/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('themes/fillow/js/plugins-init/datatables.init.js') }}"></script>

		<script src="{{ asset('fillow/js/jquery.min.js') }}"></script>
    <script src="{{ asset('fillow/js/bootstrap.bundle.min.js') }}"></script>
        <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('themes/fillow/js/custom.min.js') }}"></script>
	<script src="{{ asset('themes/fillow/js/dlabnav-init.js') }}"></script>
	<script src="{{ asset('themes/fillow/js/demo.js') }}"></script>
    <script src="{{ asset('themes/fillow/js/styleSwitcher.js') }}"></script>
	<script>
		var myInput2 = document.getElementById("dlab-password2");
		var myInput4 = document.getElementById("dlab-password2").value;
		var myInput3 = document.getElementById("dlab-password").value;
		var myInput = document.getElementById("dlab-password");

		function validate(){
			if(myInput4 === myInput3 && myInput.value.length === myInput2.value.length){
				same.classList.remove("invalid");
				same.classList.add("valid");
			}else {
				same.classList.remove("valid");
				same.classList.add("invalid");
			}
		}


		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		jQuery(document).ready(function(){
			setTimeout(function(){
				dlabSettingsOptions.version = 'dark';
				new dlabSettings(dlabSettingsOptions);
			},1500)
		});
		
	</script>
@stack('scripts')
</body>
</html>