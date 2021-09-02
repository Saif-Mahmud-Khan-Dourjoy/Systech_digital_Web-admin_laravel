<div class="row">
    <div class="col-md-10 mx-auto my-1">
        <div class="border bg-light p-4 py-4"> 
            <div class="form-group">
                <label class="" for="feature_icon">Feature Icon:</label>*
                <input type="file" name="feature_icon" class="form-control"  id="feature_icon">
            </div> 
            <div class="form-group">
                <label class="" for="feature_headtext">Feature Headtext:</label>*
                <input type="text" name="feature_headtext" class="form-control" value="{{ $productFeature->feature_headtext }}" id="feature_headtext">
            </div>
            <div class="form-group">
                <label class="" for="feature_subtext">Feature Subtext:</label>*
                <textarea name="feature_subtext" class="form-control"  id="feature_subtext" rows="2">{{ $productFeature->feature_subtext }}</textarea>
            </div>
        </div>
    </div>
</div>