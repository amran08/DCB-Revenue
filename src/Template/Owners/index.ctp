<?php
$status = \Cake\Core\Configure::read('status_options');
$property_type = \Cake\Core\Configure::read('property_type');
$usage_type = \Cake\Core\Configure::read('usage_type');
$ownership_type = \Cake\Core\Configure::read('building_ownership_type');
$owner_type = \Cake\Core\Configure::read('owner_type');


?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= $this->Html->link(__('Owners'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Owner List') ?>
                </div>
                <div class="tools">

                    <?php  echo $this->Html->link(__('New Owner'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>

            <div class="portlet-body">

                <div class="col-md-12">
                    <div class="col-md-7">
                        <?php
                        echo $this->Form->create();
                        $property_type_arr = ['Buildings'=>__('Buildings'),'Apartments'=>__('Apartments'),'Plots'=>__('Plots'),'Shops'=>__('Shops')];
                        echo $this->Form->input('property_type_table_name', ['options' => $property_type_arr, 'empty'=>__('Select'),'label' => __('Property Type')]);
                        ?><br><br>

                        <?php
                        echo $this->Form->input('name_bn', ['label' => __('Name (Bangla)')]);

                        ?>
                    </div><br><br>
                    <div class="col-md-5">
                        <?php
                        echo $this->Form->button(__('Filter'), ['type' => 'submit', 'class' => 'btn btn-sm btn-primary']);
                        echo "&nbsp;&nbsp";
                        echo $this->Html->link(__('Reset'), ['action' => 'index'], ['class' => 'btn btn-sm btn-primary']);
                        echo $this->Form->end();
                        ?>
                    </div><br><br><br>

                </div>
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Owner Type') ?></th>
                            <th><?= __('Ownership Type') ?></th>

                            <th><?= __('Property Type') ?></th>


                            <th><?= __('NID') ?></th>

                            <th><?= __('Mobile') ?></th>

                            <th><?= __('Status') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($owners as $key => $owner) { ?>

                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= h($owner->name_bn) ?></td>
                                <td><?= __($owner_type[$owner->owner_type]) ?></td>
                                <td><?= __($ownership_type[$owner->ownership_type]) ?></td>
                                <!--                                    <td><?= h($owner->property_type) ?></td>-->
                                <td><?= __($property_type[$owner->property_type_table_name]) ?></td>

                                <td><?= $this->System->en_to_bn($owner->nid)?></td>

                                <td><?= $this->System->en_to_bn($owner->mobile_number)?></td>
                                <?php
                                //                                        $owner->has('holding_number') ?
                                //                                                $this->Html->link($owner->holding_number
                                //                                                        ->id, ['controller' => 'HoldingNumbers',
                                //                                                    'action' => 'view', $owner->holding_number
                                //                                                    ->id]) : ''
                                ?>
                                <td><?= __($status[$owner->status]) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $owner->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $owner->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $owner->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $owner->id)]);
                                    ?>

                                </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev('<<');
                    echo $this->Paginator->numbers();
                    echo $this->Paginator->next('>>');
                    ?>
                </ul>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

