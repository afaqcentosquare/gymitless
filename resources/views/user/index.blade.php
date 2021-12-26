@extends('user.master')
@section("title")
<title>Gymitless | Home</title>
@endsection


@section("content")
<div class="alert alert-danger landing-alert">
    <div class="container text-center">
        <h3>Find a gym</h3>
    </div>
</div>

<div class="wrapper">
    <div class="landing-header">
        <div id="mymap"></div>
        <!-- <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1ypkIC2fMmJk6Wvfl7EEXLbCUaA_YR4H-" width="100%" height="550"></iframe> -->

        <!-- <div class="container">
            <div class="motto">
                
                <h1 class="title-uppercase">Example page</h1>
                <h3>Start designing your landing page here.</h3>
                <br />
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn"><i class="fa fa-play"></i>Watch video</a>
                <a class="btn">Download</a>
            </div>
        </div>     -->
    </div>
    <div class="main">
        <div class="section section-light-brown landing-section">
            <div class="container">
                @foreach ($customers as $customer)
                @foreach ($customer->locations as $location)
                <div class="row">
               
                    <div class="col-md-5 column">
                        <h6>{{$location->location_name}}</h6>
                        <p>{{$location->addressline1}}</p>
                        <p>{{$location->city}}</p>
                        <p>{{$location->zip_code}}</p>
                        <a class="btn  btn-simple" href="{{$location->website}}">{{$location->website}}</a>
                    </div>
                    <div class="col-md-5 column">
                        <h6>Staffed Hours</h6>
                        @foreach ($location->timings as $timing)
                        <p>{{ucwords($timing->day)." ". $timing->open_time." - ". $timing->close_time }}</p>
                        @endforeach
                        
                    </div>
                    <div class="col-md-2 column">
                        <br><br>
                        <a class="btn btn-danger get-directions" href="#">GET DIRECTIONS</a>
                        <p class="btn-direction">(0. 5 Miles)</p>
                    </div>
                   
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection