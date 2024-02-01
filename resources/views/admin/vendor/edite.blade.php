@extends('layouts.admin')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href=""> أللغات </a>
                            </li>
                            <li class="breadcrumb-item active">إضافة لغة
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> إضافة لغة </h4>
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
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('vendor.update',$vendor->id)}}" method="POST"
                                          enctype="multipart/form-data">
                                        
                                          @csrf
                                        @method('put')
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات الجمعية </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم التاجر </label>
                                                        <input type="text" value="{{ old('name') }}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اسم اللغة  "
                                                               name="name">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>

                                               

                                            <div class="row">

                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> العنوان </label>
                                                        <input type="text" value="{{ old('adress') }}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل العنوان     "
                                                               name="adress">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> العنوان </label>
                                                        <input type="text" value="{{ old('email') }}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل العنوان     "
                                                               name="email">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox"  value="{{ old('active') }}" name="active"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"
                                                               checked/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">الحالة </label>
                                                    </div>
                                                {{-- </div> --}}
                                                @error('active')
                                                    {{ $message

                                                    }}
                                                @enderror --}}
                                            </div> 

                                            

                                        
                                        </div>


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection