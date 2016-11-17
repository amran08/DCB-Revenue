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
            <?= $this->Html->link(__('Holding Numbers'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Holding Number') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Holding Number') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($holdingNumber, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-7">
                            <?php
                            echo $this->Form->input('holding_number');
                            echo $this->Form->input('applicant_name');
                            echo $this->Form->input('applicant_mobile_number', ['label' => 'Mobile Number']);
                            echo $this->Form->input('application_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Application Date']);
                            echo $this->Form->input('issue_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'Issue Date']);
                            echo $this->Form->input('building_id', ['options' => $buildings, 'empty' => __('Select')]);
                            echo $this->Form->input('starting_tax_amount');
                            ?>
                        </div>
                        <div class="col-md-5">
                            <?php
                            echo $this->Form->input('applicant_present_address', ['label' => 'Present Address', 'type' => 'textarea']);
                            echo $this->Form->input('applicant_permanent_address', ['label' => 'Permanent Address', 'type' => 'textarea']);
                            echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                            echo $this->Form->input('supporting_paper');
                            ?>
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'style' => 'margin-top:20px']) ?>
                        </div>
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
</script>