<?php

use Cake\Core\Configure;

?>
<style xmlns="http://www.w3.org/1999/html">
    .required label:after {
        color: #ff0000;
        content: " *";
        font-size: 16px;
        position: relative;
        top: 9px;
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
            <?= $this->Html->link(__('Owners'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Owner') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('New Owner') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($owner, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('name_en', ['label' => __('Name (English)')]);
                        echo $this->Form->input('name_bn', ['label' => __('Name (Bangla)'), 'required' => true]);
                        echo $this->Form->input('father_name_en', ['label' => __('Father Name (English)')]);
                        echo $this->Form->input('father_name_bn', ['label' => __('Father Name (Bangla)')]);
                        echo $this->Form->input('mother_name_en', ['label' => __('Mother Name (English)')]);
                        echo $this->Form->input('mother_name_bn', ['label' => __('Mother Name (Bangla)')]);
                        echo $this->Form->input('spouse_name_en', ['label' => __('Spouse Name (English)')]);
                        echo $this->Form->input('spouse_name_bn', ['label' => __('Spouse Name (Bangla)')]);
                        echo $this->Form->input('present_address', ['type' => 'textarea']);
                        echo $this->Form->input('permanent_address', ['type' => 'textarea']);
                        // echo $this->Form->input('owner.0.picture', ['type' => 'file']);
                        ?>
                    </div>
                    <div class="col-md-6">

                        <?php
                        echo $this->Form->input('ownership_type', ['options' => Configure::read('building_ownership_type'), 'required' => true, 'label' => __('Ownership Type')]);
                        echo $this->Form->input('usage_type', ['options' => Configure::read('usage_type')]);
                        echo $this->Form->input('property_type_table_name', ['required' => true, 'options' => Configure::read('property_type'), 'empty' => __('Select')]);
                        echo $this->Form->input('dohs_id', ['options' => $dohs, 'required' => true, 'empty' => __('Select')]);
                        echo $this->Form->input('building_id', ['id'=>'building-id','empty' => __('Select')]);
                        echo $this->Form->input('property_id', ['class' => 'select2me form-control', 'required' => true, 'empty' => __('Select')]);
                        echo $this->Form->input('owner_type', ['options' => Configure::read('owner_type')]);
                        echo $this->Form->input('nid', ['class'=>'form-control nid-number','label' => __('NID'), 'type' => 'text']);
                        echo $this->Form->input('dob', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Date of Birth')]);
                        echo $this->Form->input('religion', ['options' => Configure::read('religions')]);
                        echo $this->Form->input('gender', ['options' => Configure::read('genders')]);
                        echo $this->Form->input('mobile_number', ['class'=>'form-control mobile-number-validation','type' => 'text']);
                        echo $this->Form->input('phone_number', ['class'=>'form-control phone-number-validation','type' => 'text']);
                        echo $this->Form->input('email',['class'=>'form-control email-validation']);
                        echo $this->Form->input('apartment_owned', ['class'=>'form-control integer-validation','label' => __("Apartment Owned"), 'type' => 'text']);

                        echo $this->Form->input('own_percentage', ['class'=>'form-control integer-validation','label' => __("Owner's Percentage"), 'type' => 'text']);
                        ?>
                        <?php
                        echo $this->Form->input('last_mutation_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Last Mutation Date')]);
                        echo $this->Form->input('own_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Issue Date')]);
                        echo $this->Form->input('lease_expire_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Expire Date')]);
                        echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                        ?>
                    </div>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right','id'=>'submit-owner-form', 'style' => 'margin-top:20px']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

<script>
    $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
    var dohs_id = "";
    var property_type ="";

    $(document).ready(function () {
        $("#building-id").hide();
        $("#property-type-table-name").on('change', function () {
            $("#property-id").empty();
            property_type = $(this).val();
            console.log(property_type);
            if (property_type == "Apartments") {
                $("#building-id").show();
            }
            else{
                $("#building-id").hide();
            }



        });
        $("#dohs-id").on('change', function () {
            dohs_id = $(this).val();
            $("#property-id").empty();
            console.log(dohs_id);

            if (property_type == "Plots") {
                $("#building-id").hide();
                $("#property-id").empty();
                $.getJSON("<?php echo $this->url->build("/Owners/getPlots/")?>" + dohs_id
                    , function (plot_data) {
                        var plots = "";
                        $.each(plot_data, function (u_index, u_item) {
                            console.log(u_item)
                            plots += "<option value='" + u_item.id + "'>" + u_item.plot_number + "</option>";
                        });
                        $("#property-id").append(plots);

                    });

            }

            else if (property_type == "Buildings") {
                $("#property-id").empty();
                $("#building-id").hide();
                $.getJSON("<?php echo $this->url->build("/Owners/getBuildings/")?>" + dohs_id
                    , function (building_data) {
                        var buildings = "";
                        $.each(building_data, function (u_index, u_item) {
                            console.log(u_item)
                            buildings += "<option value='" + u_item.id + "'>" + u_item.title_bn + "</option>";
                        });
                        $("#property-id").append(buildings);

                    });

            }

            else if (property_type == "Apartments") {
               $("#building-id").show();

                $.getJSON("<?php echo $this->url->build("/Owners/getBuildings/")?>" + dohs_id
                    , function (building_data) {
                        var buildings = "";
                        $.each(building_data, function (u_index, u_item) {
                            console.log(u_item)
                            buildings += "<option value='" + u_item.id + "'>" + u_item.title_bn + "</option>";
                        });
                        $("#building-id").append(buildings);

                    });

            }

        });

        $("#building-id").on('change', function () {
            $("#property-id").empty();
            var building_id = $(this).val();
            $.getJSON("<?php echo $this->url->build("/Owners/getApartments/")?>" + dohs_id +"/"+building_id
                , function (apartments_data) {
                    var apartments = "";
                    $.each(apartments_data, function (u_index, u_item) {
                        console.log(u_item)
                        apartments += "<option value='" + u_item.id + "'>" + u_item.apartment_number + "</option>";
                    });
                    $("#property-id").append(apartments);

                });

        });

    });
</script>