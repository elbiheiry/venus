<form class="modal-content text-center ajax-form" method="put"
    action="{{ route('admin.brands.products.update', ['id' => $image->id]) }}">
    @csrf
    @method('put')
    <div class="modal-body text-center">
        <div class="row">
            <div class="col-sm-12">
                <img src="{{ get_image($image->image, 'brands') }}" width="100" >
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Image </label>
                    <div class="uplaod-wrap">
                        <input type='file' name="image">
                        <span class='path'></span>
                        <span class='button'>Select File</span>
                    </div>
                </div>
                <span class="text-danger">Please note that image dimensions should be : 540 * 675
                </span>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label> Name </label>
                    <input type="text" class="form-control" name="name" value="{{$image->name}}"  />
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label> Name (AR)</label>
                    <input type="text" class="form-control" name="name_ar" value="{{$image->name_ar}}"  />
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
