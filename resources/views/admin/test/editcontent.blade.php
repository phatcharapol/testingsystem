@extends('layouts.admin')

@section('content')
<div class="container">

      {{ Breadcrumbs::render('admin.content.edit',$testsubject,$testcontent) }}
      
	   <h3>Edit Content</h3><br>
	 
   <form method="post" action="{{route('admin.content.update',$testcontent->id)}}">
     @csrf
     <input name="_method" type="hidden" value="PUT">
      <div class="form-group">
          <label>Content Name</label>
          <input type="text" class="form-control" name="name" value="{{$testcontent->name}}" required>
      </div>

      <div class="form-group">
         <input type="submit" class="btn btn-info" value="Update Content">
      </div>
     

   </form>


	   @include('include.error')
   
</div>
@endsection

