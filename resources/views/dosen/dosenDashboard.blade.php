@extends('layouts.masterDosen')

@section('content')


  <div class="row tile_count">
    
      

  </div>
  <!-- /top tiles -->

  <div class="ln_solid"></div>

    <div class="row">
      <div class="container">   
      
      <br/>
      <div class="col-md-15 col-md-offset-0">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
          </ol>
     
          <!-- deklarasi carousel -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="/asset/production/images/logo.png" width="55%" style="display: block; margin: 0% auto;">
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <img src="/asset/production/images/poto.png" width="35%" style="display: block; margin: 8% auto;">
              <div class="carousel-caption">
              </div>
            </div>        
          </div>
     
          <!-- membuat panah next dan previous -->
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
  </div>
</div>
@endsection