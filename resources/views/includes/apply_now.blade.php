
<!-- Add Banner Modal -->
<div class="modal fade" id="apply_now" tabindex="-1" aria-labelledby="addBannerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header modal-header-dark">
        <h5 class="modal-title" id="addBannerModalLabel">Apply Now</h5>
        <a type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>

      <!-- Modal Body with Form -->
      <div class="modal-body-dark p-3">
            <div class="login-page-wrap">
                <div class="login-page-content">
                    <div class="login-box">
                        <div class="item-logo text-center">
                            <img src="{{asset('/').$appdata->logo}}" alt="logo" width="80px" height="80px">
                        </div>
                        <form class="">
                        @csrf
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input name="name" type="text" placeholder="Enter Name" class="form-control">
                                {{-- <i class="far fa-envelope"></i> --}}
                            </div>
                            <input type="hidden" name="job_id" class="job_id">
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input name="email" type="text" placeholder="Enter Email" class="form-control">
                                {{-- <i class="fas fa-lock"></i> --}}
                            </div>
                            <div class="form-group mb-3">
                                <label>Phone</label>
                                <input name="phone" type="text" placeholder="Enter Phone" class="form-control" minlength="10" maxlength="10">
                                {{-- <i class="fas fa-lock"></i> --}}
                            </div>
                            <div class="form-group mb-3">
                                <label>Gender *</label>
                                <select name="gender" class="select2">
                                    <option value="">Please Select</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Both</option>
                                </select>
                                
                            </div>
                            <div class="form-group mb-3">
                                <label>Upload Resume</label>
                                <input name="uploads" type="file" class="form-control" style="height: unset;">
                                {{-- <i class="fas fa-lock"></i> --}}
                            </div>
                            <!-- <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember-me">
                                    <label for="remember-me" class="form-check-label">Remember Me</label>
                                </div>
                                <a href="#" class="forgot-btn">Forgot Password?</a>
                            </div> -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary login-btn submitForm text-end">Submit</button>
                            </div>
                        </form>
                        <!-- <div class="login-social">
                            <p>or sign in with</p>
                            <ul>
                                {{-- <li><a href="#" class="bg-fb"><i class="fab fa-facebook-f"></i></a></li> --}}
                                {{-- <li><a href="#" class="bg-twitter"><i class="fab fa-twitter"></i></a></li> --}}
                                {{-- <li><a href="#" class="bg-gplus"><i class="fab fa-google-plus-g"></i></a></li> --}}
                                {{-- <li><a href="#" class="bg-git"><i class="fab fa-github"></i></a></li> --}}
                            </ul>
                        </div> -->
                    </div>
                    <!-- <div class="sign-up">Don't have an account ? <a href="#">Signup now!</a></div> -->
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
