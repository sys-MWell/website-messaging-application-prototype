export default class UserTags
{   

    constructor(tagid, uniqueuserid, tags)
    {
        this.tagid = tagid;
        this.uniqueuserid = uniqueuserid;
        this.tags = tags;
    }

    getUserTagsId()
    {
        return this.tagid;
    }

    setUserTagsId(tagid)
    {
        this.tagid = tagid;
    }

    getUserTagsUniqueUserId()
    {
        return this.uniqueuserid;
    }

    setUserTagsUniqueUserId(uniqueuserid)
    {
        this.uniqueuserid = uniqueuserid;
    }

    getUserTags()
    {
        return this.tags;
    }
    
    setUserTags(tags)
    {
        this.tags = tags;
    }
}