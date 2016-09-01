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
                        //  debug($plot);
                        echo $this->Form->input('district_id', ['options' => $districts, 'id' => 'district-select', 'value' => $plot['district']['district_bbs_code'], 'empty' => __('Select'), 'class' => 'select2me form-control']);
                        echo $this->Form->input('upazila_id', ['empty' => __('Select'), 'class' => 'select2me form-control']);
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
                        //  echo $this->Form->input('allotment_date', array('type' => 'text', 'class' => 'form-control date-picker'));
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
        var controller = "Plots";
        var action = "upazilaList";
        var action2 = "moujaList";
        var root = '<?php echo Configure::read('project_root'); ?>';
//for edit purpose we are rending existing options

        var district_bbs_code = '<?php echo $plot['district']['district_bbs_code']; ?>';
        var up_id = '<?php echo $plot['upazila_id']; ?>';
        var mouja_id = '<?php echo $plot['mouja_id']; ?>';

        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" +
                district_bbs_code
                , function (upazila_data) {

                    $("#upazila-id").select2("val", "");
                    up_name = "";
                    $.each(upazila_data, function (u_index, u_item) {
                        up_name += "<option value='" + u_item.id + "'>" + u_item.name_bd + "</option>";
                    });
                    $("#upazila-id").append(up_name);
                    $("#upazila-id").select2().select2("val", up_id);
                });

        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action2 + "/" +
                up_id
                , function (mouja_data) {
                    $("#mouja-id").select2("val", "");
                    mj_name = "";
                    $.each(mouja_data, function (u_index, u_item) {

                        mj_name += "<option value='" + u_item.id + "'>" + u_item.name_bd + "</option>";
                    });
                    $("#mouja-id").append(mj_name);
                    $("#mouja-id").select2().select2("val", mouja_id);
                });

        $('#district-select').on('change', function () {

            action = "upazilaList";
            district_bbs_code = $(this).val();
            $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" +
                    district_bbs_code
                    , function (upazila_data) {

                        $("#upazila-id").select2("val", "");
                        up_name = "";
                        $.each(upazila_data, function (u_index, u_item) {
                            up_name += "<option value='" + u_item.id + "'>" + u_item.name_bd + "</option>";
                        });
                        $("#upazila-id").append(up_name);

                    });
        });

        $("#upazila-id").on('change', function () {
            var upazila_id = $(this).val();
            action = "moujaList";
            console.log(upazila_id);
            $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action2 + "/" +
                    upazila_id
                    , function (mouja_data) {
                        $("#mouja-id").select2("val", "");
                        mj_name = "";
                        $.each(mouja_data, function (u_index, u_item) {
                            //console.log(u_item)
                            mj_name += "<option value='" + u_item.id + "'>" + u_item.name_bd + "</option>";
                        });
                        $("#mouja-id").append(mj_name);

                    });
        });
    });

</script>