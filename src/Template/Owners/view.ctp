<?php
$status = \Cake\Core\Configure::read('status_options');
$gender = \Cake\Core\Configure::read('genders');
$religion = \Cake\Core\Configure::read('religions');

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
        <li>
            <?= $this->Html->link(__('Owners'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Owner') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Owner Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Owner Type') ?></th>
                            <td><?= __($owner_type[$owner->owner_type]) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Property Type') ?></th>
                            <td><?= __($property_type[$owner->property_type_table_name]) ?></td>
                        </tr>
                        <!--                        <tr>-->
                        <!--                            <th>--><? //= __('Holding Number') ?><!--</th>-->
                        <!--                            <td>-->
                        <?php ////$owner->has('holding_number') ? $this->Html->link($owner->holding_number->id, ['controller' => 'HoldingNumbers', 'action' => 'view', $owner->holding_number->id]) : '' ?><!--</td>-->
                        <!--                        </tr>-->
                        <tr>
                            <th><?= __('Usage Type') ?></th>
                            <td><?= __($usage_type[$owner->usage_type]) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Ownership Type') ?></th>
                            <td><?= __($ownership_type[$owner->ownership_type]) ?></td>

                        </tr>
                        <tr>
                            <th><?= __('Name (English)') ?></th>
                            <td><?= h($owner->name_en) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Name (Bangla)') ?></th>
                            <td><?= h($owner->name_bn) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Father Name (English)') ?></th>
                            <td><?= h($owner->father_name_en) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Father Name (Bangla)') ?></th>
                            <td><?= h($owner->father_name_bn) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Mother Name (English)') ?></th>
                            <td><?= h($owner->mother_name_en) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Mother Name (Bangla)') ?></th>
                            <td><?= h($owner->mother_name_bn) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Spouse Name (English)') ?></th>
                            <td><?= h($owner->spouse_name_en) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Spouse Name (Bangla)') ?></th>
                            <td><?= h($owner->spouse_name_bn) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('NID') ?></th>
                            <td><?= $this->System->en_to_bn($owner->nid) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Religion') ?></th>
                            <td><?= __($religion[$owner->religion]) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Gender') ?></th>
                            <td><?= __($gender[$owner->gender]) ?></td>
                        </tr>
                        </tr>
                        <tr>
                            <th><?= __('Mobile Number') ?></th>
                            <td><?= $this->System->en_to_bn($owner->mobile_number) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Phone Number') ?></th>

                            <td><?= $this->System->en_to_bn($owner->phone_number) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($owner->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Present Address') ?></th>
                            <td><?= h($owner->present_address) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Permanent Address') ?></th>
                            <td><?= h($owner->permanent_address) ?></td>
                        </tr>
                        <!--                        <tr>-->
                        <!--                            <th>--><?php //= __('Picture') ?><!--</th>-->
                        <!--                            <td>--><?php //= h($owner->picture) ?><!--</td>-->
                        <!--                        </tr>-->

                        <!--                        <tr>-->
                        <!--                            <th>--><?php // __('Property Id') ?><!--</th>-->
                        <!--                            <td>-->
                        <?php // $this->Number->format($owner->property_id) ?><!--</td>-->
                        <!--                        </tr>-->

                        <tr>
                            <th><?= __('Own Percentage') ?></th>

                            <td><?= $this->System->en_to_bn($owner->own_percentage) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Date of Birth') ?></th>
                            <td><?= h($owner->dob) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Own Date') ?></th>
                            <td><?= h($owner->own_date) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Lease Expire Date') ?></th>
                            <td><?= h($owner->lease_expire_date) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Create Time') ?></th>
                            <td><?= h($owner->create_time) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Update Time') ?></th>
                            <td><?= h($owner->update_time) ?></tr>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= $owner->status ? __('Yes') : __('No'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

