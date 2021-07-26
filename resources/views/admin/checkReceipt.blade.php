<x-admin-layout>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <a href="{{ url('mentor/addCourses') }}" class="btn btn-app">
              <i class="fas fa-plus-square"></i> Kelas Baru
            </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                @foreach($data as $data)
                <div class="col-md-3 ">
                <img src="{{ url('img/receipt/'.$data->receipt) }}">
                </div>
                <div class="col">
                  <h6><b>Nama</b></h6>
                  <p>{{$data->student_name}}</p>
                  <h6><b>Kelas</b></h6>
                  <p>{{$data->class_name}}</p>
                  <h6><b>Total Bayar</b></h6>
                  <p>{{$data->total_payment}}</p>
                  <a href="{{ url('admin/editTransaction', ['id' => $data->id ]) }}" class="btn btn-primary">Approve</a>
                </div>
                @endforeach
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  {{-- <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Large Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>One fine body&hellip;</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal --> --}}
</x-admin-layout>