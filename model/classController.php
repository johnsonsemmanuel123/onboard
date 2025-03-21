<?php 
@include('DbController.php');
$sessioncode = $_SESSION['shopcode'];
class crudOperation extends DbConnection{
public function redirectLogin($location){
header('location:'.$location.'');}

//-------------------------INSERT QUERIES----------------------

public function insert($db,$fields){
$tbl_columns = implode(',',array_keys($fields));
$data = implode(', :',array_keys($fields));
$sql = 'INSERT INTO `'.$db.'`('.$tbl_columns.')VALUES(:'.$data.')';
$stm = $this->conn()->prepare($sql);
foreach ($fields as $key => $val) {
$stm->bindValue(':'.$key,$val);
}
$ex = $stm->execute();
if ($ex) {
$stm2 = $this->conn()->prepare("SELECT LAST_INSERT_ID()");
$stm2->execute();
$lastid = $stm2->fetchColumn();
return $lastid;
}
}


public function zap_upload2(){
$sql = "TRUNCATE TABLE `loans_payments_temporal`";
$stm = $this->conn()->query($sql);
return 'success';
}


public function zap_upload(){
$sql = "TRUNCATE TABLE `contributions_temporal`";
$stm = $this->conn()->query($sql);
return 'success';
}



public function sel_loanstaff($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = array();
$sql = "SELECT `staff_id` FROM `stafflist` WHERE `staff_id`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['staff_id'];
}
return $data;
}
}


public function select_expensescaptured_tm($code) {
$data = array();
$sql = "SELECT * FROM vw_expenses Where `shop_code` = '".$code."' AND month(curdate()) = month(cast(`db_suitzshop`.`vw_expenses`.`date_time` as date))";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}

public function select_expensescaptured_ty($code) {
$data = array();
$sql = "SELECT * FROM vw_expenses Where `shop_code` = '".$code."' AND year(curdate()) = year(cast(`db_suitzshop`.`vw_expenses`.`date_time` as date))";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function select_expensescaptured_tw($code) {
$data = array();
$sql = "SELECT * FROM vw_expenses Where `shop_code` = '".$code."' AND yearweek(`db_suitzshop`.`vw_expenses`.`date_time`,1) = yearweek(curdate(),1)";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}




public function select_sysusers() {
$data = array();
$sql = "SELECT * FROM logindetails Where `status` = 1";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function select_customerspershop($code) {
$data = array();
$sql = "SELECT * FROM tbl_customers Where `branch_code` = '".$code."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function select_expensescaptured($code) {
$data = array();
$sql = "SELECT * FROM vw_expenses Where `shop_code` = '".$code."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function select_dataparts($code) {
$data = array();
$sql = "SELECT * FROM tbl_productsetup Where `product_name` LIKE '".$code."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function select_stockupdatelist($code) {
$data = array();
$sql = "SELECT * FROM vw_stocklist Where `id`='".$code."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}




public function select_chex($code) {
$data = '';
$sql = "SELECT `batch_code` FROM vw_batch Where `id`='".$code."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['batch_code'];
}
return $data;
}
}


public function unique_brand2($id) {
$data = '';
$sql = "SELECT `product_brand` FROM tbl_productsetup Where `product_name` LIKE '".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['product_brand'];
}
return $data;
}
}



public function unique_brandcode($id) {
$data = '';
$sql = "SELECT `brand_description` FROM tbl_brand Where `id`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['brand_description'];
}
return $data;
}
}



public function unique_brand($id) {
$data = '';
$sql = "SELECT `type_description` FROM tbl_producttype Where `id`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['type_description'];
}
return $data;
}
}





public function shop_itemsz($id) {
$data = array();
$sql = "SELECT * FROM vw_branch_cartitems Where `user_code`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function sales_shopitemsz($id) {
$data = array();
$sql = "SELECT * FROM vw_branch_cartitems Where `user_code`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function sales_itemsz($id) {
$data = array();
$sql = "SELECT * FROM vw_central_cartitems Where `user_code`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function fetch_farmer($id) {
$data = '';
$sql = "SELECT CONCAT(`first_name`,' ',`other_names`,' ',`surname`) as customer_name FROM tbl_growersdata Where `id`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['customer_name'];
}
return $data;
}
}



public function cred_payments_shop() {
$data = '';
$sql = "SELECT SUM(`total_sprice`) as ncountx FROM sales_branchstores WHERE curdate() = cast(`db_suitzshop`.`sales_branchstores`.`date_time` as date) AND `complete_payment`>0";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['ncountx'];
}
return $data;
}
}



public function cred_payments_new() {
$data = '';
$sql = "SELECT SUM(`total_sprice`) as ncountx FROM sales_centralstores WHERE curdate() = cast(`db_suitzshop`.`sales_centralstores`.`date_time` as date) AND `complete_payment`>0";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['ncountx'];
}
return $data;
}
}



