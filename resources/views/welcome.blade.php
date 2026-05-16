<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>	
	
	<!-- Page Title -->
<title>{{ config('app.name', 'AlfaWeb') }}</title>

<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="DexignLab">
<meta name="robots" content="" >
<meta name="keywords" content="admin dashboard, admin template, analytics, Tailwind CSS, Tailwind CSS admin template, job board admin, job portal admin, modern, responsive admin dashboard, sales dashboard,  ui kit, web app">
<meta name="description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
<meta property="og:title" content="Jobick : Job Admin Dashboard Tailwind CSS Template">
<meta property="og:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice." >
<meta property="og:image" content="https://jobick.dexignlab.com/tailwind/social-image.png">
<meta name="format-detection" content="telephone=no">

<meta name="twitter:title" content="Jobick : Job Admin Dashboard Tailwind CSS Template">
<meta name="twitter:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
<meta name="twitter:image" content="https://jobick.dexignlab.com/tailwind/social-image.png">
<meta name="twitter:card" content="summary_large_image">


<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- FAVICONS ICON -->
<link rel="icon"  type="image/png" sizes="16x16" href="/assets/images/favicon.png">

	<!-- STYLESHEETS -->
	<link href="/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
   
	<!-- ICONS -->
<link rel="stylesheet" href="/assets/icons/fontawesome/css/all.min.css">
<link rel="stylesheet" href="/assets/icons/line-awesome/css/line-awesome.min.css"> 
<link rel="stylesheet" href="/assets/icons/flaticon/flaticon.css">
<link rel="stylesheet" href="/assets/icons/flaticon_1/flaticon_1.css">
<link rel="stylesheet" href="/assets/icons/themify-icons/css/themify-icons.css">

<!-- NICE SELECT -->
<link href="/assets/vendor/niceselect/css/nice-select.css" rel="stylesheet">
<link href="/assets/vendor/flatpickr-master/css/flatpicker.css" rel="stylesheet">

<!-- STYLE CSS -->
<link href="/assets/css/style.css" rel="stylesheet">	
	
	
</head>
<body class="selection:text-white selection:bg-primary">

    <!-- Preloader start  -->
    <div id="preloader" class="bg-card h-full fixed z-[99999] w-full items-center justify-center">
	<div class="lds-ripple inline-block relative size-20">
		<div class="absolute border-4 border-primary rounded-full"></div>
		<div class="absolute border-4 border-primary rounded-full"></div>
	</div>
</div>
    <!-- Preloader end -->

   <!-- Main wrapper start -->
    <div id="main-wrapper" class="relative">
        <!-- Nav header start -->
        <!--**********************************
	Nav header start
