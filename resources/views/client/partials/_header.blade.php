<header>

    <div class="header-top swiper mySwiper">
        <div class="swiper-wrapper">

            {{-- check & looop voucher in slider top header --}}
            @if (\App\Models\Voucher::where('status', 1)->orderBy('id', 'desc')->get()->count() >= 2)
                @foreach (\App\Models\Voucher::where('status', 1)->orderBy('id', 'desc')->take(2)->get()
    as $key => $voucher)
                    <a href="#" class="swiper-slide slider-top{{ $key + 1 }} text-sm">
                        {{ $voucher->name }} nhập mã "{{ $voucher->code }}" để được giảm
                        {{ $voucher->discount }}{{ $voucher->category_code == 0 ? '%' : 'vnd' }} cho đơn hàng.
                    </a>
                @endforeach
            @elseif(\App\Models\Voucher::where('status', 1)->orderBy('id', 'desc')->get()->count() == 1)
                @foreach (\App\Models\Voucher::where('status', 1)->get() as $key => $voucher)
                    <a href="#" class="swiper-slide slider-top{{ $key + 1 }} text-sm">
                        {{ $voucher->name }} nhập mã "{{ $voucher->code }}" để được giảm
                        {{ $voucher->discount }}{{ $voucher->category_code == 0 ? '%' : 'vnd' }} cho đơn hàng.
                    </a>
                @endforeach
                <a href="#" class="swiper-slide slider-top2">Vận chuyển nhanh chóng và tin cậy 🚛</a>
            @else
                {{-- default --}}
                <a href="#" class="swiper-slide slider-top1">Thời trang & Đồ dùng cho bé với MissCare.</a>
                <a href="#" class="swiper-slide slider-top2">Vận chuyển nhanh chóng và tin cậy 🚛</a>
            @endif
        </div>
    </div>
    <!-- end header-top -->
    <div class="header-main">
        <div class="box-header-main">
            <div class="box-header-main__start">
                <div class="bars">
                    <div class="menu__bars">
                        <div class="btn__burger"></div>
                    </div>
                </div>
                <a href="{{ route('client.home') }}" class="logo">
                    <img src="{{ asset('uploads') }}/{{\App\Models\WebSetting::first()->logo}}" alt="" class="logo-img">
                </a>
            </div>

            <div class="search">
                <form action="{{ route('client.shop') }}" class="form-search">
                    <div class="pop-input">
                        <select name="filter_cate" class="filter-cate">
                            <option value="all">Tất cả</option>
                            @foreach (\App\Models\Category::where('parent_id', 0)->get() as $category)
                                <option
                                    {{ isset($_GET['filter_cate']) && $_GET['filter_cate'] == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="search" name="keyword" placeholder="Tìm kiếm" required>
                    </div>
                    <button type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <div class="user-options">
                <div class="search-rp"></div>

                @if (Auth::check())
                    <div class="profile pt-4 pb-4">
                        <span class="title-pop-user">Hồ sơ<i class="fa fa-angle-down ml-2"
                                aria-hidden="true"></i></span>
                        <div class="pop-profile">
                            <a href="{{ route('client.profile') }}">Bảng điều khiển</a>

                            <a href="{{ route('logout') }}" onclick="
                                    event.preventDefault()
                                    if(confirm('Bạn chắc chắn muốn đăng xuất')){
                                        document.querySelector('#form-logout').submit();
                                    }
                                ">Đăng xuất</a>

                            {{-- form fake method --}}
                            <form action="{{ route('logout') }}" method="post" id="form-logout">@csrf</form>
                        </div>
                    </div>
                @else
                    {{-- admin profile --}}
                    <a href="{{ route('login') }}" class="account pt-4 pb-4" {{-- id="popup-user" data-toggle="modal"
                        data-target="#box-login-register" --}}>
                        <span class="title-pop-user">Đăng nhập / Đăng ký</span>
                        <span class="icon__account"><i class="fas fa-user-circle"></i></span>
                    </a>
                    <!-- pops up login -->
                    {{-- <div class="modal fade " role="dialog" id="box-login-register" style="z-index: 100;">
                        <div class="modal-dialog">
                            <div class="modal-content box-content-user mt-5">
                                <div class="modal-header" style="border:none;padding-bottom:0;">
                                    <button type="button" class="close" data-dismiss="modal"
                                        style="outline:none;">&times;</button>
                                </div>

                                <div class="modal-body box-user">
                                    <div class="title">
                                        <span class="title-sign_in">Đăng nhập</span>
                                        <span class="title-register">Đăng ký</span>
                                    </div>
                                    <div class="welcome">
                                        Chào mừng bạn!
                                    </div>

                                    <form method="POST" name="form-login" class="p-5" id="login_user">
                                        <div class="form-group">
                                            <input type="text" name="email" placeholder="Nhập email" value=""
                                                class=" email" id="email_login" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Nhập mật khẩu"
                                                class="password" value="" id="password_login">
                                        </div>
                                        <div class="pretty p-default mb-4 mt-4">
                                            <input type="checkbox" id="remember" name="remember" />
                                            <div class="state">
                                                <label>Nhớ thông tin</label>
                                            </div>
                                        </div>
                                        <div class="errLogin text-danger pb-2">

                                        </div>
                                        <button type="submit" class="col-md-12 btn btn-secondary p-2"
                                            id="btn_login_client">Đăng
                                            nhập</button>
                                        <div class="forgot-pass text-center m-3">
                                            <a href="forgotPass">Bạn quên mật khẩu?</a>
                                        </div>
                                        <div class="err" style="color:red;">

                                        </div>
                                    </form>
                                    <!-- register -->
                                    <form action="" method="POST" enctype="multipart/form-data" name="form-register"
                                        id="register_user" class="p-5">
                                        <div class="errRegister" style="color:red;">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="fullname" id="fullname" placeholder="Tên đầy đủ"
                                                class="fullname">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" id="email_register" placeholder="Nhập email"
                                                class=" email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Nhập mật khẩu"
                                                class=" password" id="pass_register">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="birthday" id="birthday"
                                                placeholder="Ngày sinh của bạn" class="birthday">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone"
                                                placeholder="Số điện thoại của bạn" class="phone">
                                        </div>
                                        <div class="gender col-md-12 mb-4 mt-4">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" value="0" id="gender" type="radio"
                                                    name="gender" checked>
                                                <label for="gender" class="form-check-label mr-4">
                                                    Nam
                                                </label>
                                                <input class="form-check-input" id="gender2" type="radio" name="gender">
                                                <label for="gender2" class="form-check-label">
                                                    Nữ
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="col-md-12 btn btn-secondary p-2"
                                            id="btn_register">Tạo
                                            tài khoản</button>
                                        <div class="forgot-pass text-center m-3">
                                            <p>Bạn chắc chắn rằng sẽ đồng ý với những điều khoản của chúng tôi!</p>
                                        </div>

                                    </form>
                                </div>

                                <div class="modal-footer" style="display:block;">

                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- end modal login-->
                @endif
                <a href="#lang" class="lang pt-4 pb-4">
                    <img src="{{ asset('assets/images/layout/vietnam.png') }}" alt="">
                </a>
                {{-- <div class="box-favorite-pro pt-4 pb-4">
                    <a href="san-pham-yeu-thich" class="favorite-pro">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </a>
                    <div class="notifi">
                        1
                    </div>
                </div> --}}
                <div class="box-cart pt-4 pb-4">
                    <a href="{{ route('client.cart') }}" class="cart cart-btn-icon">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                    <div class="notifi notifi-cart">
                    @if(Auth::check())
                        {{count(\App\Models\Cart::where('user_id',Auth::user()->id)->get()->toArray())}}
                    @elseif (session('carts'))
                        {{ count(session('carts')) }}
                    @else
                        0
                        @endif
                    </div>
                    <!-- start popup-cart -->
                    
                    <div class="pop-cart">
                        <div class="template-cart__exists">
                            <div class="pop-cart__top">
                                <div class="left">
                                    <div class="notifi-cart">
                                        Mặt hàng
                                        <span class="total-cart-items"></span>
                                    </div>
                                </div>
                                <div class="right">
                                    <span class="total">Tổng tiền:</span>
                                    <span class="total-price-pop"></span>
                                </div>
                            </div>

                            <div class="pop-cart-items"></div>

                            <div class="pop-cart__bottom">
                                <a href="{{ route('client.checkout') }}" class="text-white bg-secondary">Thanh
                                    toán</a>
                                <a href="{{ route('client.cart') }}" class="">Vào giỏ hàng</a>
                            </div>
                        </div>
                        
                        <div class="DH__content__body template-cart__empty">
                            <div class="">
                                <h3 class="" style="color:#FFBC7F;">Giỏ hàng của bạn đang rỗng!</h3>
                                <a href="{{ route('client.shop') }}" class="text-primary text-center">Mua sắm
                                    ngay</a>
                            </div>
                            <div class="">
                                <img src="{{ asset('assets') }}/images/layout/empty-orders.jpg" alt="Ảnh sản phẩm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu">
            <ul class="sub-nav m-0">
                <li><a href="{{ route('client.shop') }}"
                        class="{{ Route::currentRouteName() == 'client.shop' ? 'menu-active' : '' }}">#ALL</a>
                </li>

                <div class="d-flex sub-nav_item">
                    @php
                        $menus = \App\Models\Category::where('parent_id', 0)
                                ->whereHas('products',function($q){
                                    $q->where('status',1);
                                })
                                ->get();
                    @endphp

                    @foreach ($menus as $category)
                        <li class="sub-nav_item-li" data-id="{{ $category->id }}">
                            <a href="{{ route('client.shop.category', $category->slug) }}"
                                class="{{ request()->is('cua-hang/' . $category->slug) ? 'menu-active' : '' }}">
                                {{ $category->name }}
                            </a>
                            {{-- none child menu --}}
                        </li>
                    @endforeach
                    {{-- <div class="header-menu-container__child-menu hidden">
                        <div class="header-menu__child-menu" >
                            <img src="{{asset('assets/images/layout/loading-dark.gif')}}" class="d-flex justify-content-center" width="20px" height="20px" alt="" style="margin: 0 auto;">
                        </div>
                    </div> --}}
                </div>

                @if (session('admin'))
                    <li class="view_admin">
                        <a href="admin">Vào trang quản trị<i class="fa fa-arrow-right ml-2" aria-hidden="true"></i>
                        </a>
                    </li>
                @endif

                <li><a href="{{route('client.news')}}"
                        class="{{ Route::currentRouteName() == 'client.news' ? 'menu-active' : '' }}">Tin tức</a>
                </li>
                <li><a href="{{ route('client.social') }}"
                        class="{{ Route::currentRouteName() == 'client.social' ? 'menu-active' : '' }}">#MISSCARE</a>
                </li>
                @if (Auth::check() && Auth::user()->role_id != 1)
                    <li><a href="{{ route('admin.dashboard') }}">Trang quản trị <i class="ml-2 fa fa-unlock-alt"
                                aria-hidden="true"></i>
                        </a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- end header-main -->

</header>

{{-- script --}}

<script>
    let cartItems = {!! json_encode(formatCartData()) !!};
    console.log(cartItems);

    $(document).ready(function() {
        const subNavItemsEl = document.querySelectorAll('.sub-nav_item-li');
        const childMenuEl = document.querySelector('.header-menu__child-menu');
        const cartBtn = document.querySelector('.cart-btn-icon');
        const cartPopup = document.querySelector('.pop-cart');
        let cartPopupLoading = false;
        const countCartItemEl = document.querySelector('.notifi-cart');
        const templateCartExistsEl = document.querySelector('.template-cart__exists');
        const templateCartEmptyEl = document.querySelector('.template-cart__empty');
        const cartItemsEl = document.querySelector('.pop-cart-items')
        const totalCartItems = $('.total-cart-items');

        // active cart popup
        cartBtn.addEventListener('click', function(e){
            e.preventDefault();
            cartPopupLoading = true;
            
            if(cartItems && Object.keys(cartItems).length){
                templateCartExistsEl.style.display = 'block';
                templateCartEmptyEl.style.display = 'none';

                let cartItemHtml = ``;

                const arr = Object.keys(cartItems.cartData).map(key => cartItems.cartData[key]);
                arr.forEach((val)=>{
                    cartItemHtml += `
                    <div class="pop-cart__main row p-3">
                        <div class="col-3 col-md-3">
                            <a
                                href="/cua-hang/${val.product_slug}/${val.product_id}">
                                <img src="${val.product_avatar}" alt="${val.product_name}"
                                    width="100%">
                            </a>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="pro-name mb-2">${val.product_name}</div>
                            <div class="desc">
                                ${val.product_color} |
                                ${val.product_size}
                                | SL ${val.quantity}
                            </div>
                        </div>
                        <div class="col-3 col-md-3 cart-option">
                            <div class="pro-price mb-5">${formatPrice(val.final_price)}</div>
                        </div>
                    </div>
                    `
                });

                cartItemsEl.innerHTML = cartItemHtml;
                // inner total cart pop
                $('.total-price-pop').html(formatPrice(cartItems.totalPrice))
                totalCartItems.html(cartItems.totalItems);
            }else{
                templateCartExistsEl.style.display = 'none';
                templateCartEmptyEl.style.display = 'block';
            }
            cartPopup.classList.toggle('active');
        });

        function formatPrice(price, currencySymbol) {
            // Ensure price is a number
            if (typeof price !== 'number') {
                throw new TypeError('Price must be a number');
            }

            // Set default currency symbol if not provided
            if (!currencySymbol) {
                currencySymbol = ''; // Default currency symbol for VND
            }

            // Format the price with the provided currency symbol
            const formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND', // Currency code for Vietnamese Dong
                currencyDisplay: 'symbol',
                minimumFractionDigits: 0 // VND does not have decimal fractions
            });

            // Format and return the price with the currency symbol
            return formatter.format(price).replace('VND', currencySymbol);
        }

        // use axios get data tu api category
        // axios.get('/api/frontend/categories')
        //     .then(res => {
        //         const dataCategories = res.data;
        //         const childCategories = [];
        //         // loop data => respone ve child category of dataid ma minh hover
        //         subNavItemsEl.forEach(itemEl => {
        //             itemEl.onmouseover = function() {
        //                 const id = this.dataset.id;

        //                 dataCategories.forEach(val => {
        //                     if (val.parent_id == id) {
        //                         childCategories.push(val);
        //                     }
        //                 });

        //                 // map + inner html childCate
        //                 html = '';
        //                 childCategories.forEach(val => {

        //                     html += `
        //                     <div class="child-menu_item">
        //                             <div class="item-title"><a href="/cua-hang/${val.slug}">${val.name}</a></div>
                                   
        //                         </div>
        //                 `;
        //                 });

        //                 // render success -> remove
        //                 childMenuEl.innerHTML = html;
        //                 childCategories.length = 0;
        //             }
        //         });

        //     })
        //     .catch(er => {
        //         console.log(er);
        //     })

    })
</script>
