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
            <?= $this->Html->link(__('Shop Files'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Shop File') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Shop File') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($shopFile, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                        echo $this->Form->input('market_id', ['options' => $markets, 'empty' => __('Select')]);
                        echo $this->Form->input('shop_id', ['options' => $shops, 'empty' => __('Select')]);
                        //echo $this->Form->input('allotment_type');
                        echo $this->Form->input('owner_id', ['options' => $owners, 'empty' => __('Select')]);
                        //   echo $this->Form->input('application_form_file');
                        echo $this->Form->input('allotment_issue_date', ['class' => 'form-control datepicker', 'type' => 'text']);
                        echo $this->Form->input('allotment_expire_date', ['class' => 'form-control datepicker', 'type' => 'text']);
                        //echo $this->Form->input('contract_file');
                        echo $this->Form->input('contract_value',['type'=>'text']);
                        //  echo $this->Form->input('floor_map');
                        echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
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

