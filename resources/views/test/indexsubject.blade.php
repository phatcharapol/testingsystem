@extends('layouts.admin')

@section('content')
<div class="container">
	{{ Breadcrumbs::render('test.subject.index') }}
	
	<table width="100%">
		<tr>
			<td>
				<div class="row">
					<div class="col-sm-6">
						<b style="font-size: 35px">Test Subject List</b>
					</div>
		 	 		<div class="col-sm-6" style="padding-top: 10px;">
						<form class="form-inline" method="post" action="{{route('test.subject.store')}}">
						     @csrf
						      <div class="form-group mx-sm-3">
						          <input type="text" class="form-control" name="name" autocomplete="off" required>
						      </div>

						      <div class="form-group">
						         <input type="submit" class="btn btn-primary" value="Create Subject">
						      </div>
						 </form>

						  @include('include.error')
		 	 			{{-- <a class="btn btn-primary" href="{{route('test.subject.create')}}" role="button" >Create Subject</a> --}}
		 	 		</div>
	 	 		</div>
	  		</td>
	 	</tr>
	 </table>
	 <br>
	  <table class="table table-striped">
        <thead>
          <tr>
            <th>Subject Name</th>   
            <th>Created At</th>
            <th>Updated At</th>
            <th>Created By</th>
            <th>Updated By</th>
            <th>Detail</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
           @foreach($testsubjects->all() as $testsubject)

			 <tr>
			 	<td>{{$testsubject->name}}</td>
			 	<td>{{$testsubject->created_at}}</td>
			 	<td>{{$testsubject->updated_at}}</td>
			 	<td>{{$testsubject->created_by}}</td>
			 	<td>{{$testsubject->updated_by}}</td>
			 	<td><a href="{{route('test.subject.show',$testsubject->id)}}" class="btn btn-success">Detail</a></td>
			 	<td><a href="{{route('test.subject.edit',$testsubject->id)}}" class="btn btn-info" >Edit</a></td>
			 	<td> 			
			 		<form method="post" action="{{route('test.subject.destroy',$testsubject->id)}}">
			 			@csrf
			 			<input name="_method" type="hidden" value="DELETE">
			 			<input type="submit" class="btn btn-danger delete" value="Delete" onclick ="confirmdelete()">
			 		</form>
			 		
			 	</td>
			 </tr>
 		   @endforeach
        </tbody>

      </table>
      <div class="row-center">
          <div class="col-sm-6 col-sm-offset-5">
          	
          	{{$testsubjects->links()}}
        
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

