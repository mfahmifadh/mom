<x-mentor-layout>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Buat Kelas Baru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('mentor/postCourse') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kategori Kelas :</label>
                        <select name="class_category_id" class="form-control">
                        <option value="#">-- Pilih Tingkatan --</option>
                          @foreach($class_category as $data)
                            <option value="{{ $data->id }}">{{ $data->id }} - {{ $data->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kategori Materi :</label>
                        <input type="text" name="course_category" class="form-control" placeholder="Contoh : MTK, IPA, IPS, B.ING, B.IND">
                      </div>
                    </div>
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label for="exampleInputPassword1">Nama Kelas :</label>
                        <input type="text " name="class_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kategori Kelas :</label>
                        <select name="class_status" class="form-control">
                          <option ">-- Pilih Kategori Kelas --</option>
                          <option value="Public">Public</option>
                          <option value="Private">Private</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">  
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Max. Murid :</label>
                        <input type="number" name="class_member_max" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">  
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Jam/Perhari :</label>
                        <input type="text" name="class_time_perday" class="form-control" placeholder="Contoh : 8 Jam">
                      </div>
                    </div>
                    <div class="col-md-3">  
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Pertemuan/Perbulan :</label>
                        <input type="text" name="class_permonth" class="form-control" placeholder="Contoh : 8 Pertemuan">
                      </div>
                    </div>
                    <div class="col-md-3">  
                      <div class="form-group">
                        <label for="exampleInputPassword1">Biaya :</label>
                        <input type="text" name="class_cost" class="form-control" placeholder="Contoh : 500.000">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="class_photo" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">  
                      <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi Kelas :</label>
                        <input type="text" name="class_description" class="form-control" style="height  :20vh;">
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</x-mentor-layout>