***********************************-->
<div class="nav-header">
	<a href="{{ route('home') }}" class="brand-logo">
		<svg class="logo-abbr" xmlns="http://www.w3.org/2000/svg" width="62.074" height="65.771" viewBox="0 0 62.074 65.771">
			<g id="search_11_" data-name="search (11)" transform="translate(12.731 12.199)">
			<rect class="rect-primary-rect" id="Rectangle_1" data-name="Rectangle 1" width="60" height="60" rx="30" transform="translate(-10.657 -12.199)" fill="var(--primary)"/>
			<path id="Path_2001" data-name="Path 2001" d="M32.7,5.18a17.687,17.687,0,0,0-25.8,24.176l-19.8,21.76a1.145,1.145,0,0,0,0,1.62,1.142,1.142,0,0,0,.81.336,1.142,1.142,0,0,0,.81-.336l19.8-21.76a17.687,17.687,0,0,0,29.357-13.29A17.57,17.57,0,0,0,32.7,5.18Zm-1.62,23.392A15.395,15.395,0,0,1,9.312,6.8,15.395,15.395,0,1,1,31.083,28.572Zm0,0" transform="translate(1 0)" fill="#fff" stroke="#fff" stroke-width="1"/>
			<path id="Path_2002" data-name="Path 2002" d="M192.859,115.547a4.523,4.523,0,0,0,.7-2.415v-2.284a4.55,4.55,0,0,0-9.1,0v2.284a4.523,4.523,0,0,0,.7,2.415,4.954,4.954,0,0,0-3.708,4.788v1.623a2.4,2.4,0,0,0,2.4,2.4h10.323a2.4,2.4,0,0,0,2.4-2.4v-1.623a4.954,4.954,0,0,0-3.708-4.788Zm-6.114-4.7a2.259,2.259,0,0,1,4.518,0v2.284a2.259,2.259,0,1,1-4.518,0Zm7.53,11.111a.11.11,0,0,1-.11.11H183.843a.11.11,0,0,1-.11-.11v-1.623a2.656,2.656,0,0,1,2.653-2.653h5.237a2.656,2.656,0,0,1,2.653,2.653Zm0,0" transform="translate(-168.591 -98.178)" fill="#fff" stroke="#fff" stroke-width="1"/>
			</g>
		</svg>



		<svg class="brand-title" xmlns="http://www.w3.org/2000/svg" width="134.01" height="48.365" viewBox="0 0 134.01 48.365">
			<g id="Group_38" data-name="Group 38" transform="translate(-133.99 -40.635)">
			<text id="Job_Admin_Dashboard" data-name="Job Admin Dashboard" transform="translate(134 85)" fill="#787878" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300"><tspan x="0" y="0">Job Admin Dashboard</tspan></text>
			<path id="Path_1948" data-name="Path 1948" d="M.36,6.616a1.661,1.661,0,0,0,1.094-.422,1.287,1.287,0,0,0,.5-1.016V-11.738H7.52L7.551,5.271A8.16,8.16,0,0,1,6.91,8.789a4.074,4.074,0,0,1-2.2,1.985,11.542,11.542,0,0,1-4.346.657ZM17.651,9.68A7.316,7.316,0,0,1,13.7,8.617a7.008,7.008,0,0,1-2.626-2.97,9.786,9.786,0,0,1-.922-4.315,9.276,9.276,0,0,1,.907-4.174,6.935,6.935,0,0,1,2.6-2.877,7.438,7.438,0,0,1,4-1.047,7.607,7.607,0,0,1,4.018,1.032,6.8,6.8,0,0,1,2.611,2.861,9.349,9.349,0,0,1,.907,4.205,9.759,9.759,0,0,1-.922,4.33,6.993,6.993,0,0,1-2.642,2.955A7.4,7.4,0,0,1,17.651,9.68Zm0-4.565a1.753,1.753,0,0,0,1.438-.954,5.2,5.2,0,0,0,.625-2.83,4.8,4.8,0,0,0-.594-2.626,1.73,1.73,0,0,0-1.47-.907,1.694,1.694,0,0,0-1.454.907,4.908,4.908,0,0,0-.578,2.626,5.309,5.309,0,0,0,.61,2.83A1.718,1.718,0,0,0,17.651,5.115Zm17.478,4.6q-2.345,0-5.972-.375L27.75,9.18V-12.238h5.44V-6.11q.25-.094.844-.3a6.64,6.64,0,0,1,1.079-.281,6.807,6.807,0,0,1,1.079-.078,5.75,5.75,0,0,1,4.737,1.939q1.579,1.939,1.579,6.285,0,4.377-1.767,6.316T35.129,9.711Zm-.594-4.878a2.3,2.3,0,0,0,1.876-.719A4.131,4.131,0,0,0,37,1.551Q37-1.92,34.754-1.92q-.719,0-1.563.063v6.6A10.43,10.43,0,0,0,34.535,4.834ZM45.134-6.36h5.44V9.274h-5.44Zm.031-6.222h5.44V-7.36h-5.44ZM59.611,9.68a5.9,5.9,0,0,1-4.909-2q-1.595-2-1.595-6.222a12.451,12.451,0,0,1,.844-5.143A4.635,4.635,0,0,1,56.3-6.125a9.87,9.87,0,0,1,3.846-.641,13.2,13.2,0,0,1,2.095.188q1.157.188,3.033.625L65.145-1.7q-2.908-.219-3.627-.219a4.459,4.459,0,0,0-1.845.3,1.565,1.565,0,0,0-.844.985,6.976,6.976,0,0,0-.219,2A7.45,7.45,0,0,0,58.845,3.5a1.625,1.625,0,0,0,.86,1.032,4.362,4.362,0,0,0,1.813.3l3.6-.219L65.27,8.9A27.641,27.641,0,0,1,59.611,9.68Zm8.473-21.918h5.44V-.325l1.032-.406L76.714-6.36H82.78L79.4,1.207,83,9.274H76.9L74.744,3.958l-1.219.406V9.274h-5.44Z" transform="translate(133.63 53.217)" fill="#464646"/>
			</g>
		</svg>

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
        <!-- Nav header end -->

		<!-- Chat box start -->
        <div class="chatbox max-sm:w-[17.5rem] w-[21.25rem] h-[100vh] bg-card z-[999] duration-500 fixed top-0 right-[-31.25rem] shadow-[0rem_0rem_1.875rem_0rem_rgba(82,63,105,0.15)]">
	<div class="chatbox-close"></div>
	<div x-data="{ tab: 'chat-tab' }">
		<ul class="nav nav-tabs flex justify-between flex-wrap bg-primary-light p-4 pb-0">
			<li class="nav-item">
				<a class="nav-link px-4 py-2 text-primary uppercase border-b-[0.1875rem] border-transparent block duration-500 font-medium text-base hover:opacity-100"
				style="opacity: 0.7;" href="javascript:void(0);" 
				@click.prevent="tab = 'notes-tab'"
				:class="{ ' opacity-100 border-b-primary': tab == 'notes-tab'}">Notes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link px-4 py-2 text-primary uppercase border-b-[0.1875rem] border-transparent block duration-500 font-medium text-base hover:opacity-100"
				style="opacity: 0.7;" href="javascript:void(0);" 
				@click.prevent="tab = 'alerts-tab'"
				:class="{ ' opacity-100 border-b-primary': tab == 'alerts-tab'}">Alerts</a>
			</li>
			<li class="nav-item">
				<a class="nav-link px-4 py-2 text-primary uppercase border-b-[0.1875rem] border-transparent block duration-500 font-medium text-base hover:opacity-100"
				style="opacity: 0.7;" href="javascript:void(0);" 
				@click.prevent="tab = 'chat-tab'"
				:class="{ ' opacity-100 border-b-primary': tab == 'chat-tab'}">Chat</a>
			</li>
		</ul>
		<div class="tab-content-area">
			<div  x-show="tab == 'chat-tab'" 
			x-transition:enter="transition-all duration-500 easy-in-out"
			x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
			x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
				<div class="card rounded-none shadow-none sm:mb-4 mb-0 contacts_card dz-chat-user-box">
					<div class="chat-list-header text-center flex justify-between py-[15px] px-5 items-center border-b border-border relative">
						<a href="javascript:void(0);" class="size-[1.875rem] bg-[#f5f5f5] dark:bg-primary-light rounded-lg flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="var(--dark)" x="4" y="11" width="16" height="2" rx="1"/><rect fill="var(--dark)" opacity="1.0" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
						<div>
							<h6 class="mb-1 text-[15px]">Chat List</h6>
							<p class="text-xs text-muted leading-[1.2]">Show All</p>
						</div>
						<a href="javascript:void(0);" class="size-[1.875rem] bg-[#f5f5f5] dark:bg-primary-light rounded-lg flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="var(--dark)" cx="5" cy="12" r="2"/><circle fill="var(--dark)" cx="12" cy="12" r="2"/><circle fill="var(--dark)" cx="19" cy="12" r="2"/></g></svg></a>
					</div>
					<div class="contacts_body style-1 p-0 dz-scroll overflow-y-scroll overflow-x-hidden relative" id="DZ_W_Contacts_Body">
						<ul class="contacts">
							<li class="py-1 px-4 bg-body sticky z-[1] top-0 font-bold text-dark border-b border-border cursor-pointer">A</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
										<span class="bg-success absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Archie Parker</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/2.jpg" class="rounded-full w-full" alt="">
										<span class="bg-danger absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Alfie Mason</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Taherah left 7 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/3.jpg" class="rounded-full w-full" alt="">
										<span class="bg-success absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">AharlieKane</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Sami is online</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/4.jpg" class="rounded-full w-full" alt="">
										<span class="bg-danger absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Athan Jacoby</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
							<li class="py-1 px-4 bg-body sticky z-[1] top-0 font-bold text-dark border-b border-border cursor-pointer">B</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/5.jpg" class="rounded-full w-full" alt="">
										<span class="bg-danger absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Bashid Samim</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Rashid left 50 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
										<span class="bg-danger absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Breddie Ronan</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/2.jpg" class="rounded-full w-full" alt="">
										<span class="bg-danger absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Ceorge Carson</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Taherah left 7 mins ago</p>
									</div>
								</div>
							</li>
							<li class="py-1 px-4 bg-body sticky z-[1] top-0 font-bold text-dark border-b border-border cursor-pointer">D</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/3.jpg" class="rounded-full w-full" alt="">
										<span class="bg-success absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Darry Parker</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Sami is online</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/4.jpg" class="rounded-full w-full" alt="">
										<span class="bg-danger absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Denry Hunter</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
							<li class="py-1 px-4 bg-body sticky z-[1] top-0 font-bold text-dark border-b border-border cursor-pointer">J</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/5.jpg" class="rounded-full w-full" alt="">
										<span class="bg-danger absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Jack Ronan</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Rashid left 50 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
										<span class="bg-success absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Jacob Tucker</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/2.jpg" class="rounded-full w-full" alt="">
										<span class="bg-danger absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">James Logan</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Taherah left 7 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/3.jpg" class="rounded-full w-full" alt="">
										<span class="bg-success absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Joshua Weston</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Sami is online</p>
									</div>
								</div>
							</li>
							<li class="py-1 px-4 bg-body sticky z-[1] top-0 font-bold text-dark border-b border-border cursor-pointer">O</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/4.jpg" class="rounded-full w-full" alt="">
										<span class="bg-danger absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Oliver Acker</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">
										<img src="/assets/images/avatar/5.jpg" class="rounded-full w-full" alt="">
										<span class="bg-danger absolute size-3 rounded-full right-[-0.0625rem] bottom-0 border-2 border-white"></span>
									</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Oscar Weston</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Rashid left 50 mins ago</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="card rounded-none shadow-none chat dz-chat-history-box hidden">
					<div class="chat-list-header text-center flex justify-between py-[15px] px-5 items-center border-b border-border relative">
						<a href="javascript:void(0);"  class="dz-chat-history-back size-[1.875rem] bg-[#f5f5f5] dark:bg-primary-light rounded-lg flex justify-center items-center">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="var(--dark)" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="var(--dark)" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
						</a>
						<div>
							<h6 class="mb-1 text-[15px]">Chat with Khelesh</h6>
							<p class="text-xs leading-[1.2] text-success">Online</p>
						</div>							
						<div class="relative" x-data="{ open: false }">
							<a @click="open = true" href="javascript:void(0);" class="size-[1.875rem] bg-[#f5f5f5] dark:bg-primary-light rounded-lg flex justify-center items-center dz-dropdown">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="var(--dark)" cx="5" cy="12" r="2"/><circle fill="var(--dark)" cx="12" cy="12" r="2"/><circle fill="var(--dark)" cx="19" cy="12" r="2"/></g>
								</svg>
							</a>
							<ul x-transition.duration.300ms x-show.transition.origin.top.right="open" x-cloak @click.away="open = false" class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] min-w-[15rem] py-2 md:right-0 mt-2.5 rounded-lg bg-card">
								<li class="dropdown-item text-left py-2 px-5 block w-full text-body-text duration-300 hover:bg-bs-dropdown-color"><i class="fa fa-user-circle text-primary ltr:mr-2 rtl:ml-2"></i> View profile</li>
								<li class="dropdown-item text-left py-2 px-5 block w-full text-body-text duration-300 hover:bg-bs-dropdown-color"><i class="fa fa-users text-primary ltr:mr-2 rtl:ml-2"></i> Add to btn-close friends</li>
								<li class="dropdown-item text-left py-2 px-5 block w-full text-body-text duration-300 hover:bg-bs-dropdown-color"><i class="fa fa-plus text-primary ltr:mr-2 rtl:ml-2"></i> Add to group</li>
								<li class="dropdown-item text-left py-2 px-5 block w-full text-body-text duration-300 hover:bg-bs-dropdown-color"><i class="fa fa-ban text-primary ltr:mr-2 rtl:ml-2"></i> Block</li>
							</ul>
						</div>
					</div>
					<div class="contacts_body p-4 dz-scroll overflow-y-scroll overflow-x-hidden relative" id="DZ_W_Contacts_Body3">
						<div class="flex justify-start mb-6">
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
								<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
							</div>
							<div class="msg_cotainer ltr:ml-2 rtl:mr-2.5 bg-primary text-white py-2.5 px-[15px] relative rounded-lg rounded-ss-none">
								Hi, how are you samim?
								<span class="text-[11px] mt-[5px] block text-white opacity-50 msg_time">8:40 AM, Today</span>
							</div>
						</div>
						<div class="flex justify-end mb-6">
							<div class="msg_cotainer_send ltr:mr-2 rtl:ml-2.5 bg-body text-dark py-2.5 px-[15px] relative rounded-lg rounded-se-none">
								Hi Khalid i am good tnx how about you?
								<span class="text-[11px] mt-[5px] block text-body-text opacity-50 ltr:text-right rtl:text-left msg_time_send">8:55 AM, Today</span>
							</div>
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
							<img src="/assets/images/avatar/2.jpg" class="rounded-full w-full" alt="">
							</div>
						</div>
						<div class="flex justify-start mb-6">
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
								<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
							</div>
							<div class="msg_cotainer ltr:ml-2 rtl:mr-2.5 bg-primary text-white py-2.5 px-[15px] relative rounded-lg rounded-ss-none">
								I am good too, thank you for your chat template
								<span class="text-[11px] mt-[5px] block text-white opacity-50 msg_time">9:00 AM, Today</span>
							</div>
						</div>
						<div class="flex justify-end mb-6">
							<div class="msg_cotainer_send ltr:mr-2 rtl:ml-2.5 bg-body text-dark py-2.5 px-[15px] relative rounded-lg rounded-se-none">
								You are welcome
								<span class="text-[11px] mt-[5px] block text-body-text opacity-50 ltr:text-right rtl:text-left msg_time_send">9:05 AM, Today</span>
							</div>
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
						<img src="/assets/images/avatar/2.jpg" class="rounded-full w-full" alt="">
							</div>
						</div>
						<div class="flex justify-start mb-6">
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
								<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
							</div>
							<div class="msg_cotainer ltr:ml-2 rtl:mr-2.5 bg-primary text-white py-2.5 px-[15px] relative rounded-lg rounded-ss-none">
								I am looking for your next templates
								<span class="text-[11px] mt-[5px] block text-white opacity-50 msg_time">9:07 AM, Today</span>
							</div>
						</div>
						<div class="flex justify-end mb-6">
							<div class="msg_cotainer_send ltr:mr-2 rtl:ml-2.5 bg-body text-dark py-2.5 px-[15px] relative rounded-lg rounded-se-none">
								Ok, thank you have a good day
								<span class="text-[11px] mt-[5px] block text-body-text opacity-50 ltr:text-right rtl:text-left msg_time_send">9:10 AM, Today</span>
							</div>
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
								<img src="/assets/images/avatar/2.jpg" class="rounded-full w-full" alt="">
							</div>
						</div>
						<div class="flex justify-start mb-6">
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
								<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
							</div>
							<div class="msg_cotainer ltr:ml-2 rtl:mr-2.5 bg-primary text-white py-2.5 px-[15px] relative rounded-lg rounded-ss-none">
								Bye, see you
								<span class="text-[11px] mt-[5px] block text-white opacity-50 msg_time">9:12 AM, Today</span>
							</div>
						</div>
						<div class="flex justify-start mb-6">
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
								<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
							</div>
							<div class="msg_cotainer ltr:ml-2 rtl:mr-2.5 bg-primary text-white py-2.5 px-[15px] relative rounded-lg rounded-ss-none">
								Hi, how are you samim?
								<span class="text-[11px] mt-[5px] block text-white opacity-50 msg_time">8:40 AM, Today</span>
							</div>
						</div>
						<div class="flex justify-end mb-6">
							<div class="msg_cotainer_send ltr:mr-2 rtl:ml-2.5 bg-body text-dark py-2.5 px-[15px] relative rounded-lg rounded-se-none">
								Hi Khalid i am good tnx how about you?
								<span class="text-[11px] mt-[5px] block text-body-text opacity-50 ltr:text-right rtl:text-left msg_time_send">8:55 AM, Today</span>
							</div>
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
						<img src="/assets/images/avatar/2.jpg" class="rounded-full w-full" alt="">
							</div>
						</div>
						<div class="flex justify-start mb-6">
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
								<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
							</div>
							<div class="msg_cotainer ltr:ml-2 rtl:mr-2.5 bg-primary text-white py-2.5 px-[15px] relative rounded-lg rounded-ss-none">
								I am good too, thank you for your chat template
								<span class="text-[11px] mt-[5px] block text-white opacity-50 msg_time">9:00 AM, Today</span>
							</div>
						</div>
						<div class="flex justify-end mb-6">
							<div class="msg_cotainer_send ltr:mr-2 rtl:ml-2.5 bg-body text-dark py-2.5 px-[15px] relative rounded-lg rounded-se-none">
								You are welcome
								<span class="text-[11px] mt-[5px] block text-body-text opacity-50 ltr:text-right rtl:text-left msg_time_send">9:05 AM, Today</span>
							</div>
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
						<img src="/assets/images/avatar/2.jpg" class="rounded-full w-full" alt="">
							</div>
						</div>
						<div class="flex justify-start mb-6">
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
								<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
							</div>
							<div class="msg_cotainer ltr:ml-2 rtl:mr-2.5 bg-primary text-white py-2.5 px-[15px] relative rounded-lg rounded-ss-none">
								I am looking for your next templates
								<span class="text-[11px] mt-[5px] block text-white opacity-50 msg_time">9:07 AM, Today</span>
							</div>
						</div>
						<div class="flex justify-end mb-6">
							<div class="msg_cotainer_send ltr:mr-2 rtl:ml-2.5 bg-body text-dark py-2.5 px-[15px] relative rounded-lg rounded-se-none">
								Ok, thank you have a good day
								<span class="text-[11px] mt-[5px] block text-body-text opacity-50 ltr:text-right rtl:text-left msg_time_send">9:10 AM, Today</span>
							</div>
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
								<img src="/assets/images/avatar/2.jpg" class="rounded-full w-full" alt="">
							</div>
						</div>
						<div class="flex justify-start mb-6">
							<div class="img_cont_msg block size-[1.875rem] text-[13px] text-center font-semibold">
								<img src="/assets/images/avatar/1.jpg" class="rounded-full w-full" alt="">
							</div>
							<div class="msg_cotainer ltr:ml-2 rtl:mr-2.5 bg-primary text-white py-2.5 px-[15px] relative rounded-lg rounded-ss-none">
								Bye, see you
								<span class="text-[11px] mt-[5px] block text-white opacity-50 msg_time">9:12 AM, Today</span>
							</div>
						</div>
					</div>
					<div class="card-footer type_msg pt-2.5 px-[1.875rem] pb-5 border-t border-border">
						<div class="input-group relative flex flex-wrap items-stretch justify-between w-full">
							<textarea class="py-2.5 h-auto min-h-auto text-[13px] outline-none resize-none flex-auto w-[1%] bg-card" placeholder="Type your message..."></textarea>
							<div class="input-group-append">
								<button type="button" class="bg-primary text-lg rounded-full h-[2.375rem] w-[2.375rem] mt-1.5 text-white text-center"><i class="fa fa-location-arrow"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div x-show="tab == 'alerts-tab'" 
			x-transition:enter="transition-all duration-500 easy-in-out"
			x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
			x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
				<div class="card rounded-none shadow-none sm:mb-4 mb-0 contacts_card">
					<div class="chat-list-header text-center flex justify-between py-[15px] px-5 items-center border-b border-border relative">
						<a href="javascript:void(0);" class="size-[1.875rem] bg-[#f5f5f5] dark:bg-primary-light rounded-lg flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="var(--dark)" cx="5" cy="12" r="2"/><circle fill="var(--dark)" cx="12" cy="12" r="2"/><circle fill="var(--dark)" cx="19" cy="12" r="2"/></g></svg></a>
						<div>
							<h6 class="mb-1 text-[15px]">Notications</h6>
							<p class="text-xs text-muted leading-[1.2]">Show All</p>
						</div>
						<a href="javascript:void(0);" class="size-[1.875rem] bg-[#f5f5f5] dark:bg-primary-light rounded-lg flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="var(--dark)" fill-rule="nonzero" opacity="1"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="var(--dark)" fill-rule="nonzero"/></g></svg></a>
					</div>
					
					<div class="contacts_body p-0 dz-scroll overflow-y-scroll overflow-x-hidden relative" id="DZ_W_Contacts_Body1">
						<ul class="contacts">
							<li class="py-1 px-4 bg-body sticky z-[1] top-0 font-bold text-dark border-b border-border cursor-pointer">SEVER STATUS</li>
							<li class="border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-primary-light text-primary rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative">KK</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">David Nester Birthday</span>
										<p class="text-[0.8125rem] text-primary leading-[1.2] max-w-[10.625rem]">Today</p>
									</div>
								</div>
							</li>
							<li class="py-1 px-4 bg-body sticky z-[1] top-0 font-bold text-dark border-b border-border cursor-pointer">SOCIAL</li>
							<li class="border-b border-[#eee] dark:border-[#333a54] py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative bg-success-light text-success">RU</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Perfection Simplified</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Jame Smith commented on your status</p>
									</div>
								</div>
							</li>
							<li class="py-1 px-4 bg-body sticky z-[1] top-0 font-bold text-dark border-b border-border cursor-pointer">SEVER STATUS</li>
							<li class="border-b border-border py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 bg-[#eee] rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative bg-primary-light text-primary">AU</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">AharlieKane</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Sami is online</p>
									</div>
								</div>
							</li>
							<li class="border-b border-border py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="img_cont flex items-center justify-center size-10 rounded-full text-[13px] text-center font-semibold self-start ltr:mr-2 rtl:ml-2.5 relative text-info bg-info-light">MO</div>
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] font-medium leading-[1.2]">Athan Jacoby</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="card-footer"></div>
				</div>
			</div>
			<div  x-show="tab == 'notes-tab'" 
			x-transition:enter="transition-all duration-500 easy-in-out"
			x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
			x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
				<div class="card rounded-none shadow-none sm:mb-4 mb-0 note_card">
					<div class="chat-list-header text-center flex justify-between py-[15px] px-5 items-center border-b border-border relative">
						<a href="javascript:void(0);" class="size-[1.875rem] bg-[#f5f5f5] dark:bg-primary-light rounded-lg flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="var(--dark)" x="4" y="11" width="16" height="2" rx="1"></rect><rect fill="var(--dark)" opacity="1.0" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"></rect></g></svg></a>
						<div>
							<h6 class="mb-1 text-[15px]">Notes</h6>
							<p class="text-xs text-muted leading-[1.2]">Add New Notes</p>
						</div>
						<a href="javascript:void(0);" class="size-[1.875rem] bg-[#f5f5f5] dark:bg-primary-light rounded-lg flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="var(--dark)" fill-rule="nonzero" opacity="1"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="var(--dark)" fill-rule="nonzero"/></g></svg></a>
					</div>
					<div class="contacts_body p-0 dz-scroll overflow-y-scroll overflow-x-hidden relative" id="DZ_W_Contacts_Body2">
						<ul class="contacts">
							<li class="border-b border-border py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] whitespace-nowrap font-medium leading-[1.2] text-ellipsis overflow-hidden">New order placed..</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">10 Aug 2020</p>
									</div>
									<div class="ml-auto">
										<a href="javascript:void(0);" class="bg-primary size-[1.625rem] p-[0.1175rem] inline-block text-center text-white text-xs rounded-lg leading-[1.9] ltr:mr-1 rtl:ml-1"><i class="fas fa-pencil-alt"></i></a>
										<a href="javascript:void(0);" class="bg-danger size-[1.625rem] p-[0.1175rem] inline-block text-center text-white text-xs rounded-lg leading-[1.9]"><i class="fa fa-trash"></i></a>
									</div>
								</div>
							</li>
							<li class="border-b border-border py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] whitespace-nowrap font-medium leading-[1.2] text-ellipsis overflow-hidden">Youtube, a video-sharing website..</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">10 Aug 2020</p>
									</div>
									<div class="ml-auto">
										<a href="javascript:void(0);" class="bg-primary size-[1.625rem] p-[0.1175rem] inline-block text-center text-white text-xs rounded-lg leading-[1.9] ltr:mr-1 rtl:ml-1"><i class="fas fa-pencil-alt"></i></a>
										<a href="javascript:void(0);" class="bg-danger size-[1.625rem] p-[0.1175rem] inline-block text-center text-white text-xs rounded-lg leading-[1.9]"><i class="fa fa-trash"></i></a>
									</div>
								</div>
							</li>
							<li class="border-b border-border py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] whitespace-nowrap font-medium leading-[1.2] text-ellipsis overflow-hidden">john just buy your product..</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">10 Aug 2020</p>
									</div>
									<div class="ml-auto">
										<a href="javascript:void(0);" class="bg-primary size-[1.625rem] p-[0.1175rem] inline-block text-center text-white text-xs rounded-lg leading-[1.9] ltr:mr-1 rtl:ml-1"><i class="fas fa-pencil-alt"></i></a>
										<a href="javascript:void(0);" class="bg-danger size-[1.625rem] p-[0.1175rem] inline-block text-center text-white text-xs rounded-lg leading-[1.9]"><i class="fa fa-trash"></i></a>
									</div>
								</div>
							</li>
							<li class="border-b border-border py-[7px] px-4 cursor-pointer hover:bg-[#f4f7ff] dark:hover:bg-[#17171E]">
								<div class="flex items-center bd-highlight">
									<div class="user_info">
										<span class="text-dark xl:text-[15px] mb-[5px] block max-w-[10.625rem] whitespace-nowrap font-medium leading-[1.2] text-ellipsis overflow-hidden">Athan Jacoby</span>
										<p class="text-[0.8125rem] text-body-text leading-[1.2] max-w-[10.625rem] text-ellipsis">10 Aug 2020</p>
									</div>
									<div class="ml-auto">
										<a href="javascript:void(0);" class="bg-primary size-[1.625rem] p-[0.1175rem] inline-block text-center text-white text-xs rounded-lg leading-[1.9] ltr:mr-1 rtl:ml-1"><i class="fas fa-pencil-alt"></i></a>
										<a href="javascript:void(0);" class="bg-danger size-[1.625rem] p-[0.1175rem] inline-block text-center text-white text-xs rounded-lg leading-[1.9]"><i class="fa fa-trash"></i></a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>   
		<!-- Chat box End -->
		
		<!-- Header start -->
		<div x-data="{ modalOpen: false }">
