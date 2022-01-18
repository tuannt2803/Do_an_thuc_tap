<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>
 <?php if ($message == "success") : ?>
        <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bảng tài khoản</h5>
                <h6 class="card-subtitle">Tất cả tài khoản</h6>
                <div class="table-responsive">
                    <table id="example23" class="table table-striped">
                        <?php
                        session_start();
                        ?>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tài khoản</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Ngày sinh</th>
                                <th>Số điện thoại</th>
                                <th>Quyền</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($user as $row) : ?>
                                <tr class="obj-item">
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['fullname'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['birthday'] ?></td>
                                    <td><?= $row['phone_number'] ?></td>
                                    <td><?php if ($row['role_id'] == '1') {
                                            echo 'Quản trị viên';
                                        } else if($row['role_id'] == '2'){
                                            echo 'Khách hàng';
                                        } 
                                        
                                        else{
                                            echo 'Nhân viên';
                                        }?></td>
                                    <td>
                                        <div class="obj-action">
                                            <div class="ac">

                                                <a href="<?php echo base_url() . '/admin/profile/' . $row['id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Chi tiết"><i class="fas fa-info-circle"></i></a>
                                            </div>
                                            <div class="ac">
                                                <a href="<?php echo base_url() . '/admin/admin/edit/' . $row['id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Chỉnh sửa"><i class="far fa-edit"></i> </a>
                                            </div>
                                            <div class="ac">
                                                <a href="<?php echo base_url() . '/admin/admin/delete/' . $row['id'] ?>" data-toggle="tooltip" data-placement="bottom" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" id="sa-confirm" data-original-title="Xóa"><i class="far fa-trash-alt"></i></a>
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