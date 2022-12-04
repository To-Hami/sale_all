<html dir="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() }}"
      lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous">


{{--    jquery--}}
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"
        integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c="
        crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/font-awesome.min.css') }}">

    {{-- ajax --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.8.1/smooth-scrollbar.min.js"
            integrity="sha512-DmxN+h4rvEbHxmkzhxEA1krRvgdzSFhjkcTe2HCZpd5ZnxP9+OWGHB8iMUQhvidmrivCTe3g0hyeMpfTLIwf7Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- fontawesome --}}
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js"
            integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js"
            integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO"
            crossorigin="anonymous"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/noty/noty.css') }}">
    <script src="{{ asset('admin_assets/plugins/noty/noty.min.js') }}"></script>
     <script src="{{ asset('admin_assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    {{-- main_css --}}
    <link rel="stylesheet" href="{{ asset('admin_assets/css/main.css')}}">

    {{-- datatable --}}
{{--         <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>--}}

</head>


<body class="bg-light" id="my-scrollbar">

<div class="toggles">
    <span></span>
    <span></span>
    <span></span>
</div>
{{-- aside menu--}}
@include('layouts.admin._aside')

<nav class="navbar">
    <div class="text-right">
        <ul id="nTmenu" class="   ">

            <li class="nav-item ">
                <a title="إظهار" href="#" class="noDecor">
			<span class="userNameAvatar">
            <img src="{{asset('admin_assets/images/2019485347.jpg')}}" class="avatarBar"/>
            <span> {{ auth()->user()->name }} </span>
        </span></a>
            </li>

            <li id="lateaction" class="nav-item dropdown1">
                <i class="fas fa-spinner fa-spin"
                   style="font-size:1.5em ; color:var(--main); vertical-align: -webkit-baseline-middle;"></i>
            </li>

        </ul>
    </div>
    <div class="d-flex ml-auto">
{{--        <span class="w-100 d-lg-none d-block"> </span>--}}
{{--        <span class="navbar-brand ">--}}

{{--              <img src="{{asset('admin_assets/images/mktabeeLogo.svg')}}"--}}
{{--                   alt="mktabeeLogo"--}}
{{--                   class="brandRLogo "/>--}}

{{--         </span>--}}
        {{--user menu--}}
        <ul>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="#"
                   id="navbarDropdown"
                   role="button"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                    {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <a class="dropdown-item" href="page-login.html"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            <i class=""></i>
                            @lang('site.logout')
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </li>


        

        </ul>
       
            @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                       href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
       

    </div>
</nav>

{{-- content --}}
 @include('admin.partials._session')
 <div class="mainsheet"> 
 @yield('content')
</div>
{{--footer--}}
<div class="appfooter fixed-bottom">
    <h6>Powered by rhstudio11.com</h6>
</div>

{{--jquery cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
</script>

{{--datatable--}}
{{--<script type="text/javascript"--}}
{{--        src="{{ asset('admin_assets/plugins/jquery.dataTables/jquery.dataTables.min.js') }}"></script>--}}
{{--<script type="text/javascript"--}}
{{--        src="{{ asset('admin_assets/plugins/dataTables.bootstrap/dataTables.bootstrap.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('admin_assets/plugins/select.min.js') }}"></script>--}}
{{--<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>--}}

<script src="{{ asset('admin_assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>

{{--select 2--}}
<script type="text/javascript" src="{{ asset('admin_assets/plugins/select2/select2.min.js') }}"></script>

{{-- <script src="{{ asset('admin_assets/js/main.js') }}"></script> --}}

{{--ckeditor--}}
<script src="{{ asset('admin_assets/plugins/ckeditor/ckeditor.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>


<script>
    Scrollbar.initAll();

    let menuToggle = document.querySelector(".toggles");
    let menu = $(".menu");
    let lis = $(".menu .menu-items li");


    menuToggle.onclick = function () {
        menuToggle.classList.toggle("active");
        menu.fadeToggle(300);
    }

    lis.hover(function () {

        $(this).css({'margin': '0 15px'});

    }, function () {

        $(this).css({'margin': '0 0px'});
    });

    $(document).ready(function () {
        //delete

        $('.delete').click(function (e) {
            console.log('done');
            var that = $(this);
            e.preventDefault();
            var n = new Noty({
                text: "هل انت متاكد من عملية الحذف",
                type: "error",
                killer: true,
                buttons: [
                    Noty.button("نعم", 'btn btn-gen mr-2', function () {
                        that.closest('form').submit();
                    }),
                    Noty.button("لا", 'btn btn-gen mr-2', function () {
                        n.close();
                    })
                ]
            });
            n.show();
        });


        // $('.postActionclientapprovetextcheck').bootstrapToggle({
        //     on: '<i class="fas fa-check"></i>',
        //     off: '<i class="fas fa-times"></i>'
        // });



        //select 2
        // $('.select2').select2({
        //     'width': '100%',
        // });

    });//end of document ready

    CKEDITOR.config.language = "{{ app()->getLocale() }}";

</script>

@stack('scripts')

</body>
</html>
