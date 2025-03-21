<?php 
$xcod = $_GET['idcode'];
$selected_todaysales = $context->central_thisyearlist($xcod); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Details This Year</h4>
<h6>Manage Your Registered Grower Details For This Year</h6>
</div>
<div class="page-btn">
<a href="index.php?page=registeredgrowerslist" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-1">Return</a>
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
</div>
<div class="card" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-12">
<div class="form-group">
<input type="text" class="form-control" value="Detail Of Registered Grower" readonly style="border-radius: 0px; border: 1px solid #ff9f43;">
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>
<label class="checkboxs">
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th>
<th>Date</th>
<th>Grower Name</th>
<th>Farm Location</th>
<th>Farm Size</th>
<th>Crop</th>
</tr>
</thead>
<tbody>
<?php 
if (!empty($selected_todaysales)) {
foreach ($selected_todaysales as $data) { $id = $data['farmer_id'];?>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td><?php echo $data['date_time']; ?></td>
<td><?php echo ucwords(strtolower($context->fetch_farmer($id))); ?></td>
<td><?php echo ucwords(strtolower($data['location'])); ?></td>
<td align="right"><?php echo number_format($data['farm_size'],2); ?></td>
<td><?php echo ucwords(strtolower($data['crop'])); ?></td>
</tr>
<?php 
$total += $data['farm_size'];
}
}
?>
<tfoot>
<tr>
<td colspan="2"></td>
<td style="background: #f5f5f5; border: 2px solid green; color: green; font-weight: bold;">
<b>TOTAL FARM SIZE THIS YEAR</b>
</td>
<td align="right" style="background: #f5f5f5; border: 2px solid green; color: green; font-weight: bold;">
ACRES <?php echo number_format($total,2); ?></td>
</tr>
</tfoot>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>