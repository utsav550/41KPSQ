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