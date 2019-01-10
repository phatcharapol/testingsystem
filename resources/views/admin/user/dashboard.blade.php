@extends('layouts.admin')

@section('content')
<div class="container">


	   <br><h3>Dashboard</h3><br>
	  <table class="table table-striped">
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
      </div>


	 
   
</div>
@endsection

