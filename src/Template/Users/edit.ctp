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
            <?= $this->Html->link(__('Users'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit User') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit User') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($user, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                       // echo $this->Form->input('division_id', ['options' => $divisions, 'empty' => __('Select')]);
                       // echo $this->Form->input('district_id', ['options' => $districts, 'empty' => __('Select')]);
                        //echo $this->Form->input('upazila_id', ['options' => $upazilas, 'empty' => __('Select')]);
                       // echo $this->Form->input('office_id');
                       // echo $this->Form->input('designation_id');
                        echo $this->Form->input('user_group_id', ['options' => $userGroups, 'empty' => __('Select')]);
                        echo $this->Form->input('full_name_bn');
                        echo $this->Form->input('full_name_en');
                        echo $this->Form->input('username');
                        echo $this->Form->input('password');
                       // echo $this->Form->input('picture_alt');
                      //  echo $this->Form->input('picture');
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

