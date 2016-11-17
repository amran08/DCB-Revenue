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
            <?= $this->Html->link(__('Markets'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Market') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Market') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($market, ['class' => 'form-horizontal', 'role' => 'form', 'type' => 'file', 'id' => 'market-add-form']) ?>
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('title_en', ['label' => __('Market Title (English)')]);
                            echo $this->Form->input('title_bn', ['label' => __('Market Title (Bangla)')]);
                            echo $this->Form->input('road_number', ['label' => __('Road Number'), 'type' => 'text']);

                            echo $this->Form->input('total_area', ['label' => __('Total Area'), 'type' => 'text']);

                            ?>
                            <div class="col-md-4"><label><?php echo __('Add New Building');?></label></div>
                            <?php
                            echo $this->Form->radio(
                                'building_info_market', [
                                    ['value' => 1, 'text' => __('Yes'), 'style' => 'color:red;'],
                                    ['value' => 0, 'text' => __('No'), 'style' => 'color:blue;']
                                ]
                            );


                            ?>

                            <?php

                            echo $this->Form->input('building_id', (['required' => false, 'maxlength' => "100", 'id' => "building_id",
                                'class' => "building-id form-control", 'type' => "text", 'name' => "building_id"]));

                            echo $this->Form->input('building_id', ['id' => 'building-id-hidden', 'type' => 'hidden']);
                            ?>


                        </div>
                        <div class="col-md-6">
                            <?php

                            echo $this->Form->input('dohs_id', ['option' => $dohs, 'empty' => 'Select']);
                            echo $this->Form->input('floor_number', ['label' => __('Total Floors'), 'type' => 'text']);
                            echo $this->Form->input('total_shop_number', ['label' => __('Total Shops'), 'type' => 'text']);
                            echo $this->Form->input('start_date', array('class' => 'datepicker form-control','label'=>__('Market Inaugurated'), 'type' => 'text'));
                            echo $this->Form->input('address', ['label' => __('Address'), 'type' => 'textarea']);
                            echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                            ?>
                        </div>

                        <div class="col-md-12" id="building_info">
                            <div class="col-md-12" id="building_info_for_market"><h3><span
                                        class="label label-success"><?php echo __('Market\'s Building Inforamtion');?></span></h3>
                                <hr/>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo $this->Form->input('roof_type', ['options' => Configure::read('roof_type')]);
                                echo $this->Form->input('build_type', ['options' => Configure::read('building_type')]);
                                echo $this->Form->input('build_site_area', ['label' => __('Total Area')]);
                                echo $this->Form->input('build_site_north', ['label' => __('Area North')]);
                                echo $this->Form->input('build_site_south', ['label' => __('Area South')]);
                                echo $this->Form->input('build_site_east', ['label' => __('Area East')]);
                                echo $this->Form->input('build_site_west', ['label' => __('Area West')]);
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo $this->Form->input('plan_approve_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Approve Date']);
                                echo $this->Form->input('work_start_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Start Date']);
                                echo $this->Form->input('work_finish_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Finish Date']);

                                echo $this->Form->input('estimate_cost');
                                echo $this->Form->input('actual_cost');
                                echo $this->Form->input('build_site_soil_type', ['label' => 'Soil Type', 'options' => Configure::read('soil_type'), 'empty' => __('Select')]);
                                //  echo $this->Form->input('build_site_road_details', ['type' => 'textarea', 'label' => 'Road Details']);
                                ?>
                            </div>
                        </div>
                        <div id="shop-entry" class="shop_wrp" data-current-index='0'>
                            <!--                            <div class="col-md-5">-->
                            <button id="add_shop" class="btn btn-sm btn-primary" type="button">
                                <?php echo __('Add More Shops');?>
                            </button>
                            <button type="button" id="next-apt" class="btn  btn-sm btn-success"><?php echo __('Assign Shop Owner');?> =>
                            </button>
                            <!--                                <br><br><br>-->
                            <!--                            </div>-->
                            <div class="shop"><br>

                                <!--                                        <div class="text-primary apartment_label">Apartment</div></hr>-->
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="col-md-12"><span class="label label-info">   <?php echo __('Shop Info');?> </span></div>
                                        <br>
                                        <?php
                                        echo $this->Form->input('shop.0.title_en', ['label' => __('Shop Title (English)')]);
                                        echo $this->Form->input('shop.0.title_bn', ['label' => __('Shop Title (Bangla)'), 'required' => false]);
                                        echo $this->Form->input('shop.0.shop_type', ['options' => Configure::read('shop_type')]);
                                        echo $this->Form->input('shop.0.shop_number', ['class' => 'form-control shop-number', 'type' => 'text']);
                                        echo $this->Form->input('shop.0.lease_amount', ['type' => 'text', 'label' => __('Lease Amount')]);
                                        echo $this->Form->input('shop.0.total_area', ['type' => 'text', 'required' => false]);
                                        echo $this->Form->input('shop.0.floor_number', ['type' => 'text']);
                                        echo $this->Form->input('shop.0.current_condition', ['label' => __('Current Condition'),'class'=>'form-control shop-condition','options' => Configure::read('current_condition')]);
                                        echo $this->Form->input('shop.0.status', ['options' => Configure::read('status_options')]);
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <span
                                                class="label label-info">  <?php echo __('Shop Holder Info');?> </span>&nbsp;&nbsp;&nbsp;
                                        </div>
                                        <div class="shop_holder_info">
                                            <?php
                                            //                                        echo $this->Form->input('shop.0.allotment_type', ['options' => Configure::read('shop_allotment_type')]);
                                            //                                        echo $this->Form->input('shop.0.application_form_file', ['type' => 'file']);
                                            //                                        echo $this->Form->input('shop.0.allotment_issue_date', ['class' => 'form-control datepicker', 'type' => 'text']);
                                            //                                        echo $this->Form->input('shop.0.allotment_expire_date', ['class' => 'form-control datepicker', 'type' => 'text']);
                                            //                                        echo $this->Form->input('shop.0.contract_file',['type'=>'file']);
                                            //                                        echo $this->Form->input('shop.0.contract_value', ['type' => 'text']);
                                            //                                        echo $this->Form->input('shop.0.floor_map', ['type' => 'file']);

                                            //echo $this->Form->input('shop.0.name_en', ['label' => '  Name(English)']);
                                            echo $this->Form->input('shop.0.name_bn', ['label' => __('Name (Bangla)')]);
                                            // echo $this->Form->input('shop.0.father_name_en', ['label' => ' Father Name(English)']);
                                            echo $this->Form->input('shop.0.father_name_bn', ['label' => __('Father Name (Bangla)')]);
                                            //   echo $this->Form->input('shop.0.mother_name_en', ['label' => ' Mother Name(English)']);
                                            echo $this->Form->input('shop.0.mother_name_bn', ['label' => __('Mother Name (Bangla)')]);
                                            echo $this->Form->input('shop.0.allotment_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Allotment Date')]);
                                            echo $this->Form->input('shop.0.expire_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Expire Date')]);
                                            echo $this->Form->input('shop.0.nid', ['label' => __('NID')]);

                                            echo $this->Form->input('shop.0.mobile_number', ['type' => 'text', 'label' => __('Mobile Number')]);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr style="border: none; border-bottom: 1px solid ;"/>
                                </div>
                            </div>

                        </div>
                        <div id="shop-owner-form" class="owner_wrp" data-current-index='0'>

                            <button id="add_owner" class="btn btn-sm  btn-primary" type="button">

                                <?php echo __('Add More Owners');?>
                            </button>

                            <button id="back-apt" class="btn btn-sm btn-success" type="button">
                                <=  <?php echo __('Back to Shops');?>
                            </button>
                            <br><br>
                            <div class='owner' style="margin-left: 200px;">

                                <div class="col-md-12">

                                    <!--                                            <div class="text-primary owner_label">Owner</div></hr>-->
                                    <div class="col-md-6">
                                        <?php
                                        //
                                        //  echo $this->Form->input('owner.0.holding_number_id', ['options' => $holdingNumbers, 'empty' => __('Select')]);
                                        //
                                        //
                                        echo $this->Form->input('owner.0.name_en', ['label' => __('Name (English)')]);
                                        echo $this->Form->input('owner.0.name_bn', ['label' => __('Name (Bangla)')]);
                                        echo $this->Form->input('owner.0.father_name_en', ['label' => __('Father Name (English)')]);
                                        echo $this->Form->input('owner.0.father_name_bn', ['label' => __('Father Name (Bangla)')]);
                                        echo $this->Form->input('owner.0.mother_name_en', ['label' =>__('Mother Name (English)')]);
                                        echo $this->Form->input('owner.0.mother_name_bn', ['label' =>__('Mother Name (Bangla)')]);
                                        echo $this->Form->input('owner.0.spouse_name_en', ['label' => __('Spouse Name (English)')]);
                                        echo $this->Form->input('owner.0.spouse_name_bn', ['label' => __('Spouse Name (Bangla)')]);
                                        echo $this->Form->input('owner.0.present_address', ['type' => 'textarea']);
                                        echo $this->Form->input('owner.0.permanent_address', ['type' => 'textarea']);
                                        // echo $this->Form->input('owner.0.picture', ['type' => 'file']);
                                        //echo $this->Form->input('owner[0]aprts[0,3,5]');
                                        //
                                        //
                                        ?>
                                    </div>
                                    <div class="col-md-6">

                                        <?php
                                        echo $this->Form->input('owner.0.ownership_type', ['options' => Configure::read('building_ownership_type'), 'label' => __('Ownership Type')]);
                                        echo $this->Form->input('owner.0.usage_type', ['options' => Configure::read('usage_type')]);
                                        echo $this->Form->input('owner.0.owner_type', ['options' => Configure::read('owner_type')]);
                                        echo $this->Form->input('owner.0.nid', ['type' => 'text','label'=>__('NID')]);
                                        echo $this->Form->input('owner.0.dob', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Date of Birth')]);
                                        echo $this->Form->input('owner.0.religion', ['options' => Configure::read('religions')]);
                                        echo $this->Form->input('owner.0.gender', ['options' => Configure::read('genders')]);
                                        echo $this->Form->input('owner.0.mobile_number', ['type' => 'text']);
                                        echo $this->Form->input('owner.0.phone_number', ['type' => 'text']);
                                        echo $this->Form->input('owner.0.email');


                                        echo $this->Form->input('owner.0.own_percentage', ['label' => __("Owner's Percentage"), 'type' => 'text']);
                                        ?>
                                        <?php
                                        echo $this->Form->input('owner.0.own_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Issue Date')]);
                                        echo $this->Form->input('owner.0.lease_expire_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Expire Date')]);
                                        echo $this->Form->input('owner.0.status', ['options' => Configure::read('status_options')]);
                                        ?>
                                    </div>
                                </div>

                                <div id="shopNameMenu">
                                    <h3><?php echo __('Shops');?></h3>
                                </div>
                                <br><br>
                                <div class="col-md-12">
                                    <hr style="border: none; border-bottom: 1px solid ;"/>
                                </div>
                            </div>

                        </div>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'id' => 'market-submit', 'style' => 'margin-top:20px']) ?>
                    </div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
            <!-- END BORDERED TABLE PORTLET-->
        </div>
    </div>
    <script>

        var shops = [];
        var shop_names = [];
        checked_arr_shops = [];
        $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
        $(document).ready(function () {
            $('#shop-owner-form').hide();
            $("#building_info").hide();

            $('input[type="radio"]').click(function () {

                if ($(this).val() == 1) {
                    $("#building_info").show();
                    $("#building_id").hide();
                    //$("label[for='" + $("#building-id").attr('id') + "']").text();
                    $('label[for=building_id], input#building_id').hide();
                }
                else {
                    $("#building_info").hide();

                    $("#building_id").show();
                    $('label[for=building_id], input#building_id').show();
                }
            });
            $(document).on('click', '.remove', function () {
                console.log(this);
                $(this).next().remove();
                $(this).remove();

            });
            $("#add_shop").click(function (e) {

                var index = parseInt($('.shop_wrp').attr('data-current-index'));
                index++;
                $('.shop_wrp').attr('data-current-index', index);

                var html = $('.shop_wrp').find('.shop:first').clone().find('.form-control').each(function () {

                    this.value = "";
                    if ($(this).hasClass('datepicker') == true) {
                        $(this).datepicker({format: 'yyyy-mm-dd'});
                    }
                    this.id = this.id.replace(/\d+/, index);
                    this.name = this.name.replace(/\d+/, index);
                    //console.log(this.name);
                    //console.log(this);
                }).end();

                var rmv = '<button type ="button" class="remove btn btn-sm btn-danger" style="margin-left: 12px;"><?php echo __('Remove Shop');?></button>';

                $('.shop_wrp').append(rmv);
                $('.shop_wrp').append(html);
            });

            $(document).on('click', '#back-apt', function () {

                $('.shop_wrp').show();
                $('.owner_wrp').hide();

            });
            $(document).on('change', '.shop-condition', function () {

                $(this).closest('.shop').find('.shop_holder_info').show();

                if($(this).val()=="rent")
                {
                    $(this).closest('.shop').find('.shop_holder_info').show();
                }
                else
                 {
                     $(this).closest('.shop').find('.shop_holder_info').hide();
                }

            });
            $(document).on('click', '#next-apt', function (e) {

                var i = $(".shop input");

                //shops form fields empty or not
                //currently not checking

                var anyFieldIsEmpty = i.filter(function () {
                        return $.trim(this.value).length === 0;
                    }).length > 0;

                anyFieldIsEmpty ="false";

                if (anyFieldIsEmpty=="true") {
                    return alert("Please Fill Shop Information");
                }
                else {
                    $('.shop_wrp').hide();
                    $('.shop-number').each(function () {

                        if ($.inArray($(this).attr('name').substring(0, 19), shop_names) == -1) {
                            shop_names.push($(this).attr('name').substring(0, 19));
                            shops.push($(this).val());
                        }
                    });

                    $('#shopNameMenu').html("");
                    var shopList = $('#shopNameMenu');

                    //Here I am
                    /// $.each(shop_names, function (i) {
//                        console.log(shop_names);
//                        var checkbox = "<label for ="+i+">" + shop_names[i].match(/\d+/)[0] + "</label><input type='checkbox' value=shop_names[i].match(/\d+/)[0] class='form-control apt-check'  name='owner[0][apartments][]'>"
//                        $(assetList).append($(checkbox));
                    //})
                    shopList.append('<label><?php echo __("Shops")?></label>');
                    $.each(shop_names, function (i) {
                        console.log(i);

                        var li = $('<li/>')

                            .appendTo(shopList);

                        var aaa = $('<a>')

                            .appendTo(li);

                        var input = $('<input/>')

                            .attr('type', 'checkbox')
                            .attr('value', shop_names[i].match(/\d+/)[0])
                            .attr('class', 'cantonment_simple_checkbox')
                            .attr('shop_name', shop_names[i])
                            .attr('name', 'owner[0][shops][]')
                            .appendTo(aaa);

                        //  console.log(input);
                        var spn = $('<span>')

                            .text(shops[i])
                            .appendTo(aaa);
                        //  console.log(spn);
                    });

                    $('.owner_wrp').show();
                }

            });
            $(document).on('click', '#add_owner', function () {

                var index = parseInt($('.owner_wrp').attr('data-current-index'));
                index++;
                $('.owner_wrp').attr('data-current-index', index);

                var html = $('.owner_wrp').find('.owner:first').clone().find('.form-control,.cantonment_simple_checkbox').each(function () {
                    if ($(this).hasClass('datepicker') == true) {
                        $(this).datepicker({format: 'yyyy-mm-dd'});
                    }
                    if (this.type == 'checkbox') {
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
                var rmv = '<button type ="button" class="remove btn btn-sm btn-danger" style="margin-left: 215px;"><?php echo __('Remove Owner');?></button>';
                $('.owner_wrp').append(rmv);
                $('.owner_wrp').append(html);


            });


            $(document).on('change', '.cantonment_simple_checkbox', function () {

                var check_value = $(this).attr('value');
                if ($(this).is(":checked")) {
                    if ($.inArray(check_value, checked_arr_shops) != -1) {
                        var confirm_shop = confirm("This Shop Already Assigned to An Owner,Are you the Second Owner? ");
                        if (confirm_shop == true) {
                            $(this).prop('checked', true);
                        }
                        else {
                            $(this).prop('checked', false);
                        }
                    }
                    else {
                        checked_arr_shops.push($(this).attr('value'));
                        console.log(checked_arr_shops);
                    }
                }
                else {
                    checked_arr_shops.pop($(this).attr('value'));
                    console.log(checked_arr_shops);
                }

            });
        });

        $(document).on('click', '#market-submit', function () {


        });


        $(document).ready(function () {

            var dohs_id = $("#dohs-id").val();

            $(document).on('change', '#dohs-id', function () {

                dohs_id = $(this).val();
                console.log(dohs_id);
            });
            $("#building_id").on('keyup', function () {
                if (dohs_id == "" || dohs_id == undefined) {
                    $(this).val("");
                    return alert("Please Select DOHS");
                }

            });
            auto_complete = {
                source: function (request, response) {

                    $.ajax({
                        dataType: "json",
                        type: 'Get',
                        url: '<?php echo $this->url->build('/Markets/buildingList/')?>' + dohs_id + "/" + request.term,
                        success: function (data) {

                            if (data.length == 0) {
                                $(this).val("");
                                return alert("No Building Found or select dohs");
                            }
                            response($.map(data, function (item) {
                                return {
                                    label: item.title_bn,
                                    value: item.id
                                }
                            }));
                        },
                        error: function (data) {
                            //$(".plot-number").removeClass('ui-autocomplete-loading');
                        }
                    });
                }, minLength: 2, open: function () {
                },
                close: function () {
                },
                focus: function (event, ui) {
                    $(this).val(ui.item.label);
                    return false;
                },
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    $("#building-id-hidden").val(ui.item.value);
                    return false;
                },
            };
            $('#building_id').autocomplete(auto_complete);

        });
    </script>
