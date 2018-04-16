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

        <div class="row-fluid" style="margin-bottom: 25px">
            <!-- ko foreach: types -->
                <button type="button" class="btn btn-primary btn-large" data-bind="text: POT_TITLE, click: $root.setType" style="margin-bottom: 3px"></button>
            <!-- /ko -->
        </div>

        <!-- ko foreach: portfolioGroup-->
            <div class="row-fluid">
                <!-- ko foreach: $data-->
                    <ul class="gallery col-4">
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
                    </ul>
                <!-- /ko -->
            </div>
        <!-- /ko -->
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
            self.type        = obj.POT_ID;
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
            self.types = ko.observableArray();
            self.typeId = ko.observable();

            self.setData = function(response)
            {
                if (response.status)
                {
                    self.portfolio(ko.utils.arrayMap(response.data.portfolio, function(obj) {
                        return new Portfolio(obj);
                    }));

                    self.types(response.data.types);
                    self.types.splice(0,0,{'POT_ID':0, 'POT_TITLE': 'TODOS'});
                }
            };

            self.portfolioGroup = ko.computed(function()
            {
                var lista;

                if (!self.typeId() || self.typeId() == 0)
                {
                    lista = self.portfolio();
                }
                else
                {
                    lista = ko.utils.arrayFilter(self.portfolio(), function(item)
                    {
                        return item.type == self.typeId();
                    });
                }

                return Api.groupList(lista, 4);
            });   

            self.setType = function(item)
            {
                self.typeId(item.POT_ID);
            };
        }        

        var viewModel = new ViewModel();
        viewModel.setData(response);
        ko.applyBindings(viewModel, document.getElementById('portfolio'));
    </script>
@endsection