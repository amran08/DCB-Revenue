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
        <li><?= $this->Html->link(__('Building Files'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Building File List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Building File'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= __('Sl. No.') ?></th>
                                <th><?= __('File Type') ?></th>
                                <th><?= __('Submission Type') ?></th>
                                <th><?= __('Building') ?></th>
                                <th><?= __('file_url') ?></th>
                                <th><?= __('Applicant') ?></th>
                                <th><?= __('Applicant Address') ?></th>
                                <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($buildingFiles as $key => $buildingFile) { ?>
                                <tr>
                                    <td><?= $this->Number->format($key + 1) ?></td>
                                    <td><?= h($buildingFile->file_type) ?></td>
                                    <td><?= h($buildingFile->submission_type) ?></td>
                                    <td><?=
                                        $buildingFile->has('building') ?
                                                $this->Html->link($buildingFile->building
                                                        ->title_en, ['controller' => 'Buildings',
                                                    'action' => 'view', $buildingFile->building
                                                    ->id]) : ''
                                        ?></td>
                                    <td><?= h($buildingFile->file_url) ?></td>
                                    <td><?= h($buildingFile->applicant_name_en) ?></td>
                                    <td><?= h($buildingFile->applicant_address) ?></td>
                                    <td class="actions">
                                        <?php
                                        echo $this->Html->link(__('View'), ['action' => 'view', $buildingFile->id], ['class' => 'btn btn-sm btn-info']);

                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $buildingFile->id], ['class' => 'btn btn-sm btn-warning']);

                                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $buildingFile->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $buildingFile->id)]);
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

