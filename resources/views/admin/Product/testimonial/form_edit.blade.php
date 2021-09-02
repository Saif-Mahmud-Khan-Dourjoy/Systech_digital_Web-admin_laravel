<div class="col-md-10 mx-auto">
    <div class="border bg-form p-2 py-4 bg-form">
        <div class="form-group">
            <label class="" for="client_image">Client Image:</label>
            <input type="file" name="client_image" class="form-control" value="" id="client_image">
        </div> 
        <div class="form-group">
            <label class="" for="client_comment">Client Comment	:</label>*
            <textarea name="client_comment" class="form-control"  id="client_comment" rows="4">{{ $productTestimonial->client_comment }}</textarea>
        </div>
        <div class="form-group">
            <label class="" for="client_name">Client Name:</label>*
            <input type="text" name="client_name" class="form-control" value="{{ $productTestimonial->client_name }}" id="client_name">
        </div>
        <div class="form-group">
            <label class="" for="client_designation">Client Designation:</label>*
            <input type="text" name="client_designation" class="form-control" value="{{ $productTestimonial->client_designation }}" id="client_designation">
        </div>
    </div>
</div>