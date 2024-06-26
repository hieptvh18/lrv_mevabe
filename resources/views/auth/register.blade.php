@extends('layouts.app')
@section('page-title','Đăng kí tài khoản')

@section('content')
<h4>Đăng kí tài khoản</h4>
    <div class=" justify-content-center">
        <div class="">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class=" mb-2">
                            <label for="name" class=" col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mb-2">
                            <label for="email" class=" col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class=" mb-2 ">
                            <div class=" col-form-label text-md-end">Gender</div>

                            <div class=" d-flex justify-content-around">
                                <div class="">
                                    <input type="radio" value="1" checked name="gender" id="gender1"> <label for="gender1">Nam</label>
                                </div>
                                <div class="">

                                    <input type="radio" value="2" name="gender" id="gender2"> <label for="gender2">Nữ</label>
                                </div>
                                <div class="">
                                    <input type="radio" value="3" name="gender" id="gender3"> <label for="gender3">Khác</label>

                                </div>

                            </div>
                        </div>

                        <div class=" mb-2">
                            <label for="phone" class="col-form-label text-md-end">Phone</label>

                            <div class="">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mb-2">
                            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mb-2">
                            <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class=" mb-2">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    Đăng kí
                                </button>
                            </div>
                        </div>
                        <a href="{{route('login')}}">Đăng nhập</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
