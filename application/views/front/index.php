<!DOCTYPE html>
<head>
    <title><?= $siteinfo['sitetitle'] ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Style Sheets -->

    <link rel="stylesheet" href="<?php echo $theme_asset_url ?>plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $theme_asset_url ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $theme_asset_url ?>dist/css/skins/_all-skins.min.css">



    <link rel="stylesheet" href="<?= base_url('asset/front') ?>/css/animate.css">
    <link rel="stylesheet" href="<?= base_url('asset/front') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/front') ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/front') ?>/css/templatemo_misc.css">
    <link rel="stylesheet" href="<?= base_url('asset/front') ?>/css/templatemo_style.css">
    <link rel="stylesheet" href="<?= base_url('asset/front') ?>/css/styles.css">
    <!-- JavaScripts -->
    <script src="<?= base_url('asset/front') ?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?= base_url('asset/front') ?>/js/bootstrap-dropdown.js"></script>
    <script src="<?= base_url('asset/front') ?>/js/bootstrap-collapse.js"></script>
    <script src="<?= base_url('asset/front') ?>/js/bootstrap-tab.js"></script>
    <script src="<?= base_url('asset/front') ?>/js/jquery.singlePageNav.js"></script>
    <script src="<?= base_url('asset/front') ?>/js/jquery.flexslider.js"></script>
    <script src="<?= base_url('asset/front') ?>/js/custom.js"></script>
    <script src="<?= base_url('asset/front') ?>/js/jquery.lightbox.js"></script>
    <script src="<?= base_url('asset/front') ?>/js/templatemo_custom.js"></script>
    <script src="<?= base_url('asset/front') ?>/js/responsiveCarousel.min.js"></script>
    <style type="text/css">

        .login_button,.registration_button{
            cursor: pointer;
        }
        .body_text p{
            color: #fff;
        }
        .templatemo_topbar .navbar-default .navbar-nav>li>a {
            font-size: 16px;
        } 
        button.navbar-toggle {
            background: rgba(0,0,0,.5);
        }
        .slider-caption p {
            width: 75%;
        }
        .templatemo_topbar .navbar-nav {
            width: 750px;
        }
        .slider-caption {
            top: 120px;
        }

        .modal-body.text-left.body_text.btn-primary {
            text-transform: initial!important;
        }
        .templatemo_hometext p {
            text-transform: initial!important;
        }

        .templatemo_title {
            text-transform: initial!important;
        }
        @media only screen and (max-width:1000px) and (min-width:601px){
            tr {
                width: 33%!important;
            }
        }
        @media only screen and (max-width:600px){
            .templatemo_titlewrappersmall {
                font-size: 15px;
            }
            tr{
                width:100%!important;
                margin-top: 10px;
            }
            button.btn.btn-primary.btn-lg.btn-flat.btn-block {
                font-size: 14px;
            }
            .templatemo_homewrapper {
                display: block;
                min-height: 500px;
            }
            .templatemo_hometext span {
                color: #000!important;
            }

          div#templatemo_home_page {
                height: 1200px;
            }

            .flexslider {
                display: none;
            }

            .templatemo_hometitle {
                color: #000;
            }
        }
        @media only screen and (max-width:375px){
            div#templatemo_home_page {
                height: 1200px;
            }
        }
        @media only screen and (max-width:320px){
            div#templatemo_home_page {
                height: 1325px;
            }
        }
    </style>

