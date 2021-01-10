@section('page-style-plugins')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
@endsection

<div class="row form-body">
    <div class="col-sm-12">
        <div class="form-group col-sm-6">
            <label class="control-label">رقم القضية</label>
            <input type="number" min="0" name="issue_number"
                value="{{ isset($issue) ? $issue->issue_number : old('issue_number') }}" class="form-control"
                placeholder="ادخل رقم القضية">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">الرقم الآلي</label>
            <input type="number" min="0" name="issue_court_code"
                value="{{ isset($issue) ? $issue->issue_court_code : old('issue_court_code') }}" class="form-control"
                placeholder="ادخل الرقم الآلي">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">الموكل</label>
            <select name="client_id" class="form-control select2" data-placeholder="اختر اسم الموكل">
                @foreach ($clients as $item)
                    <option value="{{ $item->id }}"
                        {{ (isset($issue) && $issue->client->id == $item->id) || old('client_id') == $item->id ? 'selected' : ''}}>
                        {{ $item->code .' '. $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">اسم المحكمة</label>
            <input type="text" name="court_name" value="{{ isset($issue) ? $issue->court_name : old('court_name') }}"
                class="form-control" placeholder="ادخل اسم المحكمة">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">اسم الخصم</label>
            <input type="text" name="opponent_name"
                value="{{ isset($issue) ? $issue->opponent_name : old('opponent_name') }}" class="form-control"
                placeholder="ادخل اسم الخصم">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">صفة الخصم</label>
            <input type="text" name="opponent_description"
                value="{{ isset($issue) ? $issue->opponent_description : old('opponent_description') }}"
                class="form-control" placeholder="ادخل صفة الخصم">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">نوع الدعوى</label>
            <input type="text" name="type" value="{{ isset($issue) ? $issue->type : old('type') }}" class="form-control"
                placeholder="ادخل نوع الدعوى">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">موضوع الدعوى</label>
            <input type="text" name="subject" value="{{ isset($issue) ? $issue->subject : old('subject') }}"
                class="form-control" placeholder="ادخل موضوع الدعوى">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">تاريخ الدعوى</label>
            <div class="input-group date date-picker" data-date="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                <span class="input-group-btn">
                    <button class="btn default" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
                <input type="text" class="form-control" name="issue_date" value="{{ isset($issue) ? $issue->issue_date : old('issue_date') }}"
                placeholder="ادخل تاريخ الدعوى">
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">تاريخ الجلسة</label>
            <div class="input-group date date-picker" data-date="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                <span class="input-group-btn">
                    <button class="btn default" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
                <input type="text" class="form-control" name="session_date" value="{{ isset($issue) ? $issue->session_date : old('session_date') }}"
                placeholder="ادخل تاريخ الجلسة">
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">القرار السابق</label>
            <input type="text" name="previous_decision"
                value="{{ isset($issue) ? $issue->previous_decision : old('previous_decision') }}" class="form-control"
                placeholder="ادخل القرار السابق">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">حالة القضية</label>
            <input type="text" name="issue_status"
                value="{{ isset($issue) ? $issue->issue_status : old('issue_status') }}" class="form-control"
                placeholder="ادخل حالة القضية">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">قيمة العقد</label>
            <input type="number" min="0" step="any" name="contract_value"
                value="{{ isset($issue) ? $issue->contract_value : old('contract_value') }}" class="form-control"
                placeholder="ادخل قيمة العقد">
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