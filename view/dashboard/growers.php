<div class="page-wrapper">
    <div class="content">
        <!-- Personalized Greeting -->
        <h4 class="mb-3">Hello, [Farmer's Name]! Here’s your farm overview for today.</h4>
        
        <!-- Dashboard Widgets -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="../assets/img/icons/dash1.svg" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="200">0</span></h5>
                        <h6>Total Farm Area</h6>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash1">
                    <div class="dash-widgetimg">
                        <span><img src="../assets/img/icons/dash2.svg" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="230">0</span></h5>
                        <h6>Current Crop Cycle</h6>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash2">
                    <div class="dash-widgetimg">
                        <span><img src="../assets/img/icons/dash3.svg" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>
                            <span class="counters" data-count="40">0</span>
                            <span class="text-success">&#9650; 5%</span> <!-- Price increasing indicator -->
                        </h5>
                        <h6>Market Price Alert</h6>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash3">
                    <div class="dash-widgetimg">
                        <span><img src="../assets/img/icons/dash4.svg" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="50">0</span></h5>
                        <h6>Total Expected Yield</h6>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Purchase & Sales Chart -->
        <div class="row">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Purchase & Sales</h5>
                        <div class="graph-sets">
                            <ul>
                                <li><span>Sales</span></li>
                                <li><span>Purchase</span></li>
                            </ul>
                            <div class="dropdown">
                                <button class="btn btn-white btn-sm dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Year <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a href="javascript:void(0);" class="dropdown-item">2022</a></li>
                                    <li><a href="javascript:void(0);" class="dropdown-item">2021</a></li>
                                    <li><a href="javascript:void(0);" class="dropdown-item">2020</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sales_charts"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Motivational Footer Message -->
        <div class="text-center mt-4">
            <p class="fw-bold fst-italic text-primary">"Farming is not just a profession, it’s a way of life. Keep growing!"</p>
        </div>
    </div>
</div>

<!-- JavaScript to Animate Counters -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.counters').forEach(counter => {
            let target = parseInt(counter.getAttribute('data-count'));
            let count = 0;
            let increment = target / 100;

            let interval = setInterval(() => {
                count += increment;
                counter.innerText = Math.floor(count);

                if (count >= target) {
                    counter.innerText = target;
                    clearInterval(interval);
                }
            }, 30);
        });
    });
</script>
