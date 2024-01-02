@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 align="center" class="mt-5">Employeer Management - {{$employee->emp_name}}</h3>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="form-area">
                    <form action="{{ route('employees.update', $employee->id) }}" method="post">
                        @csrf
                        {{-- {!! csrf_field() !!} --}}
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="emp_name">Employee Name</label>
                                <input type="text" class="form-control" name="emp_name" id="emp_name" value="{{ $employee->emp_name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="dob">Employee DOD</label>
                                <input type="date" class="form-control" name="dob" id="dob" value="{{ $employee->dob}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $employee->phone}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:  #b3e5fc;
        }

        .bi-trash-fill{
            color: red;
            font-size: 18px;
        }

        .bi-pencil {
            color: green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>

@endpush
