<!--Header-->
<header class="navbar navbar-fixed-top">
    <div class="navbar-inner" style="height: 100px">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a id="logo" class="pull-left" href="{{ route('home.show') }}"></a>
            <div class="nav-collapse collapse pull-right" style="padding-top: 10px">
                <ul class="nav">
                    <li {{-- class="active" --}}><a href="{{ route('home.show') }}">@lang('messages.nav.home')</a></li>
                    <li><a href="{{ route('about.show') }}">@lang('messages.nav.about')</a></li>
                    <li><a href="{{ route('services.show') }}">@lang('messages.nav.services')</a></li>
                    <li><a href="{{ route('portifolio.show') }}">@lang('messages.nav.portifolio')</a></li>
                    {{--  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="career.html">Career</a></li>
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="registration.html">Registration</a></li>
                            <li class="divider"></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="terms.html">Terms of Use</a></li>
                        </ul>
                    </li>--}}
                    {{-- <li><a href="{{ route('blog.show') }}">@lang('messages.nav.blog')</a></li>  --}}
                    <li><a href="{{ route('contact.show') }}">@lang('messages.nav.contact')</a></li>
                    {{-- <li class="login">
                        <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                    </li> --}}
                </ul>        
            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>
<!-- /header -->