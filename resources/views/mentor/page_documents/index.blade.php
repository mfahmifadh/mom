@extends('mentor/page_documents/layouts')

@section('content')

<div class="container">
    <div class="row" style="padding-top:2vh;">
        <div class="card col-md-12">
            <span style="margin:3vh;">
                <h3>Syarat & Ketentuan :</h3>
                <p>1. Mentor Diharuskan menglengkapi dokumen di bawah ini.</br>
                   2. Akun Mentor Akan Di Validasi Maks. 2 Hari Kerja. </br>
                   3. Setiap mentor di perbolehkan membuat lebih dari 3 kelas.</br>
                   4. Setiap mentor di perbolehkan mengajar lebih dari 1 murid (Waktu Tidak Bersamaan).</br>
                   5. Biaya yang akan di dapatkan mentor adalah 90% dari pembayaran murid dan 10% biaya system.</br>
                   6. Pembayaran akan diterima setelah mentor menyelesaikan proses mentoring.</br>
                   7. Apabila mentor melakukan kecurangan, penipuan dan hal yang merugikan murid, maka akun mentor akan di <b style="color:red;">BLOKIR</b></p>
            </span>
        </div>
        <div class="card col-md-12">
            <form style="margin:3vh;" action="{{ url('mentor/postDocument') }}" method="POST">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status_account" value="0">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Tentang :</label>
                        <textarea name="about" class="form-control" required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Riwayat Pendidikan : </label>
                        <textarea name="education_history" class="form-control" required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Pengalaman : </label>
                        <textarea name="experience" class="form-control" required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Keahlian (Skill) : </label>
                        <textarea name="skill" class="form-control" required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Portofolio : </label>
                        <textarea name="portfolio" class="form-control" required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sertifikat : </label>
                        <input type="file" name="certificate" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-icon btn-primary" type="submit">
                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                            <span class="btn-inner--text">Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>


    
</div>


@endsection