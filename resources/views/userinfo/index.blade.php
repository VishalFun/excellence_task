@extends('userinfo.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Excellence UserInfo List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('userinfo.create') }}"> Create New User Info</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Contact</th>
            <th>Designation</th>
            <th>Gender</th>
            <th>Hobbies</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->first_name }}</td>
            <td>{{ $value->last_name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->dob }}</td>
            <td>{{ $value->contact }}</td>
            <td>{{ $value->designation }}</td>
            <td>{{ $value->gender }}</td>
            <td>{{ $value->hobbies }}</td>

            <td>
                <form action="{{ route('userinfo.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-primary" href="{{ route('userinfo.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection
