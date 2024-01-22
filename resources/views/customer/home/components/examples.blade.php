<section class="container position-relative pt-1 pt-md-3">
    <div class="row align-items-start">
        <div class="row g-md-4 g-3">
            <div class="col-md-4 col-sm-6 mt-5 pt-3 pt-xl-4">
                <div class="position-relative rounded-3 overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
                        <button onclick="playThis(this)" class="btn btn-video btn-icon btn-xl bg-white">
                            <i class="bx bx-play"></i>
                        </button>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-35"></span>
                    <video class="videoElement d-block w-100" poster="{{ asset('test-files/belief.jpg') }}">
                        <source src="{{ asset('test-files/musics/belief.m4a') }}" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 ">
                <div class="position-relative rounded-3 overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
                        <button onclick="playThis(this)" class="btn btn-video btn-icon btn-xl bg-white">
                            <i class="bx bx-play"></i>
                        </button>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-35"></span>
                    <video class="videoElement d-block w-100" poster="{{ asset('test-files/gora.jpg') }}">
                        <source src="{{ asset('test-files/musics/gora.m4a') }}" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 mb-sm-0 pt-10 pt-xl-5" data-rellax-percentage="0.5" data-rellax-speed="-0.5" data-disable-parallax-down="sm">
                <div class="position-relative rounded-3 overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
                        <button onclick="playThis(this)" class="btn btn-video btn-icon btn-xl bg-white">
                            <i class="bx bx-play"></i>
                        </button>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-35"></span>
                    <video class="videoElement d-block w-100" poster="{{ asset('test-files/movie-action.jpg') }}">
                        <source src="{{ asset('test-files/musics/movie-action.m4a') }}" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mt-5 pt-3 pt-xl-4">
                <div class="position-relative rounded-3 overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
                        <button onclick="playThis(this)" class="btn btn-video btn-icon btn-xl bg-white">
                            <i class="bx bx-play"></i>
                        </button>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-35"></span>
                    <video class="videoElement d-block w-100" poster="{{ asset('test-files/romantic.jpg') }}">
                        <source src="{{ asset('test-files/musics/romantic.m4a') }}" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 ">
                <div class="position-relative rounded-3 overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
                        <button onclick="playThis(this)" class="btn btn-video btn-icon btn-xl bg-white">
                            <i class="bx bx-play"></i>
                        </button>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-35"></span>
                    <video class="videoElement d-block w-100" poster="{{ asset('test-files/tropic.jpg') }}">
                        <source src="{{ asset('test-files/musics/tropic.m4a') }}" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 mb-sm-0 pt-5 pt-xl-2" data-rellax-percentage="0.5" data-rellax-speed="-0.5" data-disable-parallax-down="sm">
                <div class="position-relative rounded-3 overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
                        <button onclick="playThis(this)" class="btn btn-video btn-icon btn-xl bg-white">
                            <i class="bx bx-play"></i>
                        </button>
                    </div>
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-35"></span>
                    <video class="videoElement d-block w-100" poster="{{ asset('test-files/matrix.jpg') }}">
                        <source src="{{ asset('test-files/musics/matrix.m4a') }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function playThis(button) {
        var videoElement = button.closest('.position-relative').querySelector('.videoElement');
        if (videoElement.paused) {
            videoElement.play();
            button.innerHTML = '<i class="bx bx-pause"></i>';
        } else {
            videoElement.pause();
            button.innerHTML = '<i class="bx bx-play"></i>';
        }
    }
</script>
