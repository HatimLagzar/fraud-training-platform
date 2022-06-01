export default /*html*/`
<div class="mb-3 reply-item">
    <div class="form-group mb-3">
        <label for="replies__ORDER_">Reply</label>
        <textarea id="replies__ORDER_" name="replies[_ORDER_][en]" class="form-control" required></textarea>
    </div>
    
    <div class="form-group mb-3">
        <label for="replies__ORDER_">Reply FR</label>
        <textarea id="replies__ORDER_" name="replies[_ORDER_][fr]" class="form-control" required></textarea>
    </div>
    
    <div class="form-group mb-3">
        <label for="replies__ORDER_">Reply ES</label>
        <textarea id="replies__ORDER_" name="replies[_ORDER_][es]" class="form-control" required></textarea>
    </div>
    
    <div class="form-group mb-3">
        <label for="replies__ORDER_">Reply IT</label>
        <textarea id="replies__ORDER_" name="replies[_ORDER_][it]" class="form-control" required></textarea>
    </div>
    
    <div class="form-group mb-3">
        <label for="replies__ORDER_">Reply DE</label>
        <textarea id="replies__ORDER_" name="replies[_ORDER_][de]" class="form-control" required></textarea>
    </div>
    
    <div class="form-group mb-3">
        <label for="replies__ORDER__CORRECT">Is Correct ?</label>
        <input id="replies__ORDER__CORRECT" name="correct_reply_index" type="radio" class="form-check-input" value="_ORDER_">
    </div>
    
    <button type="button" role="button" class="btn btn-sm btn-danger delete-reply"><i class="fa fa-trash"></i> Remove</button>
</div>
`;