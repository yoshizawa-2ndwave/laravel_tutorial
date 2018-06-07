<div class="col-xs-10">
    {{ Form::open(['route'=> 'posts.index', 'method' => 'get']) }}
    <div class="form-group">
        <div class="row">
            <div class="col-xs-10">
                {{ Form::text('keywords', $keyword, ['type' => 'search', 'class' => 'form-control', 'placeholder' => 'content...']) }}
            </div>
            <div class="col-xs-2">
                {{ Form::submit('search', ['class' => 'btn btn-primary col-xs-12']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-5">
            <label>From</label>
            {{ Form::date('fromDate', $fromDate, ['class' => 'form-control']) }}
        </div>
        <div class="form-group col-xs-5">
            <label>To</label>
            {{ Form::date('toDate', $toDate, ['class' => 'form-control']) }}
        </div>
        <div class="form-group col-xs-2">
            <label>表示件数</label>
            {{ Form::select('size', ['10' => '10件', '20' => '20件'], '20', ['class' => 'form-control']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
