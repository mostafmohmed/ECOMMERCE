@extends('frontt.include.site')
@section('body')
<main>
{{-- {{ ;}} --}}
    <!-- Product details Start -->
    <section class="section-container my-5 pt-5 d-md-flex gap-5">
      <div class="single-product__img w-100" id="main-img">
        <img src="assets/images/product-2.webp" alt="">
      </div>
       {{-- @php
             use App\Models\Produect;
      $protect=Produect::find(2) ;
       @endphp --}}
    
      <div class="single-product__details w-100 d-flex flex-column justify-content-between">
        <div>
          <h4>{{$protect->name??null}}</h4>
          <div class="product__author">Frank Zammetti</div>
          <div class="product__author">373 صفحة</div>
          <div class="product__price mb-3 text-center d-flex gap-2">
            <span class="product__price product__price--old fs-6 ">
              450.00 جنيه
            </span>
            <span class="product__price fs-5">
              250.00 جنيه
            </span>
          </div>
          <div class="d-flex w-100 gap-2 mb-3">
            <div class="single-product__quanitity position-relative">
            <form  >   
              <input type="hidden" name="prodect_id" value="{{$protect->id }}" class="pro_id">
              {{-- <input type="number" id="tentacles" name="tentacles" min="10" max="100" /> --}}
              <meta name="csrf-token" content="{{ csrf_token() }}" />
              <input type="number"  name="id" class="quantity" name="prodect_qty" min="1" max="5">
              {{-- <input  type="number"  id="quantity" name="quantity"    min="1" max="5" > --}}
              {{-- <input type="hidden" name="{{$protect->id}}"> --}}
              <button class="single-product__increase border-0 bg-transparent position-absolute end-0 h-100 px-3">+</button>
              
              <button class="single-product__decrease border-0 bg-transparent position-absolute start-0 h-100 px-3">-</button>
            </div>
            {{-- {{route('front.cart',$protect->id)}} --}}
            <a type="submit" href="" class="add_pro primary-button w-100">اضافه الي السلة</a>
            <a type="submit" href="" class="add_fev primary-button w-100" >     اضافة المفضلة  </a>
          </div>
          <div class="single-product__favourite d-flex align-items-center gap-2 mb-4">
            <i class="fa-regular fa-heart"></i>
            {{-- <input class="single-product__input text-center px-3" type="submit" value="اضافة للمفضلة" > --}}
          </form>
           
          </div>
        </div>
        <div class="single-product__categories">
          <p class="mb-0">رمز المنتج: غير محدد</p>
          <div>
            <span>التصنيفات: </span><a href="shop.html">new</a>, <a href="shop.html">احذية</a>, <a href="shop.html">رجاليه</a>
          </div>
          <div>
            <span>الوسوم: </span><a href="shop.html">pr150</a>, <a href="shop.html">flotrate</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Product details End -->

    <!-- Description and questions Start -->
    <section class="section-container">
      <nav class="mb-0 ">
        <div class="nav nav-tabs single-product__nav pb-0 gap-2" id="nav-tab" role="tablist">
          <button class="single-product__tab nav-link active" id="single-product__describtion-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
            الوصف
          </button>
          <button class="single-product__tab nav-link" id="single-product__questions-tab" data-bs-toggle="tab" data-bs-target="#single-product__questions" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
            الاسئلة الشائعة
          </button>
        </div>
      </nav>
      <div class="tab-content pt-4" id="nav-tabContent">
        <div class="tab-pane show active" id="nav-description" role="tabpanel" aria-labelledby="single-product__describtion-tab" tabindex="0">
          Modern Full-Stack Development 
        </div>
        <div class="questions tab-pane" id="single-product__questions" role="tabpanel" aria-labelledby="single-product__questions-tab" tabindex="0">
          <div class="questions__list accordion" id="question__list">
            <div class="questions__item accordion-item">
              <h2 class="questions__header accordion-header" id="question1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  الشحن بيوصل خلال قد ايه؟
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="question1" data-bs-parent="#question__list">
                <div class="accordion-body">
                  خلال 3 ايام داخل القاهرة والجيزة و7 ايام خارج القاهرة والجيزة.
                </div>
              </div>
            </div>
            <div class="questions__item accordion-item">
              <h2 class="questions__header accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  خامات التصنيع؟
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#question__list">
                <div class="accordion-body">
                  خامات مصرية عالية الجودة.
                </div>
              </div>
            </div>
            <div class="questions__item accordion-item">
              <h2 class="questions__header accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  متاح استبدال او استرجاع المنتج
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#question__list">
                <div class="accordion-body">
                  نعم، متاح الاستبدال والاسترجاع خلال 7 ايام، برجاء مراجعة <a class="text-danger" href="refund-policy.html">سياسة الاسترجاع والاستبدال</a>.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Description and questions End -->

    <!-- Features Start -->
    <section class="section-container py-5">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="features__item d-flex align-items-center gap-2">
            <div class="features__img">
              <img class="w-100" src="assets/images/feature-1.png" alt="">
            </div>
            <div>
              <h6 class="features__item-title m-0">شحن سريع</h6>
              <p class="features__item-text m-0">سعر شحن موحد لجميع المحافظات ويصلك في أقل من 72 ساعة</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="features__item d-flex align-items-center gap-2">
            <div class="features__img">
              <img class="w-100" src="assets/images/feature-2.png" alt="">
            </div>
            <div>
              <h6 class="features__item-title m-0">ضمان الجودة</h6>
              <p class="features__item-text m-0">خامات عالية الجودة ومرونه فى طلبات الاستبدال والاسترجاع</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="features__item d-flex align-items-center gap-2">
            <div class="features__img">
              <img class="w-100" src="assets/images/feature-3.png" alt="">
            </div>
            <div>
              <h6 class="features__item-title m-0">دعم فني</h6>
              <p class="features__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="features__item d-flex align-items-center gap-2">
            <div class="features__img">
              <img class="w-100" src="assets/images/feature-4.png" alt="">
            </div>
            <div>
              <h6 class="features__item-title m-0">استبدال سهل</h6>
              <p class="features__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features End -->

    <!-- May love Start -->
    <section class="section-container">
      <div class="d-flex gap-4 align-items-center w-100 mb-4">
        <h5 class="m-0">قد يعجبك ايضا...</h5>
        <hr class="flex-grow-1">
      </div>
      <div class="row">
        <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
          <div class="product__header mb-3">
            <a href="single-product.html">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="assets/images/product-1.webp" data-id="white">
              </div>
            </a>
            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
              وفر 10%
            </div>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="single-product.html">
              Flutter Apprentice
            </a>
          </div>
          <div class="product__author text-center">
            Mike Katz
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <span class="product__price product__price--old">
              550.00 جنيه
            </span>
            <span class="product__price">
              350.00 جنيه
            </span>
          </div>
        </div>
      </div>
    </section>
    <!-- May love End -->

    <!-- Related products Start -->
    <section class="section-container">
      <div class="d-flex gap-4 align-items-center w-100 mb-4">
        <h5 class="m-0">منتجات ذات صلة</h5>
        <hr class="flex-grow-1">
      </div>
      <div class="row">
        <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
          <div class="product__header mb-3">
            <a href="single-product.html">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="assets/images/product-1.webp" data-id="white">
              </div>
            </a>
            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
              وفر 10%
            </div>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="single-product.html">
              Flutter Apprentice
            </a>
          </div>
          <div class="product__author text-center">
            Mike Katz
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <span class="product__price product__price--old">
              550.00 جنيه
            </span>
            <span class="product__price">
              350.00 جنيه
            </span>
          </div>
        </div>
        <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
          <div class="product__header mb-3">
            <a href="single-product.html">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="assets/images/product-2.webp" data-id="white">
              </div>
            </a>
            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
              وفر 10%
            </div>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="single-product.html">
              Modern Full-Stack Development
            </a>
          </div>
          <div class="product__author text-center">
            Frank Zammetti
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <span class="product__price product__price--old">
              450.00 جنيه
            </span>
            <span class="product__price">
              250.00 جنيه
            </span>
          </div>
        </div>
        <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
          <div class="product__header mb-3">
            <a href="single-product.html">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="assets/images/product-3.webp" data-id="white">
              </div>
            </a>
            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
              وفر 10%
            </div>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="single-product.html">
              C# 10 in a Nutshell
            </a>
          </div>
          <div class="product__author text-center">
            Joseph Albahari
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <span class="product__price product__price--old">
              650.00 جنيه
            </span>
            <span class="product__price">
              450.00 جنيه
            </span>
          </div>
        </div>
        <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
          <div class="product__header mb-3">
            <a href="single-product.html">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="assets/images/product-4.webp" data-id="white">
              </div>
            </a>
            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
              وفر 10%
            </div>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="single-product.html">
              Algorithms عربي
            </a>
          </div>
          <div class="product__author text-center">
            Aditya Y. Bhargava
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <span class="product__price product__price--old">
              359.00 جنيه
            </span>
            <span class="product__price">
              249.00 جنيه
            </span>
          </div>
        </div>
      </div>
    </section>
    <!-- Related products End -->

    <!-- Users comments Start -->
    <section class="section-container comments mb-5">
      <div class="d-flex gap-4 align-items-center w-100 mb-4">
        <h5 class="m-0">أعرف اراء عملاؤنا</h5>
        <hr class="flex-grow-1">
      </div>
      <div class="comments__slider owl-carousel owl-theme">
        <div class="comments__item">
          <div class="comments__icon">
            <img class="w-100" src="assets/images/quote.png" alt="">
          </div>
          <div class="comments__text mb-3">
            الكتاب جميل جدا
          </div>
          <div class="comments__author d-flex align-items-center gap-2">
            <div class="comments__author-dash"></div>
            <div class="comments__author-name fw-bolder">
              Moamen Sherif
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Users comments End -->
  </main>
 
    
  
  @endsection
  @section('scirpt')
  <script>
    
    $(document).on('click', '.add_fev', function (e) {
    e.preventDefault();
    var id =  $(".pro_id").val();
   

   
   


    $.ajax({
          type: 'POST',
          // enctype: 'multipart/form-data',
          url: "{{ route('front.fav') }}",
          data: {
            "prodect_id":id,
            

          },
        
          // processData: false,
          // contentType: false,
          // cache: false,
          success: function (response) {
            alert(response.status);
           
          }, error: function () {
              // var response = $.parseJSON(reject.responseText);
              // $.each(response.errors, function (key, val) {
              //     $("#" + key + "_error").text(val[0]);
              // });
          }
      });

}
)
  $(document).on('click', '.add_pro', function (e) {
    e.preventDefault();
    var id =  $(".pro_id").val();
    var prodect_qty =  $(".quantity").val();

   
   


    $.ajax({
          type: 'POST',
          // enctype: 'multipart/form-data',
          url: "{{ route('front.cart') }}",
          data: {
            "prodect_id":id,
            "prodect_qty":prodect_qty,

          },
        
          // processData: false,
          // contentType: false,
          // cache: false,
          success: function (response) {
            alert(response.status);
           
          }, error: function () {
              // var response = $.parseJSON(reject.responseText);
              // $.each(response.errors, function (key, val) {
              //     $("#" + key + "_error").text(val[0]);
              // });
          }
      });

}
)
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
  @endsection