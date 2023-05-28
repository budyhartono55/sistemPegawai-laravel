<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
 
  </head>
  <body>
    <div class="container">
        <h1 class="text-center mb-5 mt-2">Data Pegawai</h1>
        <a href="/pegawai/addPegawai" type="button" class="btn btn-primary mb-3">Tambah Pegawai +</a>
        <div class="row">

          {{-- flash --}}
          {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
            @endif --}}
            {{-- endFlash --}}

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Tanggal dibuat</th>
                    <th scope="col">Terakhir diupdate</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                {{-- data --}}
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                    @foreach ($data as $index => $row)
                    <tr>
                      <th scope="row">{{$index + $data->firstItem() }}</th>
                      <td>{{ $row->nama }}</td>
                      <td>{{ $row->jenis_kelamin }}</td>
                      <td>{{ $row->contact }}</td>
                      <td>
                        <img src="{{ asset("photoPegawai/".$row->photo) }}" alt="" style="width:40px">
                      </td>
                      <td>{{ $row->created_at->diffForHumans() }}</td>
                      <td>{{ $row->updated_at->diffForHumans() }}</td>
                      <td>
                          <a href="pegawai/detailsPegawai/{{ $row->id }}" type="button" class="btn btn-warning">Edit</a>
                          <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}" data-name="{{ $row->nama }}">Hapus</button>
                      </td>
                    </tr>
                    {{-- endData --}}
                    @endforeach
                </tbody>
              </table>
              <div class="d-flex link justify-content-center">
                {{ $data->links() }}
              </div>
        </div>
    </div>
    {{-- sweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    {{-- boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
   {{-- toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>

<script>
  // delete sweetAlert
   $(".delete").click(function(){
    var pegawai_name = $(this).attr("data-name");
    var pegawai_id = $(this).attr("data-id");

    Swal.fire({
          title: "Yakin?",
          text: "Anda akan menghapus data pegawai dengan nama = "+pegawai_name+"!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Saya Yakin!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "/deleteData/"+pegawai_id+""
            Swal.fire(
              'Berhasil!',
              'Data pegawai berhasil dihapus!',
              'success'
            )
          }else{
            Swal.fire("Penghapusan data dibatalkan!")
          }
        })
   })
</script>

{{-- General Toastr --}}
<script>
@if(Session::has("success"))  
  toastr.success("{{ Session::get('success') }}")
@endif
</script>

</html>