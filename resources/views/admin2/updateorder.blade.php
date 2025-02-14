<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <base href="/public">
  @include("admin2.admincss2")
</head>
<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      @include("admin2.navbar2")

      <div class="layout-page">
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..."/>
              </div>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li>
                <x-app-layout></x-app-layout>
              </li>
            </ul>
          </div>
        </nav>

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Order /</span> Update Order</h4>
            <div class="col-xl">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Update Order</h5>
                </div>
                <div class="card-body">
                  <form action="{{ url('/update4', $order->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{ $order->name }}" required/>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ $order->email }}" required/>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Phone Number</label>
                      <input type="text" class="form-control" name="phone" value="{{ $order->phone }}" required/>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Service Type</label>
                      <select class="form-select" name="servicetype">
                        <option value="1" {{ $order->servicetype == "1" ? 'selected' : '' }}>Pickup</option>
                        <option value="2" {{ $order->servicetype == "2" ? 'selected' : '' }}>Delivery</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Address</label>
                      <textarea name="address" class="form-control">{{ $order->address }}</textarea>
                    </div>
                    <h5 class="mt-4">Ordered Items</h5>

                    @if($orderItems->isNotEmpty())
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Food Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $totalAmount = 0;
                          @endphp

                          @foreach($orderItems as $item)
                            <tr>
                              <td>{{ $item->foodname }}</td>
                              <td>{{ $item->quantity }}</td>
                              <td>RM {{ number_format($item->price, 2) }}</td>
                              <td>
                                <a href="{{ url('/removefromorder', $item->id) }}" class="btn btn-danger btn-sm">
                                    Remove
                                </a>
                              </td>
                            </tr>
                            @php
                              $totalAmount += $item->price * $item->quantity;
                            @endphp

                          @endforeach
                        </tbody>
                      </table>
                    @else
                      <p>No items found.</p>
                    @endif

                    <!-- <br>
                    <a href="javascript:void(0);" id="addItemButton">
                        <button type="button" class="btn btn-outline-primary">Add Item</button>
                    </a> -->

                    <br>

                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
                            <h2>Total Amount: RM {{ number_format($totalAmount, 2) }}</h2>
                        </div>
                    </div>

                    <br>

                    <a href="{{ url('/orders') }}" class="btn btn-outline-primary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

                  <br>

                  <!-- Order Items Section (Initially Hidden) -->
                  <!-- <div id="orderItemsSection" style="display: none;">
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
                                            <form action="{{url('/addtocart3', $item->id)}}" method="post" enctype="multipart/form-data">
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
                  </div> -->


                </div>

                

              </div>
            </div>
          </div>
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                © <script>document.write(new Date().getFullYear());</script>, made with ❤️ by NanaCaramel
              </div>
            </div>
          </footer>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
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
