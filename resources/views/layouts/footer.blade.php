<!--Bottom-->
<section id="bottom" class="main">
    <!--Container-->
    <div class="container">

        <!--row-fluids-->
        <div class="row-fluid" style="padding-left: 10px">

            <!--Address-->
            <div class="span4 pull-left" data-bind="with: company">
                <h4>Endereço</h4>
                <ul class="unstyled address">
                    <li>
                        <i class="icon-home"></i><strong>Endereço:</strong> <span data-bind="text: COM_ADDRESS"></span>
                    </li>
                    <li>
                        <i class="icon-envelope"></i>
                        <strong>Email: </strong> <span data-bind="text: COM_EMAIL"></span>
                    </li>
                    <li>
                        <i class="icon-phone"></i>
                        <strong>Telefone:</strong> <span data-bind="text: COM_TELEPHONE"></span>
                    </li>
                </ul>
            </div>
            <!--End Address-->

            <!--Important Links-->
            <div id="tweets" class="span4">
                <h4>Nossa Companhia</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="{{ route('about.show') }}">@lang('messages.footer.about')</a></li>
                        <li><a href="#">@lang('messages.footer.terms')</a></li>
                        <li><a href="#">@lang('messages.footer.privacy')</a></li>
                        <li><a href="#">@lang('messages.footer.copyright')</a></li>
                        <li><a href="#">@lang('messages.footer.blog')</a></li>
                    </ul>
                </div>  
            </div>
            <!--Important Links-->

            <div class="span4">
                <h4>Newsletter</h4>
                <p>Cadastre-se e receba todas as novidades de promoção e conteúdo.</p>

                <form class="contact-form" data-bind="with: newsletter">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group" data-bind="css: {error: error() && !name()}">
                                <label>Nome</label>
                                <input type="text" class="input-block-level" data-bind="value: name" style="width: 95%">
                            </div>
                            <div class="control-group" data-bind="css: {error: error() && !email()}">
                                <label>E-mail</label>
                                <input type="text" class="input-block-level" data-bind="value: email" style="width: 95%">
                            </div>

                            <div class="status alert alert-success"
                                data-bind="visible: success" style="display: none">Cadastro realizado com sucesso!</div>

                            <button type="button" class="btn btn-primary btn-large" data-bind="click: save">Confimar</button>
                        </div>
                    </div>
                </form>
            </div>

            <!--Archives-->
           {{--  <div id="archives" class="span3">
                <h4>ARCHIVES</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="#">December 2012 (1)</a></li>
                        <li><a href="#">November 2012 (5)</a></li>
                        <li><a href="#">October 2012 (8)</a></li>
                        <li><a href="#">September 2012 (10)</a></li>
                        <li><a href="#">August 2012 (29)</a></li>
                        <li><a href="#">July 2012 (1)</a></li>
                        <li><a href="#">June 2012 (31)</a></li>
                    </ul>
                </div>
            </div> --}}
            <!--End Archives-->

        </div>
        <!--/row-fluid-->
    </div>
    <!--/container-->
</section>
<!--/bottom-->

<!--Footer-->
<footer id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span5 cp">
                &copy; 2018 <a target="_blank" title="BYD IDIOMAS">BYD</a>. All Rights Reserved.
            </div>
            <!--/Copyright-->

            <div class="span6">
                <ul class="social pull-right">
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-google-plus"></i></a></li>                       
                    <li><a href="#"><i class="icon-youtube"></i></a></li>
                    <li><a href="#"><i class="icon-tumblr"></i></a></li>                        
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    <li><a href="#"><i class="icon-rss"></i></a></li>
                    <li><a href="#"><i class="icon-github-alt"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>                   
                </ul>
            </div>

            <div class="span1">
                <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
            </div>
            <!--/Goto Top-->
        </div>
    </div>
</footer>
<!--/Footer-->

<script type="text/javascript">

    var viewModel,
        urlNewsletterSave = "{{ route('newsletter.save') }}";

    function Newsletter()
    {
        var self= this;

        self.name = ko.observable();
        self.email = ko.observable();
        self.success = ko.observable();
        self.error = ko.observable();

        self.save = function() {

            if (!self.name() ||
                !self.email())
            {
                self.error(true);
                return;
            }

            var data = {
                name: self.name(),
                email: self.email(),
                _token: '{{ csrf_token() }}',
            
            },
            callback = function(data)
            {   
                if (data.status)
                {
                    self.success(true);
                }
            };

            Api.post(urlNewsletterSave, data, callback);
        }
    }

    function ViewModel()
    {
        var self = this;

        self.newsletter = new Newsletter();

        self.company;
        self.setData = function()
        {
            self.company = company;
        }
    }

    var viewModel = new ViewModel();
    viewModel.setData();
    ko.applyBindings(viewModel, document.getElementById('bottom'));
</script>

