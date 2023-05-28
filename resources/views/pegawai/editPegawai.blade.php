<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <h1 class="text-center mb-5 mt-2">Edit Data Pegawai</h1>
        <div class="row justify-content-center">
          <div class="col-6">
            <div class="card">
             <div class="card-body">

               <form action="/updatePegawai/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="mb-3">
                   <label for="nama" class="form-label">Nama</label>
                   <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama"
                    value="{{ $data->nama }}">
                 </div>

                 <div class="mb-3">
                   <label for="nama" class="form-label">Jenis Kelamin</label>
                   <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                    <option selected>{{ $data->jenis_kelamin }}</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                 </div>

                 <div class="mb-3">
                 <label for="contact" class="form-label">Contact</label>
                 <input type="text" class="form-control" name="contact" id="contact"
                 value="{{ $data->contact }}">
                 </div>
                  <div class="d-flex justify-content-between">
                    <a href="/pegawai" type="button" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                                  
               </form>
             </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>