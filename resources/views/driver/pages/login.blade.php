@extends('admin.master')

@section('body')
  
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo flex justify-center">
                    <img src="{{asset('/').$appdata->logo}}" alt="logo" width="100px">
                </div>
                <form class="login-form" action="{{route('admin.auth.login')}}" method="POST">
                  @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" value="{{isset($value) ? $value : ''}}" type="text" placeholder="Enter username" class="form-control">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="text" placeholder="Enter password" class="form-control">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input name='remember_me' type="checkbox" {{isset($value) ?'checked' : ''}} class="form-check-input" id="remember-me">
                            <label for="remember-me" class="form-check-label">Remember Me</label>
                        </div>
                        <a href="#" class="sign-up forgot-btn cursor-pointer">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-btn">Login</button>
                    </div>
                </form>
                <!-- <div class="login-social">
                    <p>or sign in with</p>
                    <ul>
                        <li><a href="#" class="bg-fb"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="bg-twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="bg-gplus"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#" class="bg-git"><i class="fab fa-github"></i></a></li>
                    </ul>
                </div> -->
            </div>
            {{-- <div class="sign-up cursor-pointer">Forgot Password ?</div> --}}
            <div class="alert alert-warning forgot_alert hidden" role="alert">
                <div class="">Please contact customer support - <a href="tel:+919386591568">9386591568</a></div>
            </div>
        </div>
    </div>
@endsection

@section('js')

  @include('includes.app_toast')
  
  <script>
    $('.sign-up').on('click',function(){
        $('.forgot_alert').toggleClass('hidden');
    });
  </script>
@if (request()->session()->get('code')=='304')

  <script>
    responseToast(request()->session()->get('message'));
  </script>
@endif
@endsection