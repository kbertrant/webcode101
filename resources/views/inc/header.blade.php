	<!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index.html">
					<img alt="Logo" src="{{asset('img/preloader-logo.png')}}" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
						<div class="kt-container">

							<!-- begin:: Brand -->
							<div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
								<a class="kt-header__brand-logo" href="{{ route('home') }}">
									<img alt="Logo" src="{{asset('img/logo-dark.png')}}" class="kt-header__brand-logo-default" />
									<img alt="Logo" src="{{asset('img/logo-dark.png')}}" class="kt-header__brand-logo-sticky" />
								</a>
							</div>

							<!-- end:: Brand -->

							<!-- begin: Header Menu -->
							<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
							<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
								<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
									<ul class="kt-menu__nav ">
										<li class="kt-menu__item  kt-menu__item--open
										 kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel " ><a href="{{ route('home') }}" class="kt-menu__link "><span class="kt-menu__link-text">Calendrier</span></a>
										</li>
										@if(Auth::user()->role=="residence" || Auth::user()->role=="administrateur")
										<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" ><a href="{{ route('quart.create') }}" class="kt-menu__link"><span class="kt-menu__link-text">Créer des quarts de travail</span></a>
										</li>
										@else 
										@endif
										@if(Auth::user()->role=="professionnel")
										<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" ><a href="{{ route('facturation.facture') }}" class="kt-menu__link"><span class="kt-menu__link-text">Ma rémunération</span></a>
										</li>
										<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" ><a href="{{ route('message.list') }}" class="kt-menu__link"><span class="kt-menu__link-text">Message</span></a>
										</li>
										@else
										@endif
                                       
										@if(Auth::user()->role=="administrateur")
										<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" ><a href="{{ route('message.list') }}" class="kt-menu__link"><span class="kt-menu__link-text">Message</span></a>
										</li>
											<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Gestion</span></a>
												<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('facturation.depenses') }}" class="kt-menu__link"><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Mes facturations</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('facturation.facture') }}" class="kt-menu__link"><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Mes rémunérations</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('user.liste') }}" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Administrateur / Edimestre</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('residence.list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Liste des résidences</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('professionnel.list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Liste des professionnels</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('note.list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Note des professionnels</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="/bulksms" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">SMS</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Parametres</span></a>
												<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('poste.list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Poste</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('tarif.list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Tarif</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('role') }}" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Role</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('etat.list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Etat des quarts</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('ferie.list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Jours fériés</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('param.param') }}" class="kt-menu__link "><i class="kt-menu__link-bullet"><span></span></i><span class="kt-menu__link-text">Parametres</span></a></li>
													</ul>
												</div>
											</li>
										@else
										@endif
										
									</ul>
								</div>
							</div>

							<!-- end: Header Menu -->

							<!-- begin:: Header Topbar -->
							<div class="kt-header__topbar kt-grid__item">

								<!--begin: Search -->
								<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect id="bound" x="0" y="0" width="24" height="24" />
													<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>

											<!--<i class="flaticon2-search-1"></i>-->
										</span>
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
										<div class="kt-quick-search kt-quick-search--inline" id="kt_quick_search_inline">
											<form method="get" class="kt-quick-search__form">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
													<input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
													<div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
												</div>
											</form>
											<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
											</div>
										</div>
									</div>
								</div>

								<!--end: Search -->

								<!--begin: Notifications -->
								<div class="kt-header__topbar-item dropdown">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										
											@if(auth()->user()->unreadNotifications->count()==0)
												<span class="kt-header__topbar-icon">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
														<i class="fas fa-envelope fa-fw"></i>
													</svg>
													<span class="kt-pulse__ring"></span>
													<span class="badge badge-danger badge-counter ">{{ auth()->user()->unreadNotifications->count() }}</span>
												</span>
											@else
												<span class="kt-header__topbar-icon kt-pulse kt-pulse--light">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
														<i class="fas fa-envelope fa-fw"></i>
													</svg>
													<span class="kt-pulse__ring"></span>
													<span class="badge badge-danger badge-counter">{{ auth()->user()->unreadNotifications->count() }}</span>
												</span>
											@endif
											<!--<i class="flaticon2-bell-alarm-symbol"></i>-->
											

										<!--<span class="kt-badge kt-badge--light"></span>-->
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
										<form>

											<!--begin: Head -->
											<div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b" style="background-image: url(../assets/media/misc/bg-1.jpg)">
												@unless(auth()->user()->unreadNotifications->isEmpty())
												<h3 class="kt-head__title">
													<span style="color: yellow" class="fas fa-bell fa-lg" data-fa-transform="grow-2"></span>
														{{ auth()->user()->unreadNotifications->count() }} Notifications
												</h3>
												@endunless
												<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x" role="tablist">
													<li class="nav-item">
														<a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Nouveaux Quarts</a>
													</li>
												</ul>
											</div>

											<!--end: Head -->
											<div class="tab-content">
												<div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
													<div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
														@foreach ( Auth::user()->unreadNotifications as $notification)
															<li><!-- start message -->
																<a href="{{ route('notification.index') }}" class="kt-notification__item">
																	<div class="kt-notification__item-icon">
																		<i class="flaticon-alert kt-font-success"></i>
																	</div>
																	<!-- Message title and timestamp -->
																	<div class="kt-notification__item-details">
																		<div class="kt-notification__item-title">
																			<b>{{ $notification->data['titre'] }}</b>
																		</div>
																		<div class="kt-notification__item-time">
																			{{-- {{ $notification->data['date'] }} --}} Il y a 1h
																		</div>
																	</div>
																</a>
															</li>
														@endforeach
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

								<!--end: Notifications -->


								<!--begin: Language bar -->
								<div class="kt-header__topbar-item kt-header__topbar-item--langs">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon">
											<img class="" src="{{asset('assets/media/flags/019-france.svg')}}" alt="" />
										</span>
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
										<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
											<li class="kt-nav__item kt-nav__item--active">
												<a href="#" class="kt-nav__link">
													<span class="kt-nav__link-icon"><img src="{{asset('assets/media/flags/020-flag.svg')}}" alt="" /></span>
													<span class="kt-nav__link-text">English</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<span class="kt-nav__link-icon"><img src="{{asset('assets/media/flags/016-spain.svg')}}" alt="" /></span>
													<span class="kt-nav__link-text">Spanish</span>
												</a>
											</li>
											
										</ul>
									</div>
								</div>

								<!--end: Language bar -->

								<!--begin: User bar -->
								<div class="kt-header__topbar-item kt-header__topbar-item--user">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-welcome">Hi,</span>
										<span class="kt-header__topbar-username" style="font-size:10px">{{ Auth::user()->name }}</span>
										<span class="kt-header__topbar-icon"><img alt="Pic" src="/storage/app/public/avatars/{{ Auth::user()->photo }}" /></span>
										
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

										<!--begin: Head -->
										<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(../assets/media/misc/bg-1.jpg)">
											<div class="kt-user-card__avatar">
												

												<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
												<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success"><img alt="Pic" src="/storage/app/public/avatars/{{ Auth::user()->photo }}" /></span>
											</div>
											<div class="kt-user-card__name">
												{{ Auth::user()->name }}	
											</div>
											<div class="kt-user-card__badge">
												<span class="btn btn-success btn-sm btn-bold btn-font-md">{{ auth()->user()->unreadNotifications->count() }} Notifications</span>
											</div>
										</div>

										<!--end: Head -->

										<!--begin: Navigation -->
										<div class="kt-notification">
											<a href="{{ route('profile') }}" class="kt-notification__item">
												<div class="kt-notification__item-icon">
													<i class="flaticon2-calendar-3 kt-font-success"></i>
												</div>
												<div class="kt-notification__item-details">
													<div class="kt-notification__item-title kt-font-bold">
														Mon profile
													</div>
													<div class="kt-notification__item-time">
														Paramètres et comptes 
													</div>
												</div>
											</a>
											
											<div class="kt-notification__custom">
												<a onclick="document.getElementById('logout-form').submit()" href="#" class="btn btn-label-brand btn-sm btn-bold">
													<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														{{ csrf_field() }}
													</form>
													Déconnexion</a>
											</div>
										</div>

										<!--end: Navigation -->
									</div>
								</div>

								<!--end: User bar -->
							</div>

							<!-- end:: Header Topbar -->
						</div>
					</div>
				</div>
			</div>
		</div>
	