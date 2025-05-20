@extends('admin.layouts.master')
@section('title', __('attributes.contacts'))

@section('content')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            {{-- <a class="btn btn-success"
                                href="{{ route('admin.products.create') }}">{{ __('attributes.create') }}</a> --}}
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <h4 class="header-title mt-0 mb-1">{{ __('attributes.contacts') }}</h4>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('attributes.name')</th>
                                            <th>@lang('attributes.email')</th>
                                            <th>@lang('attributes.phone')</th>
                                            <th>@lang('attributes.message')</th>
                                            <th>@lang('attributes.ReadIt')</th>
                                            <th>@lang('attributes.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($result->count())
                                            @foreach ($result as $contacts)
                                                <tr id="row-{{ $contacts->id ?? '' }}">
                                                    <td>{{ $loop->iteration ?? '' }}</td>
                                                    <td>{{ $contacts->name ?? '' }}</td>
                                                    <td>{{ $contacts->email ?? '' }}</td>
                                                    <td>{{ $contacts->phone ?? '' }}</td>
                                                    <td>{{ shortenText($contacts->message ?? '', 70) }}</td>
                                                    <td>
                                                        @can('active contacts')
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" name="status"
                                                                    id="active-{{ $contacts->id }}"
                                                                    @if ($contacts->active == 1) checked @endif
                                                                    data-id="{{ $contacts->id }}">
                                                                <label class="form-check-label"
                                                                    for="active-{{ $contacts->id }}"></label>
                                                            </div>
                                                        @endcan
                                                    </td>
                                                    <td>
                                                        @can('delete contacts')
                                                            <button type="button" class="btn btn-danger btn-block btn-delete"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete{{ $contacts->id }}">
                                                                <i class="fa uil-trash"></i>
                                                            </button>
                                                        @endcan
                                                    </td>
                                                </tr>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete{{ $contacts->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myCenterModalLabel">
                                                                    @lang('attributes.delete') : <span
                                                                        class="text-danger">{{ $contacts->title }}</span>
                                                                </h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form id="deleteForm{{ $contacts->id }}"
                                                                action="{{ route('admin.contacts.delete', $contacts->id) }}"
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
                                                                        onclick="deleteData({{ $contacts->id }})">
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

                fetch("{{ route('admin.contacts.status', app()->getLocale()) }}", {
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
