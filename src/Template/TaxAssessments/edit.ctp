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
            <?= $this->Html->link(__('Tax Assessments'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Tax Assessment') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Tax Assessment') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($taxAssessment, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                       // echo $this->Form->input('dohs_id');
                       //echo $this->Form->input('economic_year',['disabled'=>true]);
                        echo $this->Form->input('owner_id', ['disabled'=>true]);
                       // echo $this->Form->input('assess_type');
                        //echo $this->Form->input('if_revised_parent_assess_row_id');
                       // echo $this->Form->input('property_type');
                        echo $this->Form->input('property_type_table_name',['disabled'=>true]);
                       // echo $this->Form->input('property_title',['disabled'=>true]);
                      /// echo $this->Form->input('tax_settings_id', ['options' => $taxSettings, 'empty' => __('Select')]);
                        //echo $this->Form->input('total_area',['disabled'=>true]);
                        echo $this->Form->input('assessed_amount',['disabled'=>true]);
                        echo $this->Form->input('total_amount');
                        echo $this->Form->input('remarks',['type'=>'textarea']);
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

