@extends('layouts.admin')

@section('content')
<div class="container">

<br><h3>Dashboard</h3><br>

<br><h5>Teaching..</h5><br>
      <table class="table table-striped">
      	<thead>
      		<tr>
            <th>Subject Code</th>
      			<th>Subject</th>
      			<th>Student</th>
            
      		</tr>

      	</thead>
        <tbody>
           @foreach($subject_std as $subjectcode => $list_std)
           <?php $subjectcode=explode('-',$subjectcode)?>
    			 <tr>
    			 	<td>{{$subjectcode[1]}}</td>
            @foreach($list_std as $subject => $cnt_std)
            <td><a href="{{route('test.subject.show',$subjectcode[0])}}">{{$subject}}</a></td>
    			 	<td><a href="{{route('show.people',$subjectcode[1])}}">{{$cnt_std}}</a></td>
    			 </tr>
            @endforeach
     		   @endforeach
        </tbody>
    
    
	</table>

   
</div>
@endsection

