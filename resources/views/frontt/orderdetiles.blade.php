@extends('frontt.include.site')
@section('body')
<main>
  <div class="row" >
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach( $oreder->orderitem as $item  )
          <tr>
            <th scope="row">1</th>
            <td> {{ $item->protect->name  }} </td>
            <td> {{ $item->protect->price  }} </td>
            <td>  <img src="{{asset('asset/'.$item->protect->image  )}}" alt=""> </td>
          </tr>
       @endforeach
        </tbody>
      </table>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">phone</th>
            <th scope="col">email</th>
            <th scope="col">total_price</th>
          </tr>
        </thead>
        <tbody>
           
          <tr>
            <th scope="row">1</th>
            <td> {{ $oreder->firstname  }} </td>
            <td> {{ $oreder->lastname  }} </td>
            <td> {{ $oreder->phone  }} </td>
            <td> {{ $oreder->email  }} </td>
            <td> {{ $oreder->total_price  }} </td>
          </tr>
      
        </tbody>
      </table>
    </div>
  </main>

@endsection