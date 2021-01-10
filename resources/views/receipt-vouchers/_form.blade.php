@section('page-style-plugins')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
@endsection

<div class="row form-body">
    <div class="col-sm-6">
        <div class="form-group col-sm-12">
            <label class="control-label">رقم الإيصال</label>
            <input type="number" min="0" name="number"
                value="{{ isset($receipt) ? $receipt->number : old('number') }}" class="form-control"
                placeholder="ادخل الكود">
        </div>
        <div class="form-group col-sm-12">
            <label class="control-label">نوع القضية</label>
            <input type="text" name="issue_type"
                value="{{ isset($receipt) ? $receipt->issue_type : old('issue_type') }}" class="form-control"
                placeholder="ادخل الاسم">
        </div>
        <div class="form-group col-sm-12">
            <label class="control-label">التاريخ</label>
            <div class="input-group date date-picker" data-date="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                <span class="input-group-btn">
                    <button class="btn default" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
                <input type="text" class="form-control" name="date"
                value="{{ isset($receipt) ? $receipt->date : old('date') }}"
                placeholder="ادخل التاريخ">
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="control-label">الموكل</label>
            <select name="client_id" class="form-control select2" data-placeholder="اختر اسم الموكل">
                @foreach ($clients as $item)
                    <option value="{{ $item->id }}"
                        {{ (isset($receipt) && $receipt->client->id == $item->id) || old('client_id') == $item->id ? 'selected' : ''}}>
                        {{ $item->code .' '. $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12">
            <label class="control-label">المبلغ</label>
            <input name="cost" type="number" step="any"
                value="{{ isset($receipt) ? $receipt->cost : old('cost') }}" class="form-control"
                placeholder="ادخل المبلغ">
        </div>
        <div class="form-group col-sm-12">
            <label class="control-label">ملاحظات</label>
            <textarea cols="30" rows="5" name="notes" class="form-control"
            placeholder="أضف أي ملاحظات إن وجدت">{{ isset($receipt) ? $receipt->notes : old('notes') }}</textarea>
        </div>
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn green">حفظ</button>
</div>

@section('page-script-plugins')
<script src="{{ asset('metronic/assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
@endsection
@section('page-level-scripts')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('metronic/assets/pages/scripts/components-date-time-pickers.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/assets/pages/scripts/components-select2.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@endsection
@section('extra-js')
@endsection