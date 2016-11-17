<?php

use Cake\Core\Configure;

use App\View\Helper\SystemHelper;

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
                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-6">
                                <?php
                                echo $this->Form->input('district_id', ['required' => true, 'options' => $districts, 'empty' => __('Select'), 'class' => 'select2me form-control']);
                                echo $this->Form->input('upazila_id', ['required' => true, 'empty' => __('Select'), 'class' => 'select2me form-control']);
                                echo $this->Form->input('mouja_id', ['required' => true, 'empty' => __('Select'), 'class' => 'select2me form-control']);
                                echo $this->Form->input('dohs_id', ['required' => true, 'id' => 'dohs-id-plot', 'class' => 'select2me form-control', 'empty' => __('Select')]);
                                echo $this->Form->input('land_type_id', ['class' => 'select2me form-control']);
                                // echo $this->Form->input('plot_type');
                                echo $this->Form->input('plot_number', ['type' => 'text']);
                                echo $this->Form->input('road_number', ['type' => 'text']);
                                echo $this->Form->input('road_name', ['type' => 'text']);

                                ?>

                            </div>
                            <div class="col-md-6">
                                <?php
                                echo $this->Form->input('total_area', ['class' => 'form-control integer-validation', 'label' => __('Total Area'), 'type' => 'text']);
                                echo $this->Form->input('area_north', ['class' => 'form-control any-number-validation', 'label' => __('Area North'), 'type' => 'text']);
                                echo $this->Form->input('area_south', ['class' => 'form-control any-number-validation', 'label' => __('Area South'), 'type' => 'text']);
                                echo $this->Form->input('area_east', ['class' => 'form-control any-number-validation', 'label' => __('Area East'), 'type' => 'text']);
                                echo $this->Form->input('area_west', ['class' => 'form-control any-number-validation', 'label' => __('Area West'), 'type' => 'text']);

                                echo $this->Form->input('allotment_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Allotment Date')]);
                                ?>

                                <?php // echo $this->Form->input('is_lease', ['label' => 'Lease']);
                                // echo $this->Form->input('is_blank', ['label' => 'Blank']);
                                //echo $this->Form->input('is_residential', ['label' => 'Residential']);
                                // echo $this->Form->input('details',['label'=>'Other Inf']);
                                //echo $this->Form->input('allotment_date', array('empty' => true, 'default' => ''));
                                ?>
                                <div class="col-md-3" id="plot_label_condition">
                                    <label><?php echo __("Plot's Condition"); ?></label></div>
                                <?php
                                // echo $this->Form->input('is_legal_info', ['label' => 'Legal Info']);
                                // echo $this->Form->input('septic_tank_info', ['label' => 'Septic Tank Info']);
                                // echo $this->Form->input('build_purpose');
                                //echo $this->Form->input('building_details', ['type' => 'textarea']);
                                //echo $this->Form->input('waste_cleaning_details', ['type' => 'textarea']);

                                $residential_checked = isset($plot['is_residential']) && $plot['is_residential'] == 1 ? "checked" : "";
                                $lease_checked = isset($plot['is_lease']) && $plot['is_lease'] == 1 ? "checked" : "";
                                $blank_checked = isset($plot['is_blank']) && $plot['is_blank'] == 1 ? "checked" : "";

                                echo $this->Form->radio(
                                    'lease_blank_residential', [
                                        ['value' => 'is_lease', 'text' => __('Lease'), 'style' => 'color:red;', $lease_checked],
                                        ['value' => 'is_blank', 'text' => __('Blank'), 'style' => 'color:blue;', $blank_checked],
                                        ['value' => 'is_residential', 'text' => __('Residential'), 'style' => 'color:blue;', $residential_checked]
                                    ]
                                );
                                ?>
                                <?= $this->Form->button(__('Submit'), ['id' => 'submit-data', 'class' => 'btn blue pull-right', 'style' => 'margin-top:20px']) ?>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
        var controller = "Plots";
        var action = "upazilaList";
        var action2 = "moujaList";
        var root = '<?php echo Configure::read('project_root'); ?>';
