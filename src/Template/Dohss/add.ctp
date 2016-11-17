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
                <?= $this->Form->create($dohs, ['class' => 'form-horizontal', 'id' => 'dohs-form', 'role' => 'form', 'type' => 'file']) ?>
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('title_en', ['label' => __('Title English')]);
                            echo $this->Form->input('title_bn', ['label' => __('Title Bangla')]);
                            echo $this->Form->input('total_area', ['class' => 'form-control any-number-validation', 'type' => 'text']);
                            echo $this->Form->input('total_plot_number', ['onpaste' => 'return false', 'class' => 'form-control integer-validation', 'label' => __('Total Plots'), 'type' => 'text']);
                            echo $this->Form->input('total_building_number', ['onpaste' => 'return false', 'class' => 'form-control integer-validation', 'label' => __('Total Buildings'), 'type' => 'text']);
                            echo $this->Form->input('total_house_number', ['onpaste' => 'return false', 'class' => 'form-control integer-validation', 'label' => __('Total Houses'), 'type' => 'text']);
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('total_apartment_number', ['onpaste' => 'return false', 'class' => 'form-control integer-validation', 'label' => __('Total Apartments'), 'type' => 'text']);
                            echo $this->Form->input('total_market_number', ['onpaste' => 'return false', 'class' => 'form-control integer-validation', 'label' => __('Total Markets'), 'type' => 'text']);
                            echo $this->Form->input('total_shop_number', ['onpaste' => 'return false', 'class' => 'form-control integer-validation', 'label' => __('Total Shops'), 'type' => 'text']);
                            echo $this->Form->input('status', ['options' => Configure::read('status_options')]) . '</br>';
                            // echo $this->Form->input('map_file', ['type' => 'file']);
                            ?>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12"><h3><span class="label label-info">Dohs's Map Files</span></h3>
                                <hr/>
                            </div>
                            <div class="text-box form-group">
                                <input name="map_file[]" id="map_files" type="file" multiple=""/>
                            </div>
                            <div class="row margin-bottom">
                                <div class="col-md-12 col-sm-12">
                                    <button type="button" id="add_files" class="add-box btn btn-info"><span
                                            class="glyphicon glyphicon-plus"></span> Add Files
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'style' => 'margin-top:20px']) ?>
                    </div>

                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <!-- END BORDERED TABLE PORTLET-->
</div>
</div>
<script>
    $(document).ready(function () {
        $("#add_files").click(function () {
            var n = $('.text-box').length + 1;
            if (n > 5) {
                alert('Only Five Is Allowed');
                return false;
            }
            var box_html = $('<div class="text-box form-group"><div class="col-sm-6"><input type="file" class="" name="map_file[]" id="imageinput' + n + '"/></div><div class="col-sm-4"><button class="remove-box btn btn-danger btn-sm"><i class="fa fa-minus-circle fa-lg"></i></button></div></div>');
            $('.text-box:last').after(box_html);
            box_html.fadeIn('slow');
        });

        $('.form-horizontal').on('click', '.remove-box', function () {
            $(this).closest(".form-group").remove();
            return false;
        });

    });
</script>
