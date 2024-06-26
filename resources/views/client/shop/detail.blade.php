@extends('layouts.layout-client')

@section('page-title', 'Chi tiết sản phẩm | MissCare')
@section('main')
    <main class="body__details">
        <div class="product-page pt-4">
            <div class="subnav-trail">
                <a href="productClient?action=list">Mặt hàng</a>
                <span class="divider">/</span>
                <a href="#">Quần áo</a>
                <span class="divider">/</span>
                <a href="#">Chi tiết sản phẩm</a>
                <span class="divider">/</span>
                <a href="#pd-info">{{ $product->name }}</a>
            </div>
            <!-- <div class="" id="test"></div> -->

        </div>
        <div class="product-display">
            <div class="pd-content">
                <div class="pd-image">
                    <!-- chứa slider và hình ảnh chi tiết -->
                    <div class="pd-image__left">
                        <div class="img__scroll">
                            @foreach ($product->images as $image)
                                <button id="img1" class="thunb__img">
                                    <img src="{{ asset('uploads/' . $image->url) }}" alt="">
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="pd-image__right">
                        <div class="img__right">
                            <img src="{{ asset('uploads/' . $product->avatar) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="pd-info" id="pd-info">
                    <!-- chứa thông tin chi tiết sp -->
                    <form class="pd__right" action="cartClient" method="POST" id="form-add-bag">
                        <input type="hidden" id="pro_id" name="id" value="{{ $product->id }}">
                        <div class="pd-info-head">
                            <div class="pd-brand-sub"><span class="pd-brand-name"><a href="">Brand:
                                        {{ $product->brands->name }}</a></span></div>
                            <div class="pd-name">{{ $product->name }}</div>
                        </div>
                        <div class="pd-price ">
                            <div id="price-observer">
                                <div class="default-price"><span class="currency lc"></span><span class="number">
                                        {{ number_format($product->price - $product->discount) }}đ</span></div>
                                @if ($product->discount)
                                    <div class="price__sale">
                                        <span class="price__sale--fist">{{ number_format($product->price) }}đ</span>
                                        <span
                                            class="price__sale--off">{{ number_format(($product->discount / $product->price) * 100, 2, ',', '.') }}%</span>
                                    </div>
                                @endif
                            </div>
                            <div class="pd-sku">
                                <p>Kho : <span class="product-quantity">{{ $product->quantity }}</span></p>
                            </div>
                        </div>
                        <div class="pd-processing-time" data-nosnippet="">
                            <div class="rewards-wrap"><span class="rewards-amount-total">
                                    Đặt hàng thuận tiện, sản phẩm đa dạng, chất lượng cao cấp và nhận hàng cực kì nhanh
                                    chóng!
                                </span></div>

                        </div>
                        <div class="pd-color">
                            <label for="color">Chọn màu sắc</label> <br>
                            <select border-opacity-50 name="color" id="color">
                                <option value="" disabled selected>----Chọn màu sắc----</option>
                                @foreach ($product->colors as $color)
                                    <option value="{{ $color->id }}"> {{ $color->name }}
                                    </option>`;
                                @endforeach

                            </select>
                            <div class="errC text-danger"></div>
                        </div>

                        <div class="pd-color">
                            <div class="size">Kích cỡ</div>
                            <select border-opacity-50 name="size" id="size">
                                <option value="" disabled selected>----Chọn kích cỡ----</option>
                                @foreach ($product->sizes as $size)
                                    <option value="{{ $size->id }}"> {{ $size->name }}
                                    </option>`;
                                @endforeach

                            </select> <br>
                            <div class="errS text-danger"></div>

                            <a style="color: #64abd6 !important;" class="size-info" href="#2">Tôi nên lấy kích cỡ
                                nào?</a>
                        </div>
                        <div class="pd-color">
                            <div class="quantity">Số lượng</div>
                            <input type="number" class="quantity" min="1" name="quantity"
                                style="margin-top: 10px;padding: 5px 5px;width: 70px;" value="1" id="quantity">
                            <div class="errQ text-danger"></div>

                            <div class="errQty text-danger"></div>
                        </div>
                        <div class="msg"></div>
                        <div class="er"></div>
                        <div class="fav-forms-wrap">
                            <div class="animate-button-wrap pd-buttons">
                                <button type="button" id="checkout_0"
                                    class="pd-checkout animate black loader btnAddCart">Thêm vào giỏ
                                    hàng</button>
                                <span class=" btn_add_fa">
                                    <i class="far fa-heart"></i>
                                </span>
                            </div>
                        </div>
                        <div class="body__content__detail">
                            <div class="content__detail__info">
                                <div id="1" class="info__title">
                                    <p>Thông tin chi tiết</p>
                                    <div class="info__icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                                <div class="info__body">
                                    <p>Mô tả</p>
                                    <div class="body-content">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="content__detail__info">
                                <div id="2" class="info__title">
                                    <p>Kích thước & phù hợp</p>
                                    <div class="info__icon">
                                        <i class="fas fa-plus minus"></i>
                                    </div>
                                </div>
                                <div class="info__body">
                                    <div class="info_table_size">
                                        <table class="tb_size">
                                            <tbody>
                                                <tr class="tb_title">
                                                    <th>Khích thước</th>
                                                    <th>inch</th>
                                                    <th>cm</th>
                                                </tr>
                                                <tr class="tb_item">
                                                    <td>Vai</td>
                                                    <td>28.4</td>
                                                    <td>124.0</td>
                                                </tr>
                                                <tr class="tb_item">
                                                    <td>Ngực</td>
                                                    <td>48.4</td>
                                                    <td>122.0</td>
                                                </tr>
                                                <tr class="tb_item">
                                                    <td>Eo</td>
                                                    <td>48.4</td>
                                                    <td>124.0</td>
                                                </tr>
                                                <tr class="tb_item">
                                                    <td>Lỗ cánh tay</td>
                                                    <td>18.4</td>
                                                    <td>24.0</td>
                                                </tr>
                                                <tr class="tb_item">
                                                    <td>Tay áo</td>
                                                    <td>28.4</td>
                                                    <td>124.0</td>
                                                </tr>
                                                <tr class="tb_item">
                                                    <td>Lỗ tay áo</td>
                                                    <td>18.4</td>
                                                    <td>24.0</td>
                                                </tr>
                                                <tr class="tb_item">
                                                    <td>Chiều dài</td>
                                                    <td>38.4</td>
                                                    <td>124.0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="content__detail__info">
                                <div id="3" class="info__title">
                                    <p>Vật chuyển và trả hàng</p>
                                    <div class="info__icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                                <div class="info__body">
                                    <p>Có thể trả lại trong vòng 14 ngày kể từ ngày giao hàng. Chính sách hoàn trả</p>
                                    <span>Miễn phí vận chuyển có sẵn trên toàn thế giới. Kiểm tra chính sách vận chuyển của
                                        chúng tôi để xem yêu cầu đặt hàng tối thiểu của quốc gia bạn. Chính sách vận chuyển
                                        .</span>
                                </div>
                            </div>
                            <div class="content__detail__info">
                                <div id="4" class="info__title">
                                    <p>Giới thiệu MissCare</p>
                                    <div class="info__icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                                <div class="info__body">
                                    <span>Đơn giản và bảo thủ, JUSTONE cung cấp một bộ sưu tập đầy đủ quần áo dành cho phụ
                                        nữ, thoải mái và không rắc rối. Từ áo phông cổ điển đến quần short và quần lọt khe
                                        dài, lựa chọn quần áo thiết thực của JUSTONE là lý tưởng cho cuộc sống hàng
                                        ngày.</span>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            @if ($relatePros->count())

                <div class="box__slider__ct">
                    <p class="vclll">Bạn cũng có thể thích</p class="vclll">
                    <div class="slider-album__content">
                        <!-- slider ảnh sp liên quan -->
                        @foreach ($relatePros as $item)
                            <div class="image-item">
                                <a href="{{ route('client.shop.detail', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                    <div class="item__boxImg">
                                        <img src="{{ asset('uploads') }}/{{ $item->avatar }}" alt="">
                                    </div>
                                </a>
                                <p>{{ $item->name }}</p>
                                <span><b>{{ number_format($item->price - $item->discount, 0, ',') }} VND</b></span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="sp-title">
                <p class="vclll">Bình luận của khách hàng</p>
                <div class="form__content">
                    <div class="comment__itemAll">

                        @if ($comments)
                            @foreach ($comments as $comment)
                                <div class="comment-item" style="margin-bottom: 15px;">
                                    <div class="">
                                        @if ($comment->image)
                                            <img src="{{asset($comment->image)}}" width="200px" alt="{{asset($comment->user->name)}}">
                                        @endif
                                        <div style="display: flex;justify-content:space-between;">
                                            <span style="font-size:14px;">{{ $comment->content }}</span>
                                            <i>Date: {{ $comment->created_at }}</i>
                                        </div>
                                    </div>
                                    <div>
                                        <span style="font-size:12px;font-weight:bold;">{{ $comment->user->name }}</span>
                                    </div>
                                </div>
                            @endforeach
                            <a href="javascipt:void(0)" style="display: flex;
                            justify-content:center;" id="show-more-comment">Xem thêm bình luận.</a>
                        @endif
                    </div>
                </div>
                @if (Auth::check())
                    <div class="form__comment">
                        <div class="form__top" style="display:flex; align-items:center;">
                            <form action="{{ route('comment.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="input__comment">
                                    <div class="avatar__comment">
                                        <img src="./public/images/album/ong1.jpg" alt="" width="100%">
                                    </div>
                                    <div class="input__keys">
                                        <input type="text" name="content" placeholder="Bình luận của bạn" required>
                                        <div class="input__image">
                                            <input type="file" name="image" value="📁">

                                        </div>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="sub__comment">
                                            <button name="btn_cmt" type="submit"><i
                                                    class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- err cmt --}}
                        </div>

                    </div>
                @endif
                <p class="vclll">Hình ảnh chi tiết</p>
                <div class="full-images">
                    <div class="full__box__img">
                        @foreach ($product->images as $image)
                            <div class="pd__item__img">
                                <img src="{{ asset('uploads/' . $image->url) }}" alt="" width="100%">
                            </div>
                        @endforeach
                    </div>
                    <div class="gallery_pros">
                        <div class="control_pros_close">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="gallery_pros_img">
                            <img src="./public/images/products/0c7a6702fb366f8e1047ea5b3bd0eda64b812378 - Copy.jpg"
                                alt="">
                        </div>
                        <div class="control_pros prev">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="control_pros next">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="" id="test"></div> -->
            <div id="toast"></div>
    </main>
