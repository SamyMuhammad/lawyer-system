@section('page-style-plugins')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
@endsection

<div class="row form-body">
    <div class="col-sm-12">
        <div class="form-group col-sm-6">
            <label class="control-label">الكود</label>
            <input type="number" min="0" name="code"
                value="{{ isset($client) ? $client->code : old('code') }}" class="form-control"
                placeholder="ادخل الكود">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">الاسم</label>
            <input type="text" name="name"
                value="{{ isset($client) ? $client->name : old('name') }}" class="form-control"
                placeholder="ادخل الاسم">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">الصفة</label>
            <input type="text" name="description"
                value="{{ isset($client) ? $client->description : old('description') }}" class="form-control"
                placeholder="ادخل الصفة">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">الهاتف</label>
            <input type="text" name="phone" value="{{ isset($client) ? $client->phone : old('phone') }}"
                class="form-control" placeholder="ادخل الهاتف">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">العنوان</label>
            <input type="text" name="address"
                value="{{ isset($client) ? $client->address : old('address') }}" class="form-control"
                placeholder="ادخل العنوان">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">الوظيفة</label>
            <input type="text" name="job" value="{{ isset($client) ? $client->job : old('job') }}"
                class="form-control" placeholder="ادخل الوظيفة">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">الجنسية</label>
            <input type="text" name="nationality" value="{{ isset($client) ? $client->nationality : old('nationality') }}" class="form-control"
                placeholder="ادخل الجنسية">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">الرقم المدني</label>
            <input type="text" name="civil_number" value="{{ isset($client) ? $client->civil_number : old('civil_number') }}"
                class="form-control" placeholder="ادخل الرقم المدني">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">ملاحظات</label>
            <textarea cols="30" rows="5" name="notes" class="form-control"
            placeholder="أضف أي ملاحظات إن وجدت">{{ isset($client) ? $client->notes : old('notes') }}</textarea>
        </div>
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn green">حفظ</button>
</div>

@section('page-script-plugins')
<script src="{{ asset('metronic/assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
@endsection
@section('page-level-scripts')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('metronic/assets/pages/scripts/components-date-time-pickers.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@endsection
@section('extra-js')
@endsection