public function customer_shop($id) {
$data = '';
$sql = "SELECT `shop_name` as ncountx FROM tbl_shopdetails Where `shop_code`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['ncountx'];
}
return $data;
}
}


public function cred_payments3($id) {
$data = '';
$sql = "SELECT SUM(`amount_paid`) as ncountx FROM tbl_creditpayments Where `transaction_code`='".$id."' AND `shop_code`='".$sessioncode."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['ncountx'];
}
return $data;
}
}


public function farmer_thisyearsize($id) {
$data = '';
$thisyear=date('Y');
$sql = "SELECT SUM(`farm_size`) as ncountx FROM tbl_thisyearfarmers Where `farmer_id`='".$id."' AND YEAR(`date_time`)='".$thisyear."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['ncountx'];
}
return $data;
}
}




public function sales_counts($id) {
$data = '';
$sql = "SELECT COUNT(`tbl_id`) as ncountx FROM tbl_temporals Where `user_code`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['ncountx'];
}
return $data;
}
}



public function update_masterstockcentral($id,$selected_categorydataxx,$selected_brandataxx,$pquantities,$pbasic_price){
$sql = "UPDATE `tbl_centralstock` SET `product_category`='".$selected_categorydataxx."', `product_brand`='".$selected_brandataxx."', `quantity`='".$pquantities."', `basic_price`='".$pbasic_price."' WHERE `id`='".$id."'";
$stm = $this->conn()->query($sql);
return true;
}



public function update_repayments($id){
$one=1;
$sql = "UPDATE `sales_centralstores` SET `complete_payment`='".$one."' WHERE `transaction_code`='".$id."'";
$stm = $this->conn()->query($sql);
return true;
}


public function update_intransit($id,$datax){
$sql = "UPDATE `tbl_centralstock` SET `quantity`='".$datax."' WHERE `id`='".$id."'";
$stm = $this->conn()->query($sql);
return '1';
}



public function update_stockpurchase_forshop($id,$datax){
$sql = "UPDATE `tbl_shopstock` SET `quantity`='".$datax."' WHERE `id`='".$id."'";
$stm = $this->conn()->query($sql);
return '1';
}



public function update_stockpurchase($id,$datax){
$sql = "UPDATE `tbl_centralstock` SET `quantity`='".$datax."' WHERE `id`='".$id."'";
$stm = $this->conn()->query($sql);
return '1';
}


public function update_cartxshop($user,$datax){
$sqlx = "SELECT `stock_id` FROM tbl_temporals WHERE `tbl_id`='".$user."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sqlx);
$row = mysqli_fetch_assoc($results);
$stid = $row['stock_id'];
$sqlz = "SELECT `quantity` FROM tbl_shopstock WHERE `id`='".$stid."'";
$results2 = mysqli_query($xconx, $sqlz);
$row2 = mysqli_fetch_assoc($results2);
$sval = $row2['quantity'];
if ($sval>$datax) {
$datax = $datax;
}else{
$datax = $sval;
}
$sql = "UPDATE `tbl_temporals` SET `quantity`='".$datax."' WHERE `tbl_id`='".$user."'";
$stm = $this->conn()->query($sql);
return '1';
}




public function update_cartx($user,$datax){
$sqlx = "SELECT `stock_id` FROM tbl_temporals WHERE `tbl_id`='".$user."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sqlx);
$row = mysqli_fetch_assoc($results);
$stid = $row['stock_id'];
$sqlz = "SELECT `quantity` FROM tbl_centralstock WHERE `id`='".$stid."'";
$results2 = mysqli_query($xconx, $sqlz);
$row2 = mysqli_fetch_assoc($results2);
$sval = $row2['quantity'];
if ($sval>$datax) {
$datax = $datax;
}else{
$datax = $sval;
}
$sql = "UPDATE `tbl_temporals` SET `quantity`='".$datax."' WHERE `tbl_id`='".$user."'";
$stm = $this->conn()->query($sql);
return '1';
}



