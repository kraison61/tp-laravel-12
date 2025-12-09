

<header class="fixed-top scroll-change" data-menu-anima="fade-in">
    <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
        <div class="navbar-mini scroll-hide">
            <div class="container">
                <div class="nav navbar-nav navbar-left">
                    <span><i class="fa fa-phone"></i>1-800-405-377</span>
                    <hr />
                    <span><i class="fa fa-envelope"></i>info@company.com</span>
                    <hr />
                    <span>  <i class="fa fa-map-marker"></i>Collins Street 8007, USA</span>
                    <hr />
                    <span><i class="fa fa-calendar"></i>Mon - Sat: 8.00 - 19:00</span>
                </div>
                <div class="nav navbar-nav navbar-right">
                    <div class="minisocial-group">
                        <a target="_blank" href="#"><i class="fa fa-facebook first"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-instagram"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-youtube"></i></a>
                        <a target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-main">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html" style="height:110px">
                        {{-- <img class="logo-default" src="../images/logo.png" alt="logo" /> --}}
                        <img class="logo-default" src="../images/tp-logo.svg" alt="logo" />
                        <img class="logo-retina" src="../images/logo-retina.png" alt="logo" />
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown active">
                            <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown" role="button">หน้าหลัก</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">บริการ <span class="caret"></span></a>
                            <ul class="dropdown-menu multi-level">
                                @foreach($headerServices as $service)
                                            <li><a href="about-us-1.html">{{ Str::limit($service->kw_title, 20, '...') }}</a></li>
                                        @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">ภาพ & วิดีโอ </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Blog <span class="caret"></span></a>
                            <ul class="dropdown-menu multi-level">
                                <li><a href="blog-grid.html">Grid</a></li>
                                <li><a href="blog-social.html">Social</a></li>
                                <li><a href="blog-classic.html">Classic</a></li>
                                <li class="dropdown dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Single post</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="blog-single-1.html">Post single 1</a></li>
                                        <li><a href="blog-single-2.html">Post single 2</a></li>
                                        <li><a href="blog-single-3.html">Post single 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown mega-dropdown mega-tabs">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Elements <span class="caret"></span></a>
                            <div class="mega-menu dropdown-menu multi-level row bg-menu">
                                <div class="tab-box" data-tab-anima="fade-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#">Components</a></li>
                                        <li><a href="#">Headers</a></li>
                                        <li><a href="#">Titles</a></li>
                                    </ul>
                                    <div class="panel active">
                                        <div class="col">
                                            <h5>Components</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-cubes"></i> <a href="features/components/icons.html">Icons</a></li>
                                                <li><i class="fa-li fa fa-plus"></i> <a href="features/components/counters-countdown.html">Counters</a></li>
                                                <li><i class="fa-li fa fa-clock-o"></i> <a href="features/components/counters-countdown.html">Countdowns</a></li>
                                                <li><i class="fa-li fa fa-tasks"></i> <a href="features/components/progress-bars.html">Progress bars</a></li>
                                                <li><i class="fa-li fa fa-circle-o"></i> <a href="features/components/progress-bars.html">Circle progress bars</a></li>
                                                <li><i class="fa-li fa fa-calendar"></i> <a href="features/components/timeline.html">Timeline</a></li>
                                                <li><i class="fa-li fa fa-map-marker"></i> <a href="features/components/maps.html">Google maps</a></li>
                                                <li><i class="fa-li fa fa-table"></i> <a href="features/components/tables.html">Advanced table</a></li>
                                                <li><i class="fa-li fa fa-envelope-o"></i> <a href="features/components/php-contact-form.html">Contact form</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Main components</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-cube"></i> <a href="features/components/buttons.html">Buttons</a></li>
                                                <li><i class="fa-li fa fa-photo"></i> <a href="features/components/image-boxes.html">Image boxes</a></li>
                                                <li><i class="fa-li fa fa-photo"></i> <a href="features/components/image-boxes-advanced.html">Advanced image boxes</a></li>
                                                <li><i class="fa-li fa fa-th-large"></i> <a href="features/components/content-box.html">Content boxes</a></li>
                                                <li><i class="fa-li fa fa-facebook-official"></i> <a href="features/components/social-media.html">Social media</a></li>
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/components/lists.html">Lists</a></li>
                                                <li><i class="fa-li fa fa-paragraph"></i> <a href="features/components/typography.html">Typography</a></li>
                                                <li><i class="fa-li fa fa-list-ol"></i> <a href="features/containers/list-grid.html">Grid</a></li>
                                                <li><i class="fa-li fa fa-list-ol"></i> <a href="features/containers/list-masonry.html">Masonry</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Containers</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-expand"></i> <a href="features/containers/lightbox.html">Lightbox and popups</a></li>
                                                <li><i class="fa-li fa fa-sliders"></i> <a href="features/containers/sliders.html">Sliders and carousels</a></li>
                                                <li><i class="fa-li fa fa-toggle-down"></i> <a href="features/containers/scroll-box-collapse.html">Scroll box</a></li>
                                                <li><i class="fa-li fa fa-minus"></i> <a href="features/containers/scroll-box-collapse.html">Collapse box</a></li>
                                                <li><i class="fa-li fa fa-square-o"></i> <a href="features/containers/tabs.html">Tabs</a></li>
                                                <li><i class="fa-li fa fa-minus-square-o"></i> <a href="features/containers/accordions.html">Accordions</a></li>
                                                <li><i class="fa-li fa fa-download"></i> <a href="features/footers/parallax.html">Footer parallax</a></li>
                                                <li><i class="fa-li fa fa-download"></i> <a href="features/footers/minimal.html">Footer minimal</a></li>
                                                <li><i class="fa-li fa fa-download"></i> <a href="features/footers/base.html">Footer base</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Sections</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-photo"></i> <a href="features/containers/section-background-image.html">Background image</a></li>
                                                <li><i class="fa-li fa fa-photo"></i> <a href="features/containers/section-background-image-parallax.html">Background parallax</a></li>
                                                <li><i class="fa-li fa fa-sliders"></i> <a href="features/containers/section-slider.html">Slider</a></li>
                                                <li><i class="fa-li fa fa-film"></i> <a href="features/containers/section-background-video.html">Background video</a></li>
                                                <li><i class="fa-li fa fa-leaf"></i> <a href="features/containers/section-animations.html">Bg animations</a></li>
                                                <li><i class="fa-li fa fa-leaf"></i> <a href="features/containers/section-animations-parallax.html">Bg animations parallax</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <div class="col">
                                            <h5>Horizontal menus</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/menus/classic.html">Menu classic</a></li>
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/menus/classic-transparent.html">Menu classic transparent</a></li>
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/menus/big-logo.html">Menu big logo</a></li>
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/menus/subline.html">Menu subline</a></li>
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/menus/subtitle.html">Menu subtitle</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Horizontal menus</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/menus/middle-logo.html">Menu middle logo</a></li>
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/menus/middle-logo-top.html">Menu middle logo top</a></li>
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/menus/middle-box.html">Menu middle box</a></li>
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/menus/icons.html">Menu icons</a></li>
                                                <li><i class="fa-li fa fa-list"></i> <a href="features/menus/icons-top.html">Menu icons top</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Side menus</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-bars"></i> <a href="features/menus/side.html">Side classic</a></li>
                                                <li><i class="fa-li fa fa-bars"></i> <a href="features/menus/side-lateral.html">Side lateral</a></li>
                                                <li><i class="fa-li fa fa-bars"></i> <a href="features/menus/side-simple.html">Side simple</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <div class="col">
                                            <h5>Image background</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-photo"></i> <a href="features/titles/image.html">Image background</a></li>
                                                <li><i class="fa-li fa fa-photo"></i> <a href="features/titles/image-fullscreen.html">Image full-screen</a></li>
                                                <li><i class="fa-li fa fa-photo"></i> <a href="features/titles/image-fullscreen-parallax.html">Image full-screen parallax</a></li>
                                                <li><i class="fa-li fa fa-photo"></i> <a href="features/titles/image-parallax.html">Image parallax</a></li>
                                                <li><i class="fa-li fa fa-photo"></i> <a href="features/titles/image-parallax-ken-burn.html">Image parallax ken-burn</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Video background</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-film"></i> <a href="features/titles/video-mp4.html">Video background MP4</a></li>
                                                <li><i class="fa-li fa fa-film"></i> <a href="features/titles/video-youtube.html">Video background Youtube</a></li>
                                                <li><i class="fa-li fa fa-film"></i> <a href="features/titles/video-fullscreen.html">Video full-screen</a></li>
                                                <li><i class="fa-li fa fa-film"></i> <a href="features/titles/video-fullscreen-parallax.html">Video full-screen parallax</a></li>
                                                <li><i class="fa-li fa fa-film"></i> <a href="features/titles/video-parallax.html">Video parallax</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Others</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-dot-circle-o"></i><a href="features/titles/base-1.html">Title base 1</a></li>
                                                <li><i class="fa-li fa fa-dot-circle-o"></i><a href="features/titles/base-2.html">Title base 2</a></li>
                                                <li><i class="fa-li fa fa-leaf"></i> <a href="features/titles/animation.html">Animation background</a></li>
                                                <li><i class="fa-li fa fa-leaf"></i> <a href="features/titles/animation-parallax.html">Animation parallax</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Slider background</h5>
                                            <ul class="fa-ul text-s">
                                                <li><i class="fa-li fa fa-sliders"></i> <a href="features/titles/slider.html">Slider background</a></li>
                                                <li><i class="fa-li fa fa-sliders"></i> <a href="features/titles/slider-fullscreen.html">Slider full-screen</a></li>
                                                <li><i class="fa-li fa fa-sliders"></i> <a href="features/titles/slider-fullscreen-parallax.html">Slider full-screen parallax</a></li>
                                                <li><i class="fa-li fa fa-sliders"></i> <a href="features/titles/slider-parallax.html">Slider parallax</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="nav navbar-nav navbar-right">
                        <div class="search-box-menu">
                            <div class="search-box scrolldown">
                                <input type="text" class="form-control" placeholder="Search for...">
                            </div>
                            <button type="button" class="btn btn-default btn-search">
                                <span class="fa fa-search"></span>
                            </button>
                        </div>
                        <ul class="nav navbar-nav lan-menu">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><img src="../images/en.png" alt="" />En<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><img src="../images/it.png" alt="" />IT</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
