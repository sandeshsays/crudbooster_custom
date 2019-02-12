<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
    <title>{{ isset($page_title) ? cbGetsetting('appname').': '.strip_tags($page_title) : "Crudbooster Admin Panel" }}</title>
    @include('crudbooster::_admin_template.meta')
    @include('crudbooster::_admin_template.css')

    @stack('head')
</head>
<body class="{!! CRUDBooster::themeColor() !!} {!! cbConfig('ADMIN_LAYOUT') !!}">
<div id='app' class="wrapper">

<!-- Header -->
@include('crudbooster::_admin_template.header')

<!-- Sidebar -->
@include('crudbooster::_admin_template.sidebar')
=======
    <meta charset="UTF-8">
    <title>{{ ($page_title)?Session::get('appname').': '.strip_tags($page_title):"Admin Area" }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name='generator' content='CRUDBooster 5.4.6'/>
    <meta name='robots' content='noindex,nofollow'/>
    <link rel="shortcut icon"
          href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="{{asset("vendor/crudbooster/assets/adminlte/font-awesome/css")}}/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="{{asset("vendor/crudbooster/ionic/css/ionicons.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="{{ asset("vendor/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("vendor/crudbooster/assets/adminlte/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css"/>

    <!-- support rtl-->
    @if (in_array(App::getLocale(), ['ar', 'fa']))
        <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
        <link href="{{ asset("vendor/crudbooster/assets/rtl.css")}}" rel="stylesheet" type="text/css"/>
    @endif

    <link rel='stylesheet' href='{{asset("vendor/crudbooster/assets/css/main.css").'?r='.time()}}'/>

    <!-- load css -->
    <style type="text/css">
        @if($style_css)
            {!! $style_css !!}
        @endif
    </style>
    @if($load_css)
        @foreach($load_css as $css)
            <link href="{{$css}}" rel="stylesheet" type="text/css"/>
        @endforeach
    @endif

    <style type="text/css">
        .dropdown-menu-action {
            left: -130%;
        }

        .btn-group-action .btn-action {
            cursor: default
        }

        #box-header-module {
            box-shadow: 10px 10px 10px #dddddd;
        }

        .sub-module-tab li {
            background: #F9F9F9;
            cursor: pointer;
        }

        .sub-module-tab li.active {
            background: #ffffff;
            box-shadow: 0px -5px 10px #cccccc
        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
            border: none;
        }

        .nav-tabs > li > a {
            border: none;
        }

        .breadcrumb {
            margin: 0 0 0 0;
            padding: 0 0 0 0;
        }

        .form-group > label:first-child {
            display: block
        }
    </style>

    @stack('head')
</head>
<body class="@php echo (Session::get('theme_color'))?:'skin-blue'; echo ' '; echo config('crudbooster.ADMIN_LAYOUT'); @endphp {{($sidebar_mode)?:''}}">
<div id='app' class="wrapper">

    <!-- Header -->
@include('crudbooster::header')

<!-- Sidebar -->
@include('crudbooster::sidebar')
>>>>>>> 5.4.0

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content-header">
            <?php
            $module = CRUDBooster::getCurrentModule();
            ?>
            @if($module)
                <h1>
<<<<<<< HEAD
                    <i class='{{$module->icon}}'></i>
                    {{ isset($page_title) ? $page_title : $module->name }} &nbsp;&nbsp;
=======
                    <i class='{{$module->icon}}'></i> {{($page_title)?:$module->name}} &nbsp;&nbsp;
>>>>>>> 5.4.0

                    <!--START BUTTON -->

                    @if(CRUDBooster::getCurrentMethod() == 'getIndex')
<<<<<<< HEAD
                        @if($buttonShow)
                            <a href="{{ CRUDBooster::mainpath().'?'.http_build_query(request()->all()) }}"
                               id='btn_show_data' class="btn btn-sm btn-primary"
                               title="{{ cbTrans('action_show_data') }}">

                                {!! cbIcon('table') !!}
                                {{ cbTrans('action_show_data') }}
                            </a>
                        @endif

                        @include('crudbooster::_admin_template.addButton')
                        @include('crudbooster::_admin_template.export_import_buttons', ['exportBtn' => $buttonExport, 'importBtn' => $buttonImport, 'query' => $build_query])
                    @endif


                    @include('crudbooster::_admin_template.action_buttons', ['index_button' => $indexButton])

=======
                        @if($button_show)
                            <a href="{{ CRUDBooster::mainpath().'?'.http_build_query(Request::all()) }}" id='btn_show_data' class="btn btn-sm btn-primary"
                               title="{{trans('crudbooster.action_show_data')}}">
                                <i class="fa fa-table"></i> {{trans('crudbooster.action_show_data')}}
                            </a>
                        @endif

                        @if($button_add && CRUDBooster::isCreate())
                            <a href="{{ CRUDBooster::mainpath('add').'?return_url='.urlencode(Request::fullUrl()).'&parent_id='.g('parent_id').'&parent_field='.$parent_field }}"
                               id='btn_add_new_data' class="btn btn-sm btn-success" title="{{trans('crudbooster.action_add_data')}}">
                                <i class="fa fa-plus-circle"></i> {{trans('crudbooster.action_add_data')}}
                            </a>
                        @endif
                    @endif


                    @if($button_export && CRUDBooster::getCurrentMethod() == 'getIndex')
                        <a href="javascript:void(0)" id='btn_export_data' data-url-parameter='{{$build_query}}' title='Export Data'
                           class="btn btn-sm btn-primary btn-export-data">
                            <i class="fa fa-upload"></i> {{trans("crudbooster.button_export")}}
                        </a>
                    @endif

                    @if($button_import && CRUDBooster::getCurrentMethod() == 'getIndex')
                        <a href="{{ CRUDBooster::mainpath('import-data') }}" id='btn_import_data' data-url-parameter='{{$build_query}}' title='Import Data'
                           class="btn btn-sm btn-primary btn-import-data">
                            <i class="fa fa-download"></i> {{trans("crudbooster.button_import")}}
                        </a>
                    @endif

                <!--ADD ACTIon-->
                    @if(!empty($index_button))

                        @foreach($index_button as $ib)
                            <a href='{{$ib["url"]}}' id='{{str_slug($ib["label"])}}' class='btn {{($ib['color'])?'btn-'.$ib['color']:'btn-primary'}} btn-sm'
                               @if($ib['onClick']) onClick='return {{$ib["onClick"]}}' @endif
                               @if($ib['onMouseOver']) onMouseOver='return {{$ib["onMouseOver"]}}' @endif
                               @if($ib['onMouseOut']) onMouseOut='return {{$ib["onMouseOut"]}}' @endif
                               @if($ib['onKeyDown']) onKeyDown='return {{$ib["onKeyDown"]}}' @endif
                               @if($ib['onLoad']) onLoad='return {{$ib["onLoad"]}}' @endif
                            >
                                <i class='{{$ib["icon"]}}'></i> {{$ib["label"]}}
                            </a>
                    @endforeach
                @endif
                <!-- END BUTTON -->
>>>>>>> 5.4.0
                </h1>


                <ol class="breadcrumb">
<<<<<<< HEAD
                    <li>
                        <a href="{{ CRUDBooster::adminPath() }}">
                            {!! cbIcon('dashboard') !!}
                            {{ cbTrans('home') }}
                        </a>
                    </li>
                    <li class="active">{{$module->name}}</li>
                </ol>
            @else
                <h1>{{ cbGetsetting('appname') }}
                    <small>{!! cbTrans('information') !!}</small>
=======
                    <li><a href="{{CRUDBooster::adminPath()}}"><i class="fa fa-dashboard"></i> {{ trans('crudbooster.home') }}</a></li>
                    <li class="active">{{$module->name}}</li>
                </ol>
            @else
                <h1>{{Session::get('appname')}}
                    <small>Information</small>
>>>>>>> 5.4.0
                </h1>
            @endif
        </section>


        <!-- Main content -->
        <section id='content_section' class="content">

<<<<<<< HEAD
            @include('crudbooster::_admin_template.alert')

=======
            @if(@$alerts)
                @foreach(@$alerts as $alert)
                    <div class='callout callout-{{$alert["type"]}}'>
                        {!! $alert['message'] !!}
                    </div>
                @endforeach
            @endif


            @if (Session::get('message')!='')
                <div class='alert alert-{{ Session::get("message_type") }}'>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> {{ trans("crudbooster.alert_".Session::get("message_type")) }}</h4>
                    {!!Session::get('message')!!}
                </div>
            @endif



        <!-- Your Page Content Here -->
>>>>>>> 5.4.0
            @yield('content')
        </section>
    </div>


    @include('crudbooster::_admin_template.footer')

</div><!-- ./wrapper -->


@include('crudbooster::_admin_template.admin_template_plugins')

<!-- load js -->
<<<<<<< HEAD
@include('crudbooster::_admin_template.js')
=======
@if($load_js)
    @foreach($load_js as $js)
        <script src="{{$js}}"></script>
    @endforeach
@endif
<script type="text/javascript">
    var site_url = "{{url('/')}}";
    @if($script_js)
        {!! $script_js !!}
    @endif
</script>
>>>>>>> 5.4.0

@stack('bottom')

</body>
</html>
