<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>

 <!-- start  main content -->
 <?php if ($message == "success") : ?>
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thông tin cơ bản</h5>
                                <form action="<?php echo base_url().'/admin/admin/add'?>" class="form-material form-horizontal m-t-30" enctype="multipart/form-data" method='POST' >
                                    <div class="form-group">
                                        <label class="col-md-12" for="example-text">Tài khoản</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="example-text" name="username" class="form-control"
                                                placeholder="Tài khoản" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="password">Mật khẩu</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Mật khẩu" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="fName">Họ và tên</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="fName" name="fullname" class="form-control"
                                                placeholder="Họ và tên" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="bdate">Ngày sinh</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="date" id="bdate" name="birthday" class="form-control mydatepicker"
                                                placeholder="Ngày sinh" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Giới tính</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name='gender'>
                                                <option>Chọn giới tính</option>
                                                <option value="Nam" checked>Nam</option>
                                                <option value="Nu">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="email">Email</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="phone">Số điện thoại</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="number" maxlength="11" id="phone" name="phone"
                                                class="form-control" placeholder="Số điện thoại" required>
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                    <label class="col-md-12" for="phone">Địa chỉ</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="address" name="address"
                                                class="form-control" placeholder="nhập địa chỉ" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-12" for="phone">Quốc tịch</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text"  id="country" name="country"
                                                class="form-control" placeholder="nhập quốc tịch" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-12" for="phone">Facebook</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text"  id="facebook" name="facebook"
                                                class="form-control" placeholder="link facebook">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-12" for="phone">Ảnh</span>
                                        </label>
                                        <div class="col-md-12">
                                            <label for="input-file-now">Chọn ảnh</label>
                                            <input type="file" id="input-file-now" name="file" class="dropify">
                                        </div>
                                    </div>
                                    
                
                                    <!-- <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Avatar</h4>
                                                    <label for="input-file-now">Choose a image</label>
                                                    <input type="file" id="input-file-now" class="dropify" name='file'/>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div> -->
                
                
                
                                    <!-- Comment -->
                                    <!-- <div class="form-group">
                                        <label class="col-sm-12">Profile Image</label>
                                        <div class="col-sm-12">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                        </div>
                                    </div> -->
                
                                    <button type="submit"
                                        class="btn btn-info waves-effect waves-light m-r-10">Lưu</button>
                                    <a href="<?php echo base_url().'/admin/admin'?>" class="btn btn-info waves-effect waves-light m-r-10" >Hủy</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php elseif ($message == "fail") : ?>
        <div class="alert alert-danger">
            <strong>Bạn không có quyền!</strong> 
        </div>
<?php endif; ?>       
 
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

<?= $this->endSection() ?>