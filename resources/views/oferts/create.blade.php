<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form class="form form-generic" method="post" action="{{ route('ofert.store') }}">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">@lang('main.create_ofert')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-group">
                        <label class="col-form-label">@lang('main.name')</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">@lang('main.discount')</label>
                        <input type="text" name="value" class="form-control validate-types" data-val-type="value">
                    </div>

                    <div class="form-group mt-2">
                        <label>@lang('main.date_range')</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="dates" class="form-control float-right date_range" id="date_range">
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <input class="mt-5" type="checkbox" name="active" id="check"
                            data-bootstrap-switch>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('main.close')</button>
                <button class="btn btn-outline-success">@lang('main.insert')</button>
            </div>
        </form>
    </div>
</div>



