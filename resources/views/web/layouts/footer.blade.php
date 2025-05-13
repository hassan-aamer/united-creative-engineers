    <!-- Footer -->
    <footer class="bg-primary-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5>الرئيسية</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">{{ __('attributes.home') }}</a></li>
                        @if (App\Models\Service::count())
                            <li><a href="{{ route('services') }}">{{ __('attributes.services') }}</a></li>
                        @endif
                        @if (App\Models\Product::count())
                            <li><a href="{{ route('products') }}">{{ __('attributes.products') }}</a></li>
                        @endif
                        {{-- <li><a href="{{ route('about') }}">{{ __('attributes.about') }}</a></li> --}}
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>{{ __('attributes.knowUs') }}</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}"> {{ __('attributes.about') }}</a></li>
                        <li><a href="{{ route('about') }}">{{ __('attributes.WhyUs') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>{{ __('attributes.contuct') }}</h5>
                    <ul class="list-unstyled">
                        <li> <i class="fas fa-phone"></i> {{ setting('phone') }} </li>
                        <li> <i class="fas fa-envelope"></i> {{ setting('email') }} </li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <form action="{{ route('subscription') }}" method="POST">
                        @csrf
                        <h5>{{ __('attributes.subscriptions') }}</h5>
                        <div class="input-group mb-3">
                            <input type="email" value="{{ old('email') }}" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="{{ __('attributes.email') }}" aria-label="Email"
                                aria-describedby="button-addon2">
                            <button class="btn btn-success" type="submit"><i class="fas fa-paper-plane"></i></button>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                    <div class="social-icons">
                        <a href="{{ setting('facebook') ?? '' }}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ setting('twitter') ?? '' }}"><i class="fab fa-twitter"></i></a>
                        <a href="{{ setting('instagram') ?? '' }}"><i class="fab fa-instagram"></i></a>
                        <a href="{{ setting('linkedIn') ?? '' }}"><i class="fab fa-linkedin-in"></i></a>
                    </div>

                    <div class="mt-4">
                        <p class="mb-0">{{ setting('copyrights') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
