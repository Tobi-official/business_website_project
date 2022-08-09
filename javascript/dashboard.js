// UPDATE SINGLE COLUMN

$('.item_button').on('click', function(e) {
    e.preventDefault();
    const that = this;

    const id = $(this).attr('data-id');
    const table = $(this).attr('data-table');
    const column = $(this).attr('data-column');
    const value = $(this).attr('data-value');
    


    $(that).children('.input_box').children('button').attr('disabled', true);


    $.ajax({
        type: "POST",
        url:"ajax/update_column_ajax.php",
        data: {'id': id, 'table':table, 'column':column, 'value':value},
        success: function(response) {
            console.log(response);
            $('.message_container').fadeIn();
            
            if(response == "Successfully updated!" || response == "Successfully approved!") {
                    $(".success_msg").fadeIn();
                    $(".success_msg").text(response);
                    $("#post_category").val('');
                    setTimeout(function() {
                        $('.message_container').fadeOut();
                        window.location.reload();
                    }, 2000 );
                    $(that).children('.input_box').children('button').attr('disabled', false);
            }else{
                    $(".fail_msg").fadeIn();
                    $(".fail_msg").text(response);

                setTimeout(function() {
                    $('.message_container').fadeOut();
                }, 3000 );
            }
        }
    });
});


// EDIT POST Categories

$('#edit_category_form').on('submit', function(e) {
    e.preventDefault();
    const that = this;

 
    const post_category = $("#post_category").val();
    
    const formdata = new FormData();

    formdata.append("post_category",post_category);
    

    $(that).children('.input_box').children('button').attr('disabled', true);


    $.ajax({
        type: "POST",
        url:"ajax/edit_post_category_ajax.php",
        data: formdata,

        contentType: false,
        processData: false,

        success: function(response) {
            $('.message_container').fadeIn();

            if(response == "Successfully Updated!") {
                $(".success_msg").fadeIn();
                    $(".success_msg").text(response);
                    $("#post_category").val('');
                    setTimeout(function() {
                        $('.message_container').fadeOut();
                        
                    }, 3000 );
                  
            }else{
                    $(".fail_msg").fadeIn();
                    $(".fail_msg").text(response);

                setTimeout(function() {
                    $('.message_container').fadeOut();
                }, 3000 );
            }
            $(that).children('.input_box').children('button').attr('disabled', false);
        }
    });
});



// DELETE

$('.delete_button').on('click', function(e) {
    e.preventDefault();
    const that = this;
    const post_id = $(this).attr('data-id');
    const table = $(this).attr('data-table');



    $(that).children('.input_box').children('button').attr('disabled', true);


    $.ajax({
        type: "POST",
        url:"ajax/delete_ajax.php",
        data: {'post_id': post_id, 'table':table},
        success: function(response) {
            $('.message_container').fadeIn();
            
            if(response == "Successfully Deleted!") {
                    $(".success_msg").fadeIn();
                    $(".success_msg").text(response);
                    $("#post_category").val('');
                    setTimeout(function() {
                        $('.message_container').fadeOut();
                        window.location.reload();
                    }, 2000 );
                    $(that).children('.input_box').children('button').attr('disabled', false);
            }else{
                    $(".fail_msg").fadeIn();
                    $(".fail_msg").text(response);

                setTimeout(function() {
                    $('.message_container').fadeOut();
                }, 3000 );
            }
        }
    });
});


// EDIT POST 

$('#edit_post_form').on('submit', function(e) {
    e.preventDefault();
    const that = this;

    const post_title = $("#post_title").val();
    const post_category = $("#post_category").val();
    const author = $("#author").val();
    const post_content = $("#post_content").val();
    const post_image = $("#post_image").prop('files')[0];
    const post_tags = $("#post_tags").val();
    const post_status = $("#post_status").val();

    const formdata = new FormData();

    formdata.append("post_title",post_title);
    formdata.append("post_category",post_category);
    formdata.append("author",author);
    formdata.append("post_content",post_content);
    formdata.append("post_image",post_image);
    formdata.append("post_tags",post_tags);
    formdata.append("post_status",post_status);
    

    $(that).children('.input_box').children('button').attr('disabled', true);


    $.ajax({
        type: "POST",
        url:"ajax/edit_post_ajax.php",
        data: formdata,

        contentType: false,
        processData: false,

        success: function(response) {
            $('.message_container').fadeIn();

            if(response == "Successfully Updated!") {
                $(".success_msg").fadeIn();
                    $(".success_msg").text(response);
                    $("#post_category").val('');
                    setTimeout(function() {
                        $('.message_container').fadeOut();
                        
                    }, 3000 );
                  
            }else{
                    $(".fail_msg").fadeIn();
                    $(".fail_msg").text(response);

                setTimeout(function() {
                    $('.message_container').fadeOut();
                }, 3000 );
            }
            $(that).children('.input_box').children('button').attr('disabled', false);
        }
    });
});