<!-- MODAL -->

<div class="fixed inset-0 bg-gray-500 bg-backdrop transition-opacity z-[1055] overflow-x-hidden overflow-y-auto" @keydown.escape.window="modalOpen = false" x-show="modalOpen"
x-transition:enter="transition ease-in duration-800" 
x-transition:enter-start="opacity-0" 
x-transition:enter-end="opacity-100" 
x-transition:leave="transition ease-in duration-500" 
x-transition:leave-start="opacity-100" 
x-transition:leave-end="opacity-0">
    <div class="flex items-center justify-center min-h-screen">
        <div class="lg:max-w-[800px] m-2.5 flex flex-col relative rounded-lg bg-card w-full pointer-events-auto transition-all duration-300" 
        @click.away="modalOpen = false"
        x-transition:enter="easy-out"
        x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
        x-transition:leave="easy-in"
        x-transition:leave-start="opacity-100 [transform:translate3d(0,0,0)]"
        x-transition:leave-end="opacity-0 [transform:translate3d(0,1rem,0)]">
            <div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-border">
                <h5 class="modal-title text-base">Job title</h5>
                <button type="button" class="btn-close text-body-text" @click="modalOpen = false"></button>
            </div>
            <div class="relative p-[1.875rem]">
                <div class="row">
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Company Name <span class="text-danger text-lg">*</span></label>
                        <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5" placeholder="Name">
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Position <span class="text-danger text-lg">*</span></label>
                        <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5" placeholder="Name">
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Job Category <span class="text-danger text-lg">*</span></label>
                        <select  class="nice-select style-1 py-[5px] px-5 leading-[1.813rem] h-[2.813rem] font-normal relative text-gray rounded-lg border border-body bg-body outline-none w-full">
                            <option selected>Choose...</option>
                            <option>QA Analyst</option>
                            <option>IT Manager</option>
                            <option>Systems Analyst</option>
                        </select>
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Job Type <span class="text-danger text-lg">*</span></label>
                        <select  class="nice-select style-1 py-[5px] px-5 leading-[1.813rem] h-[2.813rem] font-normal relative text-gray rounded-lg border border-body bg-body outline-none w-full">
                            <option selected>Choose...</option>
                            <option>Part-Time</option>
                            <option>Full-Time</option>
                            <option>Freelancer</option>
                        </select>
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">No. of Vancancy <span class="text-danger text-lg">*</span></label>
                        <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5" placeholder="Name">
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Select Experience <span class="text-danger text-lg">*</span></label>
                        <select  class="nice-select style-1 py-[5px] px-5 leading-[1.813rem] h-[2.813rem] font-normal relative text-gray rounded-lg border border-body bg-body outline-none w-full">
                            <option selected>1 yr</option>
                            <option>2 Yr</option>
                            <option>3 Yr</option>
                            <option>4 Yr</option>
                        </select>
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Posted Date <span class="text-danger text-lg">*</span></label>
                        <div class="relative">
                            <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5 flatpickr" placeholder="04/10/2024">
                            <i class="fa-regular fa-calendar absolute ltr:right-[15px] rtl:left-[15px] bottom-[15px] text-body-text"></i>
                        </div>
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Last Date To Apply <span class="text-danger text-lg">*</span></label>
                        <div class="relative">
                            <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5 flatpickr" placeholder="04/10/2024">
                            <i class="fa-regular fa-calendar absolute ltr:right-[15px] rtl:left-[15px] bottom-[15px] text-body-text"></i>
                        </div>
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Close Date <span class="text-danger text-lg">*</span></label>
                        <div class="relative">
                            <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5 flatpickr" placeholder="04/10/2024">
                            <i class="fa-regular fa-calendar absolute ltr:right-[15px] rtl:left-[15px] bottom-[15px] text-body-text"></i>
                        </div>
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Select Gender: <span class="text-danger text-lg">*</span></label>
                        <select  class="nice-select style-1 py-[5px] px-5 leading-[1.813rem] h-[2.813rem] font-normal relative text-gray rounded-lg border border-body bg-body outline-none w-full">
                            <option selected>Choose...</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Salary Form <span class="text-danger text-lg">*</span></label>
                        <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5" placeholder="$">
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Salary To <span class="text-danger text-lg">*</span></label>
                        <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5" placeholder="$">
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Enter City: <span class="text-danger text-lg">*</span></label>
                        <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5" placeholder="City">
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Enter State: <span class="text-danger text-lg">*</span></label>
                        <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5" placeholder="State">
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Enter Counter: <span class="text-danger text-lg">*</span></label>
                        <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5" placeholder="State">
                    </div>
                    <div class="md:w-1/2 mb-6">
                        <label  class="text-dark">Enter Education Level: <span class="text-danger text-lg">*</span></label>
                        <input type="text" class="py-[5px] px-5 h-[2.85rem] block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5" placeholder="Education Level">
                    </div>
                    <div class="w-full mb-4">
                            <label class="text-dark">Description: <span class="text-danger text-lg">*</span></label>
                            <textarea class="py-[5px] px-5 h-auto resize-y block text-dark rounded-lg border border-body bg-body outline-none w-full duration-500 focus:border-primary-5" rows="5" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer flex items-center justify-end flex-wrap py-4 px-[1.875rem] border-t border-border">
                <button type="button" class="py-[0.65rem] px-5 font-medium m-1 duration-300 xl:text-[15px] rounded-lg text-danger bg-danger-light leading-5 inline-block border border-danger-light btn-danger light hover:text-white hover:bg-danger" @click="modalOpen = false">Close</button>
                <button type="button" class="py-[0.65rem] px-5 font-medium m-1 duration-300 xl:text-[15px] rounded-lg text-white bg-primary leading-5 inline-block border border-primary hover:bg-hover-primary" @click="modalOpen = false">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="navbar-collapse justify-between">
				<div class="header-left">
					<div class="dashboard_bar max-md:hidden">
						Dashboard
					</div>
					<div class="nav-item flex items-center">
						<form action="{{ route('home') }}">
							<div class="input-group search-area input-group search-area flex flex-wrap items-stretch relative max-xl:hidden ltr:ml-28 rtl:mr-28">
								<input type="text" class="form-control py-1.5 px-5 h-[2.813rem] text-sm placeholder-ph text-ph outline-none w-[1%] flex-auto rounded-s-lg rounded-e-none" placeholder="Search">
								<span class="input-group-text min-w-[3.125rem] justify-center flex items-center text-sm py-[.4rem] px-3 leading-[1.5] text-center rounded-e-lg"><button type="submit" class="btn scale-[1.4]"><i class="flaticon-381-search-2"></i></button></span>
							</div>
						</form>
						<div class="plus-icon max-sm:hidden"  >
							<a href="javascript:void(0);" class="size-12 block rounded-lg leading-[3rem] ltr:ml-4 rtl:mr-4 text-[1.2rem] text-center duration-500" 
							@click="modalOpen = true">
							<i class="fas fa-plus"></i></a>
						</div>
					</div>
				</div>
				<ul class="navbar-nav header-right flex h-full">
					<li class="nav-item flex items-center h-full relative notification_dropdown">
						  <a class="nav-link relative leading-[1] text-lg block bell dz-theme-mode" href="javascript:void(0);">
							<i id="icon-light" class="fas fa-sun scale-[1.3]"></i>
							 <i id="icon-dark" class="fas fa-moon scale-[1.3]"></i>
									
						  </a>
					</li>
					<li class="nav-item flex items-center h-full relative ltr:sm:pl-4 ltr:pl-[.4rem] rtl:sm:pr-4 rtl:pr-[.4rem] notification_dropdown">
						<a class="nav-link relative rounded-full p-[15px] max-xxl:p-2.5 leading-[1] text-lg bell bell-link" href="javascript:void(0)">
							<svg xmlns="http://www.w3.org/2000/svg" class="size-5" width="24" height="22.871" viewBox="0 0 24 22.871">
								<g  data-name="Layer 2" transform="translate(-2 -2)">
								  <path id="Path_9" data-name="Path 9" d="M23.268,2H4.73A2.733,2.733,0,0,0,2,4.73V17.471A2.733,2.733,0,0,0,4.73,20.2a.911.911,0,0,1,.91.91v1.94a1.82,1.82,0,0,0,2.83,1.514l6.317-4.212a.9.9,0,0,1,.5-.153h4.436a2.742,2.742,0,0,0,2.633-2L25.9,5.462A2.735,2.735,0,0,0,23.268,2Zm.879,2.978-3.539,12.74a.915.915,0,0,1-.88.663H15.292a2.718,2.718,0,0,0-1.514.459L7.46,23.051v-1.94a2.733,2.733,0,0,0-2.73-2.73.911.911,0,0,1-.91-.91V4.73a.911.911,0,0,1,.91-.91H23.268a.914.914,0,0,1,.879,1.158Z" transform="translate(0 0)"/>
								  <path id="Path_10" data-name="Path 10" d="M7.91,10.82h4.55a.91.91,0,1,0,0-1.82H7.91a.91.91,0,1,0,0,1.82Z" transform="translate(-0.45 -0.63)"/>
								  <path id="Path_11" data-name="Path 11" d="M16.1,13H7.91a.91.91,0,1,0,0,1.82H16.1a.91.91,0,1,0,0-1.82Z" transform="translate(-0.45 -0.99)"/>
								</g>
							  </svg>
							<span class="badge rounded-full absolute text-[0.7rem] ltr:right-0 rtl:left-0 shadow-[0_0_5px_0_rgba(0,0,0,0.1)] top-0 size-[1.3rem] leading-[1.3rem] text-center ">78</span>
						</a>
					</li>
					<li class="nav-item flex items-center h-full relative ltr:sm:pl-4 ltr:pl-[.4rem] rtl:sm:pr-4 rtl:pr-[.4rem] notification_dropdown" x-data="{ open: false }">
						<a @click="open = true" class="nav-link relative rounded-full p-[15px] max-xxl:p-2.5 leading-[1] text-lg ai-icon" href="javascript:void(0)">
							<svg xmlns="http://www.w3.org/2000/svg" class="size-5" width="24" height="24" viewBox="0 0 24 24">
								<g  data-name="Layer 2" transform="translate(-2 -2)">
								  <path id="Path_20" data-name="Path 20" d="M22.571,15.8V13.066a8.5,8.5,0,0,0-7.714-8.455V2.857a.857.857,0,0,0-1.714,0V4.611a8.5,8.5,0,0,0-7.714,8.455V15.8A4.293,4.293,0,0,0,2,20a2.574,2.574,0,0,0,2.571,2.571H9.8a4.286,4.286,0,0,0,8.4,0h5.23A2.574,2.574,0,0,0,26,20,4.293,4.293,0,0,0,22.571,15.8ZM7.143,13.066a6.789,6.789,0,0,1,6.78-6.78h.154a6.789,6.789,0,0,1,6.78,6.78v2.649H7.143ZM14,24.286a2.567,2.567,0,0,1-2.413-1.714h4.827A2.567,2.567,0,0,1,14,24.286Zm9.429-3.429H4.571A.858.858,0,0,1,3.714,20a2.574,2.574,0,0,1,2.571-2.571H21.714A2.574,2.574,0,0,1,24.286,20a.858.858,0,0,1-.857.857Z"/>
								</g>
							  </svg>
							<span class="badge rounded-full absolute text-[0.7rem] ltr:right-0 rtl:left-0 shadow-[0_0_5px_0_rgba(0,0,0,0.1)] top-0 size-[1.3rem] leading-[1.3rem] text-center ">4</span>
						</a>
						<div class="absolute z-[9] shadow-[0_0_37px_rgba(8,21,66,0.05)] min-w-[310px] pb-4 mt-0.5 top-full sm:right-0 max-sm:right-full max-sm:translate-x-[20%] rounded-lg bg-card" x-transition.duration.100ms x-show.transition.origin.top.right="open" x-cloak @click.away="open = false">
							<div id="DzNotificationDropdown" class="widget-media dz-scroll overflow-y-scroll overflow-x-hidden relative p-4" style="height:380px;">
								<ul class="timeline">
									<li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2">
												<img alt="image" width="50" src="/assets/images/avatar/1.jpg">
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Dr sultads Send you Photo</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2 text-info bg-info-light">
												KG
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Resport created successfully</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2 text-success bg-success-light">
												<i class="fa fa-home"></i>
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Reminder : Treatment Time!</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									 <li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2">
												<img alt="image" width="50" src="/assets/images/avatar/1.jpg">
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Dr sultads Send you Photo</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2 text-danger bg-danger-light">
												KG
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Resport created successfully</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2 text-primary bg-primary-light">
												<i class="fa fa-home"></i>
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Reminder : Treatment Time!</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2">
												<img alt="image" width="50" src="/assets/images/avatar/1.jpg">
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Dr sultads Send you Photo</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2 text-info bg-info-light">
												KG
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Resport created successfully</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2 text-success bg-success-light">
												<i class="fa fa-home"></i>
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Reminder : Treatment Time!</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									 <li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2">
												<img alt="image" width="50" src="/assets/images/avatar/1.jpg">
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Dr sultads Send you Photo</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel flex items-center pb-[15px] mb-[15px] border-b border-border">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2 text-danger bg-danger-light">
												KG
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Resport created successfully</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel flex items-center">
											<div class="media flex items-center justify-center size-[45px] rounded-xl text-lg text-center overflow-hidden font-bold ltr:mr-2 rtl:ml-2 text-primary bg-primary-light">
												<i class="fa fa-home"></i>
											</div>
											<div class="flex-1">
												<h6 class="mb-1">Reminder : Treatment Time!</h6>
												<small class="block text-body-text">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<a class="dropdown-item pt-[15px] px-[30px] text-center block border-t border-border text-primary" href="javascript:void(0)">See all notifications <i class="ti-arrow-right ltr:ml-2 rtl:mr-2.5 font-black"></i></a>
						</div>
					</li>
					<li class="nav-item flex items-center h-full relative ltr:sm:pl-4 ltr:pl-[.4rem] rtl:sm:pr-4 rtl:pr-[.4rem] notification_dropdown" x-data="{ open: false }">
						<a @click="open = true" class="nav-link relative rounded-full p-[15px] max-xxl:p-2.5 leading-[1] text-lg ai-icon" href="javascript:void(0)">
							<svg xmlns="http://www.w3.org/2000/svg" class="size-5" width="23.262" height="24" viewBox="0 0 23.262 24">
								<g id="icon" transform="translate(-1565 90)">
								  <path id="setting_1_" data-name="setting (1)" d="M30.45,13.908l-1-.822a1.406,1.406,0,0,1,0-2.171l1-.822a1.869,1.869,0,0,0,.432-2.385L28.911,4.293a1.869,1.869,0,0,0-2.282-.818l-1.211.454a1.406,1.406,0,0,1-1.88-1.086l-.213-1.276A1.869,1.869,0,0,0,21.475,0H17.533a1.869,1.869,0,0,0-1.849,1.567L15.47,2.842a1.406,1.406,0,0,1-1.88,1.086l-1.211-.454a1.869,1.869,0,0,0-2.282.818L8.126,7.707a1.869,1.869,0,0,0,.432,2.385l1,.822a1.406,1.406,0,0,1,0,2.171l-1,.822a1.869,1.869,0,0,0-.432,2.385L10.1,19.707a1.869,1.869,0,0,0,2.282.818l1.211-.454a1.406,1.406,0,0,1,1.88,1.086l.213,1.276A1.869,1.869,0,0,0,17.533,24h3.943a1.869,1.869,0,0,0,1.849-1.567l.213-1.276a1.406,1.406,0,0,1,1.88-1.086l1.211.454a1.869,1.869,0,0,0,2.282-.818l1.972-3.415a1.869,1.869,0,0,0-.432-2.385ZM27.287,18.77l-1.211-.454a3.281,3.281,0,0,0-4.388,2.533l-.213,1.276H17.533l-.213-1.276a3.281,3.281,0,0,0-4.388-2.533l-1.211.454L9.75,15.355l1-.822a3.281,3.281,0,0,0,0-5.067l-1-.822L11.721,5.23l1.211.454A3.281,3.281,0,0,0,17.32,3.151l.213-1.276h3.943l.213,1.276a3.281,3.281,0,0,0,4.388,2.533l1.211-.454,1.972,3.414h0l-1,.822a3.281,3.281,0,0,0,0,5.067l1,.822ZM19.5,7.375A4.625,4.625,0,1,0,24.129,12,4.63,4.63,0,0,0,19.5,7.375Zm0,7.375A2.75,2.75,0,1,1,22.254,12,2.753,2.753,0,0,1,19.5,14.75Z" transform="translate(1557.127 -90)"/>
								</g>
							  </svg>
							  <span class="badge rounded-full absolute text-[0.7rem] ltr:right-0 rtl:left-0 shadow-[0_0_5px_0_rgba(0,0,0,0.1)] top-0 size-[1.3rem] leading-[1.3rem] text-center ">15</span>
						</a>
						<div class="absolute z-[9] shadow-[0_0_37px_rgba(8,21,66,0.05)] min-w-[310px] pb-4 mt-0.5 top-full sm:right-0 max-sm:right-full max-sm:translate-x-[30%] rounded-lg bg-card" x-transition.duration.100ms x-show.transition.origin.top.right="open" x-cloak @click.away="open = false">
							<div id="DZ_W_TimeLine02" class="widget-timeline dz-scroll style-1 overflow-y-scroll overflow-x-hidden h-[23.125rem] p-4 relative">
								<ul class="timeline relative">
									<li class="relative mb-[15px]">
										<div class="timeline-badge rounded-[50%] h-[1.275rem] absolute top-[0.625rem] w-[1.275rem] bg-white border-[0.125rem] border-primary-light p-1 primary"></div>
										<a class="timeline-panel text-muted" href="javascript:void(0);">
											<span class="text-xs block mb-[5px] opacity-80 tracking-[0.0625rem]">10 minutes ago</span>
											<h6 class="text-[13px]">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
										</a>
									</li>
									<li class="relative mb-[15px]">
										<div class="timeline-badge rounded-[50%] h-[1.275rem] absolute top-[0.625rem] w-[1.275rem] bg-white border-[0.125rem] border-primary-light p-1 info">
										</div>
										<a class="timeline-panel text-muted" href="javascript:void(0);">
											<span class="text-xs block mb-[5px] opacity-80 tracking-[0.0625rem]">20 minutes ago</span>
											<h6 class="text-[13px]">New order placed <strong class="text-info">#XF-2356.</strong></h6>
											<p class="text-xs leading-[1.125rem]">Quisque a consequat ante Sit amet magna at volutapt...</p>
										</a>
									</li>
									<li class="relative mb-[15px]">
										<div class="timeline-badge rounded-[50%] h-[1.275rem] absolute top-[0.625rem] w-[1.275rem] bg-white border-[0.125rem] border-primary-light p-1 danger">
										</div>
										<a class="timeline-panel text-muted" href="javascript:void(0);">
											<span class="text-xs block mb-[5px] opacity-80 tracking-[0.0625rem]">30 minutes ago</span>
											<h6 class="text-[13px]">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
										</a>
									</li>
									<li class="relative mb-[15px]">
										<div class="timeline-badge rounded-[50%] h-[1.275rem] absolute top-[0.625rem] w-[1.275rem] bg-white border-[0.125rem] border-primary-light p-1 success">
										</div>
										<a class="timeline-panel text-muted" href="javascript:void(0);">
											<span class="text-xs block mb-[5px] opacity-80 tracking-[0.0625rem]">15 minutes ago</span>
											<h6 class="text-[13px]">StumbleUpon is acquired by eBay. </h6>
										</a>
									</li>
									<li class="relative mb-[15px]">
										<div class="timeline-badge rounded-[50%] h-[1.275rem] absolute top-[0.625rem] w-[1.275rem] bg-white border-[0.125rem] border-primary-light p-1 warning">
										</div>
										<a class="timeline-panel text-muted" href="javascript:void(0);">
											<span class="text-xs block mb-[5px] opacity-80 tracking-[0.0625rem]">20 minutes ago</span>
											<h6 class="text-[13px]">Mashable, a news website and blog, goes live. </h6>
										</a>
									</li>
									<li class="relative mb-[15px]">
										<div class="timeline-badge rounded-[50%] h-[1.275rem] absolute top-[0.625rem] w-[1.275rem] bg-white border-[0.125rem] border-primary-light p-1 dark">
										</div>
										<a class="timeline-panel text-muted" href="javascript:void(0);">
											<span class="text-xs block mb-[5px] opacity-80 tracking-[0.0625rem]">20 minutes ago</span>
											<h6 class="text-[13px]">Mashable, a news website and blog, goes live.</h6>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
					@guest
					<li class="nav-item flex items-center h-full relative ltr:sm:pl-4 ltr:pl-[.4rem] rtl:sm:pr-4 rtl:pr-[.4rem]">
						<a href="{{ route('login') }}" class="py-3 px-5 rounded-lg bg-primary text-white font-medium duration-300 hover:bg-hover-primary">Login</a>
					</li>
					@endguest
					@auth
					<li class="nav-item flex items-center h-full relative ltr:sm:pl-4 ltr:pl-[.4rem] rtl:sm:pr-4 rtl:pr-[.4rem] header-profile"  x-data="{ open: false }">
						<a @click="open = true" class="nav-link flex items-center ltr:2xxl:ml-4 rtl:2xxl:mr-4" href="javascript:void(0)">
							<img src="/assets/images/profile/pic1.jpg" class="rounded-lg size-12 max-md:size-10" width="20" alt="">
						</a>
						<div class="absolute z-[9] shadow-[0_0_37px_rgba(8,21,66,0.05)] min-w-[12.5rem] py-[15px] mt-0.5 top-full ltr:right-0 rtl:left-0 rounded-lg bg-card" x-transition.duration.100ms x-show.transition.origin.top.right="open" x-cloak  @click.away="open = false">
							<a href="{{ route('dashboard') }}" class="dropdown-item block text-left w-full py-2 px-6 text-body-text duration-300 hover:bg-bs-dropdown-color hover:text-primary">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
								<span class="ltr:ml-2 rtl:mr-2">Dashboard </span>
							</a>
							<a href="email-inbox.html" class="dropdown-item block text-left w-full py-2 px-6 text-body-text duration-300 hover:bg-bs-dropdown-color hover:text-primary">
								<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
								<span class="ltr:ml-2 rtl:mr-2">Inbox </span>
							</a>
							<form method="POST" action="{{ route('logout') }}">
								@csrf
							<button type="submit" class="dropdown-item block text-left w-full py-2 px-6 text-body-text duration-300 hover:bg-bs-dropdown-color hover:text-primary">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
								<span class="ltr:ml-2 rtl:mr-2">Logout </span>
							</button>
							</form>
						</div>
					</li>
					@endauth
				</ul>
			</div>
		</nav>
	</div>
