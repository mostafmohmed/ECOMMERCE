@extends('frontt.include.site')
@section('body')

{{-- <table class="table  centre ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table> --}}
  <main>
    <div id="pricing" class="container-fluid">
       
        <table class="table table-bordered table-striped">
        <thead>
            <tr>
        <th>proudect name</th>
        <th>Delet</th>
        <th>image</th>
        <th>remove</th>

        </tr>
        </thead>
        <tbody style="">
            @php
            $totalprice=0;
        @endphp
            @foreach ($cart as $item)
            <tr>
                
                <td>{{$item->protect->name??null}}</td>
                <td>{{$item->price}}</td>
                <td>
                    {{-- {{$item->qua}} --}}
                  
                        
                 
                    @if ($item->protect->qua >$item->qua)
                        
                    
                    
                    <input type="number" id="quantity" value="{{$item->qua}}" name="quantity" min="1" max="100"> 
                    @php
                    $totalprice+=$item->protect->price*$item->qua;   
                   @endphp
                    @else
                    <h1>dddd</h1>
                    @endif
                    
                 </td>
                <td>
                   
                        
                        <meta name="csrf-token" content="{{ csrf_token() }}">

    

<button class="deleteRecord" data-id="{{$item->id}}" >Delete Record</button>
                        
                        {{-- <input type="hidden"  value="{{$item->id}}" class="deletc" >
                        <button  type="submit" value="{{$item->price}}" class="deletcart btn btn-danger  btn-sm">Delete</button> --}}
                    
                    </td>
                </tr>
               
                     
                     {{-- @else
                     <h1>
                        over vlow
                     </h1> --}}
                    

                
            @endforeach
           
        </tbody>
        <tfoot>
           <tr>
            TOTAL PRICE {{$totalprice }}
           </tr>
           <tr>
            <a href="{{route('front.checkplcher')}}">chek</a>
           </tr>
      
          </tfoot>
        </table>
        <div>
    

  </main>
  

    
@endsection
@section('scirpt')
<script>
    $(".deleteRecord").click(function(){

var id = $(this).data("id");

var token = $("meta[name='csrf-token']").attr("content");



$.ajax(

{

    url: "cartdelet/"+id,

    type: 'DELETE',

    data: {

        "id": id,

        "_token": token,

    },

    success: function (){

        console.log("it Works");

    }

});



});

// $(document).on('click', '.deletcart', function (e) {
//     e.preventDefault();
  
//             var cart_id = $(".deletc").val();
            
//            $.ajax({
//                 type: "get",
//                 url: "",
                
//                 data:{
//                     "curd_id":cart_id,
//                 }
//                 success: function (response) {
//                     // console.log(response);
                  
//                 }
//             });
//         });
      
</script>
@endsection