// Insert Comments
$('#comment_form').on('submit', function(e) {
    e.preventDefault();
    const that = this;
    /*
    const name = $('#name').val();
    const email = $('#email').val();
    const comment = $('#comment').val();
    const post_id =$('#post_id').val(); */

    const post_data = $(this).serialize();

    $(that).children('.input_box').children('button').attr('disabled', true);


    $.ajax({
        type: "POST",
        url:"ajax/insert_comment_ajax.php",
        /* data: {'name': name,
                'email': email,
                'comment': comment,
                'post_id': post_id
            }, */
            data: post_data,
        success: function(response) {
            $('.message_container').fadeIn();

            if(response == "Successfully posted!") {
                $(".success_msg").fadeIn();
                    $(".success_msg").text(response);

                    $("#comment").val('');
                   
                    setTimeout(function() {
                        $('.message_container').fadeOut();
                        
                    }, 3000 );
                    $(that).children('.input_box').children('button').attr('disabled', false);
            }else{
                    $(".fail_msg").fadeIn();
                    $(".fail_msg").text(response);

                setTimeout(function() {
                    $('.message_container').fadeOut();
                }, 3000 );
            }
        }
    });
});



// Insert Post 

$('#post_form').on('submit', function(e) {
    e.preventDefault();
    const that = this;

    const post_title = $("#post_title").val();
    const post_category = $("#post_category").val();
    const author = $("#author").val();
    const post_content = $("#post_content").val();
    const post_image = $("#post_image").prop('files')[0];
    const post_tags = $("#post_tags").val();
    const post_status = $("#post_status").val();

    const formdata = new FormData();

    formdata.append("post_title",post_title);
    formdata.append("post_category",post_category);
    formdata.append("author",author);
    formdata.append("post_content",post_content);
    formdata.append("post_image",post_image);
    formdata.append("post_tags",post_tags);
    formdata.append("post_status",post_status);
    

    $(that).children('.input_box').children('button').attr('disabled', true);


    $.ajax({
        type: "POST",
        url:"ajax/insert_post_ajax.php",
        data: formdata,

        contentType: false,
        processData: false,

        success: function(response) {
            $('.message_container').fadeIn();

            if(response == "Successfully inserted!") {
                $(".success_msg").fadeIn();
                    $(".success_msg").text(response);
                    $("#post_category").val('');
                    setTimeout(function() {
                        $('.message_container').fadeOut();
                        
                    }, 3000 );
                  
            }else{
                    $(".fail_msg").fadeIn();
                    $(".fail_msg").text(response);

                setTimeout(function() {
                    $('.message_container').fadeOut();
                }, 3000 );
            }
            $(that).children('.input_box').children('button').attr('disabled', false);
        }
    });
});




// Insert Post Category

$('#post_category_form').on('submit', function(e) {
    e.preventDefault();
    const that = this;
    const post_category = $("#post_category").val();

    $(that).children('.input_box').children('button').attr('disabled', true);


    $.ajax({
        type: "POST",
        url:"ajax/insert_post_category_ajax.php",
        data: {'post_category': post_category},
        success: function(response) {
            $('.message_container').fadeIn();

            if(response == "Successfully inserted!") {
                $(".success_msg").fadeIn();
                    $(".success_msg").text(response);
                    $("#post_category").val('');
                    setTimeout(function() {
                        $('.message_container').fadeOut();
                        
                    }, 3000 );
                    $(that).children('.input_box').children('button').attr('disabled', false);
            }else{
                    $(".fail_msg").fadeIn();
                    $(".fail_msg").text(response);

                setTimeout(function() {
                    $('.message_container').fadeOut();
                }, 3000 );
            }
        }
    });
});




//Update Status
$('.status_button').click(function(e) {
    e.preventDefault();
    
    const table = $(this).attr('data-table');
    const column = $(this).attr('data-column');
    const id = $(this).attr('data-id');
    const status = $(this).attr('data-status');

    const ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
                $('.message_container').fadeIn();
                if(this.responseText == "succesfully Updated!") {
                    $(".success_msg").fadeIn();
                    $(".success_msg").text(this.responseText);
                    
                    setTimeout(function() {
                        $('.message_container').fadeOut();
                        window.location.reload();
                    }, 3000 );
                }else{
                    $(".fail_msg").fadeIn();
                    $(".fail_msg").text(this.responseText);

                setTimeout(function() {
                    $('.message_container').fadeOut();
                }, 3000 );
            }
        }
    }
    ajax.open("POST", "ajax/update_status_ajax.php", true);
    ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax.send("table="+table+"&column="+column+"&id="+id+"&status="+status);
});




//Update Profile Page
$('#profile_update_form').on("submit", function(e) {
    e.preventDefault();
    $("#profile_edit_button").html('<i class="fas fa-spinner"></i> Loading...');

    const full_name = $('#full_name').val();
    const email = $('#email').val();
    const phone_number = $('#phone_number').val();
    const profile_img = $('#profile_img').prop('files')[0];

    const formdata = new FormData(this);

    formdata.append('full_name', full_name);
    formdata.append('email', email);
    formdata.append('phone_number', phone_number);
    formdata.append('profile_img', profile_img);

    const ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            $('.message_container').fadeIn();
            if(this.responseText == "succesfully Updated!") {
                $(".success_msg").fadeIn();
                $(".success_msg").text(this.responseText);
            }else{
                $(".fail_msg").fadeIn();
                $(".fail_msg").text(this.responseText);
            }
            setTimeout(function() {
                $('.message_container').fadeOut();
            }, 3000 );
            $("#profile_edit_button").html('Update');
        }
    }

    ajax.open("POST", "ajax/profile_update_ajax.php", true);
    ajax.send(formdata);
});





// Display Sidebar Menu Drop Down

$('.menu_item').click(function(e) {
    e.preventDefault();
    $(this).next().slideToggle('slow');
})
