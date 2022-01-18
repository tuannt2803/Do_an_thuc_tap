<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>

<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sửa thông tin sản phẩm</h5>
                <form class="form-material form-horizontal m-t-30" action='<?php echo base_url().'/admin/product/edit/'.$product['product_id']?>' method='POST' enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-12" for="example-text">Tên sản phẩm</span>
                    </label>
                    <div class="col-md-12">
                        <input type="text" id="text" name="product_name" class="form-control"
                            placeholder="nhập tên sản phẩm" value="<?= $product['name']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="price">Giá</span>
                    </label>
                    <div class="col-md-12">
                        <input type="text" id="price" name="price" class="form-control"
                            placeholder="nhập giá" value="<?= $product['price']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="quantity">Số lượng</span>
                    </label>
                    <div class="col-md-12">
                        <input type="text" id="quantity" name="quantity" class="form-control"
                            placeholder="nhập số lượng" value="<?= $product['quantity']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="color">Mã code</span>
                    </label>
                    <div class="col-md-12">
                        <input type="text" id="color" name="code" class="form-control "
                            placeholder="nhập mã code" value="<?= $product['productCode']?>">
                    </div>
                </div>
                    <div class="form-group">
                        <label class="col-sm-12">Loại sản phẩm</label>
                        <div class="col-sm-12">
                            <select class="form-control">
                            <?php use App\Models\categoryModel;
                                $model = new categoryModel();
                                $data = $model->findAll();
                                foreach ($data as $item){
                                    if($item['category_id'] == $product['category_id']){
                                        echo '<option value="'.$item['category_id'].'" selected>'.$item['name'].'</option>';
                                    }else{
                                    echo '<option value="'.$item['category_id'].'">'.$item['name'].'</option>';}
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Nhà cung cấp</label>
                        <div class="col-sm-12">
                            <select class="form-control">
                            <?php use App\Models\supplierModel;
                                $sup = new supplierModel();
                                $data = $sup->findAll();
                                foreach ($data as $item){
                                    echo '<option value="'.$item['id'].'">'.$item['company_name'].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Ảnh</h4>
                                    <label for="input-file-now">Chọn ảnh</label>
                                    <input type="file" id="input-file-now" class="dropify" name='fileToUpload' />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tải ảnh lên</h4>
                                    <label for="input-file-now-custom-1">Nhiều ảnh</label>
                                    <input type="file" id="input-file-now-custom-1" class="dropify" name ='image_more[]' multiple />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Thông số</h4>
                                    <div id="education_fields"></div>
                                    <?php foreach(explode('|', $product['featureData']) as $item):
                                        $row = explode(':',$item); ?>
                                    <div class="row">
                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="Schoolname" name="name[]" value="<?= $row[0]?>" placeholder="Tên thông số">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="Major" name="value[]" value="<?= $row[1]?>" placeholder="Chi tiết">
                                            </div>
                                        </div>
                                        <!-- <div class="input-group-append" style="height: 40px;">
                                            <button class="btn btn-success" type="button" onclick="education_fields();"><i class="fa fa-plus"></i></button>
                                        </div> -->


                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment -->
                    <!-- <div class="form-group">
                                        <label class="col-sm-12">Profile Image</label>
                                        <div class="col-sm-12">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                        </div>
                                    </div> -->

                    <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Lưu</button>
                    <button type="button" onclick="window.history.back();"
                                        class="btn btn-info waves-effect waves-light m-r-10">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End PAge Content -->

<?= $this->endSection() ?>