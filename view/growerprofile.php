<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>UPDATE PROFILE</h4>
                <h6>Fill Out All To Update Grower Information</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="../controller/addcentralController.php">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Other Names</label>
                                <input type="text" name="other_names">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" name="surname">
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Ghana Card Number</label>
                                <input type="text" name="ghana_card">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" name="email">
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Farm Location (Region)</label>
                                <select class="form-control" name="region">
                                    <option value="">Select Region</option>
                                    <?php 
                                    $rowdata = $context->select_allregion(); 
                                    foreach ($rowdata as $data) { ?>
                                        <option value="<?php echo $data['id']; ?>">
                                            <?php echo ucwords($data['region_name']); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Farm Location (District)</label>
                                <select class="form-control" name="district">
                                    <option value="">Select District</option>
                                    <?php 
                                    $rowdata = $context->select_alldistricts(); 
                                    foreach ($rowdata as $data) { ?>
                                        <option value="<?php echo $data['id']; ?>">
                                            <?php echo ucwords($data['district_name']); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Crops Currently Growing / Planning to Grow</label>
                                <select class="form-control" name="crops">
                                    <option value="">Select Crop</option>
                                    <option value="Maize">Maize</option>
                                    <option value="Rice">Rice</option>
                                    <option value="Millet">Millet</option>
                                    <option value="Sorghum">Sorghum</option>
                                    <option value="Wheat">Wheat</option>
                                    <option value="Wheat">Wheat</option>
                                    <option value="Oats">Oats</option>
                                    <option value="Fonio">Fonio</option>
                                    <option value="Cassava">Cassava</option>
                                    <option value="Yam">Yam</option>
                                    <option value="Sweet Potatoes">Sweet Potatoes</option>
                                    <option value="Cocoyam">Cocoyam</option>
                                    <option value="Irish Potatoes">Irish Potatoes</option>
                                    <option value="Ginger">Ginger</option>
                                    <option value="Turmeric">Turmeric</option>
                                    <option value="Beans">Beans</option>
                                    <option value="Groundnuts">Groundnuts (Peanuts)</option>
                                    <option value="Lentils">Lentils</option>
                                    <option value="Chickpeas">Chickpeas</option>
                                    <option value="Pigeon Peas">Pigeon Peas</option>
                                    <option value="Tomatoes">Tomatoes</option>
                                    <option value="Peppers">Peppers (Chili, Bell, Scotch Bonnet, etc.)</option>
                                    <option value="Onions">Onions</option>
                                    <option value="Cabbage">Cabbage</option>
                                    <option value="Lettuce">Lettuce</option>
                                    <option value="Carrots">Carrots</option>
                                    <option value="Cucumber">Cucumber</option>
                                    <option value="Okra">Okra</option>
                                    <option value="Spinach">Spinach</option>
                                    <option value="Garden Eggs">Garden Eggs (African Eggplant)</option>
                                    <option value="Broccoli">Broccoli</option>
                                    <option value="Cauliflower">Cauliflower</option>
                                    <option value="Mango">Mango</option>
                                    <option value="Pineapple">Pineapple</option>
                                    <option value="Watermelon">Watermelon</option>
                                    <option value="Banana">Banana</option>
                                    <option value="Pawpaw">Pawpaw (Papaya)</option>
                                    <option value="Oranges">Oranges</option>
                                    <option value="Apples">Apples</option>
                                    <option value="Grapes">Grapes</option>
                                    <option value="Avocado">Avocado</option>
                                    <option value="Guava">Guava</option>
                                    <option value="Coconut">Coconut</option>
                                    <option value="Passion Fruit">Passion Fruit</option>
                                    <option value="Lemon">Lemon</option>
                                    <option value="Lime">Lime</option>
                                    <option value="Palm Fruits">Palm Fruits</option>
                                    <option value="Shea Nuts">Shea Nuts</option>
                                    <option value="Sunflower Seeds">Sunflower Seeds</option>
                                    <option value="Soybean">Soybean</option>
                                    <option value="Basil">Basil</option>
                                    <option value="Cloves">Cloves</option>
                                    <option value="Thyme">Thyme</option>
                                    <option value="Rosemary">Rosemary</option>
                                    <option value="Bay Leaves">Bay Leaves</option>
                                    <option value="Mint">Mint</option>
                                    <option value="Lemongrass">Lemongrass</option>
                                    <option value="Cinnamon">Cinnamon</option>
                                    <option value="Nutmeg">Nutmeg</option>
                                    <option value="Black Pepper">Black Pepper</option>
                                    <option value="Cocoa">Cocoa</option>
                                    <option value="Coffee">Coffee</option>
                                    <option value="Cashew Nuts">Cashew Nuts</option>
                                    <option value="Cotton">Cotton</option>
                                    <option value="Tobacco">Tobacco</option>
                                    <option value="Rubber">Rubber</option>
                                    <option value="Teak">Teak</option>
                                    <option value="Mahogany">Mahogany</option>
                                    <option value="Napier Grass">Napier Grass</option>
                                    <option value="Alfalfa">Alfalfa</option>
                                    <option value="Clover">Clover</option>
                                    <option value="Sorghum Grass">Sorghum Grass</option>                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Exact Farm Location (Geolocation)</label>
                                <input type="text" id="latitude" name="latitude" placeholder="Latitude" readonly>
                                <input type="text" id="longitude" name="longitude" placeholder="Longitude" readonly>
                                <button type="button" onclick="getLocation()">Get My Location</button>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-12">
                            <div id="map" style="width: 100%; height: 300px;"></div>
                        </div>
                        
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-submit me-2" name="submitStockEntry" value="Submit">
                            <a href="index.php?page=productbatch" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        document.getElementById("latitude").value = position.coords.latitude;
        document.getElementById("longitude").value = position.coords.longitude;
        loadMap(position.coords.latitude, position.coords.longitude);
    }

    function loadMap(lat, lng) {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: lat, lng: lng},
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {lat: lat, lng: lng},
            map: map,
            title: 'Farm Location'
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBX9_GEghefAPnY5Nh1HIHwRy2uBm1yUPI&callback=initMap"></script>