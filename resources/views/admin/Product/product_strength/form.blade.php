<div class="row">
    <div class="col-md-10 my-1 mx-auto">
        <div class=" p-2 py-4"> 
            <div class="form-group">
                <label class="" for="strength_icon">Strength Icon:</label>
                <input type="file" name="strength_icon" class="form-control" value="" id="strength_icon">
                </div> 
            <div class="form-group">
                <label class="" for="strength_headtext">Strength Headtext:</label>*
                <input type="text" name="strength_headtext" class="form-control" value="{{ $productStrength->strength_headtext }}" id="strength_headtext">
            </div>
            <div class="form-group">
                <label class="" for="strength_subtext">Strength Subtext:</label>*
                <textarea name="strength_subtext" class="form-control"  id="strength_subtext" rows="4">{{ $productStrength->strength_subtext }}</textarea>
            </div>
        </div>
    </div>
</div>