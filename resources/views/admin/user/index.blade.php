@extends('layouts.admin')

@section('content')
<div class="container">
	<br>
	<table width="100%">
		<tr>
			<td>
				<div align="left" style="float:left;display: inline;">
					<b style="font-size: 35px">User List</b>
				</div>
	 	 		<div align="right" style="padding-top: 15px">
	 	 			<a class="btn btn-primary" href="{{route('admin.user.create')}}" role="button" >Create User</a>
	 	 		</div>
	  		</td>
	 	</tr>
	 </table>
	 <br>
	  <table class="table table-striped">
        <thead>
          <tr>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Role Name</th>
            <th>Group Access</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
           @foreach($users->all() as $user)
			 <tr>
			 	<td><a href="{{route('admin.user.show',$user->id)}}" >{{$user->firstname}}</a></td>
			 	<td>{{$user->lastname}}</td>
			 	<td>{{$user->email}}</td>
			 	<td>{{$user->role->name}}</td>
			 	<td>{{$user->group_access}}</td>
			 	<td>{{$user->created_at}}</td>
			 	<td>{{$user->updated_at}}</td>
			 	<td><a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-info" >Edit</a></td>
			 	<td> 			
			 		<form method="post" action="{{route('admin.user.destroy',$user->id)}}">
			 			@csrf
			 			<input name="_method" type="hidden" value="DELETE">
			 			<input type="submit" class="btn btn-danger delete" value="Delete" onclick ="confirmdelete()">
			 		</form>
			 		{{--  {!! Form::open(['method'=>'delete','action' => ['AdminController@destroy', $user->id]]) !!}
                    <div class="form-group">
                         {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'confirmdelete()']) !!}
                    </div>
            		{!! Form::close() !!} --}}
			 	</td>
			 </tr>
 		   @endforeach
        </tbody>
      </table>
      <div class="row-center">
          <div class="col-sm-6 col-sm-offset-5">
          	
          	{{$users->links()}}
        
          </div>
      </div>
	  
</div>
<script type="text/javascript">
	function confirmdelete(){

        if (!confirm('Are you sure?')) {
        	event.preventDefault()
        }
	}
	
</script>

@endsection

