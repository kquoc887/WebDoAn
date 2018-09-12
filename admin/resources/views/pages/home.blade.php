@extends('Layout.index');
@section('content')
<div id="home">
    <!-- Start cSlider -->
    <div id="da-slider" class="da-slider">
        <div class="triangle"></div>
        <!-- mask elemet use for masking background image -->
        <div class="mask"></div>
        <!-- All slides centred in container element -->
        <div class="container">
            <!-- Start first slide -->
            <div class="da-slide">
                <h2 class="fittext2">Welcome to pluton theme</h2>
                <h4>Clean & responsive</h4>
                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p>
                <a href="#" class="da-link button">Đặt vé</a>
                <div class="da-img">
                    <img src="https://s3img.vcdn.vn/123phim/2018/06/show-dogs-15290285553466.jpg" alt="image01" width="320">
                </div>
            </div>
            <!-- End first slide -->
            <!-- Start second slide -->
            <div class="da-slide">
                <h2>Easy management</h2>
                <h4>Easy to use</h4>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <a href="#" class="da-link button">Đặt vé</a>
                <div class="da-img">
                    <img src="https://s3img.vcdn.vn/123phim/2018/06/time-trap-15296356073749.jpg" width="320" alt="image02">
                </div>
            </div>
            <!-- End second slide -->
            <!-- Start third slide -->
            <div class="da-slide">
                <h2>Revolution</h2>
                <h4>Customizable</h4>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                <a href="#" class="da-link button">Đặt vé</a>
                <div class="da-img">
                    <img src="https://s3img.vcdn.vn/123phim/2018/06/time-trap-15296356073749.jpg" width="320" alt="image03">
                </div>
            </div>
            <!-- Start third slide -->
            <!-- Start cSlide navigation arrows -->
            <div class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>
            </div>
            <!-- End cSlide navigation arrows -->
        </div>
    </div>
</div>
<!-- End home section -->
<!-- Service section start -->
<div class="section primary-section" id="service">
    <div class="container">
        <!-- Start title section -->
        <div class="title">
            <h1>Mua vé ngay</h1>
            <!-- Section's title goes here -->
            <select>
                <option value="default">Phim</option>
            </select>

            <select>
                <option value="default">Rạp</option>
            </select>

            <select>
                <option value="default">Ngày xem</option>
            </select>

            <select>
                <option value="default">Suất chiếu</option>
            </select>

            <input type="button" class="btn btn-success" id="btn-datve" value="Đặt vé" style=" margin-bottom: 10px">
            <!--Simple description for section goes here. -->
        </div>
    </div>