public function central_paymentlist($id,$id2) {
$data = array();
$sql = "SELECT * FROM tbl_creditpayments WHERE `transaction_code`= '".$id."' AND `shop_code`= '".$id2."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}

public function shop_saleslist_today() {
$data = array();
$sql = "SELECT `payment_category`, `transaction_code`, `customer_name`, `customer_phone`, SUM(`quantity`) as qty, SUM(`total_sprice`) as total_monies, `user_name`, `date_time` FROM sales_branchstores WHERE curdate() = cast(`db_suitzshop`.`sales_branchstores`.`date_time` as date) GROUP BY `transaction_code`";

$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function central_thisyearlist($id) {
$data = array();
$sql = "SELECT * FROM tbl_thisyearfarmers WHERE `farmer_id`='".$id."'";

$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function sum_count_summaries($id) {
$data = array();
$sql = "SELECT COUNT(`id`) as idcount, sum(`farm_size`) sumacres FROM tbl_thisyearfarmers WHERE `registered_by`='".$id."'";

$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}




public function myregistered_farmers($id) {
$data = array();
$sql = "SELECT * FROM tbl_growersdata WHERE `marketer_id`='".$id."' ORDER BY `first_name` ASC";

$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}

public function branch_saleslist() {
$data = array();
$sql = "SELECT * FROM vw_shopstocklist Where `quantity`>0 ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}

public function central_saleslist() {
$data = array();
$sql = "SELECT * FROM vw_stocklist Where `quantity`>0 ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}




public function select_transferxstock() {
$data = array();
$sql = "SELECT * FROM vw_shopstocklist Where `quantity`>0 AND `confirm_status`<1 ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}





public function select_cropslist() {
$data = array();
$sql = "SELECT * FROM tbl_cropsgrowned Where 1 ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function select_paid2($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = '';
$sql = "SELECT SUM(`total_sprice`) as paidamount FROM `sales_centralstores` WHERE `transaction_code`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['paidamount'];
}
return $data;
}
}




public function select_paid($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = '';
$sql = "SELECT SUM(`amount_paid`) as paidamount FROM `tbl_creditpayments` WHERE `transaction_code`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['paidamount'];
}
return $data;
}
}



public function select_crediteditemscentral() {
$data = array();
$sql = "SELECT `payment_category`, `transaction_code`, `customer_name`, `customer_phone`, SUM(`quantity`) as qty, SUM(`total_sprice`) as total_monies, `user_name`, `date_time` FROM sales_centralstores WHERE `payment_category`='Credit_Pay' AND `complete_payment`<1 GROUP BY `transaction_code`";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function select_allenteredbatch() {
$data = array();
$sql = "SELECT * FROM vw_batch Where 1 ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function select_allbranches() {
$data = array();
$sql = "SELECT * FROM tbl_shopdetails WHERE 1 ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function select_allroles() {
$data = array();
$sql = "SELECT * FROM tbl_roles WHERE 1 ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function select_newexpensestype($id) {
$data = array();
$sql = "SELECT * FROM tbl_expenses WHERE `shop_code`='".$id."' ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function select_allexpensestype() {
$data = array();
$sql = "SELECT * FROM tbl_expenses WHERE 1 ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function select_allshops() {
$data = array();
$sql = "SELECT * FROM tbl_shopdetails WHERE 1 ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}




public function select_allcrops() {
$data = array();
$sql = "SELECT * FROM tbl_cropsgrowned Where 1 ORDER BY `crop_name` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}

public function select_alldistricts() {
$data = array();
$sql = "SELECT * FROM tbl_districts Where 1 ORDER BY `district_name` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function select_allregion() {
$data = array();
$sql = "SELECT * FROM tbl_regions Where 1 ORDER BY `id` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}






public function select_allcus() {
$data = array();
$code = $_SESSION['shopcode'];
if ($_SESSION['role_id']==3 || $_SESSION['role_id']==4) {
$sql = "SELECT CONCAT(`firstname`,' ',`othernames`) AS mname,`phone_number` FROM tbl_customers Where `branch_code`='".$code."' ORDER BY `id` ASC";
}else{
$sql = "SELECT CONCAT(`firstname`,' ',`othernames`) AS mname,`phone_number` FROM tbl_customers Where 1 ORDER BY `id` ASC";
}
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function select_allproductbatch() {
$data = array();
$sql = "SELECT * FROM tbl_batchsource Where 1 ORDER BY `batch_description` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}




public function expensesum($id) {
$today=date("Y-m-d");
$data = array('total_today'=>0, 'total_thisweek'=>0, 'total_thismonth'=>0, 'total_thisyear'=>0);
$sql = "SELECT SUM(`amount`) AS total_td FROM `tbl_expensescaptured` WHERE `shop_code` = '".$id."' AND curdate() = cast(`db_suitzshop`.`tbl_expensescaptured`.`date_time` as date)";
$sql2 = "SELECT SUM(`amount`) AS total_tw FROM `tbl_expensescaptured` WHERE `shop_code` = '".$id."' AND yearweek(`db_suitzshop`.`tbl_expensescaptured`.`date_time`,1) = yearweek(curdate(),1)";
$sql3 = "SELECT SUM(`amount`) AS total_tm FROM `tbl_expensescaptured` WHERE `shop_code` = '".$id."' AND month(curdate()) = month(cast(`db_suitzshop`.`tbl_expensescaptured`.`date_time` as date))";
$sql4 = "SELECT SUM(`amount`) AS total_ty FROM `tbl_expensescaptured` WHERE `shop_code` = '".$id."' AND year(curdate()) = year(cast(`db_suitzshop`.`tbl_expensescaptured`.`date_time` as date))";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$results2 = mysqli_query($xconx, $sql2);
$results3 = mysqli_query($xconx, $sql3);
$results4 = mysqli_query($xconx, $sql4);
$row = mysqli_fetch_assoc($results);
$row2 = mysqli_fetch_assoc($results2);
$row3 = mysqli_fetch_assoc($results3);
$row4 = mysqli_fetch_assoc($results4);
$data = array('total_today'=>$row['total_td'], 'total_thisweek'=>$row2['total_tw'], 'total_thismonth'=>$row3['total_tm'], 'total_thisyear'=>$row4['total_ty']);
return $data;
}





public function branch_transfer($mid) {
$data = array('total_qtyintransfer'=>0, 'total_amountintransfer'=>0, 'total_datetransfer'=>0);
$sql = "SELECT SUM(`quantity`) AS total_qtyx,SUM(`selling_price`*`quantity`) AS total_monx, DATE(`date_added`) AS mdate FROM `tbl_shopstock` WHERE `shop_code`='".$mid."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$row = mysqli_fetch_assoc($results);
$data = array('total_qtyintransfer'=>$row['total_qtyx'], 'total_amountintransfer'=>$row['total_monx'], 'total_datetransfer'=>$row['mdate']);
return $data;
}







public function central_dashboard() {
$today=date("Y-m-d");
$data = array('total_instocx'=>0, 'total_monies'=>0, 'total_categories'=>0, 'total_lastdebitted'=>0,'total_brandx'=>0,'total_intransit'=>0);
$sql = "SELECT SUM(`quantity`) AS total_qtyx,SUM(`total_amountinstock`) AS total_monx FROM `vw_stocklist` WHERE 1";
$sql2 = "SELECT COUNT(`id`) AS total_catx FROM tbl_producttype";
$sql3 = "SELECT COUNT(`id`) AS total_brandx FROM tbl_brand";
$sql4 = "SELECT SUM(`quantity`) AS total_transitx FROM tbl_shopstock WHERE `confirm_status`=0";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$results2 = mysqli_query($xconx, $sql2);
$results3 = mysqli_query($xconx, $sql3);
$results4 = mysqli_query($xconx, $sql4);
$row = mysqli_fetch_assoc($results);
$row2 = mysqli_fetch_assoc($results2);
$row3 = mysqli_fetch_assoc($results3);
$row4 = mysqli_fetch_assoc($results4);
$data = array('total_instocx'=>$row['total_qtyx'], 'total_monies'=>$row['total_monx'], 'total_categories'=>$row2['total_catx'], 'total_brandx'=>$row3['total_brandx'], 'total_intransit'=>$row4['total_transitx']);
return $data;
}





public function select_allproducttype() {
$data = array();
$sql = "SELECT * FROM tbl_producttype Where 1 ORDER BY `type_description` ASC";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


function chex_negative($array) {
foreach ($array as $num) {
if ($num < 0) {
return true; // Found a negative number
}
}
return false; // No negative numbers found
}



public function fnc_performsales3($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = array();
$sql = "SELECT * FROM `tbl_shopstock` WHERE `id`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function fnc_performsales2($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = array();
$sql = "SELECT * FROM `tbl_centralstock` WHERE `id`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function fnc_zappedcart($id){
$sql = "DELETE FROM `tbl_temporals` WHERE `user_code`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_affected_rows ($xconx);
if ($count>0) {
return true;
}
}


public function fnc_performsales($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = array();
$sql = "SELECT * FROM `tbl_temporals` WHERE `user_code`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}




public function sel_staffchex($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = array();
$sql = "SELECT `staff_id` FROM `hr_contacts` WHERE `staff_id`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}




public function function_makepayments_manual($date,$staffid,$credit,$debit,$month,$description,$year,$period){
$sql = "UPDATE `contributions` SET `TransactionDate`='".$date."',`staffID`='".$staffid."',`description`='".$credit."',`Debit`='".$debit."',`Credit`='".$month."',`Month`='".$description."',`Year`='".$year."',`Period`='".$period."' WHERE `staff_id`='".$user."'";
$stm = $this->conn()->query($sql);
return 'success';
}



public function deletes_itemz($id,$db){
$sql = "DELETE FROM `".$db."` WHERE `id`='".$id."'";
$stm = $this->conn()->query($sql);
return true;
}



public function update_userx($hiddencode,$firstname,$othernames,$phone,$role,$branch){ 
$sql = "UPDATE `tbl_users` SET `first_name`='".$firstname."', `last_name`='".$othernames."', `user_role`='".$role."', `phone_number`='".$phone."', `shop_code`='".$branch."' WHERE `id`='".$hiddencode."'";
$stm = $this->conn()->query($sql);
return true;
}


public function update_customer($hiddencode,$firstname,$othernames,$phone_number,$country,$address){ 
$sql = "UPDATE `tbl_customers` SET `firstname`='".$firstname."', `othernames`='".$othernames."', `phone_number`='".$phone_number."', `country`='".$country."', `address`='".$address."' WHERE `id`='".$hiddencode."'";
$stm = $this->conn()->query($sql);
return true;
}

public function update_expenses($hiddencode,$expensestype_updates,$expenses_amount_updates,$expense_comments_updates){
$sql = "UPDATE `tbl_expensescaptured` SET `expenses_id`='".$expensestype_updates."', `amount`='".$expenses_amount_updates."', `comments`='".$expense_comments_updates."' WHERE `id`='".$hiddencode."'";
$stm = $this->conn()->query($sql);
return true;
}



public function deletes_fromcart($id){
$sql = "DELETE FROM `tbl_temporals` WHERE `tbl_id`='".$id."'";
$stm = $this->conn()->query($sql);
return 'Success';
}


public function update_password_aduanefie($password,$user){
$sql = "UPDATE `tbl_users` SET `password`='".$password."' WHERE `email`='".$user."'";
$stm = $this->conn()->query($sql);
return 'success';
}


public function update_password($role,$user){
$sql = "UPDATE `tbl_users` SET `password`='".$role."' WHERE `phone_number`='".$user."'";
$stm = $this->conn()->query($sql);
return 'success';
}



public function update_loanapprovals($id,$comm){
$one=1;
$sql = "UPDATE `loan_application` SET `approval`='".$one."', `approval_comments`='".$comm."' WHERE `id`='".$id."'";
$stm = $this->conn()->query($sql);
return 'success';
}


public function update_role($role,$user){
$sql = "UPDATE `tbl_users` SET `role_id`='".$role."' WHERE `staff_id`='".$user."'";
$stm = $this->conn()->query($sql);
return 'success';
}


public function selectztype($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = '';
$sql = "SELECT `description` FROM `tbl_paymenttype` WHERE `id`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['description'];
}
return $data;
}
}



public function fnc_select4shopstock($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = array();
$sql = "SELECT * FROM `tbl_centralstock` WHERE `id`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}




public function fnc_entrychex($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = '';
$sql = "SELECT `tbl_id` FROM `tbl_temporals` WHERE `stock_id`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['tbl_id'];
}
return $data;
}
}



public function fnc_tax(){
$xconx = $this->conx();
$data = '';
$sql = "SELECT `amount` FROM `tbl_tax` WHERE `id`=1";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['amount'];
}
return $data;
}
}


public function shopselect_sum($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = '';
$sql = "SELECT SUM(`subtotal`) as addedsum FROM `vw_branch_cartitems` WHERE `user_code`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['addedsum'];
}
return $data;
}
}




public function select_sum($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = '';
$sql = "SELECT SUM(`subtotal`) as addedsum FROM `vw_central_cartitems` WHERE `user_code`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['addedsum'];
}
return $data;
}
}





public function sel_boughtgoods2x($id) {
$data = array();
$sql = "SELECT `product_name`,`quantity`,`sprice` FROM sales_branchstores Where `transaction_code`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}





public function sel_boughtgoods($id) {
$data = array();
$sql = "SELECT `product_name`,`quantity`,`sprice` FROM sales_centralstores Where `transaction_code`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}

public function func_reprintsdata($id) {
$data=array();
$sql = "SELECT * FROM tbl_reprints WHERE `session_code`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function func_shopinfo() {
$data=array();
$sql = "SELECT * FROM tbl_shopdetails";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function select_batched(){
$data = "B".rand(1,1000).date('m');
return $data;
}



public function shop_transcode($id){
$ranxode = rand(1,99);
$data = "BS".$ranxode.substr(str_shuffle(str_repeat('012345',$id-2)),0,$id-2);
return $data;
}


public function select_transcode($id){
$ranxode = rand(1,99);
$data = "CS".$ranxode.substr(str_shuffle(str_repeat('012345',$id-2)),0,$id-2);
return $data;
}



public function select_masterotp_aduanefie($id){
$data = "C".substr(str_shuffle(str_repeat('0123456789',$id-2)),0,$id-2);
return $data;
}



public function select_masterotp($id){
$data = "C".substr(str_shuffle(str_repeat('0123456789',$id-2)),0,$id-2);
return $data;
}


public function select_chex_aduanefiephone($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = '';
$sql = "SELECT `phone_number` FROM `logindetails` WHERE `email`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['phone_number'];
}
return $data;
}
}



public function select_chex_phone($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = '';
$sql = "SELECT `phone_number` FROM `logindetails` WHERE `phone_number`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['phone_number'];
}
return $data;
}
}



public function select_chexsignupaduanefie($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = array();
$sql = "SELECT * FROM `logindetails` WHERE `email`='".$id."'";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}

public function select_chexaduanefie($id){
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$data = array();
$sql = "SELECT * FROM `logindetails` WHERE `email`='".$id."' AND `status`>0";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function sel_loanpending_approvals_final($id){
$data = array();
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$sql = "SELECT * FROM `loan_application` WHERE `id`='".$id."' AND `approval`<1 AND `active_loan`<1";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function select_countsaduanefie($id){
$data = '';
$xconx = $this->conx();
$id = mysqli_real_escape_string($xconx, $id);
$sql = "SELECT COUNT(*) as zcountx FROM `login_attempts` WHERE `email`='".$id."' AND `timestamp` > (now() - interval 5 minute)";
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['zcountx'];
}
return $data;
}
}


public function sel_curbalance($id){
$data = '';
$sql = "SELECT `cur_balance` FROM `vw_contbalance` WHERE `StaffID`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['cur_balance'];
}
return $data;
}
}



