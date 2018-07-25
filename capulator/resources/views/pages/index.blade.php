@extends('layouts.app')
@section('content')
  <div id="Wrapper"> 
        <div id="Header_wrapper">
                            {{-- Start of slider --}}
                            <section class="example">
                                    <article class="content">
                
                
                                        <div id="rev_slider_92_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-hero72" style="margin:0px auto;background-color:#fff;padding:0px;margin-top:0px;margin-bottom:0px;">
                                            <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
                                            <div id="rev_slider_92_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
                                                <ul>
                                                    <!-- SLIDE -->
                                                    <li data-index="rs-274" data-transition="fade" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="1000" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">
                                                        <!-- MAIN IMAGE -->
                                                        <img src="{{ URL::to('/') }}/images/1.jpg" alt="" data-bgposition="center bottom" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                                        <!-- LAYERS -->
                
                                                        <!-- LAYER NR. 1 -->
                                                        <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" id="slide-274-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="s:300;s:300;" data-start="1000" data-basealign="slide" data-responsive_offset="on" style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 1.00);">
                                                        </div>
                
                                                        <!-- LAYER NR. 2 -->
                                                        <div class="tp-caption Newspaper-Title-Centered tp-resizeme rs-parallaxlevel-0" id="slide-274-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','1']" data-fontsize="['50','50','50','30']" data-lineheight="['55','55','55','35']" data-width="['721','721','721','420']" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;" data-mask_in="x:0px;y:0px;" data-mask_out="x:0;y:0;" data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6; min-width: 721px; max-width: 721px; white-space: normal;text-align:center;">Use our CAPulator
                                                        </div>
                
                                                        <!-- LAYER NR. 3 -->
                                                        <div class="tp-caption Newspaper-Subtitle tp-resizeme rs-parallaxlevel-0" id="slide-274-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-72','-72','-72','-48']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;" data-mask_in="x:0px;y:0px;" data-mask_out="x:0;y:0;" data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;">Maximise your CAP
                                                        </div>
                
                                                        <!-- LAYER NR. 4 -->
                                                        <div class="tp-caption Newspaper-Button rev-btn rs-parallaxlevel-0" id="slide-274-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['92','92','92','76']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;" data-style_hover="c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);cursor:pointer;" data-transform_in="y:50px;opacity:0;s:1500;e:Power4.easeInOut;" data-transform_out="y:50px;opacity:0;s:1000;s:1000;" data-start="1000" data-splitin="none" data-splitout="none" data-actions='[{"event":"click","action":"scrollbelow","offset":"px"}]' data-responsive_offset="on" data-responsive="off" style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">READ MORE
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                                            </div>
                                        </div>
                                        <!-- END REVOLUTION SLIDER -->
                
                                    </article>
                                </section>
                
 {{-- end wrapper head --}}
</div> 
{{-- end wrapper --}}
</div>
<div class="container" style="padding-top: 20px;">
    <div style="" class="card">
    <h2>This is where information about our capulator will go in.</h2>

    <p class="bryanTest">The Capulator aims to be your one stop for CAP target setting, graphical visualisation of CAP progression.</p>
    </div>

</div>

