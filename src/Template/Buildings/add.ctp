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

    .red-star {
        color: red;
    }

    .modal .modal-dialog {
        width: 970px;
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
            <?= $this->Html->link(__('Buildings'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Add New Building') ?></li>

    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Building') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>

            <div class="portlet-body">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-target="#building-basic"
                                          data-toggle="tab"><?php echo __("Building's Basic"); ?></a></li>
                    <!--                    <li><a data-target="#building-owner" data-toggle="tab">Building Owner</a></li>-->
                    <li class="disabled"><a data-target="#plot-info"
                                            data-toggle="tab"><?php echo __("Plot info"); ?></a>
                    </li>
                    <!--                    <li><a class="disabled" data-target="#plot-owner-info" data-toggle="tab">-->
                    <?php //echo __("Plot Owner Info"); ?><!--</a>-->
                    </li>
                    <li class="disabled"><a data-target="#apartment-house"
                                            data-toggle="tab"><?php echo __('Apartment / House info'); ?></a></li>
                    <li class="disabled"><a data-target="#location-cost-info"
                                            data-toggle="tab"><?php echo __("Building's Location and Cost Info"); ?></a>
                    </li>

                    <!--                    <li><a data-target="#building-files" data-toggle="tab">Files</a></li>-->

                </ul>
                <?= $this->Form->create($building, ['class' => 'form-horizontal', 'role' => 'form', 'accept-charset' => 'UTF-8', 'id' => 'building-form', 'type' => 'file']) ?>
                <div class="tab-content">
                    <div class="tab-pane active" id="building-basic">
                        <div class="col-md-12"><h3><span
                                    class="label label-success"><?php echo __("Building's Basic"); ?></span></h3>
                            <hr/>
                        </div>

                        <div class="col-md-12" id="building-basic">

                            <div class="col-md-6">
                                <?php
                                echo $this->Form->input('title_en', ['label' => __('Building Title (English)')]);
                                echo $this->Form->input('title_bn', ['label' => __('Building Title (Bangla)')]);
                                //echo $this->Form->input('plot_number', ['name' => 'plot_number[]', 'class' => 'input_fields_wrap', 'type' => 'text', 'autocompelete' => 'off']);
                                ?>
                                <?php

                                echo $this->Form->input('road_number');
                                echo $this->Form->input('apartment_number', ['class' => 'form-control integer-validation', 'onpaste' => 'return false;', 'label' => __('Total Apartments'), 'type' => 'text']);
                                echo $this->Form->input('floor_number', ['class' => 'form-control integer-validation', 'onpaste' => 'return false;', 'type' => 'text', 'label' => __('Total Floors')]);
                                ?>

                                <div class="col-md-5"><label><?php echo __('Legal Info Available'); ?></label></div>
                                <?php
                                echo $this->Form->radio(
                                    'is_legal_info', [
                                        ['value' => 1, 'text' => __('Yes'), 'style' => 'color:red;'],
                                        ['value' => 0, 'text' => __('No'), 'style' => 'color:blue;']
                                    ]
                                );
                                ?></br>
                                <div class="col-md-5"><label><?php echo __('Septic Tank Info Available'); ?></label>
                                </div>
                                <?php
                                echo $this->Form->radio(
                                    'septic_tank_info', [
                                        ['value' => 1, 'text' => __('Yes'), 'style' => 'color:red;'],
                                        ['value' => 0, 'text' => __('No'), 'style' => 'color:blue;']
                                    ]
                                );
                                ?>
                            </div>

                            <div class="col-md-6">

                                <?php
                                echo $this->Form->input('developer_id', ['options' => $developers, 'empty' => __('Select')]);
                                echo $this->Form->input('build_type', ['options' => Configure::read('building_type')]);
                                echo $this->Form->input('build_status', ['options' => Configure::read('building_status')]);
                                echo $this->Form->input('roof_type', ['options' => Configure::read('roof_type')]);
                                echo $this->Form->input('build_purpose', ['options' => Configure::read('build_purpose')]);
                                ?>


                                <?php
                                echo $this->Form->input('plan_approve_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Approve Date')]);
                                echo $this->Form->input('work_start_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Start Date')]);
                                echo $this->Form->input('work_finish_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Finish Date')]);

                                ?>
                                <div class="col-md-5"><label><?php echo __('Garage Available'); ?></label></div>
                                <?php
                                echo $this->Form->radio(
                                    'is_garage_available', [
                                        ['value' => 1, 'text' => __('Yes'), 'style' => 'color:red;'],
                                        ['value' => 0, 'text' => __('No'), 'style' => 'color:blue;']
                                    ]
                                );
                                ?>
                                <?php echo $this->Form->input('status', ['options' => Configure::read('status_options')]); ?>
                            </div>

                        </div>

                        <?= $this->Form->button(__('Next'), ['class' => 'btn btn-primary pull-right continue', 'id' => 'building_basic_tab_next', 'type' => 'button', 'style' => 'margin-top:70px']) ?>
                    </div>
                    <br>

                    <div class="tab-pane" id="plot-info" disabled="false">
                        <div class="col-md-12"><h3><span
                                    class="label label-success"><?php echo __("Building's Plot  Info"); ?></span></h3>
                            <hr/>
                        </div>
                        <div class="col-md-12" id="plot-info">

                            <div class="col-md-8">
                                <button
                                    class="add_field_button btn btn-sm btn-primary"><?php echo __("Add More Plots"); ?></button>

                                <button class="btn btn-sm btn-primary" data-toggle="modal" href="#plot_modal"
                                        id='plot-add-modal' type="button"><?php echo __("Add New Plot"); ?>
                                </button>
                                <br><br>
                                <div id="plot-number-info">
                                    <?php echo $this->Form->input('dohs_id', ['options' => $dohss, 'empty' => __('Select')]); ?>

                                    <div class="form-group input input_fields_wrap text required">

                                        <label for="plot-number"
                                               class="col-sm-3 control-label text-right"><?php echo __('Plot Number 1') ?>
                                        </label>
                                        <div class="col-sm-7 container_plot_number">
                                            <input type="hidden" name="plot_ids[]" id="plot-id-hidden-1">
                                            <input required="required" onpaste="return false;" maxlength="100"
                                                   id="plot-number-1"
                                                   class="plot-number form-control" type="text" name="plot_number[]">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3 col-md-offset-8">
                                <?= $this->Form->button(__('Prev'), ['class' => 'btn btn-primary pull-right back', 'id' => 'plot_info_tab_back', 'type' => 'button', 'style' => 'margin-top:70px']) ?>
                            </div>
                            <?= $this->Form->button(__('Next'), ['class' => 'btn btn-primary pull-right continue', 'id' => 'plot_info_tab_next', 'type' => 'button', 'style' => 'margin-top:70px']) ?>
                        </div>
                    </div>


                    <div class="tab-pane" id="apartment-house">
                        <div class="col-md-12"><h3><span
                                    class="label label-success"><?php echo __('Apartment / House info'); ?></span></h3>


                            <hr/>
                            <div class="col-md-4">

                                <?php
                                echo $this->Form->radio(
                                    'apart_house', [
                                        ['value' => 'apartment', 'text' => __('Apartment'), 'style' => 'color:red;'],
                                        ['value' => 'house', 'text' => __('House')],
                                        ['value' => 'none', 'text' => __('None')],
                                    ]
                                );
                                ?><br></br>
                            </div>
                            <div class="col-md-12">

                                <div id="apartment-form" class="apartment_wrp" data-current-index='0'>

                                    <button id="add_apartment" class="btn btn-sm btn-primary" type="button">
                                        <?php echo __('Add More Apartments'); ?>
                                    </button>

                                    <button type="button" id="next-apt"
                                            class="btn btn-sm  btn-success"> <?php echo __('Assign Owners'); ?> =>
                                    </button>
                                    <br><br><br>


                                    <div class="aprtment"><br>

                                        <!--                                        <div class="text-primary apartment_label">Apartment</div></hr>-->
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->input('apartment.0.apartment_type', ['options' => Configure::read('apartment_type'), 'required' => false]);
                                                echo $this->Form->input('apartment.0.apartment_number', ['type' => 'text', 'onpaste' => 'return false;', 'class' => 'form-control apartment-number', 'maxlength' => '50', 'required' => false]);
                                                echo $this->Form->input('apartment.0.floor_number', ['class' => 'form-control integer-validation', 'onpaste' => 'return false;', 'required' => false, 'type' => 'text']);
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?php

                                                echo $this->Form->input('apartment.0.monthly_rent', ['class' => 'form-control any-number-validation', 'onpaste' => 'return false;', 'autocomplete' => 'off', 'onpaste' => 'return false;', 'maxlength' => 10, 'type' => 'text']);
                                                echo $this->Form->input('apartment.0.floor_position', ['type' => 'text']);
                                                echo $this->Form->input('apartment.0.total_area', ['class' => 'form-control any-number-validation', 'onpaste' => 'return false;', 'required' => false, 'type' => 'text']);
                                                echo $this->Form->input('apartment.0.status', ['options' => Configure::read('status_options')]);
                                                //   echo $this->Form->input('apartment.0.details', ['type' => 'textarea']);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr style="border: none; border-bottom: 1px solid ;"/>
                                        </div>
                                    </div>
                                </div>
                                <div id="owner-form" class="owner_wrp" data-current-index='0'>
                                    <div>
                                        <button id="add_owner" class="btn btn-sm btn-primary" type="button">
                                            <?php echo __("Add More Owners"); ?>
                                        </button>

                                        <button id="back-apt" class="btn btn-sm btn-success" type="button">

                                            <?php echo "<=" . __("Back to apartments"); ?>
                                        </button>
                                        <br><br>
                                    </div>
                                    <div class='owner' style="margin-left: 200px;">

                                        <div class="col-md-12">
                                            <div id="building_owner" style="margin-left: 589px;">
                                            </div>
                                            <div class="col-md-6">
                                                <?php

                                                echo $this->Form->input('owner.0.name_en', ['label' => __('Name (English)')]);
                                                echo $this->Form->input('owner.0.name_bn', ['label' => __('Name (Bangla)')]);
                                                echo $this->Form->input('owner.0.father_name_en', ['label' => __('Father Name (English)')]);
                                                echo $this->Form->input('owner.0.father_name_bn', ['label' => __('Father Name (Bangla)')]);
                                                echo $this->Form->input('owner.0.mother_name_en', ['label' => __('Mother Name (English)')]);
                                                echo $this->Form->input('owner.0.mother_name_bn', ['label' => __('Mother Name (Bangla)')]);
                                                echo $this->Form->input('owner.0.spouse_name_en', ['label' => __('Spouse Name (English)')]);
                                                echo $this->Form->input('owner.0.spouse_name_bn', ['label' => __('Spouse Name (Bangla)')]);
                                                echo $this->Form->input('owner.0.present_address', ['type' => 'textarea']);
                                                echo $this->Form->input('owner.0.permanent_address', ['type' => 'textarea']);

                                                ?>
                                            </div>
                                            <div class="col-md-6">

                                                <?php
                                                echo $this->Form->input('owner.0.ownership_type', ['options' => Configure::read('building_ownership_type'), 'label' => __('Ownership Type')]);
                                                echo $this->Form->input('owner.0.usage_type', ['options' => Configure::read('usage_type')]);
                                                echo $this->Form->input('owner.0.owner_type', ['options' => Configure::read('owner_type')]);
                                                echo $this->Form->input('owner.0.nid', ['onpaste' => 'return false;', 'class' => 'form-control nid-number', 'label' => __('NID'), 'type' => 'text']);

                                                echo $this->Form->input('owner.0.dob', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Date of Birth')]);
                                                echo $this->Form->input('owner.0.religion', ['options' => Configure::read('religions')]);
                                                echo $this->Form->input('owner.0.gender', ['options' => Configure::read('genders')]);
                                                echo $this->Form->input('owner.0.mobile_number', ['class' => 'form-control mobile-number-validation', 'type' => 'text']);
                                                echo $this->Form->input('owner.0.phone_number', ['class' => 'form-control phone-number-validation', 'type' => 'text']);
                                                echo $this->Form->input('owner.0.email', ['class' => 'form-control email-validation']);
                                                echo $this->Form->input('owner.0.apartment_owned', ['class' => 'form-control integer-validation', 'label' => __("Apartment Owned"), 'type' => 'text']);

                                                echo $this->Form->input('owner.0.own_percentage', ['class' => 'form-control any-number-validation', 'label' => __("Owner's Percentage"), 'type' => 'text']);
                                                ?>
                                                <?php
                                                echo $this->Form->input('owner.0.last_mutation_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Last Mutation Date')]);
                                                echo $this->Form->input('owner.0.own_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Issue Date')]);
                                                echo $this->Form->input('owner.0.lease_expire_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Expire Date')]);
                                                echo $this->Form->input('owner.0.status', ['options' => Configure::read('status_options')]);
                                                ?>
                                            </div>

                                        </div>

                                        <div class="col-md-12" id="apartmentNameMenu">

                                        </div>
                                        <div class="col-md-12">
                                            <hr style="border: none; border-bottom: 1px solid ;"/>
                                        </div>
                                    </div>

                                </div>
                                <div id="house-form">
                                    <button id="add_house_owner" class="btn btn-sm btn-primary" type="button">
                                        <?php echo __('Add More Owners'); ?>
                                    </button>
                                    <br><br><br>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->input('house.house_type', ['class' => 'select2me form-control', 'options' => Configure::read('house_type')]);
                                            echo $this->Form->input('house.house_number', ['type' => 'text']);
                                            echo $this->Form->input('house.house_title', ['type' => 'textarea']);

                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->input('house.floor_number', ['onpaste' => 'return false;', 'maxlength' => '3', 'class' => 'form-control integer-validation', 'type' => 'text', 'required' => FALSE]);
                                            echo $this->Form->input('house.total_area', ['onpaste' => 'return false;', 'maxlength' => '8', 'class' => 'form-control any-number-validation', 'type' => 'text']); ?>
                                            <div class="col-md-3"><label><?php echo __("Commercial") ?></label></div>
                                            <?php
                                            echo $this->Form->radio(
                                                'house.is_commercial', [
                                                    ['value' => 1, 'text' => __('Yes'), 'style' => 'color:red;'],
                                                    ['value' => 0, 'text' => __('No'), 'style' => 'color:blue;']
                                                ]
                                            );
                                            ?></br></br>
                                            <?php
                                            //echo $this->Form->input('house.is_commercial', ['type' => 'radio', 'label' => 'Commercial']);
                                            echo $this->Form->input('house.status', ['options' => Configure::read('status_options')]);
                                            echo $this->Form->input('house.details', ['type' => 'textarea']);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr style="border: none; border-bottom: 1px solid ; margin-left: 200px;"/>
                                    </div>
                                    <div id="house-owner-form" class="house_owner_wrp" data-current-index='0'>
                                        <div class='house_owner' style="margin-left: 200px;">
                                            <div class="col-md-12">
                                                <!--                                                <div class="text-primary owner_label">Owner</div></hr>-->
                                                <div class="col-md-6">
                                                    <?php
                                                    echo $this->Form->input('house_owner.0.owner_type', ['options' => Configure::read('owner_type')]);
                                                    //  echo $this->Form->input('owner.0.holding_number_id', ['options' => $holdingNumbers, 'empty' => __('Select')]);
                                                    echo $this->Form->input('house_owner.0.ownership_type', ['options' => Configure::read('building_ownership_type'), 'label' => __('Ownership Type')]);
                                                    echo $this->Form->input('house_owner.0.own_percentage', ['class' => 'form-control any-number-validation', 'type' => 'text']);
                                                    echo $this->Form->input('house_owner.0.usage_type', ['options' => Configure::read('usage_type')]);


                                                    echo $this->Form->input('house_owner.0.name_en', ['label' => __('Name (English)')]);
                                                    echo $this->Form->input('house_owner.0.name_bn', ['label' => __('Name (Bangla)')]);
                                                    echo $this->Form->input('house_owner.0.father_name_en', ['label' => __('Father Name (English)')]);
                                                    echo $this->Form->input('house_owner.0.father_name_bn', ['label' => __('Father Name (Bangla)')]);
                                                    echo $this->Form->input('house_owner.0.mother_name_en', ['label' => __('Mother Name (English)')]);
                                                    echo $this->Form->input('house_owner.0.mother_name_bn', ['label' => __('Mother Name (Bangla)')]);
                                                    echo $this->Form->input('house_owner.0.spouse_name_en', ['label' => __('Spouse Name (English)')]);
                                                    echo $this->Form->input('house_owner.0.spouse_name_bn', ['label' => __('Spouse Name (Bangla)')]);
                                                    // echo $this->Form->input('house_owner.0.picture', ['type' => 'file']);

                                                    //echo $this->Form->input('house_owner.0.apartment_owned', ['type' => 'text']);
                                                    echo $this->Form->input('house_owner.0.own_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Own Date')]);
                                                    ?>
                                                </div>
                                                <div class="col-md-6">

                                                    <?php
                                                    echo $this->Form->input('house_owner.0.nid', ['onpaste' => 'return false;', 'class' => 'form-control nid-number', 'type' => 'text', 'label' => __('NID')]);
                                                    echo $this->Form->input('house_owner.0.dob', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Date of Birth')]);
                                                    echo $this->Form->input('house_owner.0.religion', ['options' => Configure::read('religions')]);
                                                    echo $this->Form->input('house_owner.0.gender', ['options' => Configure::read('genders')]);
                                                    echo $this->Form->input('house_owner.0.mobile_number', ['class' => 'form-control mobile-number-validation', 'type' => 'text']);
                                                    echo $this->Form->input('house_owner.0.phone_number', ['class' => 'form-control phone-number-validation', 'type' => 'text']);
                                                    echo $this->Form->input('house_owner.0.email', ['class' => 'form-control email-validation']);
                                                    echo $this->Form->input('house_owner.0.present_address', ['type' => 'textarea']);
                                                    echo $this->Form->input('house_owner.0.permanent_address', ['type' => 'textarea']);
                                                    echo $this->Form->input('house_owner.0.last_mutation_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Last Mutation Date')]);
                                                    echo $this->Form->input('house_owner.0.status', ['options' => Configure::read('status_options')]);
                                                    echo $this->Form->input('house_owner.0.lease_expire_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Expire Date')]);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr style="border: none; border-bottom: 1px solid ;"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3 col-md-offset-8">
                                <?= $this->Form->button(__('Prev'), ['class' => 'btn btn-primary pull-right back', 'id' => 'property_back', 'type' => 'button', 'style' => 'margin-top:70px']) ?>
                            </div>
                            <?= $this->Form->button(__('Next'), ['class' => 'btn btn-primary pull-right continue', 'id' => 'property_next', 'type' => 'button', 'style' => 'margin-top:70px']) ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="location-cost-info">
                        <div class="col-md-12"><h3><span
                                    class="label label-success"><?php echo __("Building's Location and Cost Info"); ?></span>
                            </h3>
                            <hr/>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <?php
                                echo $this->Form->input('build_site_area', ['onpaste' => 'return false;', 'maxlength' => '7', 'class' => 'form-control  any-number-validation', 'label' => __('Total Area'), 'type' => 'text']);
                                echo $this->Form->input('build_site_north', ['onpaste' => 'return false;', 'maxlength' => '7', 'class' => 'form-control any-number-validation', 'label' => __('Area North')]);
                                echo $this->Form->input('build_site_south', ['onpaste' => 'return false;', 'maxlength' => '7', 'class' => 'form-control any-number-validation', 'label' => __('Area South')]);
                                echo $this->Form->input('build_site_east', ['onpaste' => 'return false;', 'maxlength' => '7', 'class' => 'form-control  any-number-validation', 'label' => __('Area East')]);
                                echo $this->Form->input('build_site_west', ['onpaste' => 'return false;', 'maxlength' => '7', 'class' => 'form-control  any-number-validation', 'label' => __('Area West')]);
                                ?>

                            </div>
                            <div class="col-md-6">
                                <?php
                                echo $this->Form->input('estimate_cost', ['onpaste' => 'return false;', 'maxlength' => '12', 'class' => 'form-control any-number-validation', 'type' => 'text']);
                                echo $this->Form->input('actual_cost', ['onpaste' => 'return false;', 'maxlength' => '12', 'class' => 'form-control any-number-validation', 'type' => 'text']);
                                echo $this->Form->input('build_site_soil_type', ['label' => __('Soil Type'), 'options' => Configure::read('soil_type'), 'empty' => __('Select')]);
                                //  echo $this->Form->input('build_site_road_details', ['type' => 'textarea', 'label' => 'Road Details']);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3 col-md-offset-8">
                                <?= $this->Form->button(__('Prev'), ['class' => 'btn btn-primary pull-right back', 'id' => 'location_info_back', 'type' => 'button', 'style' => 'margin-top:70px']) ?>
                            </div>
                            <?php //.$this->Form->button(__('Next'), ['class' => 'btn btn-primary pull-right continue', 'type' => 'button', 'style' => 'margin-top:70px']) ?>
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success pull-right', 'id' => "building-add-submit", 'type' => 'submit', 'style' => 'margin-top:70px']) ?>

                        </div>
                    </div>


                    <?= $this->Form->end() ?>
                    <div class="row">
                    </div>
                </div>
                <!-- END BORDERED TABLE PORTLET-->
            </div>
        </div>
        <style>
            .modal-body {
                max-height: 1000px;
                max-width: 2000px;
            }
        </style>
        <div id="plot_modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div id="plot_add">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <script>
            var apartment_names = [];
            var apartments = [];
            var property_radio_value = "";
            var disable_last_tab = false;
            var $plot_number_for_building = "";
            var disable_next_button = false;
            var $button_id = "";
            $(document).ready(function () {

                $('#apartment-form').hide();
                $('#owner-form').hide();
                $('#house-form').hide();
                $('#plot_owner_form').hide();

                $('input[type="radio"]').click(function () {
                    if ($(this).val() == 'apartment') {
                        property_radio_value = "apartment";
                        $('#house-form').hide();
                        $('.apartment_wrp').show();
                        $('#owner-form').hide();
                    }
                    else if ($(this).val() == 'house') {
                        property_radio_value = "house";
                        $('.apartment_wrp').hide();
                        $('#house-form').show();
                        $('#owner-form').hide();

                        //setting up house fields required
                        //

                    }

                    else if ($(this).val() == 'none') {
                        property_radio_value = "";
                        $('#house-form').hide();
                        $('#owner-form').hide();
                        $('.apartment_wrp').hide();
                    }

                });

                $(document).on('click', '#back-apt', function () { //apartment back

                    $('.apartment_wrp').show();
                    $('.owner_wrp').hide();
                    apartment_names.length = 0;
                    apartments.length = 0;
                });


                $(document).on('click', '#next-apt', function (e) {//apartment next

                    //checking apartmnet entry is ok or not
                    var i = $(".aprtment input");
                    var anyFieldIsEmpty = i.filter(function () {
                            console.log(i);
                            return $.trim(this.value).length === 0;
                        }).length > 0;

                    if (anyFieldIsEmpty) {
                        return $("body").overhang({
                            type: "error",
                            message: cantonment_translation.apartment_information_fill,
                            duration: duration_of_error_msg
                        });
                    }

                    else {

                        $('.apartment-number').each(function () {
                            if ($.inArray($(this).attr('name').substring(0, 12), apartment_names) == -1) {
                                apartment_names.push($(this).attr('name').substring(0, 12));
                                apartments.push($(this).val());
                            }
                        });
                        $('.apartment_wrp').hide();
                        $('.owner_wrp').show();

                        $('#apartmentNameMenu').html("");
                        var assetList = $('#apartmentNameMenu');

                        assetList.append("<?php echo __("Apartment")?>");
                        $.each(apartment_names, function (i) {
                            console.log(i);

                            var li = $('<li/>')

                                .appendTo(assetList);

                            var aaa = $('<a>')

                                .appendTo(li);

                            var input = $('<input/>')

                                .attr('type', 'checkbox')
                                .attr('value', apartment_names[i].match(/\d+/)[0])
                                .attr('class', 'cantonment_simple_checkbox apartment-check')
                                .attr('apartment_name', apartment_names[i])
                                .attr('name', 'owner[0][apartments][]')
                                .appendTo(aaa);

                            //  console.log(input);
                            var spn = $('<span>')

                                .text(apartments[i])
                                .appendTo(aaa);
                            //  console.log(spn);
                        });

                        if ($("#building_owner").empty()) {
                            var $chk = $('<input/>').attr({
                                // label: 'Building Owner',
                                type: 'checkbox',
                                value: '1',
                                name: 'owner[0][is_building_owner]'
                            }).addClass("cantonment_simple_checkbox");

                            $("#building_owner").append($chk);
                            $("#building_owner").append('<label><?php echo __("Building Owner")?></label>');
                        }

                    }

                });

                //radio button for plot owner info


            })
            ;
            //apartment add more
            $(document).on('click', '#add_apartment', function () {

                var index = parseInt($('.apartment_wrp').attr('data-current-index'));
                index++;
                $('.apartment_wrp').attr('data-current-index', index);

                var html = $('.apartment_wrp').find('.aprtment:first').clone().find('.form-control').each(function () {
                    if ($(this).hasClass('datepicker') == true) {
                        $(this).datepicker({format: 'yyyy-mm-dd'});
                        this.id = this.id.replace(/\d+/, index);
                        this.name = this.name.replace(/\d+/, index);
                    }
                    else if (this.type == 'select-one') {
                        var options_select_box = $(this).html();
                        $(this).html(options_select_box);
                        this.id = this.id.replace(/\d+/, index);
                        this.name = this.name.replace(/\d+/, index);
                    }
                    else
                        this.value = "";
                    this.id = this.id.replace(/\d+/, index);
                    this.name = this.name.replace(/\d+/, index);
                }).end();

                var add_more = '<button id="add_apartment" type ="button" class="btn btn-sm btn-primary" style="margin-left: 10px;"><?php echo __("Add More Apartments")?></button>';
                var rmv = '<button type ="button" class="remove btn btn-sm btn-danger" style="margin-left: 10px;"><?php echo __("Remove Apartment")?></button>';
                $('.apartment_wrp').append(add_more);

                $('.apartment_wrp').append(rmv);

                $('.apartment_wrp').append(html);

            });
            //remove extraneous code  ...
            $(document).on('click', '.remove', function () {
                console.log(this);
                $(this).next().remove();
                $(this).prev().remove();
                $(this).remove();

            });
            $(document).on('click', '.remove-owner', function () {
                console.log(this);
                console.log($(this).next());
                $(this).next().remove();
                $(this).prev().remove();
                $(this).remove();

            });
            $(document).on('click', '.remove-house-owner', function () {
                console.log(this);

                $(this).next().remove();
                $(this).remove();

            });

            //house add more
            $(document).on('click', '#add_house_owner', function () {

                var index = parseInt($('.house_owner_wrp').attr('data-current-index'));
                index++;
                $('.house_owner_wrp').attr('data-current-index', index);

                var html = $('.house_owner_wrp').find('.house_owner:first').clone().find('.form-control').each(function () {
                    if ($(this).hasClass('datepicker') == true) {
                        $(this).datepicker({format: 'yyyy-mm-dd'});
                        this.id = this.id.replace(/\d+/, index);
                        this.name = this.name.replace(/\d+/, index);
                    }
                    else if (this.type == 'select-one') {
                        var options_select_box = $(this).html();
                        $(this).html(options_select_box);
                        this.id = this.id.replace(/\d+/, index);
                        this.name = this.name.replace(/\d+/, index);
                    }
                    else
                        this.value = "";
                    this.id = this.id.replace(/\d+/, index);
                    this.name = this.name.replace(/\d+/, index);

                }).end();
                var rmv = '<button type ="button" class="remove-house-owner btn btn-sm btn-danger" style="margin-left: 215px;"><?php echo __("Remove Owner")?></button>';

                $('.house_owner_wrp').append(rmv);
                $('.house_owner_wrp').append(html);

            });
            $(document).on('click', '#add_owner', function () {

                var index = parseInt($('.owner_wrp').attr('data-current-index'));
                index++;
                $('.owner_wrp').attr('data-current-index', index);

                var html = $('.owner_wrp').find('.owner:first').clone().find('.form-control,.cantonment_simple_checkbox').each(function () {

                    if ($(this).hasClass('datepicker') == true) {
                        $(this).datepicker({format: 'yyyy-mm-dd'});
                        this.id = this.id.replace(/\d+/, index);
                        this.name = this.name.replace(/\d+/, index);
                    }
                    else if (this.type == 'select-one') {
                        var options_select_box = $(this).html();
                        $(this).html(options_select_box);
                        this.id = this.id.replace(/\d+/, index);
                        this.name = this.name.replace(/\d+/, index);
                    }
                    else
                        this.value = "";
                    this.id = this.id.replace(/\d+/, index);
                    this.name = this.name.replace(/\d+/, index);
                }).end();

                var add_more = '<button type ="button" id="add_owner"  class="btn btn-sm btn-primary" style="margin-left: 189px;"><?php echo __("Add More Owners")?></button>';
                var rmv = '<button type ="button" class="remove-owner btn btn-sm btn-danger" style="margin-left: 215px;"><?php echo __("Remove Owner")?></button>';

                $('.owner_wrp').append(add_more);

                $('.owner_wrp').append(rmv);

                $('.owner_wrp').append(html);

            });
        </script>

        <script>
            $(document).ready(function () {
                $(document).on('click', '.remove-file-owner', function () {
                    console.log(this);
                    $(this).next().remove();
                    $(this).remove();

                });
                $("#add_files_btn").click(function (e) {

                    var index = parseInt($('.file_wrp').attr('data-current-index'));
                    index++;
                    $('.file_wrp').attr('data-current-index', index);

                    var html = $('.file_wrp').find('.building_files:first').clone().find('.form-control').each(function () {

                        this.value = "";
                        if ($(this).hasClass('datepicker') == true) {
                            $(this).datepicker({format: 'yyyy-mm-dd'});
                        }
                        this.id = this.id.replace(/\d+/, index);
                        this.name = this.name.replace(/\d+/, index);
                        console.log(this.name);
                        console.log(this);
                    }).end();

                    var rmv = '<button type ="button" class="remove-file-owner btn btn-sm btn-danger" style="margin-left: 12px;">Remove File</button>';
                    $('.file_wrp').append(rmv);
                    $('.file_wrp').append(html);
                });

            });
        </script>

        <script>
            $(document).ready(function () {
                $(document).on('click', '.remove-building-owner', function () {
                    console.log(this);
                    $(this).next().remove();
                    $(this).remove();

                });
                $("#add_building_owner_btn").click(function (e) {

                    var index = parseInt($('.building_owner_wrp').attr('data-current-index'));

                    index++;
                    $('.building_owner_wrp').attr('data-current-index', index);

                    var html = $('.building_owner_wrp').find('.building_owner:first').clone().find('.form-control').each(function () {

                        this.value = "";
                        if ($(this).hasClass('datepicker') == true) {
                            $(this).datepicker({format: 'yyyy-mm-dd'});
                        }
                        this.id = this.id.replace(/\d+/, index);
                        this.name = this.name.replace(/\d+/, index);
                        console.log(this.name);
                        console.log(this);
                    }).end();

                    var rmv = '<button type ="button" class="remove-building-owner btn btn-sm btn-danger" style="margin-left: 12px;">Remove Owner</button>';
                    $('.building_owner_wrp').append(rmv);
                    $('.building_owner_wrp').append(html);
                });

            });
        </script>
        <script>
            $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
            var dohs_id = "";
            var x = 1;
            var dynamic_auto_complete = "";
            $(document).ready(function () {

                $("#dohs-id").on('change', function () {
                    dohs_id = "";
                    dohs_id = $("#dohs-id").val();
                    $("#plot-number").val("");
                    $("#plot-id").val("");

                    console.log(dohs_id)
                });
                $(".plot-number").on('change', function () {
                    if (dohs_id == "" || dohs_id == undefined) {
                        $(this).val("");
                        return $("body").overhang({
                            type: "error",
                            message: cantonment_translation.dohs_select,
                            duration: duration_of_error_msg
                        });
                    }

                });
                auto_complete_url = '<?php
                    echo $this->Url->build([
                        "controller" => "Plots",
                        "action" => "plotList"
                    ]);
                    ?>';
                dynamic_atuto_complete = {
                    source: function (request, response) {

                        $.ajax({
                            dataType: "json",
                            type: 'Get',
                            url: auto_complete_url + '/' + dohs_id + "/" + request.term + "/" + "add",
                            success: function (data) {

                                if (data.length == 0) {
                                    console.log($(this));
                                    $("#plot-number-" + x).val("");
                                    return $("body").overhang({
                                        type: "error",
                                        message: cantonment_translation.plot_not_found,
                                        duration: duration_of_error_msg
                                    });
                                }
                                response($.map(data, function (item) {
                                    return {
                                        label: item.plot_number,
                                        value: item.id
                                    }
                                }));
                            },
                            error: function (data) {
                                //$(".plot-number").removeClass('ui-autocomplete-loading');
                            }
                        });
                    }, minLength: 1, open: function () {
                    },
                    close: function () {
                    },
                    focus: function (event, ui) {
                        $(this).val(ui.item.label);
                        return false;
                    },
                    select: function (event, ui) {
                        $(this).val(ui.item.label);
                        $("#plot-id-hidden-" + x).val(ui.item.value);
                        return false;
                    },
                };
                $('.plot-number').autocomplete(dynamic_atuto_complete);

                $("#building-form").submit(function (e) {
                    if ($("#plot-number-1").val() == "") {
                        e.preventDefault();
                        var a_m = "<?php echo __("Please Select Plot Number")?>";
                        return $("body").overhang({
                            type: "error",
                            message: a_m,
                            duration: duration_of_error_msg
                        });
                    }
                });
                //   });
                // $(document).ready(function () {
                var max_fields = 5; //maximum input boxes allowed
                var wrapper = $(".input_fields_wrap"); //Fields wrapper
                var add_button = $(".add_field_button");

                //initlal text box count
                $(add_button).click(function (e) { //on add input button click
                    e.preventDefault();
                    if (!($("#plot-number-1").val())) {
                        return $("body").overhang({
                            type: "error",
                            message: cantonment_translation.insert_first_plot,
                            duration: duration_of_error_msg
                        });


                    }
                    if (x < max_fields) { //max input
                        x++; //text box increment
                        // var field = $('<div class="col-sm-3"> <label class="col-sm-3 control-label text-right">Plot Number</label><input type="hidden" id="plot-id-hidden-' + x + '" name="plot_ids[]" value="" /><input id="plot-number-' + x + '" maxlength="100" class="plot-number form-control" type="text" name="plot_number[]"><a href="#" class="remove_field">Remove</a></div>'); //add input box

                        var field = $('<div><label for="plot-number" class="col-sm-3 control-label text-right">Plot Number ' + x + '</label><div class="col-sm-7 container_plot_number"><input type="hidden" id="plot-id-hidden-' + x + '" name="plot_ids[]" value="" /><input id="plot-number-' + x + '" maxlength="100" class="plot-number form-control" type="text" name="plot_number[]"><a href="#" class="remove_field">Remove</a></div></div>');
                        $(wrapper).append(field);
                        $('.plot-number', field).autocomplete(dynamic_atuto_complete);

                    }
                });

                $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                    e.preventDefault();
                    $(this).parent('div').parent('div').remove();
                    console.log($(this).parent().parent());
                    x--;
                })
            });
        </script>

        <script>
            $('.continue').click(function (e) {

                $button_id = $(this).attr('id');

                if ($button_id == "property_next") {

                    //property_radio_nxt_button
                    if (property_radio_value == "house") {
                        var $house_owner_name_bn = $("#house-owner-0-name-bn").val();
                        var $house_total_area = $("#house-total-area").val();
                        var $house_title = $("#house-house-title").val();
                        var $house_number = $("#house-house-number").val();
                        if ($house_owner_name_bn == "" || $house_owner_name_bn == undefined || $house_total_area == "" || $house_total_area == undefined || $house_title == "" || $house_title == undefined || $house_number == "" || $house_number == undefined) {
                            $button_id = "";
                            var a_m = "<?php echo __("Please Fill House Information");?>";
                            return $("body").overhang({
                                type: "error",
                                message: a_m,
                                duration: duration_of_error_msg
                            });
                        }
                        else {

                            $('.nav-tabs > .active').next('li').find('a').trigger('click');
                        }
                    }
                    else if (property_radio_value == "apartment") {

                        var $apartment_form = $(".aprtment input");

                        var $apartment_form_empty = $apartment_form.filter(function () {
                                return $.trim(this.value).length === 0;
                            }).length > 0;

                        var $apartment_assigned_owner_checkbox_arr = $('.apartment-check').map(function () {
                            if ($(this).prop("checked") == true)
                                return this.name;
                        }).get().join();

                        var $first_owner_name_bn = $("#owner-0-name-bn").val();

                        if ($apartment_form_empty || $apartment_assigned_owner_checkbox_arr == 0 || $first_owner_name_bn == "") {

                            disable_last_tab = true;
                            $button_id = "";
                            var a_m = "<?php echo __("Please Fill Apartments Information and Assign Owners")?>";
                            return $("body").overhang({
                                type: "error",
                                message: a_m,
                                duration: duration_of_error_msg
                            });
                        }
                        else {
                            $('.nav-tabs > .active').next('li').find('a').trigger('click');
                        }

                    }
                    else {

                        $('.nav-tabs > .active').next('li').find('a').trigger('click');
                    }

                }
                else if ($button_id == "building_basic_tab_next") {

                    var required_building_info_fields = $("#building-basic").find(':input[required]');

                    for (var i = 0; i < required_building_info_fields.length; i++) {
                        if ($(required_building_info_fields[i]).val() == '') {
                            ///console.log(required_building_info_fields[i]);
                            disable_next_button = true;
                            $button_id = "";
                            var a_m = "<?php echo __("Please Fill Building's Information")?>";
                            return $("body").overhang({
                                type: "error",
                                message: a_m,
                                duration: duration_of_error_msg
                            });
                        }
                        else {
                            disable_next_button = false;
                        }
                    }
                    if (disable_next_button == false) {

                        $('.nav-tabs > .active').next('li').find('a').trigger('click');
                    }
                }
                //
                else if ($button_id == "plot_info_tab_next") {
                    var required_plot_info_fields = $("#plot-number-info").find(':input[required]');

                    for (var i = 0; i < required_plot_info_fields.length; i++) {
                        if ($(required_plot_info_fields[i]).val() == '') {
                            disable_next_button = true;
                            $button_id = "";
                            var a_m = "<?php echo __("Please Fill Plot's Information");?>";
                            return $("body").overhang({
                                type: "error",
                                message: a_m,
                                duration: duration_of_error_msg
                            });

                        }
                        else {
                            disable_next_button = false;
                        }
                    }
                    if (disable_next_button == false) {
                        $('.nav-tabs > .active').next('li').find('a').trigger('click');
                    }
                }
            });


            $('.back').click(function () {
                $button_id = $(this).attr('id');
                console.log($button_id);
                $('.nav-tabs > .active').prev('li').find('a').trigger('click');
            });

        </script>

        <script>
            $(document).on('click', '#new_plot', function () {
                var win = window.open('<?php echo $this->url->build('/Plots/add')?>', '_blank');
                console.log(win);
                if (win) {
                    //Browser has allowed it to be opened
                    win.focus();
                } else {
                    //Browser has blocked it
                    alert('Please allow for this website');
                }
            });
        </script>

        <script>
            $(document).on('click', '#plot-add-modal', function (e) {

                $("#plot_add").empty();
                $("#plot_add").load("<?php echo $this->request->webroot;?>/Plots/add/", function (e) {
                    // $('#plot_modal').css('width', '800px');
                    $(this).find('.page-bar').html("");
                    $(this).find('.tools').html("");
                    $(this).find('.caption').html("<?php echo __('Add New Plot');?>");


                    $(document).on('click', "#submit-data", function (e) {
                        //checking if any field empty
                        e.preventDefault();
                        var fields = $("#plot-entry").find(':input[required]');
                        console.log(fields);
                        for (var i = 0; i < fields.length; i++) {
                            if ($(fields[i]).val() == '') {
                                console.log(fields[i]);
                                return alert("Please Fill Plot Information");
                            }
                        }
                        var $serialized_form_data_plot_add = $("#plot_add_form").serializeArray();
                        $.ajax({
                            type: 'post',
                            data: $serialized_form_data_plot_add,
                            url: '<?php echo $this->url->build("/plots/add");?>',
                            success: function (response) {

                                $('#plot_modal').modal('hide');
                                alert("Plot Information Saved");
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }

                        });
                    });
                });

            });

            ///disabling  tab except next/prev button

            $(".nav-tabs a[data-toggle=tab]").on("click", function (e) {
                if ($button_id != "property_next" && $button_id != "location_info_back" && $button_id != "plot_info_tab_back" && $button_id != "property_back" && $button_id != "building_basic_tab_next" && $button_id != "plot_info_tab_next") {
                    e.preventDefault();
                    //console.log($button_id);
                    return false;
                }
                else {
                    //console.log($button_id);
                    // console.log($(this))
                    $button_id = "";
                    return true;
                }

            });

        </script>