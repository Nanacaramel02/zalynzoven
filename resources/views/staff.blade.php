<!-- ***** Chefs Area Starts ***** -->
<!-- <section class="section" id="chefs"> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Staff</h6>
                        <h2>We offer the best ingredients for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($data2 as $data2)
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <img src="staffimage/{{$data2->staffImage}}" alt="{{$data2->staffName}}">
                        </div>
                        <div class="down-content">
                            <h4>{{$data2->staffName}}</h4>
                            <span>{{$data2->staffPosition}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    <!-- </section> -->
    <!-- ***** Chefs Area Ends ***** -->