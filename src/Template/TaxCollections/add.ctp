<?php
use Cake\Core\Configure;
use Cake\Database\Schema\Collection;

?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Tax Collections'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Tax Collection') ?></li>

    </ul>
</div>
<style>

</style>

<div class="row-fluid">
    <div class="container-fluid">
        <div class="col-xs-12">
            <!-- BEGIN BORDERED TABLE PORTLET-->
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus-square-o fa-lg"></i><?= __('Tax Collection') ?>
                    </div>
                    <div class="tools">
                        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                        <button type="button" id="resize_table" class="fullscreen btn  btn-sm btn-primary">Full Screen
                        </button>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th><?= __('Name (Bangla)') ?></th>
                                <th><?= __('Property Type Table Name') ?></th>


                                <th><?= __('Assessed Amount') ?></th>

                                <th><?= __('Rebet') ?></th>
                                <th><?= __('Late Fee') ?></th>

                                <th><?= __('Fine') ?></th>
                                <th><?= __('Base') ?></th>
                                <th><?= __('Previously Collected Amount') ?></th>
                                <th><?= __('Collection Amount') ?></th>
                                <th><?= __('Total Amount') ?></th>

                            </tr>
                            </thead>
                            <?= $this->Form->create('TaxCollection', ['class' => 'form-horizontal', 'role' => 'form']) ?>
                            <tbody>
                            <?php
                            $collection_amount = [];
                            foreach ($tax_assessed as $key => $tax_assessed) { ?>
                                <tr>
                                    <?php
                                    $tax_assessment_id = $tax_assessed['id'];
                                    $owner_id = $tax_assessed['owner_id'];
                                    $property_id = $tax_assessed['property_id'];
                                    $tax = $tax_assessed['tax_settings_id'];
                                    $assessed_amount = $tax_assessed['assessed_amount'];
                                    $dohs_id = $tax_assessed['dohs_id'];
                                    $assess_date = $tax_assessed['assess_date'];
                                    $assess_by = $tax_assessed['assess_by'];

                                    $economic_year = $tax_assessed['tax_setting']['economic_year'];
                                    $property_type_table_name = $tax_assessed['property_type_table_name'];

                                    ?>
                                    <td><?= $tax_assessed['owner']['name_bn'];
                                        ?></td>
                                    <td><?= $tax_assessed['owner']['property_type_table_name'];
                                        ?></td>
                                    <?= $this->Form->input('TaxCollection.' . $owner_id . '', ['name' => 'TaxCollection[' . $owner_id . '][economic_year]', 'label' => false, 'default' => $economic_year, 'onpaste' => 'return false;', 'type' => 'hidden', 'class' => 'form-control any-number-validation']);
                                    ?>

                                    <td>
                                        <?= $this->Form->input('TaxCollection.' . $owner_id . '' . $tax_assessed['assessed_amount'] . '', ['name' => 'TaxCollection[' . $owner_id . '][assessed_amount]', 'onpaste' => 'return false;', 'label' => false, 'default' => $tax_assessed['assessed_amount'], 'readonly' => true, 'type' => 'text', 'class' => 'form-control any-number-validation assessed-amount']);
                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('TaxCollection.' . $owner_id . '""', ['name' => 'TaxCollection[' . $owner_id . '][rebet_amount]', 'label' => false, 'default' => '', 'disabled' => false, 'type' => 'text', 'onpaste' => 'return false;', 'class' => 'form-control any-number-validation rebet-amount get-sum-class']);
                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('TaxCollection.' . $owner_id . '""', ['name' => 'TaxCollection[' . $owner_id . '][late_fee_amount]', 'label' => false, 'default' => '', 'disabled' => false, 'type' => 'text', 'onpaste' => 'return false;', 'class' => 'form-control any-number-validation late-fee-amount get-sum-class']);
                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('TaxCollection.' . $owner_id . '""', ['name' => 'TaxCollection[' . $owner_id . '][fine_amount]', 'label' => false, 'default' => '', 'disabled' => false, 'type' => 'text', 'onpaste' => 'return false;', 'class' => 'form-control any-number-validation fine-amount get-sum-class']);
                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('TaxCollection.' . $owner_id . '' . $tax_assessed['total_amount'] . '', ['name' => 'TaxCollection[' . $owner_id . '][base_amount]', 'label' => false, 'onpaste' => 'return false;', 'default' => $tax_assessed['total_amount'], 'readonly' => true, 'onpaste' => 'return false;', 'type' => 'text', 'class' => 'form-control any-number-validation base-amount']);
                                        ?>

                                        <?= $this->Form->input('TaxCollection.' . $owner_id . '[]', ['name' => 'TaxCollection[' . $owner_id . '][]', 'default' => $owner_id, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('TaxCollection.' . $owner_id . '' . $tax_assessed['id'] . '', ['name' => 'TaxCollection[' . $owner_id . '][tax_assessment_id]', 'default' => $tax_assessed['id'], 'label' => false, 'type' => 'hidden']);

                                        ?>

                                    </td>
                                    <td><?php
                                        $sum_to_prv_col = 0;
                                        foreach ($tax_assessed['tax_collection_histories'] as $data) {

                                            //pr($data['collected_amount']);
                                            $sum_to_prv_col += $data['collected_amount'];
                                        }
                                        //   echo $this->Form->input('prev_amount', ['label' => false, 'readonly' => true, 'default' => $sum_to_prv_col]);
                                        ?>
                                        <?= $this->Form->input('TaxCollection.' . $owner_id . '""', ['name' => 'TaxCollection[' . $owner_id . '][prev_amount]', 'label' => false, 'default' => $sum_to_prv_col, 'readonly' => true, 'type' => 'text', 'required' => false, 'autocomplete' => 'off', 'class' => 'form-control any-number-validation prev-amount-collected']);
                                        ?>

                                        <?php
                                        //hidden field for submitting readonly field
                                        echo $this->Form->input('TaxCollection.' . $owner_id . '""', ['name' => 'TaxCollection[' . $owner_id . '][prev_amount]', 'label' => false, 'default' => $sum_to_prv_col, 'readonly' => true, 'type' => 'text', 'required' => false, 'type' => 'hidden', 'autocomplete' => 'off', 'class' => 'form-control any-number-validation prev-amount-collected']);
                                        ?>
                                    </td>
                                    <?= $this->Form->input('TaxCollection.' . $owner_id . '' . $tax . '', ['name' => 'TaxCollection[' . $owner_id . '][tax_settings_id]', 'default' => $tax, 'label' => false, 'type' => 'hidden']);

                                    ?>
                                    <td>
                                        <?= $this->Form->input('TaxCollection.' . $owner_id . '""', ['name' => 'TaxCollection[' . $owner_id . '][collection_amount]', 'label' => false, 'default' => '', 'type' => 'text', 'class' => 'form-control any-number-validation get-sum-class', 'onpaste' => 'return false;']);

                                        ?>
                                    </td>


                                    <td>
                                        <?= $this->Form->input('TaxCollection.' . $owner_id . '""', ['name' => 'TaxCollection[' . $owner_id . '][total_amount]', 'label' => false, 'readonly' => false, 'default' => '', 'type' => 'text', 'required' => true, 'autocomplete' => 'off', 'class' => 'form-control any-number-validation total-amount-collected']);

                                        ?>
                                    </td>
                                </tr>

                            <?php }
                            ?>
                            </tbody>

                        </table>


                    </div>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn blue center-block', 'id' => 'calculate_tax', 'style' => 'margin-top:20px']) ?>
                    <?= $this->Form->end() ?>

                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>
</div>

<?php

debug($collection_amount);
?>
<script>
    $(document).ready(function () {


        $("#resize_table").trigger('click');

        $(".get-sum-class").each(function () {
            var that = this;
            $(this).keyup(function () {
                total_sum.call(that);
            });
        });

        function total_sum() {
            var sum = 0;
            var thisRow = $(this).closest('tr');
            var $this = $(this);
            thisRow.find('.get-sum-class').each(function () {
                var value_m = parseFloat(this.value) || 0;
                sum += value_m;
            });

            if (thisRow.closest('tr').find('.base-amount').val() < sum) {
                $this.val("");
                thisRow.closest('tr').find('.total-amount-collected').val("");
                return $("body").overhang({
                    type: "error",
                    message: cantonment_translation.total_amount_is_greater_than_assessed,
                    duration: duration_of_error_msg
                });
            }

            else {
                thisRow.closest('tr').find('.total-amount-collected').val(sum);
            }
        }

        $(".total-amount-collected").on('keydown paste', function (e) {

            e.preventDefault();
        });
//        $(document).on('click', '#get_total', function (e) {
//            $('tr').each(function () {
//                var sum = 0;
//                $(this).find('.get-sum-class').each(function () {
//                    var field = replaceNumbers($(this).val());
//                    if (!isNaN(field) && field.length !== 0) {
//                        sum += parseFloat(field);
//                    }
//                });
//                $(this).closest('tr').find('.total-amount-collected').val(sum);
//            });
//            e.preventDefault();
//        });

//        $(document).on('click', '#calculate_tax', function (e) {
//            if ($('.total-amount-collected').val() =='' || 0) {
//                return $("body").overhang({
//                    type: "error",
//                    message: cantonment_translation.total_amount_calculate_msg,
//                    duration: duration_of_error_msg
//                });
//                e.preventDefault();
//
//
//            }
//
//        });
    });
</script>