</head>
<body id="about_library">
    <!-- header start -->
    <div id="templatemo_home_page" >
        <div class="templatemo_topbar">
            <div class="container" >
                <div class="row">
                    <div class="templatemo_titlewrapper"><img src="<?= base_url('asset/front') ?>/images/templatemo_logobg.png" alt="logo background">
                        <div class="templatemo_title"><span><?= $siteinfo['sitetitle'] ?></span></div>
                    </div>
                    <div class="clear"></div>
                    <div class="templatemo_titlewrappersmall"><?= $siteinfo['sitetitle'] ?></div>
                    <nav class="navbar navbar-default templatemo_menu" role="navigation">
                        <div class="container-fluid"> 
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div id="top-menu">
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a class="menu" href="<?= site_url('frontpage') ?>"><i class="fa fa-home"></i></a></li>
                                        <li><a class="menu" href="#about_library">About Library</a></li>
                                        <li><a class="menu" href="#instruction">User Instruction</a></li> 
                                        <li><a class="menu" href="#books">Resources</a></li>   
                                        <li><a class="menu" href="<?= site_url('login') ?>" target="_blank">Login</a></li>
                                        <li><a class="menu" href="<?= site_url('login/register') ?>" target="_blank">Registration</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.navbar-collapse --> 
                        </div>
                        <!-- /.container-fluid --> 
                    </nav>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="templatemo_headerimage" >
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="<?= base_url('asset/front') ?>/images/slider/1.jpg" alt="Slide 1"></li>
                    <li><img src="<?= base_url('asset/front') ?>/images/slider/2.jpg" alt="Slide 2"></li>
                    <li><img src="<?= base_url('asset/front') ?>/images/slider/3.jpg" alt="Slide 3"></li>
                </ul>
            </div>
        </div>
        <div class="slider-caption">
            <div class="templatemo_homewrapper">
                <div class="templatemo_hometitle">About Library</div>
                <div class="templatemo_hometext"><?= $siteinfo['AboutUs'] ?> </div>
            </div>
        </div>
    </div>
    <!-- header end -->
    <div class="clear" id="instruction"></div>
    <!-- service start -->
    <div class="templatemo_servicewrapper" id="templatemo_service_page" style="margin-top: 50px;">
        <div class="container" >
            <div class="row">
                <h1 class="page-header" style="border-bottom: 1px solid #d5d5d5">User Instruction</h1>        
                <div class="col-md-6"style="border-bottom: 0px solid #d5d5d5">            
                    <div class="col-md-12 templatemo_marginbot">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg btn-flat btn-block" data-toggle="modal" data-target="#myModal">
                            Login Instruction
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Login Instruction</h4>
                                    </div>
                                    <div class="modal-body text-left body_text btn-primary">
                                        <?= $siteinfo['LoginInstruction'] ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>  
                <div class="col-md-6" style="border-bottom: 0px solid #d5d5d5">            
                    <div class="col-md-12 templatemo_marginbot">

                        <button type="button" class="btn btn-primary btn-lg btn-flat btn-block" data-toggle="modal" data-target="#myModal1">
                            New User Registration Instruction
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">New User Registration Instruction</h4>
                                    </div>
                                    <div class="modal-body text-left body-box body_text btn-primary">
                                        <?= $siteinfo['RegistrationInstraction'] ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- service end -->
    <div class="clear" id="books" style="margin-top:50px;"></div>
    <!-- work start -->
    <div class="templatemo_workwrapper" >
        <div class="container">
            <div class="row">
                <h1 class="page-header" style="border-bottom: 1px solid #d5d5d5">Our Resources</h1>
                <div class="col-md-12 templatemo_workmargin">

                    <?php include_once __DIR__ . '/../Admin_theme/AdminLTE/member/frontpage.php'; ?>

                </div>
            </div>
        </div>
        <!-- 
      <div>
        <div class="templatemo_workbox">
          <div class="gallery-item"><img src="<?= base_url('asset/front') ?>/images/work/1.jpg" alt="work 1">
            <div class="overlay">
              <div class="templatemo_worktitle">Project #001</div>
              <div class="templatemo_workdes">Morbi et nisi in augue accumsan imperdiet</div>
              <div class="templatemo_worklink"><a href="images/work/1.jpg" data-rel="lightbox" class="fa fa-search-plus"></a></div>
              <div class="templatemo_worklink"><a href="#" class="fa fa-link"></a></div>
            </div>
          </div>
        </div>
        <div class="templatemo_workbox">
          <div class="gallery-item"><img src="<?= base_url('asset/front') ?>/images/work/2.jpg" alt="work 2">
            <div class="overlay">
              <div class="templatemo_worktitle">Project #002</div>
              <div class="templatemo_workdes">Morbi et nisi in augue accumsan imperdiet</div>
              <div class="templatemo_worklink"><a href="images/work/2.jpg" data-rel="lightbox" class="fa fa-search-plus"></a></div>
              <div class="templatemo_worklink"><a href="#" class="fa fa-link"></a></div>
            </div>
          </div>
        </div>
        <div class="templatemo_workbox">
          <div class="gallery-item"><img src="<?= base_url('asset/front') ?>/images/work/3.jpg" alt="work 3">
            <div class="overlay">
              <div class="templatemo_worktitle">Project #003</div>
              <div class="templatemo_workdes">Morbi et nisi in augue accumsan imperdiet</div>
              <div class="templatemo_worklink"><a href="images/work/3.jpg" data-rel="lightbox" class="fa fa-search-plus"></a></div>
              <div class="templatemo_worklink"><a href="#" class="fa fa-link"></a></div>
            </div>
          </div>
        </div>
        <div class="templatemo_workbox">
          <div class="gallery-item"><img src="<?= base_url('asset/front') ?>/images/work/4.jpg" alt="work 4">
            <div class="overlay">
              <div class="templatemo_worktitle">Project #004</div>
              <div class="templatemo_workdes">Morbi et nisi in augue accumsan imperdiet</div>
              <div class="templatemo_worklink"><a href="images/work/4.jpg" data-rel="lightbox" class="fa fa-search-plus"></a></div>
              <div class="templatemo_worklink"><a href="#" class="fa fa-link"></a></div>
            </div>
          </div>
        </div>
        <div class="templatemo_workbox">
          <div class="gallery-item"><img src="<?= base_url('asset/front') ?>/images/work/5.jpg" alt="work 5">
            <div class="overlay">
              <div class="templatemo_worktitle">Project #005</div>
              <div class="templatemo_workdes">Morbi et nisi in augue accumsan imperdiet</div>
              <div class="templatemo_worklink"><a href="images/work/5.jpg" data-rel="lightbox" class="fa fa-search-plus"></a></div>
              <div class="templatemo_worklink"><a href="#" class="fa fa-link"></a></div>
            </div>
          </div>
        </div>
        <div class="templatemo_workbox">
          <div class="gallery-item"><img src="<?= base_url('asset/front') ?>/images/work/6.jpg" alt="work 6">
            <div class="overlay">
              <div class="templatemo_worktitle">Project #006</div>
              <div class="templatemo_workdes">Morbi et nisi in augue accumsan imperdiet</div>
              <div class="templatemo_worklink"><a href="images/work/6.jpg" data-rel="lightbox" class="fa fa-search-plus"></a></div>
              <div class="templatemo_worklink"><a href="#" class="fa fa-link"></a></div>
            </div>
          </div>
        </div>
        <div class="templatemo_workbox">
          <div class="gallery-item"><img src="<?= base_url('asset/front') ?>/images/work/7.jpg" alt="work 7">
            <div class="overlay">
              <div class="templatemo_worktitle">Project #007</div>
              <div class="templatemo_workdes">Morbi et nisi in augue accumsan imperdiet</div>
              <div class="templatemo_worklink"><a href="images/work/7.jpg" data-rel="lightbox" class="fa fa-search-plus"></a></div>
              <div class="templatemo_worklink"><a href="#" class="fa fa-link"></a></div>
            </div>
          </div>
        </div>
        <div class="templatemo_workbox">
          <div class="gallery-item"><img src="images/work/8.jpg" alt="work 8">
            <div class="overlay">
              <div class="templatemo_worktitle">Project #008</div>
              <div class="templatemo_workdes">Morbi et nisi in augue accumsan imperdiet</div>
              <div class="templatemo_worklink"><a href="images/work/8.jpg" data-rel="lightbox" class="fa fa-search-plus"></a></div>
              <div class="templatemo_worklink"><a href="#" class="fa fa-link"></a></div>
            </div>
          </div>
        </div>
      </div>-->
    </div>
    <!--work end-->
    <div class="clear"></div>
    <noscript>
    <!-- team start -->
    <div class="templatemo_team_wrapper" id="templatemo_team_page">
        <div class="container">
            <div class="row">
                <h1>Our Team</h1>
                <div class="col-md-12 templatemo_workmargin">Suspendisse potenti. Etiam elementum laoreet mauris. Ut rutrum feugiat neque. Suspendisse viverra gravida nulla. Duis sed enim vitae metus nonummy venenatis. Curabitur semper rutrum sapien. Mauris luctus. Aenean elit turpis, volutpat id, facilisis eget, mollis a, est. Nulla eget elit pellentesque enim hendrerit venenatis.</div>
                <div id="w">
                    <div class="crsl-items" data-navigation="navbtns">
                        <div class="crsl-wrap">
                            <div class="crsl-item"><img src="images/team/01.jpg" alt="person 1">
                                <div class="templatemo_team_name">Mauris Luctus</div>
                                <div class="templatemo_team_post">CEO</div>
                                <div class="templatemo_social">
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                        <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post #1 -->
                            <div class="crsl-item"><img src="images/team/02.jpg" alt="person 2">
                                <div class="templatemo_team_name">Etiam Massa</div>
                                <div class="templatemo_team_post">Director</div>
                                <div class="templatemo_social">
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                        <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post #2 -->
                            <div class="crsl-item"><img src="images/team/03.jpg" alt="person 3">
                                <div class="templatemo_team_name">Mauris Luctus</div>
                                <div class="templatemo_team_post">New Manager</div>
                                <div class="templatemo_social">
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                        <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post #3 -->
                            <div class="crsl-item"><img src="images/team/04.jpg" alt="person 4">
                                <div class="templatemo_team_name">Morbi Pulvinar</div>
                                <div class="templatemo_team_post">Designer</div>
                                <div class="templatemo_social">
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                        <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post #4 -->
                            <div class="crsl-item"><img src="images/team/05.jpg" alt="person 5">
                                <div class="templatemo_team_name">Mauris Luctus</div>
                                <div class="templatemo_team_post">Developer</div>
                                <div class="templatemo_social">
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                        <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post #5 -->
                            <div class="crsl-item"><img src="images/team/06.jpg" alt="person 6">
                                <div class="templatemo_team_name">Mauris Luctus</div>
                                <div class="templatemo_team_post">Technical Staff</div>
                                <div class="templatemo_social">
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                        <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post #6 --> 
                        </div>
                        <!-- @end .crsl-wrap --> 
                    </div>
                    <!-- @end .crsl-items --> 
                </div>
                <div class="clear"></div>
                <nav class="slidernav">
                    <div id="navbtns" class="clearfix"><a href="#" class="previous"><img src="images/slideitmoo_back.png" alt="previous"></a> <a href="#" class="next"><img src="images/slideitmoo_forward.png" alt="next"></a></div>
                </nav>
            </div>
            <script>
                $(function() {
                $('.crsl-items').carousel({
                visible: 4,
                        itemMinWidth: 180,
                        itemEqualHeight: 370,
                        itemMargin: 9,
                });
                $("a[href=#]").on('click', function(e) {
                e.preventDefault();
                });
                });
            </script>
        </div>
    </div>

    <!-- team end -->
    <div class="clear"></div>
    <!-- contact start -->
    <div class="templatemo_contactwrapper" id="templatemo_contact_page">
        <div class="container">
            <div class="row">
                <h1>Contact</h1>
            </div>
        </div>
        <div class="templatemo_contactmap">
            <div id="templatemo_map"></div>
        </div>
        <div class="container templatemo_contactmargin">
            <div class="row">
                <div class="col-md-3">
                    <div class="templatemo_address_title">Mailing Address:</div>
                    No 123, Duis in enim road, Sed sit amet arcu ut quam porttitor.
                    <div class="clear"></div>
                    <div class="templatemo_address_left">Call us:</div>
                    <div class="templatemo_address_right">+001 333 000 1010<br>
                        +002 666 000 2020</div>
                    <div class="clear"></div>
                    <div class="templatemo_address_left">Hot line:</div>
                    <div class="templatemo_address_right">+009 000 999 0000</div>
                    <div class="clear"></div>
                    <div class="templatemo_address_left">Email us:</div>
                    <div class="templatemo_address_right">admin@company.com<br>
                        info@company.com</div>
                </div>
                <form action="#" method="post">
                    <div class="col-md-9">
                        <div class="col-md-4">
                            <input type="text" name="name" id="name" class="name" placeholder="Your Name">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="email" id="email" class="email" placeholder="Your Email">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="subject" id="subject" class="subject" placeholder="Subject">
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" cols="1" rows="1" class="message" placeholder="Your message... " id="message"></textarea>
                        </div>
                        <div class="col-md-4">
                            <input type="submit" name="send" value="Send Message" id="submit" class="button templatemo_sendbtn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </noscript>
    <!-- contact end --> 
    <!-- footer start -->
    <div class="templatemo_footerwrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">Copyright &copy; 2016 <a href="#"><?= $siteinfo['sitetitle'] ?></a>. Developed By <a href="http://friendsitltd.com">Friends IT</a></div>
            </div>
        </div>
    </div>
    <!-- footer end --> 

    <script src="<?php echo $theme_asset_url ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <!--datatable-->
    <script src="<?php echo $theme_asset_url ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo $theme_asset_url ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

    <script>
        <!-- scroll to specific id when click on m        enu -->
        //         Cache selectors
        var lastId,
