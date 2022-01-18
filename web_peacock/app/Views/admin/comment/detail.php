<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>

<div class="row d-flex justify-content-center">
                    <!-- Column -->
                    <div class="col-lg-6 ">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="<?php echo $info['image']?>" class="img-circle"
                                        width="150">
                                    <h4 class="card-title m-t-10">Bình luận của khách hàng </h4>
                                </center>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="card-body">
                                <small class="text-muted p-t-30 db">Tác giả</small>
                                <h6><?= $comment['author']?></h6> 
                                <small class="text-muted">Nội dung</small>
                                <h6><?= $comment['content']?></h6> <small class="text-muted p-t-30 db">Địa chỉ</small>
                                <h6><?= $comment['address']?></h6> 
                                <small class="text-muted p-t-30 db">Ngày tạo</small>
                                <h6><?= $comment['createdDate']?></h6>
                                
                                
                                
                            </div>
                        </div>
                    </div>

                </div>

<?= $this->endSection() ?>