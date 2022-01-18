<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông tin đơn hàng</h5>
                <form class="form-horizontal m-t-30" method='POST' >

                    <div class="form-group">
                        <label class="col-md-12" for="example-text3">Người nhận</span>
                        </label>
                        <div class="col-md-12">
                            <input type="text" id="example-text3" name="client_name" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-text3">Số điện thoại</span>
                        </label>
                        <div class="col-md-12">
                            <input type="number" id="example-text3" name="phone" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-text3">Địa chỉ</span>
                        </label>
                        <div class="col-md-12">
                            <input type="text" id="example-text3" name="address" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12">Thanh toán</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="paid_status">
                                <option value="0">Chưa thanh toán</option>
                                <option value="1">Đã thanh toán</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                       <label class="col-sm-12">Hình thức thanh toán</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="payment">
                                <option value="0">Online</option>
                                <option value="1">Khi nhận Hàng</option>
                            </select>
                        </div> 
                    </div>
                    <div class="form-group">
                       <label class="col-sm-12">Trạng thái vận chuyển</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="shipping_status">
                                <option value="0">Đang trong kho</option>
                                <option value="1">Đang vận chuyển</option>
                                <option value="2">Đã nhận</option>
                                <option value="3">Hủy</option>
                            </select>
                        </div> 
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-12">Sản phẩm</label>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="education_fields"></div>
                                    <div class="row">
                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <!-- <input type="text" class="form-control" id="Schoolname" name="name[]" value="" placeholder="Name"> -->
                                                <select name="name[]" class='form-control'>
                                                <?php foreach($product as $row):?>
                                                    <option value="<?= $row['product_id'] ?>"><?= $row['name']?></option>
                                                <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="Major" name="value[]" value="" placeholder="Số lượng">
                                            </div>
                                        </div>
                                        <div class="input-group-append" style="height: 40px;">
                                            <button class="btn btn-success" type="button" onclick="education_1fields();"><i class="fa fa-plus"></i></button>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="col-md-12">Ghi chú</label>
                        <div class="col-md-12">
                            <textarea class="form-control" rows="3" name='note'></textarea>
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