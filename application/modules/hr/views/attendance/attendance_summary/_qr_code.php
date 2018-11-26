<?=load_plugin('css', array('profile-2'))?>
<div class="tab-pane active" id="tab_1_1">
    <div class="col-md-12">
        <?php 
            $qrimg = file_exists('images/qr/'.$this->uri->segment(4).'.png');
            if($qrimg!='1'): ?>
                <p>QR Code not exists <button class="btn btn-sm green">Generate New</button></p> <?php 
            else: ?>
                <form action="<?=base_url('hr/attendance/download_qrcode/').$this->uri->segment(4)?>">
                    <img src="<?=base_url('images/qr/'.$this->uri->segment(4).'.png')?>" alt="">
                    <p style="margin-left: 15px;">
                        <button type="submit" class="btn btn-sm blue">Download</button></p>
                </form>
                <?php
            endif; ?>
    </div>
</div>