<!--   Help Section Start     -->

<?php
$urlcallschedule = \yii\helpers\Url::toRoute(['site/requestcall']);
$merchant_id = Yii::$app->user->identity->id;

$data = \frontend\modules\walmart\components\Data::sqlRecords("SELECT * FROM `call_schedule` WHERE `status`='" . \frontend\modules\walmart\controllers\SiteController::PENDING . "' AND `marketplace`='" . \frontend\modules\walmart\controllers\SiteController::MARKETPLACE . "'", 'all');

?>

<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center;font-family: " Comic Sans MS";">Schedule a Call Back
                     !!!</h4>
                 </div>
                 <div class="modal-body">
                    <h4 style="text-align: center;">Let us contact you at your best availability!
                    </h2>
                    <h4>Tell us the time and date</h3>
                    <div>
                        <span> Enter your phone number: </span>
                        <input class="callschedule-input" type="text"
                        id="walmart_call_schedule" name="walmart_call_schedule" autocomplete="off"
                        placeholder="+1 201-555-5555"
                        value="">
                        <!--<button class="btn btn-primary btn-call" type="button"
                                onClick="callschedule(this);" title="Number for call schedule">Request a call-back
                            </button>-->
                        </div>
                        <div>
                            <span>Choose Date</span>
                            <input class="callschedule-input" size="16" type="text" value="" readonly id="form_datetime" placeholder="dd/mm/YYYY">
                        </div>

                        <div>
                            <span>Choose Time Slot</span>
                            <select name="time1" id="time1">
                                <option value="">Please Select</option>
                                <?php
                                for($i = 1 ; $i < 12 ; $i++)
                                    { ?>
                                <option value="<?= $i. ' to ' . ($i+1) ?>"><?= $i. ' to ' . ($i+1) ?></option>
                                <?php }
                                ?>
                            </select>
                            <select name="time2" id="time2">
                                <option value="">Please Select</option>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                           

                        </div>

                        <div>
                            <button class="btn btn-primary" type="button"
                            onClick="callschedule(this);" title="Number for call schedule">Request a call-back
                        </button>
                    </div>

                    <h4>You are already the [<?php if (count($data) > 0) {
                        echo count($data);
                    } else {
                        echo 'First';
                    } ?>] person who ordered a call. </h4>

                </div>

                <div class="modal-footer Attrubute_html">
                    <div class="v_error_msg" style="display:none;"></div>
                    <div class="v_success_msg alert-success alert" style="display:none;"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--   Help Section end     -->
<!--
<style type="text/css">
    .cp-brand-input {
        height: 60px;
        margin-left: 50px;
        margin-top: 20px;
        padding: 15px 15px 15px 38px;
        width: 250px;
    }

    .btn-call {
        height: 60px;
        /*margin-top: 20px;*/
        width: 200px;
    }

    /*.modal-body{
        text-align: center;
    }*/

</style>-->
<script>
    function callschedule() {

        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var phonenumber = $('#walmart_call_schedule').val();
        var date = $('#form_datetime').val();
        var timezone = $('#time-zone').val();
        var time = $('#time1').val();
        var format = $('#time2').val();

        var url = '<?= $urlcallschedule; ?>';
        $.ajax({
            method: "post",
            url: url,
            dataType: 'json',
            data: {
                number: phonenumber,
                date: date,
                timezone: timezone,
                time:time,
                format:format,
                _csrf: csrfToken
            }
        })
        .done(function (msg) {
            if (msg.success) {
                j$('.v_success_msg').html('');
                j$('.v_success_msg').append("Your request for call is excepted.");
                j$('.v_error_msg').hide();
                j$('.v_success_msg').show();
                setTimeout(function () {
                    window.location.reload();
                }, 3000);
            }
            else if (msg.error) {
                j$('.v_error_msg').html('');
                j$('.v_error_msg').append(msg.message);
                j$('.v_success_msg').hide();
                j$('.v_error_msg').show();
            }
            else {
                j$('.v_error_msg').html('');
                j$('.v_error_msg').append("something went wrong.");
                j$('.v_success_msg').hide();
                j$('.v_error_msg').show();
            }

        });

    }

    $("#form_datetime").datepicker();
</script>


