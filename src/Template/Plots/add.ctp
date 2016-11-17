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
            <?= $this->Html->link(__('Plots'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Plot') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Plot') ?>
                </div>

                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body" id="plot-entry">
                <?= $this->Form->create($plot, ['class' => 'form-horizontal', 'id' => "plot_add_form", 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('district_id', ['required' => true, 'options' => $districts, 'empty' => __('Select'), 'class' => 'select2me form-control']);
                            echo $this->Form->input('upazila_id', ['required' => true, 'empty' => __('Select'), 'class' => 'select2me form-control']);
                            echo $this->Form->input('mouja_id', ['required' => true, 'empty' => __('Select'), 'class' => 'select2me form-control']);
                            echo $this->Form->input('dohs_id', ['required' => true, 'id' => 'dohs-id-plot', 'class' => 'select2me form-control', 'empty' => __('Select')]);
                            echo $this->Form->input('land_type_id', ['class' => 'select2me form-control']);
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
                            echo $this->Form->input('area_east', ['class' =>  'form-control any-number-validation', 'label' => __('Area East'), 'type' => 'text']);
                            echo $this->Form->input('area_west', ['class' =>  'form-control any-number-validation', 'label' => __('Area West'), 'type' => 'text']);
                            echo $this->Form->input('allotment_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Allotment Date')]);
                            ?>
                            <div class="col-md-3" id="plot_label_condition">
                                <label><?php echo __("Plot's Condition"); ?></label></div>
                            <?php
                            echo $this->Form->radio(
                                'lease_blank_residential', [
                                    ['value' => 'is_lease', 'text' => __('Lease'), 'style' => 'color:red;'],
                                    ['value' => 'is_blank', 'text' => __('Blank'), 'style' => 'color:blue;'],
                                    ['value' => 'is_residential', 'text' => __('Residential'), 'style' => 'color:blue;']
                                ]
                            );
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3><span
                                class="label label-success"><?php echo __("Plot Owner Info"); ?></span></h3>
                        <label><?php echo __("Plot Has Owner"); ?></label>

                        <input type="checkbox" class="cantonment_simple_checkbox" id="has_plot_owner"
                               name="has_plot_owner">
                        <hr/>
                    </div>
                    <div id="plot_owner_form" class="plot_owner_wrp" data-current-index='0'>
                        <div>
                            <button id="add_plot_owner" style="margin-left: 200px;" class="btn btn-sm btn-primary"
                                    type="button">
                                <?php echo __("Add More Owners"); ?>
                            </button>
                            <br>
                        </div>
                        <div class='plot_owner' style="margin-left: 200px;">

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('plot_owner.0.name_en', ['label' => __('Name (English)')]);
                                    echo $this->Form->input('plot_owner.0.name_bn', ['label' => __('Name (Bangla)')]);
                                    echo $this->Form->input('plot_owner.0.father_name_en', ['label' => __('Father Name (English)')]);
                                    echo $this->Form->input('plot_owner.0.father_name_bn', ['label' => __('Father Name (Bangla)')]);
                                    echo $this->Form->input('plot_owner.0.mother_name_en', ['label' => __('Mother Name (English)')]);
                                    echo $this->Form->input('plot_owner.0.mother_name_bn', ['label' => __('Mother Name (Bangla)')]);
                                    echo $this->Form->input('plot_owner.0.spouse_name_en', ['label' => __('Spouse Name (English)')]);
                                    echo $this->Form->input('plot_owner.0.spouse_name_bn', ['label' => __('Spouse Name (Bangla)')]);
                                    echo $this->Form->input('plot_owner.0.present_address', ['type' => 'textarea']);
                                    echo $this->Form->input('plot_owner.0.permanent_address', ['type' => 'textarea']);
                                    ?>
                                </div>
                                <div class="col-md-6">

                                    <?php
                                    echo $this->Form->input('plot_owner.0.ownership_type', ['options' => Configure::read('building_ownership_type'), 'label' => __('Ownership Type')]);
                                    echo $this->Form->input('plot_owner.0.usage_type', ['options' => Configure::read('usage_type')]);
                                    echo $this->Form->input('plot_owner.0.owner_type', ['options' => Configure::read('owner_type')]);
                                    echo $this->Form->input('plot_owner.0.nid', ['class' => 'form-control nid-number', 'label' => __('NID'), 'type' => 'text']);

                                    echo $this->Form->input('plot_owner.0.dob', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Date of Birth')]);
                                    echo $this->Form->input('plot_owner.0.religion', ['options' => Configure::read('religions')]);
                                    echo $this->Form->input('plot_owner.0.gender', ['options' => Configure::read('genders')]);
                                    echo $this->Form->input('plot_owner.0.mobile_number', ['class'=>'form-control mobile-number-validation','type' => 'text']);
                                    echo $this->Form->input('plot_owner.0.phone_number', ['class'=>'form-control phone-number-validation','type' => 'text']);
                                    echo $this->Form->input('plot_owner.0.email',['class'=>'form-control email-validation']);

                                    echo $this->Form->input('plot_owner.0.own_percentage', ['class'=>'form-control any-number-validation','label' => __("Owner's Percentage"), 'type' => 'text']);
                                    ?>
                                    <?php
                                    echo $this->Form->input('plot_owner.0.last_mutation_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Last Mutation Date')]);
                                    echo $this->Form->input('plot_owner.0.own_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Issue Date')]);
                                    echo $this->Form->input('plot_owner.0.lease_expire_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Expire Date')]);
                                    echo $this->Form->input('plot_owner.0.status', ['options' => Configure::read('status_options')]);
                                    ?>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <hr style="border: none; border-bottom: 1px solid ;"/>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'id' => 'submit-data', 'style' => 'margin-top:0px; margin-right:10px']) ?>

                </div>

            </div>
            <!-- END BORDERED TABLE PORTLET-->
        </div>

    </div>
    <script src="/cantonment/assets/global/plugins/select2/select2.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#plot_owner_form').hide();
            $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
            district_bbs = "";
            district_id = "";


            var dohs_id = $("#dohs-id-plot").val();
            $('#dohs-id-plot').on('change', function () {
                dohs_id = $(this).val();
            });
            $(document).on('change', '#has_plot_owner', function () {
                if ($(this).attr('checked')) {
                    $(this).attr('value', '1');
                    $('#plot_owner_form').show();

                }
                else {
                    $('#plot_owner_form').hide();
                }

            });

            $(document).on('click', '#add_plot_owner', function () {

                var index = parseInt($('.plot_owner_wrp').attr('data-current-index'));
                index++;
                $('.plot_owner_wrp').attr('data-current-index', index);

                var html = $('.plot_owner_wrp').find('.plot_owner:first').clone().find('.form-control,.cantonment_simple_checkbox').each(function () {
                    if ($(this).hasClass('datepicker') == true) {
                        $(this).datepicker({format: 'yyyy-mm-dd'});
                    }
                    if (this.type == 'checkbox') {
                        console.log(this);
                        var at = $(this).attr("name");
                        $(this).prop('checked', false);
                        $(this).attr("name", at.replace(/\d+/, index));
                    }
                    else {
                        this.value = "";
                        this.id = this.id.replace(/\d+/, index);
                        this.name = this.name.replace(/\d+/, index);
                        //console.log(this.name);
                    }
                }).end();

                var add_more = '<button type ="button" id="add_owner"  class="btn btn-sm btn-primary" style="margin-left: 189px;"><?php echo __("Add More Owners")?></button>';
                var rmv = '<button type ="button" class="remove-plot-owner btn btn-sm btn-danger" style="margin-left: 215px;"><?php echo __("Remove Owner")?></button>';

                //  $('.plot_owner_wrp').append(add_more);

                $('.plot_owner_wrp').append(rmv);

                $('.plot_owner_wrp').append(html);

            });

            $(document).on('click', '.remove-plot-owner', function () {
                console.log(this);
                $(this).next().remove();
                $(this).remove();

            });

            $('#district-id').on('change', function () {
                //action = "upazilaList";

                district_id = $(this).val();
                console.log(district_id);

                get_url_1 = '<?php
                    echo $this->Url->build([
                        "controller" => "Plots",
                        "action" => "districtCode"
                    ]);
                    ?>';
                get_url_2 = '<?php
                    echo $this->Url->build([
                        "controller" => "Plots",
                        "action" => "upazilaList"
                    ]);
                    ?>';
                $.getJSON(get_url_1 + "/" +
                    district_id
                    , function (data) {
                        //console.log(data);
                        district_bbs = data.district_bbs_code;
                        // console.log(district_bbs);
                        $.getJSON(get_url_2 + "/" +
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
                // action = "moujaList";
                get_url_3 = '<?php
                    echo $this->Url->build([
                        "controller" => "Plots",
                        "action" => "moujaList"
                    ]);
                    ?>';
                console.log(upazila_id);
                $.getJSON(get_url_3 + "/" +
                    upazila_id
                    , function (mouja_data) {
                        //$("#mouja-id").select2("val", "");
                        $("#mouja-id").empty();
                        mj_name = "";
                        $.each(mouja_data, function (u_index, u_item) {
                            //console.log(u_item)
                            mj_name += "<option value='" + u_item.id + "'>" + u_item.name_bd + "</option>";
                        });
                        $("#mouja-id").append(mj_name);

                    });

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
                                    $("#plot-number").css('background', '#ff0000');
                                    $("#submit-data").prop("disabled", true);
                                    return $("body").overhang({
                                        type: "error",
                                        message: cantonment_translation.already_added_plot,
                                        duration: duration_of_error_msg
                                    });
                                }

                            }
                        });
                    }
                });
            });
        });
    </script>