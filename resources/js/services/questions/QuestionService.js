import replyTemplate from '../../templates/reply/reply-template';

class QuestionService {
    static REPLIES_NODE_ID = 'replies';
    static ADD_REPLY_BTN_ID = 'add-new-reply';
    static REPLY_ITEM_CLASS_NAME = '.reply-item'
    static DELETE_REPLY_CLASS_NAME = '.delete-reply'

    constructor() {
        this.create = this.create.bind(this);
        this.delete = this.delete.bind(this);
    }

    /**
     * @returns {HTMLElement|null}
     */
    get repliesNode() {
        return document.getElementById(QuestionService.REPLIES_NODE_ID);
    }

    /**
     * @returns {HTMLElement|null}
     */
    get addReplyBtnNode() {
        return document.getElementById(QuestionService.ADD_REPLY_BTN_ID);
    }

    init() {
        this.create()
        this.eventsBinding();
    }

    eventsBinding() {
        if (!this.repliesNode instanceof HTMLElement) {
            return;
        }

        if (this.addReplyBtnNode instanceof HTMLElement) {
            this.addReplyBtnNode.removeEventListener('click', this.create);
            this.addReplyBtnNode.addEventListener('click', this.create);
        }

        this.repliesNode.querySelectorAll(QuestionService.REPLY_ITEM_CLASS_NAME).forEach(replyItem => {
            replyItem.querySelector(QuestionService.DELETE_REPLY_CLASS_NAME).removeEventListener('click', this.delete);
            replyItem.querySelector(QuestionService.DELETE_REPLY_CLASS_NAME).addEventListener('click', this.delete);
        });
    }

    create() {
        const order = this.countReplies()

        this.addReplyBtnNode.insertAdjacentHTML(
            'beforebegin',
            replyTemplate.replaceAll('_ORDER_', order)
        );

        this.eventsBinding();
    }

    delete(e) {
        e.preventDefault()

        e.currentTarget.parentElement.parentElement.parentElement.remove()
    }

    countReplies() {
        return this.repliesNode.querySelectorAll(QuestionService.REPLY_ITEM_CLASS_NAME).length
    }
}

export default new QuestionService();