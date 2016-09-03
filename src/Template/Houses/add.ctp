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
            <?= $this->Html->link(__('Houses'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New House') ?></li>

    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New House') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($house, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('dohs_id', ['options' => $dohss, 'class' => 'select2me form-control', 'empty' => __('Select')]);
                            echo $this->Form->input('building_id', ['class' => 'select2me form-control', 'empty' => __('Select')]);
                            echo $this->Form->input('house_type', ['class' => 'select2me form-control', 'options' => Configure::read('house_type')]);
                            echo $this->Form->input('house_number');
                            echo $this->Form->input('house_title');
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('floor_number');
                            echo $this->Form->input('total_area');
                            echo $this->Form->input('is_commercial', ['label' => 'Commercial']);
                            echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                            echo $this->Form->input('details');
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
                if (dohs_id == "" || dohs_id == undefined)
                {
                    $("#building-id").empty();
                    return alert("Invalid Dohs");
                }
                $.getJSON('<?php
                    echo $this->Url->build([
                        "controller" => "Houses",
                        "action" => "buildingList",
                    ]);
                    ?>' + "/" + dohs_id
                        , function (building_data) {

                            //$("#-id").select2("val", "");
                            if (building_data.length > 0)
                            {
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
                                return alert("Invalid Dohs");

                            }


                        });
            });


        });

    </script>