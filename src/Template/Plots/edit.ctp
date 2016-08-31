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
            <?= $this->Html->link(__('Plots'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Plot') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Plot') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($plot, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                        echo $this->Form->input('district_id', ['options' => $districts, 'empty' => __('Select'), 'class' => 'select2me form-control']);
                        echo $this->Form->input('upazila_id', ['options' => $upazilas, 'empty' => __('Select'), 'class' => 'select2me form-control']);
                        echo $this->Form->input('mouja_id', ['class' => 'select2me form-control']);
                        echo $this->Form->input('dohs_id', ['class' => 'select2me form-control']);
                        echo $this->Form->input('land_type_id', ['class' => 'select2me form-control']);
                        echo $this->Form->input('plot_type');
                        echo $this->Form->input('plot_number');
                        echo $this->Form->input('road_number');
                        echo $this->Form->input('road_name');
                        echo $this->Form->input('total_area');
                        echo $this->Form->input('area_north');
                        echo $this->Form->input('area_south');
                        echo $this->Form->input('area_east');
                        echo $this->Form->input('area_west');
                        echo $this->Form->input('is_lease');
                        echo $this->Form->input('is_blank');
                        echo $this->Form->input('is_residential');
                        echo $this->Form->input('details');
                        echo $this->Form->input('allotment_date', array('type' => 'text', 'class' =>'form-control date-picker'));
                        ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'style' => 'margin-top:20px']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>