@extends('layouts.admin')

@section('content')
<div class="container">

  
      <table class="table table-striped">
      	<thead>
      		<tr>
      			<th>Name</th>
      			<th>Email</th>
            <th>Joined_at</th>
      		</tr>

      	</thead>
        <tbody>
           @foreach($peoples->all() as $people)
      			 <tr>
      			 	<td>{{$people->regis_name}}</td>
      			 	<td>{{$people->regis_email}}</td>
              <td>{{$people->join_at}}</td>
      			 </tr>
     		   @endforeach
        </tbody>
	</table>

   
</div>
@endsection