public function staff_confirmationforuploadloan($id){
$data = '';
$sql = "SELECT CONCAT(`firstname`,' ',`othername`,' ',`surname`) AS mname FROM `stafflist` WHERE `staff_id`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['mname'];
}
return $data;
}
}



public function staff_confirmationforupload($id){
$data = '';
$sql = "SELECT CONCAT(`firstname`,' ',`othername`,' ',`surname`) AS mname FROM `logindetails` WHERE `staff_id`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['mname'];
}
return $data;
}
}



public function cur_loanupload(){
$data = '';
$sql = "SELECT `period` FROM `cur_loanupload` WHERE 1 GROUP BY id DESC LIMIT 1";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['period'];
}
return $data;
}
}

public function sel_curupload(){
$data = '';
$sql = "SELECT `period` FROM `cur_upload` WHERE 1 GROUP BY id DESC LIMIT 1";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['period'];
}
return $data;
}
}



public function sel_number($id){
$data = '';
$sql = "SELECT `whatsapp` FROM `hr_contacts` WHERE `staff_id`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['whatsapp'];
}
return $data;
}
}



public function sel_bardata($id){
$today=date("Y-m-d");
$data = array('total_contributions'=>0, 'total_debitted'=>0);
$sql = "SELECT SUM(`tot_contribution`) AS total_alltime,SUM(`tot_debit`) AS total_debitted  FROM vw_barchartsummary_per_year WHERE `Period`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$row = mysqli_fetch_assoc($results);
$data = array('total_contributions'=>$row['total_alltime'], 'total_debitted'=>$row['total_debitted']);
return $data;
}






