@extends('frontt.include.site')
@section('body')
<main>
    <section class="page-top d-flex justify-content-center align-items-center flex-column text-center ">
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>حسابي</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="index.html">الرئيسية</a> /
          <span class="text-gray">حسابي</span>
        </div>
      </div>
    </section>

    <section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
      <div class="profile__right">
        <div class="profile__user mb-3 d-flex gap-3 align-items-center">
          <div class="profile__user-img rounded-circle overflow-hidden">
            <img class="w-100" src="assets/images/user.png" alt="">
          </div>
          <div class="profile__user-name">moamenyt</div>
        </div>
        <ul class="profile__tabs list-unstyled ps-3">
          <li class="profile__tab">
            <a class="py-2 px-3 text-black text-decoration-none" href="profile.html">لوحة التحكم</a>
          </li>
          <li class="profile__tab active">
            <a class="py-2 px-3 text-black text-decoration-none" href="orders.html">الطلبات</a>
          </li>
          <li class="profile__tab">
            <a class="py-2 px-3 text-black text-decoration-none" href="account_details.html">تفاصيل الحساب</a>
          </li>
          <li class="profile__tab">
            <a class="py-2 px-3 text-black text-decoration-none" href="favourites.html">المفضلة</a>
          </li>
          <li class="profile__tab">
            <a class="py-2 px-3 text-black text-decoration-none" href="">تسجيل الخروج</a>
          </li>
        </ul>
      </div>
      <div class="profile__left mt-4 mt-md-0 w-100">
        <div class="profile__tab-content orders active">
          <div class="orders__none d-flex justify-content-between align-items-center py-3 px-4">
            <p class="m-0">لم يتم تنفيذ اي طلب بعد.</p>
            <button class="primary-button">تصفح المنتجات</button>
          </div>

          <table class="orders__table w-100">
            <thead>
              <th class="d-none d-md-table-cell">tacket_munber</th>
              <th class="d-none d-md-table-cell">total_price</th>
              <th class="d-none d-md-table-cell">status</th>
              <th class="d-none d-md-table-cell">hestory</th>
              <th class="d-none d-md-table-cell">اجراءات</th>
            </thead>
            <tbody>
                @foreach ($oreder as $item)
                <tr class="order__item">
                    <td class="d-flex justify-content-between d-md-table-cell">
                      
                      <div><a href=""> {{$item->pincode}}</a></div>
                    </td>
                    <td class="d-flex justify-content-between d-md-table-cell">
                     
                      <div>{{$item->total_price}}</div>
                    </td>
                    <td class="d-flex justify-content-between d-md-table-cell">
                      <
                      <div>{{$item->status=='0'?'panding':'completed' }}</div>
                    </td>
                    <td class="d-flex justify-content-between d-md-table-cell">
                      
                      <div>{{$item->created_at }}</div>
                    </td>
                    <td class="d-flex justify-content-between d-md-table-cell">
                     
                      <div><a class="primary-button" href="{{  route('front.view',$item->id)  }}">عرض</a></div>
                    </td>
                  </tr>
                @endforeach
            
              {{-- <tr class="order__item">
                <td class="d-flex justify-content-between d-md-table-cell">
                  <div class="d-md-none">الطلب:</div>
                  <div><a href="">#79574</a></div>
                </td>
                <td class="d-flex justify-content-between d-md-table-cell">
                  <div class="d-md-none">التاريخ:</div>
                  <div>يوليو 25, 2023</div>
                </td>
                <td class="d-flex justify-content-between d-md-table-cell">
                  <div class="d-md-none">الحالة:</div>
                  <div>قيد التنفيذ</div>
                </td>
                <td class="d-flex justify-content-between d-md-table-cell">
                  <div class="d-md-none">الاجمالي:</div>
                  <div>239.0 جنيه لعنصر واحد</div>
                </td>
                <td class="d-flex justify-content-between d-md-table-cell">
                  <div class="d-md-none">اجراءات:</div>
                  <div><a class="primary-button" href="">عرض</a></div>
                </td>
              </tr> --}}
            </tbody>
          </table>
        </div>
        <!-- <section class="section-container">
          <p>تم تقديم الطلب #79917 في يوليو 26, 2023 وهو الآن بحالة قيد التنفيذ.</p>
    
          <section>
            <h2>تفاصيل الطلب</h2>
            <table class="success__table w-100 mb-5">
              <thead>
                <tr class="border-0 bg-main text-white">
                  <th>المنتج</th>
                  <th class="d-none d-md-table-cell">الإجمالي</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div>
                      <a href="">كوتش فلات ديزارت -رجالى - الابيض, 42</a> x 1
                    </div>
                    <div>
                      <span class="fw-bold">اللون:</span>
                      <span>لابيض</span>
                    </div>
                    <div>
                      <span class="fw-bold">المقاس:</span>
                      <span>42</span>
                    </div>
                  </td>
                  <td>
                    200.00 جنيه
                  </td>
                </tr>
                <tr>
                  <td>
                    <div>
                      <a href="">كوتش كاجوال -رجالى - بنى, 43</a> x 1
                    </div>
                    <div>
                      <span class="fw-bold">اللون:</span>
                      <span>بني</span>
                    </div>
                    <div>
                      <span class="fw-bold">المقاس:</span>
                      <span>43</span>
                    </div>
                  </td>
                  <td>
                    150.00 جنيه
                  </td>
                </tr>
                <tr>
                  <th>المجموع:</th>
                  <td class="fw-bolder">350.00 جنيه</td>
                </tr>
                <tr>
                  <th>الشحن:</th>
                  <td class="d-flex gap-2 align-items-center"><span class="fw-bolder">39.00 جنيه </span><p class="fa-xs m-0">بواسطة موف ات القاهرة والجيزة</p></td>
                </tr>
                <tr>
                  <th>وسيلة الدفع:</th>
                  <td class="fw-bold">الدفع نقدًا عند الاستلام</td>
                </tr>
                <tr>
                  <th>الإجمالي:</th>
                  <td class="fw-bold">389.00 جنيه </td>
                </tr>
              </tbody>
            </table>
          </section>
          <section class="mb-5">
            <h2>عنوان الفاتورة</h2>
            <div class="border p-3 rounded-3">
              <p class="mb-1">محمد محسن</p>
              <p class="mb-1">43 الاتحاد</p>
              <p class="mb-1">القاهرة</p>
              <p class="mb-1">01020288964</p>
              <p class="mb-1">moamenyt@gmail.com</p>
            </div>
          </section>
        </section> -->
      </div>
    </section>
  </main>

@endsection