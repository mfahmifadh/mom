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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    {{-- <th>Kode</th> --}}
                    <th>Kode Boking</th>
                    <th>Nama Murid</th>
                    <th>Kelas</th>
                    <th>Jumlah Pertemuan</th>
                    <th>Tgl. Pembayaran</th>
                    <th>Total Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Status Transaksi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($income as $data)
                    <tr>
                      {{-- <td>{{ $data->id }}</td> --}}
                      <td>{{ $data->booking_id }}</td>
                      <td>{{ $data->student_name }}</td>
                      <td>{{ $data->class_name }}</td>
                      <td>{{ $data->class_permonth}} /Bulan</td>
                      <td>{{ $data->transaction_date }}</td>
                      <td>Rp {{ $data->total_payment }}</td>
                      <td><b>{{ $data->payment_status }}</b></td>
                      <td><b>{{ $data->transaction_status }}</b></td>
                      <td>
                          <?php
                            if ($data->transaction_status == "Approve"){

                            }elseif($data->transaction_status == "Pending"){
                          ?>
                              <a href="{{ url('admin/checkReceipt', ['id' => $data->id ]) }}" class="fas fa-check"></a>
                             
                          <?php } ?>
                          
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    {{-- <th>Kode</th> --}}
                    <th>Kode Boking</th>
                    <th>Nama Murid</th>
                    <th>Kelas</th>
                    <th>Jumlah Pertemuan</th>
                    <th>Tgl. Pembayaran</th>
                    <th>Total Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Status Transaksi</th>
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