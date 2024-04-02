<footer>
    <div class="body__footer__index">
        <div class="footer-top">
            <div class="footer-item">
                <span class="footer-top__title text-title">Về chúng tôi</span>
                <p class="mt-2 text-light">Cho các đề nghị độc quyền!</p>
            </div>
            <div class="footer-item">
                <form action="" class="register_footer">
                    <input type="email" placeholder="Địa chỉ email" name="email">
                    <button type="submit" name="btn_register" style="background-color:#000;">Đăng kí</button>
                </form>
            </div>
            <div class="footer-social">
                <a class="text-light" href="{{\App\Models\WebSetting::first()->fb_url}}"><i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a class="text-light" href="{{\App\Models\WebSetting::first()->insta_url}}"><i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a class="text-light" href="{{\App\Models\WebSetting::first()->twitter_url}}"><i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a class="text-light" href="{{\App\Models\WebSetting::first()->pinterest_url}}"><i class="fa fa-pinterest" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="footer-main">
            <div class="footer-item">
                <div class="footer-title text-title">
                    Các cơ sở?
                </div>
                <span>Hòe Thị - Hà Nội</span>
                <span>Gia Lâm - Hà Nội</span>
                <span>Đống Đa - Hà Nội</span>
                <span>Quận 6 - Tp HCM</span>
                <span>Bình Tân - TP HCM</span>
            </div>
            <div class="footer-item">
                <div class="footer-title text-title">
                    Các liên kết khác
                </div>
                <a href="">Thẻ quà tặng</a>
                <a href="homepage#introduce">Câu chuyện của chúng tôi</a>
                <a href="newClient">Blog</a>
                <a href="">Chương trình liên kết</a>

            </div>
            <div class="footer-item">
                <div class="footer-title text-title">
                    Quốc gia
                </div>
                <a href=""><img src="{{asset('assets')}}/images/layout/vietnam.png" alt="" width="50px"></a>

            </div>
        </div>
        <div class="footer-bottom">
            <div class="left" style="color: #ccc !important;">
                MissCare.com &copy; {{date('Y')}} . All rights reserved
            </div>
            <div class="right">
                <a href="{{route('client.termsofuse')}}" style="color: #ccc !important;">Điều khoản sử dụng</a>
                <a href="{{route('client.termsofuse')}}" style="color: #ccc !important;">Chính sách bảo mật</a>
                <a href="{{route('client.termsofuse')}}" style="color: #ccc !important;">
                    <i class="fa fa-universal-access" aria-hidden="true"></i>
                    Hiển thị Công cụ Hỗ trợ Tiếp cận</a>
            </div>
        </div>
    </div>
</footer>
<div class="back-to-top">
    <i class="fa fa-chevron-up text-secondary" aria-hidden="true"></i>
</div>
