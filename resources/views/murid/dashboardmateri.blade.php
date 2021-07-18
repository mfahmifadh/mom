<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mentor Onlinemu</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Mentor - v2.2.1
    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    </head>

    <body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="index.html">Mentor</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
            <li class="active">
                <x-jet-nav-link href="{{ route('dashboard') }}">
                    Home
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('dashboard') }}">
                    About
                </x-jet-nav-link>
            </li>
            <li>
                @can('manage-users')
                <x-jet-nav-link href="{{ route('admin.dashboard.index') }}" :active="request()->routeIs('admin.index')">
                    Dashboard
                </x-jet-nav-link>
                @endif

                @if (auth()->user()->role_id == 2)
                    <x-jet-nav-link href="{{ route('murid.dashboard.index') }}" :active="request()->routeIs('murid.index')">
                    Dashboard
                    </x-jet-nav-link>
                @endif

                @if (auth()->user()->role_id == 3)
                    <x-jet-nav-link href="{{ url('mentor/mentor_page/'. Auth::user()->id) }}" :active="request()->routeIs('mentor.index')">
                    Dashboard
                    </x-jet-nav-link>
                @endif
            </li>
            <li>
                <x-jet-nav-link href="{{ route('dashboard') }}">
                    Contact
                </x-jet-nav-link>
            </li>
            <li>
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                    @endif

                    <div class="border-t border-gray-100"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </x-slot>
            </x-jet-dropdown>
            </li>
            </ul>
            
        </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->
    

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
                   <a href="" class="btn btn-primary">Booking</a>
                  </div>
                  @endforeach
                </div>
              </div>
      
            </div>
          </section><!-- End Cource Details Section -->
      
          {{-- <!-- ======= Cource Details Tabs Section ======= -->
          <section id="cource-details-tabs" class="cource-details-tabs">
            <div class="container" data-aos="fade-up">
      
              <div class="row">
                <div class="col-lg-3">
                  <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                      <a class="nav-link active show" data-toggle="tab" href="#tab-1">Modi sit est</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-2">Unde praesentium sed</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                  <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <h3>Architecto ut aperiam autem id</h3>
                          <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                          <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                          <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <h3>Et blanditiis nemo veritatis excepturi</h3>
                          <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                          <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                          <img src="assets/img/course-details-tab-2.png" alt="" class="img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                          <p class="font-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                          <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                          <img src="assets/img/course-details-tab-3.png" alt="" class="img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab-4">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                          <p class="font-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                          <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                          <img src="assets/img/course-details-tab-4.png" alt="" class="img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab-5">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                          <p class="font-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                          <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                          <img src="assets/img/course-details-tab-5.png" alt="" class="img-fluid">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
            </div>
          </section><!-- End Cource Details Tabs Section --> --}}
    
        <!-- ======= About Section ======= -->
        {{-- <section id="about" class="about">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>Tentang</h2>
              <p>Tentang Kami</p>
            </div>
    
            <div class="row">
              <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                <img src="assets/img/about.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h3>Mentor Online Mu adalah sebuah website untuk mencari mentor atau kursus sesuai keinginanMu.</h3>
                <p class="font-italic">
                  Kenapa harus daftar di website MoM?
                </p>
                <ul>
                  <li><i class="icofont-check-circled"></i> Mentor yang terpercaya dan berpengalaman.</li>
                  <li><i class="icofont-check-circled"></i> Kemudahan dalam mencari mentor atau materi yang kamu inginkan.</li>
                  <li><i class="icofont-check-circled"></i> Harga yang murah dan terjangkau untuk semua kalangan.</li>
                </ul>
                <p>
                  Ayo segera daftar menjadi member dan rasakan sensasi belajar dengan mentor dan materi yang kamu suka!
                </p>
                <a href="about.html" class="learn-more-btn">Lebih lanjut</a>
              </div>
            </div>
    
          </div>
        </section><!-- End About Section --> --}}
    
        <!-- ======= Counts Section ======= -->
        {{-- <section id="counts" class="counts section-bg">
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
        </section><!-- End Counts Section --> --}}
    
        <!-- ======= Why Us Section ======= -->
        <!-- <section id="why-us" class="why-us">
          <div class="container" data-aos="fade-up">
    
            <div class="row">
              <div class="col-lg-4 d-flex align-items-stretch">
                <div class="content">
                  <h3>Why Choose Mentor?</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                    Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
                  </p>
                  <div class="text-center">
                    <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-boxes d-flex flex-column justify-content-center">
                  <div class="row">
                    <div class="col-xl-4 d-flex align-items-stretch">
                      <div class="icon-box mt-4 mt-xl-0">
                        <i class="bx bx-receipt"></i>
                        <h4>Corporis voluptates sit</h4>
                        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                      </div>
                    </div>
                    <div class="col-xl-4 d-flex align-items-stretch">
                      <div class="icon-box mt-4 mt-xl-0">
                        <i class="bx bx-cube-alt"></i>
                        <h4>Ullamco laboris ladore pan</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                      </div>
                    </div>
                    <div class="col-xl-4 d-flex align-items-stretch">
                      <div class="icon-box mt-4 mt-xl-0">
                        <i class="bx bx-images"></i>
                        <h4>Labore consequatur</h4>
                        <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                      </div>
                    </div>
                  </div>
                </div> End .content-->
        <!-- </div>
            </div>
    
          </div>
        </section>End Why Us Section --> -->
    
        <!-- ======= Features Section ======= -->
        <!-- <section id="features" class="features">
          <div class="container" data-aos="fade-up">
    
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
              <div class="col-lg-3 col-md-4">
                <div class="icon-box">
                  <i class="ri-store-line" style="color: #ffbb2c;"></i>
                  <h3><a href="">Lorem Ipsum</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                <div class="icon-box">
                  <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                  <h3><a href="">Dolor Sitema</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                <div class="icon-box">
                  <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                  <h3><a href="">Sed perspiciatis</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                <div class="icon-box">
                  <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                  <h3><a href="">Magni Dolores</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4">
                <div class="icon-box">
                  <i class="ri-database-2-line" style="color: #47aeff;"></i>
                  <h3><a href="">Nemo Enim</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4">
                <div class="icon-box">
                  <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                  <h3><a href="">Eiusmod Tempor</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4">
                <div class="icon-box">
                  <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                  <h3><a href="">Midela Teren</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4">
                <div class="icon-box">
                  <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                  <h3><a href="">Pira Neve</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4">
                <div class="icon-box">
                  <i class="ri-anchor-line" style="color: #b2904f;"></i>
                  <h3><a href="">Dirada Pack</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4">
                <div class="icon-box">
                  <i class="ri-disc-line" style="color: #b20969;"></i>
                  <h3><a href="">Moton Ideal</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4">
                <div class="icon-box">
                  <i class="ri-base-station-line" style="color: #ff5828;"></i>
                  <h3><a href="">Verdo Park</a></h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 mt-4">
                <div class="icon-box">
                  <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
                  <h3><a href="">Flavor Nivelanda</a></h3>
                </div>
              </div>
            </div>
    
          </div>
        </section>End Features Section -->
    
        <!-- ======= Popular Courses Section ======= -->
        {{-- <section id="popular-courses" class="courses">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>Materi</h2>
              <p>Materi Terbaru</p>
            </div>
    
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
              @foreach($materis->take(3) as $materi)
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="course-item">
                  <img src="{{ url('assets/img/'.$materi->photo) }}" class="img-fluid" alt="...">
                  <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4>{{$materi->kategori}}</h4>
                      <p class="price">Rp.{{$materi->harga}}</p>
                    </div>
    
                    <h3><a href="course-details.html">{{$materi->judul}}</a></h3>
                    <p>{{$materi->deskripsi}}</p> --}}
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
                  {{-- </div>
                </div>
              </div> <!-- End Course Item--> --}}
              {{-- @endforeach --}}
    
              {{-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                <div class="course-item">
                  <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
                  <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4>Marketing</h4>
                      <p class="price">Rp.200.000</p>
                    </div>
    
                    <h3><a href="course-details.html">Search Engine Optimization</a></h3>
                    <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                    <div class="trainer d-flex justify-content-between align-items-center">
                      <div class="trainer-profile d-flex align-items-center">
                        <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                        <span>Lana</span>
                      </div>
                      <div class="trainer-rank d-flex align-items-center">
                        <i class="bx bx-user"></i>&nbsp;35
                        &nbsp;&nbsp;
                        <i class="bx bx-heart"></i>&nbsp;42
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- End Course Item-->
    
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                <div class="course-item">
                  <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
                  <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4>Content</h4>
                      <p class="price">Rp.180.000</p>
                    </div>
    
                    <h3><a href="course-details.html">Copywriting</a></h3>
                    <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                    <div class="trainer d-flex justify-content-between align-items-center">
                      <div class="trainer-profile d-flex align-items-center">
                        <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                        <span>Brandon</span>
                      </div>
                      <div class="trainer-rank d-flex align-items-center">
                        <i class="bx bx-user"></i>&nbsp;20
                        &nbsp;&nbsp;
                        <i class="bx bx-heart"></i>&nbsp;85
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- End Course Item--> --}}
    
            {{-- </div>
    
          </div>
        </section><!-- End Popular Courses Section --> --}}
    
        <!-- ======= Trainers Section ======= -->
        {{-- <section id="trainers" class="trainers">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>Mentor</h2>
              <p>Mentor Berpengalaman</p>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
              @foreach($mentors->take(3) as $mentor)
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <img src="{{ url('assets/img/trainers/'.$mentor->profile_photo_path) }}" class="img-fluid" alt="">
                  <div class="member-content">
                    <h4>{{$mentor->name}}</h4> --}}
                    {{-- <span>Web Development</span> --}}
                    {{-- <p>
                      Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
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
              @endforeach --}}
    
    
              <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                  <div class="member-content">
                    <h4>Sarah Jhinson</h4>
                    <span>Marketing</span>
                    <p>
                      Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
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
    
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                  <div class="member-content">
                    <h4>William Anderson</h4>
                    <span>Content</span>
                    <p>
                      Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                    </p>
                    <div class="social">
                      <a href=""><i class="icofont-twitter"></i></a>
                      <a href=""><i class="icofont-facebook"></i></a>
                      <a href=""><i class="icofont-instagram"></i></a>
                      <a href=""><i class="icofont-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div> -->
    
            {{-- </div>
    
          </div>
        </section><!-- End Trainers Section --> --}}

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
        <div class="container">
            <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
                <h3>Mentor</h3>
                <p>
                A108 Adam Street <br>
                New York, NY 535022<br>
                United States <br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
                </p>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-newsletter">
                <h4>Join Our Newsletter</h4>
                <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
                </form>
            </div>

            </div>
        </div>
        </div>

        <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
            &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.j') }}s"></script>
    <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>

    </html>
</x-app-layout>