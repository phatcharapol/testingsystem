@extends('layouts.admin')

@section('content')

<div class="container">
	{{ Breadcrumbs::render('test.subject.show',$testsubject) }}

	<table width="100%">
		<tr>
			<td>
				<div align="left" style="float:left;display: inline;">
					<b style="font-size: 35px">Content List</b>
				</div>
				<div class="col-sm-6" style="padding-top: 10px;">
						<form class="form-inline" method="post" action="{{route('test.content.store')}}">
						     @csrf
						      <input type="hidden" name="subject_id" value="{{$testsubject->id}}">
						      <div class="form-group mx-sm-3">
						          <input type="text" class="form-control" name="name" autocomplete="off" required>
						      </div>

						      <div class="form-group">
						         <input type="submit" class="btn btn-primary" value="Create Content">
						      </div>
						 </form>

						  @include('include.error')
		 	 			{{-- <a class="btn btn-primary" href="{{route('test.subject.create')}}" role="button" >Create Subject</a> --}}
		 	 	</div>
	 	 		{{-- <div align="right" style="padding-top: 15px">
	 	 			<a class="btn btn-primary" href="{{route('test.content.create.id',$testsubject->id)}}" role="button" >Create Content</a>
	 	 		</div> --}}
			
	  		</td>
	 	</tr>
	 </table>
	 <br>
	  <table class="table table-striped">
        <thead>
          <tr>
            <th>Content Name</th>   
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
           @foreach($testcontents->all() as $testcontent)

			 <tr>
			 	<td>{{$testcontent->name}}</td>
			 	<td>{{$testcontent->created_at}}</td>
			 	<td>{{$testcontent->updated_at}}</td>
			 	<td>{{$testcontent->created_by}}</td>
			 	<td>{{$testcontent->updated_by}}</td>
			 	<td><a href="{{route('test.content.show',$testcontent->id)}}" class="btn btn-success">Detail</a></td>
			 	<td><a href="{{route('test.content.edit',$testcontent->id)}}" class="btn btn-info" >Edit</a></td>
			 	<td> 			
			 		<form method="post" action="{{route('test.content.destroy',$testcontent->id)}}">
			 			@csrf
			 			<input type="hidden" name="subject_id" value="{{$testsubject->id}}">
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
          	
          	{{$testcontents->links()}}
        
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

