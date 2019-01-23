@extends('layouts.admin')

@section('content')
<div class="container">

<style type="text/css">
  .box{
    background: #fff;
    padding: 20px;
    min-height: 150px;
    margin-bottom: 15px;
    box-shadow: 0 3px 16px rgba(0,0,0,.1);
    -webkit-transition: all 0.3s ease-in;
    -moz-transition: all 0.3s ease-in;
    -ms-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in;
    width: 30%;
    display: inline-block;
}
</style>

	   <br><h3>Dashboard</h3><br>
     <div class="box">
        <p>{{($cnt_user_admin)}}</p>
        <p>Admin</p>    
     </div>

     <div class="box">
        <p>{{($cnt_user_teacher)}}</p>
        <p>Teacher</p>    
     </div>

     <div class="box">
        <p>{{($cnt_user_student)}}</p>
        <p>Student</p>    
     </div>
     
	  {{-- <table class="table table-striped">
        <thead>
          <tr>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Role Name</th>
            <th>Group Access</th>
          </tr>
        </thead>
        <tbody>
           @foreach($user_admin->all() as $admin)
			 <tr>
			 	<td>{{$admin->firstname}}</td>
			 	<td>{{$admin->lastname}}</td>
			 	<td>{{$admin->email}}</td>
			 	<td>{{$admin->role->name}}</td>
			 	<td>{{$admin->group_access}}</td>
			 </tr>
 		   @endforeach
        </tbody>
      </table>
      <div class="row-center">
          <div class="col-sm-6 col-sm-offset-5">
          	
          	{{$user_admin->appends(['t1' => $user_admin->currentPage()])->links()}}
        
          </div>
      </div> --}}


	 
   
</div>
@endsection

