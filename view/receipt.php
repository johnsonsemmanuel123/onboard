<link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
<?php 
$role=$_SESSION['role_id'];
if (isset($_SESSION['bought_code'])) {
$code = $_SESSION['bought_code'];
$content = new crudOperation();
$tax=0;
if ($role==3 || $role==4) {
$results = $content->sel_boughtgoods2x($code);
}else{
$results = $content->sel_boughtgoods($code);
}
$hidden=$_SESSION['session_amount'];
$customer=$_SESSION['session_cname'];
$tel=$_SESSION['session_ctel'];
$pamount=$_SESSION['session_recieved_amount'];
$balance=$_SESSION['session_balance'];
if (isset($_SESSION['session_tax_reprints'])) {
$tax = $_SESSION['session_tax_reprints'];
}else{
$tax = $content->fnc_tax();
}
}else{
if ($role==3 || $role==4) {
echo "<script>location='index.php?page=purchases'</script>";
}else{
echo "<script>location='index.php?page=newsales'</script>";
}
}
?>
<section class="content" >
<div class="container-fluid" style="padding-top: 2px">
<div class="row">
<div class="col-12" style="font-family:'Times New Roman', Times, serif; font-size:17px;">
<center>
<table cellspacing="5">
<thead style="font-size:13px;">
<span style="font-family:'Times New Roman', Times, serif; font-size:23px;" >
<u>
<?php 
if (isset($_SESSION['session_tax_reprints'])) { ?>
<a href="index.php?page=saleslist">
<img src="../view/images/<?php echo $image; ?>" alt="logo.jpg" style="width: 100px;height: 50px">
</a>
<?php }else{ ?>
<?php 
$role=$_SESSION['role_id'];
if ($role==3 || $role==4) { ?>
<a href="index.php?page=purchases">
<img src="../view/images/<?php echo $image; ?>" alt="logo.jpg" style="width: 100px;height: 50px">
</a>
<?php }else{ ?>
<a href="index.php?page=newsales">
<img src="../view/images/<?php echo $image; ?>" alt="logo.jpg" style="width: 100px;height: 50px">
</a>
<?php } ?>
<?php } ?>
</u></span><br />
<span style="font-size: 30px; font-weight: bolder"><?php echo $name; ?></span><br/>
<b>Contact: <?php echo $phone; ?></b>
<div style="border-bottom:2px solid #000; width:100%;"></div>
</thead>
</table>
</center>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12" style="padding: 10px 20px 0px 20px">
<p><span><b>Receipt Code</b> : <?php echo  $code?></span></p>
<p><span><b>Branch</b> : <?php echo  'N/A'?></span></p>
<p><span><b>Printed By</b> : <?php echo  $_SESSION['name'];?></span></p>
<p><span><b>Date</b> : <?php echo  date('jS F\, Y');?></span></p>
<p><span><b>Customer</b> : <?php echo  ucwords(strtolower($customer)). ' - '.$tel;?></span></p>
<table id="simpletable" class="table table-striped table-bordered nowrap" style="border: 1px solid black">
<thead style="border: 1px solid black">
<tr style="border: 1px solid black;width:500px; height: 30px; text-align: left;">
<th style="border: 1px solid black;width:700px; height: 30px; text-align: left;padding-left: 10px;"><em>Item</em></th>
<th style="border: 1px solid black;width:500px; height: 30px; text-align: center;"><em>Qty</em></th>
<th style="border: 1px solid black;width:300px; height: 30px; text-align: right;padding-right: 10px;"><em>Unit Price(GH¢)</em></th>
<th style="border: 1px solid black;width:300px; height: 30px; text-align: right;padding-right: 10px;"><em>Total(GH¢)</em></th>
</tr>
</thead>
<tbody style="border: 1px solid black">
<?php 
if (!empty($results)) {
foreach ($results as $c) { ?>
<tr style="border: 1px solid black">
<td style="border: 1px solid black;width:700px;height: 30px;padding-left: 10px"><?php echo ucwords(strtolower($c['product_name'])); ?></td>
<td style="border: 1px solid black;width:500px;text-align: center;height: 30px"><?php echo $c['quantity'] ?></td>
<td style="border: 1px solid black;width:300px;text-align: right;height: 30px;padding-right: 10px"><?php echo number_format($c['sprice'],2); ?></td>
<td style="border: 1px solid black;width:300px;text-align: right;height: 30px;padding-right: 10px"><?php echo number_format(($c['quantity']*$c['sprice']),2); ?></td>
</tr>
<?php } } ?>
</tbody>
</table>
<br><div style="border-bottom:2px dashed; #000; width:100%;"></div><br>
<table id="simpletable" class="table table-striped table-bordered nowrap">
<thead style="border: 1px solid black">
<tr>
<th style="width:500px;"><em></em></th>
<th style="width:500px;text-align: right;">Sub Total</th>
<th style="width:500px; text-align: right;"><?php echo  number_format($hidden,2); ?></th>
</tr>
</thead>
<tbody style="border: 1px solid black">
<tr>
<td style="width:500px;"></td>
<td style="width:500px;text-align: right;"><b>Discount</b></td>
<td style="width:500px;text-align: right;"><b>0.00</b></td>
</tr>
<tr>
<td style="width:500px;"></td>
<td style="width:500px;text-align: right;"><b>Tax</b></td>
<td style="width:500px;text-align: right;"><b><?php echo number_format($tax,2); ?></b></td>
</tr>
<tr>
<td style="width:500px;"></td>
<td style="width:500px;text-align: right;"><b>Receipt Total</b></td>
<td style="width:500px;text-align: right;"><b><?php echo 'GH¢ '. number_format($hidden,2); ?></b></td>
</tr>
</tbody>
</table>
<br><div style="border-bottom:2px dashed; #000; width:100%;"></div><br>
<table id="simpletable" class="table table-striped table-bordered nowrap">
<thead style="border: 1px solid black">
<tr>
<th style="width:500px;"><em></em></th>
<th style="width:500px;text-align: right;">Tendered</th>
<th style="width:500px; text-align: right;"><?php echo number_format((float)$pamount,2); ?></th>
</tr>
</thead>
<tbody style="border: 1px solid black">
<tr>
<td style="width:500px;"></td>
<td style="width:500px;text-align: right;"><b>Change</b></td>
<td style="width:500px;text-align: right;"><b><?php echo number_format((float)$balance,2) ?></b></td>
</tr>
</tbody>
</table>
</div>
</div>
<center><b>______________________________________________________________________</b></center>
<div class="row" style="padding-top: 5px">
<div class="col-lg-4 offset-8 col-md-4 offset-8">
<center><p><b><i>Thank you! Please come again</i></b></p></center>
<center><p><b><i>Contact : 0248383212 For POS/Sales Software</i></b></p></center>
</div>
</div>
</div>
</section>
<script type="text/javascript">
window.print();
</script>