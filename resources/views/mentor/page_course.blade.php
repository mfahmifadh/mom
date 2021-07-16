<x-mentor-layout>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Tingkat</th>
                    <th>Kategori Materi</th>
                    <th>Kelas</th>
                    <th>Kategori Kelas</th>
                    <th>Max. Murid</th>
                    <th>Jadwal</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($course as $data)
                    <tr>
                      <td>{{ $data->id }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->course_category }}</td>
                      <td>{{ $data->class_name }}</td>
                      <td>{{ $data->class_status }}</td>
                      <td>{{ $data->class_member_max }} Orang</td>
                      <td>{{ $data->class_time_perday }} /Hari - {{ $data->class_permonth }} /Bulan</td>
                      <td>{{ $data->class_cost }}</td>
                      <td>
                        
                        <form action="{{ url('mentor/deleteCourse', ['id' => $data->id ]) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('delete') }}
                          <a type="button" class="fas fa-info-circle" data-toggle="modal" data-target="#modal-lg"></a>
                          <a href="{{ url('mentor/editCourse', ['id' => $data->id ]) }}" class="fas fa-edit"></a>
                          <button onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash-alt"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kode</th>
                    <th>Tingkat</th>
                    <th>Kategori Materi</th>
                    <th>Kelas</th>
                    <th>Kategori Kelas</th>
                    <th>Max. Murid</th>
                    <th>Jadwal</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
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

    <div class="modal fade" id="modal-lg">
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
      <!-- /.modal -->
</x-mentor-layout>