<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')

            <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Languages
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach(config('app.languages') as $lang)
                       <li class="{{ session('locale') == $lang ? 'active' : '' }}">
                            <a href="/language?lang={{ $lang }}" >{{ $lang }}</a>
                       </li>
                    @endforeach
                  </ul>
            </div>

            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>