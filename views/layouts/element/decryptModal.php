<!--Modal: modalPush-->
<div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center">
                <p class="heading">رمز گشایی</p>
            </div>

            <!--Body-->
            <form id="decryptForm" action="<?= rabint\helpers\uri::to(['/site/decrypt']) ?>" >
                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="publicKey">کلید عمومی</label>
                        <textarea class="form-control" id="publicKey" name="publicKey" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">متن</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="saveCookie" name="saveCookie"  value="1">
                        <label class="form-check-label" for="saveCookie">کلید عمومی در کوکی ذخیره شود</label>
                    </div>
                  
                </div>
                <!--Footer-->
                <div class="modal-footer flex-center">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                    <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">انصراف</a>
                </div>
            </form>
        </div>
    </div>
    <!--/.Content-->
</div>
</div>
<!--Modal: modalPush-->
<script>
    <?php ob_start(); ?>
        $(document).ready(function(){
            if($.cookie("publicKey")){
                $('#publicKey').val($.cookie("publicKey"));
                $('#saveCookie').prop("checked", true);
            }
        });
$('#decryptForm').on('submit',function(){
    if ($('#saveCookie').is(':checked')){

        $.cookie("publicKey", $('#publicKey').val());
    }else{
        $.removeCookie("publicKey");
    } // save cookie
    var form = $(this);
    $.ajax({
           type: "POST",
           url: form.attr('action'),
           data: form.serialize(), // serializes the form's elements.
           success: function(result)
           {
               var data = $.parseJSON(result);
               if(data.status == 1){
                   alert(data.result);
               }else{
                   alert(data.message);
               }
           },
           dataType:'json'
         });
         return false;
})  ; 
    <?php
    $script = ob_get_clean();
    $this->registerJs($script, $this::POS_END);
    ?>
    
</script>