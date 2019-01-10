@extends('layouts.admin')

@section('content')
<div class="container">


	   <br><h3>Create User</h3><br>
	 
   <form method="post" action="{{route('admin.user.store')}}">
     @csrf
      <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control" name="firstname" required>
      </div>

      <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" name="lastname" required>
      </div>

      <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" required>
      </div>
      
      <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" required>
      </div>

      <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" class="form-control" name="password_confirmation" required>
      </div>

      <div class="form-group">
          <label>Role</label>
          <select class="form-control" name="role_id" required>
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
          </select>
      </div>


  


  {{--     <div class="form-group">
          <label>Access Group</label>
          <select class="form-control" name="role">
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
          </select>
      </div> --}}

      <div class="form-group">
         <input type="submit" class="btn btn-info" value="Create User">
      </div>
     

   </form>

  @include('include.error')

	 
   
</div>
@endsection