</div>
</div>
        <!-- Header end -->

        <!-- Sidebar start -->
		<div class="dlabnav">
	<div class="dlabnav-scroll">
		<div class="dropdown header-profile2" x-data="{ open: false }">
			<a class="nav-link " href="javascript:void(0);"  @click="open = true">
				<div class="header-info2 flex items-center">
					<img src="/assets/images/profile/pic1.jpg" alt="" class="size-[2.8rem] rounded-lg ltr:mr-[.8rem] rtl:ml-[.8rem]">
					<div class="flex items-center sidebar-info flex-1">
						<div>
							<span class="block font-medium text-[15px]">{{ auth()->user()->name ?? 'Guest User' }}</span>
							<small class="text-xs">{{ auth()->check() ? 'Member' : 'Belum login' }}</small>
						</div>	
						<i class="fas fa-chevron-down ltr:ml-auto rtl:mr-auto"></i>
					</div>
					
				</div>
			</a>
			
			<div class="absolute z-[9] shadow-[0_0_37px_rgba(8,21,66,0.05)] min-w-[15rem] py-[15px] mt-0.5 ltr:ml-3 rtl:mr-3 rounded-lg bg-card" x-transition.duration.100ms x-show.transition.origin.top.right="open" x-cloak  @click.away="open = false">
				<a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="dropdown-item block text-left w-full py-2 px-6 text-body-text duration-300 hover:bg-bs-dropdown-color hover:text-primary">
					<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
					<span class="ltr:ml-2 rtl:mr-2">{{ auth()->check() ? 'Dashboard' : 'Login' }} </span>
				</a>
				<a href="email-inbox.html" class="dropdown-item block text-left w-full py-2 px-6 text-body-text duration-300 hover:bg-bs-dropdown-color hover:text-primary">
					<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
					<span class="ltr:ml-2 rtl:mr-2">Inbox </span>
				</a>
				@auth
				<form method="POST" action="{{ route('logout') }}">
					@csrf
				<button type="submit" class="dropdown-item block text-left w-full py-2 px-6 text-body-text duration-300 hover:bg-bs-dropdown-color hover:text-primary">
					<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
					<span class="ltr:ml-2 rtl:mr-2">Logout </span>
				</button>
				</form>
				@endauth
			</div>
		</div>
		<ul class="metismenu" id="menu">
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="flaticon-025-dashboard"></i>
					<span class="nav-text">Dashboard</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('dashboard') }}">Dashboard Web</a></li>
					<li><a href="{{ route('home') }}">Dashboard Template</a></li>
					<li><a href="jobs-page.html">Jobs</a></li>
					<li><a href="application-page.html">Application</a></li>
					<li><a href="my-profile.html">Profile</a></li>
					<li><a href="statistics-page.html">Statistics</a></li>
					<li><a href="compaines.html">Companies</a></li>	
				</ul>

			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="flaticon-093-waving"></i>
					<span class="nav-text">Jobs</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="job-list.html">Job Lists</a></li>
					<li><a href="job-view.html">Job View</a></li>
					<li><a href="job-application.html">Job Application</a></li>
					<li><a href="apply-job.html">Apply Job</a></li>
					<li><a href="new-job.html">New Job</a></li>
					<li><a href="user-profile.html">User Profile</a></li>
				</ul>
			</li>
			<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
				<i class="fa-solid fa-gear"></i>
			
				
				<span class="nav-text">CMS</span>
			</a>
			<ul aria-expanded="false">
				<li><a href="content.html">Content</a></li>
				<li><a href="content-add.html">Add Content</a></li>
				<li><a href="menu.html">Menus</a></li>	
				<li><a href="email-template.html">Email Template</a></li>		
				<li><a href="add-email.html">Add Email</a></li>		
				<li><a href="blog.html">Blog</a></li>	
				<li><a href="add-blog.html">Add Blog</a></li>	
				<li><a href="blog-category.html">Blog Category</a></li>	
			</ul>
			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
				<i class="flaticon-050-info"></i>
					<span class="nav-text">Apps</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="app-profile.html">Profile</a></li>
					 <li><a href="edit-profile.html">Edit Profile </a></li>
					<li><a href="post-details.html">Post Details</a></li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
						<ul aria-expanded="false">
							<li><a href="email-compose.html">Compose</a></li>
							<li><a href="email-inbox.html">Inbox</a></li>
							<li><a href="email-read.html">Read</a></li>
						</ul>
					</li>
					<li><a href="app-calender.html">Calendar</a></li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
						<ul aria-expanded="false">
							<li><a href="ecom-product-grid.html">Product Grid</a></li>
							<li><a href="ecom-product-list.html">Product List</a></li>
							<li><a href="ecom-product-detail.html">Product Details</a></li>
							<li><a href="ecom-product-order.html">Order</a></li>
							<li><a href="ecom-checkout.html">Checkout</a></li>
							<li><a href="ecom-invoice.html">Invoice</a></li>
							<li><a href="ecom-customers.html">Customers</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="flaticon-041-graph"></i>
					<span class="nav-text">Charts</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="chart-flot.html">Flot</a></li>
					<li><a href="chart-morris.html">Morris</a></li>
					<li><a href="chart-chartjs.html">Chartjs</a></li>
					<li><a href="chart-chartist.html">Chartist</a></li>
					<li><a href="chart-sparkline.html">Sparkline</a></li>
					<li><a href="chart-peity.html">Peity</a></li>
				</ul>
			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="flaticon-086-star"></i>
					<span class="nav-text">Ui Element</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="ui-accordion.html">Accordion</a></li>
					<li><a href="ui-alert.html">Alert</a></li>
					<li><a href="ui-badge.html">Badge</a></li>
					<li><a href="ui-button.html">Button</a></li>
					<li><a href="ui-modal.html">Modal</a></li>
					<li><a href="ui-button-group.html">Button Group</a></li>
					<li><a href="ui-list-group.html">List Group</a></li>
					<li><a href="ui-card.html">Cards</a></li>
					<li><a href="ui-carousel.html">Carousel</a></li>
					<li><a href="ui-dropdown.html">Dropdown</a></li>
					<li><a href="ui-popover.html">Popover</a></li>
					<li><a href="ui-progressbar.html">Progressbar</a></li>
					<li><a href="ui-tab.html">Tab</a></li>
					<li><a href="ui-typography.html">Typography</a></li>
					<li><a href="ui-pagination.html">Pagination</a></li>
					<li><a href="ui-grid.html">Grid</a></li>

				</ul>
			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="flaticon-045-heart"></i>
					<span class="nav-text">Plugins</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="uc-select2.html">Select 2</a></li>
					<li><a href="uc-nestable.html">Nestedable</a></li>
					<li><a href="uc-noui-slider.html">Noui Slider</a></li>
					<li><a href="uc-sweetalert.html">Sweet Alert</a></li>
					<li><a href="uc-toastr.html">Toastr</a></li>
					<li><a href="map-jqvmap.html">Jqv Map</a></li>
					<li><a href="uc-lightgallery.html">Light Gallery</a></li>
				</ul>
			</li>
			<li><a href="widget-basic.html" class="" aria-expanded="false">
					<i class="flaticon-013-checkmark"></i>
					<span class="nav-text">Widget</span>
				</a>
			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="flaticon-072-printer"></i>
					<span class="nav-text">Forms</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="form-element.html">Form Elements</a></li>
					<li><a href="form-wizard.html">Wizard</a></li>
					<li><a href="form-ckeditor.html">CkEditor</a></li>
					<li><a href="form-pickers.html">Pickers</a></li>
					<li><a href="form-validation.html">Form Validate</a></li>
				</ul>
			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="flaticon-043-menu"></i>
					<span class="nav-text">Table</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="table.html">Table</a></li>
					<li><a href="table-datatable-basic.html">Datatable</a></li>
				</ul>
			</li>
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="flaticon-022-copy"></i>
					<span class="nav-text">Pages</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="page-register.html">Register</a></li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
						<ul aria-expanded="false">
							<li><a href="page-error-400.html">Error 400</a></li>
							<li><a href="page-error-403.html">Error 403</a></li>
							<li><a href="page-error-404.html">Error 404</a></li>
							<li><a href="page-error-500.html">Error 500</a></li>
							<li><a href="page-error-503.html">Error 503</a></li>
						</ul>
					</li>
					<li><a href="page-lock-screen.html">Lock Screen</a></li>
					<li><a href="empty-page.html">Empty Page</a></li>
				</ul>
			</li>
		</ul>
		<div class="plus-box p-4 overflow-hidden mx-4 rounded-lg items-center mt-8 relative">
			<p class="text-sm font-semibold text-white mb-2">Let Jobick Managed<br>Your Resume Easily<br></p>
			<p class="plus-box-p text-[#ffffff80] text-xs">Lorem ipsum dolor sit amet</p>
		</div>
		<div class="copyright">
			<p><strong>Jobick Job Admin</strong> © 2024 All Rights Reserved</p>
			<p class="text-xs">Made with <span class="heart"></span> by DexignLab</p>
		</div>
	</div>