public function sel_divisionstats(){
$data = array();
$sql = "SELECT `division_id`, COUNT(`id`) AS xcounts FROM `logindetails` WHERE 1 GROUP BY`division_id`";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



 // Warning: Trying to access array offset on value of type null in C:\xampp\htdocs\fccruise\backend\model\classController.php on line 344




public function sms_header(){
$today=date("Y-m-d");
$data = array('total_contributors'=>0, 'total_nonupdated'=>0, 'lastsmsdate'=>'');
$sql = "SELECT COUNT(`id`) AS total_all FROM logindetails WHERE 1";
$sql2 = "SELECT COUNT(t1.`id`) AS noupdatex FROM logindetails t1 LEFT JOIN hr_contacts t2 ON t1.`staff_id` = t2.`staff_id` WHERE t2.`staff_id` IS NULL";
$sql3 = "SELECT DATE(`date_time`) as tdate FROM `sms_dates` WHERE 1 GROUP BY id DESC LIMIT 1";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$results2 = mysqli_query($xconx, $sql2);
$results3 = mysqli_query($xconx, $sql3);
$row = mysqli_fetch_assoc($results);
$row2 = mysqli_fetch_assoc($results2);
$row3 = mysqli_fetch_assoc($results3);
$data = array('total_contributors'=>$row['total_all'] ?? 0, 'total_nonupdated'=>$row2['noupdatex'] ?? 0, 'lastsmsdate'=>$row3['tdate'] ?? '---');
return $data;
}











public function sel_dashsummaries_admin($id){
$today=date("Y-m-d");
$data = array('total_contributions'=>0, 'total_debitted'=>0, 'total_lastcontribtuions'=>0, 'total_lastdebitted'=>0,'total_loans'=>0, 'total_repayments'=>0, 'total_loansthismonth'=>0, 'total_repaymentsthismonth'=>0);
$sql = "SELECT SUM(`tot_contribution`) AS total_alltime,SUM(`tot_debit`) AS total_debitted,SUM(`cur_balance`) AS total_positive  FROM vw_contbalance WHERE 1";
$sql2 = "SELECT SUM(`Credit`) AS total_thismonth,SUM(`Debit`) AS total_debthismonth FROM contributions WHERE `Period`='".$id."'";



$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$results2 = mysqli_query($xconx, $sql2);
$row = mysqli_fetch_assoc($results);
$row2 = mysqli_fetch_assoc($results2);
$data = array('total_contributions'=>$row['total_alltime'], 'total_debitted'=>$row['total_debitted'], 'total_lastcontribtuions'=>$row2['total_thismonth'], 'total_lastdebitted'=>$row2['total_debthismonth'], 'total_loans'=>0, 'total_repayments'=>0, 'total_loansthismonth'=>0, 'total_repaymentsthismonth'=>0);
return $data;
}

public function sel_loansummaries($id){
$today=date("Y-m-d");
$data = array('active_loan'=>0, 'loan_balance'=>0);
$sql = "SELECT `approved_amount` FROM loan_application WHERE `StaffID`='".$id."' AND `approval`=1";
$sql2 = "SELECT SUM(`approved_amount`) as total_approvals FROM loan_application WHERE `StaffID`='".$id."' AND `approval`>0";
$sql3 = "SELECT SUM(`Credit`) as total_payments FROM loans_payments WHERE `StaffID`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$results2 = mysqli_query($xconx, $sql2);
$results3 = mysqli_query($xconx, $sql3);
$row = mysqli_fetch_assoc($results);
$row2 = mysqli_fetch_assoc($results2);
$row3 = mysqli_fetch_assoc($results3);
$data = array('active_loan'=>$row['approved_amount'], 'loan_balance'=>($row2['total_approvals']-$row3['total_payments']));
return $data;
}



public function sel_allloantotals($id){
$data = array('loan_total'=>0);
$sql = "SELECT SUM(`approved_amount`) as stotal FROM loan_application WHERE `StaffID`='".$id."' AND `approval`=1";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$row = mysqli_fetch_assoc($results);
$data = array('loan_total'=>$row['stotal']);
return $data;
}





public function sel_loanmasterdashboard($id){
$today=date("Y-m-d");
$thismonth = date('m');
$data = array('master_loans'=>0, 'thismonth_loans'=>0, 'loan_payments'=>0, 'loanpay_thismonth'=>0);
$sql = "SELECT SUM(`approved_amount`) as total_loans FROM loan_application WHERE `approval`=1";
$sql3 = "SELECT SUM(`approved_amount`) as total_loans2 FROM loan_application WHERE MONTH(`application_date`)='".$thismonth."' AND `approval`=1";
$sql2 = "SELECT SUM(`Credit`) as total_payments FROM loans_payments WHERE 1";
$sql4 = "SELECT SUM(`Credit`) as total_payments2 FROM loans_payments WHERE `Period`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$results2 = mysqli_query($xconx, $sql2);
$results3 = mysqli_query($xconx, $sql3);
$results4 = mysqli_query($xconx, $sql4);
$row = mysqli_fetch_assoc($results);
$row2 = mysqli_fetch_assoc($results2);
$row3 = mysqli_fetch_assoc($results3);
$row4 = mysqli_fetch_assoc($results4);
$data = array('master_loans'=>$row['total_loans'], 'thismonth_loans'=>$row3['total_loans2'], 'loan_payments'=>$row2['total_payments'], 'loanpay_thismonth'=>$row4['total_payments2']);
return $data;
}







public function sel_dashsummaries($id){
$today=date("Y-m-d");
$data = array('total_contributions'=>0, 'total_allx'=>0, 'total_debited'=>0, 'total_loans'=>0,'total_thismonth'=>0);
$sql = "SELECT `cur_balance`,`tot_contribution`,`tot_debit` FROM vw_contbalance WHERE `StaffID`='".$id."'";
// $sql2 = "SELECT sum(`voucher_amount`) as sum_amount FROM `tbl_voucher` WHERE `payment_group`=3 AND date(`date_of_issue`)='".$today."'";
$sql3 = "SELECT `Credit` FROM `contributions` WHERE `StaffID`='".$id."' AND `description` LIKE '%Contribu%' AND `Debit`<1 GROUP BY deductionID DESC LIMIT 1";

$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
// $results2 = mysqli_query($xconx, $sql2);
$results3 = mysqli_query($xconx, $sql3);
$row = mysqli_fetch_assoc($results);
// $row2 = mysqli_fetch_assoc($results2);
$row3 = mysqli_fetch_assoc($results3);
$data = array('total_contributions'=>$row['cur_balance'], 'total_allx'=>$row['tot_contribution'], 'total_debited'=>$row['tot_debit'], 'total_loans'=>0, 'total_thismonth'=>$row3['Credit']);
return $data;
}




public function sel_loanname($id){
$data = '';
$sql = "SELECT CONCAT(`firstname`,' ',`othername`,' ',`surname`) as name FROM `stafflist` WHERE `staff_id`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data = $r['name'];
}
return $data;
}
}


