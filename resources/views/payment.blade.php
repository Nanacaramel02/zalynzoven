<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">

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


    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>My Payment</h6>
                        <h2>Let's Grab Some Meals</h2>

                        <br><br>

                        

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
                                                    <img src="assets/images/tab-icon-01.png" alt=""> Credit/Debit Card
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                                    <img src="assets/images/tab-icon-02.png" alt=""> QR Code Payment
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                                    <img src="assets/images/tab-icon-03.png" alt=""> Online Banking
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                                    <img src="assets/images/tab-icon-03.png" alt=""> Cash On Delivery
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab Content -->

                            

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tabs-1" role="tabpanel">
                                        <br> <br>

                                        <div class="col-lg-6 col-md-8 col-sm-10 mx-auto"> <!-- Adjusted width -->
                                            <div class="contact-form p-4 shadow rounded bg-light"> <!-- Added padding, shadow, rounded corners, and background -->

                                                <div class="text-center mb-4">
                                                    <b><h4>Order Payment (Credit/Debit Card)</h4> </b>
                                                </div>

                                                <div class="col-lg-4 offset-lg-4 text-center">
                                                    <div class="section-heading">
                                                        <h2>RM {{ number_format($total, 2) }}</h2>
                                                    </div>
                                                </div>

                                                @if(isset($order->id))

                                                    <form action="{{ url('/makepayment/' . $order->id) }}" method="post">
                                                        @csrf
        
                                                        <div class="row">
                                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                            <input type="hidden" name="paymentmethod" value="Credit/Debit Card">

                                                            <div class="col-12 mb-3">
                                                                <input name="card_no" type="text" class="form-control" placeholder="Your Credit Card Number*" required>
                                                            </div>
                                                            <div class="col-12 mb-3">
                                                                <input name="exp" type="text" class="form-control" placeholder="Your Expiration Date*" required>
                                                            </div>
                                                            <div class="col-12 mb-3">
                                                                <input name="cvv" type="text" class="form-control" placeholder="Your CVV*" required>
                                                            </div>
                                                            
                                                            <div class="col-12 text-center">
                                                                <button type="submit" class="btn btn-success">Order Confirm</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    <p>Error: Order ID not found.</p>
                                                @endif
                                                
                                            </div>
                                        </div>

                                        
                                        
                                    
                                    </div>
                                    <div class="tab-pane fade" id="tabs-2" role="tabpanel">
                                        <br><br>

                                        <div class="col-lg-6 col-md-8 col-sm-10 mx-auto"> <!-- Adjusted width -->
                                            <div class="contact-form p-4 shadow rounded bg-light"> <!-- Added padding, shadow, rounded corners, and background -->

                                                <div class="text-center mb-4">
                                                    <b><h4>Order Payment (QR Code Payment)</h4> </b>
                                                </div>

                                                <div class="col-lg-4 offset-lg-4 text-center">
                                                    <div class="section-heading">
                                                        <h2>RM {{ number_format($total, 2) }}</h2>
                                                    </div>
                                                </div>

                                                @if(isset($order->id))

                                                    <form action="{{ url('/makepayment/' . $order->id) }}" method="post">
                                                        @csrf
        
                                                        <div class="row">
                                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                            <input type="hidden" name="paymentmethod" value="QR Code Payment">
                                                            <input type="hidden" name="card_no" value="0">
                                                            <input type="hidden" name="exp" value="0">
                                                            <input type="hidden" name="cvv" value="0">

                                                            <div class="col-12 mb-3">
                                                                <label for="formFile" class="form-label">Prove of Payment</label>
                                                                <input class="form-control" type="file" id="proof" name="proof"/>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-12 text-center">
                                                                <button type="submit" class="btn btn-success">Order Confirm</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    <p>Error: Order ID not found.</p>
                                                @endif

                                                    
                                                
                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane fade" id="tabs-3" role="tabpanel">
                                        <br> <br>

                                        <div class="col-lg-6 col-md-8 col-sm-10 mx-auto"> <!-- Adjusted width -->
                                            <div class="contact-form p-4 shadow rounded bg-light"> <!-- Added padding, shadow, rounded corners, and background -->

                                                <div class="text-center mb-4">
                                                    <b><h4>Order Payment (Online Banking)</h4></b>
                                                </div>

                                                <div class="col-lg-4 offset-lg-4 text-center">
                                                    <div class="section-heading">
                                                        <h2>RM {{ number_format($total, 2) }}</h2>
                                                    </div>
                                                </div>

                                                @if(isset($order->id))

                                                    <form action="{{ url('/makepayment/' . $order->id) }}" method="post">
                                                        @csrf
        
                                                        <div class="row">
                                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                            <input type="hidden" name="paymentmethod" value="Online Banking">
                                                            <input type="hidden" name="card_no" value="0">
                                                            <input type="hidden" name="exp" value="0">
                                                            <input type="hidden" name="cvv" value="0">

                                                            <div class="col-12 mb-3">
                                                                <label for="formFile" class="form-label">Prove of Payment</label>
                                                                <input class="form-control" type="file" id="proof" name="proof"/>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-12 text-center">
                                                                <button type="submit" class="btn btn-success">Order Confirm</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                @else
                                                    <p>Error: Order ID not found.</p>
                                                @endif

                                                
                                            </div>
                                        </div>

                                        
                                    </div>

                                    <div class="tab-pane fade" id="tabs-4" role="tabpanel">
                                        <br> <br>

                                        <div class="col-lg-6 col-md-8 col-sm-10 mx-auto"> <!-- Adjusted width -->
                                            <div class="contact-form p-4 shadow rounded bg-light"> <!-- Added padding, shadow, rounded corners, and background -->

                                                <div class="text-center mb-4">
                                                    <b><h4>Order Payment (Cash On Delivery)</h4></b>
                                                </div>

                                                <div class="col-lg-4 offset-lg-4 text-center">
                                                    <div class="section-heading">
                                                        <h2>RM {{ number_format($total, 2) }}</h2>
                                                    </div>
                                                </div>

                                                @if(isset($order->id))

                                                    <h4 align="center">See You At the Counter</h4>
                                                    <br><br><br>

                                                    <form action="{{ url('/makepayment/' . $order->id) }}" method="post">
                                                        @csrf
        
                                                        <div class="row">
                                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                            <input type="hidden" name="paymentmethod" value="Cash On Delivery">
                                                            <input type="hidden" name="card_no" value="0">
                                                            <input type="hidden" name="exp" value="0">
                                                            <input type="hidden" name="cvv" value="0">
                                                            
                                                            
                                                            <div class="col-12 text-center">
                                                                <button type="submit" class="btn btn-success">Order Confirm</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    <p>Error: Order ID not found.</p>
                                                @endif

                                                    
                                                
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>

                                <!-- <button type="submit" class="btn btn-primary">Order Now</button> -->

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