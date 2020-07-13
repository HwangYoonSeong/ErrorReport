$(document).ready(function () {

    share_review();

    //$("#refresh").click(refreshreview);//refreshreview()로 하면 로딩될 때 호출된다

    function share_review() {
        $.getJSON("listreviewjson.php", function (json) {
            //alert(json.review.length);
            $(".review").remove();
            $(".question").remove();
            if (json.review) {
                $.each(json.review, function () {
                    var review = '<section class="review">\
                    <div class="img_frame">\
                    <!--img class="user_image" src="getpicture.php?reviewid='+
                        this["Sol_id"] + '"alt="Solution Picture"/-->';
                    // var review = '<article class="review">\
                    //     <div class="img_frame">\
                    //         <img class="user_image" src="Images/야스오.jpg" alt="Gundam Picture"/>';
                    review += '<div class="user_title"><a href="_inSol.php?Sol_id=' + this["Sol_id"] + '">' + this["Sol_title"] + '</a></div>';
                    //review += '<div class="user_memo"><p>' + this["Sol_contents"] + '</p></div>';
                    review += '<div class="user_info">';
                    review += '<img class="user_thumbnail" src="userimg.php?email=' +
                        this["email"] + '"alt="User Image"/>';
                    //review += '<img class="user_thumbnail" src="Images/아칼리.jpg" alt="User Image"/>';


                    review += '<div class="user_id">' + this["user_id"] + '</div>';
                    review += '<div class="user_date">' + this["time"] + '</div>';
                    review += '</div></div>';
                    review += '</section>';
                    review += '</article>';

                    $(".solution").append(review);
                });
            }
            if (json.question) {
                $.each(json.question, function () {
                    var question = '<section class="question">\
                    <div class="img_frame">\
                    <!--img class="user_image" src="getpicture.php?reviewid='+
                        this["Q_id"] + '"alt="question Picture"/-->';
                    // var review = '<article class="review">\
                    //     <div class="img_frame">\
                    //         <img class="user_image" src="Images/야스오.jpg" alt="Gundam Picture"/>';
                    question += '<div class="user_title"><a href="_inQ.php?Q_id=' + this["Q_id"] + '">' + this["Q_title"] + '</a></div>';
                    //review += '<div class="user_memo"><p>' + this["Sol_contents"] + '</p></div>';
                    question += '<div class="user_info">';
                    question += '<img class="user_thumbnail" src="userimg.php?email=' +
                        this["email"] + '"alt="User Image"/>';
                    //review += '<img class="user_thumbnail" src="Images/아칼리.jpg" alt="User Image"/>';


                    question += '<div class="user_id">' + this["user_id"] + '</div>';
                    question += '<div class="user_date">' + this["time"] + '</div>';
                    question += '</div></div>';

                    question += '</section>';
                    question += '</article>';

                    $(".Q").append(question);
                });
            }





        });


    }
});


