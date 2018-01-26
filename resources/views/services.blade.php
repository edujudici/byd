@extends('layouts.app')

@section('title', "@lang('messages.nav.services')")

@section('sidebar')
    @parent
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>@lang('messages.nav.services')</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="{{ route('home.show') }}">@lang('messages.nav.home')</a> <span class="divider">/</span></li>
                        <li class="active">@lang('messages.nav.services')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->
@endsection

@section('content')
    <section id="koServices" class="services">
        <div class="container">

            <!-- ko foreach: servicesGroup-->
                <div class="row-fluid">
                    <!-- ko foreach: $data-->
                        <div class="span4">
                            <div class="center">
                                <i style="font-size: 48px" class="icon-large" data-bind="css: SER_ICON"></i>
                                <p> </p>
                                <h4 data-bind="text: SER_TITLE"></h4>
                                <p data-bind="text: SER_DESCRIPTION"></p>
                            </div>
                        </div>
                    <!-- /ko -->
                </div>
                <hr>
            <!-- /ko -->

        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">

        var response =  {!! $response !!};

        function ViewModel()
        {
            var self = this;

            self.services = ko.observableArray();

            self.setData = function(response)
            {

                if (response.status)
                {
                    self.services(response.data.services);
                }
            };            

            self.servicesGroup = ko.computed(function()
            {
               return Api.groupList(self.services(), 3);
            });
            
        }

        var viewModel = new ViewModel();
        viewModel.setData(response);
        ko.applyBindings(viewModel, document.getElementById('koServices'));
    </script>
@endsection