@extends('layouts.admin')

@section('content')
<div class="container">


	   <br><h3>View User</h3><br>
	 
 
     @csrf
      <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" readonly>
      </div>

      <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" readonly>
      </div>

{{--       <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" value="{{$user->password}}" readonly>
      </div> --}}


      <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly>
      </div>

      <div class="form-group">
          <label>Role</label>
          <select class="form-control" name="role" readonly>
          
            <option value="{{$user->role->id}}">{{$user->role->name}}</option>
        
          </select>
      </div>

       <div class="form-group">
          <label>Created At</label>
          <input type="text" class="form-control" name="created_at" value="{{$user->created_at}}" readonly>
      </div>

       <div class="form-group">
          <label>Updated At</label>
          <input type="text" class="form-control" name="updated_at" value="{{$user->updated_at}}" readonly>
      </div>

       <div class="form-group">
          <label>Created By</label>
          <input type="text" class="form-control" name="created_by" value="{{$user->created_by}}" readonly>
      </div>

       <div class="form-group">
          <label>Updated By</label>
          <input type="text" class="form-control" name="updated_by" value="{{$user->updated_by}}" readonly>
      </div>

      <div class="form-group">
         <input class="btn btn-info" value="Back" onclick="goBack()">
      </div>
     

  

  


</div>


<script type="text/javascript">
  function goBack() {
    window.history.back();
}
</script>

</script>
@endsection

