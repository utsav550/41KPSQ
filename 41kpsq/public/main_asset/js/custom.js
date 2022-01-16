jQuery('#frmRegi').submit(function(e){

    e.preventDefault();
    jQuery('.field_error').html('');
    jQuery.ajax({
        url:'registration_proccess',
        data:jQuery('#frmRegi').serialize(),
        type:'post',
        success:function(result){
            
            if(result.status=="error"){
                jQuery.each(result.error,function(key,val){
                    jQuery('#'+key+'_error').html(val[0]);
                });
            }
            if(result.status=="success"){
                jQuery('#frmRegi')[0].reset();
                jQuery('#thanks').html(result.msg);
              }
        }
    });
});

jQuery('#frmlogin').submit(function(e){
    jQuery('#login_msg').html("");
    e.preventDefault();
    jQuery.ajax({
      url:'/login_process',
      data:jQuery('#frmlogin').serialize(),
      type:'post',
      success:function(result){
        if(result.status=="error"){
          jQuery('#login_msg').html(result.msg);
        }
        
        if(result.status=="success"){
         window.location.href='/member/userDash'
          //jQuery('#frmLogin')[0].reset();
          //jQuery('#thank_you_msg').html(result.msg);
        }
      }
    });
  });

  jQuery('#frmForgot').submit(function(e){
    jQuery('#forgot_msg').html("Please wait...");
    
    e.preventDefault();
    jQuery.ajax({
      url:'/forgotpassword',
      data:jQuery('#frmForgot').serialize(),
      type:'post',
      success:function(result){
        console.log(result);
        jQuery('#forgot_msg').html(result.msg);
      }
    });
  });
  
  jQuery('#frmUpdatePassword').submit(function(e){
    jQuery('#thank_you_msg').html("Please wait...");
    jQuery('#thank_you_msg').html("");
    e.preventDefault();
    jQuery.ajax({
      url:'/forgot_password_change_process',
      data:jQuery('#frmUpdatePassword').serialize(),
      type:'post',
      success:function(result){
       
        jQuery('#frmUpdatePassword')[0].reset();
        jQuery('#thank_you_msg').html("Password Updated!");
        if(result.status=="success"){
          window.location.href='/loginuser'
           //jQuery('#frmLogin')[0].reset();
           //jQuery('#thank_you_msg').html(result.msg);
         }
    }
  });
});
  

jQuery('#frmgallery').submit(function(e){

  e.preventDefault();
  jQuery('.field_error').html('');
  jQuery.ajax({
      url:'gallery_load',
      data:jQuery('#frmgallery').serialize(),
      type:'post',
      success:function(result){
          
          if(result.status=="error"){
              jQuery.each(result.error,function(key,val){
                  jQuery('#'+key+'_error').html(val[0]);
              });
          }
          if(result.status=="success"){
              jQuery('#frmRegi')[0].reset();
              jQuery('#thanks').html(result.msg);
            }
      }
  });
});

jQuery('#link').keyup(function(e){

  e.preventDefault();
  jQuery('.field_error').html('');
  jQuery.ajax({
      url:'/member/link',
      data:jQuery('#id').serialize(),
      type:'post',
      success:function(result){
          
          if(result.status=="error"){
              jQuery.each(result.error,function(key,val){
                  jQuery('#result_error').html(val[0]);
              });
          }
          if(result.status=="success"){
            jQuery.each(result.error,function(key,val){
              jQuery('#linkresult').html(val[0]);
          });
            }
      }
  });
});
