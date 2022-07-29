@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav class="navbar bg-dark" style="margin-bottom: 20px;margin-top:20px">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1 text-white">Companies ( {{ @$companies->count() }} )</span>
                    </div>
                </nav>


                <a style="margin-bottom: 20px;" class="btn btn-primary" href="/company/create">Create New Company</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ @$company->name }}</td>
                                <td>{{ @$company->email }}</td>
                                <td>{{ @$company->website }}</td>
                                <td style="display: flex">
                                    <a style="margin-right: 5px" href="/company/{{ @$company->id }}/edit"
                                        class="btn btn-success">Edit</a>

                                    <form action="/company/{{ @$company->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $companies->links() !!}
            </div>
        </div>
    </div>
@endsection
