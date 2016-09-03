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
            <?= $this->Html->link(__('Buildings'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Building') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Building Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Dohs') ?></th>
                                    <td><?= $building->has('dohs') ? $this->Html->link($building->dohs->title_en, ['controller' => 'Dohss', 'action' => 'view', $building->dohs->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Road Number') ?></th>
                                    <td><?= h($building->road_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Build Type') ?></th>
                                    <td><?= h($building->build_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title En') ?></th>
                                    <td><?= h($building->title_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title Bn') ?></th>
                                    <td><?= h($building->title_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Build Site North') ?></th>
                                    <td><?= h($building->build_site_north) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Build Site South') ?></th>
                                    <td><?= h($building->build_site_south) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Build Site East') ?></th>
                                    <td><?= h($building->build_site_east) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Build Site West') ?></th>
                                    <td><?= h($building->build_site_west) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Build Site Road Details') ?></th>
                                    <td><?= h($building->build_site_road_details) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Build Site Soil Type') ?></th>
                                    <td><?= h($building->build_site_soil_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Build Purpose') ?></th>
                                    <td><?= h($building->build_purpose) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Roof Type') ?></th>
                                    <td><?= h($building->roof_type) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Building Details') ?></th>
                                    <td><?= h($building->building_details) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Waste Cleaning Details') ?></th>
                                    <td><?= h($building->waste_cleaning_details) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Build Site Area') ?></th>
                                    <td><?= $this->Number->format($building->build_site_area) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Estimate Cost') ?></th>
                                    <td><?= $this->Number->format($building->estimate_cost) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Actual Cost') ?></th>
                                    <td><?= $this->Number->format($building->actual_cost) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Floor Number') ?></th>
                                    <td><?= $this->Number->format($building->floor_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Apartment Number') ?></th>
                                    <td><?= $this->Number->format($building->apartment_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Developer Id') ?></th>
                                    <td><?= $this->Number->format($building->developer_id) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$building->status]) ?></td>
                                </tr>
                                                                                                                                        <tr>
                                    <th><?= __('Plan Approve Date') ?></th>
                                    <td><?= h($building->plan_approve_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Work Start Date') ?></th>
                                    <td><?= h($building->work_start_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Work Finish Date') ?></th>
                                    <td><?= h($building->work_finish_date) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= h($building->create_time) ?></tr>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= h($building->update_time) ?></tr>
                                </tr>
                                                                                                                                <tr>
                                    <th><?= __('Is Apartment') ?></th>
                                    <td><?= $building->is_apartment ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                        <tr>
                                    <th><?= __('Is House') ?></th>
                                    <td><?= $building->is_house ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                        <tr>
                                    <th><?= __('Is Legal Info') ?></th>
                                    <td><?= $building->is_legal_info ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                        <tr>
                                    <th><?= __('Septic Tank Info') ?></th>
                                    <td><?= $building->septic_tank_info ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

