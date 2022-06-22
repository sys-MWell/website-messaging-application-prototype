export default class UserRequirements
{
    constructor(uniqueuserid, email, password)
    {
        this.uniqueuserid = uniqueuserid;
        this.email = email;
        this.password = password;
    }

    getUserRequirementsUnqiueId()
    {
        return this.uniqueUserid;
    }

    setUserRequirementUniqueId(uniqueUserid)
    {
        this.uniqueuserid = uniqueUserid;
    }

    getUserRequirementsEmail()
    {
        return this.email;
    }

    setUserRequirementsEmail(email)
    {
        this.email = email;
    }

    getUserRequirementsPassword()
    {
        return this.password;
    }

    setUserRequirementsPassword(password)
    {
        this.password = password;
    }
}