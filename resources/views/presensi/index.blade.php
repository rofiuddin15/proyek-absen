@extends('layouts.index')

@push('css')
<link rel="stylesheet" href="{{ asset('sneat/assets/vendor/css/pages/page-auth.css')}}" />    
@endpush

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{route('dashboard')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo text-body fw-bolder">SIP</span>
            </a>
          </div>
          <!-- /Logo -->
          {{-- <div class="row text-center">
            <h4 class="mb-2">Welcome to SIP! 👋</h4>
            <p class="mb-4">Please sign-in to your account</p>

          </div> --}}
          {{-- <p>{{$jam}}</p> --}}
          <span class="badge bg-success form-control">
            @switch($jam2)
                @case(1)
                    <?php $messageJam2 = "Anda Telah melakukan absen masuk" ?>
                    @break
                @case(2)
                    <?php $messageJam2 = "Anda telah melakukan absen pulang" ?>
                    @break
                @default
                  <?php $messageJam2 = "Anda Belum Melakukan Absen" ?>
                  @break
            @endswitch
            {{$messageJam2}}
          </span>
          <span class="badge bg-warning form-control">
            @switch($jam)
                @case(1)
                    <?php $messageJam = "Anda Memasuki jam absen kedatangan" ?>
                    @break
                @case(2)
                    <?php $messageJam = "Anda Memasuki Jam Absen kepulangan" ?>
                    @break
                @case(3)
                    <?php $messageJam = "tidak bisa absen masuk" ?>
                    @break
                @case(4)
                    <?php $messageJam = "tidak bisa absen pulang" ?>
                    @break
                @default
                  <?php $messageJam = "Anda Belum Memasuki Jam Absen" ?>
                  @break
            @endswitch
            {{$messageJam}}
          </span>

          <form id="formAuthentication" class="mb-3" action="{{ route('presensi.store')}}" method="POST" enctype="multipart/form-data">
            <div class="mb-3 d-md-flex flex-md-row justify-content-between">
              <input type="hidden" id="csrfToken" value="{{ csrf_token() }}">
              <input type="hidden" id="method" name="_method" value="PATCH">
              <input type="file" id="imageSelected" name="photo" class="form-control" hidden>
              <input type="file" id="imageSelected2" name="photo2" class="form-control" hidden>
              <input type="text" name="latitude" id="latitude" hidden>
              <input type="text" name="longitude" id="longitude" hidden>
            </div>
            <div class="row mb-3 d-none" id="allPic">
              <div class="col-md-6">
                <img src="{{asset('sneat/assets/img/backgrounds/no_image.png')}}" id="pic1" alt="" class="img-thumbnail rounded">
              </div>
              <div class="col-md-6">
                <img src="{{asset('sneat/assets/img/backgrounds/no_image.png')}}" alt="" id="pic2" class="img-thumbnail rounded">
              </div>
            </div>
            <div class="mb-3 text-center d-md-flex flex-md-row justify-content-center" id="takeGambar" >
              <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <span class="tf-icons bx bxs-camera-plus"></span>
              </button>
              <p class="text-center ps-md-2">Ambil Gambar</p>
            </div>
            <div class="mb-3">
              @if ($jam === 1)
                <a href="#" id="checkIn" class="btn card icon-card cursor-pointer text-center mb-4 mx-2 disabled bg-secondary">
                  <div class="card-body">
                    <i class="bx bx-log-in-circle mb-2"></i>
                    <p class="icon-name text-capitalize text-truncate mb-0">CHECK IN</p>
                  </div>
                </a>
              @else
                <a href="#" class="btn card icon-card cursor-pointer text-center mb-4 mx-2 disabled bg-secondary">
                  <div class="card-body">
                    <i class="bx bx-log-in-circle mb-2"></i>
                    <p class="icon-name text-capitalize text-truncate mb-0">CHECK IN</p>
                  </div>
                </a>
              @endif
            </div>
            <div class="mb-3">
              @if ($jam != 2)
                <a href="ww" class="btn card icon-card cursor-pointer text-center mb-4 mx-2 disabled bg-secondary">
                  <div class="card-body">
                    <i class="bx bx-log-out-circle mb-2"></i>
                    <p class="icon-name text-capitalize text-truncate mb-0">CHECK OUT</p>
                  </div>
                </a>
              @else
                @if ($checkKinerja != 0 &&  $jam === 2)
                <a href="#" id="checkOut" class="btn card icon-card cursor-pointer text-center mb-4 mx-2 disabled bg-secondary">
                  <div class="card-body">
                    <i class="bx bx-log-out-circle mb-2"></i>
                    <p class="icon-name text-capitalize text-truncate mb-0">CHECK OUT</p>
                  </div>
                </a>
                @else
                <a href="#" id="checkOutX" onclick="alert('anda belum membuat laporan kinerja');"  class="btn card icon-card cursor-pointer text-center mb-4 mx-2 disabled bg-secondary">
                  <div class="card-body">
                    <i class="bx bx-log-out-circle mb-2"></i>
                    <p class="icon-name text-capitalize text-truncate mb-0">CHECK OUT</p>
                  </div>
                </a>
                @endif
              @endif
            </div>
          </form>

          <p class="text-center">
            <span>Ambil foto sebelum check in.</span>
          </p>
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
            <button class="btn btn-primary form-control mt-2" id="snap2" hidden>
              <span class="tf-icons bx bxs-camera-plus"></span> <span id="snapText">Ambil Foto</span>
            </button>
            <button class="btn btn-primary form-control mt-2" id="snapRetake2" hidden>
              <span class="tf-icons bx bxs-camera-plus"></span> <span id="snapText">Ambil Ulang</span>
            </button>
            <button class="btn btn-success form-control mt-2" id="snapOke2" hidden>
              <span class="tf-icons bx bxs-check-square"></span> <span id="snapText">Oke</span>
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
  const lat = document.getElementById('latitude');
  const long = document.getElementById('longitude');
// LOKASI
if (navigator.geolocation) {
    var position = navigator.geolocation.watchPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
  
  function showPosition(position) {
    lat.value = position.coords.latitude;
    long.value = position.coords.longitude;
  }


  // Access the camera
  const video = document.getElementById('video');

  // // Check if the browser supports getUserMedia
  if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
      navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
          video.srcObject = stream;
          video.play();
      });
  }

  

  // Take a picture when the button is clicked
  const canvas = document.getElementById('canvas');
  const snap = document.getElementById('snap');
  const snapRetake = document.getElementById('snapRetake');
  const snapOke = document.getElementById('snapOke');
  const snap2 = document.getElementById('snap2');
  const takeGambar = document.getElementById('takeGambar');
  const pic1 = document.getElementById('pic1');
  const pic2 = document.getElementById('pic2');

  snap.addEventListener('click', function() {
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
    video.style.display = "block";
    fileDisplay.style.display = 'none';
    snap2.hidden = false;
    snapOke.hidden = true;
    exampleModalLabel.textContent = "Ambil Gambar 2"
  })
  snap2.addEventListener('click', function() {
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
                const file = new File([blob], 'evidence2.png', { type: 'image/png' });

                // Display the file name (simulate the file input display)
                fileDisplay.src = URL.createObjectURL(file);
                fileDisplay.style.display = 'block';

                // Display the file name (simulate the file input display)
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                imageSelected2.files = dataTransfer.files;
                pic2.src = fileDisplay.src;


                // Create a temporary link element
                const link = document.createElement('a');

                // Append the link to the body (not visible)
                document.body.appendChild(link);

                // Clean up
                document.body.removeChild(link);
            });
      video.style.display = 'none';
      snap2.style.display = 'none';
      snapRetake2.hidden = false;
      snapOke2.hidden = false;
      allPic.classList.remove('d-none');
  })
  snapRetake2.addEventListener('click', function(){
    snapRetake2.hidden = true;
    video.style.display = "block";
    fileDisplay.style.display = 'none';
    snap2.style.display = 'block';
    snapOke2.hidden = true;
  })
  snapOke2.addEventListener('click', function(){
    snapRetake2.hidden = true;
    fileDisplay.style.display = 'none';
    snap2.hidden = false;
    snapOke2.hidden = true;
    $('#exampleModal').modal('hide');
    takeGambar.style.visibility = 'hidden';
    takeGambar.classList.remove('mb-3');
    $('#checkIn').removeClass('disabled bg-secondary');
    $('#checkOut').removeClass('disabled bg-secondary');
    $('#checkOutX').removeClass('disabled bg-secondary');
  })

  $('#checkIn').on('click', function() {
    var fileInput = document.getElementById('imageSelected');
    var fileInput2 = document.getElementById('imageSelected2');
    var lat = document.getElementById('latitude').value;
    var long = document.getElementById('longitude').value;
    var file = fileInput.files[0];
    var file2 = fileInput2.files[0];
    var formData = new FormData();

    formData.append('photo', file);
    formData.append('photo2', file2);
    formData.append('latitude', lat);
    formData.append('longitude', long);

    var csrfToken = document.getElementById('csrfToken').value;

    $.ajax({
        url: "{{ route('presensi.store') }}",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
          window.location.href = "{{ route('presensi.create') }}";
          alert('Berhasil Absen');
        },
        error: function(xhr, status, error) {
            console.log('Error:', error);
        }
    });
  });
  $('#checkOut').on('click', function() {
    event.preventDefault();
    var fileInput = document.getElementById('imageSelected');
    var fileInput2 = document.getElementById('imageSelected2');
    // var method = document.getElementById('method');
    var method = document.querySelector('input[name="_method"]').value;
    var lat = document.getElementById('latitude').value;
    var long = document.getElementById('longitude').value;
    var file = fileInput.files[0];
    // console.log();
    var file2 = fileInput2.files[0];
    // Validation
    if (!fileInput.files.length || !fileInput2.files.length) {
        alert('Please select both images.');
        return;
    }

    if (!lat || !long) {
        alert('Please enter both latitude and longitude.');
        return;
    }

    var formData2 = new FormData();

    formData2.append('photo', file);
    formData2.append('photo2', file2);
    formData2.append('latitude', lat);
    formData2.append('longitude', long);
    formData2.append('_method', method);


    var csrfToken = document.getElementById('csrfToken').value;

    $.ajax({
        url: "{{ route('presensi.update', ['presensi' => '1']) }}",
        type: 'POST',
        data: formData2,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
          window.location.href = "{{ route('presensi.create') }}";
          alert('Berhasil Absen');
        },
        error: function(xhr, status, error) {
            console.log('Error:', error);
          alert('Gagal Absen');

        }
    });
  });
</script>
@endpush