<?php
$status = \Cake\Core\Configure::read('status_options');
$apartment_type = \Cake\Core\Configure::read('apartment_type');

?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Apartments'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Apartment') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Apartment Details') ?>
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
                            <td><?= $apartment->has('dohs') ? $this->Html->link($apartment->dohs->title_bn, ['controller' => 'Dohss', 'action' => 'view', $apartment->dohs->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Building') ?></th>
                            <td><?= $apartment->has('building') ? $this->Html->link($apartment->building->title_bn, ['controller' => 'Buildings', 'action' => 'view', $apartment->building->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Apartment Type') ?></th>
                            <td><?= __($apartment_type[$apartment->apartment_type]) ?></td>

                        </tr>
                        <tr>
                            <th><?= __('Apartment Number') ?></th>
                            <td><?= h($this->System->en_to_bn($apartment->apartment_number)) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Floor Position') ?></th>

                            <td><?= h($this->System->en_to_bn($apartment->floor_position)) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Monthly Rent') ?></th>

                            <td><?= h($this->System->en_to_bn($apartment->monthly_rent)) ?></td>


                        </tr>

                        <tr>
                            <th><?= __('Floor Number') ?></th>
                            <td><?= h($this->System->en_to_bn($apartment->floor_number)) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Total Area') ?></th>
                            <td><?= h($this->System->en_to_bn($apartment->total_area)) ?></td>
                        </tr>


                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= __($status[$apartment->status]) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Create Time') ?></th>
                            <td><?= h($apartment->create_time) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Update Time') ?></th>
                            <td><?= h($apartment->update_time) ?></tr>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

