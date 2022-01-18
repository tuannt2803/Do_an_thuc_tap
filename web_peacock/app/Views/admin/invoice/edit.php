<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông tin đơn hàng</h5>
                <form class="form-horizontal m-t-30" method='POST'>

                <div class="form-group">
                        <label class="col-md-12" for="example-text3">Người nhận</span>
                        </label>
                        <div class="col-md-12">
                            <input type="hidden" id="id" name="id_hidden" value="<?= $id?>">
                            <input type="text" id="example-text3" name="client_name" class="form-control" placeholder="" value="<?= $info['fullname']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-text3">Số điện thoại</span>
                        </label>
                        <div class="col-md-12">
                            <input type="number" id="example-text3" name="phone" class="form-control" placeholder="" value="<?= $info['phone']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-text3">Địa chỉ</span>
                        </label>
                        <div class="col-md-12">
                            <input type="text" id="example-text3" name="address" class="form-control" placeholder="" value="<?= $info['bill_address']?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12">Thanh toán</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="paid_status">
                                <option value="0" <?php if ($info['paid_status']==0): echo "selected"; endif;?>>Chưa thanh toán</option>
                                <option value="1"<?php if ( $info['paid_status']==1): echo "selected"; endif;?>>Đã thanh toán</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                       <label class="col-sm-12">Hình thức thanh toán</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="payment">
                                <option value="0" <?php if ($info['payments']==0): echo "selected"; endif;?>>Online</option>
                                <option value="1"<?php if ( $info['payments']==1): echo "selected"; endif;?>>Khi nhận Hàng</option>
                            </select>
                        </div> 
                    </div>
                    <div class="form-group">
                       <label class="col-sm-12">Trạng thái vận chuyển</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="shipping_status">
                                <option value="0" <?php if ($info['shipping_status']==0): echo "selected"; endif;?>>Đang trong kho</option>
                                <option value="1"<?php if ( $info['shipping_status']==1): echo "selected"; endif;?>>Đang vận chuyển</option>
                                <option value="2"<?php if ( $info['shipping_status']==2): echo "selected"; endif;?>>Đã nhận</option>
                                <option value="3"<?php if ( $info['shipping_status']==3): echo "selected"; endif;?>>Hủy</option>
                            </select>
                        </div> 
                    </div>
                    <div class="form-group">
                       <label class="col-sm-12">Trạng thái đơn hàng</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="status">
                                <option value="0" <?php if ($info['status']==0): echo "selected"; endif;?>>Đã Hủy</option>
                                <option value="1"<?php if ( $info['status']==1): echo "selected"; endif;?>>Hoạt Động</option>
                            </select>
                        </div> 
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Ghi chú</label>
                        <div class="col-md-12">
                            <textarea class="form-control" rows="3" name='note' ><?= $info['note']?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Lưu</button>
                    <button type="button" onclick="window.history.back();"
                                        class="btn btn-info waves-effect waves-light m-r-10">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End Page Content -->

<?= $this->endSection() ?>