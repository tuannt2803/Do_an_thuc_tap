<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>
<!-- import code hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bình luận</h5>
                <div class="table-responsive">
                    <table id="example23" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Ngày tạo</th>
                                <th align="center">Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($comment as $item):?>
                            <tr class="obj-item">
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['author'] ?></td>
                                <td><?= $item['address'] ?></td>
                                <td><?= $item['createdDate'] ?></td>
                                <td>
                                    <div class="obj-action">
                                        <div class="ac">

                                            <a href="<?= base_url().'/admin/comment/detail/'.$item['id']?>" data-toggle="tooltip" data-placement="bottom" title="Chi tiết"><i class="fas fa-info-circle"></i></a>
                                        </div>
                                        <div class="ac">
                                            <a href="<?= base_url().'/admin/comment/edit/'.$item['id']?>" data-toggle="tooltip" data-placement="bottom" title="Sửa"><i class="far fa-edit"></i> </a>
                                        </div>
                                        <div class="ac">
                                            <a href="<?php echo base_url().'/admin/comment/delete/'.$item['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" data-toggle="tooltip" data-placement="bottom" title="Xóa"><i class="far fa-trash-alt"></i></a>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End Page Content -->
<?= $this->endSection() ?>