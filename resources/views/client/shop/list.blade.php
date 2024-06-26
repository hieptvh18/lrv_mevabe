@extends('layouts.layout-client')

@section('page-title', 'Cửa hàng | Miss Care')
@section('main')

    <main class="body__product">
        <div class="product__header">
            <div class="proH__title">
                <p>{{ $pageTitle }}</p>
            </div>
            <div class="proH__text1">
                <p>({{ $products->count() }} mặt hàng)</p>
            </div>
            <div class="proH__text2">
                <p>Bạn đang tìm kiếm những sản phẩm hoàn hảo phù hợp với mọi thứ hay chiếc bàn đẹp nhất lấy cảm
                    hứng từ
                    Miss Care</p>
            </div>
        </div>

        <div class="product__content">
            <div class="proC__fist">
                <div class="proC__title">
                    <p>Chọn mua những gì phù hợp với bạn</p>
                </div>
                <!-- pagination -->
                <div id="paging1" class="proC__paging">
                    <nav class="pages">
                        @if ($products->currentPage() > $products->lastPage())
                            <a href="{{ Request::url() }}?page={{ $products->currentPage() - 1 }}"
                                class="pageLeft"><i class="far fa-chevron-left"></i></a>
                        @endif
                        <li class="number__paging">
                            {{-- Nếu là trang hiện tại thì hiển thị thẻ span
                                ngược lại hiển thị thẻ a --}}
                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                @if ($i === $products->currentPage())
                                    <span class="numB numB__active">1</span>
                                @else
                                    <a href="{{ Request::url() }}?page={{ $i }}"
                                        class="numB">{{ $i }}</a>
                                @endif
                            @endfor
                        </li>
                        @if ($products->currentPage() < $products->lastPage())
                           
                            <a href="{{ Request::url() }}?page={{ $products->currentPage() + 1 }}"
                                class="pageRight"><i class="far fa-chevron-right"></i></a>
                        @endif
                    </nav>
                </div>
            </div>


            <div class="proC__filters">
                <form class="form__filter" method="">
                    <div class="select__price">
                        <div id="price" class="filter__title">
                            <p>Lọc Giá</p>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="box__filter__price none">
                            <!-- khi ng dùng thay đổi value input hidden -> show khoảng giá dưới trên range -->
                            <input type="hidden" name="min_price" id="hidden_minimum_price" value="1000">
                            <input type="hidden" name="max_price" id="hidden_maximum_price" value="10000000">
                            <p id="price_show">
                                Chọn khoảng giá
                            </p>
                            <div class="price_range" id="price_range">

                            </div>
                            <!-- btn filter -->
                            <button type="submit" class="text-center btn btn-secondary mt-2 form-control"
                                >Áp dụng</button>

                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="" id="test"></div> -->
            <div class="proC__show">
                <div class="proC__allItem">

                    @foreach ($products as $product)
                        <form action="productFavoriteClient" method="GET" class="proC__item">
                            <div class="proC__item__img">
                                <a
                                    href="{{ route('client.shop.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">
                                    <img src="{{ asset('uploads/' . $product->avatar) }} " alt="" width="100%">
                                </a>
                            </div>
                            <div class="proC__item__Name">
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class="proC__item__PC">
                                <div class="proC__item__price">
                                    <p>{{ number_format($product->price - $product->discount, 0, ',') }}đ</p>
                                </div>
                                <div class="proC__item__color">
                                    <img src="{{ asset('assets/images/layout/colorwheel-2.png') }}" alt="">
                                </div>
                            </div>
                            <div class="proC__love">
                                <span class="proC__love__icon btn_add_fa">
                                    <!-- // xử lí nếu sp đã tồn tại favo thì cho icon heart màu đỏ -->
                                    <i class='far fa-heart'></i>
                                    <input type="hidden" class="pro_id" name="pro_id" value="">
                                </span>
                            </div>
                            <div class="proC__sale">
                                @if ($product->discount && number_format(($product->discount / $product->price) * 100, 0, ','))
                                <p class="item__sale">Sale
                                    {{ number_format(($product->discount / $product->price) * 100, 0, ',') }}%</p>
                                @endif
                            </div>
                        </form>
                    @endforeach

                </div>

                <!-- end copy -->
                <div class="proC__fist2">
                    <!-- pagination -->
                <div id="paging1" class="proC__paging">
                    <nav class="pages">
                        @if ($products->currentPage() > $products->lastPage())
                            <a href="{{ Request::url() }}?page={{ $products->currentPage() - 1 }}"
                                class="pageLeft"><i class="far fa-chevron-left"></i></a>
                        @endif
                        <li class="number__paging">
                            {{-- Nếu là trang hiện tại thì hiển thị thẻ span
                                ngược lại hiển thị thẻ a --}}
                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                @if ($i === $products->currentPage())
                                    <span class="numB numB__active">1</span>
                                @else
                                    <a href="{{ Request::url() }}?page={{ $i }}"
                                        class="numB">{{ $i }}</a>
                                @endif
                            @endfor


                        </li>
                        @if ($products->currentPage() < $products->lastPage())
                           
                            <a href="{{ Request::url() }}?page={{ $products->currentPage() + 1 }}"
                                class="pageRight"><i class="far fa-chevron-right"></i></a>
                        @endif
                    </nav>
                </div>
                </div>
            </div>
        </div>
        <div id="toast">
        </div>
    </main>
    <!-- js -->

@endsection

@section('plugin-script')

<script>


    // filter product
</script>
    <script>
        const proIds = document.querySelectorAll('.pro_id')
        const btn = document.querySelectorAll('.btn_add_fa')

        btn.forEach((value, e) => {
            value.addEventListener('click', function() {
                var toilanghia = proIds[e].value
                var action = "add";
                // gửi value -> php qua ajax (module favorite product)
                $.ajax({
                    url: 'productFavoriteClient',
                    method: 'GET',
                    data: {
                        action: action,
                        pro_id: toilanghia,
                    },
                    success: function(data) {
                        $('#test').html(data)
                    }
                })


            })
        })
    </script>
@endsection
