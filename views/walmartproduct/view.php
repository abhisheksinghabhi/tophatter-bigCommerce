<?php
use yii\helpers\Html;


$html = '<table class="table table-striped table-bordered" cellspacing="0" width="100%"><tbody>';
foreach ($data as $key => $value) {
    if ($key == 'quantity') {
        $html .= '
            <tr>
                <td class="value_label" style="text-align: center">
                    <strong>' . strtoupper($key) . '</strong>
                </td>
                <td class="value form-group " width="100%">
                    <span> ' . $value['amount'] . ' [ '.$value['unit'].' ] </span>
                </td>
                
            </tr>';
        //echo "array";var_dump($value);
        /*foreach ($value as $k => $v) {
            $html .= '
            <tr>
                <td class="value_label" width="33%">
                    <span>' . strtoupper($k) . '</span>
                </td>
                <td class="value form-group " width="100%">
                    <span>' . $v . '</span>
                </td>
            </tr>';
        }*/

    } elseif ($key == 'price') {
        $html .= '
            <tr>
                <td class="value_label" style="text-align: center">
                    <strong>' . strtoupper($key) . '</strong>
                </td>
                <td class="value form-group " width="100%">
                    <span> ' . $value['amount'] . ' [ '.$value['currency'].' ] </span>
                </td>
                
            </tr>';
       /* foreach ($value as $k => $v) {
            $html .= '
            <tr>
                <td class="value_label" width="33%">
                    <span>' . strtoupper($k) . '</span>
                </td>
                <td class="value form-group " width="100%">
                    <span>' . $v . '</span>
                </td>
            </tr>';
        }*/

    } else {
        //echo "echo";var_dump($value);
        $html .= '
        <tr>
            <td class="value_label" width="33%">
                <strong>' . strtoupper($key) . '</strong>
            </td>
            <td class="value form-group " width="100%">
                <span>' . $value . '</span>
                
            </td>
        </tr>';
    }
}
$html .= '</tbody></table>';
?>
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center;font-family: " Comic Sans MS";">Product
                    Information on Walmart</h4>
                </div>
                <div class="modal-body">
                    <?= $html ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .form-group {
        margin: 0 0 0;
    }
</style>
