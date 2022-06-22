export default class UserDetails
{
    constructor(uniqueuserid, firstname, lastname, email, password, icon)
    {
        this.uniqueuserid = uniqueuserid;
        this.firstname = firstname;
        this.lastname = lastname;
        this.email = email;
        this.password = password;
        this.icon = icon;
    }

    getUserDetailsUnqiueId()
    {
        return this.uniqueuserid;
    }

    setUserDetailsUniqueId(uniqueuserid)
    {
        this.uniqueuserid = uniqueuserid;
    }

    getUserDetailsFirstName()
    {
        return this.firstname;
    }

    setUserDetailsFirstName(firstname)
    {
        this.firstname = firstname;
    }

    getUserDetailsLastName()
    {
        return this.lastname;
    }

    setUserDetailsLastName(lastname)
    {
        this.lastname = lastname;
    }

    getUserDetailsEmail()
    {
        return this.email;
    }

    setUserDetailsEmail(email)
    {
        this.email = email;
    }

    getUserDetailsPassword()
    {
        return this.password;
    }

    setUserDetailsPassword(password)
    {
        this.password = password;
    }

    getUserDetailsIcon()
    {
        return this.icon;
    }

    setUserDetailsIcon(icon)
    {
        this.icon = icon;
    }
}