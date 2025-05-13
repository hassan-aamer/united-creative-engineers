@extends('web.layouts.app')
@section('title', __('attributes.contuct'))
@section('content')
    <main>
        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-12">
                    <h2 class="text-center">{{ __('attributes.contuct') }}</h2>
                    <p class="text-center text-muted">{{ __('attributes.feedbackPlease') }}</p>
                </div>
            </div>

            <div class="row mt-5 contact">

                <div class="col-lg-3 py-4">
                    <div class="contact-info p-4 bg-white rounded-4">
                        <h4 class="mb-4">{{ __('attributes.ContactInformation') }}</h4>

                        <div class="contact-item mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-container me-3">
                                    <img src="{{ asset('web/images/phone.svg') }}">
                                </div>
                                <div>
                                    <h6 class="mb-1">{{ __('attributes.MobileNumber') }}</h6>
                                    <p class="mb-0">{{ setting('phone') ?? '' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-item mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-container me-3">
                                    <img src="{{ asset('web/images/mail.svg') }}">
                                </div>
                                <div>
                                    <h6 class="mb-1">{{ __('attributes.email') }}</h6>
                                    <p class="mb-0">{{ setting(key: 'email') ?? '' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="d-flex align-items-center">
                                <div class="icon-container me-3">
                                    <img src="{{ asset('web/images/locate.svg') }}">
                                </div>
                                <div>
                                    <h6 class="mb-1">{{ __('attributes.address') }}</h6>
                                    <p class="mb-0">{{ setting('address') ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="contact-social-links social-links text-center">
                            <div>{{ __('attributes.FollowOn') }}
                            </div>
                            <br>
                            <a href="{{ setting('facebook') ?? '' }}" class="social-link">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="{{ setting('instagram') ?? '' }}" class="social-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="{{ setting('linkedIn') ?? '' }}" class="social-link">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="{{ setting('twitter') ?? '' }}" class="social-link">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-9 py-4 ">
                    <form class="contact-form p-4 bg-white rounded-4 shadow-sm" action="{{ route('contact.store') }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="mb-2">{{ __('attributes.MobileNumber') }}</label>
                                    <div class="input-group">
                                        <input id="phone" value="{{ old('phone') }}" type="tel"
                                            class="form-control  @error('phone') is-invalid @enderror"
                                            placeholder="{{ __('attributes.MobileNumber') }}" name="phone">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="mb-2">{{ __('attributes.name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" value="{{ old('name') }}" name="name"
                                        placeholder="{{ __('attributes.name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email" class="mb-2">{{ __('attributes.email') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}"
                                        placeholder="{{ __('attributes.email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="dropdown" class="mb-2">{{ __('attributes.services') }}</label>
                                    <select class="form-control @error('service_id') is-invalid @enderror" id="dropdown"
                                        name="service_id" value="{{ old('service_id') }}">
                                        <option value="" disabled selected>{{ __('attributes.SelectServiceType') }}
                                        </option>
                                        @foreach ($result['services'] as $services)
                                            <option value="{{ $services->id ?? '' }}">{{ $services->title ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="service" class="mb-2">{{ __('attributes.Newsletter') }}</label>
                                <textarea rows="5" type="text" class="form-control @error('message') is-invalid @enderror" id="service"
                                    name="message" placeholder="{{ __('attributes.Newsletter') }}">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5 py-3 background-primary contact-btn">
                                <img src="{{ asset('web/images/send.svg') }}" alt="{{ __('attributes.submit') }}"
                                    class="me-2" width="24" height="24">
                                {{ __('attributes.submit') }}
                            </button>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </main>
@endsection
@section('js')

    <script>
        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.2.16/js/utils.js",
            initialCountry: "sa",
            preferredCountries: ['eg', 'sa', 'ae', 'us', 'gb'],
            separateDialCode: true,
        });
        document.querySelector('form').addEventListener('submit', function(event) {
            input.value = iti.getNumber();
        });
    </script>

@endsection
