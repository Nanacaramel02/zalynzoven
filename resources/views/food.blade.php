    <!-- ***** Menu Area Starts ***** -->
    <!-- <section class="section" id="menu"> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Menu</h6>
                        <h2>Our selection of cakes with quality taste</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">

                @if(isset($data) && count($data) > 0)
                    @foreach($data as $item)

                        <form  action="" method="post">

                            @csrf
                            <div class="item">
                            <div style="background-image: url('/foodimage/{{$item->image}}');" class='card'>
                                <div class="price"><h6>RM{{$item->price}}</h6></div>
                                    <div class='info'>
                                        <h1 class='title'>{{$item->title}}</h1>
                                        <p class='description'>{{$item->description}}</p>
                                        <div class="main-text-button">
                                            <div class="scroll-to-section">
                                                <a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a>
                                            </div>

                                            <!-- <div class="quantity-selector mt-2">
                                                <label for="quantity-{{$item->id}}">Quantity:</label>
                                                <input type="number" id="quantity-{{$item->id}}" name="quantity" value="1" min="1" class="form-control" style="width: 60px; display: inline-block; text-align: center;">
                                            </div> -->

                                            <!-- <button type="submit" class="btn btn-primary mt-2">Add to Cart</button> -->
                                            <!-- <button type="submit" class="btn mt-2" style="background-color: #ff5733; color: white; border: none; padding: 10px 15px; border-radius: 5px;">Add to Cart</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                @else
                    <p>No data available</p>
                @endif


                

                    
                </div>
            </div>
        </div>
    <!-- </section> -->
    <!-- ***** Menu Area Ends ***** -->