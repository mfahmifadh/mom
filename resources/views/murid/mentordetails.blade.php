<x-app-layout>
    <main id="main">
        {{-- {{dd($materi)}} --}}
          <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
              <h2>Mentor Details</h2>
            </div>
          </div><!-- End Breadcrumbs -->
      
          <!-- ======= Cource Details Section ======= -->
          <section id="course-details" class="course-details">
            @foreach ($mentors->take(1) as $item)
            <div class="container" data-aos="fade-up">
              <div class="row">
                <div class="col-lg-8">
                  <img src="{{ url('assets/img/trainers/'.$item->profile_photo_path) }}" class="img-fluid" alt="">
                  
                </div>
                <div class="col-lg-4">
                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Mentor</h5>
                    <p><a href="#">{{$item->name}}</a></p>
                  </div>
    
                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Email</h5>
                    <p>{{$item->email}}</p>
                  </div>
                 
                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>No. Telephone </h5>
                    <p>{{$item->phone_number}}</p>
                  </div>
      
                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Skill</h5>
                    <p>{{$item->skill}}</p>
                  </div>
                  @endforeach
                </div>
               
              <div>
                      <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h3>Daftar Materi</h3>
          </div>
  
          <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach($mentors as $materi)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="course-item">
                <img src="{{ url('assets/img/'.$materi->class_photo) }}" class="img-fluid" alt="...">
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>{{$materi->course_category}}</h4>
                    <p class="price">Rp.{{$materi->class_cost}}</p>
                  </div>
  
                  <h3><a href="{{url('murid/dashboardmateri/'.$materi->id)}}">{{$materi->class_name}}</a></h3>
                  <p>{{$materi->class_description}}</p>
                  {{-- <div class="trainer d-flex justify-content-between align-items-center">
                    <div class="trainer-profile d-flex align-items-center">
                      <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                      <span>Antonio</span>
                    </div>
                    <div class="trainer-rank d-flex align-items-center">
                      <i class="bx bx-user"></i>&nbsp;50
                      &nbsp;&nbsp;
                      <i class="bx bx-heart"></i>&nbsp;65
                    </div>
                  </div> --}}
                </div>
              </div>
            </div> <!-- End Course Item-->
            @endforeach
          </div>
  
        </div>
      </section><!-- End Popular Courses Section -->
                {{-- <h3>Daftar Kelas</h3>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach($mentors as $kelas)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                      <div class="course-item">
                        <img src="{{ url('assets/img/'.$kelas->class_photo) }}" class="img-fluid" alt="...">
                        <div class="course-content">
                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>{{$kelas->course_category}}</h4>
                            <p class="price">Rp.{{$kelas->class_cost}}</p>
                          </div>
                          <h3><a href="murid/dashboardmateri/{{$kelas->id}}">{{$kelas->class_name}}</a></h3>
                          <p>{{$kelas->class_description}}</p>
                        </div>
                      </div>
                    </div> <!-- End Course Item-->
                    @endforeach
              </div> --}}
              {{-- </div> --}}
      
            </div>
          </section><!-- End Cource Details Section -->
      
    </main><!-- End #main -->

</x-app-layout>