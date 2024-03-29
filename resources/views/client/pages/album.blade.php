@extends('layouts.layout-client')

@section('page-title', 'Trang chủ | Miss Care')
@section('main')

<main class="body__album">
  <div class="album__header">
    <div class="album__title">
      <h3>#MISSCARE</h3>
    </div>
    <div class="album__text">
      Chia sẻ các mặt hàng yêu thích của bạn với Miss Care trên Instagram hoặc TikTok để nhận khoản tín dụng $ 5 cho lần mua hàng tiếp theo của bạn và có cơ hội được giới thiệu trên thư viện của chúng tôi!
    </div>
  </div>
  <div class="album__infor">
    <ul class="soc-rewards">
      <li id="one" class="album__soc">
        <span class="step-icon">
          <i class="fa fa-camera" aria-hidden="true"></i>
        </span>
        <span class="step-name">
          <p>1. Chụp ảnh hoặc quay video giới thiệu trang phục Miss Care của bạn</p>
        </span>
      </li>
      <li id="two" class="album__soc">
        <span class="step-icon">
          <i class="fa fa-share" aria-hidden="true"></i>
        </span>
        <span class="step-name">
          <p>2. Thep dõi @MissCare và gắn thẻ @MissCare trên bài đăng của bạn</p>
        </span>
      </li>
      <li id="three" class="album__soc">
        <span class="step-icon">
          <i class="fa fa-hashtag" aria-hidden="true"></i>
        </span>
        <span class="step-name">
          <p>3. Đề cập đến #Miss Care và số đơn đặt hàng của bạn trong chú thích</p>
        </span>
      </li>
      <li id="four" class="album__soc">
        <span class="step-icon">
          <i class="fa fa-usd" aria-hidden="true"></i>
        </span>
        <span class="step-name">
          <p>4. Nhận khoản tín dụng $ 5 cho lần mua hàng tiếp theo của bạn!</p>
        </span>
      </li>
    </ul>
  </div>
  <section id="ruby-photogallery">

    <div id="lightgallery">

      <a href="{{asset('assets/images/album/')}}/1-1.jpg"><img src="{{asset('assets/images/album/')}}/1-1.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/1-2.jpg"><img src="{{asset('assets/images/album/')}}/1-2.jpg" /></a>
      
      <a href="{{asset('assets/images/album/')}}/1-3.jpg"><img src="{{asset('assets/images/album/')}}/1-3.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/1-4.jpg"><img src="{{asset('assets/images/album/')}}/1-4.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/1-5.jpg"><img src="{{asset('assets/images/album/')}}/1-5.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/1-6.jpg"><img src="{{asset('assets/images/album/')}}/1-6.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/1-7.jpg"><img src="{{asset('assets/images/album/')}}/1-7.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/1-8.jpg"><img src="{{asset('assets/images/album/')}}/1-8.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/1-2.jpg"><img src="{{asset('assets/images/album/')}}/1-2.jpg" /></a>
      
      <a href="{{asset('assets/images/album/')}}/1-3.jpg"><img src="{{asset('assets/images/album/')}}/1-3.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/1-4.jpg"><img src="{{asset('assets/images/album/')}}/1-4.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/13.jpg"><img src="{{asset('assets/images/album/')}}/13.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/14.jpg"><img src="{{asset('assets/images/album/')}}/14.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/16.jpg"><img src="{{asset('assets/images/album/')}}/16.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/17.jpg"><img src="{{asset('assets/images/album/')}}/17.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/18.jpg"><img src="{{asset('assets/images/album/')}}/18.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/19.jpg"><img src="{{asset('assets/images/album/')}}/19.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/20.jpg"><img src="{{asset('assets/images/album/')}}/20.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/21.jpg"><img src="{{asset('assets/images/album/')}}/21.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/22.jpg"><img src="{{asset('assets/images/album/')}}/22.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/23.jpg"><img src="{{asset('assets/images/album/')}}/23.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/24.jpg"><img src="{{asset('assets/images/album/')}}/24.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/25.jpg"><img src="{{asset('assets/images/album/')}}/25.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/26.jpg"><img src="{{asset('assets/images/album/')}}/26.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/27.jpg"><img src="{{asset('assets/images/album/')}}/27.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/28.jpg"><img src="{{asset('assets/images/album/')}}/28.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/29.jpg"><img src="{{asset('assets/images/album/')}}/29.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/30.jpg"><img src="{{asset('assets/images/album/')}}/30.jpg" /></a>

      <a href="{{asset('assets/images/album/')}}/31.jpg"><img src="./public/images/album/31.jpg" /></a>





    </div>

  </section>

  <a href="" class="ablum_load_more">Xêm thêm ...</a>
</main>

@endsection