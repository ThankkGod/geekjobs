<head>
    <meta charset="utf-8" />
      @foreach (\App\Models\General::latest()->get() as $title )
        <title>{{ $title->name  }} - @yield('title')</title>
    @endforeach
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
      @foreach (\App\Models\General::latest()->get() as $title )
        <title>{{ $title->name  }} - @yield('title')</title>
    @endforeach
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

    <link href="{{asset('backend/assets/libs/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('backend/assets/css/style.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('backend/assets/js/config.js')}}"></script>
    
</head>

