<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>
<?php $array_type = [
    '1' => 'Áo',
    '2' => 'Quần Dài',
    '3' => 'Váy Đầm',
    '4' => 'Túi Xách',
    '5' => 'Giầy',
    '6' => 'Ví',
    '7' => 'Kính',
    '8' => 'Dây Lưng'
]?>
 <?php if ($message == "success") : ?>
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách nhà cung cấp</h5>
                                <div class="table-responsive">
                                    <table id="example23" class="table table-striped">
                                    <?php 
                                        session_start();
                                    ?>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên nhà cung cấp</th>
                                                <th>Website</th>
                                                <th>Quốc gia</th>
                                                <th>Sản phẩm cung cấp</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($supplier as $row) :?>
                                            <tr class="obj-item">
                                                <td><?=$row['id']?></td>
                                                <td><?=$row['company_name']?></td>
                                                <td><?=$row['weburl']?></td>
                                                <td><?=$row['country']?></td>
                                                <td><?php echo $array_type[(string) $row['product_type']];?></td>
                                                <td>
                                                    <div class="obj-action">
                                                        <div class="ac">

                                                            <a href="<?php echo base_url().'/admin/supplier/detail/'.$row['id']?>" data-toggle="tooltip" data-placement="bottom"
                                                                title="Chi tiết"><i class="fas fa-info-circle"></i></a>
                                                        </div>
                                                        <div class="ac">
                                                            <a href="<?php echo base_url().'/admin/supplier/edit/'.$row['id']?>" data-toggle="tooltip" data-placement="bottom"
                                                                title="Sửa"><i class="far fa-edit"></i> </a>
                                                        </div>
                                                        <div class="ac">
                                                            <!-- <a href="<?php echo base_url().'/admin/admin/delete?id='.$row['id']?>" data-toggle="tooltip" data-placement="bottom"
                                                                title="Delete" onclick="return confirm('Are you sure?');"><i class="far fa-trash-alt"></i></a> -->
                                                                <a href="<?php echo base_url().'/admin/supplier/delete/'.$row['id']?>" data-toggle="tooltip" data-placement="bottom" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"
                                                                id="sa-confirm" data-original-title="Xóa"><i class="far fa-trash-alt"></i></a>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php elseif ($message == "fail") : ?>
                    <div class="alert alert-danger">
                        <strong>Bạn không có quyền!</strong>
                    </div>
<?php endif; ?>


                <!-- ============================================================== -->
                <!-- End Page Content -->
<?= $this->endSection() ?>