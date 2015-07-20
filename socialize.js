/*
* Author: William Peralta
* Note: This class require jquery
*/

function socialize(){
    var social_availables =[
        "instagram",
        "twitter"
        ];
    var options = {

    };
    this.getProfileInfo = function(search){
        //todo: config social
        $.post(ROUTE_SOCIAL,{search:search},function(){
            //todo: callback
        });
    }
}
window.cercaInstagram=function(){
    $.post("./",{azione:"get_instagram",nome:$("#instaUsername").val()},function(data){

        if(data[1]==null){
            $("#inst_step2").show();
            //$("#widant").hide();


            //$("#inst_step2,#widant").fadeTo(1000,1);
            $("#inst_step2,#widant").show();
            $("#title-ant").html("Est-ce-que c'est votre profil?")
            return;
        }
        console.log(data[1].meta.code);
        if(data[1].meta.code==400){
            //$("#inst_step2").hide();
            //$("#widant").fadeTo(1000,1);
            //$("#instaUsername").val(data[1].data.username);
            //$("#inst_step2,#widant").fadeTo(1000,1);
            $("#inst_step2,#widant").show();
            $("#title-ant").html("Est-ce-que c'est votre profil?")

            $("#ins_details").html("");
            $("#ins_details").append("<div style='padding:10px; text-align:center'><a href='/comment-changer-ses-parametres-de-confidentialite-sur-instagram' target='_blank' style='color:red; '>Ce n'est pas un profil public, <br>cliquez ici pour plus d'informations</a></div>");
        }else{
            $("#ins_details").html('<div class="form-inner">\
							<div style="display:inline-block;">\
								<img style="" src="'+data[1].data.profile_picture+'" width="150" height="150"/></div>\
							<div style="margin-left:15px;display:inline-block;vertical-align:top;">\
							<h1 style="margin-bottom:10px;font-size:35px;">'+data[1].data.username+'</h1>\
								<p><strong>Images: </strong>'+data[1].data.counts.media+'<strong><br>\
								Abonnés: </strong>'+data[1].data.counts.followed_by+'<br>\
								<strong>Abos: </strong>'+data[1].data.counts.follows+'</p>\
							</div>\
						</div>');
            $("#instaUsername").val(data[1].data.username);
            //$("#inst_step2,#widant").fadeTo(1000,1);
            $("#inst_step2,#widant").show();
            $("#title-ant").html("Est-ce-que c'est votre profil?")
        }
        $("#inst_step2").hide();
        $("#inst_step2,#widant").show();
    },"json");
}
window.fotoInstagram=function(){
    $.ajax({
        type: "GET",
        dataType: "jsonp",
        cache: false,
        url: "//api.instagram.com/oembed?url="+encodeURIComponent($("#instaUsername").val()),
        success: function(data) {
            dataURL = data.thumbnail_url;
            //	dataURL = dataURL.replace('http://','https://'); //dataURL.replace(/.*?:\/\//g, "");
            $("#ins_details").html('<div style="text-align:center;"><img style="max-width:90%" src="'+dataURL+'"/></div>');

        }
    });

    $("#inst_step2,#widant").show();
    $("#title-ant").html("Photo");
}
window.cercaTwitter=function(){
    if($("#instaUsername").val()==""){ return false;}
    $.post(ajaxurl,{
        action:"get_twitter_info",
        link:$("#instaUsername").val()
    },function(data){

        $("#ins_details").html('<div style="text-align:center;"><img style="max-width:90%" src="'+data.profile_image_url+'"/><br><strong>'+data.name+'</strong></div>');
        $("#inst_step2,#widant").show();
        $("#title-ant").html("Est-ce-que c'est votre profil?");
        if(data.protected){
            $("#inst_step2").hide();
            $("#ins_details").append("<div style='padding:10px; text-align:center'><a href='/comment-changer-ses-parametres-de-confidentialite-sur-twitter' target='_blank' style='color:red; '>Ce n'est pas un profil public, <br>cliquez ici pour plus d'informations</a></div>");
        }
    },"json");
}
window.cercaTwitterStatus=function(){
    if($("#instaUsername").val()==""){ return false;}
    /*$.post(ajaxurl,{
     action:"get_twitter_info",
     link:$("#instaUsername").val()
     },function(data){*/
    //$("#ins_details").html('<div style="text-align:center;"><img style="max-width:90%" src="'+data.profile_image_url+'"/><br><strong>'+data.name+'</strong></div>');
    $("#inst_step2").show();
    $("#title-ant").html("Est-ce-que c'est votre profil?");
    /*},"json");*/
}
window.cercaSoundC=function(){
    if($("#instaUsername").val()==""){ return false;}
    $("#inst_step2").show();
    $("#title-ant").html("Est-ce-que c'est votre profil?");
}
window.cercaFacePage=function(){
    if($("#instaUsername").val()==""){ return false;}
    $("#inst_step2").show();
    $("#title-ant").html("Est-ce-que c'est votre profil?");
}
window.cercaVine=function(){
    //$("#ins_details").html('<div style="text-align:center;"><img style="max-width:90%" src="'+data.profile_image_url+'"/><br><strong>'+data.name+'</strong></div>');
    $("#inst_step2").show();
    $("#button_cerca_ant").hide();
    //$("#title-ant").html("Est-ce-que c'est votre profil?");
}
window.cercaVideoVine=function(){
    if($("#instaUsername").val()==""){ return false;}
    $("#ins_details").html('<div style="text-align:center; width:90%;margin: 0 auto;"><iframe id="iframe_vine" style="width:90%; border:0;" src="#"></iframe></div>');
    $("#iframe_vine").attr("src",$("#instaUsername").val()+"/card");
    $("#inst_step2,#widant").show();
    //$("#button_cerca_ant").hide();
    $("#title-ant").html("Video");
}
window.cercaVideoYoutube=function(){
    if(youtube_parser($("#instaUsername").val())==""){ alert("Url not valid"); return false;}
    var IDY=youtube_parser($("#instaUsername").val());
    var Link="//www.youtube.com/embed/"+IDY;
    $("#ins_details").html('<div style="text-align:center; width:90%;margin: 0 auto;"><iframe id="iframe_vine" style="width:90%; border:0;" src="#"></iframe></div>');
    $("#iframe_vine").attr("src",Link);
    $("#inst_step2,#widant").show();
    //$("#button_cerca_ant").hide();
    $("#title-ant").html("Video");
}
window.conti=function(){
    $.post(ajaxurl,{
        action:"conti_ig_likes",
        plus:$("#plus:checked").val(),
        quantity_custom:$("#quantity_custom").val(),
        quantity_foto:$("#quantity_foto").val(),
        ig_anciennes_nouvelles_faciility_new:$("#ig_anciennes_nouvelles_faciility_new:checked").val(),
        ig_anciennes_nouvelles_faciility_old:$("#ig_anciennes_nouvelles_faciility_old:checked").val(),
        supersonic:$("#supersonic:checked").val(),
        protection:$("#protection:checked").val(),
        promotion_code:$("#promotion_code").val(),
        txt_custom_order_notes:$("#txt_custom_order_notes").val(),
        email:$("#email").val(),
        id:10					},function(data){
        $("#conti").html(data);
    });
}
conti();

function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    if (match&&match[7].length==11){
        var b=match[7];
        return b;
    }else{
        return "";
    }
}