public function printed_data($id){
$data = array();
$sql = "SELECT * FROM `stafflist` WHERE `staff_id`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function sel_loanpending_approvals(){
$data = array();
$sql = "SELECT * FROM `loan_application` WHERE `approval`<1";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function sel_alltempdata2(){
$data = array();
$sql = "SELECT * FROM `vw_confirm_loanuploads`";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function sel_alltempdata(){
$data = array();
$sql = "SELECT * FROM `vw_confirm_upload`";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}


public function sel_smsdata(){
$data = array();
$sql = "SELECT * FROM `logindetails`";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function sel_allcurbals(){
$data = array();
$sql = "SELECT * FROM `sms_master`";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
}
return $data;
}
}



public function sel_allmembers_main(){
$sql = 'SELECT * FROM `logindetails`';
$data = array();
$stm = $this->conn()->prepare($sql);
$ex = $stm->execute();
$count = $stm->rowCount();
if ($count > 0) {
while ($r = $stm->fetchAll(PDO::FETCH_ASSOC)) {
$data = $r;
return $data;
}
}
}

//-------------------------SELECT QUERIES 1 --------------------
public function SearchSelectCondition($db,$sel,$val){
$data = array();
$sql = "SELECT * FROM ".$db." WHERE `".$sel."` LIKE '%".$val."%'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}

}



//-------------------------SELECT QUERIES 1 --------------------
public function SelectAll($db){
$data = array();
$sql = 'SELECT * FROM '.$db.' WHERE 1';
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}

}