<head>

        <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>Be</title>
        <meta name="description" content="">
        <meta name="author" content="">
    
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
        <!-- Favicons -->
        <link rel="shortcut icon" href="content/simple2/images/favicon.ico">
    
        <!-- FONTS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lora:100,300,400,400italic,500,600,700,700italic,800'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Encode+Sans+Expanded:100,300,400,400italic,500,600,700,700italic,800'>
    
        <!-- CSS -->
        <link rel='stylesheet' href='css/global.css'>
        <link rel='stylesheet' href='content/simple2/css/structure.css'>
        <link rel='stylesheet' href='content/simple2/css/simple2.css'>
        <link rel='stylesheet' href='content/simple2/css/custom.css'>
    
    </head>

    <body class="color-custom style-simple button-flat layout-full-width if-zoom if-border-hide no-content-padding no-shadows header-classic minimalist-header-no sticky-header sticky-tb-color ab-hide subheader-both-center menu-link-color menuo-right menuo-no-borders mobile-tb-center mobile-mini-mr-ll tablet-sticky mobile-header-mini mobile-sticky be-reg-20881">
            <div id="Wrapper">
                <div id="Header_wrapper">
                    <header id="Header">
                        <div class="header_placeholder"></div>
                        <div id="Top_bar">
                            <div class="container">
                                <div class="column one">
                                    <div class="top_bar_left clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
                <div id="Content">
                    <div class="content_wrapper clearfix">
                        <div class="sections_group">
                            <div class="entry-content">
                                <div class="section mcb-section" style="padding-top:125px; padding-bottom:225px; background-color:#FFFFFF">
                                    <div class="section-decoration top" style="background-image:url(content/simple2/images/simple2-home-section-decor-top.png);height:20px"></div>
                                    <div class="section_wrapper mcb-section-inner">
                                        <div class="wrap mcb-wrap one valign-top clearfix">
                                            <div class="mcbH-wrap-inner">
                                                <div class="column mcb-column one column_column">
                                                    <div class="column_attr clearfix">
                                                        <h3 style="color:#b8ad00">What we believe in</h3>
                                                        <h1>Less is more
                                                            <br> Help me Help you
                                                            <br> GG LA
                                                        </h1>
                                                    </div>
                                                </div>
                                                <div class="column mcb-column one-third column_button">
                                                    <a class="button  button_right button_size_3 button_js" href="content/simple2/work.html" style=" background-color:#fff !important; color:#000"><span class="button_icon"><i class="icon-docs" style=" color:#000 !important"></i></span><span class="button_label">See our work</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-decoration bottom" style="background-image:url(content/simple2/images/simple2-home-section-decor-bot.png);height:51px"></div>
                                </div>
                                <div class="section mcb-section equal-height" style="padding-top:0px; padding-bottom:100px">
                                    <div class="section_wrapper mcb-section-inner">
                                        <div class="wrap mcb-wrap one valign-top move-up clearfix" style="margin-top:-120px">
                                            <div class="mcb-wrap-inner">
                                                <div class="column mcb-column one-third column_zoom_box ">
                                                    <div class="zoom_box">
                                                        <a href="content/simple2/work-details.html">
                                                            <div class="photo">
                                                                    <img src="{{ URL::to('/') }}/images/1.jpg" alt="" data-bgposition="center bottom" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                                                    <!-- LAYERS -->
                                                            </div>
                                                            <!-- LAYER NR. 1 -->
                                                            <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" id="slide-274-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="s:300;s:300;" data-start="1000" data-basealign="slide" data-responsive_offset="on" style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 1.00);">
                                                            </div>

                                                            
                                                            <div class="desc" style="background-color:rgba(0, 0, rgba(255, 4, 55, 0.8), 0.8)">
                                                                <div class="desc_wrap">
                                                                    <div class="desc_txt">
                                                                        1st pic
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="column mcb-column one-third column_zoom_box ">
                                                    <div class="zoom_box">
                                                        <a href="content/simple2/work-details.html">
                                                            <div class="photo">
                                                                    <img src="{{ URL::to('/') }}/images/1.jpg" alt="" data-bgposition="center bottom" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                                            </div>
                                                            <div class="desc" style="background-color:rgba(255, 4, 55, 0.8)">
                                                                <div class="desc_wrap">
                                                                    <div class="desc_txt">
                                                                        lel
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="column mcb-column one-third column_zoom_box ">
                                                    <div class="zoom_box">
                                                        <a href="content/simple2/work-details.html">
                                                            <div class="photo">
                                                                    <img src="{{ URL::to('/') }}/images/1.jpg" alt="" data-bgposition="center bottom" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                                            </div>
                                                            <div class="desc" style="background-color:rgba(228, 157, 51, 0.8)">
                                                                <div class="desc_wrap">
                                                                    <div class="desc_txt">
                                                                        Ignissimos eius quaerat
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="column mcb-column one-third column_zoom_box ">
                                                    <div class="zoom_box">
                                                        <a href="content/simple2/work-details.html">
                                                            <div class="photo">
                                                                    <img src="{{ URL::to('/') }}/images/1.jpg" alt="" data-bgposition="center bottom" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                                            </div>
                                                            <div class="desc" style="background-color:rgba(57, 97, 143, 0.8)">
                                                                <div class="desc_wrap">
                                                                    <div class="desc_txt">
                                                                        Blanditiis voluptas voluptates
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="column mcb-column one-third column_zoom_box ">
                                                    <div class="zoom_box">
                                                        <a href="content/simple2/work-details.html">
                                                            <div class="photo">
                                                                    <img src="{{ URL::to('/') }}/images/1.jpg" alt="" data-bgposition="center bottom" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                                            </div>
                                                            <div class="desc" style="background-color:rgba(0, 0, 0, 0.8)">
                                                                <div class="desc_wrap">
                                                                    <div class="desc_txt">
                                                                        Blanditiis voluptas voluptates
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


{{-- <div class="container">
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ URL::to('/') }}/images/2.jpg" alt="Card image cap">
    <div class="card-header">
        Featured
      </div>
    <div class="card-body">
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
</div> --}}
@endsection