@endsection

@section('plugin-script')
    <!-- end main -->
    <!-- add to bag -->
    <script>
        $(document).ready(function() {

            const id = "{{ $product_id }}";
            const apiProductUrl = "/api/product/" + id;
            const apiProductStockUrl = "/api/stocks/" + id;
            const isLogin = "{{ Auth::check() ? Auth::user()->id : 0 }}";

            // get data api
            const productStockPending = async () => {
                const data = await axios.get(apiProductStockUrl)
                return data.data;
            }

            const productStocks = productStockPending();
            productStocks.then(data => {
                $('.btnAddCart').click(function() {
                    const quantity = $('input[name="quantity"]').val();
                    const size = $('#size').val();
                    const color = $('#color').val();

                    if (!color) {
                        $('.errC').html('Vui lòng chọn màu sắc');
                        return;
                    } else {
                        $('.errC').html('');
                        $('.errS').html('');
                    }
                    if (!size) {
                        $('.errS').html('Vui lòng chọn kích cỡ');
                        return;
                    } else {
                        $('.errC').html('');
                        $('.errS').html('');
                    }
                    $('.errS').html('');
                    $('.errC').html('');

                    // loop data + check qty
                    data.forEach((el, index) => {
                        if (el.size_id == size && el.color_id == color) {
                            if (quantity > el.quantity) {
                                $('.errQty').html(
                                    'Số lượng sản phẩm còn lại không đủ để bán cho bạn!'
                                )
                            } else {
                                $('.errQty').html()
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr('content')
                                    }
                                })
                                $.ajax({
                                    url: '{{ route('client.cart.add') }}',
                                    method: 'POST',
                                    data: {
                                        product_id: id,
                                        color_id: color,
                                        size_id: size,
                                        quantity: quantity
                                    },
                                    success: function(data) {
                                        showSuccess();
                                        console.log(data);
                                        $('.notifi-cart').html(data.length);

                                        $('.btnAddCart').html(
                                            'Đã thêm vào giỏ hàng!');
                                        $('.btnAddCart').attr('disabled', true);
                                        $('.btnAddCart').addClass(
                                            'btn-exist-cart');

                                        setTimeout(() => {
                                            window.location.reload();
                                        }, 1200);
                                    },
                                    error: function(er) {
                                        console.log(er);
                                    }
                                });
                            }
                            return;
                        }
                    });
                });

                // display quantity của từng biến thê
                $('#color').change(function() {
                    if ($('#size').val()) {
                        displayQty($('#color').val(), $('#size').val());
                        checkCartExist(id, $('#color').val(), $('#size').val());
                    }
                });
                $('#size').change(function() {
                    if ($('#color').val()) {
                        displayQty($('#color').val(), $('#size').val());
                        checkCartExist(id, $('#color').val(), $('#size').val());
                    }
                });

                // handle hiern thi slg cua bien the
                function displayQty(color, size) {
                    //  get id value rồi check vói data xem còn bn qty => inner
                    data.forEach((el, index) => {
                        if (el.color_id == color && el.size_id == size) {
                            $('.product-quantity').html(el.quantity);
                            return;
                        }
                    })
                }

                // handle check exist cart=> disable button add
                // call api cart
                function checkCartExist(productId, colorId, sizeId) {
                    // check neu login thi get data cart save db , neu k login thi get data session cart->handle
                    if (isLogin != 0) {
                        api = "/api/get-cart-user/" + isLogin;
                    } else {
                        api = "/get-cart-session";
                    }

                    axios.get(api)
                        .then((res) => {
                            res.data.forEach((el, index) => {
                                if (el.product_id == productId && el.color_id == colorId &&
                                    el.size_id == sizeId) {
                                    $('.btnAddCart').html(
                                        'Đã có trong giỏ hàng!');
                                    $('.btnAddCart').attr('disabled', true);
                                    $('.btnAddCart').addClass(
                                        'btn-exist-cart');
                                    return;
                                }
                            })
                        })
                }

            });


        })
    </script>

    {{-- show more comment --}}

    <script>
        $(document).ready(function(){
            $('#show-more-comment').click(function(){
                
            });
        })
    </script>

    {{-- add to favorite --}}
    {{-- <script>
        const proIds = $('input[name="pro_if"]').val();
        const btn = document.querySelector('.btn_add_fa')
        btn.addEventListener('click', function() {
            var id = proIds.value
            var action = "add";
            // gửi value -> php qua ajax (module favorite product)
            $.ajax({
                url: 'productFavoriteClient',
                method: 'GET',
                data: {
                    action: "add",
                    pro_id: id,
                },
                success: function(data) {
                    $('#test').html(data)
                },
                error: function(data) {
                    $('#test').html(data)
                }
            })


        })
    </script> --}}
@endsection
