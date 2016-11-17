<?php
use Cake\Core\Configure;

?>

<style xmlns="http://www.w3.org/1999/html">
    .required fieldset:after {
        color: #ff0000;
        content: " *";
        font-size: 16px;
        position: relative;
        top: 9px;
    }

    .error {
        border: 2px solid red;
    }

    .tabs-wrap {
        margin-top: 40px;
    }

    .tab-content .tab-pane {
        padding: 20px 0;
    }
</style>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Tax Assessments'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Tax Assessment') ?></li>

    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Tax Assessment') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Name (Bangla)') ?></th>
                            <th><?= __('Property Type Table Name') ?></th>
                            <th><?= __('Dohs') ?></th>
                            <th><?= __('Assessed Amount') ?></th>
                            <th><?= __('Total Amount') ?></th>
                            <th><?= __('Remarks') ?></th>
                        </tr>
                        </thead>
                        <?= $this->Form->create('TaxAssessments', ['class' => 'form-horizontal', 'role' => 'form']) ?>
                        <tbody>

                        <?php
                        //if (isset($property_to_assess) && $property_to_assess == true) {
                            foreach ($tax_calculation['Apartments'] as $key => $apartment_assessments) { ?>
                                <tr>
                                    <?php
                                    $apartment_owner_id = $apartment_assessments['owner_id'];
                                    $property_id = $apartment_assessments['property_id'];
                                    $tax = $apartment_assessments['tax_settings_id'];
                                    $assessed_amount = $apartment_assessments['assessed_amount'];
                                    $property_type_table_name = $apartment_assessments['property_type_table_name'];

                                    ?>
                                    <td><?= $apartment_assessments['owner_name'];
                                        ?></td>
                                    <td><?= $apartment_assessments['property_type_table_name'];
                                        ?></td>
                                    <td><?= $apartment_assessments['dohss_title_bn'];
                                        ?></td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $apartment_owner_id . '""', ['name' => 'Owner[' . $apartment_owner_id . '][assessed_amount]', 'label' => false, 'default' => $apartment_assessments['assessed_amount'], 'disabled' => true, 'type' => 'text', 'class' => 'form-control any-number-validation assessed-amount']);
                                        ?>
                                    </td>
                                    <td>

                                        <?= $this->Form->input('Owner.' . $apartment_owner_id . '[]', ['name' => 'Owner[' . $apartment_owner_id . '][]', 'default' => $apartment_owner_id, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $apartment_owner_id . '' . $apartment_assessments['dohs_id'] . '', ['name' => 'Owner[' . $apartment_owner_id . '][dohs_id]', 'label' => false, 'default' => $apartment_assessments['dohs_id'], 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $apartment_owner_id . '' . $assessed_amount . '', ['name' => 'Owner[' . $apartment_owner_id . '][assessed_amount]', 'label' => false, 'default' => $assessed_amount, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $apartment_owner_id . '' . $property_id . '', ['name' => 'Owner[' . $apartment_owner_id . '][property_id]', 'default' => $property_id, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $apartment_owner_id . '' . $property_type_table_name . '', ['name' => 'Owner[' . $apartment_owner_id . '][property_type_table_name]', 'default' => $apartment_assessments['property_type_table_name'], 'label' => false, 'type' => 'hidden']);

                                        ?>

                                        <?= $this->Form->input('Owner.' . $apartment_owner_id . '' . $tax . '', ['name' => 'Owner[' . $apartment_owner_id . '][tax_settings_id]', 'default' => $tax, 'label' => false, 'type' => 'hidden']);

                                        ?>

                                        <?= $this->Form->input('Owner.' . $apartment_owner_id . '""', ['name' => 'Owner[' . $apartment_owner_id . '][total_amount]', 'label' => false, 'default' => '', 'type' => 'text', 'class' => 'form-control any-number-validation total-amount-assessed', 'onpaste' => 'return false;', 'required' => true]);

                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $apartment_owner_id . '""', ['name' => 'Owner[' . $apartment_owner_id . '][remarks]', 'type' => 'textarea', 'default' => '', 'label' => false]);
                                        ?>
                                    </td>
                                </tr>

                            <?php } ?>

                            <?php foreach ($tax_calculation['Houses'] as $key => $houses_assessments) { ?>
                                <tr>
                                    <?php
                                    $house_owner_id = $houses_assessments['owner_id'];
                                    $property_id = $houses_assessments['property_id'];
                                    $tax = $houses_assessments['tax_settings_id'];
                                    $assessed_amount = $houses_assessments['assessed_amount'];
                                    $property_type_table_name = $houses_assessments['property_type_table_name'];
                                    ?>
                                    <td><?= $houses_assessments['owner_name'];
                                        ?></td>
                                    <td><?= $houses_assessments['property_type_table_name'];
                                        ?></td>
                                    <td><?= $houses_assessments['dohss_title_bn'];
                                        ?></td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $house_owner_id . '""', ['name' => 'Owner[' . $house_owner_id . '][assessed_amount]', 'label' => false, 'default' => $houses_assessments['assessed_amount'], 'disabled' => true, 'type' => 'text', 'class' => 'form-control any-number-validation assessed-amount']);
                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $house_owner_id . '[]', ['name' => 'Owner[' . $house_owner_id . '][]', 'default' => $house_owner_id, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $house_owner_id . '' . $houses_assessments['dohs_id'] . '', ['name' => 'Owner[' . $house_owner_id . '][dohs_id]', 'label' => false, 'default' => $houses_assessments['dohs_id'], 'type' => 'hidden']);

                                        ?>

                                        <?= $this->Form->input('Owner.' . $house_owner_id . '' . $assessed_amount . '', ['name' => 'Owner[' . $house_owner_id . '][assessed_amount]', 'label' => false, 'default' => $assessed_amount, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $house_owner_id . '' . $property_id . '', ['name' => 'Owner[' . $house_owner_id . '][property_id]', 'default' => $property_id, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $house_owner_id . '' . $property_type_table_name . '', ['name' => 'Owner[' . $house_owner_id . '][property_type_table_name]', 'default' => $property_type_table_name, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $house_owner_id . '' . $tax . '', ['name' => 'Owner[' . $house_owner_id . '][tax_settings_id]', 'default' => $tax, 'label' => false, 'type' => 'hidden']);

                                        ?>

                                        <?= $this->Form->input('Owner.' . $house_owner_id . '""', ['name' => 'Owner[' . $house_owner_id . '][total_amount]', 'label' => '', 'default' => '', 'type' => 'text', 'class' => 'form-control any-number-validation total-amount-assessed', 'onpaste' => 'return false;', 'required' => true]);

                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $house_owner_id . '""', ['name' => 'Owner[' . $house_owner_id . '][remarks]', 'type' => 'textarea', 'default' => '', 'label' => false]);
                                        ?>
                                    </td>
                                </tr>

                            <?php } ?>


                            <?php foreach ($tax_calculation['Plots'] as $key => $plot_assessments) { ?>
                                <tr>
                                    <?php
                                    $plot_owner_id = $plot_assessments['owner_id'];
                                    $property_id = $plot_assessments['property_id'];
                                    $tax = $plot_assessments['tax_settings_id'];
                                    $assessed_amount = $plot_assessments['assessed_amount'];
                                    $property_type_table_name = $plot_assessments['property_type_table_name'];
                                    ?>
                                    <td><?= $plot_assessments['owner_name'];
                                        ?></td>
                                    <td><?= $plot_assessments['property_type_table_name'];
                                        ?></td>
                                    <td><?= $plot_assessments['dohss_title_bn'];
                                        ?></td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $plot_owner_id . '""', ['name' => 'Owner[' . $plot_owner_id . '][assessed_amount]', 'label' => false, 'default' => $plot_assessments['assessed_amount'], 'disabled' => true, 'type' => 'text', 'class' => 'form-control any-number-validation assessed-amount']);
                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $plot_owner_id . '[]', ['name' => 'Owner[' . $plot_owner_id . '][]', 'default' => $plot_owner_id, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $plot_owner_id . '' . $plot_assessments['dohs_id'] . '', ['name' => 'Owner[' . $plot_owner_id . '][dohs_id]', 'label' => false, 'default' => $plot_assessments['dohs_id'], 'type' => 'hidden']);

                                        ?>

                                        <?= $this->Form->input('Owner.' . $plot_owner_id . '' . $assessed_amount . '', ['name' => 'Owner[' . $plot_owner_id . '][assessed_amount]', 'label' => false, 'default' => $assessed_amount, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $plot_owner_id . '' . $property_id . '', ['name' => 'Owner[' . $plot_owner_id . '][property_id]', 'default' => $property_id, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $plot_owner_id . '' . $property_type_table_name . '', ['name' => 'Owner[' . $plot_owner_id . '][property_type_table_name]', 'default' => $property_type_table_name, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $plot_owner_id . '' . $tax . '', ['name' => 'Owner[' . $plot_owner_id . '][tax_settings_id]', 'default' => $tax, 'label' => false, 'type' => 'hidden']);

                                        ?>

                                        <?= $this->Form->input('Owner.' . $plot_owner_id . '""', ['name' => 'Owner[' . $plot_owner_id . '][total_amount]', 'label' => '', 'default' => '', 'type' => 'text', 'class' => 'form-control any-number-validation total-amount-assessed', 'onpaste' => 'return false;', 'required' => true]);

                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $plot_owner_id . '""', ['name' => 'Owner[' . $plot_owner_id . '][remarks]', 'type' => 'textarea', 'default' => '', 'label' => false]);
                                        ?>
                                    </td>
                                </tr>

                            <?php } ?>
                            <?php foreach ($tax_calculation['Buildings'] as $key => $building_assessments) { ?>
                                <tr>
                                    <?php
                                    $building_owner_id = $building_assessments['owner_id'];
                                    $property_id = $building_assessments['property_id'];
                                    $tax = $building_assessments['tax_settings_id'];
                                    $assessed_amount = $building_assessments['assessed_amount'];
                                    $property_type_table_name = $building_assessments['property_type_table_name'];
                                    ?>
                                    <td><?= $building_assessments['owner_name'];
                                        ?></td>
                                    <td><?= $building_assessments['property_type_table_name'];
                                        ?></td>
                                    <td><?= $building_assessments['dohss_title_bn'];
                                        ?></td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $building_owner_id . '""', ['name' => 'Owner[' . $building_owner_id . '][assessed_amount]', 'label' => false, 'default' => $building_assessments['assessed_amount'], 'disabled' => true, 'type' => 'text', 'class' => 'form-control any-number-validation assessed-amount']);
                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $building_owner_id . '[]', ['name' => 'Owner[' . $building_owner_id . '][]', 'default' => $building_owner_id, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $building_owner_id . '' . $building_assessments['dohs_id'] . '', ['name' => 'Owner[' . $building_owner_id . '][dohs_id]', 'label' => false, 'default' => $building_assessments['dohs_id'], 'type' => 'hidden']);

                                        ?>

                                        <?= $this->Form->input('Owner.' . $building_owner_id . '' . $assessed_amount . '', ['name' => 'Owner[' . $building_owner_id . '][assessed_amount]', 'label' => false, 'default' => $assessed_amount, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $building_owner_id . '' . $property_id . '', ['name' => 'Owner[' . $building_owner_id . '][property_id]', 'default' => $property_id, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $building_owner_id . '' . $property_type_table_name . '', ['name' => 'Owner[' . $building_owner_id . '][property_type_table_name]', 'default' => $property_type_table_name, 'label' => false, 'type' => 'hidden']);

                                        ?>
                                        <?= $this->Form->input('Owner.' . $building_owner_id . '' . $tax . '', ['name' => 'Owner[' . $building_owner_id . '][tax_settings_id]', 'default' => $tax, 'label' => false, 'type' => 'hidden']);

                                        ?>

                                        <?= $this->Form->input('Owner.' . $building_owner_id . '""', ['name' => 'Owner[' . $building_owner_id . '][total_amount]', 'label' => '', 'default' => '', 'type' => 'text', 'class' => 'form-control any-number-validation total-amount-assessed', 'onpaste' => 'return false;', 'required' => true]);

                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->input('Owner.' . $building_owner_id . '""', ['name' => 'Owner[' . $building_owner_id . '][remarks]', 'type' => 'textarea', 'default' => '', 'label' => false]);
                                        ?>
                                    </td>
                                </tr>

                            <?php }
                      //  } ?>


                        </tbody>
                    </table>
                </div>

                <?= $this->Form->button(__('Submit'), ['class' => 'btn blue tax-assessment-submit center-block', 'style' => 'margin-top:1px']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

<script>
    $(document).ready(function () {
        var is_disabled_submit_button = false;
        $(document).on('input', '.total-amount-assessed', function (e) {
            var total_amount = parseFloat($(this).val());
            var assessed_amount = parseFloat($(this).closest('tr').find('.assessed-amount').val());
            console.log(total_amount);
            console.log(assessed_amount);
            if (assessed_amount < total_amount) {
                $(this).attr('class', 'form-control any-number-validation total-amount-assessed error');
                $('.tax-assessment-submit').attr('disabled', true);
                is_disabled_submit_button = true;
                return $("body").overhang({
                    type: "error",
                    message: cantonment_translation.total_amount_is_greater_than_assessed,
                    duration: 1
                });
            }
            else {
                //is_disabled_submit_button = false;
                $('.tax-assessment-submit').attr('disabled', false);
                $(this).attr('class', 'form-control any-number-validation total-amount-assessed');

            }
        });
        $(document).on('click', '.tax-assessment-submit', function (e) {
//            if (is_disabled_submit_button == true) {
//                console.log(is_disabled_submit_button);
//                $('.tax-assessment-submit').attr('disabled', true);
//                e.preventDefault();
//            }
        });

    });
</script>