import createReply from "./questions/CreateReply";

if (document.location.pathname.startsWith('/admin/questions') === true) {
    createReply.init()
}