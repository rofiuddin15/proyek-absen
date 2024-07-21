@extends('layouts.index')

@push('css')
    
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Laporan Kinerja/</span> Tambah Laporan Kinerja</h4>

  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-2">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Laporan Kinerja</h5>
          {{-- <small class="text-muted float-end">Default label</small> --}}
        </div>
        <div class="card-body">
          @if($errors->any())
              {{ implode('', $errors->all('<div>:message</div>')) }}
          @endif
          <form method="POST" action="{{ route('laporan-kinerja.store')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token()}}" />
              <div class="mb-3 row justify-content-center">
                <div class="col-auto">
                  <img src="{{asset('sneat/assets/img/backgrounds/no_image.png')}}" id="pic1" alt="" class="img-thumbnail rounded">
                </div>
              </div>
            <div class="mb-3">
              <label for="gambar" id="labelTakePic" class="col-md-2 col-form-label">Ambil Gambar</label>
              <button type="button" id="btnTakePic" class="btn btn-outline-primary form-control" data-bs-toggle="modal" data-bs-target="#exampleModal">Ambil Gambar</button>
            </div>
            <div class="mb-3">
              <label for="report_description" class="col-md-2 col-form-label">Deskripsi</label>
              <textarea class="form-control" name="report_description" id="report_description" cols="30" rows="10"></textarea>
            </div>
            <div class="">
              <input type="file" name="report_file" id="report_file" class="form-control" hidden>
            </div>
            <div class="text-end">
              <button type="submit" class="btn float-left btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
   {{-- MODAL --}}
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ambil Gambar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="camera">
            <img id="fileDisplay" class="img-fluid"/>
            <video id="video" class="img-fluid" autoplay></video>
            <button class="btn btn-primary form-control mt-2" id="snap">
              <span class="tf-icons bx bxs-camera-plus"></span> <span id="snapText">Ambil Foto</span>
            </button>
            <button class="btn btn-primary form-control mt-2" id="snapRetake" hidden>
              <span class="tf-icons bx bxs-camera-plus"></span> <span id="snapText">Ambil Ulang</span>
            </button>
            <button class="btn btn-warning form-control mt-2" id="snapOke" hidden>
              <span class="tf-icons bx bxs-check-square"></span> <span id="snapText">Lanjutkan</span>
            </button>
            <canvas id="canvas" style="display:none;"></canvas>
        </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
        </div>
      </div>
    </div>
  </div>
  {{-- End of Modal --}}
</div>    
@endsection

@push('js')
<script>
  // Access the camera
const video = document.getElementById('video');

// Check if the browser supports getUserMedia
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.srcObject = stream;
        video.play();
    });
}
  snap.addEventListener('click', function() {

  // Take a picture when the button is clicked
  const canvas = document.getElementById('canvas');
  const snap = document.getElementById('snap');
  const snapRetake = document.getElementById('snapRetake');
  const snapOke = document.getElementById('snapOke');
  const pic1 = document.getElementById('pic1');
  const imageSelected = document.getElementById('report_file');

      const context = canvas.getContext('2d');
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      context.drawImage(video, 0, 0, canvas.width, canvas.height);

      // Convert the image to a data URL (base64 encoded string)
      const imageDataURL = canvas.toDataURL('image/png');
      console.log(imageDataURL);
      fetch(imageDataURL)
            .then(res => res.blob())
            .then(blob => {
                // Create a new file
                const file = new File([blob], 'evidence1.png', { type: 'image/png' });

                // Display the file name (simulate the file input display)
                fileDisplay.src = URL.createObjectURL(file);
                fileDisplay.style.display = 'block';

                // Display the file name (simulate the file input display)
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                imageSelected.files = dataTransfer.files;
                pic1.src = fileDisplay.src;


                // Create a temporary link element
                const link = document.createElement('a');

                // Append the link to the body (not visible)
                document.body.appendChild(link);

                // Clean up
                document.body.removeChild(link);
            });
      video.style.display = 'none';
      snap.style.display = 'none';
      snapRetake.hidden = false;
      snapOke.hidden = false;

  });

  snapRetake.addEventListener('click', function(){
    video.style.display = "block";
    fileDisplay.style.display = 'none';
    snap.style.display = 'block';
    snapRetake.hidden = true;
    snapOke.hidden = true;
  })
  snapOke.addEventListener('click', function(){
    snapRetake.hidden = true;
    fileDisplay.style.display = 'none';
    snapOke.hidden = true;
    $('#exampleModal').modal('hide');
    labelTakePic.hidden = true;
    btnTakePic.hidden = true;

  })
  </script>
@endpush