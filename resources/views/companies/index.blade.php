@extends('layouts.admin')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">

        <div class="row mt-5">

            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Companies</h3>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="card-body">

                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Company name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <th scope="row">
                                                <img src="{{ route('image.displayImage',$company->logo) }}" alt="" title="" width="100">
                                            </th>
                                            <th scope="row">
                                                {{$company->name}}
                                            </th>
                                            <th scope="row">
                                                {{$company->email}}
                                            </th>
                                            <th scope="row">
                                                {{$company->website}}
                                            </th>
                                            <th scope="row">

                                                  <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a class="btn btn-info" href="{{route('companies.edit',$company->id)}}"> Edit</a>

                                                    <button type="submit" class="btn btn-danger">Delete</button>


                                                </form>


                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-4 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">New Company</h3>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        {!! Form::open(['route' => 'companies.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
                        {{csrf_field()}}

                        <div class="row">

                            <div class="form-group col-12">
                                {{Form::label('name', 'Company Name')}}
                                <div class="input-group mb-3">
                                    {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Company Name',  'required'))}}
                                </div>

                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                {{Form::label('email', 'Email')}}
                                <div class="input-group mb-3">
                                    {{Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required'  ))}}
                                </div>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                {{Form::label('logo', 'Logo')}}
                                <div class="input-group mb-3">
                                    {!! Form::file('logo', []) !!}
                                </div>
                                @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-12">
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
