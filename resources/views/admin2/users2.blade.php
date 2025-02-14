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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users /</span> List of Users</h4>
            
                <!-- Bootstrap Table with Header - Light -->
                <div class="card">
                  <h5 class="card-header">List of Users</h5>
                  <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead class="table-light">
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        @foreach($data as $data)
                          <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$data->name}}</strong></td>
                            <td>{{$data->email}}</td>
                            

                            @if($data->userType=="0")
                              <td> <a class="dropdown-item" href="{{url('/deleteuser', $data->id)}}"
                                  ><i class="bx bx-trash me-1"></i> Delete</a>
                              </td>
                            @else
                              <td>Not Allowed</td>
                            
                            @endif
                                
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Bootstrap Table with Header - Light -->
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
