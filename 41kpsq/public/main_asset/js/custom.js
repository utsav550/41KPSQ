jQuery('#frmRegi').submit(function(e){

    e.preventDefault();
    jQuery.ajax({
        url:'registration_proccess',
        data:jQuery('#frmRegi').serialize(),
        type:'post',
        success:function(result){

        }
    });
});