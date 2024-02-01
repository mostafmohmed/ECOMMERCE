@extends('layouts.admin')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> اللغات </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> اللغات
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جميع لغات الموقع </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form action="{{ route('vendor.search') }}" method="post">
                                        @csrf
                                         <div class="row">
                                            <div class="col-md-10 form-group">
                                                <label for="">Search</label>
                                                <input type="text" name="name" class="form-control" value="{{ isset($request) ? $request->q : '' }}" placeholder="Search product">
                                             </div>
                                             <div class="col-md-2 form-group" style="margin-top:25px;">
                                                <input type="submit" class="btn btn-primary" value="Search">
                                             </div>
                                         </div>
                                    </form>
                                   
                                    @if (request()->has('name'))
                                        <h3 class="panel-heading">{{ $searchResults->count() }} results found for <b style="color:blue">{{ request('q') }}</b></h3>
                                            <div class="pnael-body">
                                                @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                                                <h2>{{ ucfirst($type) }}</h2>
                                                <table
                                                class="table display nowrap table-striped table-bordered ">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Name</th>
                                                        <th>email</th>
                                                        <th>Category-name</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($searchResults as $searchResult)
                                                    <tr>
                                                        <td><a href="{{ $searchResult->url }}">{{ $searchResult->searchable->name }}</td>
                                                            <td><a href="{{ $searchResult->url }}">{{ $searchResult->searchable->email }}</td>
                                                        <td><a href="">{{ $searchResult->searchable->category->name??null }}</a></td>
                                                        {{-- <td>{{ $product->category->name }}</td>  --}}
                                                    </tr>
                                                    @endforeach
        
                                               
                                                    
                                                </tbody>
                                            </table>
                                                {{-- @foreach($searchResults as $searchResult) --}}
                                                    {{-- <ul>
                                                        <li><a href="{{ $searchResult->url }}">{{ $searchResult->searchable->name }}</a></li> --}}
                                                        {{-- <li><a href="">{{ $searchResult->searchable->category->name }}</a></li> --}}
                                                    {{-- </ul> --}}
                                                {{-- @endforeach --}}
                                            @endforeach
                                        </div>
                                    @endif
                                    </div>
                                </div>

                            @if (!request()->has('name'))
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table
                                        class="table display nowrap table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vendor as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->category->name??null }}</td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                         aria-label="Basic example">
                                                        <a href="{{ route('vendor.edite',$item->id)}}"
                                                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
                                                        <button type="button"
                                                                value=""
                                                                onclick=""
                                                                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
                                                                data-toggle="modal"
                                                                data-target="#rotateInUpRight">
                                                            حذف
                                                        </button>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                       
                                            
                                        </tbody>
                                    </table>
                                    {{ $vendor->links() }}
                                    <div class="justify-content-center d-flex">

                                    </div>
                                </div>
                            </div>
@endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection