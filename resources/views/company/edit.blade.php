@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav class="navbar bg-dark" style="margin-bottom: 20px;margin-top:20px">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1 text-white">Edit {{ $company->name }} Company</span>
                    </div>
                </nav>

                <form action="/company/{{ @$company->id }}" method="POST" enctype='multipart/form-data'>
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{ $company->name }}" name="name"
                            id="exampleFormControlInput1" placeholder="xyz">

                        @if ($errors->has('name'))
                            <span class="error">
                                <p class="form-group__error text-danger">{{ $errors->first('name') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" value="{{ @$company->email }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="name@example.com">
                        @if ($errors->has('email'))
                            <span class="error">
                                <p class="form-group__error text-danger">{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Company Logo</label>
                        <input class="form-control  form-control-sm" name="logo" id="formFileSm" type="file">

                        <p>Old Logo</p>
                        <img src="{{ @$company->logo }}" alt="logo" style="width: 100px">

                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Website</label>
                        <input type="text" name="website" value="{{ @$company->website }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="xyz">
                        @if ($errors->has('website'))
                            <span class="error">
                                <p class="form-group__error text-danger">{{ $errors->first('website') }}</p>
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
