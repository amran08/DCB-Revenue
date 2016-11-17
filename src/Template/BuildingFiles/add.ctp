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
            <?= $this->Html->link(__('Building Files'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Building File') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Building File') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($buildingFile, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                        echo $this->Form->input('file_type', ['options' => Configure::read('file_type')]);
                        echo $this->Form->input('submission_type', ['options' => Configure::read('submission_type')]);
                        echo $this->Form->input('building_id', ['options' => $buildings, 'empty' => __('Select')]);


                        echo $this->Form->input('applicant_name_en');
                        echo $this->Form->input('applicant_address');
                        echo $this->Form->input('applicant_contact_number');
                        echo $this->Form->input('submit_date', ['class' => 'datepicker form-control', 'type' => 'text']);
                        // echo $this->Form->input('decision_by');

                        echo $this->Form->input('decision_date', ['class' => 'datepicker form-control', 'type' => 'text']);
                        echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                        echo $this->Form->input('file_url', ['type' => 'file', 'multiple' => true]);
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
    $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
</script>