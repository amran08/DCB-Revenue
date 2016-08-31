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
            <?= $this->Html->link(__('Plots'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Plot') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Plot Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('District') ?></th>
                                    <td><?= $plot->has('district') ? $this->Html->link($plot->district->id, ['controller' => 'Districts', 'action' => 'view', $plot->district->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Upazila') ?></th>
                                    <td><?= $plot->has('upazila') ? $this->Html->link($plot->upazila->id, ['controller' => 'Upazilas', 'action' => 'view', $plot->upazila->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Plot Type') ?></th>
                                    <td><?= h($plot->plot_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Plot Number') ?></th>
                                    <td><?= h($plot->plot_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Road Number') ?></th>
                                    <td><?= h($plot->road_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Road Name') ?></th>
                                    <td><?= h($plot->road_name) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Mouja Id') ?></th>
                                    <td><?= $this->Number->format($plot->mouja_id) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Dohs Id') ?></th>
                                    <td><?= $this->Number->format($plot->dohs_id) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Land Type Id') ?></th>
                                    <td><?= $this->Number->format($plot->land_type_id) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Total Area') ?></th>
                                    <td><?= $this->Number->format($plot->total_area) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Area North') ?></th>
                                    <td><?= $this->Number->format($plot->area_north) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Area South') ?></th>
                                    <td><?= $this->Number->format($plot->area_south) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Area East') ?></th>
                                    <td><?= $this->Number->format($plot->area_east) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Area West') ?></th>
                                    <td><?= $this->Number->format($plot->area_west) ?></td>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Allotment Date') ?></th>
                                    <td><?= h($plot->allotment_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($plot->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($plot->update_time) ?></tr>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Is Lease') ?></th>
                                    <td><?= $plot->is_lease ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                        <tr>
                                    <th><?= __('Is Blank') ?></th>
                                    <td><?= $plot->is_blank ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                        <tr>
                                    <th><?= __('Is Residential') ?></th>
                                    <td><?= $plot->is_residential ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

