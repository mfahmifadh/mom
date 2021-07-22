<x-mentor-layout>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Booking</li>
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
                <h3 class="card-title">Daftar Kelas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Murid</th>
                    <th>No. Hp</th>
                    <th>Nama Kelas</th>
                    <th>Progress</th>
                    <th>Status Kelas</th>
                    <th>Biaya</th>
                    <th>Jadwal</th>
                    <th>Status Pembayaran</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($booking as $data)
                    <tr>
                      <td>{{ $data->id }}</td>
                      <td>{{ $data->murid }}</td>
                      <td>{{ $data->phone_number }}</td>
                      <td>{{ $data->class_name }}</td>
                      <td>{{ $data->class_progress }}</td>
                      <td>{{ $data->class_status }}</td>
                      <td>Rp {{ $data->class_cost }}</td>
                      <td>{{ $data->class_time_perday }} /Hari - {{ $data->class_permonth }} /Bulan</td>
                      <td><b>{{ $data->payment_status }}</b></td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Murid</th>
                    <th>No. Hp</th>
                    <th>Nama Kelas</th>
                    <th>Progress</th>
                    <th>Status Kelas</th>
                    <th>Biaya</th>
                    <th>Jadwal</th>
                    <th>Status Pembayaran</th>
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