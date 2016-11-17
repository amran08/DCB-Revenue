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
            <?= $this->Html->link(__('Apartments'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Apartment') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Apartment') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($apartment, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">

                            <div class="col-md-6">
                                <?php
                                echo $this->Form->input('dohs_id', ['required'=>true,'options' => $dohs, 'class' => 'select2me form-control', 'empty' => __('Select')]);
                                echo $this->Form->input('building_id', ['required'=>true,'class' => 'select2me form-control', 'empty' => __('Select')]);
                                echo $this->Form->input('apartment_type', ['required'=>true,'options' => Configure::read('apartment_type')]);
                                echo $this->Form->input('apartment_number', ['required'=>true,'type' => 'text']);
                                echo $this->Form->input('floor_number', ['class'=>'form-control integer-validation','required'=>true,'type' => 'text']);
                                ?>
                            </div>
                            <div class="col-md-6">

                                <?php
                                echo $this->Form->input('monthly_rent', ['class'=>'form-control any-number-validation','type' => 'text']);
                                echo $this->Form->input('floor_position', ['required'=>true,'type' => 'text']);
                                echo $this->Form->input('total_area', ['class'=>'form-control any-number-validation','required'=>true,'type' => 'text']);
                                echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                                //echo $this->Form->input('details');
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

        <script>
            $(document).ready(function () {

                $("#dohs_id").select2();
                $("#dohs-id").on('change', function () {
                    var dohs_id = $(this).val();

                    console.log(dohs_id);
                    if (dohs_id == "" || dohs_id == undefined) {
                        $("#building-id").empty();
                        $("#building-id").select2("val", "");

                        return $("body").overhang({
                            type: "error",
                            message: cantonment_translation.invalid_dohs_selected,
                            duration: duration_of_error_msg
                        });
                    }
                    $.getJSON('<?php
                            echo $this->Url->build([
                                "controller" => "Houses",
                                "action" => "buildingList",
                            ]);
                            ?>' + "/" + dohs_id
                        , function (building_data) {

                            //$("#-id").select2("val", "");
                            if (building_data.length > 0) {
                                $("#building-id").empty();
                                building_list = "";
                                $.each(building_data, function (u_index, u_item) {
                                    //console.log(u_item)
                                    building_list += "<option value='" + u_item.id + "'>" + u_item.title_en + "</option>";
                                });
                                $("#building-id").append(building_list);
                            }
                            else {
                                $("#building-id").empty();

                                return $("body").overhang({
                                    type: "error",
                                    message: cantonment_translation.no_building_found_for_this_dohs,
                                    duration: duration_of_error_msg
                                });

                            }


                        });
                });


            });

        </script>
