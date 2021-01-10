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
            <label class="control-label">الرقم الآلي</label>
            <input type="number" min="0" name="issue_court_code"
                value="{{ isset($issue) ? $issue->issue_court_code : old('issue_court_code') }}" class="form-control"
                placeholder="ادخل الرقم الآلي">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">نوع الدعوى</label>
            <input type="text" name="type" value="{{ isset($issue) ? $issue->type : old('type') }}" class="form-control"
                placeholder="ادخل نوع الدعوى">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">اسم محكمة الخبراء</label>
            <input type="text" name="experts_court" value="{{ isset($issue) ? $issue->experts_court : old('experts_court') }}"
                class="form-control" placeholder="ادخل اسم محكمة الخبراء">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">اسم الخبير</label>
            <input type="text" name="expert_name" value="{{ isset($issue) ? $issue->expert_name : old('expert_name') }}"
                class="form-control" placeholder="ادخل اسم الخبير">
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
            <label class="control-label">القرار السابق</label>
            <input type="text" name="previous_decision"
                value="{{ isset($issue) ? $issue->previous_decision : old('previous_decision') }}" class="form-control"
                placeholder="ادخل القرار السابق">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">رقم الدور</label>
            <input type="text" name="floor_number"
                value="{{ isset($issue) ? $issue->floor_number : old('floor_number') }}" class="form-control"
                placeholder="ادخل رقم الدور">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">رقم القاعة</label>
            <input type="text" name="hall_number"
                value="{{ isset($issue) ? $issue->hall_number : old('hall_number') }}" class="form-control"
                placeholder="ادخل رقم القاعة">
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">التاريخ</label>
            <div class="input-group date date-picker" data-date="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                <span class="input-group-btn">
                    <button class="btn default" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
                <input type="text" class="form-control" name="date"
                value="{{ isset($issue) ? $issue->date : old('date') }}"
                placeholder="ادخل التاريخ">
            </div>
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