</div>	
        <!-- Sidebar end -->
		
		<!-- Content body start -->
		<div class="content-body default-height">
			<!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="xl:w-1/2">
						<div class="row">
							<div class="w-full">
								<div class="card">
									<div class="sm:p-[1.875rem] p-4 flex-auto">
										<div class="row separate-row">
											<div class="sm:w-1/2 border-b ltr:border-r rtl:border-l border-border">
												<div class="job-icon pb-6 flex justify-between">
													<div>
														<div class="flex items-center mb-1">
															<h2 class="leading-[1]">342</h2>
															<span class="ltr:ml-4 rtl:mr-4 py-[0.2rem] px-2 min-w-[23px] min-h-[23px] text-xs leading-[1.5] rounded-lg font-semibold text-success bg-success-light">+0.5%</span>
														</div>	
														<span class="block mb-2 text-sm text-body-text">Interview Schedules</span>
													</div>	
													<div id="NewCustomers"></div>
												</div>
											</div>
											<div class="sm:w-1/2 border-b border-border">
												<div class="job-icon pb-6 pt-6 sm:pt-0 flex justify-between">
													<div>
														<div class="flex items-center mb-1">
															<h2 class="leading-[1]">984</h2>
														</div>	
														<span class="block mb-2 text-sm text-body-text">Application Sent</span>
													</div>	
													<div id="NewCustomers1"></div>
												</div>
											</div>
											<div class="sm:w-1/2 ltr:border-r rtl:border-l border-border">
												<div class="job-icon pt-6 sm:pb-0 pb-6 flex justify-between">
													<div>
														<div class="flex items-center mb-1">
															<h2 class="leading-[1]">1,567k</h2>
															<span class="ltr:ml-4 rtl:mr-4 py-[0.2rem] px-2 min-w-[23px] min-h-[23px] text-xs leading-[1.5] rounded-lg font-semibold text-danger bg-danger-light">-2.0%</span>
														</div>	
														<span class="block mb-2 text-sm text-body-text">Profile Viewed</span>
													</div>	
													<div id="NewCustomers2"></div>
												</div>
											</div>
											<div class="sm:w-1/2">
												<div class="job-icon pt-6  flex justify-between">
													<div>
														<div class="flex items-center mb-1">
															<h2 class="leading-[1]">437</h2>
														</div>	
														<span class="block mb-2 text-sm text-body-text">Unread Messages</span>
													</div>	
													<div id="NewCustomers3"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="w-full">
								<div class="card"  x-data="{ tab: 'Daily' }" id="user-activity">
									<div class="relative flex justify-between items-center sm:pt-6 pt-5 sm:px-[1.875rem] px-4 flex-wrap">
										<h3 class="text-xl capitalize mb-0">Vacancy Stats</h3>
										<div class="mt-4 sm:mt-0">
											<ul class="nav nav-tabs vacany-tabs flex flex-wrap items-center p-1 rounded-lg text-gray bg-body" role="tablist">
												<li class="nav-item">
													<a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Daily'" 
													:class="{'bg-primary text-white' : tab == 'Daily'}"
													data-series="Daily" href="javascript:void(0);">Daily</a>
												</li>
												<li class="nav-item">
													<a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Weekly'" 
													:class="{'bg-primary text-white' : tab == 'Weekly'}"
													data-series="Weekly" href="javascript:void(0);" >Weekly</a>
												</li>
												<li class="nav-item">
													<a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Monthly'" 
													:class="{'bg-primary text-white' : tab == 'Monthly'}"
													data-series="Monthly" href="javascript:void(0);" >Monthly</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="pt-4 sm:px-4 px-0 pb-1">
										<div class="sm:pb-6 mb-4 flex flex-wrap px-4">
											<div class="flex items-center">
												<svg class="ltr:mr-2 rtl:ml-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
												  <rect  width="13" height="13" rx="6.5" fill="#35c556"/>
												</svg>
												<span class="text-dark text-[13px] font-medium">Application Sent</span>	
											</div>
											<div class="ltr:sm:ml-8 rtl:sm:mr-8 ltr:ml-[.8rem] rtl:mr-[.8rem] flex items-center">
												<svg class="ltr:mr-1 rtl:ml-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
												  <rect  width="13" height="13" rx="6.5" fill="#3f4cfe"/>
												</svg>
												<span class="text-dark text-[13px] font-medium">Interviews</span>
											</div>
											<div class="ltr:sm:ml-8 rtl:sm:mr-8 ltr:ml-[.8rem] rtl:mr-[.8rem] flex items-center">
												<svg class="ltr:mr-1 rtl:ml-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
												  <rect  width="13" height="13" rx="6.5" fill="#f34040"/>
												</svg>
												<span class="text-dark text-[13px] font-medium">Rejected</span>
											</div>
										</div>
										<div class="">
											<div id="vacancyChart" class="ltr"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="w-full">
								<div class="card"  x-data="{ tab: 'Daily' }" id="user-activity1">
    <div class="relative flex justify-between items-center sm:pt-6 pt-5 sm:px-[1.875rem] px-4 flex-wrap">
        <h4 class="text-xl capitalize mb-0">Chart</h4>
        <ul class="nav nav-tabs chart-tab flex flex-wrap items-center p-1 rounded-lg text-gray bg-body" role="tablist">
            <li class="nav-item">
                <a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Daily'" 
                :class="{'bg-primary text-white' : tab == 'Daily'}"
                data-series="Daily" href="javascript:void(0);">Daily</a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Weekly'" 
                :class="{'bg-primary text-white' : tab == 'Weekly'}"
                data-series="Weekly" href="javascript:void(0);" >Weekly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-2 px-[1.125rem] block rounded-lg duration-500" @click.prevent="tab = 'Monthly'" 
                :class="{'bg-primary text-white' : tab == 'Monthly'}"
                data-series="Monthly" href="javascript:void(0);" >Monthly</a>
            </li>
        </ul>
    </div>
    <div class="sm:p-[1.875rem] p-4 flex-auto sm:pl-4 pl-0 pb-2">
        <div class="sm:flex block mb-4 mx-4">
            <div class="flex items-center ltr:mr-12 rtl:ml-12 sm:mb-0 mb-2">
                <svg class="ltr:mr-2 rtl:ml-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                    <rect  width="13" height="13" fill="var(--primary)"/>
                </svg>
                <label class="mb-0 ltr:mr-6 rtl:ml-6 text-dark">Delivered</label>
                <h6 class="mb-0 ltr:mr-1 rtl:ml-1">239</h6>
                <span class="text-success text-[13px] font-medium">+0.4%</span>
            </div>
            <div class="flex items-center">
                <svg class="ltr:mr-2 rtl:ml-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                    <rect  width="13" height="13" fill="#6e6e6e"/>
                  </svg>
                <label class="mb-0 ltr:mr-6 rtl:ml-6 text-dark">Expense</label>
                <h6 class="mb-0 ltr:mr-1 rtl:ml-1">$8,345</h6>
            </div>
        </div>
        <div>
            <div id="activity1" class="ltr"></div>
        </div>
    </div>
