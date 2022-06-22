<?php
    while($query_data = mysqli_fetch_assoc($searchQuery))
    {
        $tags = $query_data['tags'];
        $tag_result = mb_substr($tags, 0, 41);
        if (strlen($tag_result) > 42){
            $tag_result .= "...";
        }

        $description = $query_data['description'];
        $description_result = mb_substr($description, 0, 80);
        if (strlen($description_result) > 42){
            $description_result .= "...";
        }

        $result .= '<a href="discussions_chat.php?discussion_id='.$query_data['unique_chat_ID'].'">
                        <div class="content">
                            <img src="php/discussion-icon-images/'. $query_data['icon'].'" alt="">
                            <div class="details">
                                <span>'.$query_data['title'].'</span>
                                <span>'.$query_data['status'].'</span>
                                <p>'.$description.'</p>
                                <p>'.$tag_result.'</p>
                            </div>
                        </div>
                    </a>';                     
    }
?>