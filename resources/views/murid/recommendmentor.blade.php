<x-app-layout>

   <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        <div class="col-md-4" style="margin-left:-5vh;">
            <img src="{{ url('assets/img/momLogo.png')}}" class="img-fluid" style="width:50%;" alt="momLogo"/>
        </div>
        <h1>Cari Mentor,<br>Sesuai Kebutuhan Mu</h1>
        <h2 style="line-height:3vh;">Belajar hal-hal yang kamu suka mulai dari<br> pelajaran umum, menari, musik, hingga membuat kopi.</h2>
        
        </div>
    </section><!-- End Hero -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1232</span>
            <p>Murid</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">60</span>
            <p>Materi</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">10</span>
            <p>Seminar</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">30</span>
            <p>Mentor</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <div class="container" style="margin-top:5vh;">
        <div class="section-title">
          <h2>Mentor Terbaik</h2>
          <p>Rekomendasi Mentor</p>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <form method="post" action="{{ url('murid/add_priority')}}">
                @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Materi Prioritas Pertama</h6>
                                </label>
                                <br>
                                <select name='p1' class="form-control" required>
                                    <option value="">--- Pilih Prioritas Pertama ---</option>
                                    @foreach($category as $data)
                                    <option value='{{$data->course_category}}'>{{$data->course_category}}</option>
                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Materi Prioritas Kedua</h6>
                                </label>
                                <br>
                                <select name='p2' class="form-control" required>
                                    <option value="">--- Pilih Prioritas Kedua ---</option>
                                    @foreach($category as $data)
                                    <option value='{{$data->course_category}}'>{{$data->course_category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Materi Prioritas Ketiga </h6>
                                </label>
                                <br>
                                <select name='p3' class="form-control" required>
                                    <option value="">--- Pilih Prioritas Ketiga ---</option>
                                    @foreach($category as $data)
                                    <option value='{{$data->course_category}}'>{{$data->course_category}}</option>
                                    @endforeach
                                    </select>
                            </div>
                            <br>
                            <div class="form-group text-center">
                                <input type="submit" name="btnSubmit" class="btn btn-primary col-md-12" value="Cari" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Mentor</h2>
          <p>Mentor Pilihan</p>
        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
        @foreach($mentor->take(3) as $data)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="{{ url('assets/img/trainers/'.$data->profile_photo_path) }}" class="img-fluid" alt="">
              <div class="member-content">
                <h4>{{$data->name}}</h4>
                {{-- <span>Web Development</span> --}}
                <p>
                  <b>Nilai : {{ ($data->result * 100) + 30 }}</b>
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">

        </div>

      </div>
    </section><!-- End Trainers Section -->

</x-app-layout>