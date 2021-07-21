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
                    <p><a href="#">{{$item->mentor}}</a></p>
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
                    <h5>Harga</h5>
                    <p>{{$item->class_cost}}</p>
                  </div>
      
                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Maximal Member</h5>
                    <p>{{$item->class_member_max}}</p>
                  </div>
      
                  <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Jadwal</h5>
                    <p>{{$item->class_permonth}}</p>
                  </div>
                  <div class="d-flex justify-content-between align-items-center text-center">
                   <a href="{{url('murid/checkout')}}/{{$item->id}}" class="btn btn-primary">Booking</a>
                  </div>
                  @endforeach
                </div>
              </div>
      
            </div>
          </section><!-- End Cource Details Section -->
      
    </main><!-- End #main -->

</x-app-layout>