
//from https://stackoverflow.com/questions/43891036/extract-video-id-from-youtube-url
function getYTid(url) {
    let id = url.substring(url.lastIndexOf("v=")+2,url.length);
    return id;
}

//when user press ENTER
$('input').keyup(function(e){
    if(e.keyCode == 13)
    {
		let written_text = $('input').val();

		//test if link is youtube video
		if (/(youtu\.be\/|youtube\.com\/(watch\?(.*&)?v=|(embed|v)\/))([^\?&"'>]+)/.test(written_text)) {
			let video_id = getYTid(written_text);
            window.location.href = 'result.php?id=' + video_id;
		}
		else {
			alert("This is not a Youtube Video URL! Please Check your URL");
		}
            
    }
});


$('button').click(function() {
    
    let written_text = $('input').val();
			if (/(youtu\.be\/|youtube\.com\/(watch\?(.*&)?v=|(embed|v)\/))([^\?&"'>]+)/.test(written_text)) 
				{
					    let video_id = getYTid(written_text);
						window.location.href = 'result.php?id=' + video_id;

				}
				
				else {
								alert("This is not a Youtube Video URL! Please Check your URL");

				}
});