//-------------------------SELECT QUERIES 1 --------------------
public function curMonth(){
$data = array();
$sql = "SELECT `Month`,`Year` FROM `contributions` WHERE 1 order by `deductionID` DESC LIMIT 1";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}
}

//-------------------------SELECT QUERIES 1 --------------------
public function selectCondition($db,$sel,$val){
$data = array();
$sql = "SELECT * FROM ".$db." WHERE `".$sel."` = '".$val."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}
}


//-------------------------SELECT QUERIES 1 --------------------
public function allsms(){
$data = array();
$sql = "SELECT * FROM `staff_contact`";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}
}


//-------------------------SELECT QUERIES 1 --------------------
public function allsms2($m,$y,$id){
$desc = 'Interest';
$data = array();
$sql = "SELECT `Credit` FROM `contributions` WHERE `Month` = '".$m."' AND `Year`='".$y."' AND `description` LIKE '%".$desc."%' AND `StaffID`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}
}


//-------------------------SELECT QUERIES 1 --------------------
public function allsms3($m,$y,$id){
$desc = 'Dues';
$data = array();
$sql = "SELECT `Credit` FROM `contributions` WHERE `Month`='".$m."' AND `Year`='".$y."' AND `description` LIKE '%".$desc."%' AND `StaffID`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}
}


