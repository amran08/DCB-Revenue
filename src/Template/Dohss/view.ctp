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
            <?= $this->Html->link(__('Dohss'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Dohs') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Dohs Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Title En') ?></th>
                                    <td><?= h($dohs->title_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title Bn') ?></th>
                                    <td><?= h($dohs->title_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Map File') ?></th>
                                    <td><?= h($dohs->map_file) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Total Area') ?></th>
                                    <td><?= $this->Number->format($dohs->total_area) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Plot Number') ?></th>
                                    <td><?= $this->Number->format($dohs->total_plot_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Building Number') ?></th>
                                    <td><?= $this->Number->format($dohs->total_building_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total House Number') ?></th>
                                    <td><?= $this->Number->format($dohs->total_house_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Apartment Number') ?></th>
                                    <td><?= $this->Number->format($dohs->total_apartment_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Market Number') ?></th>
                                    <td><?= $this->Number->format($dohs->total_market_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Shop Number') ?></th>
                                    <td><?= $this->Number->format($dohs->total_shop_number) ?></td>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($dohs->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($dohs->update_time) ?></tr>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $dohs->status ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

