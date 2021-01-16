       <div >
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-tab-window"></i> Information
                        </h3>
                        <span class="float-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                            <i class="fa fa-fw ti-close removecard"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="bs-example">
                            <ul class="nav nav-tabs" style="margin-bottom: 15px;">


                                <li class="nav-item active">
                                    <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" aria-expanded="false">Insurance/Road Worthy</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="base-tab14" data-toggle="tab" aria-controls="tab14" href="#tab14" aria-expanded="true">Maintenance</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="base-tab15" data-toggle="tab" aria-controls="tab15" href="#tab15" aria-expanded="true">Fixing/Repairs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="base-tab16" data-toggle="tab" aria-controls="tab16" href="#tab16" aria-expanded="false">Revenue</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="base-tab17" data-toggle="tab" aria-controls="tab17" href="#tab17" aria-expanded="false">General Expenses</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane active" id="tab12" aria-labelledby="base-tab12" aria-expanded="false">
                                    <table id="insuranceTbl" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Renewal Date</th>
                                                <th>Next Renewal Date</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        </tbody>
                                    </table>

                                    <button type="button" class="btn btn-info" onclick="payinsurance('{{$parameter}}')">
                                        New Insurance
                                    </button>
                                </div>

                                <div class="tab-pane " id="tab14" aria-labelledby="base-tab14" aria-expanded="true">

                                    <table id="maintenanceTbl" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Maintenance Date</th>
                                                <th>Description</th>
                                                <th>No of Days </th>
                                                <th>Total Amount</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#maintenanceModal">
                                        New Maintenance
                                    </button>
                                </div>

                                <div class="tab-pane " id="tab15" aria-labelledby="base-tab14" aria-expanded="true">

                                    <table id="repairTbl" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type</th>
                                                <th>Parts</th>
                                                <th>Fixing Date</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#replacementModal">
                                        New Repair/Replacement
                                    </button>
                                </div> 

                                <div class="tab-pane " id="tab16" aria-labelledby="base-tab14" aria-expanded="true">

                                    <table id="revenueTbl" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Driver Name</th>
                                                <th>Payment Date</th>
                                                <th>Description</th>                                              
                                                <th>Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#revenueModal">
                                        New Revenue
                                    </button>
                                </div> 

                                <div class="tab-pane " id="tab17" aria-labelledby="base-tab14" aria-expanded="true">

                                    <table id="expensesTbl" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type</th>
                                                <th>Description</th>

                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#expenseModal">
                                        New Expense
                                    </button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
