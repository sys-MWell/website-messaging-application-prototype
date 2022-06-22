export default class PrivateChat
{
    constructor(messageid, incominguserid, outgoinguserid, messageinput)
    {
        this.messageid = messageid;
        this.incominguserid = incominguserid;
        this.outgoinguserid = outgoinguserid;
        this.messageinput = messageinput;
    }

    getPrivateChatMessageId()
    {
        return this.messageid;
    }

    setPrivateChatMessageId()
    {
        this.messageid = messageid;
    }

    getPrivateChatIncomingUserId()
    {
       return this.incominguserid;
    }

    setPrivateChatIncomingUserId(incominguserid)
    {
        this.incominguserid = incominguserid;
    }
    
    getPrivateChatOutgoingUserId()
    {
        return this.outgoinguserid;
    }

    setPrivateChatOutgoingUserId(outgoinguserid)
    {
        this.outgoinguserid = outgoinguserid;
    }

    getPrivateChatMessageInput()
    {
        return this.messageinput;
    }

    setPrivateChatMessageInput(messageinput)
    {
        this.messageinput = messageinput;
    }
}