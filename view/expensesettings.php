<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Expenses Setup</h4>
<h6>Setup a new expense category</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<form enctype="multipart/form-data" method="POST" action="../controller/expensesController.php">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Expense Type</label>
<input type="text" name="expense_types" placeholder="Enter Expense Type" required>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Expenses Description</label>
<input type="text" name="expense_description" placeholder="Enter Expenses Description">
</div>
</div>
<div class="col-lg-12">
<input type="submit" class="btn btn-submit me-2" id="addmasterExpenses" name="addmasterExpenses" value="Submit">
<a href="productlist.html" class="btn btn-cancel">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>