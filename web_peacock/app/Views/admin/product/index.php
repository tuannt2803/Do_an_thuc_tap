<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>

<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- -->
 <?php if ($message == "success") : ?>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <h5 class="card-title">Danh sách sản phẩm</h5>
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Nhà cung cấp</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Ảnh</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($user as $row): ?>
                            <tr class="obj-item">
                                <td><?=$row['product_id']?></td>
                                <td><?=$row['name']?></td>
                                <td><?=$row['supplier_id']?></td>
                                <td><?=$row['quantity']?></td>
                                <td><?=$row['price']?></td>
                                <td><img src=" <?php if($row['image'][0] == 'h'){
                                    echo $row['image'];}
                                    else {
                                        echo base_url() . $row['image'];
                                    }
                                ?>" alt="" width="50" height="50"></td>
                                <!-- <td>63-(612)356-9955</td> -->
                                <td>
                                    <div class="obj-action">
                                        <div class="ac">

                                            <a href="<?php echo base_url().'/admin/product/detai/'.$row['product_id']?>" data-toggle="tooltip" data-placement="bottom" title="Chi tiết"><i class="fas fa-info-circle"></i></a>
                                        </div>
                                        <div class="ac">
                                            <a href="<?php echo base_url().'/admin/product/edit/'.$row['product_id']?>" data-toggle="tooltip" data-placement="bottom" title="Sửa"><i class="far fa-edit"></i> </a>
                                        </div>
                                        <div class="ac">
                                            <a href="<?php echo base_url().'/admin/product/delete/'.$row['product_id']?>" onclick="return confirm('Bạn có chắc chắn xóa?');" data-toggle="tooltip" data-placement="bottom" title="Xóa"><i class="far fa-trash-alt"></i></a>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <!-- <tr class="obj-item">
                                <td>70</td>
                                <td>Shirley</td>
                                <td>Oyonder</td>
                                <td>1000</td>
                                <td>sfreeman1x@dmoz.org</td>
                                <td>63-(612)356-9955</td>
                                <td>
                                    <div class="obj-action">
                                        <div class="ac">

                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fas fa-info-circle"></i></a>
                                        </div>
                                        <div class="ac">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="far fa-edit"></i> </a>
                                        </div>
                                        <div class="ac">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="far fa-trash-alt"></i></a>
                                        </div>

                                    </div>
                                </td>
                            </tr> -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- table responsive -->

    </div>
</div>
    <?php elseif ($message == "fail") : ?>
        <div class="alert alert-danger">
            <strong>Bạn không có quyền!</strong> 
        </div>
<?php endif; ?>

<!-- ============================================================== -->
<!-- End PAge Content -->

<?= $this->endSection() ?>