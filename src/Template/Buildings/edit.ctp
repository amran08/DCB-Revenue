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

    .red-star {
        color: red;
    }

    .modal .modal-dialog {
        width: 970px;
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
            <?= $this->Html->link(__('Buildings'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Building') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Edit Building') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($building, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <!--                    <div class="col-md-6 col-md-offset-3">-->
                    <div class="col-md-12"><h3><span
                                class="label label-success"><?php echo __("Building's Basic"); ?></span></h3>
                        <hr/>
                    </div>
                    <div class="col-md-12" id="building-basic">

                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('title_en', ['label' => __('Building Title (English)')]);
                            echo $this->Form->input('title_bn', ['label' => __('Building Title (Bangla)')]);

                            //echo $this->Form->input('plot_number', ['name' => 'plot_number[]', 'class' => 'input_fields_wrap', 'type' => 'text', 'autocompelete' => 'off']);
                            ?>

                            <?php
                            echo $this->Form->input('road_number', ['type' => 'text']);
                            echo $this->Form->input('apartment_number', ['class' => 'form-control integer-validation', 'onpaste' => 'return false;', 'label' => __('Total Apartments'), 'type' => 'text']);
                            echo $this->Form->input('floor_number', ['class' => 'form-control integer-validation', 'onpaste' => 'return false;', 'type' => 'text', 'label' => __('Total Floors')]);

                            echo $this->Form->input('dohs_id', ['options' => $dohss, 'empty' => __('Select')]);
                            ?>


                            <div class="col-md-5"><label><?php echo __('Legal Info Available'); ?></label></div>
                            <?php
                            $options = array('1' => __('Yes'), '0' => __('No'));
                            $attributes = array('legend' => false, 'value' => $building['is_legal_info']);
                            echo $this->Form->radio('is_legal_info', $options, $attributes);
                            ?></br></br>

                            <div class="col-md-5"><label><?php echo __('Septic Tank Info Available'); ?></label></div>
                            <?php

                            $options = array('1' => __('Yes'), '0' => __('No'));
                            $attributes = array('legend' => false, 'value' => $building['septic_tank_info']);
                            echo $this->Form->radio('septic_tank_info', $options, $attributes);
                            ?>
                        </div>

                        <div class="col-md-6">

                            <?php
                            echo $this->Form->input('developer_id', ['options' => $developers, 'empty' => __('Select')]);
                            echo $this->Form->input('build_type', ['options' => Configure::read('building_type')]);
                            echo $this->Form->input('build_status', ['options' => Configure::read('building_status')]);
                            echo $this->Form->input('roof_type', ['options' => Configure::read('roof_type')]);
                            ?>

                            <?php
                            echo $this->Form->input('plan_approve_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Approve Date')]);
                            echo $this->Form->input('work_start_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Start Date')]);
                            echo $this->Form->input('work_finish_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Finish Date')]);
                            ?>

                            <?php
                            if ($building['is_apartment'] == true) {

                                $apartment_checked = "checked";
                            } else {
                                $apartment_checked = "";
                            }
                            if ($building['is_house'] == true) {

                                $house_checked = "checked";
                            } else {
                                $house_checked = "";
                            } ?>

                            <div class="col-md-3"><label><?php echo __('Apartment/House'); ?> </label></div>
                            <?php
                            echo '&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;';
                            echo $this->Form->radio(
                                'apartment_house', [
                                    ['value' => "is_apartment", 'text' => __('Apartment'), 'style' => 'color:red;', $apartment_checked],
                                    ['value' => "is_house", 'text' => __('House'), 'style' => 'color:blue;', $house_checked]
                                ]
                            );
                            ?></br></br>
                            <?php echo $this->Form->input('status', ['options' => Configure::read('status_options')]); ?>
                        </div>

                    </div>


                    <div class="col-md-12"><h3><span
                                class="label label-success"><?php echo __("Building's Plot  Info"); ?></span></h3>
                        <hr/>
                    </div>
                    <div class="col-md-6"><span class="label label-success"><?php echo __("Current Plots"); ?></span>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <table class="table table-striped col-md-6">
                                <caption></caption>

                                <thead>
                                <tr>
                                    <th><?php echo __("Plot Number"); ?></th>
                                    <th><?php echo __("Road Number"); ?></th>
                                    <th><?php echo __("Included plot"); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($building['building_plot_info'] as $key => $value) {
                                    echo '<tr>';
                                    echo '<td>';
                                    echo $this->System->en_to_bn($value['plot']['plot_number']);
                                    echo '</td>';
                                    echo '<td>';
                                    echo $this->System->en_to_bn($value['plot']['road_number']);
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<input type = "checkbox" name = "plot-id-checkbox-name[]" class = "plot-number-check" value="' . $value['plot']['id'] . '" id="' . $value['plot']['id'] . '" checked />';
                                    echo '</td>';

                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-6">

                            <button
                                class="add_field_button btn btn-sm  btn-primary"><?php echo __("Add Plots"); ?></button>
                            <br>
                            <div class="form-group input input_fields_wrap text">
                                <label for="plot-number" class="col-sm-3 control-label text-right">Plot Number 1</label>
                                <div class="col-sm-7 container_plot_number">
                                    <input type="hidden" name="plot_ids[]" class="hidden-input-plot-ids"
                                           id="plot-id-hidden-1">
                                    <input maxlength="100" id="plot-number-1" placeholder="write plot number"
                                           class="plot-number form-control"
                                           type="text"autocomplete="off" name="plot_number[]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12"><h3><span
                                class="label label-success"><?php echo __("Building's Location and Cost Info"); ?></span>
                        </h3>
                        <hr/>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('build_site_area', ['onpaste' => 'return false;', 'maxlength' => '7', 'class' => 'form-control  any-number-validation', 'label' => __('Total Area'), 'type' => 'text']);
                            echo $this->Form->input('build_site_north', ['onpaste' => 'return false;', 'maxlength' => '7', 'class' => 'form-control any-number-validation', 'label' => __('Area North')]);
                            echo $this->Form->input('build_site_south', ['onpaste' => 'return false;', 'maxlength' => '7', 'class' => 'form-control any-number-validation', 'label' => __('Area South')]);
                            echo $this->Form->input('build_site_east', ['onpaste' => 'return false;', 'maxlength' => '7', 'class' => 'form-control  any-number-validation', 'label' => __('Area East')]);
                            echo $this->Form->input('build_site_west', ['onpaste' => 'return false;', 'maxlength' => '7', 'class' => 'form-control  any-number-validation', 'label' => __('Area West')]);
                            ?>

                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('estimate_cost', ['onpaste' => 'return false;', 'maxlength' => '12', 'class' => 'form-control any-number-validation', 'type' => 'text']);
                            echo $this->Form->input('actual_cost', ['onpaste' => 'return false;', 'maxlength' => '12', 'class' => 'form-control any-number-validation', 'type' => 'text']);
                            echo $this->Form->input('build_site_soil_type', ['label' => __('Soil Type'), 'options' => Configure::read('soil_type'), 'empty' => __('Select')]);
                            //  echo $this->Form->input('build_site_road_details', ['type' => 'textarea', 'label' => 'Road Details']);
                            ?>
                        </div>

                    </div>
                    <!--                    <div class="col-md-6"><h3><span class="label label-success">Related Dates</span></h3>-->
                    <!--                        <hr/>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-md-6"><h3><span class="label label-success">Other Information</span></h3>-->
                    <!--                        <hr/>-->
                    <!--                    </div>-->
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?php
                            //  echo $this->Form->input('plan_approve_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Approve Date']);
                            ///  echo $this->Form->input('work_start_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Start Date']);
                            //echo $this->Form->input('work_finish_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Finish Date']);
                            ?>

                        </div>
                        <div class="col-md-3">

                            <?php
                            //echo $this->Form->input('is_apartment', ['label' => 'Apartment']);
                            //echo $this->Form->input('is_house', ['label' => 'House']);
                            // echo $this->Form->input('is_legal_info', ['label' => 'Legal Info']);
                            //echo $this->Form->input('septic_tank_info', ['label' => 'Septic Tank Info']);
                            ?>

                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success pull-right', 'style' => 'margin-top:70px']) ?>
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
        //var plot_number = "";
        var dohs_id = '<?php echo $building['dohs_id']; ?>';
        // plot_ids = [];
        var x = 1;
        var used_items_autocomplete = [];
        var checked_plots = [];
        var dynamic_auto_complete = "";
        $(document).ready(function () {
            $("#dohs-id").on('change', function () {
                dohs_id = "";
                dohs_id = $("#dohs-id").val();
                $(".plot-number").val("");
                // $("plot-id").val("");

                //console.log(dohs_id)
            });
            $(".plot-number").on('change', function () {
                if (dohs_id == "" || dohs_id == undefined) {
                    $(this).val("");
                    return $("body").overhang({
                        type: "error",
                        message: cantonment_translation.dohs_select,
                        duration: duration_of_error_msg
                    });

                }
            });
            $('input:checkbox.plot-number-check').each(function () { //getting checked plot ids 
                var check_ids = (this.checked ? $(this).attr("id") : "");
                //console.log(sThisVal);
                if (check_ids != "")
                    checked_plots.push(check_ids);
            });

            $('.plot-number-check').on('change', function () {
//        if ($.inArray($(this).attr("id"), checked_plots) == -1)
                if (!this.checked) {
                    var unchecked_val = $(this).attr("id");
                    checked_plots.pop(unchecked_val);
                    console.log(checked_plots);
                }
                else {
                    var checked_val = $(this).attr("id");
                    checked_plots.push(checked_val);
                    console.log(checked_plots);

                }

            });

            auto_complete_url = '<?php
                echo $this->Url->build([
                    "controller" => "Plots",
                    "action" => "plotList"
                ]);
                ?>';
            dynamic_atuto_complete = {
                source: function (request, response) {
                    //var id_a = $(this.element).prop("id");
                    //console.log(id_a);
                    $.ajax({
                        dataType: "json",
                        type: 'Get',
                        url: auto_complete_url + '/' + dohs_id + "/" + request.term + '/' + "edit" + '/' + '?checked_plots=' + checked_plots,
                        success: function (data) {
                            //console.log(x);
                            //$("#plot-number").removeClass('ui-autocomplete-loading');
                            // console.log(data);
                            if (data.length == 0) {
                                $("#plot-number-" + x).val("");
                                return $("body").overhang({
                                    type: "error",
                                    message: cantonment_translation.plot_not_found,
                                    duration: duration_of_error_msg
                                });
                            }
                            response($.map(data, function (item) {
                                // if();
                                return {
                                    label: item.plot_number,
                                    value: item.id
                                }
                            }));
                        },
                        error: function (data) {
                            //$(".plot-number").removeClass('ui-autocomplete-loading');
                        }
                    });
                },
                minLength: 2,
                open: function () {
                },
                close: function () {
                },
                focus: function (event, ui) {
                    $(this).val(ui.item.label);
                    return false;
                },
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    $("#plot-id-hidden-" + x).val(ui.item.value);
                    used_items_autocomplete.push(ui.item.value);
                    console.log(used_items_autocomplete);
                    return false;
                },
            };

            $('.plot-number').autocomplete(dynamic_atuto_complete);

            $("#building-form").submit(function (e) {
                if (!$("#plot-number-1").val()) {
                    e.preventDefault();
                    return alert("Please Select Plot Number");
                }
            });
            //   });

            // $(document).ready(function () {
            var max_fields = 5; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button");

            //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();

                if (!($("#plot-number-1").val())) {
                    return $("body").overhang({
                        type: "error",
                        message:cantonment_translation.insert_first_plot,
                        duration:duration_of_error_msg
                    });
                }
                //console.log($("[id^=plot-number-]").val());
                if (x < max_fields) {

                    // if()
                    x++;
                    // var field = $('<div class="col-sm-3"> <label class="col-sm-3 control-label text-right">Plot Number</label><input type="hidden" id="plot-id-hidden-' + x + '" name="plot_ids[]" value="" /><input id="plot-number-' + x + '" maxlength="100" class="plot-number form-control" type="text" name="plot_number[]"><a href="#" class="remove_field">Remove</a></div>'); //add input box

                    var field = $('<div><label for="plot-number" class="col-sm-3 control-label text-right">Plot Number ' + x + '</label><div class="col-sm-7 container_plot_number"><input type="hidden" class ="hidden-input-plot-ids" id="plot-id-hidden-' + x + '" name="plot_ids[]" value="" /><input id="plot-number-' + x + '" maxlength="100" class="plot-number form-control" type="text" name="plot_number[]"><a href="#" class="remove_field">Remove</a></div></div>');

                    $(wrapper).append(field);
                    $('.plot-number', field).autocomplete(dynamic_atuto_complete);

                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                console.log($(this).parent().parent());
                x--;
            })

        });
    </script>
