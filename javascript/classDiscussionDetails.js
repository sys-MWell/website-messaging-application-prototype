export default class DiscussionDetails
{
    constructor(chatid, uniquechatid, title, description, status, tags, icon)
    {
        this.chatid = chatid;
        this.uniquechatid = uniquechatid;
        this.title = title;
        this.description = description;
        this.status = status;
        this.tags = tags;
        this.icon = icon;
    }

    getDiscussionDetailsChatId()
    {
        return this.Chatid;
    }

    setDiscussionDetailsChatId(detailchatid)
    {
        this.chatid = chatid; 
    }

    getDiscussionDetailsUniqueChatId()
    {
        return this.unique;
    }

    setDiscussionDetailsUniqueChatId(uniquechatid)
    {
        this.uniquechatid = uniquechatid;
    }

    getDiscussionDetailsTitle()
    {
        return this.title;
    }

    setDiscussionDetailsTitle(title)
    {
        this.title = title;
    }

    getDiscussionDetailsDescription()
    {
        return this.description;
    }

    setDiscussionDetailsDescription(description)
    {
        this.description = description;
    }

    getDiscussionDetailsStatus()
    {
        return this.status;
    }

    setDiscussionDetailsStatus(status)
    {
        this.status = status;
    }

    getDiscussionDetailsTags()
    {
        return this.tags;
    }

    setDiscussionDetailsTags(tags)
    {
        this.tags = tags;
    }

    getDiscussionDetailsIcon()
    {
        return this.icon;
    }

    setDiscussionDetailsIcon(icon)
    {
        this.icon = icon;
    }
}