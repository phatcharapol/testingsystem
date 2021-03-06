@extends('layouts.admin')

@section('content')
<div class="container">
      {{ Breadcrumbs::render('admin.subject.edit',$testsubject) }}
	
     <h3>Edit Subject</h3><br>
	 
   <form method="post" action="{{route('admin.subject.update',$testsubject->id)}}">
     @csrf
     <input name="_method" type="hidden" value="PUT">
      <div class="form-group">
          <label>Subject Name</label>
          <input type="text" class="form-control" name="name" value="{{$testsubject->name}}" required>
      </div>

      <div class="form-group">
         <input type="submit" class="btn btn-info" value="Update Subject">
      </div>
     

   </form>


	   @include('include.error')
   
</div>
@endsection

