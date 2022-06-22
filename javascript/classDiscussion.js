export default class Discussion
{
    constructor(uniquechatid, uniqueuserid, messageinput)
    {
        this.uniquechatid = uniquechatid;
        this.uniqueuserid = uniqueuserid;
        this.messageinput = messageinput;
    }

    getDiscussionChatId()
    {
        return this.uniquechatid;
    }

    setDiscussionChatId(uniquechatid)
    {
        this.uniquechatid = uniquechatid;
    }

    getDiscussionsUserId()
    {
        return this.uniqueuserid;
    }

    setDiscussionsUserId(uniqueuserid)
    {
        this.uniqueuserid = uniqueuserid;
    }

    getDiscussionMessageInput()
    {
        return this.messageinput;
    }

    setDiscussionMessageInput(messageinput)
    {
        this.messageinput = messageinput;
    }
}