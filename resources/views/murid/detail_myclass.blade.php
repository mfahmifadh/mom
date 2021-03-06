<x-app-layout>
    <main id="main">
        {{-- {{dd($materi)}} --}}
          <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
              <h2>Course Details</h2>
            </div>
          </div><!-- End Breadcrumbs -->
      
          <!-- ======= Cource Details Section ======= -->
          <section id="course-details" class="course-details">
            @foreach ($materi as $item)
            <div class="container" data-aos="fade-up">
              <div class="row">
                <div class="col-lg-8">
                  <img src="{{ url('assets/img/'.$item->class_photo) }}" class="img-fluid" alt="">
                  <h3>{{$item->class_name}}</h3>
                  <p>
                    {{$item->class_description}}
                  </p>
                </div>
                <div class="col-lg-4">
                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Mentor</h5>
                    <p><a href="{{ url('murid/mentordetail/'. $item->user_id) }}">{{$item->mentor}}</a></p>
                  </div>
    
                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Jenjang</h5>
                    <p>{{$item->name}}</p>
                  </div>
                 
                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Kategori</h5>
                    <p>{{$item->course_category}}</p>
                  </div>

                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Progress</h5>
                    <p>{{$item->class_progress}}</p>
                  </div>
      
                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Total Pertemuan</h5>
                    <p>{{$item->class_permonth}}</p>
                  </div>

                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Kontak</h5>
                    <p><a href="{{$item->phone_number}}">Link WhatsApp</a></p>
                  </div>
                  @endforeach
                </div>
              </div>
      
            </div>
          </section><!-- End Cource Details Section -->
      
    </main><!-- End #main -->

</x-app-layout>