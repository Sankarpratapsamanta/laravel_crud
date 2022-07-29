@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav class="navbar bg-dark" style="margin-bottom: 20px;margin-top:20px">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1 text-white">Employees ( {{ @$employees->count() }} )</span>
                    </div>
                </nav>


                <a style="margin-bottom: 20px;" class="btn btn-primary" href="/employee`/create">Create New Employee</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ @$employee->firstName }}</td>
                                <td>{{ @$employee->lastName }}</td>
                                <td>{{ @$employee->company->name }}</td>
                                <td>{{ @$employee->email }}</td>
                                <td>{{ @$employee->phone }}</td>

                                <td style="display: flex">
                                    <a style="margin-right: 5px" href="/employee/{{ @$employee->id }}/edit"
                                        class="btn btn-success">Edit</a>

                                    <form action="/employee/{{ @$employee->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
@endsection
