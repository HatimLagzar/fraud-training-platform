import questionService from "../../services/questions/QuestionService";

class CreateReply {
    init() {
        questionService.init()
    }
}

export default new CreateReply();