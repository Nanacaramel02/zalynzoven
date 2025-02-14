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

    <?php echo $__env->make("admin2.admincss2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <?php echo $__env->make("admin2.navbar2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    <?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
                </li>
                
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y"> 
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Orders /</span>View Orders</h4>
              
              <div class="d-flex justify-content-end mb-4">
                <a href="<?php echo e(url('/addneworder')); ?>"><button type="button" class="btn btn-outline-primary">Add New Order</button></a>
              </div>


              
              
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">View Orders</h5>
                <div class="table-responsive ">
                  <table class="table">
                    <thead class="table-light">
                        <tr style="width: 200px; word-wrap: break-word;">
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Service Type</th>
                            <th>Address</th>
                            <th>Total Amount</th>
                            <th>Order Items</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($order->id); ?></td>
                          <td><?php echo e($order->name); ?> <br> <?php echo e($order->email); ?> <br> <?php echo e($order->phone); ?></td>
                          <td>
                            <?php if($order->servicetype == "1"): ?>
                              <p>Pickup</p>
                            <?php else: ?>
                              <p>Delivery</p>
                            <?php endif; ?>

                          </td>
                          <td>
                            <?php echo e($order->address); ?>

                          </td>
                          <td>RM <?php echo e(number_format($order->total_amount, 2)); ?></td>
                          <td>
                              <ul>
                                  <?php if(isset($orderItems[$order->id])): ?>
                                      <?php $__currentLoopData = $orderItems[$order->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li><?php echo e($item->foodname); ?> (RM <?php echo e(number_format($item->price, 2)); ?> x <?php echo e($item->quantity); ?>)</li>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php else: ?>
                                      <li>No items found</li>
                                  <?php endif; ?>
                              </ul>
                          </td>
                          <td>
                              <?php if($order->payment_id): ?>
                                  <span class="badge bg-success">Paid</span>
                              <?php else: ?>
                                  <span class="badge bg-danger">Unpaid</span>
                              <?php endif; ?>
                          </td>

                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(url('/updateorder', $order->id)); ?>"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="<?php echo e(url('/deleteorder', $order->id)); ?>"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <?php echo $__env->make("admin2.adminscript2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php /**PATH C:\laragon\www\ZalynzOven2\resources\views\admin2\orders.blade.php ENDPATH**/ ?>