//-------------------------SELECT QUERIES 1 --------------------
public function allsms4($id){
$data = array();
$sql = "SELECT SUM(`Credit`) as alt FROM `contributions` WHERE `StaffID`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}
}


public function sel4sms(){
$data = array();
$sql = "SELECT * FROM `staff_contact`";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}
}



public function sel4sms2($id){
$data = array();
$sql = "SELECT `total` FROM `temporal_sms` WHERE `staff_id`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}
}




public function sel4sms3($id,$month,$year){
$data = array();
$sql = "SELECT `description`,`Credit` FROM `contributions` WHERE `StaffID`='".$id."' AND `Month`='".$month."' AND `Year`='".$year."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}
}


public function smsnames($id){
$data = array();
$sql = "SELECT CONCAT(`firstname`,' ',`othername`,' ',`surname`) as `name` FROM `stafflist` WHERE `staff_id`='".$id."'";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_num_rows ($results);
if ($count > 0) {
while ($r = mysqli_fetch_assoc($results)) {
$data[] = $r;
// return $data;
}
return $data;
}
}

//-------------------------UPDATE QUERIES 3 --------------------
public function update($db,$colm,$con){
$sql = 'UPDATE `'.$db.'` SET '.$colm.' WHERE '.$con.'';

$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_affected_rows ($xconx);
if ($count>0) {
return 'success';
}
}


//-------------------------UPDATE QUERIES 3 --------------------
public function trancate_table(){
$sql = "TRUNCATE TABLE `temporal_sms`";
$xconx = $this->conx();
$results = mysqli_query($xconx, $sql);
$count = mysqli_affected_rows ($xconx);
if ($count>0) {
return 'success';
}
}




}

 ?>