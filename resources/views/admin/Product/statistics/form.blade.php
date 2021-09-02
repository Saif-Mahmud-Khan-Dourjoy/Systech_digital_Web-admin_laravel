<div class="col-md-10 mx-auto">
    <div class="border bg-form p-2 py-4 bg-form">
        <div class="form-group">
        <label class="" for="statistic_icon">Statistic Icon:</label>
        <input type="file" name="statistic_icon" class="form-control" value="" id="statistic_icon">
        </div> 
        <div class="form-group">
        <label class="" for="statistic_number">Statistic Number:</label>*
        <input type="text" name="statistic_number" class="form-control" value="{{ $productStatistic->statistic_number }}" id="statistic_number">
        </div>
        <div class="form-group">
        <label class="" for="statistic_text">Statistic Text:</label>*
        <input type="text" name="statistic_text" class="form-control" value="{{ $productStatistic->statistic_text }}" id="statistic_text">
        </div>
    </div>
</div>