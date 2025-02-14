<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Zalynz Oven</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/') }}" class="logo">
                            <img src="assets/images/logo2.png" style="width: 200px; height: auto;">
                                <!-- <h4>ZalynzOven</h4> -->
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ url('/') }}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="{{ url('/') }}">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="{{ url('/') }}">Menu</a></li>
                            <li class="scroll-to-section"><a href="{{ url('/') }}">Staff</a></li> 
                            <li class="scroll-to-section"><a href="{{ url('/') }}">Reservation</a></li> 

                            <li class="scroll-to-section"><a href="{{ url('/order') }}">Order Now</a></li> 
                            <li class="scroll-to-section" style="background-color: pink">

                                @auth
                                    <a href="{{ url('/showcart', Auth::user()->id) }}">
                                        Cart [{{$count}}]
                                    </a>
                                @endauth 

                                @guest
                                        Cart []
                                @endguest

                            </li>
                            <!-- <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li> -->
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            

                            <li>
                                @if (Route::has('login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                        @auth
                                            <li>
                                                <x-app-layout>
                                                    
                                                </x-app-layout>
                                            </li>
                                            <!-- <li><a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> </li> -->
                                        @else
                                            <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a> </li>

                                            @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> </li>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </li> 
                        </ul>  
                        
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>ZalynzOven</h4>
                            <h6>THE BEST EXPERIENCE</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Make A Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets/images/slide-01.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets/images/slide-02.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets/images/slide-03.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Klassy Week</h6>
                        <h2>This Week’s Special Meal Offers</h2>
                    </div>
                </div>
            </div>

            <!-- Tab navigation -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                                    <img src="assets/images/tab-icon-01.png" alt=""> Beverage
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                                    <img src="assets/images/tab-icon-02.png" alt=""> Desserts
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                                    <img src="assets/images/tab-icon-03.png" alt=""> Savory
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab Content -->

                            

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tabs-1" role="tabpanel">
                                        <br>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <h5 class="card-header">Beverage</h5>
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table">
                                                        <thead class="table-light">
                                                        <tr>
                                                            <th>Image</th>
                                                            <th style="width: 100px">Name</th>
                                                            <th>Price</th>
                                                            <th style="width: 300px">Description</th>
                                                            <th style="width: 50px">Quantity</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0" style="white-space: normal; word-wrap: break-word; max-width: 300px;">

                                                            @foreach($data as $item)  <!-- Assuming $data is a collection --> 

                                                                

                                                                @if($item->type == "1")

                                                                    <form action="{{url('/addtocart',$item->id)}}" method="post" enctype="multipart/form-data">

                                                                        @csrf
                                                                        <tr>
                                                                            <td>
                                                                                @if($item->image)
                                                                                    <img src="{{ asset('foodimage/' . $item->image) }}" alt="Image" width="100">
                                                                                @else
                                                                                    <img src="{{ asset('foodimage/default.jpg') }}" alt="Default Image" width="100">
                                                                                @endif
                                                                            </td>

                                                                            <td><strong>{{ $item->title }}</strong></td>
                                                                            <td>{{ $item->price }}</td>
                                                                            <td>{{ $item->description }}</td>

                                                                            

                                                                            <td>
                                                                                <div class="mb-3">
                                                                                    <input type="number" class="form-control" id="quantity" name="quantity" value="0" style="width: 50px;"/>
                                                                                </div>
                                                                            </td>

                                                                            <td>
                                                                                <!-- <div class="d-flex justify-content-end mb-4">
                                                                                    <a href="{{url('/addtocart')}}"><button type="button" class="btn btn-outline-primary">Add To Cart</button></a>
                                                                                </div> -->
                                                                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                                                                            </td>

                                                                                
                                                                        </tr>

                                                                    </form>
                                                                @endif
                                                                    
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    
                                    </div>
                                    <div class="tab-pane fade" id="tabs-2" role="tabpanel">
                                        <br>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <h5 class="card-header">Desserts</h5>
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table">
                                                        <thead class="table-light">
                                                        <tr>
                                                            <th>Image</th>
                                                            <th style="width: 100px">Name</th>
                                                            <th>Price</th>
                                                            <th style="width: 300px">Description</th>
                                                            <th style="width: 50px">Quantity</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0" style="white-space: normal; word-wrap: break-word; max-width: 300px;">

                                                            @foreach($data as $item)  <!-- Assuming $data is a collection --> 

                                                                

                                                                @if($item->type == "2")

                                                                    <form action="{{url('/addtocart',$item->id)}}" method="post" enctype="multipart/form-data">

                                                                        @csrf
                                                                        <tr>
                                                                            <td>
                                                                                @if($item->image)
                                                                                    <img src="{{ asset('foodimage/' . $item->image) }}" alt="Image" width="100">
                                                                                @else
                                                                                    <img src="{{ asset('foodimage/default.jpg') }}" alt="Default Image" width="100">
                                                                                @endif
                                                                            </td>

                                                                            <td><strong>{{ $item->title }}</strong></td>
                                                                            <td>{{ $item->price }}</td>
                                                                            <td>{{ $item->description }}</td>

                                                                            

                                                                            <td>
                                                                                <div class="mb-3">
                                                                                    <input type="number" class="form-control" id="quantity" name="quantity" value="0" style="width: 50px;"/>
                                                                                </div>
                                                                            </td>

                                                                            <td>
                                                                                <!-- <div class="d-flex justify-content-end mb-4">
                                                                                    <a href="{{url('/addtocart')}}"><button type="button" class="btn btn-outline-primary">Add To Cart</button></a>
                                                                                </div> -->
                                                                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                                                                            </td>

                                                                                
                                                                        </tr>

                                                                    </form>
                                                                @endif
                                                                    
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tabs-3" role="tabpanel">
                                        <br>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <h5 class="card-header">Savory</h5>
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table">
                                                        <thead class="table-light">
                                                        <tr>
                                                            <th>Image</th>
                                                            <th style="width: 100px">Name</th>
                                                            <th>Price</th>
                                                            <th style="width: 300px">Description</th>
                                                            <th style="width: 50px">Quantity</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0" style="white-space: normal; word-wrap: break-word; max-width: 300px;">

                                                            @foreach($data as $item)  <!-- Assuming $data is a collection --> 

                                                                

                                                                @if($item->type == "3")

                                                                    <form action="{{url('/addtocart',$item->id)}}" method="post" enctype="multipart/form-data">

                                                                        @csrf
                                                                        <tr>
                                                                            <td>
                                                                                @if($item->image)
                                                                                    <img src="{{ asset('foodimage/' . $item->image) }}" alt="Image" width="100">
                                                                                @else
                                                                                    <img src="{{ asset('foodimage/default.jpg') }}" alt="Default Image" width="100">
                                                                                @endif
                                                                            </td>

                                                                            <td><strong>{{ $item->title }}</strong></td>
                                                                            <td>{{ $item->price }}</td>
                                                                            <td>{{ $item->description }}</td>

                                                                            

                                                                            <td>
                                                                                <div class="mb-3" >
                                                                                    <input type="number" class="form-control" id="quantity" name="quantity" value="0" style="width: 50px;"/>
                                                                                </div>
                                                                            </td>

                                                                            <td>
                                                                                <!-- <div class="d-flex justify-content-end mb-4">
                                                                                    <a href="{{url('/addtocart')}}"><button type="button" class="btn btn-outline-primary">Add To Cart</button></a>
                                                                                </div> -->
                                                                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                                                                            </td>

                                                                                
                                                                        </tr>

                                                                    </form>
                                                                @endif
                                                                    
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <br><br> -->
                            



                            </form>
                        </div>
                    </div>
                </div>
            </div>

            


                
        </div>
    </section>

    
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.
                        
                        <br>Design: TemplateMo</p>
                    </div>
                </div> -->
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>