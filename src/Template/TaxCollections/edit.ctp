<a class="btn default" data-toggle="modal" href="#responsive">
    View Demo </a><?php
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
            <?= $this->Html->link(__('Tax Collections'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Tax Collection') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Tax Collection') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($taxCollection, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                        echo $this->Form->input('owner_id', ['disabled' => true]);
                        echo $this->Form->input('base_amount', ['label' => __('Base'), 'disabled' => true]);
                        echo $this->Form->input('rebet_amount', ['label' => __('Rebet')]);
                        echo $this->Form->input('late_fee_amount', ['label' => __('Late Fee')]);
                        echo $this->Form->input('fine_amount', ['label' => __('Fine')]);
                        echo $this->Form->input('assessed_amount', ['label' => __('Assessed Amount'), 'disabled' => true]);
                        echo $this->Form->input('total_amount', ['label' => __('Total Amount')]);

                        echo $this->Form->input('economic_year', ['label' => __('Economic Year'), 'readonly' => true]);
                        echo $this->Form->input('collection_date', ['label' => __('Collection Date'), 'type' => 'text', 'class' => 'form-control datepicker']);
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
<script>
    $(document).ready(function () {

        $('.datepicker').datepicker({format: 'yyyy-mm-dd'});

    });
</script>