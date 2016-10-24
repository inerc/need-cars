var timerid=[];
function photos(ind) {
	var count_img=jQuery('.slider').eq(ind).find('.img').length-1;
	show_now=jQuery('.slider').eq(ind).attr('show_now');
	if(show_now==0){
		jQuery('.slider').eq(ind).find('.img:eq(0)').fadeIn("slow",function(index) {
			jQuery('.slider').eq(ind).find('.img:gt(0)').css('display','block');
		});
	}else{
		jQuery('.slider').eq(ind).find('.img:eq('+(show_now-1)+')').fadeOut("slow");
	}
	show_now++;
	if(show_now>count_img) {
		show_now=0;
	}
	jQuery('.slider').eq(ind).attr('show_now',show_now);
	timerid[ind]=setTimeout("photos("+ind+")", 6000);
}
function infos(ind) {
	var count_img=jQuery('.slider').eq(ind).find('.img').length-1;
	show_now=jQuery('.slider').eq(ind).attr('show_now');
	jQuery('.slider').eq(ind).find('.img').fadeOut("slow");
	jQuery('.slider').eq(ind).find('.img:eq('+show_now+')').fadeIn("slow");
	show_now++;
	if(show_now>count_img) {
		show_now=0;
	}
	jQuery('.slider').eq(ind).attr('show_now',show_now);
	timerid[ind]=setTimeout("infos("+ind+")", 4000);
}

jQuery(document).ready(function(){
	
	jQuery('.slider').each(function(index) {
		var slen=jQuery(this).find('.img').length;
		jQuery(this).attr('show_now',1);
		jQuery(this).find('.img').each(function(index) {
			jQuery(this).css('z-index',slen+1-index);
		});
		if(jQuery(this).hasClass('info'))
			timerid[index]=setTimeout("infos("+index+")", 4000);
		else
			timerid[index]=setTimeout("photos("+index+")", 4000);
	});
	
	jQuery(".left_menu a.list").click(function() {
		if(jQuery(this).hasClass('open'))
		{
			jQuery(this).parent().find("ul").slideUp('slow');
			jQuery(this).removeClass('open');
		}else{
			jQuery(this).parent().find("ul").slideDown('slow');
			jQuery(this).addClass('open');
		}
		return false;
	});
	jQuery(".wrap .arrow").click(function() {
		jQuery(this).parents('.wrap').toggleClass('active-menu');
		return false;
	});

});