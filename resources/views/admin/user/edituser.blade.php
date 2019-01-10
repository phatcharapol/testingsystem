@extends('layouts.admin')

@section('content')
<div class="container">


	   <br><h3>Edit User</h3><br>
	 
   <form method="post" action="{{route('admin.user.update',$user->id)}}">
     @csrf
     <input name="_method" type="hidden" value="PUT">
      <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" required>
      </div>

      <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" required>
      </div>

     

      <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly>
      </div>

      <div class="form-group">
          <label>Role</label>
          <select class="form-control" name="role_id">
            @foreach($roles as $role_id => $role_name)
            <option value="{{$role_id}}" {{($user->role->id == $role_id) ? "selected" : ""}}>{{$role_name}}</option>
            @endforeach
          </select>
      </div>

      <div class="form-group">
         <input type="submit" class="btn btn-info" value="Update User">
      </div>
     

   </form>


	   @include('include.error')
   
</div>
@endsection

