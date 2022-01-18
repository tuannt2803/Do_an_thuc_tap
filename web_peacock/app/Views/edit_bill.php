<?= $this->extend('_Layout') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông Tin Đơn Hàng</h5>
                <form action="<?= base_url() ?>/bill/edit" method='post'>

                <div class="form-group">
                        <label class="col-md-12" for="example-text3">Người Nhận</span>
                        </label>
                        <div class="col-md-12">
                             <input type="hidden" id="id" name="id_hidden" value="<?= $id?>">
                            <input type="text" id="example-text3" name="client_name" class="form-control" placeholder="" value="<?= $info['fullname']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-text3">Số điện thoại</span>
                        </label>
                        <div class="col-md-12">
                            <input type="number" id="example-text3" name="phone" class="form-control" placeholder="" value="<?= $info['phone']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="example-text3">Địa chỉ</span>
                        </label>
                        <div class="col-md-12">
                            <input type="text" id="example-text3" name="address" class="form-control" placeholder="" value="<?= $info['bill_address']?>">
                        </div>
                    </div>

                    <div class="form-group">
                       <label class="col-sm-12">Hình thức thanh toán</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="status">
                                <option value="0" <?php if ($info['payments']==0): echo "selected"; endif;?>>Online</option>
                                <option value="1"<?php if ( $info['payments']==1): echo "selected"; endif;?>>Khi nhận Hàng</option>
                            </select>
                        </div> 
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Sản phẩm</label>
                        <div class="card">
                            <div class="card-body">
                            <?php $run = 99;?>
                                <div id="education_fields">
                                <?php if (count($product_order)>0):
                                    // foreach($product_order as $test): $run-=1;
                                    for($i=1; $i<count($product_order); $i++): $run-=1;
                                ?>
                                    <div class='<?php echo "form-group removeclass".(string) $run;?>'>
                                    <div class="row">
                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                            <select name="name[]" class='form-control'>
                                                <?php foreach($product as $row):?>
                                                    <option value="<?= $row['product_id'] ?>" <?php if($row['product_id'] == $product_order[$i]['product_id']): echo "selected"; endif;?>><?= $row['name']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 nopadding">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="Major" name="value[]" value="<?php echo $product_order[$i]['product_amount']?>" placeholder="Value">
                                                
                                            </div>
                                        </div>
                                        <div class="input-group-append" style="height: 40px;">
                                        <button class="btn btn-danger" type="button" onclick="remove_education_fields(<?= $run?>);"> <i class="fa fa-minus"></i> </button>
                                        </div>
                                    
                                    </div>
                                    </div>
                                <?php endfor; endif;?>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <!-- <input type="text" class="form-control" id="Schoolname" name="name[]" value="" placeholder="Name"> -->
                                            <select name="name[]" class='form-control'>
                                            <?php foreach($product as $row):?>
                                                <option value="<?= $row['product_id'] ?>" <?php if($row['product_id'] == $product_order[0]['product_id']): echo "selected"; endif;?>><?= $row['name']?></option>
                                            <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 nopadding">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Major" name="value[]" value="<?= $product_order[0]['product_amount']?>" placeholder="value">
                                        </div>
                                    </div>
                                    <div class="input-group-append" style="height: 40px;">
                                        <button class="btn btn-success" type="button" onclick="ADD();"><i class="fa fa-plus"></i></button>
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Ghi chú</label>
                        <div class="col-md-12">
                            <textarea class="form-control" rows="3" name='note' ><?= $info['note']?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <a href="<?php echo base_url().'/bill/index'?>" class="btn btn-danger" >Hủy</a>
                    <!-- <a href="base_url()" class="btn btn-info waves-effect waves-light m-r-10"> Hủy </a> -->

                </form>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End Page Content -->
<script type="text/javascript">
    var room = 1;