</div>
							</div>
							<div class="w-full">
								<div class="card">
    <div class="relative sm:flex block justify-between items-center sm:py-6 py-5 sm:px-[1.875rem] px-4 flex-wrap">
        <h4 class="text-xl capitalize mb-1">Featured Companies</h4>
        <div class="relative cursor-pointer inline-block" x-data="{ open: false }">
            <a href="javascript:void(0);" class="btn-link"  @click="open = true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
            <div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 mt-2 top-full ltr:right-0 rtl:left-0 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
                <a class="dropdown-item block text-left w-full py-2 px-6 text-[#828690] duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);">Delete</a>
                <a class="dropdown-item block text-left w-full py-2 px-6 text-[#828690] duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);">Edit</a>
            </div>
        </div>
    </div>
    <div class="sm:p-[1.875rem] p-4 flex-auto sm:pt-0 pt-0 loadmore-content relative overflow-y-scroll dlab-scroll h-[23.125rem]" id="scroll-y">
        <div class="row list-grid-area" id="FeaturedCompaniesContent">
            <div class="sm:w-1/2">
                <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                    <div class="size-14">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                            <g  transform="translate(-457 -443)">
                                <rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
                                <g  transform="translate(457 443)">
                                <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#2769ee"/>
                                <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
                                <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 featured">
                        <h5 class="mb-1">Kleon Team</h5>
                        <span class="text-body-text">Desgin Team Agency</span>
                    </div>
                </div>
            </div>
            <div class="sm:w-1/2">
                <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                    <div class="size-14">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                            <g  transform="translate(-457 -443)">
                                <rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
                                <g  transform="translate(457 443)">
                                <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#7630d2"/>
                                <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
                                <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 featured">
                        <h5 class="mb-1">Ziro Studios Inc.</h5>
                        <span class="text-body-text">Desgin Team Agency</span>
                    </div>
                </div>
            </div>
            <div class="sm:w-1/2">
                <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                    <div class="size-14">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                            <g  transform="translate(-457 -443)">
                                <rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
                                <g  transform="translate(457 443)">
                                <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#b848ef"/>
                                <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
                                <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 featured">
                        <h5 class="mb-1">Qerza</h5>
                        <span class="text-body-text">Desgin Team Agency</span>
                    </div>
                </div>
            </div>
            <div class="sm:w-1/2">
                <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                    <div class="size-14">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                            <g  transform="translate(-457 -443)">
                                <rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
                                <g  transform="translate(457 443)">
                                <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#7e1d74"/>
                                <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
                                <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 featured">
                        <h5 class="mb-1">Kripton Studios</h5>
                        <span class="text-body-text">Desgin Team Agency</span>
                    </div>
                </div>
            </div>
            <div class="sm:w-1/2">
                <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                    <div class="size-14">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                            <g  transform="translate(-457 -443)">
                                <rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
                                <g  transform="translate(457 443)">
                                <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#0411c2"/>
                                <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
                                <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 featured">
                        <h5 class="mb-1">Omah Ku Inc.</h5>
                        <span class="text-body-text">Desgin Team Agency</span>
                    </div>
                </div>
            </div>
            <div class="sm:w-1/2">
                <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                    <div class="size-14">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                            <g  transform="translate(-457 -443)">
                                <rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
                                <g  transform="translate(457 443)">
                                <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#378a82"/>
                                <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
                                <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 featured">
                        <h5 class="mb-1">Ventic</h5>
                        <span class="text-body-text">Desgin Team Agency</span>
                    </div>
                </div>
            </div>
            <div class="sm:w-1/2">
                <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                    <div class="size-14">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                            <g  transform="translate(-457 -443)">
                                <rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
                                <g  transform="translate(457 443)">
                                <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#175baa"/>
                                <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
                                <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 featured">
                        <h5 class="mb-1">Sakola</h5>
                        <span class="text-body-text">Desgin Team Agency</span>
                    </div>
                </div>
            </div>
            <div class="sm:w-1/2">
                <div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4">
                    <div class="size-14">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                        <g  transform="translate(-457 -443)">
                            <rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
                            <g  transform="translate(457 443)">
                            <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#eeb927"/>
                            <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
                            <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
                            </g>
                        </g>
                        </svg>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 featured">
                        <h5 class="mb-1">Uena Foods</h5>
                        <span class="text-body-text">Desgin Team Agency</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sm:py-6 py-5 sm:px-[1.875rem] px-4 m-auto pt-4">
        <a href="javascript:void(0);" class="py-[0.65rem] px-5 rounded-lg text-primary border border-primary duration-500 hover:text-white hover:bg-primary xl:text-[15px] font-medium inline-block m-auto dlab-load-more" id="FeaturedCompanies" rel="assets/ajax/featuredcompanies.html">View more</a>
    </div>
