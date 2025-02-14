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

  <base href="/public">
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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Reservation /</span> Update Reservation</h4>

                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Update Reservation</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/update3', $data->id)}}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" required/>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}"/>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$data->phone}}" required/>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Number of Guest</label>
                                    <input type="number" class="form-control" id="guest" name="guest" value="{{$data->guest}}" required/>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Date</label>
                                    <div id="filterDate2">    
                                        <div class="input-group date" data-date-format="dd/mm/yyyy">
                                            <input  name="date" id="date" type="date" class="form-control" value="{{ $data->date ? \Carbon\Carbon::parse($data->date)->format('Y-m-d') : '' }}" required>
                                            <div class="input-group-addon" >
                                            <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Time</label>
                                    <input type="time" class="form-control" id="time" name="time" value="{{$data->time}}" required/>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">Type</label>
                                    <select class="form-select" id="status" name="status">
                                      @if($data->status == "Pending")
                                        <option value="Pending" selected>Pending</option>
                                        <option value="Schedule">Schedule </option>
                                        <option value="Complete">Complete</option>

                                      @elseif ($data->status == "Schedule")
                                        <option value="Schedule" selected>Schedule</option>
                                        <option value="Pending">Pending </option>
                                        <option value="Complete">Complete</option>

                                      @elseif ($data->status == "Complete")
                                        <option value="Complete" selected>Complete</option>
                                        <option value="Pending">Pending </option>
                                        <option value="Schedule">Schedule </option>
                                      @else
                                        <option value="Pending" selected>Pending</option>
                                        <option value="Schedule">Schedule </option>
                                        <option value="Complete">Complete</option>
                                      @endif

                                    </select>

                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Message</label>
                                    <textarea id="message" name="message" class="form-control">{{ $data->message }}</textarea>

                                </div>


                                <a href="{{url('/viewreservation')}}"><button type="button" class="btn btn-outline-primary">Back</button></a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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

    @include("admin2.adminscript2")
  </body>
</html>
