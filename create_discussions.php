<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PlusSocial</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        
    </head>
    <body>
        <div id="logo"> 
	        <img src="php/images/logo.png" width = "200" height = "200"> 
        </div>  
        <div class="wrapper">
            <div class="containment">
                <section class="form discussion-create">
                    <a href="available_discussions.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <header class="create-discussion-header">Create discussion</header>
                    <form action="#" enctype="multipart/form-data">
                        <div class="error-txt"></div>
                        <div class="field input">
                            <label>Discussion title</label>
                            <input type="text" name="title" placeholder="Enter title" required autocomplete="off">
                        </div>
                        <div class="field input">
                            <label>Discussion description</label>
                            <input type="text" name="description" placeholder="Enter description" required autocomplete="off">
                        </div>
                        <div class="field input">
                            <label>Discussion tags</label>
                            <input type="text" name="tags" placeholder="Enter tags (seperate with ',')" required autocomplete="off">
                        </div>
                        <div class="field image">
                            <label>Discussion icon</label>
                            <input type="file" name="image" required>
                        </div>
                        <div class="field button">
                            <input type="submit" value="Create discussion">
                        </div>
                    </form>
                </section>
            </div> 
        </div>

        <script src="javascript/discussion.js"></script>
    </body>
</html>