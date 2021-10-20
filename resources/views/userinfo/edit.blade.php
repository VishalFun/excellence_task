@extends('userinfo.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit userinfo</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('userinfo.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('userinfo.update',$userinfo->id) }}" method="POST">
    @csrf
        @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" required class="form-control" placeholder="Enter First Name" value="{{ $userinfo->first_name }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" required class="form-control" placeholder="Enter Last Name" value="{{ $userinfo->last_name }}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" required class="form-control" required placeholder="Enter Email" value="{{ $userinfo->email }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DOB:</strong>
                <input type="date" name="dob" required class="form-control" value="{{ $userinfo->dob }}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact:</strong>
                <input type="text" name="contact" class="form-control" placeholder="Enter Contact Number" value="{{ $userinfo->contact }}" required>
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Designation:</strong>
                <input type="text" name="designation" class="form-control" placeholder="Enter Designation Number" value="{{ $userinfo->designation }}" required>
            </div>
        </div>
<!-- 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Enter Description"></textarea>
            </div>
        </div> -->



        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Gender</strong>
            <div class="form-group">
               
                <input type="radio" id="radio1" value="male" name="gender"
                @if($userinfo->gender=="male")
                {{"checked"}} 
                @endif
                >
                <label for="radio1">Male</label>
               
                
                <input 
                
                @if($userinfo->gender=="female")
                {{"checked"}} 
                @endif
                
                style="margin-left:10px;" type="radio" id="radio2" value="female" name="gender">
                <label for="radio2">Female</label>    
        
            </div>

        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Hobbies</strong>
            <div class="form-group">
               
                <input type="radio" id="radio1" value="Cricket" name="hobbies" 
                @if($userinfo->hobbies=="Cricket")
                {{ 'checked' }}
                @endif

                >
                <label for="radio1">Cricket</label>
               
                
                <input style="margin-left:10px;" type="radio" id="radio2" value="Football" 
                @if($userinfo->hobbies=="Football")
                {{ 'checked' }}
                @endif
                name="hobbies">
                <label for="radio2">Football</label>    

                <input style="margin-left:10px;" type="radio" id="radio3" value="Vollyball"
                
                @if($userinfo->hobbies=="Vollyball")
                {{ 'checked' }}
                @endif

                name="hobbies">
                <label for="radio3">Vollyball</label>    

                <input style="margin-left:10px;" type="radio" id="radio4" value="Badminton"
                

                @if($userinfo->hobbies=="Badminton")
                {{ 'checked' }}
                @endif
                
                name="hobbies">
                <label for="radio4">Badminton</label>    
        
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
