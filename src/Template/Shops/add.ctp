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
            <?= $this->Html->link(__('Shops'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Shop') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('New Shop') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($shop, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('market_id', ['options' => $markets, 'class' => 'select2me form-control', 'empty' => __('Select')]);
                        echo $this->Form->input('shop_type', ['options' => Configure::read('shop_type')]);
                        echo $this->Form->input('shop_number', ['type' => 'text', 'label' => __('Shop Number')]);
                        echo $this->Form->input('lease_amount', ['type' => 'text', 'label' => __('Lease Amount')]);

                        echo $this->Form->input('title_en', ['label' => __('Shop Title (English)')]);

                        ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'style' => 'margin-top:20px']) ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('title_bn', ['label' => __('Shop Title (Bangla)')]);
                        echo $this->Form->input('total_area', ['type' => 'text', 'label' => __('Total Area')]);
                        echo $this->Form->input('floor_number', ['type' => 'text', 'label' => __('Floor Number')]);
                        echo $this->Form->input('current_condition', ['label' => __('Current Condition'), 'class' => 'form-control shop-condition', 'options' => Configure::read('current_condition')]);

                        // echo $this->Form->input('shop_details');
                        echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                        ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>

            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>


