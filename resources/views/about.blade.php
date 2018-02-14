@extends('layouts.app')

@section('title', "@lang('messages.nav.about')")

@section('sidebar')
    @parent
	<section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>@lang('messages.nav.about')</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="{{ route('home.show') }}">@lang('messages.nav.home')</a> <span class="divider">/</span></li>
                        <li class="active">@lang('messages.nav.about')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->
@endsection

@section('content')
    <section id="about-us" class="container main">

        <div class="row-fluid">
            <div class="span12 center">
                <img alt="" data-bind="attr: {src: image}" />
            </div>
        </div>

        <div class="row-fluid">
            <!-- ko with: whatWeAre -->
            <div class="span6">
                <h2 data-bind="text: ABO_TITLE"></h2>
                <p class="justify-text" data-bind="text: ABO_DESCRIPTION"></p>
            </div>
            <!-- /ko -->
            
            <!-- ko with: ourHistory -->
            <div class="span6">
                <h2 data-bind="text: ABO_TITLE"></h2>
                <p class="justify-text" data-bind="text: ABO_DESCRIPTION"></p>
            </div>
            <!-- /ko -->
            
        </div>

        <hr>

        <div class="row-fluid">
            
            <!-- ko with: whyChooseUs -->
            <div class="span6">
                <h2 data-bind="text: ABO_TITLE"></h2>
                <p class="justify-text" data-bind="text: ABO_DESCRIPTION"></p>
            </div>
            <!-- /ko -->

            <div class="span6" data-bind="visible: ourServices().length > 0">
                <h3>Nossos serviços</h3>
                <div class="accordion" id="accordion2">

                    <!-- ko foreach: ourServices -->                    
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a
                                class="accordion-toggle collapsed"
                                data-toggle="collapse"
                                data-parent="#accordion2"
                                href="#collapseOne"
                                data-bind="text: ABO_TITLE, attr: {href: '#collapse'+$index()}">
                            </a>
                        </div>
                        <div class="accordion-body collapse" data-bind="attr: {id: 'collapse'+$index()}">
                            <div class="accordion-inner" data-bind="text: ABO_DESCRIPTION"></div>
                        </div>
                    </div>
                    <!-- /ko -->
                    {{-- <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                Premium Wordpress Themes
                            </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                            <div class="accordion-inner">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                PSD2XHTML Conversion
                            </a>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse">
                            <div class="accordion-inner">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- ko if: team().length > 0 -->

            <!-- Meet the team -->
            <h1 class="center">Conheça Nosso Time</h1>

            <hr>

            <div class="row-fluid">

                <!-- ko foreach: team -->
                <div class="span3">
                    <div class="box">
                        <p><img src="images/sample/team1.jpg" alt="" ></p>
                        <h5 data-bind="text: TEA_NAME"></h5>
                        <p data-bind="text: TEA_DESCRIPTION"></p>
                        
                        <!-- ko foreach: team_social_network-->
                            <a class="btn btn-social" data-bind="attr: {href: TSN_LINK}, css: 'btn-'+TSN_ICON"><i data-bind="css: 'icon-'+TSN_ICON"></i></a>
                        <!-- /ko -->
                    </div>
                </div>
                <!-- /ko -->

            </div>
            <p>&nbsp;</p>
            <p></p>
            <hr>
        <!-- /ko -->
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">

        var response =  {!! $response !!},
            whatWeAre = {{ App\Models\About::WHAT_WE_ARE }},
            ourHistory = {{ App\Models\About::OUR_HISTORY }},
            whyChooseUs = {{ App\Models\About::WHY_CHOOSE_US }},
            ourServices = {{ App\Models\About::OUR_SERVICES }};

        function ViewModel()
        {
            var self = this;

            self.image = ko.observable();
            self.team = ko.observableArray();
            self.ourServices = ko.observableArray();
            self.whatWeAre;
            self.ourHistory;
            self.whyChooseUs;

            self.setData = function(response)
            {
                if (response.status) {
                    self.team(response.data.team);
                    
                    self.ourServices(ko.utils.arrayFilter(response.data.about, function(item) {
                        return item.ABO_TYPE == ourServices;
                    }));

                    self.whatWeAre = findByType(whatWeAre, response.data.about);
                    self.ourHistory = findByType(ourHistory, response.data.about);
                    self.whyChooseUs = findByType(whyChooseUs, response.data.about);

                    Api.get(Api.url(company.COM_IMAGE_ID), self.setImage);                    
                }
            };

            self.setImage = function(data)
            {
                self.image(data);
            };
        }

        function findByType(type, list)
        {
            return ko.utils.arrayFirst(list, function(item)
            {
                return item.ABO_TYPE == type;
            });
        }

        var viewModel = new ViewModel();
        viewModel.setData(response);
        ko.applyBindings(viewModel, document.getElementById('about-us'));
    </script>
@endsection