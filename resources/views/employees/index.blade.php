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
                                <h3 class="mb-0">employees</h3>
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
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">phone</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>

                                            <th scope="row">
                                                {{$employee->first_name}}  {{$employee->last_name}}
                                            </th>
                                            <th scope="row">
                                                {{$employee->company->name}}
                                            </th>
                                            <th scope="row">
                                                {{$employee->email}}
                                            </th>
                                            <th scope="row">
                                                {{$employee->phone}}
                                            </th>
                                            <th scope="row">

                                                  <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a class="btn btn-info" href="{{route('employees.edit',$employee->id)}}"> Edit</a>

                                                    <button type="submit" class="btn btn-danger">Delete</button>


                                                </form>


                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>

            <div class="col-xl-4 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">New employee</h3>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        {!! Form::open(['route' => 'employees.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
                        {{csrf_field()}}

                        <div class="row">

                            <div class="form-group col-12">
                                {{Form::label('first_name', 'First Name')}}
                                <div class="input-group mb-3">
                                    {{Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name',  'required'))}}
                                </div>

                                @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                {{Form::label('last_name', 'Last Name')}}
                                <div class="input-group mb-3">
                                    {{Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'last_name', 'required'  ))}}
                                </div>
                                @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                {!! Form::label('company_id', 'Select Company',) !!}
                                <div class="input-group mb-3">
                                {!! Form::select('company_id', $companies, null,  ['class' => 'form-control', 'placeholder' => '--Select--', 'requird']) !!}
                                </div>
                                @error('last_name')
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
                                {{Form::label('phone', 'Phone')}}
                                <div class="input-group mb-3">
                                    {{Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Phone', 'required'  ))}}
                                </div>
                                @error('phone')
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