</div>
							</div>
						</div>
					</div>
					<div class="xl:w-1/2">
						<div class="row">
							<div class="w-full">
								<div class="card">
									<div class="sm:p-[1.875rem] p-4 flex-auto">
										<div class="row ">
											<div class="xl:w-4/6 col-xxl-7 sm:w-7/12">
												<div class="update-profile flex">
													<img src="/assets/images/profile/pic1.jpg" alt="" class="rounded-lg size-24 max-xl:size-20">
													<div class="ltr:ml-6 rtl:mr-6">
														<h3 class="mb-0">Franklin Jr</h3>
														<span class="text-primary block xl:mb-4 mb-1 text-sm">UI / UX Designer</span>
														<span class="text-sm text-body-text"><i class="fas fa-map-marker-alt ltr:mr-1 rtl:ml-1"></i>Medan, Sumatera Utara - ID</span>
													</div>
												</div>
											</div>
											<div class="xl:w-1/3 col-xxl-5 sm:w-5/12 mt-4 ltr:sm:text-right rtl:sm:text-left">
												<a href="javascript:void(0);" class="py-[0.65rem] px-5 rounded-lg bg-primary text-white duration-500 hover:bg-hover-primary xl:text-[15px] cursor-pointer inline-block">Update Profile</a>
											</div>
										</div>
										<div class="row mt-6 items-center">
											<h4 class="text-xl mb-0 mt-1">Skills</h4>
											<div class="sm:w-1/2">
												<div class="h-2 bg-body overflow-hidden rounded-xl">
													<div class="progress-bar bg-[#1D92DF] rounded-lg duration-500 animate-myanimation" style="width: 90%; height:8px;" role="progressbar">
														<span class="sr-only">90% Complete</span>
													</div>
												</div>
												<div class="flex items-end mt-2 pb-6 justify-between">
													<span class="font-medium text-sm text-body-text">Figma</span>
													<h6 class="mb-0">90%</h6>
												</div>
												<div class="h-2 bg-body overflow-hidden rounded-xl">
													<div class="progress-bar bg-info rounded-lg duration-500 animate-myanimation" style="width: 68%; height:8px;" role="progressbar">
														<span class="sr-only">45% Complete</span>
													</div>
												</div>
												<div class="flex items-end mt-2 pb-6 justify-between">
													<span class="font-medium text-sm text-body-text">Adobe XD</span>
													<h6 class="mb-0">68%</h6>
												</div>
												<div class="h-2 bg-body overflow-hidden rounded-xl">
													<div class="progress-bar bg-[#3772EA] rounded-lg duration-500 animate-myanimation" style="width: 85%; height:8px;" role="progressbar">
														<span class="sr-only">85% Complete</span>
													</div>
												</div>
												<div class="flex items-end mt-2 justify-between">
													<span class="font-medium text-sm text-body-text">Photoshop</span>
													<h6 class="mb-0">85%</h6>
												</div>
											</div>
											<div class="sm:w-1/2">
												<div id="pieChart1"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="w-full">
								<div class="card">
									<div class="relative sm:flex block justify-between items-center sm:pt-6 pt-5 sm:px-[1.875rem] px-4 flex-wrap pb-2">
										<h4 class="text-xl capitalize mb-0">Recent Activity</h4>
										<div>	
											<select class="nice-select py-[0.65rem] px-5 rounded-lg bg-primary-light text-primary border-primary-light xl:text-[15px] inline-block">
											  <option data-display="Newest">Newest</option>
												  <option value="1">latest</option>
											  
											  <option value="2">oldest</option>
											</select>
											<div class="relative cursor-pointer inline-block" x-data="{ open: false }">
												<div class="min-w-[2.5rem] p-[7px] size-10"  @click="open = true">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 mt-2 top-full ltr:right-0 rtl:left-0 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
													<a class="dropdown-item block text-left w-full py-2 px-6 text-[#828690] duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);">Details</a>
													<a class="dropdown-item block text-left w-full py-2 px-6 text-danger duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);">Cancel</a>
												</div>
											</div>
										</div>	
									</div>
									<div class="sm:px-[1.875rem] px-4 loadmore-content pb-0 pt-4 list-grid-area dlab-scroll height370 recent-activity-wrapper h-[27.1875rem] overflow-y-scroll" id="RecentActivityContent">
										<div class="flex relative recent-activity">
											<span class="ltr:mr-4 rtl:ml-4 activity">
												<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
												  <circle  cx="8.5" cy="8.5" r="8.5" fill="#f93a0b"/>
												</svg>
											</span>
											<div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4 flex-1">
												<div class="size-14">
													<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
													<g  transform="translate(-457 -443)">
														<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
														<g  transform="translate(457 443)">
														<rect  data-name="placeholder" width="71" height="71" rx="12" fill="#2769ee"/>
														<circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
														<circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
														</g>
													</g>
													</svg>
												</div>
												<div class="ltr:ml-4 rtl:mr-4">
													<h6 class="mb-1">Bubles Studios have 5 available positions for you</h6>
													<p>8min ago</p>
												</div>
											</div>
										</div>
										<div class="flex relative recent-activity">
											<span class="ltr:mr-4 rtl:ml-4 activity">
												<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
												  <circle  cx="8.5" cy="8.5" r="8.5" fill="#d9d9d9"/>
												</svg>
											</span>
											<div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4 flex-1">
												<div class="size-14">
													<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
														<g  transform="translate(-457 -443)">
															<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
															<g  transform="translate(457 443)">
															<rect  data-name="placeholder" width="71" height="71" rx="12" fill="#eeac27"/>
															<circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
															<circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
															</g>
														</g>
													</svg>
												</div>
												<div class="ltr:ml-4 rtl:mr-4">
													<h6 class="mb-1">Elextra Studios has invited you to interview meeting tomorrow</h6>
													<p>8min ago</p>
												</div>
											</div>
										</div>
										<div class="flex relative recent-activity">
											<span class="ltr:mr-4 rtl:ml-4 activity">
												<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
												  <circle  cx="8.5" cy="8.5" r="8.5" fill="#d9d9d9"/>
												</svg>
											</span>
											<div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4 flex-1">
												<div class="size-14">
													<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
														<g  transform="translate(-457 -443)">
															<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
															<g  transform="translate(457 443)">
															<rect  data-name="placeholder" width="71" height="71" rx="12" fill="#22bc32"/>
															<circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
															<circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
															</g>
														</g>
													</svg>
												</div>
												<div class="ltr:ml-4 rtl:mr-4">
													<h6 class="mb-1">Highspeed Design Team have 2 available positions for you</h6>
													<p>8min ago</p>
												</div>
											</div>
										</div>
										<div class="flex relative recent-activity">
											<span class="ltr:mr-4 rtl:ml-4">
												<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
												  <circle  cx="8.5" cy="8.5" r="8.5" fill="#d9d9d9"/>
												</svg>
											</span>
											<div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4 flex-1">
												<div class="size-14">
													<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
														<g  transform="translate(-457 -443)">
															<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
															<g  transform="translate(457 443)">
															<rect  data-name="placeholder" width="71" height="71" rx="12" fill="#9933cb"/>
															<circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
															<circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
															</g>
														</g>
													</svg>
												</div>
												<div class="ltr:ml-4 rtl:mr-4">
													<h6 class="mb-1">Kleon Studios have 5 available positions for you</h6>
													<p>8min ago</p>
												</div>
											</div>
										</div>
										<div class="flex relative">
											<span class="ltr:mr-4 rtl:ml-4 activity">
												<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
												  <circle  cx="8.5" cy="8.5" r="8.5" fill="#d9d9d9"/>
												</svg>
											</span>
											<div class="flex items-center list-item-bx border-b border-dashed border-border pb-4 mb-4 flex-1">
												<div class="size-14">
													<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
														<g  transform="translate(-457 -443)">
															<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
															<g  transform="translate(457 443)">
															<rect  data-name="placeholder" width="71" height="71" rx="12" fill="#eeac27"/>
															<circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
															<circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
															</g>
														</g>
													</svg>
												</div>
												<div class="ltr:ml-4 rtl:mr-4">
													<h6 class="mb-1">Elextra Studios has invited you to interview meeting tomorrow</h6>
													<p>8min ago</p>
												</div>
											</div>
										</div>
									</div>
									<div class="sm:py-6 py-5 sm:px-[1.875rem] px-4 text-center">
										<a href="javascript:void(0);" class="py-[0.65rem] px-5 rounded-lg text-primary border border-primary duration-500 hover:text-white hover:bg-primary xl:text-[15px] font-medium inline-block m-auto dlab-load-more" id="RecentActivity" rel="assets/ajax/recentactivity.html">View more</a>
									</div>
								</div>
							</div>
							<div class="w-full">
								<div class="card">
									<div class="relative sm:flex block justify-between items-center sm:pt-6 pt-5 sm:px-[1.875rem] px-4 flex-wrap">
										<h4 class="text-xl capitalize sm:mb-0 mb-2">Available Jobs For You</h4>
										<div>	
											<select class="nice-select py-[0.65rem] px-5 rounded-lg bg-primary-light text-primary border-primary-light text-[15px]">
											  <option data-display="Newest">Newest</option>
											  
											  <option value="2">oldest</option>
											</select>
											<div class="relative cursor-pointer inline-block" x-data="{ open: false }">
												<div class="min-w-[2.5rem] p-[7px] size-10"  @click="open = true">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 mt-2 top-full ltr:right-0 rtl:left-0 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
													<a class="dropdown-item block text-left w-full py-2 px-6 text-[#828690] duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);">Details</a>
													<a class="dropdown-item block text-left w-full py-2 px-6 text-danger duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);">Cancel</a>
												</div>
											</div>
										</div>	
									</div>
									<div class="sm:p-[1.875rem] p-4 flex-auto">
										<div class="owl-carousel owl-carousel owl-loaded front-view-slider ">
											<div class="items">
												<div class="border border-border p-6 rounded-lg">
													<div class="text-center">
														<div class="size-14 mx-auto mb-[15px]">
															<svg class="w-full h-full mb-2" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
															  <g  transform="translate(-457 -443)">
																<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
																<g  transform="translate(457 443)">
																  <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#2769ee"/>
																  <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
																  <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
																</g>
															  </g>
															</svg>
														</div>
														<h5 class="mb-1">UI Designer</h5>
														<p class="text-primary mb-2 text-[13px] leading-[1.5]">Bubbles Studios</p>
													</div>
													<div class="text-dark pt-1">
														<p class="text-dark"><i class="fas fa-map-marker-alt ltr:mr-2 rtl:ml-2"></i>Manchester, England</p>
														<p class="text-dark"><i class="fas fa-comments-dollar ltr:mr-2 rtl:ml-2"></i>$ 2,000 - $ 2,500</p>
													</div>
												</div>	
											</div>
											<div class="items">
												<div class="border border-border p-6 rounded-lg">
													<div class="text-center">
														<div class="size-14 mx-auto mb-[15px]">
															<svg class="w-full h-full mb-2" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
															  <g  transform="translate(-457 -443)">
																<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
																<g  transform="translate(457 443)">
																  <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#ee27c0"/>
																  <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
																  <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
																</g>
															  </g>
															</svg>
														</div>
														<h5 class="mb-1">Researcher</h5>
														<p class="text-primary mb-2 text-[13px] leading-[1.5]">Kleon Studios</p>
													</div>
													<div class="text-dark pt-1">
														<p class="text-dark"><i class="fas fa-map-marker-alt ltr:mr-2 rtl:ml-2"></i>Manchester, England</p>
														<p class="text-dark"><i class="fas fa-comments-dollar ltr:mr-2 rtl:ml-2"></i>$ 2,000 - $ 2,500</p>
													</div>
												</div>	
											</div>
											<div class="items">
												<div class="border border-border p-6 rounded-lg">
													<div class="text-center">
														<div class="size-14 mx-auto mb-[15px]">
															<svg class="w-full h-full mb-2" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
															  <g  transform="translate(-457 -443)">
																<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
																<g  transform="translate(457 443)">
																  <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#2db532"/>
																  <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
																  <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
																</g>
															  </g>
															</svg>
														</div>
														<h5 class="mb-1">Frontend</h5>
														<p class="text-primary mb-2 text-[13px] leading-[1.5]">Green Comp.</p>
													</div>
													<div class="text-dark pt-1">
														<p class="text-dark"><i class="fas fa-map-marker-alt ltr:mr-2 rtl:ml-2"></i>Manchester, England</p>
														<p class="text-dark"><i class="fas fa-comments-dollar ltr:mr-2 rtl:ml-2"></i>$ 2,000 - $ 2,500</p>
													</div>
												</div>	
											</div>
											<div class="items">
												<div class="border border-border p-6 rounded-lg">
													<div class="text-center">
														<div class="size-14 mx-auto mb-[15px]">
															<svg class="w-full h-full mb-2" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
															  <g  transform="translate(-457 -443)">
																<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
																<g  transform="translate(457 443)">
																  <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#2769ee"/>
																  <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
																  <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
																</g>
															  </g>
															</svg>
														</div>
														<h5 class="mb-1">UI Designer</h5>
														<p class="text-primary mb-2 text-[13px] leading-[1.5]">Bubbles Studios</p>
													</div>
													<div class="text-dark pt-1">
														<p class="text-dark"><i class="fas fa-map-marker-alt ltr:mr-2 rtl:ml-2"></i>Manchester, England</p>
														<p class="text-dark"><i class="fas fa-comments-dollar ltr:mr-2 rtl:ml-2"></i>$ 2,000 - $ 2,500</p>
													</div>
												</div>	
											</div>
											<div class="items">
												<div class="border border-border p-6 rounded-lg">
													<div class="text-center">
														<div class="size-14 mx-auto mb-[15px]">
															<svg class="w-full h-full mb-2" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
															  <g  transform="translate(-457 -443)">
																<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
																<g  transform="translate(457 443)">
																  <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#ee27c0"/>
																  <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
																  <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
																</g>
															  </g>
															</svg>
														</div>
														<h5 class="mb-1">Researcher</h5>
														<p class="text-primary mb-2 text-[13px] leading-[1.5]">Kleon Studios</p>
													</div>
													<div class="text-dark pt-1">
														<p class="text-dark"><i class="fas fa-map-marker-alt ltr:mr-2 rtl:ml-2"></i>Manchester, England</p>
														<p class="text-dark"><i class="fas fa-comments-dollar ltr:mr-2 rtl:ml-2"></i>$ 2,000 - $ 2,500</p>
													</div>
												</div>	
											</div>
											<div class="items">
												<div class="border border-border p-6 rounded-lg">
													<div class="text-center">
														<div class="size-14 mx-auto mb-[15px]">
															<svg class="w-full h-full mb-2" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
															  <g  transform="translate(-457 -443)">
																<rect  width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"/>
																<g  transform="translate(457 443)">
																  <rect  data-name="placeholder" width="71" height="71" rx="12" fill="#2db532"/>
																  <circle  data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"/>
																  <circle  data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"/>
																</g>
															  </g>
															</svg>
														</div>
														<h5 class="mb-1">Frontend</h5>
														<p class="text-primary mb-2 text-[13px] leading-[1.5]">Green Comp.</p>
													</div>
													<div class="text-dark pt-1">
														<p class="text-dark"><i class="fas fa-map-marker-alt ltr:mr-2 rtl:ml-2"></i>Manchester, England</p>
														<p class="text-dark"><i class="fas fa-comments-dollar ltr:mr-2 rtl:ml-2"></i>$ 2,000 - $ 2,500</p>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="w-full">
								<div class="card">
									<div class="relative sm:flex block justify-between items-center sm:pt-6 pt-5 sm:px-[1.875rem] px-4 flex-wrap">
										<h4 class="text-xl capitalize">Network</h4>
										<div class="relative cursor-pointer inline-block" x-data="{ open: false }">
											<div class="min-w-[2.5rem] p-[7px] size-10"  @click="open = true">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="var(--text)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</div>
											<div class="absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] dark:shadow-[0rem_2rem_2.5rem_0rem_rgba(0,0,0,0.4)] min-w-[10rem] py-2 mt-2 top-full ltr:right-0 rtl:left-0 rounded-lg bg-card" x-transition.duration.300ms="" x-show.transition.origin.top.right="open" @click.away="open = false">
												<a class="dropdown-item block text-left w-full py-2 px-6 text-[#828690] duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);">Details</a>
												<a class="dropdown-item block text-left w-full py-2 px-6 text-danger duration-300 hover:bg-bs-dropdown-color" href="javascript:void(0);">Cancel</a>
											</div>
										</div>
									</div>
									<div class="sm:p-[1.875rem] p-4 flex-auto sm:pb-2 pb-2">
										<div class="row sp10">
											<div class="md:w-1/4 w-1/2 mb-4 text-center">
												<div class="inline-block mx-auto md:mb-4 mb-2 relative ltr:mr-4 rtl:ml-4 db-donut-chart-sale">
													<span class="donut" data-peity='{ "fill": ["var(--primary)", "var(--light)"],   "innerRadius": 38, "radius": 10}'>6/9</span>
													<h4 class="absolute top-[50%] left-[50%] pie-label">66%</h4>
												</div>
												<h5 class="mb-1">Engineer</h5>
												<p>5,050 Vacancy</p>
											</div>
											<div class="md:w-1/4 w-1/2 mb-4 text-center">
												<div class="inline-block mx-auto md:mb-4 mb-2 relative ltr:mr-4 rtl:ml-4 db-donut-chart-sale">
													<span class="donut" data-peity='{ "fill": ["var(--primary)", "var(--light)"],   "innerRadius": 38, "radius": 10}'>3/9</span>
													<h4 class="absolute top-[50%] left-[50%] pie-label">31%</h4>
												</div>
												<h5 class="mb-1">Designer</h5>
												<p>10,524 Vacany</p>
											</div>
											<div class="md:w-1/4 w-1/2 mb-4 text-center">
												<div class="inline-block mx-auto md:mb-4 mb-2 relative ltr:mr-4 rtl:ml-4 db-donut-chart-sale">
													<span class="donut" data-peity='{ "fill": ["var(--primary)", "var(--light)"],   "innerRadius": 38, "radius": 10}'>6/8</span>
													<h4 class="absolute top-[50%] left-[50%] pie-label">75%</h4>
												</div>
												<h5 class="mb-1">Manager</h5>
												<p>621 Vacancy</p>
											</div>
											<div class="md:w-1/4 w-1/2 mb-4 text-center">
												<div class="inline-block mx-auto md:mb-4 mb-2 relative ltr:mr-4 rtl:ml-4 db-donut-chart-sale">
													<span class="donut" data-peity='{ "fill": ["var(--primary)", "var(--light)"],   "innerRadius": 38, "radius": 10}'>7/10</span>
													<h4 class="absolute top-[50%] left-[50%] pie-label">62%</h4>
												</div>
												<h5 class="mb-1">Programmer</h5>
												<p>9,662 Vacancy</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>	
            </div>
		</div>
         <!-- Content body end -->
		

        <!-- Footer start -->
        <div class="footer mt-4 bg-card">
	<div class="copyright p-[15px]">
	   <p class="text-center text-gray sm:text-sm text-xs leading-[1.8]">Copyright © Designed & Developed by <a href="https://dexignlab.com/" target="_blank" class="text-primary">DexignLab</a> 2024</p>
	</div>
