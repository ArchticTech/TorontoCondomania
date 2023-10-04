{{-- <div class="col-md-4 mb-3 mt-3">
    <div class="form-group">
        <label for="min_deposit_percentage">Min Deposit
            Percentage</label>
        <input type="number" class="form-control" id="min_deposit_percentage"
            required value="0" name="min_deposit_percentage"
            placeholder="Min Deposit Percentage">
    </div>
</div> --}}
<div class="col-md-4 mb-3 mt-3">
    <div class="form-group">
        <label for="assign_unit_no">Assignment Unit No</label>
        <input type="number" class="form-control" id="assign_unit_no" required
            @isset($assignment)
                value="{{ $assignment->assign_unit_no }}"
            @endisset
            value="0" name="assign_unit_no" placeholder="Assignment Unit No">
    </div>
</div>
<div class="col-md-4 mb-3 mt-3">
    <div class="form-group">
        <label for="assign_floor_no">Assignment Floor No</label>
        <input type="number" class="form-control" id="assign_floor_no" required
            @isset($assignment)
        value="{{ $assignment->assign_floor_no }}"
            @endisset
            value="0" name="assign_floor_no" placeholder="Assignment Floor No">
    </div>
</div>
<div class="col-md-4 mb-3 mt-3">
    <div class="form-group">
        <label for="assign_purchase_price">Assignment Purchase No</label>
        <input type="number" class="form-control" id="assign_purchase_price" required
            @isset($assignment)
        value="{{ $assignment->assign_purchase_price }}"
            @endisset
            value="0" name="assign_purchase_price" placeholder="Assignment Purchase No">
    </div>
</div>
<div class="col-md-4 mb-3 mt-3">
    <div class="form-group">
        <label for="assign_cooperation_percentage">Assignment Cooperative
            Percentage</label>
        <input type="number" class="form-control" id="assign_cooperation_percentage" required
            @isset($assignment)
        value="{{ $assignment->assign_cooperation_percentage }}"
            @endisset
            value="0" name="assign_cooperation_percentage" placeholder="Assignment Cooperative Percentage">
    </div>
</div>
<div class="col-md-4 mb-3 mt-3">
    <div class="form-group">
        <label for="assign_deposit_paid">Assignment Deposit Paid</label>
        <input type="number" class="form-control" id="assign_deposit_paid" required
            @isset($assignment)
        value="{{ $assignment->assign_deposit_paid }}"
            @endisset
            value="0" name="assign_deposit_paid" placeholder="Assignment Deposit Paid">
    </div>
</div>
<div class="col-md-4 mb-3 mt-3">
    <div class="form-group">
        <label for="assign_purchased_date">Assign Purchased Date <span style="font-size: 12px;color: grey;">(If No
                Purchased Date :
                01/01/2020)</span></label>
        <input type="date"
            @isset($assignment)
        value="{{ $assignment->assign_purchased_date->toDateString() }}"
            @endisset
           class="form-control" id="assign_purchased_date" required name="assign_purchased_date"
            placeholder="Assignment Purchased Date">
    </div>
</div>
<div class="col-md-4 mb-3 mt-3">
    <div class="form-group">
        <label for="assign_tentative_occ_date">Assign Tentative Occ <span style="font-size: 12px;color: grey;">(If No
                Assign Tentative Occ :
                01/01/2020)</span></label>
        <input class="form-control"  id="assign_tentative_occ_date" required
            @isset($assignment)
        value="{{ $assignment->assign_tentative_occ_date->toDateString() }}"
            @endisset
            name="assign_tentative_occ_date"  type="date" placeholder="Assign Tentative Occ">
    </div>
</div>