</div>
<!-- Service section end -->
<!-- Portfolio section start -->
<div class="section secondary-section " id="portfolio">
    <div class="triangle"></div>
    <div class="container">
        <div class=" title">
            <h1>Chọn Phim</h1>

        </div>
        <ul class="nav nav-pills">
            <li class="filter" data-filter="all">
                <a href="#noAction">Phim đang chiếu</a>
            </li>
            <li class="filter" data-filter="web">
                <a href="#noAction">Phim sắp chiếu</a>
            </li>
        </ul>
        <!-- Start details for portfolio project 1 -->
        <div id="single-project">
            <div id="slidingDiv" class="toggleDiv row-fluid single-project">
                <div class="span6">
                    <iframe  width="530" height="370" src="https://www.youtube.com/embed/F9Bo89m2f6g" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Chi tiết phim</h3>
                            <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Client</span>Some Client Name</div>
                            <div>
                                <span>Date</span>July 2013</div>
                            <div>
                                <span>Skills</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy.</p>

                        <a href="#" class="da-link button">Đặt vé</a>
                    </div>
                </div>
            </div>
            <!-- End details for portfolio project 1 -->
            <!-- Start details for portfolio project 2 -->
            <div id="slidingDiv1" class="toggleDiv row-fluid single-project">
                <div class="span6">
                    <iframe  width="530" height="370" src="https://www.youtube.com/embed/F9Bo89m2f6g" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Webste for Some Client</h3>
                            <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Tên phim</span>Some Client Name</div>
                            <div>
                                <span>Thời lượng</span>July 2013</div>
                            <div>
                                <span>Đạo diễn</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>Life is a song - sing it. Life is a game - play it. Life is a challenge - meet it. Life is a dream - realize it. Life is a sacrifice - offer it. Life is love - enjoy it.</p>

                        <a href="#" class="da-link button">Đặt vé</a>

                    </div>
                </div>
            </div>
            <!-- End details for portfolio project 2 -->
            <!-- Start details for portfolio project 3 -->
            <div id="slidingDiv2" class="toggleDiv row-fluid single-project">
                <div class="span6">
                    <img src="user-asset/images/Portfolio03.png" alt="project 3">
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Webste for Some Client</h3>
                            <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Client</span>Some Client Name</div>
                            <div>
                                <span>Date</span>July 2013</div>
                            <div>
                                <span>Skills</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>How far you go in life depends on your being tender with the young, compassionate with the aged, sympathetic with the striving and tolerant of the weak and strong. Because someday in your life you will have been all of these.</p>
                    </div>
                </div>
            </div>
            <!-- End details for portfolio project 3 -->
            <!-- Start details for portfolio project 4 -->
            <div id="slidingDiv3" class="toggleDiv row-fluid single-project">
                <div class="span6">
                    <img src="user-asset/images/Portfolio04.png" alt="project 4">
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Project for Some Client</h3>
                            <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Client</span>Some Client Name</div>
                            <div>
                                <span>Date</span>July 2013</div>
                            <div>
                                <span>Skills</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>Life's but a walking shadow, a poor player, that struts and frets his hour upon the stage, and then is heard no more; it is a tale told by an idiot, full of sound and fury, signifying nothing.</p>
                    </div>
                </div>
            </div>
            <!-- End details for portfolio project 4 -->
            <!-- Start details for portfolio project 5 -->
            <div id="slidingDiv4" class="toggleDiv row-fluid single-project">
                <div class="span6">
                    <img src="user-asset/images/Portfolio05.png" alt="project 5">
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Webste for Some Client</h3>
                            <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Client</span>Some Client Name</div>
                            <div>
                                <span>Date</span>July 2013</div>
                            <div>
                                <span>Skills</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>We need to give each other the space to grow, to be ourselves, to exercise our diversity. We need to give each other space so that we may both give and receive such beautiful things as ideas, openness, dignity, joy, healing, and inclusion.</p>
                    </div>
                </div>
            </div>
            <!-- End details for portfolio project 5 -->
            <!-- Start details for portfolio project 6 -->
            <div id="slidingDiv5" class="toggleDiv row-fluid single-project">
                <div class="span6">
                    <img src="user-asset/images/Portfolio06.png" alt="project 6">
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Webste for Some Client</h3>
                            <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Client</span>Some Client Name</div>
                            <div>
                                <span>Date</span>July 2013</div>
                            <div>
                                <span>Skills</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>I went to the woods because I wished to live deliberately, to front only the essential facts of life, and see if I could not learn what it had to teach, and not, when I came to die, discover that I had not lived.</p>
                    </div>
                </div>
            </div>
            <!-- End details for portfolio project 6 -->
            <!-- Start details for portfolio project 7 -->
            <div id="slidingDiv6" class="toggleDiv row-fluid single-project">
                <div class="span6">
                    <img src="user-asset/images/Portfolio07.png" alt="project 7">
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Webste for Some Client</h3>
                            <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Client</span>Some Client Name</div>
                            <div>
                                <span>Date</span>July 2013</div>
                            <div>
                                <span>Skills</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>Always continue the climb. It is possible for you to do whatever you choose, if you first get to know who you are and are willing to work with a power that is greater than ourselves to do it.</p>
                    </div>
                </div>
            </div>
            <!-- End details for portfolio project 7 -->
            <!-- Start details for portfolio project 8 -->
            <div id="slidingDiv7" class="toggleDiv row-fluid single-project">
                <div class="span6">
                    <img src="user-asset/images/Portfolio08.png" alt="project 8">
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Webste for Some Client</h3>
                            <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Client</span>Some Client Name</div>
                            <div>
                                <span>Date</span>July 2013</div>
                            <div>
                                <span>Skills</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>What if you gave someone a gift, and they neglected to thank you for it - would you be likely to give them another? Life is the same way. In order to attract more of the blessings that life has to offer, you must truly appreciate what you already have.</p>
                    </div>
                </div>
            </div>
            <!-- End details for portfolio project 8 -->
            <!-- Start details for portfolio project 9 -->
            <div id="slidingDiv8" class="toggleDiv row-fluid single-project">
                <div class="span6">
                    <img src="user-asset/images/Portfolio09.png" alt="project 9">
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Webste for Some Client</h3>
                            <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Client</span>Some Client Name</div>
                            <div>
                                <span>Date</span>July 2013</div>
                            <div>
                                <span>Skills</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>I learned that we can do anything, but we can't do everything... at least not at the same time. So think of your priorities not in terms of what activities you do, but when you do them. Timing is everything.</p>
                    </div>
                </div>
            </div>
            <!-- End details for portfolio project 9 -->
            <ul id="portfolio-grid" class="thumbnails row">
                <li class="span4 mix web">
                    <div class="thumbnail">
                        <img src="user-asset/images/Portfolio01.png" alt="project 1">
                        <a href="#single-project" class="more show_hide" rel="#slidingDiv">
                            <i class="icon-plus"></i>
                        </a>
                        <h3>Tên phim</h3>
                        <p>Thumbnail caption...</p>
                        <div class="mask"></div>
                    </div>
                </li>
                <li class="span4 mix photo">
                    <div class="thumbnail">
                        <img src="user-asset/images/Portfolio02.png" alt="project 2">
                        <a href="#single-project" class="show_hide more" rel="#slidingDiv1">
                            <i class="icon-plus"></i>
                        </a>
                        <h3>Thumbnail label</h3>
                        <p>Thumbnail caption...</p>
                        <div class="mask"></div>
                    </div>
                </li>
                <li class="span4 mix identity">
                    <div class="thumbnail">
                        <img src="user-asset/images/Portfolio03.png" alt="project 3">
                        <a href="#single-project" class="more show_hide" rel="#slidingDiv2">
                            <i class="icon-plus"></i>
                        </a>
                        <h3>Thumbnail label</h3>
                        <p>Thumbnail caption...</p>
                        <div class="mask"></div>
                    </div>
                </li>
                <li class="span4 mix web">
                    <div class="thumbnail">
                        <img src="user-asset/images/Portfolio04.png" alt="project 4">
                        <a href="#single-project" class="show_hide more" rel="#slidingDiv3">
                            <i class="icon-plus"></i>
                        </a>
                        <h3>Thumbnail label</h3>
                        <p>Thumbnail caption...</p>
                        <div class="mask"></div>
                    </div>
                </li>
                <li class="span4 mix photo">
                    <div class="thumbnail">
                        <img src="user-asset/images/Portfolio05.png" alt="project 5">
                        <a href="#single-project" class="show_hide more" rel="#slidingDiv4">
                            <i class="icon-plus"></i>
                        </a>
                        <h3>Thumbnail label</h3>
                        <p>Thumbnail caption...</p>
                        <div class="mask"></div>
                    </div>
                </li>
                <li class="span4 mix identity">
                    <div class="thumbnail">
                        <img src="user-asset/images/Portfolio06.png" alt="project 6">
                        <a href="#single-project" class="show_hide more" rel="#slidingDiv5">
                            <i class="icon-plus"></i>
                        </a>
                        <h3>Thumbnail label</h3>
                        <p>Thumbnail caption...</p>
                        <div class="mask"></div>
                    </div>
                </li>
                <li class="span4 mix web">
                    <div class="thumbnail">
                        <img src="user-asset/images/Portfolio07.png" alt="project 7" />
                        <a href="#single-project" class="show_hide more" rel="#slidingDiv6">
                            <i class="icon-plus"></i>
                        </a>
                        <h3>Thumbnail label</h3>
                        <p>Thumbnail caption...</p>
                        <div class="mask"></div>
                    </div>
                </li>
                <li class="span4 mix photo">
                    <div class="thumbnail">
                        <img src="user-asset/images/Portfolio08.png" alt="project 8">
                        <a href="#single-project" class="show_hide more" rel="#slidingDiv7">
                            <i class="icon-plus"></i>
                        </a>
                        <h3>Thumbnail label</h3>
                        <p>Thumbnail caption...</p>
                        <div class="mask"></div>
                    </div>
                </li>
                <li class="span4 mix identity">
                    <div class="thumbnail">
                        <img src="user-asset/images/Portfolio09.png" alt="project 9">
                        <a href="#single-project" class="show_hide more" rel="#slidingDiv8">
                            <i class="icon-plus"></i>
                        </a>
                        <h3>Thumbnail label</h3>
                        <p>Thumbnail caption...</p>
                        <div class="mask"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Portfolio section end -->

