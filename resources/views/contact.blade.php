@extends('layouts.app')

@section('title', "@lang('messages.nav.contact')")

@section('sidebar')
    @parent
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>@lang('messages.nav.contact')</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="{{ route('home.show') }}">@lang('messages.nav.home')</a> <span class="divider">/</span></li>
                        <li class="active">@lang('messages.nav.contact')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->
@endsection

@section('content')
    <section id="localization" class="no-margin" data-bind="html: company.COM_IFRAME"></section>

    <section id="contact-page" class="container">
        <div class="row-fluid">

            <!-- ko with: contact -->
            <div class="span8">

                <h4>Formulário de Contato</h4>

                <div class="status alert alert-success"
                    data-bind="visible: success" style="display: none">E-mail enviado com sucesso!</div>

                <form id="main-contact-form" class="contact-form">
                    <div class="row-fluid">
                        <div class="span5">
                            <div class="control-group" data-bind="css: {error: error() && !name()}">
                                <label>Nome</label>
                                <input type="text" class="input-block-level" data-bind="value: name">
                            </div>
                            <div class="control-group" data-bind="css: {error: error() && !lastName()}">
                                <label>Sobrenome</label>
                                <input type="text" class="input-block-level" data-bind="value: lastName">
                            </div>
                            <div class="control-group" data-bind="css: {error: error() && !email()}">
                                <label>Email</label>
                                <input type="text" class="input-block-level" data-bind="value: email">
                            </div>
                            <div class="control-group" data-bind="css: {error: error() && !phone()}">
                                <label>Phone</label>
                                <input type="text" class="input-block-level" data-bind="value: phone">
                            </div>
                        </div>
                        <div class="span7">
                            <div class="control-group" data-bind="css: {error: error() && !message()}">
                                <label>Mensagem</label>
                                <textarea name="message"class="input-block-level" rows="8" data-bind="value: message"></textarea>
                            </div>
                        </div>

                    </div>
                    <button type="button" class="btn btn-primary btn-large pull-right" data-bind="click: send">Send Message</button>
                    <p> </p>

                </form>
            </div>
            <!-- /ko -->

            <!-- ko with: company -->
            <div class="span3">
                <h4>Nosso endereço</h4>
                <p>
                    <i class="icon-map-marker pull-left"></i><span data-bind="text: COM_ADDRESS"></span>
                </p>
                <p>
                    <i class="icon-envelope"></i> <span data-bind="text: COM_EMAIL"></span>
                </p>
                <p>
                    <i class="icon-phone"></i> <span data-bind="text: COM_TELEPHONE"></span>
                </p>
            </div>
            <!-- /ko -->
        </div>

    </section>
@endsection

@section('scripts')
    <script type="text/javascript">

        var viewModel,
            url_contact = "{{ route('contact.send') }}";

        function Contact()
        {
            var self= this;

            self.name = ko.observable();
            self.lastName = ko.observable();
            self.email = ko.observable();
            self.phone = ko.observable();
            self.message = ko.observable();
            self.success = ko.observable();
            self.error = ko.observable();

            self.send = function() {

                if (!self.name() ||
                    !self.lastName() ||
                    !self.email() ||
                    !self.phone() ||
                    !self.message())
                {
                    self.error(true);
                    return;
                }

                var data = {
                    name: self.name(),
                    lastName: self.lastName(),
                    email: self.email(),
                    phone: self.phone(),
                    message: self.message(),
                    _token: '{{ csrf_token() }}',
                
                },
                callback = function(data)
                {   
                    if (data.status)
                    {
                        self.success(true);
                    }
                };

                Api.post(url_contact, data, callback);
            }
        }

        function ViewModel()
        {
            var self = this;
            self.contact = new Contact();
        }        

        viewModel = new ViewModel();
        ko.applyBindings(viewModel, document.getElementById('localization'));
        ko.applyBindings(viewModel, document.getElementById('contact-page'));
    </script>
@endsection