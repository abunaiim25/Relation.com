$(document).ready(function () {
    $(".like, .unlike").click(function () { 
        var id = this.id;  
        
        var split_id = id.split("_");
        var text = split_id[0];
        var postid = split_id[1]; 
        var type = 0;
        if(text == "like"){
            type = 1;
        }else{
            type = 0;
        }
     
        $.ajax({
            url: 'controller/LikeunlikeController.php',
            //type: 'post',
            method: "POST",
            data: {
                postid:postid,
                type:type
            },
            dataType: 'json',

            success: function(data)
            {
                var likes = data['likes'];
                var unlikes = data['unlikes'];

                $("#likes_"+postid).text(likes);       
                $("#unlikes_"+postid).text(unlikes);   
                if(type == 1)
                {
                    $("#like_"+postid).css("color","#ffa449");
                    $("#unlike_"+postid).css("color","lightseagreen");
                }
                if(type == 0)
                {
                    $("#unlike_"+postid).css("color","#ffa449");
                    $("#like_"+postid).css("color","lightseagreen");
                }
            }
        });
        
    });
});