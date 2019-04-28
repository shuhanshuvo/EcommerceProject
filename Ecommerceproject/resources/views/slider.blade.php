 <section id="slider">
    <div class="container">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">


                <?php

                                    $all_published_slider=DB::table('tbl_slider')
                                          ->where('publication_status',1)
                                          ->get();
                                        ?>

                    @foreach( $all_published_slider as $v_slider )
                    <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>

                     @endforeach
                    
                </ol>
                <div class="carousel-inner" role="listbox">
                   @foreach( $all_published_slider as $v_slider )
                    <div class="item {{ $loop->first ? ' active' : '' }}" ">
                        <img src="{{ $v_slider->slider_image }}" class="image" style="height: 250px;width: 100%;">
                       
                    </div>
                     @endforeach
                </div>
                <!--slider control-->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
     </div>
 </section>