    <!-- Vendor JS Files -->
    <script src="{{ asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('web/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('web/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('web/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('web/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('web/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('web/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('web/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    text: "{{ session('error') }}",
                    timer: 5000,
                    showConfirmButton: false
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    text: "{{ session('success') }}",
                    timer: 1500,
                    showConfirmButton: false
                });
            @endif
        });
    </script>
    <script>
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
                e.preventDefault();
            }
        });
    </script>