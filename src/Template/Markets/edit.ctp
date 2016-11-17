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
            <?= $this->Html->link(__('Markets'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Market') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Market') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($market, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('title_en', ['label' => __('Market Title (English)')]);
                            echo $this->Form->input('title_bn', ['label' => __('Market Title (Bangla)')]);
                            echo $this->Form->input('road_number', ['label' => __('Road Number'), 'type' => 'text']);

                            echo $this->Form->input('total_area', ['label' => __('Total Area'), 'type' => 'text']);
                            echo $this->Form->input('address',['label'=>__('Address')]);

                            echo $this->Form->input('dohs_id');
                            ?>

                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('building_id', ['options' => $buildings, 'empty' => __('Select')]);
                            echo $this->Form->input('floor_number', ['label'=>__('Total Floors'),'type' => 'text']);
                            echo $this->Form->input('total_shop_number', ['label'=>__('Total Shops'),'type' => 'text']);
                            echo $this->Form->input('start_date', ['label'=>__('Market Inaugurated'),'type' => 'text', 'class' => 'form-control datepicker']);
                            echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                            ?>
                        </div>
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