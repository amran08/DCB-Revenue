<?php

use Cake\Core\Configure;
?>


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
        <li><?= __('New Building') ?></li>

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
                <?= $this->Form->create($building, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <!--                    <div class="col-md-6 col-md-offset-3">-->
                    <div class="col-md-12"><h3><span class="label label-primary">Building's Basic Info</span></h3>
                        <hr/>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('title_en');
                            echo $this->Form->input('title_bn');
                            echo $this->Form->input('dohs_id', ['options' => $dohss, 'empty' => __('Select')]);
                            echo $this->Form->input('road_number');
                            echo $this->Form->input('developer_id', ['options' => $developers, 'empty' => __('Select')]);
                            echo $this->Form->input('build_type', ['options' => Configure::read('building_type')]);
                            echo $this->Form->input('roof_type', ['options' => Configure::read('roof_type')]);
                            ?>
                            <?php echo $this->Form->input('status', ['options' => Configure::read('status_options')]); ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('apartment_number');
                            echo $this->Form->input('floor_number');
                            echo $this->Form->input('build_purpose');
                            echo $this->Form->input('building_details', ['type' => 'textarea']);
                            echo $this->Form->input('waste_cleaning_details', ['type' => 'textarea']);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12"><h3><span class="label label-primary">Building's Location and Cost Info</span></h3>
                        <hr/>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('build_site_area', ['label' => 'Site Area']);
                            echo $this->Form->input('build_site_north', ['label' => 'North']);
                            echo $this->Form->input('build_site_south', ['label' => 'South']);
                            echo $this->Form->input('build_site_east', ['label' => 'East']);
                            echo $this->Form->input('build_site_west', ['label' => 'West']);
                            ?>

                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('estimate_cost');
                            echo $this->Form->input('actual_cost');
                            echo $this->Form->input('build_site_soil_type', ['label' => 'Soil Type', 'options' => Configure::read('soil_type'), 'empty' => __('Select')]);
                            echo $this->Form->input('build_site_road_details', ['type' => 'textarea', 'label' => 'Road Details']);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6"><h3><span class="label label-primary">Related Dates</span></h3>
                        <hr/>
                    </div>
                    <div class="col-md-6"><h3><span class="label label-primary">Other Information</span></h3>
                        <hr/>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('plan_approve_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Approve Date']);
                            echo $this->Form->input('work_start_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Start Date']);
                            echo $this->Form->input('work_finish_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Finish Date']);
                            ?>

                        </div>
                        <div class="col-md-3">

                            <?php
                            echo $this->Form->input('is_apartment', ['label' => 'Apartment']);
                            echo $this->Form->input('is_house', ['label' => 'House']);
                            echo $this->Form->input('is_legal_info', ['label' => 'Legal Info']);
                            echo $this->Form->input('septic_tank_info', ['label' => 'Septic Tank Info']);
                            ?>

                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success pull-right', 'style' => 'margin-top:100px']) ?>
                            <!--</div>-->
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            <!-- END BORDERED TABLE PORTLET-->
        </div>
    </div>
    <script>
        $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
    </script>
