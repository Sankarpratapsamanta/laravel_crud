@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav class="navbar bg-dark" style="margin-bottom: 20px;margin-top:20px">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1 text-white">Edit {{ @$employee->firstName }}
                            {{ @$employee->lastName }}</span>
                    </div>
                </nav>

                <form action="/employee/{{ @$employee->id }}" method="POST" enctype='multipart/form-data'>
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">First Name</label>
                        <input type="text" class="form-control" value="{{ @$employee->firstName }}" name="firstName"
                            id="exampleFormControlInput1" placeholder="xyz">

                        @if ($errors->has('firstName'))
                            <span class="error">
                                <p class="form-group__error text-danger">{{ $errors->first('firstName') }}</p>
                            </span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="{{ @$employee->lastName }}" name="lastName"
                            id="exampleFormControlInput1" placeholder="xyz">

                        @if ($errors->has('lastName'))
                            <span class="error">
                                <p class="form-group__error text-danger">{{ $errors->first('lastName') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" value="{{ @$employee->email }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="name@example.com">
                        @if ($errors->has('email'))
                            <span class="error">
                                <p class="form-group__error text-danger">{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Company Name</label>
                        <select class="form-control" name="company" id="">
                            <option value="0" hidden>Select Company</option>

                            @foreach ($companies as $company)
                                <option value="{{ @$company->id }}"
                                    {{ @$company->id === @$employee->company_id ? 'selected' : '' }}>{{ @$company->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('company'))
                            <span class="error">
                                <p class="form-group__error text-danger">{{ $errors->first('company') }}</p>
                            </span>
                        @endif
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ @$employee->phone }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="xyz">
                        @if ($errors->has('phone'))
                            <span class="error">
                                <p class="form-group__error text-danger">{{ $errors->first('phone') }}</p>
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
