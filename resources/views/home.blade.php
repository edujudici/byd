@extends('layouts.app')

@section('title', trans('messages.nav.home'))

@section('sidebar')
    @parent
@endsection

@section('content')

    <!--Slider-->
    <section id="slide-show">
        <div id="slider" class="sl-slider-wrapper">

            <!--Slider Items-->    
            <div class="sl-slider">
                <!-- ko foreach: banners-->
                <div class="sl-slide item1" data-orientation="horizontal" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                    <div class="sl-slide-inner" data-bind="style: {'background-color':  color }" style="background: #ccc !important">
                        <div class="container">
                            <img class="pull-right" alt="" data-bind="attr: {src: image}" style="width: 55%" />
                            <h2 data-bind="text: title, style: {'color': fontColor}"></h2>
                            <h3 class="gap" data-bind="text: description, style: {'color': fontColor}"></h3>
                            <a class="btn btn-large btn-transparent" data-bind="attr: {href: link}, visible: link">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- /ko -->
            </div>
            <!--/Slider Items-->

            <!--Slider Next Prev button-->
            <nav id="nav-arrows" class="nav-arrows">
                <span class="nav-arrow-prev"><i class="icon-angle-left"></i></span>
                <span class="nav-arrow-next"><i class="icon-angle-right"></i></span> 
            </nav>
            <!--/Slider Next Prev button-->
        </div>
        <!-- /slider-wrapper -->           
    </section>
    <!--/Slider-->

    <!--Services-->
    <section id="services" data-bind="visible: servicesOfferGroup().length > 0">
        <div class="container">
            <div class="center gap">
                <h3>O que nós oferecemos</h3>
                <p class="lead">Confira alguns serviços disponibilizado na BYD Escola de Idiomas.</p>
            </div>

            <!-- ko foreach: servicesOfferGroup -->
                <div class="row-fluid">
                    <!-- ko foreach: $data -->
                        <div class="span4">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="icon-medium" data-bind="css: SEO_ICON"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading" data-bind="text: SEO_TITLE"></h4>
                                    <p data-bind="text: SEO_DESCRIPTION"></p>
                                </div>
                            </div>
                        </div>
                    <!-- /ko -->
                </div>
                <div class="gap"></div>
            <!-- /ko -->            

        </div>
    </section>
    <!--/Services-->

    <hr>

    <section id="videos">
        <div class="container">
            <div class="center">
                <h3>Videos</h3>
                <p class="lead">Clique para assistir aos vídeos de nossos parceiros e alunos contando experiencias do intercâmbio. </p>
            </div>  
            <div class="gap"></div>

            <!-- ko foreach: videos -->
                <div class="span4" style="padding: 0 10px">
                    <h4 data-bind="text: VID_TITLE"></h4 >
                    <div class="flex-video widescreen"><iframe data-bind="attr: {src: VID_URL}" frameborder="0" allowfullscreen=""></iframe></div>
                    <p data-bind="text: VID_DESCRIPTION"></p>
                </div>
            <!-- /ko -->
        </div>

    </section>

    <section id="clients" class="main" data-bind="visible: partnersGroup().length > 0">
        <div class="container">
            <div class="row-fluid">
                <div class="span2">
                    <div class="clearfix">
                        <h4 class="pull-left">Nossos parceiros</h4>
                        <div class="pull-right">
                            <a class="prev" href="#myCarousel" data-slide="prev"><i class="icon-angle-left icon-large"></i></a> <a class="next" href="#myCarousel" data-slide="next"><i class="icon-angle-right icon-large"></i></a>
                        </div>
                    </div>
                    <p>Entidades parceiras onde disponibilizam serviços para aperfeiçoar neste caminho de aprendizagem.</p>
                </div>
                <div class="span10">
                    <div id="myCarousel" class="carousel slide clients">
                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <!-- ko foreach: partnersGroup-->
                            <div class="item" data-bind="css: {'active': $index() == 0}">
                                <div class="row-fluid">
                                    <ul class="thumbnails">
                                        <!-- ko foreach: $data-->
                                            <li class="span3">
                                                <a data-bind="attr: {href: link}">
                                                    <img src="" data-bind="attr: {src: image}">
                                                </a>
                                            </li>
                                        <!-- /ko -->
                                    </ul>
                                </div>
                            </div>
                            <!-- /ko -->
                            
                        </div>
                        <!-- /Carousel items -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">

        var response =  {!! $response !!};

        function Banner(obj)
        {
            var self = this;

            self.title       = obj.BAN_TITLE;
            self.description = obj.BAN_DESCRIPTION;
            self.link        = obj.BAN_LINK;
            self.color        = obj.BAN_COLOR;
            self.fontColor        = obj.BAN_FONT_COLOR;
            self.image       = ko.observable();

            self.setImage = function(data)
            {
                self.image(data);
            }

            self.loadImage = function(imageId)
            {
                Api.get(Api.url(imageId), self.setImage);                    
            }
            self.loadImage(obj.BAN_IMAGE_ID);
        }

        function Partner(obj)
        {
            var self = this;

            self.link    = obj.PAR_LINK;            
            self.image   = ko.observable();

            self.setImage = function(data)
            {
                self.image(data);
            }

            self.loadImage = function(imageId)
            {
                Api.get(Api.url(imageId), self.setImage);                    
            }
            self.loadImage(obj.PAR_IMAGE_ID);
        }

        function ViewModel()
        {
            var self = this;

            self.banners = ko.observableArray();
            self.partners = ko.observableArray();
            self.servicesOffer = ko.observableArray();
            self.videos = ko.observableArray();

            self.setData = function(response)
            {

                if (response.status)
                {
                    self.banners(ko.utils.arrayMap(response.data.banners, function(obj) {
                        return new Banner(obj);
                    }));
                    self.partners(ko.utils.arrayMap(response.data.partners, function(obj) {
                        return new Partner(obj);
                    }));
                    self.servicesOffer(response.data.servicesOffer);
                    self.videos(response.data.videos);
                }
            };            

            self.partnersGroup = ko.computed(function()
            {
               return Api.groupList(self.partners(), 4);
            });

            self.servicesOfferGroup = ko.computed(function()
            {
               return Api.groupList(self.servicesOffer(), 3);
            });            
        }        

        var viewModel = new ViewModel();
        viewModel.setData(response);
        ko.applyBindings(viewModel, document.getElementById('slide-show'));
        ko.applyBindings(viewModel, document.getElementById('services'));
        ko.applyBindings(viewModel, document.getElementById('videos'));
        ko.applyBindings(viewModel, document.getElementById('clients'));
    </script>
@endsection