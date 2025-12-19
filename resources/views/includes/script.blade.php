<script>
    
    function ajaxResponseModal(response){
        if(response.message){
            if(response.response_code == 200){
                responseToast(response.message,'bg-success');
                setTimeout(() => {
                        window.location.href = '{{url()->current()}}';
                }, 1000);
            } else{
                responseToast(response.message,'bg-warning');
            }
        } else{
            responseToast(response,'bg-warning');
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
        if(response.code==200){
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
        
          $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1);
      });
  });
  
  $('.contact_admin').on('click',function(e){
    e.preventDefault();
      responseToast('Please contact to admin.','bg-warning');
  });
</script>