<!-- Client section start -->
<!-- Client section start -->
<div id="clients">
    <div class="section primary-section">
        <div class="triangle"></div>
        <div class="container">
            <div class="title">
                <h1>Tin tức</h1>
                <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
            </div>
            <div class="row">
                <div class="span4">
                    <div class="testimonial">
                        <p>"I've worked too hard and too long to let anything stand in the way of my goals. I will not let my teammates down and I will not let myself down."</p>
                        <div class="whopic">
                            <div class="arrow"></div>
                            <img src="user-asset/images/Client1.png" class="centered" alt="client 1">
                            <strong>John Doe
                                <small>Client</small>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="testimonial">
                        <p>"In motivating people, you've got to engage their minds and their hearts. I motivate people, I hope, by example - and perhaps by excitement, by having productive ideas to make others feel involved."</p>
                        <div class="whopic">
                            <div class="arrow"></div>
                            <img src="user-asset/images/Client2.png" class="centered" alt="client 2">
                            <strong>John Doe
                                <small>Client</small>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="testimonial">
                        <p>"Determine never to be idle. No person will have occasion to complain of the want of time who never loses any. It is wonderful how much may be done if we are always doing."</p>
                        <div class="whopic">
                            <div class="arrow"></div>
                            <img src="user-asset/images/Client3.png" class="centered" alt="client 3">
                            <strong>John Doe
                                <small>Client</small>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <p class="testimonial-text">
                "Perfection is Achieved Not When There Is Nothing More to Add, But When There Is Nothing Left to Take Away"
            </p>
        </div>
    </div>
