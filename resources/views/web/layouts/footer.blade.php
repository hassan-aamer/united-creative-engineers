    <footer id="footer" class="footer dark-background">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div class="address">
                        <h4>Address</h4>
                        <p>{{ setting('address') ?? '' }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Contact</h4>
                        <p>
                            <strong>Phone :</strong> <span style="color: #21a39f;">{{ setting('phone') ?? '' }}</span><br>
                            <strong>Email :</strong> <span>{{ setting('email') ?? '' }}</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Sunday To Thursday :</strong> <span style="color: #21a39f;">9 AM - 5 PM</span><br>
                            <strong>Friday & Saturday</strong> : <span>Closed</span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="https://wa.me/{{ setting('whatsapp') }}" class="whatsapp"><i
                                class="bi bi-whatsapp"></i></a>
                        {{-- <a href="{{ setting('twitter') ?? '' }}" class="twitter"><i class="bi bi-twitter-x"></i></a> --}}
                        <a href="{{ setting('facebook') ?? '' }}" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="{{ setting('instagram') ?? '' }}" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="{{ setting('linkedIn') ?? '' }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        <a href="{{ setting('map') ?? '' }}" class="map"><i class="bi bi-map"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>{{ setting('copyrights') }}<a style="color: #21a39f;padding-left: 10px;">  © 2025</a></p>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
