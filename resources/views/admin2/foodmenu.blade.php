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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Catalogue /</span>View Catalogue</h4>
              
              <div class="d-flex justify-content-end mb-4">
                <a href="{{url('/addnewmenu')}}"><button type="button" class="btn btn-outline-primary">Add New Product</button></a>
              </div>
              
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">View Catalogue</h5>
                <div class="table-responsive">
                  <table class="table">
                    <thead class="table-light">
                      <tr style="width: 200px; word-wrap: break-word;">
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Type</th>
                        <th>Product Description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($data as $item)  <!-- Assuming $data is a collection -->
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
                            @if ($item->type == "1")
                              Beverages
                            @elseif ($item->type == "2")
                              Desserts
                            @elseif ($item->type == "3")
                              Savory
                            @endif
                          </td>
                          <td>{{ $item->description }}</td>

                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('/updateproduct', $item->id)}}"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="{{url('/deleteproduct', $item->id)}}"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                              
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Bootstrap Table with Header - Light -->
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

    @include("admin2.adminscript2")
  </body>
</html>