</div>

<!-- Newsletter section start -->
<div class="section third-section">
    <div class="container newsletter">
        <div class="sub-section">
            <div class="title clearfix">
                <div class="pull-left">
                    <h3>Phản hồi</h3>
                </div>
            </div>
        </div>
        <div id="success-subscribe" class="alert alert-success invisible">
            <strong>Well done!</strong>You successfully subscribet to our newsletter.</div>
        <div class="row-fluid">
            <div class="span5">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            </div>
            <div class="span7">
                <form class="inline-form">
                    <input type="email" name="email" id="nlmail" class="span8" placeholder="Enter your email" required />
                    <button id="subscribe" class="button button-sp">Subscribe</button>
                </form>
                <div id="err-subscribe" class="error centered">Please provide valid email address.</div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter section end -->

<!--đối tác-->
<div class="section third-section">
    <div class="container centered">
        <div class="sub-section">
            <div class="title clearfix">
                <div class="pull-left">
                    <h3>Đối tác</h3>
                </div>
                <ul class="client-nav pull-right">
                    <li id="client-prev"></li>
                    <li id="client-next"></li>
                </ul>
            </div>
            <ul class="row client-slider" id="clint-slider">
                <li>
                    <a href="">
                        <img src="user-asset/images/clients/ClientLogo01.png" alt="client logo 1">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="user-asset/images/clients/ClientLogo02.png" alt="client logo 2">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="user-asset/images/clients/ClientLogo03.png" alt="client logo 3">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="user-asset/images/clients/ClientLogo04.png" alt="client logo 4">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="user-asset/images/clients/ClientLogo05.png" alt="client logo 5">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="user-asset/images/clients/ClientLogo02.png" alt="client logo 6">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="user-asset/images/clients/ClientLogo04.png" alt="client logo 7">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--end đối tác-->
@endsection
