<?php
$status = \Cake\Core\Configure::read('status_options');

$house_type = \Cake\Core\Configure::read('house_type');
?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Houses'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View House') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('House Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Dohs') ?></th>
                            <td><?= $house->has('dohs') ? $this->Html->link($house->dohs->title_bn, ['controller' => 'Dohss', 'action' => 'view', $house->dohs->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Building') ?></th>
                            <td><?= $house->has('building') ? $this->Html->link($house->building->title_bn, ['controller' => 'Buildings', 'action' => 'view', $house->building->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('House Type') ?></th>
                            <td><?= __($house_type[$house->house_type]) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('House Number') ?></th>
                            <td><?= $this->System->en_to_bn($house->house_number)?></td>
                        </tr>
                        <tr>
                            <th><?= __('House Title') ?></th>
                            <td><?= h($house->house_title) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Floor Number') ?></th>
                            <td><?= $this->System->en_to_bn($house->floor_number)?></td>
                        </tr>

                        <tr>
                            <th><?= __('Total Area') ?></th>
                            <td><?= $this->System->en_to_bn($house->total_area)?></td>
                        </tr>


                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= __($status[$house->status]) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Create Time') ?></th>
                            <td><?= h($house->create_time) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Update Time') ?></th>
                            <td><?= h($house->update_time) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Commercial') ?></th>
                            <td><?= $house->is_commercial ? __('Yes') : __('No'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

