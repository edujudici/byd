<!--Bottom-->
<section id="bottom" class="main">
    <!--Container-->
    <div class="container">

        <!--row-fluids-->
        <div class="row-fluid">

            <!--Contact Form-->
            <!-- ko with: company -->
            <div class="span4 pull-left">
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
            <!-- /ko-->
            <!--End Contact Form-->

            

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
                <form class="contact-form">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group">
                                <label>Nome</label>
                                <input type="text" class="input-block-level">
                            </div>
                            <div class="control-group">
                                <label>E-mail</label>
                                <input type="text" class="input-block-level">
                            </div>
                            
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

            {{-- <div class="span3">
                <h4>FLICKR GALLERY</h4>
                <div class="row-fluid first">
                        <ul class="thumbnails">
                          <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829540293/" title="01 (254) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg" width="75" height="75" alt="01 (254)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829537417/" title="01 (196) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg" width="75" height="75" alt="01 (196)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829527437/" title="01 (65) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg" width="75" height="75" alt="01 (65)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829524451/" title="01 (6) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg" width="75" height="75" alt="01 (6)"></a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <ul class="thumbnails">
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829524451/" title="01 (6) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7148/6829524451_a725793358_s.jpg" width="75" height="75" alt="01 (6)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829540293/" title="01 (254) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7003/6829540293_bd99363818_s.jpg" width="75" height="75" alt="01 (254)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829537417/" title="01 (196) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7013/6829537417_465d28e1db_s.jpg" width="75" height="75" alt="01 (196)"></a>
                        </li>
                        <li class="span3">
                            <a href="http://www.flickr.com/photos/76029035@N02/6829527437/" title="01 (65) by Victor1558, on Flickr"><img src="http://farm8.staticflickr.com/7021/6829527437_88364c7ec4_s.jpg" width="75" height="75" alt="01 (65)"></a>
                        </li>
                    </ul>
                </div>
            </div> --}}

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

    function ViewModel()
    {
        var self = this;

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

