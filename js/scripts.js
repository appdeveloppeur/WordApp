
jQuery(document).ready(function($){
    // Add Color Picker 
    $( '.cpa-color-picker' ).wpColorPicker();  
   
   
   // Add UPLOAD LOGO
    $('#upload_logo_button').click(function() {
        tb_show('Upload a logo', 'media-upload.php?TB_iframe=true', false);
        i = "logo";
        return false;
    });
     // Add UPLOAD LOGO
    $('#upload_logo_button_icon').click(function() {
        tb_show('Upload a icon', 'media-upload.php?TB_iframe=true', false);
        i = "icon";
        return false;
    });
      // Add UPLOAD Splash
    $('#upload_logo_button_splash').click(function() {
        tb_show('Upload a splash', 'media-upload.php?TB_iframe=true', false);
        i = "splash";
        return false;
    });
	
	//Upload slideshow
	$('#upload_slideshow_one').click(function() {
        tb_show('Upload a slide', 'media-upload.php?TB_iframe=true', false);
        i = "slideone";
        return false;
    });
	
	$('#upload_slideshow_two').click(function() {
        tb_show('Upload a slide', 'media-upload.php?TB_iframe=true', false);
        i = "slidetwo";
        return false;
    });
	
	$('#upload_slideshow_three').click(function() {
        tb_show('Upload a slide', 'media-upload.php?TB_iframe=true', false);
        i = "slidethree";
        return false;
    });
	
	$('#upload_slideshow_four').click(function() {
        tb_show('Upload a slide', 'media-upload.php?TB_iframe=true', false);
        i = "slidefour";
        return false;
    });
	
	$('#upload_slideshow_five').click(function() {
        tb_show('Upload a slide', 'media-upload.php?TB_iframe=true', false);
        i = "slidefive";
        return false;
    });
	
	
	 $('#previewApp').click(function() {
        tb_show('Preview you app in  web browser', 'http://mobile-rockstar.com/app/demo.php?url=' + $( "#previewApp" ).data( "webid" ) + '&TB_iframe=true', false);
       i = "preview";
		 // #TB_window width: 440px;
		// $("#TB_window").width('440px');
        return false;
    });

	 $('#previewApp2').click(function() {
        tb_show('Preview you app in mobile web browser', '#TB_inline?inlineId=myPreview&height=400&width=400&modal=false');
        i = "preview";
		 // #TB_window width: 440px;
		 $("#TB_window").width('440px');
        return false;
    });


  	//Hide show page list	
  	$('#listStyle').click(function(){
    		$("#pageInfo").hide();
	});
	$('#pageStyle').click(function(){
    		$("#pageInfo").show();
	});
	//Bottom Bar Hide Show
	$('#bottomBarOff').click(function(){
    		$("#bottomInfo").hide();
	});
	$('#bottomBarOn').click(function(){
    		$("#bottomInfo").show();
	});
	//top Bar Hide Show
	$('#topBarOff').click(function(){
    		$("#topInfo").hide();
	});
	$('#topBarOn').click(function(){
    		$("#topInfo").show();
	});
	//side Bar Hide Show
	$('#sideBarOff').click(function(){
    		$("#sideInfo").hide();
	});
	$('#sideBarOn').click(function(){
    		$("#sideInfo").show();
	});
	$('#pushNoteSend').click(function(){
    		window.location.href = 'http://mobile-rockstar.com/app/pay.php?user=' + $('#user').val();
	});
	
	$('#goCommunity').click(function(){
    		window.location.href = 'http://community.mobile-rockstar.com/?user=' + $('#user').val();
	});
	
 $('#jqIcons').click(function() {
        tb_show('Icon list', 'https://api.jquerymobile.com/resources/icons-list.html?TB_iframe=true', false);
        i = "jquery icons";
        return false;
    });
	
		//After uploading call this script
  		window.send_to_editor = function(html) {
 			var image_url = $('img',html).attr('src');
 			// alert(image_url);
 			
 			if(i === "" || i === "logo"){ 
 			$('#logo_url').attr('src',image_url);
 			 $('#WordAppColor_logo').val(image_url);
 			 }
 			 else if( i == "splash"){ 
 			$('#splash_url').attr('src',image_url);
 			 $('#WordAppColor_splash').val(image_url);
 			 }
 			 else if(i == "icon"){ 
 			$('#icon_url').attr('src',image_url);
 			 $('#WordAppColor_icon').val(image_url);
 			 }
			else if(i == "slideone"){ 
 			$('#icon_urlss_one').attr('src',image_url);
 			 $('#WordApp_slideshow_1').val(image_url);
 			 }
			else if(i == "slidetwo"){ 
 			$('#icon_urlss_two').attr('src',image_url);
 			 $('#WordApp_slideshow_2').val(image_url);
 			 }
			else if(i == "slidethree"){ 
 			$('#icon_urlss_three').attr('src',image_url);
 			 $('#WordApp_slideshow_3').val(image_url);
 			 }
			else if(i == "slidefour"){ 
 			$('#icon_urlss_four').attr('src',image_url);
 			 $('#WordApp_slideshow_4').val(image_url);
 			 }
			else if(i == "slidefive"){ 
 			$('#icon_urlss_five').attr('src',image_url);
 			 $('#WordApp_slideshow_5').val(image_url);
 			 }
 			 
 			 
			tb_remove();
		} 
	
		$('#txtCount').simplyCountable({
		    counter: '#counter',
        countType: 'characters ',
        maxCount: 105,
        countDirection: 'down'
		  });
	
	 $("#sendPush").click( function(e)
           {
		  var apikey = $('#apiKey').val();
		  var apiLogin = $('#apiLogin').val();
         
		 var fullUrl = 'http://mobile-rockstar.com/app/pnSend.php?apiKey='+apikey+'&apiLogin='+apiLogin+'&message='+$('#txtCount').val();
		//alert(fullUrl);
		 if(apikey === '' || apiLogin === '' || $('#txtCount').val() ===''){
			 
			  alert("There seems to be a problem. Please check you API codes and try again.");
							 
		 }else{
		 $.ajax({
 		 			 type: 'GET',
				 	 url: fullUrl,
				 	 dataType: 'json',
				 	 success: function(jsonData) {
					 //alert(jsonData['pnTrue']);
						 if(jsonData.pnSent === 'true'){
							 alert("Your message was sent! Depending on the number of downloads, sending may take a few hours.");
							 
						 }else{
							 
							  alert("There seems to be a problem. Please check you API codes and try again.");
							 
						 }
  					},
  			error: function() {
   					 alert('Error loading - There seems to be a problem. Please check your internet connection.');
 					 }
				});
           }
	 });//End Send Push
	
	
	$("#submitPub").click( function(e)
           {
		
		 var user = $('#user').val();
		 var blogname = $('#blogname').val();
		 var name = $('#name').val();
		 var url = $('#url').val();
		
		 var fullUrl = 'http://mobile-rockstar.com/app/pubSend.php?blogname='+blogname+'&user='+user+'&url='+url+'&name='+name+'&message='+$('#txtCount').val();
		
		 $.ajax({
 		 			 type: 'GET',
				 	 url: fullUrl,
				 	 dataType: 'json',
				 	 success: function(jsonData) {
					 //alert(jsonData['pnTrue']);
						 if(jsonData.pubSent === 'true'){
							 alert("Your message was sent to our developers! Depending on the number of publish request, publishing may take up to 48 hours!\n\n\n  Please don't forget to support our team with our crowdfunding efforts :)");
							 window.location.href = 'admin.php?page=WordAppCrowd';
						 }else{
							 
							  alert("There seems to be a problem. Please check you API codes and try again.");
							 
						 }
  					},
  			error: function() {
   					 alert('Error loading - There seems to be a problem. Please check your internet connection.');
 					 }
				});
           
	 });//End Send Publication
	
	
	 $("#inviteFriends").click( function(e)
           {
		  var user = $('#user').val();
		  var blogname = $('#blogname').val();
		 	var name = $('#name').val();
		 var url = $('#url').val();
         
		 var fullUrl = 'http://mobile-rockstar.com/app/invite.php';
		//alert(fullUrl);
		 if(name === '' || user === '' || $('#emails').val() ===''){
			 
			  alert("There seems to be a problem. Both your name & your friends emails addresses are required.");
							 
		 }else{
		 $.ajax({
 		 			 type: 'POST',
				 	 url: fullUrl,
					 data: { 
       				 	'emails': $('#emails').val(), 
        				'name': name,
						 'user': user,
						 'blogname': blogname,
						 'url': url
							},
				 	 dataType: 'json',
				 	 success: function(jsonData) {
					 //alert(jsonData['pnTrue']);
						 if(jsonData.inviteSent === 'true'){
							 alert("THANK YOU!! Your message was sent! Your account will be updated in a few hours.");
							 
						 }else{
							 
							  alert("There seems to be a problem. Please check &  try again.");
							 
						 }
  					},
  			error: function() {
   					 alert('Error loading - There seems to be a problem. Please check your internet connection.');
 					 }
				});
           }
	 }); // END INVITE
});


