<?php

// Class for user details
class UserDetails
{
    public $UniqueUserId;
    public $FirstName;
    public $LastName;
    public $Email;
    public $Tags;

    public function __construct($uniqueuserid, $firstname, $lastname, $email, $tags)
    {
        $this->UniqueUserId = $uniqueuserid;
        $this->FirstName = $firstname;
        $this->LastName = $lastname;
        $this->Email = $email;
        $this->Tags = $tags;
    }

    public function getUserDetailsUnqiueId()
    {
        return $this->UniqueUserId;
    }

    public function getUserDetailsFirstName()
    {
        return $this->FirstName;
    }

    public function getUserDetailsLastName()
    {
        return $this->LastName;
    }

    public function getUserDetailsEmail()
    {
        return $this->Email;
    }

    public function getUserDetailsTags()
    {
        return $this->Tags;
    }

}

// Class for private messages
class PrivateChat
{
    public $MessageId;
    public $IncomingUserId;
    public $OutgoingUserId;
    public $MessageInput;

    public function __construct($messageid, $incominguserid, $outgoinguserid, $messageinput)
    {
        $this->MessageId = $messageid;
        $this->IncomingUserId = $incominguserid;
        $this->OutgoingUserId = $outgoinguserid;
        $this->MessageInput = $messageinput;
    }

    public function getPrivateChatMessageId()
    {
        return $this->MessageId;
    }

    public function getPrivateChatIncomingUserId()
    {
       return $this->IncomingUserId;
    }
    
    public function getPrivateChatOutgoingUserId()
    {
        return $this->OutgoingUserId;
    }

    public function getPrivateChatMessageInput()
    {
        return $this->MessageInput;
    }
}

// Class for global discussion details
class DiscussionDetails
{
    public $ChatId;
    public $UniqueChatId;
    public $Title;
    public $Description;
    public $Status;
    public $Tags;
    public $Icon;

    public function __construct($chatid, $uniquechatid, $title, $description, $status, $tags, $icon)
    {
        $this->ChatId = $chatid;
        $this->UniqueChatId = $uniquechatid;
        $this->Title = $title;
        $this->Description = $description;
        $this->Status = $status;
        $this->Tags = $tags;
        $this->Icon = $icon;
    }

    public function getDiscussionDetailsChatId()
    {
        return $this->ChatId;
    }

    public function getDiscussionDetailsUniqueChatId()
    {
        return $this->Unique;
    }

    public function getDiscussionDetailsTitle()
    {
        return $this->Title;
    }

    public function getDiscussionDetailsDescription()
    {
        return $this->Description;
    }

    public function getDiscussionDetailsStatus()
    {
        return $this->Status;
    }

    public function getDiscussionDetailsTags()
    {
        return $this->Tags;
    }

    public function getDiscussionDetailsIcon()
    {
        return $this->Icon;
    }
}

// Class for global discussion data
class Discussion
{
    public $UniqueChatId;
    public $UniqueUserId;
    public $MessageInput;

    public function __construct($uniquechatid, $uniqueuserid, $messageinput)
    {
        $this->UniqueChatId = $uniquechatid;
        $this->UniqueUserId = $uniqueuserid;
        $this->MessageInput = $messageinput;
    }

    public function getDiscussionChatId()
    {
        return $this->UniqueChatId;
    }

    public function getDiscussionsUserId()
    {
        return $this->UniqueUserId;
    }

    public function getDiscussionMessageInput()
    {
        return $this->MessageInput;
    }
}

?>
