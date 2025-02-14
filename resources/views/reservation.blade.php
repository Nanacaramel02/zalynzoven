<!-- ***** Reservation Us Area Starts ***** -->
<!-- <section class="section" id="reservation"> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Reservation</h6>
                            <h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2>
                        </div>
                        <p>
                          Experience an unforgettable dining experience at Zalynz Oven! Whether it's a cozy meal with loved ones or a special celebration, we’re here to make it memorable. Book your table now to ensure you don’t miss out on our exclusive menu items and exceptional service. With just a few clicks, you can secure your spot and enjoy the comfort of knowing everything is ready for your arrival.
                          <br><br>
                          Don’t wait, reserve now and be treated to the best of what we have to offer!
                        </p>
                    </div>
                </div>



                <div class="col-lg-6">
                    <div class="contact-form">
                        <form id="contact" action="{{url('reservation')}}" method="post">

                            @csrf

                          <div class="row">
                            <div class="col-lg-12">
                                <h4>Table Reservation</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="number" name="guest" placeholder="Number of guest">
                              
                            </div>

                            <div class="col-lg-6">
                              <div id="filterDate2">
                                  <div class="input-group">
                                      <input name="date" id="datepicker" type="text" class="form-control" placeholder="dd/mm/yyyy">
                                      <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            <!-- <div class="col-lg-6">
                                <div id="filterDate2">    
                                  <div class="input-group date" data-date-format="dd/mm/yyyy">
                                    <input name="date" id="datepicker" type="text" class="form-control" placeholder="dd/mm/yyyy">

                                    <input  name="date" id="datepicker" type="date" class="form-control" placeholder="dd/mm/yyyy">
                                    <input type="date" name="date" id="date" class="form-control" required>

                                    <div class="input-group-addon" >
                                      <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                  </div>
                                </div>   
                            </div> -->

                            <div class="col-md-6 col-sm-12">
                                <input type="time" name="time">
                            </div>
                            <input type="hidden" name="status" value="Pending">
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- </section> -->
    <!-- ***** Reservation Area Ends ***** -->