</div>
        <!-- Footer end -->


	</div>
    <!-- Main wrapper end -->

	<script src="/assets/vendor/global/global.min.js"></script>
	<!-- Alpine js -->
	<script defer src="/assets/vendor/alpine/alpineplugin.js"></script>
	<script defer src="/assets/vendor/alpine/alpine.js"></script>
	<script src="/assets/vendor/apexchart/apexchart.js"></script>
	<script src="/assets/vendor/chartjs/chart.bundle.min.js"></script>
	<script src="/assets/vendor/owl-carousel/owl.carousel.js"></script>
	<script src="/assets/vendor/niceselect/js/jquery.nice-select.min.js"></script> <!-- nice-select -->
	<!-- Chart piety plugin files -->
	<script src="/assets/vendor/peity/jquery.peity.min.js"></script>
	<!-- Dashboard 1 -->
	<script src="/assets/js/dashboard/dashboard-1.js"></script>

	
<script src="/assets/vendor/flatpickr-master/js/flatpickr.js"></script>
<script src="/assets/js/dlabnav-init.js"></script>
<script src="/assets/js/custom.js"></script>



 
	
	<script>
		function JobickCarousel()
	{
		/*  testimonial one function by = owl.carousel.js */
		jQuery('.front-view-slider').owlCarousel({
			loop:false,
			margin:30,
			nav:false,
			autoplaySpeed: 3000,
			navSpeed: 3000,
			autoWidth:true,
			paginationSpeed: 3000,
			slideSpeed: 3000,
			smartSpeed: 3000,
			autoplay: false,
			animateOut: 'fadeOut',
			dots:false,
			navText: ['', ''],
			responsive:{
				0:{
					items:1,
					
					margin:10
				},
				
				480:{
					items:1
				},			
				
				767:{
					items:3
				},
				1750:{
					items:3
				}
			}
		})
	}
	jQuery(window).on('load',function(){
		setTimeout(function(){
			JobickCarousel();
		}, 1000); 
	});
	</script>

</body>
</html>
