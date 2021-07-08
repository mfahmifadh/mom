<x-mentor-layout>

<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ url('mentor/addCourses') }}" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Create New Courses</h3>
            </div>
            <div class="card-body border 0">
              <form>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Courses Name :</label>
                        <select class="form-control">
                            <option>Default select</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="exampleFormControlInput1">Category :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>     
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Schedule :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Fee :</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group col-md-4">
                        <button class="btn btn-icon btn-primary" type="button">
                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                            <span class="btn-inner--text">SUBMIT</span>
                        </button>
                    </div>              
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

</x-mentor-layout>