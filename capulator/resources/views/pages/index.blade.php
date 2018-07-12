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
    <div class="card">
    <h2>This is where information about our capulator will go in.</h2>

    <p>The Capulator aims to be your one stop for CAP target setting, graphical visualisation of CAP progression.</p>
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