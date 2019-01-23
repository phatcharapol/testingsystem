@extends('layouts.admin')

@section('content')
<div class="container">

      {{ Breadcrumbs::render('test.content.edit',$testsubject,$testcontent) }}
      
	   <h3>Edit Content</h3><br>
	 
   <form method="post" action="{{route('test.content.update',$testcontent->id)}}">
     @csrf
     <input name="_method" type="hidden" value="PUT">
        <input type="hidden" name="subject_id" value="{{$testsubject->id}}">
      <div class="form-group">
          <label>Content Name</label>
          <input type="text" class="form-control" name="name" value="{{$testcontent->name}}" required>
      </div>

      <div class="form-group">
         <input type="submit" class="btn btn-info" value="Save">
      </div>
     

   </form>


	   @include('include.error')
   
</div>
@endsection

