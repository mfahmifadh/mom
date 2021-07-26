<x-app-layout>


    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
          <h2>Boking Kelas</h2>
        </div>
    </div><!-- End Breadcrumbs -->


    <div class="container rounded bg-white card" style="margin-top:5vh;margin-bottom:5vh;">
        <div class="row d-flex justify-content-center pb-5">
            <div class="col-sm-5 col-md-5 ml-1">
                <div class="py-4 d-flex flex-row">
                    <h5><span class="fa fa-check-square-o"></span><b>MOM</b> | </h5><span class="pl-2">Checkout</span>
                </div>
                @foreach ($materis as $item)
                <h5>{{ $item->class_name }}</h5>
                <hr>
                <h6><b>Deskripsi Kelas</b></h6>
                <p>{{$item->class_description}}</p>
                <div class="pt-2">
                    <h6><b>Mentor</b></h6>
                    <p> {{$item->mentor}} </p>
                    <div class="row">
                        <div class="col">
                            <h6><b>Jenjang</b></h6>
                            <p>{{$item->name}}</p>
                        </div>
                        <div class="col">
                            <h6><b>Category</b></h6>
                            <p>{{$item->course_category}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6><b>Pertemuan/jam</b></h6>
                            <p>{{$item->class_time_perday}}</p>
                        </div>
                        <div class="col">
                            <h6><b>Pertemuan/bulan</b></h6>
                            <p>{{$item->class_permonth}}</p>
                        </div>
                    </div>
                    <h6><b>Maximal Murid</b></h6>
                    <p>{{$item->class_member_max}}</p>
                    <h6><b>Harga</b></h6>
                    <p>{{$item->class_cost}}</p>

                </div>
            </div>
            <div class="col-sm-3 col-md-4 offset-md-1 mobile">
                <div class="py-4 d-flex justify-content-end">
                    <h6><a href="{{url('dashboard')}}">Cancel and return to Home</a></h6>
                </div>
                <div class="bg-light rounded d-flex flex-column">
                    <div class="p-2 ml-3">
                        <h4>Detail Booking</h4>
                    </div>
                    <form action="{{ url('murid/postBooking') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="class_id" value="{{ $item->class_id }}">
                        <input type="hidden" class="form-control" name="class_progress" value="Belum Ada Pertemuan">
                        <input type="hidden" class="form-control" name="class_status" value="Progress">
                        <input type="hidden" class="form-control" name="mentor_id" value="{{ $item->mentor_id }}">
                        <div class="border-top px-4 mx-3"></div>
                        <div class="p-1 d-flex">
                            <div class="col">
                                <label style="font-weight:bold;">Nama Kelas : </label>
                                <p>{{ $item->class_name }}</p>
                            </div>
                        </div>
                        <div class="p-1 d-flex">
                            <div class="col">
                                <label style="font-weight:bold;">Jumlah Pertemuan : </label>
                                <p>{{ $item->class_time_perday }} /Hari - {{ $item->class_permonth }} /Bulan</p>
                            </div>
                        </div>
                        <div class="p-1 d-flex">
                            <div class="col">
                                <input type="hidden" class="form-control" name="total_payment" value="{{ $item->class_cost }}">
                                <label style="font-weight:bold;">Total Biaya : </label>
                                <p>{{ $item->class_cost }}</p>
                            </div>
                        </div>
                        <div class="p-1 d-flex">
                            <div class="col">
                                <input type="hidden" class="form-control" name="total_payment" value="{{ $item->class_cost }}">
                                <label style="font-weight:bold;">Metode Pembayaran : </label>
                                {{-- <div class="d-flex flex-row align-content-center">
                                    <div class="rounded border d-flex w-100 px-2">
                                        <div class="pt-2">
                                            <p><i class="fas fa-credit-card"></i>Mandiri</p>
                                        </div>
                                        <div class="ml-auto pt-2">1920100192913</div>
                                    </div>
                                </div> --}}
                                <br>
                                <label>DANA</label>
                                <img src="{{url('assets/img/barcode.png')}}" width="300" height="300" alt="">
                            </div>
                        </div>
                        <div class="p-1 d-flex">
                            <div class="col">
                                <label style="font-weight:bold;">Bukti Pembayaran : </label>
                                <input type="file" class="form-control" name="receipt" required>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="payment_status" value="PAID">
                        <input type="hidden" class="form-control" name="transaction_status" value="PENDING">
                        <div class="p-1 d-flex">
                            <div class="col">
                                <p><button class="btn btn-primary" type="submit">BOOKING</button></p>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>