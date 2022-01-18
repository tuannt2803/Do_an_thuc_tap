<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>

 <!-- start  main content -->
<?php use App\Models\categoryModel;?>
 <?php if ($message == "success") : ?>
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thêm nhà cung cấp</h5>
                                <form class="form-material form-horizontal m-t-30" enctype="multipart/form-data" method='POST' >
                                    <div class="form-group">
                                        <label class="col-md-12" for="example-text">Tên nhà cung cấp</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="example-text" name="companyname" class="form-control"
                                                placeholder="nhập tên nhà cung cấp">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="fName">Website</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="fName" name="url" class="form-control"
                                                placeholder="Link Website">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Loại sản phẩm cung cấp</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name='type'>
                                                <!-- <option>Select</option> -->
                                                <?php 
                                                    $model = new categoryModel();
                                                    $data = $model->findAll();
                                                    foreach ($data as $item){
                                                        echo '<option value="'.$item['category_id'].'">'.$item['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="email">Email</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="nhập email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="phone">Số điện thoại</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="number" id="phone" name="phone"
                                                class="form-control" placeholder="enter your phone">
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                    <label class="col-md-12" for="phone">Địa chỉ</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text"  id="address" name="address"
                                                class="form-control" placeholder="nhập địa chỉ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-12" for="phone">Quốc gia</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text"  id="country" name="country"
                                                class="form-control" placeholder="Tên quốc gia">
                                        </div>
                                    </div>
                                    <label class="col-md-12" for="phone">Logo</span>
                                        </label>
                                        <div class="col-md-12">
                                            <label for="input-file-now">Chọn logo</label>
                                            <input type="file" id="input-file-now" name="file" class="dropify">
                                        </div>
                                    </div>
                                    
                
                                    <button type="submit"
                                        class="btn btn-info waves-effect waves-light m-r-10">Lưu</button>
                                    <button type="button"onclick="window.history.back();"
                                        class="btn btn-inverse waves-effect waves-light">Hủy</button>
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