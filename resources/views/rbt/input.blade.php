<div id="rbt">
    @if(isset($_REQUEST['content_id']))
    <div class="form-group">
        <label for="textfield5" class="col-sm-3 col-lg-2 control-label">Content<span class="text-danger">*</span></label>
        <div class="col-sm-9 col-lg-10 controls">
            <select name="content_id" class="form-control chosen-rtl">
                <option id="category_{{ $_REQUEST['content_id'] }}" value="{{ $_REQUEST['content_id'] }}">{{ $_REQUEST['title']}}</option>
            </select>
        </div>
    </div>
    @else
    <div class="form-group">
        <label class="col-sm-3 col-lg-2 control-label">Content<span class="text-danger">*</span></label>
        <div class="col-sm-9 col-lg-10 controls">
            {!! Form::select('content_id',$contents->pluck('title','id'),null,['class'=>'form-control chosen-rtl','required']) !!}
        </div>
    </div>
    @endif

    @if(!$rbt)
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <button type="button" class="btn btn-success add_rbt_code" name="button"> <i class="fa fa-plus"></i> Add Rbt </button>
        </div>
    </div>
    @endif
    @if($rbt)
    <div class="form-group">
        <label class="col-sm-3 col-lg-2 control-label">Operator<span class="text-danger">*</span></label>
        <div class="col-sm-9 col-lg-10 controls">
            <select class="form-control chosen-rtl" name="operator_id" required>
                @foreach($operators as $operator)
                <option value="{{$operator->id}}" @if($rbt) @if($rbt->operator_id == $operator->id) selected @endif @endif>{{$operator->name}}-{{$operator->country->title}}</option>
                @endforeach
            </select>
        </div>
    </div>



    <div class="form-group">
        <label class="col-sm-3 col-lg-2 control-label">rbt_code <span class="text-danger">*</span></label>
        <div class="col-sm-9 col-lg-10 controls">
            {!! Form::number('rbt_code',null,['placeholder'=>'rbt_code','class'=>'form-control','min'=>0 , 'required']) !!}
        </div>
    </div>

    <div class="form-group">
    <label class="col-sm-3 col-md-2 control-label">Image</label>
    <div class="col-sm-9 col-md-8 controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                    <img src="{{ url('uploads/image_rbt/'.$rbt->image) }}" alt="" />
            </div>
            <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                <span class="btn btn-file"><span class="fileupload-new">@lang('messages.select_image')</span>
                    <span class="fileupload-exists">Change</span>
                    {!! Form::file('image',["accept"=>"image/*" ,"class"=>"default"]) !!}
                </span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
        </div>
        <span class="label label-important">NOTE!</span>
        <span>Only extensions supported png, jpg, and jpeg</span>
    </div>
</div>


    @endif

</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
    </div>
</div>
