<?= $this->extend('_Layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/bill/css/style.css">
</head>
<style type="text/css">
    li {
    text-align: -webkit-match-parent;
    }
    ul {
    list-style-type: disc;
}
.pagination>li>span {
    position: relative;
    float: right;
    padding: 6px 12px;
    margin-left: auto;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
</style>
<body>
<div class="main_content">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive ">
        <h3> <b>Danh sách đơn hàng của bạn</b> </h3>
            <div class="row">
                 <div class="form-group col-md-4>" style="width: 100px; margin-left: 30px;">   
                    <select class  ="form-control" name="state" id="maxRows" >
                         <option value="5000">Hiển thị tất cả</option>
                         <option value="5">5</option>
                         <option value="10">10</option>
                         <option value="15">15</option>
                         <option value="20">20</option>
                         <option value="50">50</option>
                         <option value="70">70</option>
                         <option value="100">100</option>
                        </select>
                    
                </div>

                <div class="col-md-8" style="margin-left: auto;">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm..">
                </div>
            </div>
               
<table  class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id= "table-id">
    <thead>
                   <tr>
                       <th>Mã hóa đơn</th>
                       <th>Người nhận</th>
                      <!--  <th>Số điện thoại</th> -->
                       <th>Thanh toán</th>
                       <th>Kiểu thanh toán</th>
                       <th>Vận chuyển</th>
                       <th>Trạng thái</th>
                      <!--  <th>Địa Chỉ</th> -->
                       <th></th>
                  </tr>
    </thead>     
     <tbody id="myTable">
                <?php foreach($orders as $row):?>
                <tr>
                   <td><?= $row['id']?></td>
                    
                    <td><?= $row['fullname']?></td>
                   
                    <td><?php if($row['paid_status'] == 0) echo "<b><font color=red size='2pt'>Chưa thanh toán </font></b>";else echo"<b> <font color=blue size='2pt'>Đã thanh toán</font></b>";?></td>
                   
                    <td><?php if($row['payments']==0) echo "Online"; else  echo "Khi nhận hàng";  ?></td>

                    <td><?php if($row['shipping_status']==0) echo "Đang trong kho"; else if($row['shipping_status']==1) echo "Đang vận chuyển"; else if($row['shipping_status'] == 2) echo "Đã nhận"; else echo "Hủy" ?></td>

                    <td><?php if($row['status']==0) echo "<b><font color=red size='2pt'>Đã hủy </font></b>";else echo"<b> <font color=blue size='2pt'>Hoạt Động</font></b>";?></td>
                    <td>
                        <div class="obj-action">
                            <div class="ac">

                                <a href="<?php echo base_url().'/bill/detail/'.$row['id']?>" data-toggle="tooltip" data-placement="bottom"
                                    title="Chi tiết"><i class="fas fa-info-circle"></i></a>
                            </div>

                            <?php if($row['paid_status']==0 && $row['status']==1) : ?>

                               <div class="ac">

                                <a href="<?php echo base_url().'/bill/edit/'.$row['id']?>"  data-toggle="tooltip" data-placement="bottom" title="Sửa"><i class="far fa-edit"></i> </a>
                            </div>
                            <?php endif ?>
                            
                           
                            <?php if($row['paid_status']==0 && $row['status']==1) : ?>

                                <div class="ac">
                                    <a href="<?php echo base_url().'/bill/delete/'.$row['id']?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng?');" data-toggle="tooltip" data-placement="bottom"
                                    title="Hủy đơn"><i class="far fa-trash-alt"></i></a>
                                </div>
                            <?php endif ?>
                           
                        </div>
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
</table>

<!--        Start Pagination -->
            <div class='pagination-container'  >
                <nav>
                  <ul class="pagination">
            
            <li data-page="prev" >
                <span> Trước <span class="sr-only">(current)</span></span>
            </li>
                   <!-- Here the JS Function Will Add the Rows -->
            <li data-page="next" id="prev">
                    <span> Sau <span class="sr-only">(current)</span></span>
            </li>
                  </ul>
               
                </nav>
            </div>

            </div>
        </div>
    </div>
    </div>
</div>

</body>
</html>
<?= $this->endSection() ?>