@extends('layouts.admin')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">

        <div class="row mt-5">

            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page visits</h3>
                            </div>
                            <div class="col text-right">
                                <a href="/companies" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">

                        {!!  Form::model($company,['method' =>'PATCH', 'enctype' => 'multipart/form-data', 'route' => ['companies.update', $company->id]])  !!}

                        <div class="row">

                            <div class="form-group col-6">
                                {{Form::label('name', 'Company Name')}}
                                <div class="input-group mb-3">
                                    {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Company Name', 'required'  ))}}
                                </div>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                {{Form::label('email', 'Email')}}
                                <div class="input-group mb-3">
                                    {{Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required'  ))}}
                                </div>

                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                {{Form::label('logo', 'Logo')}}
                                <div class="input-group mb-3">
                                    {!! Form::file('logo', []) !!}
                                    OLD Image:
                                <img src="{{ route('image.displayImage',$company->logo) }}" alt="" title="" width="100">
                                </div>
                                @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group col-6">
                                {{Form::label('website', 'Website')}}
                                <div class="input-group mb-3">
                                    {{Form::text('website', null, array('class' => 'form-control', 'placeholder' => 'Website', 'required'  ))}}
                                </div>
                                @error('website')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                        </div>




                        <hr>
                        <div class="text-right">

                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
