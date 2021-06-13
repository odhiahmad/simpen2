<header class="m-grid__item		m-header " data-minimize="minimize" data-minimize-offset="200"
        data-minimize-mobile-offset="200">
    <div class="m-header__top">
        <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- begin::Brand -->
                <div class="m-stack__item m-brand">
                    <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="/" class="m-brand__logo-wrapper">
                                <img width="40" alt="" src="{{asset('logo_pln.png')}}"/>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">
                            <div
                                class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push"
                                data-dropdown-toggle="click" aria-expanded="true">
                                <a href="#"
                                   class="dropdown-toggle m-dropdown__toggle btn btn-outline-metal m-btn  m-btn--icon m-btn--pill">
                                    <span> SIM PENGADAAN UPDK PEKANBARU</span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span
                                        class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first m--hide">
																	<span class="m-nav__section-text">
																		Quick Menu
																	</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href='{!! url('user/beranda'); !!}'
                                                           class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-dashboard"></i>
                                                            <span class="m-nav__link-text">
																			Dashboard
																		</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href='{!! url('user/user'); !!}'
                                                           class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-dashboard"></i>
                                                            <span class="m-nav__link-text">
																			Data User
																		</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href='{!! url('user/database-harga/index'); !!}'
                                                           class="m-nav__link">
                                                            <i class="m-nav__link-icon fa-tag"></i>
                                                            <span class="m-nav__link-text">
																			Database Harga
																		</span>
                                                        </a>
                                                    </li>

                                                    <li class="m-nav__item">
                                                        <a href='{!! url('user/inisiasi-pengadaan/index'); !!}'
                                                           class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-book"></i>
                                                            <span class="m-nav__link-text">
																			Inisiasi Pengadaan
																		</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>

                                                    <li class="m-nav__item">
                                                        <a href='{!! url('user/inisiasi-pengadaan-sipil/data-master'); !!}'
                                                           class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-book"></i>
                                                            <span class="m-nav__link-text">
																			Pengadaan Sipil DM
																		</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href='{!! url('user/inisiasi-pengadaan-sipil/pengadaan-sipil'); !!}'
                                                           class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-users"></i>
                                                            <span class="m-nav__link-text">
																			Pengadaan Sipil
																		</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- end::Responsive Header Menu Toggler-->
                            <!-- begin::Topbar Toggler-->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end::Brand -->
                <!-- begin::Topbar -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    data-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
													<span class="m-topbar__userpic m--hide">
														<img src="{{asset('assets/app/media/img/users/user4.jpg')}}"
                                                             class="m--img-rounded m--marginless m--img-centered"
                                                             alt=""/>
													</span>
                                        <span class="m-topbar__welcome">
														Hello,&nbsp;
													</span>
                                        <span class="m-topbar__username">
														{{Auth::user()->name}}
													</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span
                                            class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center"
                                                 style="background: url('assets/app/media/img/misc/user_profile_bg.jpg'); background-size: cover;">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        <img src="{{asset('assets/app/media/img/users/user4.jpg')}}"
                                                             class="m--img-rounded m--marginless" alt=""/>
                                                    </div>
                                                    <div class="m-card-user__details">
                                                        <span class="m-card-user__name m--font-weight-500">
                                                            Mark Andre
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__section m--hide">
																		<span class="m-nav__section-text">
																			Section
																		</span>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                                        <li class="m-nav__item">
                                                            <a href="/logout"
                                                               class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                Logout
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end::Topbar -->
            </div>
        </div>
    </div>
    <div class="m-header__bottom">
        <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- begin::Horizontal Menu -->
                <div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
                    <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light "
                            id="m_aside_header_menu_mobile_close_btn">
                        <i class="la la-close"></i>
                    </button>
                    <div id="m_header_menu"
                         class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">
                        <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                            @if(Auth::user()->jabatan == 'Admin' || Auth::user()->jabatan == 'Direksi')
                                <li class="{{ request()->is('user/beranda') ? 'm-menu__item  m-menu__item--active' : 'm-menu__item' }}"
                                    aria-haspopup="true">
                                    <a href='{!! url('user/beranda'); !!}' class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">
													Dashboard
												</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->jabatan == 'Admin')
                                <li class="{{ request()->is('user/jobcard/*') ? 'm-menu__item  m-menu__item--active m-menu__item--rel' : 'm-menu__item  m-menu__item--submenu m-menu__item--rel' }}"
                                    data-menu-submenu-toggle="click" aria-haspopup="true">
                                    <a href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">
													Job Card
												</span>
                                        <i class="m-menu__hor-arrow la la-angle-down"></i>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                        <ul class="m-menu__subnav">
                                            <li class="m-menu__item"
                                                data-menu-submenu-toggle="hover" data-redirect="true"
                                                aria-haspopup="true">
                                                <a href='{!! url('user/jobcard/mj/index'); !!}'
                                                   class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
													Monitoring Job Card
												</span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item"
                                                data-menu-submenu-toggle="hover" data-redirect="true"
                                                aria-haspopup="true">
                                                <a href='{!! url('user/jobcard/pj/index'); !!}'
                                                   class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
													PJ
												</span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item"
                                                data-menu-submenu-toggle="hover" data-redirect="true"
                                                aria-haspopup="true">
                                                <a href='{!! url('user/jobcard/spk/index'); !!}'
                                                   class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
													SPK
												</span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item"
                                                data-menu-submenu-toggle="hover" data-redirect="true"
                                                aria-haspopup="true">
                                                <a href='{!! url('user/jobcard/spbj/index'); !!}'
                                                   class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
													SPBJ
												</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            @if(Auth::user()->jabatan == 'Admin' || Auth::user()->jabatan == 'Direksi' || Auth::user()->jabatan == 'Pengawas' || Auth::user()->jabatan == 'Tim Mutu'
                            || Auth::user()->jabatan == 'Logistik'|| Auth::user()->jabatan == 'Keuangan')
                                <li class="{{ request()->is('user/monitoring-kontrak/*') ? 'm-menu__item  m-menu__item--active m-menu__item--rel' : 'm-menu__item  m-menu__item--submenu m-menu__item--rel' }}"
                                    data-menu-submenu-toggle="click" aria-haspopup="true">
                                    <a href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">
													Monitoring Kontrak
												</span>
                                        <i class="m-menu__hor-arrow la la-angle-down"></i>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                        <ul class="m-menu__subnav">
                                            <li class="m-menu__item"
                                                data-menu-submenu-toggle="hover" data-redirect="true"
                                                aria-haspopup="true">
                                                <a href='{!! url('user/monitoring-kontrak/pj/index'); !!}'
                                                   class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
													PJ
												</span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item"
                                                data-menu-submenu-toggle="hover" data-redirect="true"
                                                aria-haspopup="true">
                                                <a href='{!! url('user/monitoring-kontrak/spk/index'); !!}'
                                                   class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
													SPK
												</span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item"
                                                data-menu-submenu-toggle="hover" data-redirect="true"
                                                aria-haspopup="true">
                                                <a href='{!! url('user/monitoring-kontrak/spbj/index'); !!}'
                                                   class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
													SPBJ
												</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            @if(Auth::user()->jabatan == 'Admin')
                                <li class="{{ request()->is('user/inisiasi-pengadaan-sipil/*') ? 'm-menu__item  m-menu__item--active m-menu__item--rel' : 'm-menu__item  m-menu__item--submenu m-menu__item--rel' }}"
                                    data-menu-submenu-toggle="click" aria-haspopup="true">
                                    <a href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">
													Inisiasi Pengadaan Sipil
												</span>
                                        <i class="m-menu__hor-arrow la la-angle-down"></i>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                        <ul class="m-menu__subnav">
                                            <li class="{{ request()->is('user/inisiasi-pengadaan-sipil/ips-dm/dataMaster') ? 'm-menu__item  m-menu__item--active' : 'm-menu__item' }}"
                                                aria-haspopup="true">
                                                <a href='{!! url('user/inisiasi-pengadaan-sipil/ips-dm/index'); !!}'
                                                   class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-diagram"></i>
                                                    <span class="m-menu__link-title">
                                                    <span class="m-menu__link-wrap">
                                                        <span class="m-menu__link-text">
                                                            Data Master
                                                        </span>
                                                    </span>
                                                </span>
                                                </a>
                                            </li>
                                            <li class="{{ request()->is('user/inisiasi-pengadaan-sipil/pengadaan-sipil') ? 'm-menu__item  m-menu__item--active' : 'm-menu__item' }}"
                                                aria-haspopup="true">
                                                <a href='{!! url('user/inisiasi-pengadaan-sipil/pengadaan-sipil/index'); !!}'
                                                   class="m-menu__link ">
                                                    <i class="m-menu__link-icon flaticon-diagram"></i>
                                                    <span class="m-menu__link-title">
                                                    <span class="m-menu__link-wrap">
                                                        <span class="m-menu__link-text">
                                                           Pengadaan Sipil
                                                        </span>
                                                    </span>
                                                </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            @if(Auth::user()->jabatan == 'Admin')
                                <li class="{{ request()->is('user/database-harga/*') ? 'm-menu__item  m-menu__item--active' : 'm-menu__item' }}"
                                    aria-haspopup="true">
                                    <a href='{!! url('user/database-harga/index'); !!}' class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">
													Database Harga
												</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->jabatan  === 'Admin')
                                <li class="{{ request()->is('user/user/index') ? 'm-menu__item  m-menu__item--active' : 'm-menu__item' }}"
                                    aria-haspopup="true">
                                    <a href='{!! url('user/user/index'); !!}' class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <span class="m-menu__link-text">
                                            User
												</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->jabatan  === 'Admin')
                            <li class="{{ request()->is('user/dpt/index') ? 'm-menu__item  m-menu__item--active' : 'm-menu__item' }}"
                                aria-haspopup="true">
                                <a href='{!! url('user/dpt/index'); !!}' class="m-menu__link ">
                                    <span class="m-menu__item-here"></span>
                                    <span class="m-menu__link-text">
                                            DPT
												</span>
                                </a>
                            </li>
                            @endif


                            {{--                                <li class="{{ request()->is('user/inisiasi-pengadaan/*') ? 'm-menu__item  m-menu__item--active' : 'm-menu__item' }}"--}}
                            {{--                                    aria-haspopup="true">--}}
                            {{--                                    <a href='{!! url('user/inisiasi-pengadaan/index'); !!}' class="m-menu__link ">--}}
                            {{--                                        <span class="m-menu__item-here"></span>--}}
                            {{--                                        <span class="m-menu__link-text">--}}
                            {{--													Inisiasi Pengadaan--}}
                            {{--												</span>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}


                        </ul>
                    </div>
                </div>
                <!-- end::Horizontal Menu -->
                <!--begin::Search-->
                <div
                    class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-"
                    id="m_quicksearch" data-search-type="default">
                    <!--begin::Search Form -->
                    <!--end::Search Form -->
                    <!--begin::Search Results -->
                    <div class="m-dropdown__wrapper">
                        <div class="m-dropdown__arrow m-dropdown__arrow--center"></div>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true"
                                     data-max-height="300" data-mobile-max-height="200">
                                    <div class="m-dropdown__content m-list-search m-list-search--skin-light"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Results -->
                </div>
                <!--end::Search-->
            </div>
        </div>
    </div>
</header>
