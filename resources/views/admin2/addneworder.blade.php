<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>

    @include("admin2.admincss2")

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include("admin2.navbar2")

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li>
                    <x-app-layout>
                        
                    </x-app-layout>
                </li>
                
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Order /</span> Add New Order</h4>

                
            
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Add New Order</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/uploadorder')}}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Customer Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Write a Customer's name" required/>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">Customer Contact Num</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Write a Customer's Contact Num" required/>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Customer Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Write a Customer's Email" required/>
                                </div>

                                <div class="mb-3">
                                  <label for="exampleFormControlSelect1" class="form-label">Service Type</label>
                                  <select class="form-select" id="servicetype" name="servicetype">
                                    <option selected>--select service type--</option>
                                    <option value="1">Pickup </option>
                                    <option value="2">Delivery </option>
                                  </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Address</label>
                                    <textarea
                                        id="address"
                                        name="address"
                                        class="form-control"
                                        placeholder="Enter Customer's Address"
                                    ></textarea>
                                </div>


                                <!-- Cart List Section -->
                                <div class="col-xl">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Cart List</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $totalAmount = 0;
                                                    @endphp

                                                    @foreach($cartItems as $cart)  <!-- Loop through cart items -->
                                                        <tr>
                                                            <td>
                                                                @if($cart->image)
                                                                    <img src="{{ asset('foodimage/' . $cart->image) }}" alt="Image" width="100">
                                                                @else
                                                                    <img src="{{ asset('foodimage/default.jpg') }}" alt="Default Image" width="100">
                                                                @endif
                                                            </td>
                                                            <td><strong>{{ $cart->title }}</strong>
                                                                <input type="hidden" name="foodname[]" value="{{ $cart->title }}">
                                                            </td>
                                                            <td>RM {{ number_format($cart->price, 2) }}
                                                                <input type="hidden" name="price[]" value="{{ $cart->price }}">
                                                            </td>
                                                            <td>{{ $cart->quantity }}
                                                                <input type="hidden" name="quantity[]" value="{{ $cart->quantity }}" min="1">
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('/removefromcart', $cart->id) }}" class="btn btn-danger btn-sm">
                                                                    Remove
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        @php
                                                            $totalAmount += $cart->price * $cart->quantity;
                                                        @endphp

                                                    @endforeach

                                                </tbody>
                                            </table>

                                            @if($cartItems->isEmpty())
                                                <div class="text-center">
                                                    Your cart is empty.
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 offset-lg-4 text-center">
                                    <div class="section-heading">
                                        <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
                                        <h2>Total Amount: RM {{ number_format($totalAmount, 2) }}</h2>
                                    </div>
                                </div>

                                <a href="javascript:void(0);" id="addItemButton">
                                    <button type="button" class="btn btn-outline-primary">Add Item</button>
                                </a>

                                <br> <br>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Payment Method: Cash On Delivery</label>
                                </div>

                                <input type="hidden" name="paymentmethod" value="Cash On Delivery">
                                <input type="hidden" name="card_no" value="0">
                                <input type="hidden" name="exp" value="0">
                                <input type="hidden" name="cvv" value="0">


                                



                                

                                <br><br>
                                <a href="{{url('/orders')}}"><button type="button" class="btn btn-outline-primary">Back</button></a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                            <br><br>

                            <!-- Order Items Section (Initially Hidden) -->
                            <div id="orderItemsSection" style="display: none;">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <h5 class="card-header">Order Items</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Image</th>
                                                        <th style="width: 100px">Name</th>
                                                        <th>Price</th>
                                                        <th style="width: 50px">Quantity</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @foreach($data2 as $item)  
                                                        <form action="{{url('/addtocart2', $item->id)}}" method="post" enctype="multipart/form-data">
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
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <input type="number" class="form-control" name="quantity" value="0" style="width: 50px;">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <button type="submit" class="btn btn-primary addToCartButton">Add to Cart</button>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>

            


            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by NanaCaramel
                </div>
                
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the buttons
            let addItemButton = document.getElementById("addItemButton");
            let orderItemsSection = document.getElementById("orderItemsSection");

            // Show Order Items section when "Add Item" is clicked
            addItemButton.addEventListener("click", function () {
                orderItemsSection.style.display = "block";
            });

            // Hide Order Items section when "Add to Cart" is clicked
            document.querySelectorAll(".addToCartButton").forEach(function (button) {
                button.addEventListener("click", function () {
                    setTimeout(function () {
                        orderItemsSection.style.display = "none";
                    }, 500); // Slight delay to allow the form submission
                });
            });
        });
    </script>

    @include("admin2.adminscript2")
  </body>
</html>
