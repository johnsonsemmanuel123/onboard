<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Batch List</h4>
<h6>Manage your batches</h6>
</div>
<div class="page-btn">
<a href="index.php?page=productbatch" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-1">Add Batch</a>
</div>
</div>
<?php $rowbatchlist = $context->select_allenteredbatch(); ?>
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
<div class="wordset">
<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="../assets/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="../assets/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="../assets/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>

<div class="card" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-12">
<div class="form-group">
<input type="text" class="form-control" value="List of all batches as at today <?php echo date('d-M-Y'); ?>" readonly style="border-radius: 0px; border: 1px solid #ff9f43;">
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table  datanew">
<thead>
<tr>
<th>
<label class="checkboxs">
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th>
<th>Date</th>
<th>Batch Code</th>
<th>Batch Source</th>
<th class="text-center">Action</th>
<th class="text-center">Stock Action</th>
</tr>
</thead>
<tbody>
	
<?php 
if (!empty($rowbatchlist)) {
foreach ($rowbatchlist as $data) { $id = $data['id']; ?>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td><?php echo $data['date_added'] ?></td>
<td><?php echo $data['batch_code'] ?></td>
<td><?php echo $data['source_description'] ?></td>
<td>
<center>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
<a class="confirm-text" href="index.php?page=addproduct&idcode=<?php echo $id ?>">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
</center>
</td>
<td>
<center>
<a href="index.php?page=addproduct&idcode=<?php echo $id ?>" class="btn btn-added">
<img src="../assets/img/icons/plus.svg" alt="img" class="me-1">
</a>
</center>
</td>
</tr>
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