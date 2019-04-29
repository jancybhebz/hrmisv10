<?=load_plugin('css',array('datatables'));?>
<!-- begin education information -->
<style>th {vertical-align: middle !important;text-align: center;}</style>

<div class="col-md-12">
    <table class="table table-bordered">
        <tr class="active">
            <th style="line-height: 2;" colspan="4">Spouse Information
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn blue btn-sm pull-right" data-toggle="modal" href="#edit_spouse_modal"> <i class="icon-pencil"></i> Add Education </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <pre><?php print_r($arrEduc) ?></pre>
            <table class="table table-striped table-bordered table-hover" id="tbleduc">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Level Code</th>
                        <th>Name of School</th>
                        <th>Basic Education /<br> Degree Course</th>
                        <th>Period of Attendance<br> [From / To]</th>
                        <th>Highest Level /<br> Units Earned</th>
                        <th>Year Graduated</th>
                        <th>Scholarship /<br> Honors Received</th>
                        <th>Graduate</th>
                        <th>Licensed</th>
                        <th></th>
                    </tr>
                </thead>
                
            </table>
        </tr>
    </table>
</div>
<?php #require 'modal/_spouse_info.php'; ?>
<!-- end education information -->
<?=load_plugin('js',array('datatables'));?>

<script>
    $(document).ready(function() {
        $('#tbleduc').dataTable( {pageLength: 5} );
    });
</script>