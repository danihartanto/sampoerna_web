@extends('./template.layouts')

@section('content')
  <!-- add new post modal start -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css">
  <div class="modal fade" id="add_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add New</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data" id="add_post_form" novalidate>
          <div class="modal-body p-5">
            <div class="mb-3">
              <label>Name</label>
              <input type="text" name="nama" class="form-control" placeholder="Title" required>
              <div class="invalid-feedback">name is required!</div>
            </div>

            <div class="mb-3">
              <label>Code</label>
              <input type="text" name="sub_nama" class="form-control" placeholder="Sub Category" required>
              <div class="invalid-feedback">code kategori is required!</div>
            </div>

            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="add_post_btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- add new post modal end -->

  <!-- edit post modal start -->
  <div class="modal fade" id="edit_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data" id="edit_post_form" novalidate>
          <input type="hidden" name="id" id="pid">
          <div class="modal-body p-5">
            <div class="mb-3">
              <label>Nama Kategori</label>
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Category" required>
              <div class="invalid-feedback">Category is required!</div>
            </div>

            <div class="mb-3">
              <label>Short Code <small>(contoh: DECO, WO, SOUN, CATR)</small></label>
              <input type="text" name="sub_nama" id="sub_nama" class="form-control" placeholder="Sub Category" required>
              <div class="invalid-feedback">Short code category is required!</div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="edit_post_btn">Update Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- edit post modal end -->

  <!-- detail post modal start -->
  <div class="modal fade" id="detail_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Details of Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="" id="detail_post_image" class="img-fluid">
          <h3 id="detail_post_title" class="mt-3"></h3>
          <h5 id="detail_post_category"></h5>
          <p id="detail_post_body"></p>
          <p id="detail_post_created" class="fst-italic"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- detail post modal end -->

  <div class="container">
    <div class="row my-4">
      <div class="col-lg-12">
        <div class="card shadow">
            <!-- <h2>List Data</h2> -->
            
          <div class="card-header d-flex justify-content-between align-items-center">
            <div class="text-secondary fw-bold fs-3">Data <?= $title_pages ?> show by <?= session()->get('username'); ?></div>
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add_post_modal">Add New</button>
          </div>
          <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                      <th>No.</th>
                        <th>ID.</th>
                        <th>Nama Kategori</th>
                        <th>Short Code</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody id="data-table">
                    
                </tbody>
            </table>
           
            <!-- <div class="row ">
            
              
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script> -->
  <!-- <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.min.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


  <script>
    $(function() {
      // add new post ajax request
      $("#add_post_form").submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        if (!this.checkValidity()) {
          e.preventDefault();
          $(this).addClass('was-validated');
        } else {
          $("#add_post_btn").text("Adding...");
          $.ajax({
            url: '<?= url('dashboard/kategori/add') ?>',
            method: 'post',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
              if (response.error) {
                Swal.fire(
                  'Gagal',
                  response.message,
                  'failed'
                );
              } else {
                $("#add_post_modal").modal('hide');
                $("#add_post_form")[0].reset();
                $("#add_post_form").removeClass('was-validated');
                Swal.fire(
                  'Added',
                  response.message,
                  'success'
                );
                fetchAllPosts();
              }
              $("#add_post_btn").text("Add Post");
            }
          });
        }
      });

      // edit post ajax request
      $(document).delegate('.post_edit_btn', 'click', function(e) {
        e.preventDefault();
        const id = $(this).attr('id');
        $.ajax({
          url: '<?= url('dashboard/kategori/edit/') ?>/' + id,
          method: 'get',
          success: function(response) {
            $("#pid").val(response.message.id);
            $("#nama").val(response.message.nama);
            $("#sub_nama").val(response.message.sub_nama);
          }
        });
      });

      // update post ajax request
      $("#edit_post_form").submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        if (!this.checkValidity()) {
          e.preventDefault();
          $(this).addClass('was-validated');
        } else {
          $("#edit_post_btn").text("Updating...");
          $.ajax({
            url: '<?= url('dashboard/kategori/update') ?>',
            method: 'post',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
              $("#edit_post_modal").modal('hide');
              $("#edit_post_form")[0].reset();
              $("#edit_post_form").removeClass('was-validated');
              Swal.fire(
                'Updated',
                response.message,
                'success'
              );
              fetchAllPosts();
              $("#edit_post_btn").text("Update Post");
            }
          });
        }
      });

      // delete post ajax request
      $(document).delegate('.post_delete_btn', 'click', function(e) {
        e.preventDefault();
        const id = $(this).attr('id');
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '<?= url('dashboard/kategori/delete/') ?>/' + id,
              method: 'get',
              success: function(response) {
                Swal.fire(
                  'Deleted!',
                  response.message,
                  'success'
                )
                fetchAllPosts();
              }
            });
          }
        })
      });
      // post detail ajax request
      $(document).delegate('.post_detail_btn', 'click', function(e) {
        e.preventDefault();
        const id = $(this).attr('id');
        $.ajax({
          url: '<?= url('post/detail/') ?>/' + id,
          method: 'get',
          dataType: 'json',
          success: function(response) {
            $("#detail_post_image").attr('src', '<?= url('uploads/avatar/') ?>/' + response.message.image);
            $("#detail_post_title").text(response.message.title);
            $("#detail_post_category").text(response.message.category);
            $("#detail_post_body").text(response.message.body);
            $("#detail_post_created").text(response.message.created_at);
          }
        });
      });

      // fetch all posts ajax request
      fetchAllPosts();
      

      function fetchAllPosts() {
        
        $('#dataTable').DataTable({
            processing: true,
            serverSide: false, 
            "bDestroy": true,
            ordering: true,
            order: [[0,'asc']],
            paging: true,
            ajax: "<?= url('warehouse/fetch') ?>",
            columns: [
              {  
                    "data": null,
                    "class": "align-top",
                    "orderable": false,
                    "searchable": false,
                    "render": function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },
                { data: "id" },
                { data: "nama" },
                { data: "sub_nama" },
                { 
                 mData: '',
                 render: (data,type,row) => {
                  // return '<a href="#" id="${row.id}" data-bs-toggle="modal" data-bs-target="#edit_post_modal" class="btn btn-success btn-sm post_edit_btn">Edit</a> <a href="#" id="${row.id}" class="btn btn-danger btn-sm post_delete_btn">Delete</a>'
                   return `<a href="#" id="${row.id}" data-bs-toggle="modal" data-bs-target="#edit_post_modal" class="btn btn-success btn-sm post_edit_btn">Edit</a> <a href="#" id="${row.id}" class="btn btn-danger btn-sm post_delete_btn">Delete</a>`;
                 }
              }
                
            ],
            
            lengthMenu: [[5, 10, 20, 50], [5, 10, 20, 50]],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ /pages",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            }
            
        });
      }
    });
  </script>

@endsection