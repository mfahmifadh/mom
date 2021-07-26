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

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kelas</h2>
          <p>Kelasku</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach($class as $data)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item" style="margin-bottom:5vh;">
              <img src="{{ url('assets/img/'.$data->class_photo) }}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>{{$data->course_category}}</h4>
                  <p class="price">Rp.{{$data->class_cost}}</p>
                </div>

                <h6>{{ $data->start_date }}</h6>
                <h3>

                @if ($data->transaction_status == 'Approve')
                    <x-jet-nav-link href="{{ url ('murid/detail_myclass/'. $data->id) }}">
                    <h3> {{$data->class_name}} </h3>
                    </x-jet-nav-link>
                @endif

                @if ($data->transaction_status == 'Pending')
                    <x-jet-nav-link>
                    <h3> {{$data->class_name}} </h3>
                    </x-jet-nav-link>
                @endif  
              </h3>
                <b>Total {{ $data->class_permonth }}</b>
                <p>{{$data->class_description}}</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>{{$data->mentor}}</span>
                  </div>
                </div>
                <br>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <span>
                      <?php
                        if( $data->transaction_status == 'Approve'){
                          echo "<h6 style='color:green;font-weight:bold;'>TELAH DI BAYAR</h6>";
                        }else if( $data->transaction_status == 'Pending'){
                          echo "<h6 style='color:orange;font-weight:bold;'>DIPROSES</h6>";
                        }
                      ?>
                      </span>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
          @endforeach

        </div>

      </div>
    </section><!-- End Popular Courses Section -->

</x-app-layout>