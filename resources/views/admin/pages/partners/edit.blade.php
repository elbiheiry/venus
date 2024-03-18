<form class="modal-content text-center ajax-form" method="put"
    action="{{ route('admin.partners.update', ['id' => $partner->id]) }}">
    @csrf
    @method('put')
    <div class="modal-body text-center">
        <div class="row">
            <div class="col-sm-12">
                <img src="{{ get_image($partner->image, 'partners') }}" width="200">
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>partner logo </label>
                    <div class="uplaod-wrap">
                        <input type='file' name="image">
                        <span class='path'></span>
                        <span class='button'>Select File</span>
                    </div>
                    <span class="text-danger">Image dimensions should be : 200 * 200
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button class="custom-btn" type="submit">
            <i class="fa fa-plus"></i> Save change
        </button>
        <button type="button" class="custom-btn red-bc" data-dismiss="modal">
            <i class="fa fa-times"></i> Close
        </button>
    </div>
</form>
