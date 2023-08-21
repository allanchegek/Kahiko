<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Admin Panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="/assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/assets/images/favicon.png" />
  <!-- modifications -->
  <link rel="stylesheet" href="/assets/css/mods.css">

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="<?= site_url('Admin/dashboard') ?>">
            <img src="/assets/images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="<?= site_url('Admin/dashboard') ?>">
            <img src="/assets/images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold"><?php
                                                                                    $session = session();

                                                                                    echo $session->get('name');

                                                                                    ?></span></h1>
            <h3 class="welcome-sub-text">Welcome to the Admin Page </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control" disabled>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="/assets/#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="/assets/images/faces/face8.jpg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="/assets/images/faces/male.png" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold"><?php
                                                          $session = session();

                                                          echo $session->get('name');

                                                          ?></p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border me-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="/assets/#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="/assets/#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="/assets/images/faces/face1.jpg" alt="image"><span class="online"></span>
                </div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/assets/images/faces/face2.jpg" alt="image"><span class="offline"></span>
                </div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/assets/images/faces/face3.jpg" alt="image"><span class="online"></span>
                </div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/assets/images/faces/face4.jpg" alt="image"><span class="offline"></span>
                </div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/assets/images/faces/face5.jpg" alt="image"><span class="online"></span>
                </div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/assets/images/faces/face6.jpg" alt="image"><span class="online"></span>
                </div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('Admin/dashboard') ?>">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Users</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= site_url('Admin/index') ?>">Admins</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= site_url('Admin/customers') ?>">Customers</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Products</li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('Admin/products') ?>">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Products page</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-sm-flex justify-content-between align-items-start">
                    <div>
                      <h4 class="card-title card-title-dash">Admins Table</h4>
                      <p class="card-subtitle card-subtitle-dash">This table shows the list of admins as obtained
                        from the organisation's database</p>
                    </div>
                    <div class="new_admin">
                      <button class="btn btn-primary btn-lg text-white mb-0 me-0 new-admin" type="button"><i class="mdi mdi-plus"></i>new admin</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Gender</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody id="admins_table_body">
                        <tr>
                          <td>53275533</td>
                          <td>John</td>
                          <td>14 May 2017</td>
                          <td>53275533</td>
                          <td>14 May 2017</td>
                          <td>14 May 2017</td>
                          <td><label class="badge badge-info">Edit</label></td>
                          <td><label class="badge badge-danger">Delete</label></td>
                        </tr>
                        <tr>
                          <td>53275534</td>
                          <td><input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username"></td>
                          <td><input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username"></td>
                          <td><input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username"></td>
                          <td><input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username"></td>
                          <td><input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username"></td>
                          <td><label class="badge badge-warning">Cancel</label><label class="badge badge-success">Confirm</label></td>
                          <td><label class="badge badge-danger">Delete</label></td>
                        </tr>
                        <tr>
                          <td>TBD</td>
                          <td><input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username"></td>
                          <td><input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username"></td>
                          <td><input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username"></td>
                          <td><input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username"></td>
                          <td><input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username"></td>
                          <td><label class="badge badge-warning">Cancel</label><label class="badge badge-success">Confirm</label></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights
              reserved.</span>
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
  <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="/assets/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/assets/js/off-canvas.js"></script>
  <script src="/assets/js/hoverable-collapse.js"></script>
  <script src="/assets/js/template.js"></script>
  <script src="/assets/js/settings.js"></script>
  <script src="/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="/assets/js/dashboard.js"></script>
  <script src="/assets/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      displayAdmins();
    })

    function displayAdmins() {
      $('#admins_table_body').html("");
      $.ajax({
        url: "<?php echo base_url('Admin/displayUsers') ?>",
        method: 'GET',
        success: function(response) {
          $.each(response.userlist, function(key, value) {
            if (value.role == 3 && value.is_deleted == 0) {
              $("#admins_table_body").append(
                `<tr data-id="` + value.user_id + `">
                                <td class="user_id">` + value.user_id + `</td>
                                <td class="first_name">` + value.first_name + `</td>
                                <td class="last_name">` + value.last_name + `</td>
                                <td class="email">` + value.email + `</td>
                                <td class="password">` + value.password + `</td>
                                <td class="gender">` + value.gender + `</td>
                                <td><label class="badge badge-info edit-btn">Edit</label></td>
                                <td><label class="badge badge-danger delete-btn">Delete</label></td>
                            </tr>`
              )
            }
          })
        }
      })
    }

    function displayAdmin(row) {
      var id = row.data('id');
      $.ajax({
        url: "<?php echo base_url('UserPages/getUser') ?>",
        method: 'POST',
        data: {
          id: id
        },
        success: function(response) {
          $.each(response.records, function(key, value) {
            if (value.role == 3 && value.is_deleted == 0) {
              row.html(
                `   <td class="user_id">` + value.user_id + `</td>
                                <td class="first_name">` + value.first_name + `</td>
                                <td class="last_name">` + value.last_name + `</td>
                                <td class="email">` + value.email + `</td>
                                <td class="password">` + value.password + `</td>
                                <td class="gender">` + value.gender + `</td>
                                <td><label class="badge badge-info edit-btn">Edit</label></td>
                                <td><label class="badge badge-danger delete-btn">Delete</label></td>`
              )
            }
          })
        }
      })
    }

    $(document).on('click', '.delete-btn', function() {
      $(this).parent().html(`<label class="badge badge-warning cancel-delete">Cancel</label><label class="badge badge-success confirm-delete">Confirm</label>`)
    })
    $(document).on('click', '.edit-btn', function() {
      var row = $(this).parent().parent()
      var fname = row.find('.first_name').html()
      var lname = row.find('.last_name').html()
      var email = row.find('.email').html()
      var password = row.find('.password').html()
      var gender = row.find('.gender').html()

      row.html(`<td class="user_id">` + row.data('id') + `</td>
                    <td class="first_name"><input type="text" class="form-control" value=` + fname + ` placeholder="First Name"></td>
                    <td class="last_name"><input type="text" class="form-control" value=` + lname + ` placeholder="Last Name"></td>
                    <td class="email"><input type="text" class="form-control" value=` + email + ` placeholder="Email"></td>
                    <td class="password"><input type="text" class="form-control" value=` + password + ` placeholder="Password"></td>
                    <td class="gender"><input type="text" class="form-control" value=` + gender + ` placeholder="Gender"></td>
                    <td><label class="badge badge-warning cancel-edit">Cancel</label><label class="badge badge-success confirm-edit">Confirm</label></td>
                    <td><label class="badge badge-danger delete-btn">Delete</label></td>`)
    })

    $(document).on('click', '.cancel-delete', function() {
      $(this).parent().html(`<label class="badge badge-danger delete-btn">Delete</label>`)
    })

    $(document).on('click', '.cancel-edit', function() {
      var row = $(this).parent().parent();
      displayAdmin(row)
    })

    $(document).on('click', '.new_admin', function() {
      $("#admins_table_body").prepend(`
                <tr>
                    <td class="user_id">TBD</td>
                    <td class="first_name"><input type="text" class="form-control" placeholder="First Name"></td>
                    <td class="last_name"><input type="text" class="form-control" placeholder="Last Name"></td>
                    <td class="email"><input type="text" class="form-control" placeholder="Email"></td>
                    <td class="password"><input type="text" class="form-control" placeholder="Password"></td>
                    <td class="gender"><input type="text" class="form-control" placeholder="Gender"></td>
                    <td><label class="badge badge-warning cancel-new">Cancel</label><label class="badge badge-success confirm-new">Confirm</label></td>
                </tr>`)
    })


    $(document).on('click', '.cancel-new', function() {
      $(this).parent().parent().remove();

    })
    $(document).on('click', '.confirm-delete', function() {
      var user_id = $(this).parent().parent().data('id');
      $.ajax({
        method: "POST",
        url: "<?php echo base_url('Admin/deleteUser') ?>",
        data: {
          user_id: user_id
        },
        success: function(response) {
          if (response == 1) {
            displayAdmins();
          } else {
            alert('Error deleting user')
            displayAdmins();
          }
        }

      })
    })


    $(document).on('click', '.confirm-edit', function() {
      var row = $(this).parent().parent();
      var fname = row.find('.first_name input[type="text"]').val()
      var lname = row.find('.last_name input[type="text"]').val()
      var email = row.find('.email input[type="text"]').val()
      var password = row.find('.password input[type="text"]').val()
      var gender = row.find('.gender input[type="text"]').val()
      data = {
        user_id: row.data('id'),
        first_name: fname,
        last_name: lname,
        email: email,
        password: password,
        gender: gender,
        role: 3
      }
      $.ajax({
        url: "<?php echo base_url('UserPages/updateUser') ?>",
        type: "post",
        data: data,
        success: function(response) {
          if (!response) {
            alert('Failed to modify row in database');
          } else {
            displayAdmin(row)
          }
        }
      })

    })

    $(document).on('click', '.confirm-new', function() {
      var row = $(this).parent().parent();
      var fname = row.find('.first_name input[type="text"]').val()
      var lname = row.find('.last_name input[type="text"]').val()
      var email = row.find('.email input[type="text"]').val()
      var password = row.find('.password input[type="text"]').val()
      var gender = row.find('.gender input[type="text"]').val()
      data = {
        firstname: fname,
        lastname: lname,
        email: email,
        password: password,
        gender: gender,
        role: 3
      }
      $.ajax({
        url: "<?php echo base_url('Admin/newuser') ?>",
        type: "post",
        data: data,
        success: function(response) {
          if (!response) {
            alert('Failed to add row to database');
          } else {
            displayAdmins()
          }
        }
      })

    })
  </script>
</body>

</html>