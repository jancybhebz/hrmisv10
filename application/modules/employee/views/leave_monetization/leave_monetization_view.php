<?php 
/** 
Purpose of file:    Leave Monetization View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<?=load_plugin('css', array('datepicker','timepicker'))?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Employee</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('employee')?>">Request</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Leave Monetization</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
       &nbsp;
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Leave Monetization</span>
                </div>
            </div>
            <div class="portlet-body">
            <?=form_open(base_url('employee/leave_monetization/submit'), array('method' => 'post', 'id' => 'frmTO'))?>
                   
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <label class="control-label" ><b>Leave Credits Available as of January 2019</b></label>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <label class="control-label" ></label>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label class="control-label">Vacation Leave :</label>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-1 text-left">
                            <div class="form-group">
                                <?php echo $arrData[0]['vlBalance']; ?>
                            </div>
                        </div>
                    </div>
                      
                   <div class="row">
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label class="control-label">Sick Leave :</label>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-1 text-left">
                            <div class="form-group">
                                <?php echo $arrData[0]['slBalance'];?>
                            </div>
                        </div>
                    </div>
                  <div class="row">
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label class="control-label">Total Leave Credits :</label>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-1 text-left">
                            <div class="form-group">
                            <?php $sum = 0;
                                $sum += $arrData[0]['vlBalance']+ $arrData[0]['slBalance'];
                                echo $sum; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <label class="control-label"></label>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label class="control-label">Projected Vacation Leave :</label>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-1 text-left">
                            <div class="form-group">
                                <?php echo $arrData[0]['vlBalance']; ?>
                                </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label class="control-label">Projected Sick Leave :</label>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-1 text-left">
                            <div class="form-group">
                                <?php echo $arrData[0]['slBalance']; ?>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <label class="control-label" style="color:#FF0000;">Projected Leave = Actual Leave - Approved Leave Approved Leaves from January to March </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <label class="control-label"></label>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <label class="control-label" style="color:#FF0000;">"Monetization of 50% or more of all your accumulated leave credit may be allowable for valid and justifiable reasons subject to the discretion of the agency head and the availability of funds."</label>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <label class="control-label" style="color:#FF0000;">
                                "Sick leave credits may be monetized if an employee has no available vacation leave credits. Vacation leave credits must be exhausted first before sick leave credits maybe used." </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <label class="control-label" style="color:#FF0000;">
                                Five (5) days must be left at Vacation Leaves credits after monetization. </label>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <label class="control-label"></label>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <input type="checkbox" value="1" name="commutation" id="commutation" /><b> Commutation</b>
                            </div>
                        </div>
                    </div>
                     
                    <div class="row">
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label class="control-label"># of Leave Credits to be Monetized on Vacation Leave :</label>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-2 text-right">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="MonetizedVL" id="MonetizedVL" value="<?=isset($arrData[0]['vlBalance'])?$arrData[0]['vlBalance']:''?>">
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label class="control-label"># of Leave Credits to be Monetized on Sick Leave :</label>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-2 text-right">
                            <div class="form-group">
                                <input type="text" class="form-control" name="MonetizedSL" id="MonetizedSL" value="<?=isset($arrData[0]['slBalance'])?$arrData[0]['slBalance']:''?>">
                            </div>
                        </div>
                    </div></br>
                     <div class="row reason">
                        <div class="col-sm-6 text-right">
                            <div class="form-group">
                                <label class="control-label">Reason :</label>
                            </div>
                        </div>
                    <div class="row reason">
                        <div class="col-sm-2 text-right">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strReason" id="strReason"  value="<?=!empty($this->session->userdata('strReason'))?$this->session->userdata('strReason'):''?>">
                            </div>
                        </div>
                    </div></br>

                    <div class="row">
                      <div class="col-sm-12 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="Leave Monetization">

                          <button type="submit" class="btn btn-primary"><?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                          
                      </div>
                    </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>


<?=load_plugin('js',array('validation','datepicker'));?>
<script>
    $(document).ready(function() 
    {
        $('.date-picker').datepicker();
    });
 
</script>

<?=load_plugin('js',array('timepicker'));?>
<script>
    $(document).ready(function() {
        $('.timepicker').timepicker({
                timeFormat: 'HH:mm:ss A',
                disableFocus: true,
                showInputs: false,
                showSeconds: true,
                showMeridian: true,
                // defaultValue: '12:00:00 a'
            });

    <?php if($commutation==''):?>
        $('.reason').hide();
    <?php endif;?>
    <?php if($commutation=='1'):?>
        $('.reason').show();
    <?php endif;?>

    $('#printreport').click(function(){
        var desti=$('#strDestination').val();
        var todatefrom=$('#dtmTOdatefrom').val();
        var todateto=$('#dtmTOdateto').val();
        var purpose=$('#strPurpose').val();
        var meal=$('#strMeal').val();

        // if(request=='reportTO')
        //     valid=true;
        // if(valid)
            window.open("reports/generate/?rpt=reportTO&desti="+desti+"&todatefrom="+todatefrom+"&todateto="+todateto+"&purpose="+purpose+"&meal="+meal,'_blank'); //ok
            
    });
});
</script>
