<?= $this->extend('admin/_Layout') ?>
<?= $this->section('content_Admin') ?>
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                             <h3>Danh sách đơn hàng</h3>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Mã hóa đơn</th>
                                                <th>Người nhận</th>
                                                <th>Thanh toán</th>
                                                <th>Kiểu thanh toán</th>
                                                <th>Vận chuyển</th>
                                                <th>Trạng thái</th>
                                                <!--<th>Bill Address</th>-->
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($orders as $row):?>
                                            <tr>
                                                <!--<td><?= $row['id']?> <span class="label label-success">New</span> </td>-->
                                                <td><?= $row['id']?></td>
                                                <td><?= $row['fullname']?></td>
                                                <td><?php if($row['paid_status'] == 0) echo "<b><font color=red size='2pt'>Chưa thanh toán </font></b>";else echo"<b> <font color=blue size='2pt'>Đã thanh toán</font></b>";?>
                                                </td>
                                                <td><?php if($row['payments']==0) echo "Online"; else  echo "Khi nhận hàng";  ?></td>
                                                <td><?php if($row['shipping_status']==0) echo "Đang trong kho"; else if($row['shipping_status']==1) echo "Đang vận chuyển"; else if($row['shipping_status'] == 2) echo "Đã nhận"; else echo "Hủy" ?></td>
                                                <td><?php if($row['status']==0) echo "<b><font color=red size='2pt'>Đã Hủy </font></b>";else echo"<b> <font color=blue size='2pt'>Hoạt Động</font></b>";?></td>
                                                <!--<td><?= $row['bill_address']?></td>-->
                                                <td>
                                                     <div class="obj-action">
                                                        <div class="ac">
                            
                                                            <a href="<?php echo base_url().'/admin/invoice/detail/'.$row['id']?>" data-toggle="tooltip" data-placement="bottom"
                                                                title="Chi tiết"><i class="fas fa-info-circle"></i></a>
                                                        </div>
                                                           <div class="ac">
                                                            <a href="<?php echo base_url().'/admin/invoice/edit/'.$row['id']?>"  data-toggle="tooltip" data-placement="bottom" title="Sửa"><i class="far fa-edit"></i> </a>
                                                        </div>
                                                            <div class="ac">
                                                                <a href="<?php echo base_url().'/admin/invoice/delete/'.$row['id']?>" onclick="return confirm('Are you sure?');" data-toggle="tooltip" data-placement="bottom"
                                                                title="Hủy đơn"><i class="far fa-trash-alt"></i></a>
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