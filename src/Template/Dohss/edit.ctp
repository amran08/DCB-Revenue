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
            <?= $this->Html->link(__('Dohss'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Dohs') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Dohs') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($dohs, ['class' => 'form-horizontal', 'role' => 'form','type'=>'file']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                        echo $this->Form->input('title_en');
                        echo $this->Form->input('title_bn');
                        echo $this->Form->input('total_area');
                        echo $this->Form->input('total_plot_number');
                        echo $this->Form->input('total_building_number');
                        echo $this->Form->input('total_house_number');
                        echo $this->Form->input('total_apartment_number');
                        echo $this->Form->input('total_market_number');
                        echo $this->Form->input('total_shop_number');
                        echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                        echo 'Current File Name  :: '.$dohs['map_file'].'</br></br></br>';
                        echo $this->Form->input('map_file',['type'=>'file']);
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

