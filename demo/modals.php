<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/ui-features/modals.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:10:50 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Premium Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/horizontal-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../partials/_horizontal-navbar.html -->
   <?php include("header.php"); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Large Modal</h4>
                  <p class="card-description">Large sized modal with max-width set to <code>90%</code></p>
                  <!-- Dummy Modal Starts -->
                  <div class="modal demo-modal">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modal title</h5>
                          <button type="button" class="close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Dummy Modal Ends -->
                  <!-- Modal starts -->
                  <div class="text-center">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Click for demo<i class="ti-arrow-circle-right ms-1"></i></button>
                  </div>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Ends -->
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Medium Modal</h4>
                  <p class="card-description">Normal modal with default bootstrap settings</p>
                  <!-- Dummy Modal Starts -->
                  <div class="modal demo-modal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modal title</h5>
                          <button type="button" class="close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Dummy Modal Ends -->
                  <!-- Modal starts -->
                  <div class="text-center">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-2">Click for demo<i class="ti-arrow-circle-right ms-1"></i></button>
                  </div>
                  <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">Modal title</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Ends -->
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Small Modal</h4>
                  <p class="card-description">Small modal with max-width set to <code>300px</code></p>
                  <!-- Dummy Modal Starts -->
                  <div class="modal demo-modal">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modal title</h5>
                          <button type="button" class="close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Dummy Modal Ends -->
                  <!-- Modal starts -->
                  <div class="text-center">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-3">Click for demo<i class="ti-arrow-circle-right ms-1"></i></button>
                  </div>
                  <div class="modal fade" id="exampleModal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-3">Modal title</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Ends -->
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Varying Modal Content</h4>
                  <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalLabel">New message</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Recipient:</label>
                              <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="col-form-label">Message:</label>
                              <textarea class="form-control" id="message-text"></textarea>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success">Send message</button>
                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal-4" data-whatever="@mdo">Open modal for @mdo</button>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Varying Modal Content</h4>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-4" data-whatever="@fat">Open modal for @fat</button>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Varying Modal Content</h4>
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal-4" data-whatever="@getbootstrap">Modal for @getbootstrap</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ms-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/modal-demo.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/horizontal-default-light/pages/ui-features/modals.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Aug 2021 13:10:50 GMT -->
</html>
