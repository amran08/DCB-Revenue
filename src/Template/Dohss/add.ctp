<?php

use Cake\Core\Configure;
?>
<style>
/*    label.mandetory:after {
        content: ' *';
        color: red;
        display: inline;
    }
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }*/

</style>
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
        <li><?= __('New Dohs') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Dohs') ?>
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
                        echo $this->Form->input('map_file',['type'=>'file']);
                       // echo '<div class="col-md-1 col-md-offset-0">';
//                        echo $this->Form->input('map_file', [
//                           // 'templates' => [
//                             //  'inputContainer' => '<span class="fileUpload btn btn-primary"><span>Upload</span>{{content}}</span>',
//                         //   ],
//                            //'onchange' => ';',
//                            'class' => 'col-md-8 col-md-offset-2',
//                            'type' => 'file',
//                            'label' => 'Map File',
//                           
//                        ]);
                       // echo '</div>';
                       
                      
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

