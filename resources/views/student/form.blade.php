<form action="/student" id="form-ajax" method="POST" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name" class="col-md-3 control-label">{{ __('common.name') }} <span class="text-danger">*</span></label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('common.name') }}">
            <font color="red" class="validation" id="name_validation" ></font>
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="col-md-3 control-label">{{ __('common.phone') }} <span class="text-danger">*</span></label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ __('common.phone') }}">
            <font color="red" class="validation" id="phone_validation" ></font>
        </div>
    </div>
    <div class="form-group">
        <label for="country" class="col-md-3 control-label">{{ __('common.country') }}</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="country" id="country" placeholder="{{ __('common.country') }}">
            <font color="red" class="validation" id="country_validation" ></font>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-md-3 control-label">{{ __('common.email') }}</label>
        <div class="col-md-9">
            <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('common.email') }}">
            <font color="red" class="validation" id="email_validation" ></font>
        </div>
    </div>
    <div class="form-group">
        <label for="courses" class="col-md-3 control-label">{{ __('common.courses') }} <span class="text-danger">*</span></label>
        <div class="col-md-9">
            <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple">
                <option value="AL">Alabama</option>
                <option value="WY">Wyoming</option>
            </select>
            <font color="red" class="validation" id="courses_validation" ></font>
        </div>
    </div>

</form>
