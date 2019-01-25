@extends('layouts.admin')

@section('content')
<div class="container">
      {{ Breadcrumbs::render('test.subject.edit',$testsubject) }}
	
     <h3>Edit Subject</h3><br>
	 
   <form method="post" action="{{route('test.subject.update',$testsubject->id)}}">
     @csrf
     <input name="_method" type="hidden" value="PUT">
      <div class="form-group">
          <label>Subject Name</label>
          <input type="text" class="form-control" name="name" autocomplete="off" value="{{$testsubject->name}}" required>
      </div>

      <div class="form-group">
         <input type="submit" class="btn btn-info" value="Save">
      </div>
     

   </form>


	   @include('include.error')
   
</div>
@endsection

