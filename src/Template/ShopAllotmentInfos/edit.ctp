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
            <?= $this->Html->link(__('Shop Allotment Infos'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Shop Allotment Info') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Shop Allotment Info') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($shopAllotmentInfo, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        // echo $this->Form->input('name_en');
                        echo $this->Form->input('name_bn', ['label' => __('Name (Bangla)')]);
                        //  echo $this->Form->input('father_name_en', ['label' => ' Father Name(English)']);
                        echo $this->Form->input('father_name_bn', ['label' => __('Father Name (Bangla)')]);
                        //  echo $this->Form->input('mother_name_en', ['label' => ' Mother Name(English)']);
                        echo $this->Form->input('mother_name_bn', ['label' => __('Mother Name (Bangla)')]);
                        echo $this->Form->input('nid', ['label' => __('NID')]);
                        echo $this->Form->input('allotment_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Allotment Date')]);

                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('expire_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => __('Expire Date')]);

                        echo $this->Form->input('market_id', ['label' => __('Market'), 'class' => 'select2me form-control']);
                        echo $this->Form->input('shop_id', ['label' => __('Shop'), 'class' => 'select2me form-control']);

                        echo $this->Form->input('mobile_number', ['type' => 'text']);
                        echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                        ?>
                    </div>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'style' => 'margin-top:20px']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

<script>
    $('.datepicker').datepicker({format: 'yyyy-mm-dd'});

    $(document).ready(function () {

        var market_id = $("#market-id").val();

        $("#market-id").on('change', function () {
            market_id = $(this).val();
            if (market_id == "" || market_id == undefined) {
                $("#market-id").empty();
                return alert("Invalid Market");
            }
            $.getJSON('<?php
                    echo $this->Url->build([
                        "controller" => "ShopAllotmentInfos",
                        "action" => "shopList",
                    ]);
                    ?>' + "/" + market_id
                , function (data) {
                    if (data.length > 0) {
                        $("#shop-id").empty();
                        shop_list = "";
                        $.each(data, function (u_index, u_item) {
                            shop_list += "<option value='" + u_item.id + "'>" + u_item.shop_number + "</option>";
                        });
                        $("#shop-id").append(shop_list);
                    }
                    else {
                        $("#shop-id").empty();
                        return alert("No Shop found for this Market");
                    }
                });
        });
    });
</script>
