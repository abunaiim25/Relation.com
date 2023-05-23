$(document).ready(function () {
    //$(".like, .unlike").click(function () {
        $(document).on("click", ".like, .unlike", function () { 
        var id = this.id;  
        //alert(id);
        
        
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
            //type: 'post',
            method: "POST",
            url: 'controller/LikeunlikeController.php',
            data: {
                postid:postid,
                type:type
            },
           //dataType: 'json',

            success: function(data)
            {
                var likes = data['likes'];
                var unlikes = data['unlikes'];

                $("#likes_"+postid).text(likes);       
                $("#unlikes_"+postid).text(unlikes);   
                if(type == 1)//like
                {
                    $("#like_"+postid).css("color","red");
                    $("#unlike_"+postid).css("color","hsl(252, 15%, 65%)");
                    $("#autoReload").load(location.href + " #autoReload");
                }
                if(type == 0)//unlike
                {
                    $("#unlike_"+postid).css("color","#ffa449");
                    $("#like_"+postid).css("color","hsl(252, 15%, 65%)");
                    $("#autoReload").load(location.href + " #autoReload");
                }
            }
        });
        
        
    });
});