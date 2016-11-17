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
        <li><?= __('Edit Owner') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Owner') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($owner, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('owner_type', ['options' => Configure::read('owner_type')]);
                            echo $this->Form->input('ownership_type', ['options' => Configure::read('building_ownership_type')]);
                            //  echo $this->Form->input('property_type');
                            echo $this->Form->input('property_type_table_name', ['disabled' => 'disabled']);
                            // echo $this->Form->input('property_id');
                            //    echo $this->Form->input('holding_numb,er_id', ['options' => $holdingNumbers, 'empty' => __('Select')]);
                            echo $this->Form->input('own_percentage', ['type' => 'text']);
                            echo $this->Form->input('apartment_owned', ['class'=>'form-control integer-validation','onpaste'=>'return false;','type' => 'text']);
                            echo $this->Form->input('usage_type', ['options' => Configure::read('usage_type')]);
                            echo $this->Form->input('name_en', ['label' => __('Name (English)')]);
                            echo $this->Form->input('name_bn', ['label' => __('Name (Bangla)'),'required'=>true]);
                            echo $this->Form->input('father_name_en', ['label' => __('Name (English)')]);
                            echo $this->Form->input('father_name_bn', ['label' => __('Father Name (Bangla)')]);
                            echo $this->Form->input('mother_name_en', ['label' => __('Mother Name (English)')]);
                            echo $this->Form->input('mother_name_bn', ['label' => __('Mother Name (Bangla)')]);
                            echo $this->Form->input('spouse_name_en', ['label' => __('Spouse Name (English)')]);
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('spouse_name_en', ['label' => __('Spouse Name (Bangla)')]);
                            echo $this->Form->input('nid',['class'=>'form-control nid-number','onpaste'=>'retrun false','label' => __('NID')]);
                            echo $this->Form->input('dob', ['label' => __('Date of Birth'), 'class' => 'datepicker form-control', 'type' => 'text']);
                            echo $this->Form->input('religion', ['options' => Configure::read('religions')]);
                            echo $this->Form->input('gender', ['options' => Configure::read('genders')]);
                            echo $this->Form->input('mobile_number',['class'=>'form-control mobile-number-validation']);
                            echo $this->Form->input('phone_number',['class'=>'form-control phone-number-validation']);
                            echo $this->Form->input('email',['class'=>'form-control email-validation']);
                            echo $this->Form->input('present_address');
                            echo $this->Form->input('permanent_address');
                            //  echo $this->Form->input('picture');
                            echo $this->Form->input('last_mutation_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Last Mutation Date')]);
                            echo $this->Form->input('own_date', ['class' => 'datepicker form-control', 'type' => 'text']);
                            echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                            echo $this->Form->input('lease_expire_date', ['class' => 'datepicker form-control', 'type' => 'text']);

                            ?>


                        </div>

                        <div class="col-md-12">
                            <label class="label label-success"><?php echo __("Edit Property Information");?></label>
                            <hr style="border: none; border-bottom: 1px solid ;"/>
                        </div>
                        <div class="col-md-8 col-sm-offset-1">
                            <?php
                            echo $this->Form->input('dohs_id', ['options' => $dohs, 'empty' => __('Select')]);
                            if ($property_type == "Apartments") {
                                echo $this->Form->input('building_id', ['empty' => __('Select')]);
                                echo $this->Form->input('property_id', ['label' => __('Apartment Number'),'options'=>$property_id, 'empty' => __('Select')]);
                            }
                            if ($property_type == "Buildings") {
                                echo $this->Form->input('property_id', ['label' => __('Building'), 'empty' => __('Select')]);
                            }
                            if ($property_type == "Plots") {
                                echo $this->Form->input('property_id', ['label' => __('Plots'), 'empty' => __('Select')]);
                            }
                            ?>
                        </div>

                    </div>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'style' => 'margin-top:20px']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

<script>
    $('.datepicker').datepicker({format: 'yyyy-mm-dd'});


    $("#dohs-id").on('change', function () {
        var dohs_id = $("#dohs-id").val();

        var property_type = "<?php echo $property_type?>";
        if (property_type == "Buildings") {
            $("#property-id").empty();
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
        $("#building-id").empty();
        $.getJSON("<?php echo $this->url->build("/Owners/getBuildings/")?>" + dohs_id
            , function (building_data) {
                var buildings = "";
                $.each(building_data, function (u_index, u_item) {
                    console.log(u_item)
                    buildings += "<option value='" + u_item.id + "'>" + u_item.title_bn + "</option>";
                });
                $("#building-id").append(buildings);

            });

    });
    $("#building-id").on('change', function () {
        var building_id = $("#building-id").val();
        var dohs_id = $("#dohs-id").val();
        $("#property-id").empty();
        $.getJSON("<?php echo $this->url->build("/Owners/getApartments/")?>" + "/" + dohs_id + "/" + building_id
            , function (apartment_data) {
                var apartments = "";
                $.each(apartment_data, function (u_index, u_item) {
                    console.log(u_item)
                    apartments += "<option value='" + u_item.id + "'>" + u_item.apartment_number + "</option>";
                });
                $("#property-id").append(apartments);

            });

    });

</script>