function ADD() {

    room++;
    var objTo = document.getElementById('education_fields')
    console.log('123');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = `<div class="row">
    <div class="col-sm-3 nopadding">
        <div class="form-group">
        <select name="name[]" class="form-control">
        value="1"> Túi xách nhỏ tay cầm rời </option>
        <option value="2"> Túi xách nhỏ và clutch 2in1 </option>
        <option value="3"> Balo nhiều ngăn </option>
        <option value="4"> Handy Sweetest Clutch </option>
        <option value="5"> Summer Cool Dessert </option>
        <option value="6"> Freezing Fluffy </option>
        <option value="7">  Frost Bites Crumbly </option>
        <option value="8"> Túi xách nhỏ Minnie 2 nắp có hoa văn </option>
        <option value="9"> Giày cao gót quai ngang khoá trang trí </option>
        <option value="10">Quần cullote suông màu capuchino </option>
        <option value="11">Váy midi tay bồng hàng khuy giữa basic vàng </option>
        <option value="12">T-shirt vàng in góc nhà trồng cây </option>
        <option value="13">T-shirt đen printed city with yellow taxi </option>
        <option value="14">Sơ mi gingham đen trắng cổ tàu thêu thân </option>
        <option value="15">Top gingham cổ trắng phối nơ cổ </option>
        <option value="16">Top ôm đánh chun vải xốp nâu tây </option>
        <option value="17">Váy gingham đen trắng cúp ngực cổ vuông </option>
        <option value="18">Top karo xanh nhí cổ bèo mix 6 khuy </option>
        <option value="19">Top hoa nhí cổ tàu phối ren </option>
        <option value="20">So mi cổ vic trắng can ren thêu hoa </option>
        <option value="21">Áo 2 dây camisole màu đỏ </option>
        <option value="22">Áo 2 dây camisole màu vàng </option>
        <option value="23">Quần cullotes đen dáng dài cạp cao </option>
        <option value="24">Áo 2 dây camisole màu be </option>
        <option value="25">Váy cam suông A cổ tim kèm belt </option>
        <option value="26">Váy đuôi cá lụa cam tùng xéo cut out lưng </option>
        <option value="27">Váy 2 dây lụa cổ tim màu đen </option>
        <option value="28">Top karo cổ tim tay bồng dúm </option>
        <option value="29">Váy mini hoa lụa xanh vàng khuy bọc phối. </option>
        <option value="30">T-shirt đen printed girl in garden </option>
        <option value="31">Midi dún ngực </option>
        <option value="32">Quần suông dài cạp cao ly nổi màu nâu </option>
        <option value="33">Váy mini hoa nhí đỏ vặn ngực </option>
        <option value="34">Áo phông in hình sân tenis màu đen </option>
        <option value="35">Sơ mi basic sọc thêu just have adore </option>
        <option value="36">Top trễ vai thêu hoa rơi random </option>
        <option value="37">Top trắng thô nỏi hạt thêu cầu ngực </option>
        <option value="38">Midi nhún ngực be phối khuy karo </option>
        <option value="39">Váy đuôi cá karo phối cổ đính con ong </option>
        <option value="40"> Mắt kính mắt mèo gọng đôi cách điệu </option>
        <option value="41"> Mắt kính hình bướm gọng kim loại phối nhựa </option>
        <option value="42"> Mắt kính hình bướm gọng đôi cách điệu </option>
        <option value="43"> Vớ cổ cao bộ 3 đôi kiểu trơn </option>
        <option value="44"> Vớ cổ cao bộ 3 đôi kiểu trơn </option>
        <option value="45"> Vớ cổ thấp bộ 2 đôi kiểu dù và giọt nước </option>
        <option value="46"> Vớ cổ cao bộ 2 đôi kiểu mèo và xương cá </option>
        <option value="47"> Vớ cổ thấp bộ 2 đôi kiểu ong và hoa </option>
        <option value="48"> Vớ cổ cao bộ 3 đôi kiểu trơn </option>
        <option value="49">Top trắng trang trí khuy bọc thêu </option>
        <option value="50">Quần baggie cạp cao túi miệng vuông nâu đậm </option>
        <option value="51">Quần baggie cạp cao túi miệng vuông ghi </option>
        <option value="52">Quần baggie cạp cao túi miệng rộng đen </option>
        <option value="53">Quần baggie cạp cao túi miệng vuông camel cháy </option>
        <option value="54">Quần Cullotes suông basic màu Begie </option>
        <option value="55">Áo knit top phối tay bồng màu capuchino </option>
        <option value="56">Quần cullote suông màu camel </option>
        <option value="57">Váy midi ghi tùng khuy random </option>
        <option value="58">Top be dúm ngực tay dài </option>
        <option value="59">Váy mini thêu bó hoa ngực tay cánh tiên </option>
        <option value="60">Top xanh lóng chéo basic </option>
        <option value="61">Top hồng lóng chéo basic </option>
        <option value="62">Váy mini hồng nâu xếp ly thân trên </option>
        <option value="63">Váy midi be tay chuông hàng khuy bọc </option>
        <option value="64">Váy mini sọc ghi thêu cổ </option>
        <option value="65">Áo sơmi in đính kim sa </option>
        <option value="66">Váy mini hồng thêu tunic cổ buộc dây </option>
        <option value="67">Váy midi tay bồng hàng khuy giữa basic xanh mint </option>
        <option value="68">Váy midi tay bồng hàng khuy giữa basic hồng </option>
        <option value="69">Top pep karo rêu cổ vuông </option>
        <option value="70">Sơ mi trắng thêu họa tiết </option>
        <option value="71">Jumsuit tay cộc quần lửng rút dúm ngực màu rêu </option>
        <option value="72">Váy cotton cam đất tùng 2 tầng </option>
        <option value="73">Váy cotton đen tùng 2 tầng </option>
        <option value="74">Váy tay lỡ buộc dây thêu thân trước </option>
        <option value="75">Váy mini cổ tim hoa nhí vàng </option>
        <option value="76">Váy mini hoa thô vặn ngực </option>
        <option value="77">Váy midi bên sườn cutout lưng màu đen </option>
        <option value="78">Váy midi bên sườn cutout lưng màu nâu tây </option>
        <option value="79">Quần cullote suông màu capuchino </option>
        <option value="80">Váy midi tay bồng hàng khuy giữa basic vàng </option>
        <option value="81">T-shirt vàng in góc nhà trồng cây </option>
        <option value="82">T-shirt đen printed freedom girl </option>
        <option value="83">T-shirt đen printed city with yellow taxi </option>
        <option value="84">Váy mini hoa vàng nhí dúm chân ngực </option>
        <option value="85">Sơ mi basic karo đỏ cổ đức </option>
        <option value="86">Top karo nhí cổ trắng phối dây trang trí </option>
        <option value="87">Váy mini cam phối cổ ghi dáng peptile </option>
        <option value="88">Váy midi xanh lơ hoa cutout lườn </option>
        <option value="89">Váy gingham đen trắng cúp ngực cổ vuông </option>
        <option value="90">Top be thêu hoa phối ren và bèo </option>
        <option value="91">Top karo xanh nhí cổ bèo mix 6 khuy </option>
        <option value="92">Top karo nâu sen tim phối bèo </option>
        <option value="93">Váy mini xanh hoa nhí dúm ngực </option>
        <option value="94">Váy hoa nhí cổ vuông hàng khuy giữa basic </option>
        <option value="95">T-shirt đen printed 2 freedom friends </option>
        <option value="96">So mi cổ vic trắng can ren thêu hoa </option>
        <option value="97">Áo 2 dây camisole màu vàng </option>
        <option value="98">Quần cullotes đen dáng dài cạp cao  </option>
        <option value="99">Áo 2 dây camisole màu be </option>
        <option value="100">Quần baggy cạp cao gấu lơ vê màu nâu bò  </option>
        <option value="101">Váy cam suông A cổ tim kèm belt </option>
        <option value="102">Váy 2 dây lụa cổ tim màu cam đất </option>
        <option value="103">Váy đuôi cá lụa cam tùng xéo cut out lưng </option>
        <option value="104">Váy mini A karo xanh nhí cổ sen mix 6 khuy </option>
        <option value="105">Váy 2 dây lụa cổ tim màu đen </option>
        <option value="106">Sơ mi lụa cổ nơ hàng khuy bọc </option>
        <option value="107">Top karo cổ tim tay bồng dúm </option>
        <option value="108">Top xốp trắng vai xếp bồng </option>
        <option value="109">Top xốp trắng vai xếp bồng xòe</option>
        <option value="110">Chân váy xếp ly</option>
        <option value="111">Chân váy tenist</option>
    </select>
    </select>
        </div>
    </div>
    <div class="col-sm-3 nopadding">
        <div class="form-group">
            <input type="text" class="form-control" id="Major" name="value[]" value="" placeholder="Số lượng">
        </div>
    </div>
    <div class="input-group-append" style="height: 40px;">
    <button class="btn btn-danger" type="button" onclick="remove_education_fields(${room});"> <i class="fa fa-minus"></i> </button>
    </div>
 
</div>`;
    objTo.appendChild(divtest)
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}
</script>
<?= $this->endSection() ?>