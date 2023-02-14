
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Help Desk | @yield('title')</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
    <!-- ligtbox -->
    <link rel="stylesheet" href="../../css/lightbox.css" />
  </head>
  <body>
    <div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
              <li class="nav-item  ms-0 me-5 d-lg-flex d-none">
                <h2>Help Desk System | </h2>
              </li>
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                
            </div>
            <ul class="navbar-nav navbar-nav-right">
                
                <li class="nav-item nav-profile">
                    <a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                      
                      <span class="nav-profile-name"> Hi, {{Auth::user()->fullname  }} </span>
                      
                    </a>
                  </li>
                  @if (Auth::user()->role_id == 1)
                {{-- <li class="nav-item dropdown d-lg-flex d-none">
                  <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm" id="nreportDropdown" href="#" data-bs-toggle="dropdown">
                  Reports
                  </a>
                
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="nreportDropdown">
                      <p class="mb-0 font-weight-medium float-left dropdown-header">Reports</p>
                      <a class="dropdown-item">
                        <i class="mdi mdi-file-pdf text-primary"></i>
                        Pdf
                      </a>
                      <a class="dropdown-item">
                        <i class="mdi mdi-file-excel text-primary"></i>
                        Exel
                      </a>
                  </div>
                </li> --}}
                @endif
                {{-- <li class="nav-item dropdown d-lg-flex d-none">
                  <button type="button" class="btn btn-inverse-primary btn-sm">Profile</button>
                </li> --}}
                <li class="nav-item d-lg-flex d-none">
                    <a href="/logout" class="btn btn-inverse-primary btn-sm mdi mdi-logout">Logout</a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container col-auto">
            @if (Auth::user()->role_id == 1)
            <ul class="nav page-navigation">
              {{-- <li class="nav-item">
                <a class="nav-link" href="dashboard">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li> --}}
              @endif

              @if (Auth::user()->role_id == 2)
              <ul class="nav page-navigation">
                {{-- <li class="nav-item">
                  <a class="nav-link" href="index">
                    <i class="mdi mdi-file-document-box menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                  </a>
                </li> --}}
                @endif

              <li class="nav-item">
                  <a href="/ticket" class="nav-link">
                    <i class="mdi mdi-ticket menu-icon"></i>
                    <span class="menu-title">Ticket</span>
                    <i class="menu-arrow"></i>
                  </a>  
                  <div class="submenu">
                      <ul>
                          <li class="nav-item"><a class="nav-link" href="/ticket">List Ticket</a></li>
                          <li class="nav-item"><a class="nav-link" href="/addticket">Create Ticket</a></li>
                      </ul>
                  </div>
              </li>
              {{-- <li class="nav-item">
                  <a href="notes" class="nav-link">
                    <i class="mdi mdi-note-text menu-icon"></i>
                    <span class="menu-title">Notes</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li> --}}

              @if (Auth::user()->role_id == 1)
              <li class="nav-item">
                  <a href="/manage" class="nav-link">
                    <i class="mdi mdi-account-multiple menu-icon"></i>
                    <span class="menu-title">Management User</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              @endif
              
            </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->

			<div class="main-panel">

                 @yield('content')
          

               

				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
			<footer class="footer">
                <div class="footer-wrap">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <script>document.write(new Date().getFullYear())</script>  <a href="" target="_blank"> </a></span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="" target="_blank">  </a> </span>
                    </div>
                </div>
            </footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
		<!-- container-scroller -->
    <!-- base:js -->
    <script src="../../vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../../js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../vendors/progressbar.js/progressbar.min.js"></script>
		<script src="../../vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="../../vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="../../vendors/justgage/justgage.js"></script>
    <script src="../../js/jquery.cookie.js" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <!-- JS Lightbox-->
    <script src="../../js/lightbox-plus-jquery.js"></script>
  </body>
</html>