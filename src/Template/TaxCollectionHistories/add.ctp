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
            <?= $this->Html->link(__('Tax Collection Histories'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
                    <li><?= __('New Tax Collection History') ?></li>
        
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Tax Collection History') ?>
                                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
                
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($taxCollectionHistory,['class' => 'form-horizontal','role'=>'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                                                                    echo $this->Form->input('owner_id', ['options' => $owners, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('tax_assessment_id', ['options' => $taxAssessments, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('collection_date', array('empty' => true, 'default' => ''));
                                                                    echo $this->Form->input('late_feee_amount');
                                                                    echo $this->Form->input('fine_amount');
                                                                    echo $this->Form->input('rebet_amount');
                                                                    echo $this->Form->input('collected_amount');
                                                                echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                                                                    echo $this->Form->input('collected_by');
                                                    ?>
                        <?= $this->Form->button(__('Submit'),['class'=>'btn blue pull-right','style'=>'margin-top:20px']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

