@extends('layouts.app')

@section('title', "@lang('messages.nav.portifolio')")

@section('sidebar')
    @parent
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>@lang('messages.nav.portifolio')</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="{{ route('home.show') }}">@lang('messages.nav.home')</a> <span class="divider">/</span></li>
                        <li class="active">@lang('messages.nav.portifolio')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->
@endsection

@section('content')
    <section id="portfolio" class="container main">    
        <ul class="gallery col-4">
            <!-- ko foreach: portfolio-->
            <li>
                <div class="preview">
                    <img alt="" data-bind="attr: {src: image}">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" data-bind="attr: {href: '#modal-'+$index()}"><i class="icon-eye-open"></i></a><a href="#"><i class="icon-link"></i></a>                                
                    </div>
                </div>
                <div class="desc">
                    <h5 data-bind="text: title"></h5>
                    <small data-bind="text: description"></small>
                </div>
                <div class="modal hide fade" data-bind="attr: {id: 'modal-'+$index()}">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img data-bind="attr: {src: image}" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>                 
            </li>
            <!-- /ko -->

        </ul>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">

        var response =  {!! $response !!};

        function Portfolio(obj)
        {
            var self = this;

            self.title       = obj.POR_TITLE
            self.description = obj.POR_DESCRIPTION
            self.image       = ko.observable();

            self.setImage = function(data)
            {
                self.image(data);
            }

            self.loadImage = function(imageId)
            {
                Api.get(Api.url(imageId), self.setImage);                    
            }
            self.loadImage(obj.POR_IMAGE_ID);
        }
        
        function ViewModel()
        {
            var self = this;

            self.portfolio = ko.observableArray();

            self.setData = function(response)
            {
                if (response.status)
                {
                    self.portfolio(ko.utils.arrayMap(response.data.portfolio, function(obj) {
                        return new Portfolio(obj);
                    }));
                }
            };            
        }        

        var viewModel = new ViewModel();
        viewModel.setData(response);
        ko.applyBindings(viewModel, document.getElementById('portfolio'));
    </script>
@endsection