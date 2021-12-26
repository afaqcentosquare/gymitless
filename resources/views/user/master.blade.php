<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('assets/frontend/paper_img/logo-2new.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    @yield("title")
    

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{asset('assets/frontend/bootstrap3/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/frontend/css/ct-paper.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/frontend/css/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/frontend/css/examples.css')}}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyDeFCr8crNtmNwVjs9XiKXbvXcJbuczAHs"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

  	<style type="text/css">
    	#mymap {
      		border:1px solid red;
      		width: 100%;
      		height: 500px;
    	}
  	</style>

</head>

<body>

    <nav class="navbar navbar-default" role="navigation-demo" id="demo-navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <img src="assets/img/logo-1new.png" alt=""> -->
                <a class="navbar-brand" href=""><img src="{{asset('assets/frontend/img/logo-1new.png')}}" alt="" width="100px"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navigation-example-2">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{route('user.index')}}" class="btn btn-simple">Find a gym</a>
                    </li>
                    <li>
                        <a href="{{route('user.gym.owner')}}" class="btn btn-simple">Gym owners</a>
                    </li>
                    <!-- <li>
                        <a href="" class="btn btn-simple">Join</a>
                    </li> -->
                    <li>
                        <a href="{{route('user.contactus')}}" class="btn btn-simple">Contact</a>
                    </li>
                    <!-- <li>
                <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-facebook"></i></a>
            </li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-->
    </nav>


    @yield("content")

    <footer class="footer-demo section-dark">
        <div class="container">
            <!-- <nav class="pull-left">
                    <ul>
    
                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/product/rubik">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav> -->
            <div class="copyright">
                &copy; 2020 Gymitless LLC. | Nationwide Access to Fitness Facilities | Sioux Falls, SD | (605) 743-0288
            </div>
        </div>
    </footer>
    
    
    
    
    
    
    <!--Load the API from the specified URL
        * The async attribute allows the browser to render the page while the API loads
        * The key parameter will contain your own API key (which is not needed for this tutorial)
        * The callback parameter executes the initMap() function
        -->
    
    </body>
    <script type="text/javascript">
    
    
        var customers = <?php print_r(json_encode($customers)) ?>;
    
    
        var mymap = new GMaps({
          el: '#mymap',
          lat: 9.0283719,
          lng: 10.8124002,
          zoom:2
        });
    
    
        $.each( customers, function( index, value ){
            $.each( value.locations, function( location_index, location_data ){
                mymap.addMarker({
                lat: location_data.latitude,
                lng: location_data.longitude,
                // title: value.city,
                // click: function(e) {
                //     alert('This is '+value.city+', gujarat from India.');
                // }
                });
                console.log("latitude"+location_data.latitude);
                console.log("longitude"+location_data.latitude);
            });
            
       });
    
    
      </script>
    
    <script src="{{asset('assets/frontend/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/frontend/js/jquery-ui-1.10.4.custom.min.js')}}" type="text/javascript"></script>
    <!--  Plugins -->
    <script src="{{asset('assets/frontend/js/ct-paper-checkbox.js')}}"></script>
    <script src="{{asset('assets/frontend/js/ct-paper-radio.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap-datepicker.js')}}"></script>
    
    <script src="{{asset('assets/frontend/js/ct-paper.js')}}"></script>
    
    </html>