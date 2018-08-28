<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      @include('inc.navbar')

       <div class="container">
           <div class="row">

              @if(Auth::check()) {{-- check for authentication --}}
                   <div class="col-lg-3">
                   {{-- sidenav bar --}}
                      <ul class="list-group list-striped">
                          <li class="list-group-item bg-dark">
                              <a href="/home">Home</a>
                          </li>

                          <li class="list-group-item bg-dark">
                              <a href="{{route('posts')}}">Posts</a>
                          </li>

                          @if (Auth::user()->admin)
                            <li class="list-group-item bg-dark">
                                <a href="{{route('user.index')}}">Users</a>
                            </li>
                          @endif

                          <li class="list-group-item bg-dark">
                              <a href="{{route('category.index')}}">Categories</a>
                          </li>

                          <li class="list-group-item bg-dark">
                              <a href="{{route('tag.index')}}">Tags</a>
                          </li>

                          <li class="list-group-item bg-dark">
                              <a href="{{route('post.trash')}}">Trashed post</a>
                          </li>

                          <li class="list-group-item bg-dark">
                              <a href="{{route('user.profile')}}">My profile</a>
                          </li>

                          @if (Auth::user()->admin)
                            <li class="list-group-item bg-dark">
                                <a href="{{route('user.create')}}">Create a new user +</a>
                            </li>
                          @endif

                          <li class="list-group-item bg-dark">
                              <a href="{{route('post.create')}}">Create a new post +</a>
                          </li>

                          <li class="list-group-item bg-dark">
                              <a href="{{route('category.create')}}">Create a new Category +</a>
                          </li>

                          <li class="list-group-item bg-dark">
                              <a href="{{route('tag.create')}}">Create a new tag +</a>
                          </li>

                          @if (Auth::user()->admin)
                            <li class="list-group-item bg-dark">
                                <a href="{{route('setting.index')}}">Settings</a>
                            </li>
                          @endif
                      </ul>
                  </div>
              @endif

               <div class="col-lg-9">
                   @yield('content')
               </div>

           </div>
       </div>
    </div>
    {{-- SESSIONS TOASTR FOR FLASH MESSAGES --}}
    <script>
        @if(Session::has('success'))
          toastr.success("{{Session::get('success')}}")
        @endif

        @if(Session::has('info'))
          toastr.info("{{Session::get('info')}}")
        @endif
    </script>
</body>
</html>
