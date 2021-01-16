
<div class="modal fade" id="insuranceModal" tabindex="-1" role="dialog" aria-labelledby="insuranceModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Insurance</h4>
            </div>
            <form class="form-horizontal" role="form" id="insuranceForm">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <input type="hidden" id="vehicleCode" name="vehicleCode"/>
                    <div class="form-group ">
                        <label>Insurance Type</label>
                        <div>
                            <select class="form-control select2" id="insurance_type" style="width: 100%" name="insurance_type" required>
                                <option value="">Select  ---</option>
                                <option value="Insurance">Insurance</option>
                                <option value="Road Worthy">Road Worthy</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label>Last Insurance date</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw ti-calendar"></i>
                            </div>
                            <input type='text' id="insurance_renewal_date" 
                                   data-provide="datepicker" name="renewal_date" 
                                   required class="datepicker form-control" />
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Next Renewal date</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw ti-calendar"></i>
                            </div>
                            <input type='text' id="insurance_renewal_date" 
                                   data-provide="datepicker" name="next_renewal_date" 

                                   required class="datepicker form-control" />
                        </div>

                    </div>
                    <div class="form-group ">
                        <label>Amount</label>
                        <div>
                            <input type='text'  name="amount" required class="form-control" />

                        </div>
                    </div>






                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="maintenanceModal" tabindex="-1" role="dialog" aria-labelledby="maintenanceModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Maintenance</h4>
            </div>
            <form class="form-horizontal" role="form" id="insuranceForm">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">



                    <div class="form-group ">
                        <label>Maintenance date</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw ti-calendar"></i>
                            </div>
                            <input type='text' id="insurance_renewal_date" 
                                   data-provide="datepicker" name="maintenance_date" 
                                   required class="datepicker form-control" />
                        </div>                    
                    </div>
                    <div class="form-group ">
                        <label>Description</label>
                        <div>
                            <textarea rows="5" name="description" style="width: 100%"> </textarea>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label>Total Amount</label>
                        <div>
                            <input type='text'  name="amount" required class="form-control" />

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="replacementModal" tabindex="-1" role="dialog" aria-labelledby="replacementModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Repairs/Replacement</h4>
            </div>
            <form class="form-horizontal" role="form" id="insuranceForm">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">

                    <div class="form-group ">
                        <label> Type</label>
                        <div>
                            <select class="form-control select2" id="colors" style="width: 100%" name="insurance_type" required>
                                <option value="">Select  ---</option>
                                <option value="Repair">Repair</option>
                                <option value="Replacement">Replacement</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label> Car Parts</label>
                        <div>
                            <select class="form-control select2" id="colors" style="width: 100%" name="carparts" required>
                                <option value="">Select  ---</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label>Date</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw ti-calendar"></i>
                            </div>
                            <input type='text' id="insurance_renewal_date" 
                                   data-provide="datepicker" name="maintenance_date" 
                                   required class="datepicker form-control" />
                        </div>                    
                    </div>

                    <div class="form-group ">
                        <label> No of Days</label>
                        <div>
                            <input type='text'  name="noofdays" required class="form-control" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label> Amount</label>
                        <div>
                            <input type='text'  name="amount" required class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="revenueModal" tabindex="-1" role="dialog" aria-labelledby="revenueModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Revenue</h4>
            </div>
            <form class="form-horizontal" role="form" id="insuranceForm">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">

                    <div class="form-group ">
                        <label> Driver</label>
                        <div>
                            <select class="form-control select2" id="colors" style="width: 100%" name="driver_id" required>
                                <option value="">Select  ---</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-group ">
                        <label>Payment Date</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw ti-calendar"></i>
                            </div>
                            <input type='text' id="insurance_renewal_date" 
                                   data-provide="datepicker" name="maintenance_date" 
                                   required class="datepicker form-control" />
                        </div>                    
                    </div>


                    <div class="form-group ">
                        <label> Amount</label>
                        <div>
                            <input type='text'  name="amount" required class="form-control" />
                        </div>
                    </div>

                    <div class="form-group ">
                        <label>Description</label>
                        <div>
                            <textarea rows="5" name="description" style="width: 100%"> </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">General Expense</h4>
            </div>
            <form class="form-horizontal" role="form" id="insuranceForm">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">

                    <div class="form-group ">
                        <label> Amount</label>
                        <div>
                            <input type='text'  name="amount" required class="form-control" />
                        </div>
                    </div>

                    <div class="form-group ">
                        <label>Description</label>
                        <div>
                            <textarea rows="5" name="description" style="width: 100%"> </textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label>Date</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw ti-calendar"></i>
                            </div>
                            <input type='text' id="insurance_renewal_date" 
                                   data-provide="datepicker" name="maintenance_date" 
                                   required class="datepicker form-control" />
                        </div>                    
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
