<?php
$status = \Cake\Core\Configure::read('status_options');
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
        <li><?= __('View Market') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Market Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Market Title (English)') ?></th>
                                    <td><?= h($market->title_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Market Title (Bangla)') ?></th>
                                    <td><?= h($market->title_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Road Number') ?></th>
                                    <td><?= h($market->road_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Address') ?></th>
                                    <td><?= h($market->address) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Building') ?></th>
                                    <td><?= $market->has('building') ? $this->Html->link($market->building->title_en, ['controller' => 'Buildings', 'action' => 'view', $market->building->id]) : '' ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Total Area') ?></th>
                                    <td><?= $this->Number->format($market->total_area) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Dohs') ?></th>

                            <td><?= $market->has('dohs') ? $this->Html->link($market->dohs->title_bn, ['controller' => 'dohss', 'action' => 'view', $market->dohs->id]) : '' ?></td>

                                                            </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Floors') ?></th>
                                    <td><?= $this->Number->format($market->floor_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Shops') ?></th>
                                    <td><?= $this->Number->format($market->total_shop_number) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$market->status]) ?></td>
                                </tr>
                                               <tr>
                                    <th><?= __('Market Inaugurated') ?></th>
                                    <td><?= h($market->start_date) ?></td>
                             </tr>

                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($market->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($market->update_time) ?></tr>
                                </tr>
                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

