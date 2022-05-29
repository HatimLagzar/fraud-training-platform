export default /*html*/`
<div class="mb-3 reply-item">
    <div class="form-group mb-3">
        <label for="replies__ORDER_">Reply</label>
        <textarea id="replies__ORDER_" name="replies[_ORDER_]" class="form-control"></textarea>
    </div>
    
    <div class="form-group mb-3">
        <label for="replies__ORDER__CORRECT">Is correct ?</label>
        <input id="replies__ORDER__CORRECT" name="correct_reply_index" type="radio" class="form-check-input" value="_ORDER_">
    </div>
    
    <button type="button" role="button" class="btn btn-sm btn-danger delete-variant"><i class="fa fa-trash"></i> Remove</button>
</div>
`;