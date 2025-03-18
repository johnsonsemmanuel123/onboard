<?php 
$selected_todaysales = $context->select_sysusers();
if (!empty($selected_todaysales)) {
$customers_count = count($selected_todaysales);
}
?>
<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Users List</h4>
<h6>Manage System Users  </h6>
</div>
<div class="page-btn">
<a href="javascript:void(0);" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add User</a>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash1.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>
<span class="counters" data-count="<?php echo $customers_count ?? 0; ?>">
</span>
</h5>
<h6>Total Users</h6>
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
<div class="wordset">
<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf">
<img src="../assets/img/icons/pdf.svg" alt="img">
</a>
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
<input type="text" class="form-control" value="List of all System Users" readonly style="border-radius: 0px; border: 1px solid #ff9f43;">
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>User Name</th>
<th>User Phone</th>
<th>Registration Date</th>
<th>User Role</th>
<th>Branch</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php 
if (!empty($selected_todaysales)) {
foreach ($selected_todaysales as $data) { $id = $data['id'];
?>
<tr>

<td><?php echo ucwords(strtolower($data['first_name'].' '.$data['last_name'])); ?></td>
<td align="left"><?php echo $data['phone_number']; ?></td>
<td><?php echo $data['date_created']; ?></td>
<td><?php echo $data['user_role']; ?></td>
<td><?php echo $data['shop_name']; ?></td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editmodal<?php echo $id ?>"><img src="../assets/img/icons/edit-5.svg" class="me-2" alt="img">Update User</a>
</li>
<li>
<a href="#" id="deleteUsers" data-id=<?php echo $id; ?> class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2">
Delete User
</a>
</li>
</ul>
</td>
</tr>
<section>
<form method="POST" action="../controller/userController.php">
<div class="modal fade" id="editmodal<?php echo $id; ?>" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Update User Details</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<input type="hidden" name="hiddencode" value="<?php echo $id; ?>">
<label>User First Name</label>
<input type="text" name="fnameupdated" required value="<?php echo $data['first_name']; ?>">
</div>
</div>
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>User Othernames</label>
<input type="text" name="onamesupdated" value="<?php echo $data['last_name']; ?>">
</div>
</div>
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" name="phone_numberupdated" value="<?php echo $data['phone_number']; ?>" required>
</div>
</div>
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>User Role</label>
<select class="form-control" name="user_roleupdated">
<option value="<?php echo $data['user_id']; ?>">
<?php echo $data['user_role']; ?>
</option>
<?php 
$rowdata_role = $context->select_allroles(); 
foreach ($rowdata_role as $data_role) { ?>
<option value="<?php echo $data_role['id']; ?>">
<?php echo ucwords(strtolower($data_role['user_role'])); ?>
</option>
<?php } ?>
</select>
</div>
</div>
<div class="col-lg-8 col-sm-12 col-12">
<div class="form-group">
<label>Shop / Branch</label>
<select class="form-control" name="user_branchupdated">
<option value="<?php echo $data['shop_code']; ?>">
<?php echo $data['shop_name']; ?>
</option>
<?php 
$rowdata_branches = $context->select_allbranches(); 
foreach ($rowdata_branches as $data_branches) { ?>
<option value="<?php echo $data_branches['shop_code']; ?>">
<?php echo ucwords(strtolower($data_branches['shop_name'])); ?>
</option>
<?php } ?>
</select>
</div>
</div>
</div>
<div class="col-lg-12">
<button class="btn btn-submit me-2" type="submit" name="userUpdated">Submit</button>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</form>
</section>
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

<section>
<form method="POST" action="../controller/userController.php">
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Register New User</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>User First Name</label>
<input type="text" name="fname" required>
</div>
</div>
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>User Othernames</label>
<input type="text" name="onames">
</div>
</div>
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" name="phone_number" required>
</div>
</div>
<div class="col-lg-4 col-sm-12 col-12">
<div class="form-group">
<label>User Role</label>
<select class="form-control" name="user_role">
<option value="">SELECT ROLE</option>
<?php 
$rowdata_role = $context->select_allroles(); 
foreach ($rowdata_role as $data_role) { ?>
<option value="<?php echo $data_role['id']; ?>">
<?php echo ucwords(strtolower($data_role['user_role'])); ?>
</option>
<?php } ?>
</select>
</div>
</div> 

<div class="col-lg-8 col-sm-12 col-12">
<div class="form-group">
<label>Shop / Branch</label>
<select class="form-control" name="user_branch">
<option value="">SELECT BRANCH</option>
<?php 
$rowdata_branches = $context->select_allbranches(); 
foreach ($rowdata_branches as $data_branches) { ?>
<option value="<?php echo $data_branches['shop_code']; ?>">
<?php echo ucwords(strtolower($data_branches['shop_name'])); ?>
</option>
<?php } ?>
</select>
</div>
</div>
</div>
<div class="col-lg-12">
<button class="btn btn-submit me-2" type="submit" name="userSubmitted">Submit</button>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</form>
</section>