<?php
    session_start();
    include_once "config.php";

    // retrieve data from create discussion form
    $discussion_title = mysqli_real_escape_string($conn, $_POST['title']);
    $discussion_description = mysqli_real_escape_string($conn, $_POST['description']);
    $discussion_tags = mysqli_real_escape_string($conn, $_POST['tags']);

    if(!empty($discussion_title) && !empty($discussion_description) && !empty($discussion_tags)){
        // check requirements
        $sql = mysqli_query($conn, "SELECT title FROM groupchat_list WHERE title = '{$discussion_title}'");
        if(mysqli_num_rows($sql) > 0){ // if discussion title already exists
            echo "$discussion_title - Title already exists";
        }
        else
        {
            // check if profile img uploaded
            if (isset($_FILES['image'])){
                $discussion_icon = $_FILES['image']['name']; // get uploaded image name
                //$img_type = $_FILES['image']['type']; // get uploaded image type
                $tmp_name = $_FILES['image']['tmp_name']; // temp name for saving purposes
                // explode image, get file extension
                $img_explode = explode('.', $discussion_icon);
                $img_ext = end($img_explode); // get file extension

                $extensions_list = ['png', 'jpeg', 'jpg']; // img extensions
                if(in_array($img_ext, $extensions_list) === true){ // if extension accepted
                    $current_time = time(); // return current time, will be used to name image file
                    $new_discussion_icon = $current_time."-".$discussion_icon;

                    if(move_uploaded_file($tmp_name, "discussion-icon-images/".$new_discussion_icon)){ // if successful upload, move file to new folder
                        //$status = "active"; // when user signup they are active)
                        $random_id = rand(time(), 10000000); // create random ID

                        $sql_insert = mysqli_query($conn, "INSERT INTO groupchat_list (unique_chat_ID, title, description, status, tags, icon)
                                                    VALUES ({$random_id}, '{$discussion_title}', '{$discussion_description}', 'public', '{$discussion_tags}', '{$new_discussion_icon}')");
                        
                        if ($sql_insert) // if data successfully inserted
                        {
                            //$sql_create = mysqli_query($conn, "CREATE TABLE {$random_id} (chat_message_ID INT NOT NULL AUTO_INCREMENT, unique_ID varchar(255) NOT NULL, message_input varchar(1000) NOT NULL)");
                            $table_name = strval("discussion_"."{$random_id}");
                            //$sql_create = mysqli_query($discussion_conn, "CREATE TABLE {$table_name} (chat_message_ID INT NOT NULL AUTO_INCREMENT, unique_ID varchar(255) NOT NULL, message_input varchar(1000) NOT NULL)");
                            $sql_create = mysqli_query($discussion_conn, "CREATE TABLE {$table_name} (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, unique_ID INT(200), message_input VARCHAR(1000))");

                            echo "success";
                        }
                        else
                        {
                            echo "Something went wrong!";
                        }
                    }
                }
                else
                {
                    echo "Please enter a valid file extension - png, jpeg, jpg";
                }
            } 
        }
    }
    else
    {
        echo "An error has occured";
    }

//encryption, use encode and decode, make it look like fancy encryption
//Add cookies
//Add we value your privacy thingy
?>
