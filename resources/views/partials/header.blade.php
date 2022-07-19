<!--begin::Bottom-->
<div class="header-bottom">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
                <!--begin::Header Nav-->
                <ul class="menu-nav">
                    <li class="menu-item menu-item-active" aria-haspopup="true">
                        <a href="index.html" class="menu-link">
                            <span class="menu-text">Home</span>
                        </a>
                    </li>
                    <!--begin::Merchant Menu-->
                    @can('view-merchant')
                        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click"
                            aria-haspopup="true">
                            <a href="{{route('merchants.index')}}" class="menu-link menu-toggle">
                                <span class="menu-text">Merchant</span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                <ul class="menu-subnav">
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{route('merchants.index')}}" class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                            <span class="menu-text">Merchant Management</span>
                                        </a>
                                    </li>
                                    @can('create-merchant')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('merchants.create')}}" class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                                <span class="menu-text">Create Merchant</span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>

                        </li>
                    @endcan
                <!--end::Merchant Menu-->
                    <!--begin::User Menu-->
                    @can('view-user')
                        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click"
                            aria-haspopup="true">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="menu-text">User</span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                <ul class="menu-subnav">
                                    <li class="menu-item" aria-haspopup="true">
                                        <a href="{{route('users.index')}}" class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                            <span class="menu-text">User Management</span>
                                        </a>
                                    </li>
                                    @can('create-user')
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{route('users.create')}}" class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                                <span class="menu-text">Create User</span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                @endcan
                <!--end::User Menu-->
                    <!--begin::Role Menu-->
                    @can('view-role')
                    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Role</span>
                            <span class="menu-desc"></span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{route('roles.index')}}" class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <span class="menu-text">Role Management</span>
                                    </a>
                                </li>
                                @can('create-role')
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{route('roles.create')}}" class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <span class="menu-text">Create Role</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    <!--end::Role Menu-->
                    @endcan
                    <!--begin::Settlement Menu-->
                    @can('view-settlement')
                    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Settlement</span>
                            <span class="menu-desc"></span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{route('settlements.index')}}" class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <span class="menu-text">Settlement Management</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endcan
                    <!--end::Settlement Menu-->
                    <!--begin::Top Up Menu-->
                    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Top Up</span>
                            <span class="menu-desc"></span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a target="_blank"
                                       href="https://preview.keenthemes.com/metronic/demo12/builder.html"
                                       class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <span class="menu-text">Item</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--end::Top Up Menu-->
                    <!--begin::Fund Out Menu-->
                    @can('view-fund-out')
                    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Fund Out</span>
                            <span class="menu-desc"></span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a
                                       href="{{route('fund-outs.index')}}"
                                       class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <span class="menu-text">FundOut Management</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                    <!--end::Fund Out Menu-->
                    <!--begin::Fund In Menu-->
                    @can('view-fund-in')
                    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Fund In</span>
                            <span class="menu-desc"></span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="{{route('fund-ins.index')}}" class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <span class="menu-text">Fund In Management</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                    <!--end::Fund In Menu-->
                    <!--begin::Bank Transaction Statement Menu-->
                    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Bank Transaction Statement</span>
                            <span class="menu-desc"></span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a target="_blank"
                                       href="https://preview.keenthemes.com/metronic/demo12/builder.html"
                                       class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <span class="menu-text">Item</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--end::Bank Transaction Statement Menu-->
                    <!--begin::Fund Statement Menu-->
                    <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Fund Statement</span>
                            <span class="menu-desc"></span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a target="_blank"
                                       href="https://preview.keenthemes.com/metronic/demo12/builder.html"
                                       class="menu-link">
																<span class="svg-icon menu-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path
                                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                fill="#000000"/>
																			<rect fill="#000000" opacity="0.3"
                                                                                  transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                  x="16.3255682" y="2.94551858"
                                                                                  width="3" height="18" rx="1"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                                        <span class="menu-text">Item</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--end::Fund Statement Menu-->
                </ul>
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->

    </div>
    <!--end::Container-->
</div>
<!--end::Bottom-->
