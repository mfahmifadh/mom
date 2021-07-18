<style>
    body{
    background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
}
.contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: 0%;
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -15%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 40%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}

.vertical-center {
  margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.row-centered {
text-align:center;
}
</style>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container contact-form">
            <div class="contact-image">
                <img src="{{ url('assets/img/momLogo.png')}}" alt="momLogo"/>
            </div>
            <form method="post">
                <h3>Rekomendasi Mentor</h3>
               <div class="row d-flex justify-content-center">
                    <div class="col-9">
                        <div class="form-group">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Materi Prioritas Pertama</h6>
                            </label>
                            <br>
                            <select name='prioritas' class="form-control">
                                <option value="">--- Pilih Prioritas Pertama ---</option>
                                <option value='islam'>Islam</option>
                                <option value='kristen'>Kristen</option>
                                <option value='katholik'>Katholik</option>
                                <option value='hindu'>Hindu</option>
                                <option value='kristen'>Budha</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Materi Prioritas Kedua</h6>
                            </label>
                            <br>
                            <select name='prioritas' class="form-control">
                                <option value="">--- Pilih Prioritas Kedua ---</option>
                                <option value='islam'>Islam</option>
                                <option value='kristen'>Kristen</option>
                                <option value='katholik'>Katholik</option>
                                <option value='hindu'>Hindu</option>
                                <option value='kristen'>Budha</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Materi Prioritas Ketiga </h6>
                            </label>
                            <br>
                            <select name='prioritas' class="form-control">
                                <option value="">--- Pilih Prioritas Ketiga ---</option>
                                <option value='islam'>Islam</option>
                                <option value='kristen'>Kristen</option>
                                <option value='katholik'>Katholik</option>
                                <option value='hindu'>Hindu</option>
                                <option value='kristen'>Budha</option>
                              </select>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <input type="submit" name="btnSubmit" class="btnContact " value="Simpan" />
                        </div>
                    </div>
                </div>
            </form>
</div>