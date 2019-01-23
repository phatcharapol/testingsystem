@extends('layouts.admin')

@section('content')
<div class="container">

    {{ Breadcrumbs::render('test.question.create',$testsubject,$testcontent) }}
	   <br><h3>Create Question</h3><br>
    
    <input type="text" id="member" name="member" value="" required>Number of Question: (max. 20)
<a href="#" class='btn btn-primary' onclick="addQuestion()">Make</a>


    <table class="table" width="100%">
        <form  method="POST" action="{{route('test.question.store')}}">
        @csrf
                  <input type="hidden" name="subject_id" value="{{$testsubject->id}}" >
                  <input type="hidden" name="content_id" value="{{$testcontent->id}}" >
            
          <div class="form-group">
          
              <thead>
                <tr>
                   <th>Q:</th>
                   <th><input type="text" name="question_title" size="50" required></th>  
                   <th></th> 
              </tr>
              </thead>
                  <tbody>
                    @for($i=1;$i<=4;$i++)
                 <tr>
                  <input type="hidden" name="C{{$i}}" value="{{$i}}" >
                  <td width="3%">{{$i.") "}}</td>
                  <td>
                    <input type="radio" name="ChoiceCorrect" value={{$i}}  required > 
                    <input type="text" name="ChoiceDetail{{$i}}" size="40" required>
                  </td>
                </tr>
                    @endfor 
                      <tr> 
                        <td></td>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" value="Create Question"></td>
                      </tr> 
                   </tbody> 
             
                </div>
                  
            </form>
             
      </table>

  @include('include.error')

	 
   
</div>
@endsection

<script type="text/javascript">
  // function CheckColor(){
  //   var checked=document.getElementsByName('ChoiceCorrect').checked ;
  //   var td=document.getElementsByTagName('td') ;
  //   for(i=0;i<td.length;i++){
  //       if(checked)
  //       td[i].style.backgroundColor = "red";
  //   }

  // }


  function addQuestion(){
           
            var number = document.getElementById("member").value;
            var container = document.getElementsByClassName("form-group")[0];
               
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (n=1;n<=number;n++){


                var thead = document.createElement("thead");
                var tr = document.createElement("tr");
                var th = document.createElement("th"); 

              var text = document.createTextNode("Q"+n+" : ");
                th.appendChild(text);
                tr.appendChild(th);
              
                var th = document.createElement("th"); 
               
              var i = document.createElement("input"); //input element, text
                  i.setAttribute('type',"text");
                  i.setAttribute('name',"question_title");
                  i.setAttribute('size',"50");
                  i.setAttribute('required',"");
                th.appendChild(i);
                tr.appendChild(th);
                thead.appendChild(tr);

               


                container.appendChild(thead);
          
                var tBody=document.createElement("tbody");

                for (var j = 1; j <=4 ; j++) {

                  var tr = document.createElement("tr"); 
                  var i = document.createElement("input"); //input element, text
                      i.setAttribute('type',"hidden");
                      i.setAttribute('name',"C"+j);     
                      i.setAttribute('value',j);    
                  tBody.appendChild(i);
              
                  var tr = document.createElement("tr"); 
                  var td = document.createElement("td");  
           
          
                  td.appendChild(document.createTextNode(j+" ) "));
                  tr.appendChild(td);
                  tBody.appendChild(tr);
     

                  var td = document.createElement("td");
                  var i = document.createElement("input"); //input element, text
                      i.setAttribute('type',"radio");
                      i.setAttribute('name',"ChoiceCorrect");     
                      i.setAttribute('required',"");    
                  td.appendChild(i);
                  var i = document.createElement("input"); //input element, text
                      i.setAttribute('type',"text");
                      i.setAttribute('name',"ChoiceDetail"+j);
                      i.setAttribute('size',"40");
                      i.setAttribute('required',"");
                  td.appendChild(i);
                  tr.appendChild(td);
                  tBody.appendChild(tr);
             
                  container.appendChild(tBody);
                }
               
            }
            var tr = document.createElement("tr");
            var td = document.createElement("td");
            var i = document.createElement("input"); //input element, Submit button
            i.setAttribute('type',"submit");
            i.setAttribute('class',"btn btn-primary");
            i.setAttribute('value',"Create Question");
            td.appendChild(i)
            tr.appendChild(td);
            tBody.appendChild(tr);
            container.appendChild(tBody);
          


        }


</script>

