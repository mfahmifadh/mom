
<style>
    body {
    background-color: #eeeeee
}

.green {
    color: rgb(15, 207, 143);
    font-weight: 680
}

@media(max-width:567px) {
    .mobile {
        padding-top: 40px
    }
}
</style>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div class="container rounded bg-white">
    <div class="row d-flex justify-content-center pb-5">
        <div class="col-sm-5 col-md-5 ml-1">
            <div class="py-4 d-flex flex-row">
                <h5><span class="fa fa-check-square-o"></span><b>MOM</b> | </h5><span class="pl-2">Checkout</span>
            </div>
            <hr>
            @foreach ($materis as $item)
            <h6>Detail Materi</h6>
            {{-- <div class="d-flex pt-2">
                <div>
                    <p><b>Insurance Responsibility.</b><span class="green">$71.76</span></p>
                </div>
                <div class="ml-auto">
                    <p class="text-primary"><i class="fa fa-plus-circle text-primary"></i>Add insurance card</p>
                </div>
            </div> --}}
            <p>{{$item->class_description}}</p>
            {{-- <div class="rounded bg-light d-flex">
                <div class="p-2">Aetna-Open Access</div>
                <div class="ml-auto p-2">OAP</div>
            </div>
            <hr> --}}
            <div class="pt-2">
                <div class="d-flex">
                    {{-- <div>
                        <p><b>Patient Balance.</b><span class="green">$13.24</span></p>
                    </div>
                    <div class="ml-auto p-2">
                        <p class="text-primary"><i class="fa fa-plus-circle text-primary"></i>Add payment card</p>
                    </div> --}}
                </div>
                <h6>Mentor</h6>
                <p> {{$item->mentor}} </p>
                <div class="row">
                    <div class="col">
                        <h6>Jenjang</h6>
                        <p>{{$item->name}}</p>
                    </div>
                    <div class="col">
                        <h6>Category</h6>
                        <p>{{$item->course_category}}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                        <h6>Pertemuan/jam</h6>
                        <p>{{$item->class_time_perday}}</p>
                    </div>
                    <div class="col">
                        <h6>Pertemuan/bulan</h6>
                        <p>{{$item->class_permonth}}</p>
                    </div>
                  </div>
                  <h6>Maximal Murid</h6>
                  <p>{{$item->class_member_max}}</p>
                  <h6>Harga</h6>
                  <p>{{$item->class_cost}}</p>
                {{-- <form class="pb-3">
                    <div class="d-flex flex-row align-content-center">
                        <div class="pt-2 pr-2"><input type="radio" name="radio1" id="r1" checked></div>
                        <div class="rounded border d-flex w-100 px-2">
                            <div class="pt-2">
                                <p><i class="fa fa-cc-visa text-primary pr-2"></i>Visa Debit Card</p>
                            </div>
                            <div class="ml-auto pt-2">************3456</div>
                        </div>
                    </div>
                </form>
                <form class="pb-3">
                    <div class="d-flex flex-row w-100">
                        <div class="pt-2 pr-2"><input type="radio" name="radio2" id="r2"></div>
                        <div class="rounded d-flex w-100 px-2">
                            <div class="pt-2">
                                <p><i class="fa fa-cc-mastercard pr-2"></i>Mastercard Office</p>
                            </div>
                            <div class="ml-auto pt-2">************1038</div>
                        </div>
                    </div>
                </form> --}}
                {{-- <div> <input type="button" value="Proceed to payment" class="btn btn-primary btn-block"> </div> --}}
            </div>
            @endforeach
        </div>
        <div class="col-sm-3 col-md-4 offset-md-1 mobile">
            <div class="py-4 d-flex justify-content-end">
                <h6><a href="{{url('dashboard')}}">Cancel and return to Home</a></h6>
            </div>
            <div class="bg-light rounded d-flex flex-column">
                <div class="p-2 ml-3">
                    <h4>Detail Booking</h4>
                </div>
                <form action="">
                    <div class="border-top px-4 mx-3"></div>
                <div class="p-2 d-flex">
                    <div class="col">
                        <h6>Waktu Belajar</h6>
                        <div class="row">
                            <div class="col">
                                <select name="" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                             </div>
                             <div class="col">
                                 <select name="" id="">
                                 <option value="">1</option>
                                 <option value="">2</option>
                                 <option value="">3</option>
                             </select>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="p-2 d-flex">
                    <div class="col">
                        <h6>Metode</h6>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                      Offline
                                    </label>
                                  </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                      Online
                                    </label>
                                  </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="p-2 d-flex pt-3">
                    <div class="col-8"><b>Total</b></div>
                    <div class="ml-auto"><b class="green">$85.00</b></div>
                </div>
                <br>
                <div> <input type="button" value="Proceed to payment" class="btn btn-primary btn-block"> </div>
                
                </form>
                {{-- <div class="p-2 d-flex">
                    <div class="col-8">Coinsurance( 0% )</div>
                    <div class="ml-auto">+ $0.00</div>
                </div>
                <div class="p-2 d-flex">
                    <div class="col-8">Copayment</div>
                    <div class="ml-auto">+ $40.00</div>
                </div>
                <div class="border-top px-4 mx-3"> </div>
                <div class="p-2 d-flex pt-3">
                    <div class="col-8">Total Deductible, Coinsurance, and Copay</div>
                    <div class="ml-auto">$40.00</div>
                </div>
                <div class="p-2 d-flex">
                    <div class="col-8">Maximum out-of-pocket on Insurance Policy (not reached)</div>
                    <div class="ml-auto">$6500.00</div>
                </div>
                <div class="border-top px-4 mx-3"></div>
                <div class="p-2 d-flex pt-3">
                    <div class="col-8">Insurance Responsibility</div>
                    <div class="ml-auto"><b>$71.76</b></div>
                </div>
                <div class="p-2 d-flex">
                    <div class="col-8">Patient Balance <span class="fa fa-question-circle text-secondary"></span></div>
                    <div class="ml-auto"><b>$71.76</b></div>
                </div>
                <div class="border-top px-4 mx-3"></div> --}}
            </div>
        </div>
    </div>
</div>