topMenu = $("#top-menu"),
topMenuHeight = topMenu.outerHeight() + 15,
// All list items
menuItems = topMenu.find("a"),
// Anchors corresponding to menu items
scrollItems = menuItems.map(function() {
                var item = $($(this).attr("href"));
        if (item.length) {
           return item;
}
});
        // B        ind click handler to menu items
        //        so we can get a fancy scroll animation
        menuItems.click(function(e) {
                var href = $(this).attr("href"),
                offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
        $('html, body').stop().animate({
        sc        roll        Top: offsetTop
},         300);
e.preventDefault();
        });
        // Bind to scroll
        $(window).scroll(function() {
                // Get container scroll position
                var fromTop = $(this).scrollTop() + topMenuHeight;
        // Get id of current scroll item
        var cur = scrollItems.map(function() {
         if ($(this).o        ffset().top < fromTop)
                return thi        s;
        });
        // Get the id of the        current element
        cur = cur[cur.length - 1];
            var id = cur && cur.length ? cur[0].id : "";
        if (lastId !== id) {
                lastId = id;
        // Set/remove active class
        menuItems
                .parent().removeClass("active")
                .end().filter("[hre        f=#" +        id + "]").paren        t().addClass("active");
        }
        });
</script>

        <script type="text/j        avascript">
//$(        function(){
//   $('.login_button').click(        function(){
//      $('.login_box')        .toggle();        
//          }); 
//   
//   $('.registration_button').click(        function(){
//      $('.registration_box')        .toggle();        
//                  }); 
//})            ;
</script>
</body>
</html>