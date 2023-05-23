<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Edummi Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css -->
    <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Custom Css -->
    <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">



<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>








</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">

                    <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/EDUIMMI-2.png') }}" alt="" height="22">
                            </span>
                        <span class="logo-lg">
                                <img src="{{ asset('assets/images/EDUIMMI-2.png') }}" alt="" height="50">
                            </span>
                    </a>
                </div>

                <button type="button"
                        class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                    <i class="mdi mdi-menu"></i>
                </button>
            </div>

            <div class="d-flex">
                <div class="dropdown d-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge bg-danger rounded-pill">3</span>
                    </button>
                </div>

                <div>
                    <button type="button" class="btn header-item waves-effect" aria-haspopup="true"
                            aria-expanded="false">
                        {{ auth()->user()->role}}</button>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{auth()->user()->profile_url}}"
                             alt="Header Avatar">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        <a class="dropdown-item" href="{{ route('profile.edit', ['profile' => auth()->user()->id]) }}"><i
                                    class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i>
                                Profile Settings</a>

                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                                class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i>
                            Logout</a>
                    </div>

                </div>
            </div>
        </div>
    </header>
    
    @include('layout.side-bar')
