



<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('ঢাকা ক্যান্টনমেন্ট বোর্ডের রাজস্ব আদায়ের বিবরণী') ?>
                </div>
                <div class="tools">
                    <?php //$this->Html->link(__('New Building File'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>

        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-5">

        <?php echo $this->Form->input('owner.0.from_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'From']);
        ?>
    </div>
    <div class="col-md-5">

        <?php echo $this->Form->input('owner.0.from_date', ['class' => 'datepicker form-control', 'type' => 'text', 'label' => 'To']);
        ?>
    </div>
    <div class="col-md-2">
        <button type ="button" class="btn btn-primary" id="ajax-sb">
            Submit
        </button>
    </div>
</div>

<script>
    $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
    $(document).ready(function () {

        //  $('#sh-data').hide();
        $(document).on('click', '#ajax-sb', function (e) {

            $.ajax({
                url: '<?php echo $this->request->webroot;?>Dashboard/reportShow',
                type: "post",
                data: {},
                success: function (response) {
                    alert("a");


                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }

            });


        });
    });
</script>