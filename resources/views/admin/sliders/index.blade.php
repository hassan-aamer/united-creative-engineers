@extends('admin.layouts.master')
@section('title', __('attributes.sliders'))

@section('content')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            @can('create sliders')
                                <a class="btn btn-success"
                                    href="{{ route('admin.sliders.create') }}">{{ __('attributes.create') }}</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <h4 class="header-title mt-0 mb-1">{{ __('attributes.sliders') }}</h4>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('attributes.image')</th>
                                            <th>@lang('attributes.position')</th>
                                            <th>@lang('attributes.title')</th>
                                            <th>@lang('attributes.active')</th>
                                            <th>@lang('attributes.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($result->count())
                                            @foreach ($result as $sliders)
                                                <tr id="row-{{ $sliders->id ?? '' }}">
                                                    <td>{{ $loop->iteration ?? '' }}</td>
                                                    <td><img src="{{ App\Helpers\Image::getMediaUrl($sliders, 'sliders') }}"
                                                            alt="sliders" width="100"></td>
                                                    <td>{{ $sliders->position ?? '' }}</td>
                                                    <td>{{ shortenText($sliders->title ?? '', 10) }}</td>
                                                    <td>
                                                        @can('active sliders')
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" name="status"
                                                                    id="active-{{ $sliders->id }}"
                                                                    @if ($sliders->active == 1) checked @endif
                                                                    data-id="{{ $sliders->id }}">
                                                                <label class="form-check-label"
                                                                    for="active-{{ $sliders->id }}"></label>
                                                            </div>
                                                        @endcan
                                                    </td>
                                                    <td>
                                                        @can('edit sliders')
                                                            <a href="{{ route('admin.sliders.edit', $sliders->id) }}">
                                                                <button type="button" class="btn btn-warning btn-block "><i
                                                                        class="fa uil-edit"></i> </button>
                                                            </a>
                                                        @endcan
                                                        @can('delete sliders')
                                                            <button type="button" class="btn btn-danger btn-block btn-delete"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete{{ $sliders->id }}">
                                                                <i class="fa uil-trash"></i>
                                                            </button>
                                                        @endcan

                                                    </td>
                                                </tr>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete{{ $sliders->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myCenterModalLabel">
                                                                    @lang('attributes.delete') : <span
                                                                        class="text-danger">{{ $sliders->title }}</span>
                                                                </h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form id="deleteForm{{ $sliders->id }}"
                                                                action="{{ route('admin.sliders.delete', $sliders->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="modal-body">
                                                                    <p class="text-center text-danger fs-2 m-0 fw-bold">
                                                                        @lang('attributes.delete')
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-success"
                                                                        data-bs-dismiss="modal">
                                                                        @lang('attributes.close')
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        onclick="deleteData({{ $sliders->id }})">
                                                                        @lang('attributes.delete')
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center text-danger">
                                                    @lang('attributes.no_data_found')
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div> <!-- container -->
        </div> <!-- content -->
    </div>

@endsection
@section('js')
    @include('admin.components.delete-script')
    <script>
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const Id = this.getAttribute('data-id');
                const status = this.checked ? 1 : 0;

                fetch("{{ route('admin.sliders.status', app()->getLocale()) }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id: Id,
                        status: status
                    })
                })

            });
        });
    </script>
@endsection
