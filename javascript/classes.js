// Class for user details
class UserDetails
{
    constructor(uniqueuserid, firstname, lastname, email, tags)
    {
        this.UniqueUserId = uniqueuserid;
        this.FirstName = firstname;
        this.LastName = lastname;
        this.Email = email;
        this.Tags = tags;
    }

    getUserDetailsUnqiueId()
    {
        return this.UniqueUserId;
    }

    getUserDetailsFirstName()
    {
        return this.FirstName;
    }

    getUserDetailsLastName()
    {
        return this.LastName;
    }

    getUserDetailsEmail()
    {
        return this.Email;
    }

    getUserDetailsTags()
    {
        return this.Tags;
    }
}

class UserRequirements
{
    constructor(uniqueuserid, email, password)
    {
        this.UniqueUserId = uniqueuserid;
        this.Email = email;
        this.Password = password;
    }

    getUserRequirementsUnqiueId()
    {
        return this.UniqueUserId;
    }

    getUserRequirementsEmail()
    {
        return this.Email;
    }

    getUserRequirementsPassword()
    {
        return this.Password;
    }
}

// Class for private messages
class PrivateChat
{
    constructor(messageid, incominguserid, outgoinguserid, messageinput)
    {
        this.MessageId = messageid;
        this.IncomingUserId = incominguserid;
        this.OutgoingUserId = outgoinguserid;
        this.MessageInput = messageinput;
    }

    getPrivateChatMessageId()
    {
        return this.MessageId;
    }

    getPrivateChatIncomingUserId()
    {
       return this.IncomingUserId;
    }
    
    getPrivateChatOutgoingUserId()
    {
        return this.OutgoingUserId;
    }

    getPrivateChatMessageInput()
    {
        return this.MessageInput;
    }
}

// Class for global discussion details
class DiscussionDetails
{
    constructor(chatid, uniquechatid, title, description, status, tags, icon)
    {
        this.ChatId = chatid;
        this.UniqueChatId = uniquechatid;
        this.Title = title;
        this.Description = description;
        this.Status = status;
        this.Tags = tags;
        this.Icon = icon;
    }

    getDiscussionDetailsChatId()
    {
        return this.ChatId;
    }

    getDiscussionDetailsUniqueChatId()
    {
        return this.Unique;
    }

    getDiscussionDetailsTitle()
    {
        return this.Title;
    }

    getDiscussionDetailsDescription()
    {
        return this.Description;
    }

    getDiscussionDetailsStatus()
    {
        return this.Status;
    }

    getDiscussionDetailsTags()
    {
        return this.Tags;
    }

    getDiscussionDetailsIcon()
    {
        return this.Icon;
    }
}

// Class for global discussion data
class Discussion
{
    UniqueChatId;
    UniqueUserId;
    MessageInput;

    constructor(uniquechatid, uniqueuserid, messageinput)
    {
        this.UniqueChatId = uniquechatid;
        this.UniqueUserId = uniqueuserid;
        this.MessageInput = messageinput;
    }

    getDiscussionChatId()
    {
        return this.UniqueChatId;
    }

    getDiscussionsUserId()
    {
        return this.UniqueUserId;
    }

    getDiscussionMessageInput()
    {
        return this.MessageInput;
    }
}

class UserTags
{   
    TagId;
    UniqueUserId;
    Tags;

    constructor(tagid, uniqueuserid, tags)
    {
        this.TagId = tagid;
        this.UniqueUserId = uniqueuserid;
        this.Tags = tags;
    }

    getDiscussionChatId()
    {
        return this.TagId;
    }

    getDiscussionsUserId()
    {
        return this.UniqueUserId;
    }

    getDiscussionMessageInput()
    {
        return this.Tags;
    } 
}