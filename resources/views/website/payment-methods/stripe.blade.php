<div class="row">
    <div class="col-sm-12">
        <h2 style="text-align: center">Payment by Stripe </h2>
    </div>
</div>
<hr />

<div class="row">
    <div class='col-sm-6 form-group required'>
        <label class='control-label'>Name on Card</label> 
        <input class='form-control name-on-card' size='4' type='text'>
        <div id="error-name-on-card" style="color:red; margin-top:5px"></div>
    </div>
    <div class='col-sm-6 form-group required'>
        <label class='control-label'>Card Number</label> 
        <input autocomplete='off' class='form-control card-number' maxlength="16" size='16' type='text'>
    </div>
</div>
<div class="row">
    <div class='col-sm-4 form-group cvc required'>
        <label class='control-label'>CVC</label> 
        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
        <div id="error-cvc" style="color:red; margin-top:5px"></div>
    </div>
    <div class='col-sm-4 form-group expiration required'>
        <label class='control-label'>Expiration Month</label> <input
            class='form-control card-expiry-month' placeholder='MM' maxlength="2" size='2'
            type='text'>
    </div>
    <div class='col-sm-4 form-group expiration required'>
        <label class='control-label'>Expiration Year</label> <input
            class='form-control card-expiry-year' placeholder='YYYY' maxlength="4" size='4'
            type='text'>
    </div>
</div>
<div class='col-sm-12 row error form-group hide'>
    <div class='alert-danger alert'>
        Please correct the errors and try again.
    </div>
</div>
<div class="text-right pt-5">
    <div id="submit-wrapper" class="mb-25" style="display: inline-block;" title="" data-original-title="You must accept the Terms of Service to continue.">
    <button type="submit" class="btn btn-scrib-cta btn-lg" id="continue_checkout" name="continue_checkout">
        <span class="fa fa-check"></span>
        <span class="notranslate">&nbsp;</span>Complete Order
    </button>
    </div>
</div>