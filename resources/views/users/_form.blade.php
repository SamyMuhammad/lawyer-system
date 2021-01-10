<div class="row form-body">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">الاسم</label>
            <input type="text" name="name" value="{{ isset($user) ? $user->name : old('name') }}" class="form-control"
                placeholder="ادخل الاسم">
        </div>
        <div class="form-group">
            <label class="control-label">الهاتف</label>
            <div class="input-icon">
                <i class="fa fa-phone"></i>
                <input type="text" name="phone" value="{{ isset($user) ? $user->phone : old('phone') }}"
                    class="form-control" placeholder="ادخل الهاتف">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">البريد الإلكتروني</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                <input type="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}"
                    class="form-control" placeholder="البريد الإلكتروني"> </div>
        </div>
        <div class="form-group">
            <label class="control-label">كلمة المرور</label>
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
            </div>
            @if (request()->routeIs('user.edit'))
            <span class="help-block">اتركه فارغاً في حالة عدم الرغبة في تغيير كلمة المرور.</span>
            @endif
        </div>
        <div class="form-group">
            <label class="control-label">أعد إدخال كلمة المرور</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="كلمة المرور">
        </div>

        <div class="form-group">
            <label class="control-label">العنوان</label>
            <div class="input-icon">
                <i class="fa fa-home"></i>
                <input type="text" name="address" value="{{ isset($user) ? $user->address : old('address') }}"
                    class="form-control" placeholder="ادخل العنوان">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">الصورة الشخصية</label>
            @if (request()->routeIs('user.edit'))
            <img src="{{ asset($user->fullPhotoPath) }}" class="form-photo" alt="{{ $user->name }}">
            @endif
            <input type="file" name="photo">
        </div>
    </div>
    <div class="col-md-6" style="font-size: 17px;">
        <h3 style="margin-bottom: 20px;">تحديد الصلاحيات</h3>
        <div class="md-checkbox">
            <input type="checkbox" id="select_all" class="md-check" onclick="selectAll()">
            <label for="select_all">
                <span class="inc"></span>
                <span class="check"></span>
                <span class="box"></span>تحديد الكل
            </label>
        </div>
        <hr class="roles">
        <div class="md-checkbox">
            @foreach($roles as $role)
            <div>
                <div class="md-checkbox">
                    <input type="checkbox" name="roles[]" id="checkbox{{$role->name}}"
                        value="{{ $role->id }}" class="md-check select_role permission-checkbox" data-parent="{{ $role->name }}"
                        {{ isset($user) && $user->hasRole($role->id) ? 'checked' :'' }}>
                    <label for="checkbox{{$role->name}}" style="font-weight: 600">
                        <span class="inc"></span>
                        <span class="check"></span>
                        <span class="box"></span> {{ $role->ar_name }}
                    </label>
                </div>
                <div class="md-checkbox-inline">
                    @foreach($role->permissions as $permission)
                        <div class="md-checkbox">
                            <input type="checkbox" name="permissions[]" id="checkbox{{$permission->name}}"
                                value="{{ $permission->id }}" class="md-check permission-checkbox" data-parent="{{ $role->name }}"
                            {{ isset($user) && $user->hasPermissionTo($permission->id) ? 'checked' :'' }}>
                            <label for="checkbox{{$permission->name}}">
                                <span class="inc"></span>
                                <span class="check"></span>
                                <span class="box"></span> {{ $permission->ar_name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr class="roles">
            @endforeach
        </div>
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn green">حفظ</button>
</div>

@section('extra-js')
<script>
    function selectAll() {
        const select_all_element = $('#select_all');
        if (select_all_element.is(":checked")) {
            $('.permission-checkbox').prop('checked', true);
        }else{
            $('.permission-checkbox').removeAttr('checked');
        }
        return void(0);
    }

    // Select permissions when select the associated role.
    $(".select_role").change(function(){  //"select all" change
        var parent= $(this).data('parent');
        $('*[data-parent="'+parent+'"]').prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
    });

    //".checkbox" change
    $('.permission-checkbox').change(function(){
        //uncheck "select all", if one of the listed checkbox item is unchecked
        var parent=$(this).data('parent');
        if(false == $(this).prop("checked")){ //if this item is unchecked

            $('.select_role[data-parent="'+parent+'"]').prop('checked', false); //change "select all" checked status to false

            $("#select_all").prop('checked', false); //change "select all" checked status to false
        }

        if ($('.permission-checkbox[data-parent="'+parent+'"]:checked').length == $('.permission-checkbox[data-parent="'+parent+'"]').length ){

            $('.select_role[data-parent="'+parent+'"]').prop('checked', true);
            if ($('.md-check:checked').length == $('.md-check').length ){
                $("#select_all").prop('checked', true);
            }
        }
    });
</script>
@endsection