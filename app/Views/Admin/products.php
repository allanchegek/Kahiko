<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Product Management | Kahiko Collection</title>
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
  <!-- modifications -->
  <link rel="stylesheet" href="/assets/css/mods.css">
  <link rel="stylesheet" href="/assets/css/products.css">

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
            <h3 class="welcome-sub-text">Welcome to the Admin Panel </h3>
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
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="row flex-grow">
                          </div>
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                      <h4 class="card-title card-title-dash">Product Catalogue</h4>
                                    </div>
                                    <div class="new_product">
                                      <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-plus"></i>Add new product</button>
                                    </div>
                                  </div>
                                  <div class="table-responsive  mt-1">
                                    <table class="table select-table products">
                                      <thead>
                                        <tr>
                                          <th></th>
                                          <th>Description</th>
                                          <th>Classification</th>
                                          <th>Image path</th>
                                          <th>Available Quantity</th>
                                          <th>Created At</th>
                                          <th>Updated At</th>
                                          <th>Added By</th>
                                          <th>Edit</th>
                                        </tr>
                                      </thead>
                                      <tbody id="products_table_body">
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Categories table</h4>
                                    <p class="card-subtitle card-subtitle-dash">Table of categories of products</p>
                                  </div>
                                  <div class="new_category">
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-plus"></i>Add new category</button>
                                  </div>
                                </div>
                                <div class="table-responsive pt-3">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>
                                          #
                                        </th>
                                        <th>
                                          Category name
                                        </th>
                                        <th>
                                          Edit/Delete
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody id="categories_table_body">

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Subcategories table</h4>
                                    <p class="card-subtitle card-subtitle-dash">Product subcategories</p>
                                  </div>

                                  <div class="new_subcategory">
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-plus"></i>Add new subcategory</button>
                                  </div>
                                </div>
                                <div class="table-responsive pt-3">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>
                                          #
                                        </th>
                                        <th>
                                          Category
                                        </th>
                                        <th>
                                          Subcategory name
                                        </th>
                                        <th>
                                          Edit/Delete
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody id="subcategories_table_body">

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
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="/assets/https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
                BootstrapDash.</span>
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
        displayProducts();
        displayCategories();
        displaySubcategories();
      })

      function displayCatalog() {
        $.ajax({
          url: "<?php echo base_url('Admin/displayCatalog') ?>",
          method: 'GET',
          success: function(response) {
            $.each(response.catalog, function(key, value) {
              $("#products_table_body").append(
                "<tr><th scope='row'>" + value.product_id +
                "</th><td>" + value.product_name + "</td><td>" +
                value.product_description + "</td><td> " + value.unit_price + "</td><td>" + value.available_quantity +
                "</td><td>" + value.gender + "</td><td>" + value.subcategory_id + "</td><td><button class='btn btn-danger delete-product' data-id=" + value.product_id + ">Delete</button>"
              )
            })
          }
        })

      }

      function displayProducts() {
        $('#products_table_body').html("");
        $.ajax({
          url: "<?php echo base_url('Admin/displayCatalog') ?>",
          method: 'GET',
          success: function(response) {
            $.each(response.catalog, function(key, value) {
              if (value.is_deleted == 0) {
                $("#products_table_body").append(
                  `<tr data-id="` + value.product_id + `">
                                <td>
                                <i style="color: blue;" class="mdi mdi-minus-box confirm-delete"></i>
                                </td>
                                <td>
                                <div class="d-flex ">
                                    <img src="` + value.product_image + `" alt="">
                                    <div>
                                    <h6 class="value product_name">` + value.product_name + `</h6>
                                    <p class="value product_description">` + value.product_description + `</p>
                                    <p> <span class="currency">Ksh.</span><span
                                        class="value unit_price">` + value.unit_price + `</span></p>
                                    </div>
                                </div>
                                </td>
                                <td>
                                <h6>Men</h6>
                                <p>Subcategory id: <span class="subcategory_id">` + value.subcategory_id + `</span></p>
                                <p>Gender: <span class="gender">` + value.gender + `</span></p>
                                </td>
                                <td>
                                <p class="product_image">` + value.product_image + `</p>
                                </td>
                                <td>
                                <p class="available_quantity">` + value.available_quantity + `</p>
                                </td>
                                <td>
                                <p class="created_at">` + value.created_at + `</p>
                                </td>
                                <td>
                                <p class="updated_at">` + value.updated_at + `</p>
                                </td>
                                <td>
                                <p class="added_by">` + value.added_by + `</p>
                                </td>
                                <td>
                                <label class="badge badge-info edit-btn">Edit</label>
                                </td>
                            </tr>`
                )
              }
            })
          }
        })
      }

      function displayProduct(row) {
        var id = row.data('id');
        $.ajax({
          url: "<?php echo base_url('Admin/getProduct') ?>",
          method: 'POST',
          data: {
            product_id: id
          },
          success: function(response) {
            $.each(response.product, function(key, value) {
              if (value.is_deleted == 0) {
                row.html(
                  `<td>
                                <i style="color: blue;" class="mdi mdi-minus-box confirm-delete"></i>
                                </td>
                                <td>
                                <div class="d-flex ">
                                    <img src="` + value.product_image + `" alt="">
                                    <div>
                                    <h6 class="value product_name">` + value.product_name + `</h6>
                                    <p class="value product_description">` + value.product_description + `</p>
                                    <p> <span class="currency">Ksh.</span><span
                                        class="value unit_price">` + value.unit_price + `</span></p>
                                    </div>
                                </div>
                                </td>
                                <td>
                                <h6>Men</h6>
                                <p>Subcategory id: <span class="subcategory_id">` + value.subcategory_id + `</span></p>
                                <p >Gender: <span class="gender">` + value.gender + `</span></p>
                                </td>
                                <td>
                                <p class="product_image">` + value.product_image + `</p>
                                </td>
                                <td>
                                <p class="available_quantity">` + value.available_quantity + `</p>
                                </td>
                                <td>
                                <p class="created_at">` + value.created_at + `</p>
                                </td>
                                <td>
                                <p class="updated_at">` + value.updated_at + `</p>
                                </td>
                                <td>
                                <p class="added_by">` + value.added_by + `</p>
                                </td>
                                <td>
                                <label class="badge badge-info edit-btn">Edit</label>
                                </td>`
                )
              }
            })
          }
        })
      }

      $(document).on('click', '.edit-btn', function() {
        var row = $(this).parent().parent()
        // var product_id = row.data('id')
        var product_name = row.find('.product_name').html()
        var product_description = row.find('.product_description').html()
        var product_image = row.find('.product_image').html()
        var unit_price = row.find('.unit_price').html()
        var available_quantity = row.find('.available_quantity').html()
        var gender = row.find('.gender').html()
        var subcategory_id = row.find('.subcategory_id').html()
        var created_at = row.find('.created_at').html()
        var updated_at = row.find('.updated_at').html()
        var added_by = row.find('.added_by').html()


        row.html(`  <td>
                        <i style="color: blue;" class="mdi mdi-minus-box confirm-delete"></i>
                        </td>
                        <td>
                        <div class="d-flex ">
                            <img src="` + product_image + `" alt="">
                            <div>
                            <h6 class="value product_name"><input type="text"
                                placeholder="Product name" value="` + product_name + `"></h6>
                            <p class="value product_description"><input type="text"
                                placeholder="Product descriptiption" value="` + product_description + `"></p>
                            <p> <span class="currency">Ksh.</span><span
                                class="value unit_price"><input type="text"
                                    placeholder="Price" value="` + unit_price + `"></span></p>
                            </div>
                        </div>
                        </td>
                        <td>
                        <h6><input type="text" placeholder="Category" value="Men"></h6>
                        <p class="subcategory_id">Subcategory id: <input type="text" value="` + subcategory_id + `"></p>
                        <p class="gender">Gender: <input type="text" value="` + gender + `"></p>
                        </td>
                        <td>
                        <p class="product_image"><input type="text" placeholder="Image path" value="` + product_image + `"></p>
                        </td>
                        <td>
                        <p class="available_quantity"><input type="text" placeholder="Stock quantity" value="` + available_quantity + `"></p>
                        </td>
                        <td>
                        <p>` + created_at + `</p>
                        </td>
                        <td>
                        <p>` + updated_at + `</p>
                        </td>
                        <td>
                        <p>` + added_by + `</p>
                        </td>
                        <td><label class="badge badge-warning cancel-edit">Cancel</label>
                        <label class="badge badge-success confirm-edit">Confirm</label>
                        </td>`)
      })

      $(document).on('click', '.cancel-delete', function() {
        $(this).parent().html(`<label class="badge badge-danger delete-btn">Delete</label>`)
      })

      $(document).on('click', '.cancel-edit', function() {
        var row = $(this).parent().parent();
        displayProduct(row)
      })

      $(document).on('click', '.new_product', function() {
        $("#products_table_body").prepend(`
                    <tr>
                        <td>
                        <i style="color: blue;" class="mdi mdi-minus-box confirm-delete"></i>
                        </td>
                        <td>
                        <div class="d-flex ">
                            <img src="" alt="">
                            <div>
                            <h6 class="value product_name"><input type="text"
                                placeholder="Product name"></h6>
                            <p class="value product_description"><input type="text"
                                placeholder="Product descriptiption"></p>
                            <p> <span class="currency">Ksh.</span><span
                                class="value unit_price"><input type="text"
                                    placeholder="Price"></span></p>
                            </div>
                        </div>
                        </td>
                        <td>
                        <h6>Men</h6>
                        <p class="subcategory_id">Subcategory id: <input type="text"></p>
                        <p class="gender">Gender: <input type="text"></p>
                        </td>
                        <td>
                        <p class="product_image"><input type="text" placeholder="Image path"></p>
                        </td>
                        <td>
                        <p class="available_quantity"><input type="text" placeholder="Stock quantity"></p>
                        </td>
                        <td>
                        <p> TBD</p>
                        </td>
                        <td>
                        <p>TBD</p>
                        </td>
                        <td>
                        <p>TBD</p>
                        </td>
                        <td><label class="badge badge-warning cancel-new">Cancel</label>
                        <label class="badge badge-success confirm-new">Confirm</label>
                        </td>
                    </tr>`)
      })


      $(document).on('click', '.cancel-new', function() {
        $(this).parent().parent().remove();

      })
      $(document).on('click', '.confirm-delete', function() {
        var product_id = $(this).parent().parent().data('id');
        $.ajax({
          method: "POST",
          url: "<?php echo base_url('Admin/deleteProduct') ?>",
          data: {
            product_id: product_id
          },
          success: function(response) {
            if (response == 1) {

              $('#products_table_body').html("");
              displayProducts();
            } else {
              displayProducts();
            }
          }

        })
      })


      $(document).on('click', '.confirm-edit', function() {
        var row = $(this).parent().parent()
        var product_id = row.data('id')
        var product_name = row.find('.product_name input[type="text"]').val()
        var product_description = row.find('.product_description input[type="text"]').val()
        var product_image = row.find('.product_image input[type="text"]').val()
        var unit_price = row.find('.unit_price input[type="text"]').val()
        var available_quantity = row.find('.available_quantity input[type="text"]').val()
        var gender = row.find('.gender input[type="text"]').val()
        var subcategory_id = row.find('.subcategory_id input[type="text"]').val()
        data = {
          product_id: product_id,
          product_name: product_name,
          product_description: product_description,
          product_image: product_image,
          unit_price: unit_price,
          available_quantity: available_quantity,
          gender: gender,
          subcategory_id: subcategory_id
        }
        $.ajax({
          url: "<?php echo base_url('Admin/updateProduct') ?>",
          type: "post",
          data: data,
          success: function(response) {
            if (!response) {
              alert('Failed to modify row in database');
            } else {
              displayProduct(row)
            }
          }
        })

      })

      $(document).on('click', '.confirm-new', function() {
        var row = $(this).parent().parent()
        var product_name = row.find('.product_name input[type="text"]').val()
        var product_description = row.find('.product_description input[type="text"]').val()
        var product_image = row.find('.product_image input[type="text"]').val()
        var unit_price = row.find('.unit_price input[type="text"]').val()
        var available_quantity = row.find('.available_quantity input[type="text"]').val()
        var gender = row.find('.gender input[type="text"]').val()
        var subcategory_id = row.find('.subcategory_id input[type="text"]').val()
        data = {
          product_name: product_name,
          product_description: product_description,
          product_image: product_image,
          price: unit_price,
          available_quantity: available_quantity,
          product_gender: gender,
          subcategory_id: subcategory_id,
          added_by: 3
        }
        $.ajax({
          url: "<?php echo base_url('Admin/newProducts') ?>",
          type: "post",
          data: data,
          success: function(response) {
            if (!response) {
              alert('Failed to add row to database');
            } else {
              displayProducts()
            }
          }
        })

      })

      $(document).on('click', '.new_category', function() {
        $("#categories_table_body").prepend(`
                    <tr>
                        <td>
                        TBD
                        </td>
                        <td class="category_name">
                            <input type="text" class="form-control" id="exampleInputUsername1"
                            placeholder="Category name">
                        </td>
                        <td>
                            <i style="font-size:24px;color: blue;" class="mdi mdi-window-close cancel-new"></i>
                            <i style="font-size:24px;color: blue;" class="mdi mdi-check confirm-new-category"></i>
                        </td>
                    </tr>`)
      })

      function displayCategories() {
        $("#categories_table_body").html('')
        $.ajax({
          url: "<?php echo base_url('Admin/displayCategories') ?>",
          method: 'GET',
          success: function(response) {
            $.each(response.categories, function(key, value) {
              if (value.is_deleted == 0) {
                $("#categories_table_body").append(
                  `<tr data-id="` + value.category_id + `">
                                    <td class="category_id">
                                        ` + value.category_id + `
                                        </td>
                                    <td class="category_name">
                                        ` + value.category_name + `
                                    </td>
                                    <td>
                                        <i style="font-size:24px;color: blue;" class="mdi mdi-minus-box delete-category-btn"></i>
                                        <i style="font-size:24px;color: blue;" class="mdi mdi-grease-pencil edit-category-btn"></i>
                                    </td>
                                </tr>`
                )
              }

            })
          }
        })

      }
      $(document).on('click', '.confirm-new-category', function() {
        var row = $(this).parent().parent()
        var category_name = row.find('.category_name input[type="text"]').val()
        data = {
          category_name: category_name
        }
        $.ajax({
          url: "<?php echo base_url('Admin/newCategories') ?>",
          type: "post",
          data: data,
          success: function(response) {
            if (!response) {
              alert('Failed to add row to database');
            } else {
              displayCategories()
            }
          }
        })

      })

      $(document).on('click', '.edit-category-btn', function() {
        var row = $(this).parent().parent()
        var category_id = row.data('id')
        var category_name = $.trim(row.find('.category_name').html())

        row.html(`  <td>
                        ` + category_id + `
                        </td>
                        <td class="category_name">
                            <input type="text" class="form-control" value="` + category_name + `" placeholder="Category name">
                        </td>
                        <td>
                            <i style="font-size:24px;color: blue;" class="mdi mdi-window-close cancel-edit-category"></i>
                            <i style="font-size:24px;color: blue;" class="mdi mdi-check confirm-edit-category"></i>
                        </td>`)
      })
      $(document).on('click', '.cancel-edit-category', function() {

        var row = $(this).parent().parent();
        displayCategory(row)
      })

      function displayCategory(row) {
        var id = row.data('id');
        $.ajax({
          url: "<?php echo base_url('Admin/getCategory') ?>",
          method: 'POST',
          data: {
            category_id: id
          },
          success: function(response) {
            console.log(response)
            $.each(response.category, function(key, value) {
              if (value.is_deleted == 0) {
                row.html(
                  `<td class="category_id">
                                    ` + value.category_id + `
                                    </td>
                                <td class="category_name">
                                    ` + value.category_name + `
                                </td>
                                <td>
                                    <i style="font-size:24px;color: blue;" class="mdi mdi-minus-box delete-category-btn"></i>
                                    <i style="font-size:24px;color: blue;" class="mdi mdi-grease-pencil edit-category-btn"></i>
                                </td>`
                )
              }
            })
          }
        })
      }

      $(document).on('click', '.confirm-edit-category', function() {
        var row = $(this).parent().parent()
        var category_id = row.data("id")
        var category_name = row.find('.category_name input[type="text"]').val()
        data = {
          category_name: category_name,
          category_id: category_id
        }
        $.ajax({
          url: "<?php echo base_url('Admin/updateCategory') ?>",
          type: "post",
          data: data,
          success: function(response) {
            if (!response) {
              alert('Failed to add row to database');
            } else {
              displayCategory(row)
            }
          }
        })

      })

      $(document).on('click', '.delete-category-btn', function() {
        $(this).parent().html(`<i style="font-size:24px;color: blue;" class="mdi mdi-window-close cancel-edit-category"></i>
                            <i style="font-size:24px;color: blue;" class="mdi mdi-check confirm-delete-category"></i>`)
      })
      $(document).on('click', '.confirm-delete-category', function() {
        var category_id = $(this).parent().parent().data('id');
        $.ajax({
          method: "POST",
          url: "<?php echo base_url('Admin/deleteCategory') ?>",
          data: {
            category_id: category_id
          },
          success: function(response) {
            if (response == 1) {
              $('#categories_table_body').html("");
              displayCategories();
            } else {
              displayCategories();
            }
          }

        })
      })

      function displaySubcategories() {
        $("#subcategories_table_body").html('')
        $.ajax({
          url: "<?php echo base_url('Admin/displaySubcategories') ?>",
          method: 'GET',
          success: function(response) {
            $.each(response.subcategories, function(key, value) {
              if (value.is_deleted == 0) {
                $("#subcategories_table_body").append(
                  `<tr data-id="` + value.subcategory_id + `">
                                    <td class="subcategory_id">
                                        ` + value.subcategory_id + `
                                        </td>
                                    <td class="category_id">
                                        ` + value.category + `
                                    </td>
                                    <td class="subcategory_name">
                                        ` + value.subcategory_name + `
                                    </td>
                                    <td>
                                        <i style="font-size:24px;color: blue;" class="mdi mdi-minus-box delete-subcategory-btn"></i>
                                        <i style="font-size:24px;color: blue;" class="mdi mdi-grease-pencil edit-subcategory-btn"></i>
                                    </td>
                                </tr>`
                )
              }

            })
          }
        })

      }

      function displaySubcategory(row) {
        var id = row.data('id');
        $.ajax({
          url: "<?php echo base_url('Admin/getSubcategory') ?>",
          method: 'POST',
          data: {
            subcategory_id: id
          },
          success: function(response) {
            $.each(response.subcategory, function(key, value) {
              if (value.is_deleted == 0) {
                row.html(
                  `<td class="subcategory_id">
                                        ` + value.subcategory_id + `
                                        </td>
                                    <td class="category_id">
                                        ` + value.category + `
                                    </td>
                                    <td class="subcategory_name">
                                        ` + value.subcategory_name + `
                                    </td>
                                    <td>
                                        <i style="font-size:24px;color: blue;" class="mdi mdi-minus-box delete-subcategory-btn"></i>
                                        <i style="font-size:24px;color: blue;" class="mdi mdi-grease-pencil edit-subcategory-btn"></i>
                                    </td>`
                )
              }
            })
          }
        })
      }

      $(document).on('click', '.delete-subcategory-btn', function() {
        $(this).parent().html(`<i style="font-size:24px;color: blue;" class="mdi mdi-window-close cancel-edit-subcategory"></i>
                               <i style="font-size:24px;color: blue;" class="mdi mdi-check confirm-delete-subcategory"></i>`)
      })
      $(document).on('click', '.confirm-delete-subcategory', function() {
        var subcategory_id = $(this).parent().parent().data('id');
        $.ajax({
          method: "POST",
          url: "<?php echo base_url('Admin/deleteSubcategory') ?>",
          data: {
            subcategory_id: subcategory_id
          },
          success: function(response) {
            if (response == 1) {
              displaySubcategories();
            } else {
              displaySubcategories();
              alert('Failed to delete subcategory from database')
            }
          }

        })
      })

      $(document).on('click', '.cancel-edit-subcategory', function() {
        var row = $(this).parent().parent();
        displaySubcategory(row)
      })

      $(document).on('click', '.edit-subcategory-btn', function() {
        var row = $(this).parent().parent()
        var subcategory_id = $.trim(row.data('id'))
        var category_id = $.trim(row.find('.category_id').html())
        var subcategory_name = $.trim(row.find('.subcategory_name').html())

        row.html(`  <td>
                        ` + subcategory_id + `
                        </td>
                        <td class="category_id">
                            <input type="text" class="form-control" value="` + category_id + `" placeholder="Category ID">
                        </td>
                        <td class="subcategory_name">
                            <input type="text" class="form-control" value="` + subcategory_name + `" placeholder="Category name">
                        </td>
                        <td>
                            <i style="font-size:24px;color: blue;" class="mdi mdi-window-close cancel-edit-subcategory"></i>
                            <i style="font-size:24px;color: blue;" class="mdi mdi-check confirm-edit-subcategory"></i>
                        </td>`)
      })

      $(document).on('click', '.confirm-edit-subcategory', function() {
        var row = $(this).parent().parent()
        var subcategory_id = row.data("id")
        var category_id = row.find('.category_id input[type="text"]').val()
        var subcategory_name = row.find('.subcategory_name input[type="text"]').val()

        data = {
          subcategory_id: subcategory_id,
          category_id: category_id,
          subcategory_name: subcategory_name
        }
        $.ajax({
          url: "<?php echo base_url('Admin/updateSubcategory') ?>",
          type: "post",
          data: data,
          success: function(response) {
            if (!response) {
              alert('Failed to add row to database');
            } else {
              displaySubcategory(row)
            }
          }
        })

      })

      $(document).on('click', '.new_subcategory', function() {
        $("#subcategories_table_body").prepend(`
                    <tr>
                        <td>
                        TBD
                        </td>
                        <td class="category_id">
                            <input type="text" class="form-control" id="exampleInputUsername1"
                            placeholder="Category ID">
                        </td>
                        <td class="subcategory_name">
                            <input type="text" class="form-control" id="exampleInputUsername1"
                            placeholder="Subcategory name">
                        </td>
                        <td>
                            <i style="font-size:24px;color: blue;" class="mdi mdi-window-close cancel-new"></i>
                            <i style="font-size:24px;color: blue;" class="mdi mdi-check confirm-new-subcategory"></i>
                        </td>
                    </tr>`)
      })

      $(document).on('click', '.confirm-new-subcategory', function() {
        var row = $(this).parent().parent()
        var category_id = row.find('.category_id input[type="text"]').val()
        var subcategory_name = row.find('.subcategory_name input[type="text"]').val()
        data = {
          category_id: category_id,
          subcategory_name: subcategory_name
        }
        $.ajax({
          url: "<?php echo base_url('Admin/newSubcategory') ?>",
          type: "post",
          data: data,
          success: function(response) {
            if (!response) {
              alert('Failed to add row to database');
            } else {
              displaySubcategories()
            }
          }
        })

      })
    </script>
</body>

</html>