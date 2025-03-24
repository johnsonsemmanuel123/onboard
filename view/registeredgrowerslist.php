<?php
$summaries_count=0;
$summaries_size=0; 
$selected_todaysales = $context->myregistered_farmers($email);
$selected_summaries2 = $context->sum_count_summaries($email);
if (!empty($selected_todaysales)) {
$grower_counts = count($selected_todaysales);
} 

if (!empty($selected_summaries2)) {
foreach ($selected_summaries2 as $cdatax) {
$summaries_count = $cdatax['idcount'];
$summaries_size = $cdatax['sumacres'];
}
}

?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Growers List</h4>
<h6>Manage your registered growers for today</h6>
</div>
<div class="page-btn">
<a href="index.php?page=newgroweronboard" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-1">Add Grower</a>
</div>
</div>
<div class="row">
<div class="col-lg-4 col-sm-6 col-12">
<div class="dash-widget">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash1.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>
<span class="counters" data-count="<?php echo number_format($grower_counts); ?>">
</span>
</h5>
<h6>Registered Growers</h6>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="dash-widget dash1">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash2.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>
<span class="counters" data-count="<?php echo number_format($summaries_count,2); ?>">
</span>
</h5>
<h6>Total Enrolled - <?php echo date('Y'); ?></h6>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="dash-widget dash2">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash1.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent"> 
<h5>
<span class="counters" data-count="<?php echo number_format($summaries_size,2); ?>"></span>
</h5>
<h6>Total Land Size - <?php echo date('Y'); ?></h6>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="table-top">
<div class="search-set">
<div class="search-path">
<a class="btn btn-filter" id="filter_search">
<img src="../assets/img/icons/filter.svg" alt="img">
<span><img src="../assets/img/icons/closes.svg" alt="img"></span>
</a>
</div>
<div class="search-input">
<a class="btn btn-searchset"><img src="../assets/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<!--  -->
</div>
<div class="card" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-12">
<div class="form-group">
<input type="text" class="form-control" value="List of all registered growers as at today <?php echo date('d-M-Y'); ?>" readonly style="border-radius: 0px; border: 1px solid #ff9f43;">
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>Registration Date</th>
<th>Grower Image/Photo</th>
<th>Registered Grower's Name</th>
<th>Land Size - <?php echo date('Y'); ?></th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php 
if (!empty($selected_todaysales)) {
foreach ($selected_todaysales as $data) { $id = $data['id'];
$land_size = $context->farmer_thisyearsize($id)
?>
<tr>
<td><?php echo $data['date_time']; ?></td>
<td>
<center><img width="35px" class="img-control" style="border-radius: 10px; border: 2px solid green" src="../controller/images/<?php echo $data['pix'] ?>"></center>
</td>
<td><?php echo ucwords(strtolower($data['first_name'].' '.$data['other_names'].' '.$data['surname'])); ?></td>
<td align="right"><?php echo number_format($land_size); ?></td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="index.php?page=thisyeardetails&idcode=<?php echo $id; ?>" class="dropdown-item">
<img src="../assets/img/icons/dollar-square.svg" class="me-2" alt="img">
Details This Year
</a>
</li>
<li>
<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#quantitymodal<?php echo $id ?>"><img src="../assets/img/icons/plus-circle.svg" class="me-2" alt="img">Capture This Year</a>
</li>





</ul>
</td>
</tr>

<div class="modal fade" id="quantitymodal<?php echo $id ?>" tabindex="-1" aria-labelledby="quantitymodal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-md modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Enter Farmer Details For This Year</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form method="POST" action="../controller/addcentralController.php">
<input type="hidden" name="trans_code" value="<?php echo $id; ?>">
<div class="row">
<div class="col-12">
<center>
<img src="../controller/images/<?php echo $data['pix'] ?>" width="40%" class="img-control" style="border-radius: 20px; border: 2px solid green; height: 200px"> <hr>
<h2><?php echo ucwords(strtoupper($data['first_name'].' '.$data['other_names'].' '.$data['surname'])); ?></h2>
</center><hr>
</div>
<div class="col-12">
<div class="form-group"><label>Enter Location Of Farm</label>
<input type="text" name="flocation" style="font-weight: bold; color: green;">
</div>
</div>
<div class="col-12">
<div class="form-group"><label>
Crop Growing For Aduanefie Marketplace
</label>
<select class="form-control" name="crop">
<option value="">SELECT</option>
<?php 
$rowdata = $context->select_allcrops(); 
foreach ($rowdata as $data) { ?>
<option value="<?php echo $data['crop_name']; ?>">
<?php echo ucwords($data['crop_name']); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-12">
<div class="form-group"><label>Enter Land Size (Acres)</label>
<input type="number"  class="form-control" max="100" name="landsize" id="landsize" required style="font-weight: bold; color: green;text-align: right;" autofocus>
</div>
</div>
</div>
<div class="col-lg-12">
<button class="btn btn-submit me-2" type="submit" name="masterSalesSubmitted">Submit</button>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</form>
</div>
</div>
</div>
</div>
<?php 
}
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>