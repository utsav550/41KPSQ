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