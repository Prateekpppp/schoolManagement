<script>
    
    function ajaxResponseModal(response){
        if(response.message){
            if(response.response_code == 200){
                responseToast(response.message,'bg-success');
                setTimeout(() => {
                    if(response.redirect){
                        
                        window.location.href = response.redirect;
                    } else{
                        
                        window.location.href = '{{url()->current()}}';
                    }
                }, 1000);
            } else{
                responseToast(response.message,'bg-warning');
                $('.submitForm').removeClass('disabled');
            }
        } else{
            responseToast(response,'bg-warning');
            $('.submitForm').removeClass('disabled');
        }
    }

    // toast js start
        
        function responseToast(msg,background='bg-light'){
            $('.app_toast .toast-body').html(msg);
            $('.app_toast').css('right','1%');
            $('.app_toast').addClass(background);
            $('.app_toast').fadeIn('slow',function(){
                setTimeout(() => {
                    $('.app_toast').fadeOut('slow');
                    $('.app_toast').css('right','-100%');
                    $('.app_toast').removeClass(background);
                }, 2000);
            });
        }
        
    // toast js end

    
    function ajaxResponse(response){
        
        if(response.redirect){
            window.location.href = response.redirect;
        }
        if(response.response_code==200){
            responseToast(response.message,'bg-success');
        } else{
            responseToast(response.message,'bg-warning');
        }
    }

    $(document).ready(function(){
        
        let scrollCounter = 0;

        setInterval(() => {
            
            if(scrollCounter<3){
                scrollCounter+=1;
            } else{
                scrollCounter=0;
            }
            $('.app_scroller').animate({
                scrollLeft: scrollCounter*$('.app_scroller').innerWidth()
                // scrollLeft: $('.app_scroller').scrollLeft()+window.innerWidth
            },700);
            
            // $('.app_scroller').scrollLeft($('.app_scroller').scrollLeft()+window.innerWidth)
        }, 3000);

    });



    function startOtpCountdown(button) {

        $(button).prop('disabled', true).text(`Retry in ${data.otpTimeLeft}s`);

        data.otpTimer = setInterval(() => {
        data.otpTimeLeft--;

        if (data.otpTimeLeft > 0) {
            $(button).prop('disabled', true).text(`Retry in ${data.otpTimeLeft}s`);
        } else {
            data.otpTimeLeft = 60;
            if (!otpVerified) {
            localStorage.setItem('user_otp', 0);
            // if (!localStorage.getItem('user_otp') || localStorage.getItem('user_otp') != data.phone) {
            $(button).prop('disabled', false).text('Get OTP');
            }
            clearInterval(data.otpTimer);
        }
        }, 1000);

    }

    
    $('input[name="search"], input[type="search"]').on('keyup', function() {
        
        
        var searchText = $(this).val().toLowerCase(); 

        $('table tbody tr').filter(function() {
            if($(this).text().toLowerCase().indexOf(searchText) > -1){
                $(this).removeClass('hidden');
            } else{
                $(this).addClass('hidden');
            }

        });
    });
    
    
    $('select[name="search"]').on('change', function() {
        
        
        var searchText = $(this).val().toLowerCase(); 

        $('table tbody tr').filter(function() {
            
            if($(this).text().toLowerCase().indexOf(searchText) > -1){
                $(this).removeClass('hidden');
            } else{
                $(this).addClass('hidden');
            }

        });
    });

    $('.contact_admin').on('click',function(e){
        e.preventDefault();
        responseToast('Please contact to admin.','bg-warning');
    });

    $('.reset_form').on('click',function(){
        $(this).closest('form')[0].reset();
    });
    
    function scrollToElement(element){
        $(element).parent().append('<div class="input_error text-danger"></div>');
        $(element).get(0).scrollIntoView({behavior: 'smooth'});
        $(element).focus();
        $(element).siblings('.input_error').html(`${$(element).siblings('label').text()}`);
        setTimeout(() => {
            $('.submitForm').removeClass('disabled');
            $(element).siblings('.input_error').remove();
        }, 2000);
    }

    $('.submitForm').on('click',function(e){
        $(this).addClass('disabled');
        e.preventDefault();
        let exitLoop = true;
        let requiredInputs = $('.required');
        $(requiredInputs).each(function(){
            if($(this).val() == ''){
                
                responseToast(`Please Enter ${$(this).attr('name')}`);
                exitLoop = false;
                scrollToElement($(this));
                return false;
            }
            
        });
        if(exitLoop){
            submitForm($(this).parents('form'));
        }
    });
  
    $('.delete').on('click',function(){
        let data = {};

        data['id'] = $(this).attr('data-id');
        data['model'] = $(this).attr('data-model');
        let url = $(this).attr('data-href');
        if(!url){
            url = '{{route('admin.post.delete')}}';
        }
        callApi('post',url,data,ajaxResponse);

    });

    $('.passwordType').on('click',function(){
        // $(this).find('i').toggleClass('fa-eye');
        let $passwordField = $(this).parent().find('input');
        let currentType = $(this).parent().find('input').attr('type');

        if (currentType === 'password') {
            $(this).find('i').removeClass('fa-eye-slash');
            $(this).find('i').addClass('fa-eye');
            $passwordField.attr('type', 'text'); // Change to text
            
        } else {
            $(this).find('i').addClass('fa-eye-slash');
            $(this).find('i').removeClass('fa-eye');
            $passwordField.attr('type', 'password'); // Change to password
            
        }
    });

    $('input[name=admission_no]').on("input", function () {
        this.value = this.value.replace(/[^a-zA-Z0-9]/g, "");
    });
    $('input[name=employ_code]').on("input", function () {
        this.value = this.value.replace(/[^a-zA-Z0-9]/g, "");
    });
</script>