//for editing purpose we are rending existing options

        var district_id = '<?php echo $plot['district_id']; ?>';
        var upazila_id = '<?php echo $plot['upazila_id']; ?>';
        var mouja_id = '<?php echo $plot['mouja_id']; ?>';
        var dohs_id = '<?php echo $plot['dohs_id']; ?>';


        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + "districtCode" + "/" +
            district_id
            , function (data) {
                //console.log(data);
                district_bbs = data.district_bbs_code;
                // console.log(district_bbs);
                $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" +
                    district_bbs
                    , function (upazila_data) {
                        up_name = "";
                        $.each(upazila_data, function (u_index, u_item) {
                            up_name += "<option value='" + u_item.id + "'>" + u_item.name_bd + "</option>";
                        });
                        $("#upazila-id").append(up_name);
                        $("#upazila-id").select2().select2("val", upazila_id);

                    });

                $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + "dohsList" + "/" + district_id + "/" +
                    upazila_id
                    , function (dohs_data) {
                        $("#dohs-id").empty();
                        dohs_name = "";
                        console.log(dohs_data);
                        if (dohs_data.length != 0) {
                            $.each(dohs_data, function (u_index, u_item) {
                                console.log(u_item)
                                dohs_name += "<option value='" + u_item.id + "'>" + u_item.title_en + "</option>";
                            });
                            $("#dohs-id").append(dohs_name);
                            $("#dohs-id").select2().select2("val", dohs_id);
                        }
                        else {
                            return $("#dohs-id").empty();
                            // return alert("No Dohs Found");
                        }

                    });
            });

        $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action2 + "/" +
            upazila_id
            , function (mouja_data) {
                $("#mouja-id").select2("val", "");
                mj_name = "";
                $.each(mouja_data, function (u_index, u_item) {

                    mj_name += "<option value='" + u_item.id + "'>" + u_item.name_bd + "</option>";
                });
                $("#mouja-id").append(mj_name);
                $("#mouja-id").select2().select2("val", mouja_id);
            });

        $('#district-id').on('change', function () {

            action = "upazilaList";
            district_id = $(this).val();

            $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + "districtCode" + "/" +
                district_id
                , function (data) {
                    //console.log(data);
                    district_bbs = data.district_bbs_code;
                    // console.log(district_bbs);
                    $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + action + "/" +
                        district_bbs
                        , function (upazila_data) {
                            // $("#upazila-id").select2("val", "");
                            $("#upazila-id").empty();
                            $("#mouja-id").empty();
                            up_name = "";
                            $.each(upazila_data, function (u_index, u_item) {
                                up_name += "<option value='" + u_item.id + "'>" + u_item.name_bd + "</option>";
                            });
                            $("#upazila-id").append(up_name);

                        });
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

                    $.getJSON(window.location.origin + "/" + root + "/" + controller + "/" + "dohsList" + "/" + district_id + "/" +
                        upazila_id
                        , function (dohs_data) {
                            $("#dohs-id").empty();
                            dohs_name = "";
                            console.log(dohs_data);
                            if (dohs_data.length != 0) {
                                $.each(dohs_data, function (u_index, u_item) {
                                    console.log(u_item)
                                    dohs_name += "<option value='" + u_item.id + "'>" + u_item.title_en + "</option>";
                                });
                                $("#dohs-id").append(dohs_name);
                                $("#dohs-id").select2().select2("val", dohs_id);
                            }
                            else {

                                $("#dohs-id").empty();
                                $("#dohs-id").select2().select2("val", "");
                                return alert("No Dohs Found");
                            }

                        });

                });

        });

        var dohs_id = $("#dohs-id-plot").val();
        $('#dohs-id-plot').on('change', function () {
            dohs_id = $(this).val();
        });

        var searchRequest = null;
        $(function () {
            var minlength = 2;
            $("#plot-number").keyup(function () {
                if ($(this).val() == "") {
                    $("#plot-number").css('background', '');
                }
                if (dohs_id == undefined || dohs_id == "") {
                    return $("body").overhang({
                        type: "error",
                        message: cantonment_translation.dohs_select,
                        duration: duration_of_error_msg
                    });
                }
                var that = this,
                    value = $(this).val();

                var existing_plot_number = "<?php echo $this->System->bn_to_en($plot['plot_number']);?>";

                console.log(existing_plot_number);

                if (value.length >= minlength) {
                    if (searchRequest != null)
                        searchRequest.abort();
                    searchRequest = $.ajax({
                        type: "GET",
                        url: "<?php echo $this->Url->build("/Plots/checkPlot");?>/" + dohs_id + "/" +"?plot_number="+ value,
                        dataType: "json",
                        success: function (msg) {
                            //console.log(msg);
                            if (msg.code == 200) {
                                $("#plot-number").css('background', '#00ff00');
                                $("#submit-data").prop("disabled", false);
                            }
                            if (msg.code == 400) {
                                if (value == existing_plot_number) {
                                    $("#plot-number").css('background', '');
                                    return $("body").overhang({
                                        type: "error",
                                        message: cantonment_translation.same_plot_as_before,
                                        duration: duration_of_error_msg
                                    });
                                }
                                else {
                                    //plot is already available in system
                                    $("#plot-number").css('background', '#ff0000');
                                    $("#submit-data").prop("disabled", true);
                                    return $("body").overhang({
                                        type: "error",
                                        message: cantonment_translation.already_added_plot,
                                        duration: duration_of_error_msg
                                    });
                                }
                            }

                        }
                    });
                }
            });
        });
    });

</script>