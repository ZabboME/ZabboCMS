jQuery(function($) {
$.getScript('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', function () {
	
	var status = 0;
    $(".mailContent").each(function () {
        $(this).hide();
    });
    $('.inbox').show().addClass('selected');
    $('.sendMail').css('display', 'none');

    $('#inbox').click(function () {
		status = 0;
		$('.compose b').text('Compose');
        $('.mailContent').each(function () {
            $(this).hide();
        });
		$('.box-tabs li').each(function() {
			$(this).removeClass('selected');
		});
        $('.inbox').show();
		$(this).addClass('selected');
        $('.sendMail').css('display', 'none');
    });

    $('#trash').click(function () {
		status = 0;
		$('.compose b').text('Compose');
        $('.mailContent').each(function () {
            $(this).hide();
        });
		$('.box-tabs li').each(function() {
			$(this).removeClass('selected');
		});
        $('.trash').show();
		$(this).addClass('selected');
        $('.sendMail').css('display', 'none');
    });
    $('#sent').click(function () {
		status = 0;
		$('.compose b').text('Compose');
        $('.mailContent').each(function () {
            $(this).hide();
        });
		$('.box-tabs li').each(function() {
			$(this).removeClass('selected');
		});
        $('.sent').show();
		$(this).addClass('selected');
        $('.sendMail').css('display', 'none');
    });

    $('.compose').click(function () {
        $('.mailContent').each(function () {
            $(this).hide();
        });
		$('.box-tabs li').each(function() {
			$(this).removeClass('selected');
		});
		if(status == 0) {
			status = 1;
			$('.compose b').text('Cancel');
			$('.send').show().addClass('selected');
			$('.sendMail').css('display', 'block');
		} else {
			status = 0;
			$('.compose b').text('Compose');
			$('.send').hide().removeClass('selected');
			$('.inbox').show().addClass('selected');
			$('.sendMail').css('display', 'none');
		}
    });

    $('#staff').click(function() {
        status = 0;
        $('.compose b').text('Compose');
        $('.mailContent').each(function () {
            $(this).hide();
        });
        $('.box-tabs li').each(function() {
            $(this).removeClass('selected');
        });
        $('.staff').show();
        $(this).addClass('selected');
        $('.sendMail').css('display', 'none');
    });

    $('.mailText').click(function(event) {
        var target = $(event.target);
        if (!target.is('.delete') && !target.is('.report')) {
            $(this).children().toggleClass('open');
            $(this).children().children().toggleClass('open');
        }
    });

    $('.inbox .mailBox .mailText').click(function(event) { // markasread
        var target = $(event.target);
        if (!target.is('.delete') && !target.is('.report')) {
            var mailID = $(this).attr('id');
            var current = $(this);
            // var mailID = $(this).closes('.mailBox');
            $.post("app/tpl/skins/Habbo/scripts/mail/markAsRead.php", {id: mailID}, function() {
                current.removeClass('newMail');
                if(current.parent().parent().attr('id') == 'allMail')
                    $('.inbox #unreadMail .' + mailID).remove();
                else {
                    $('.inbox #allMail .' + mailID + ' .mailText').removeClass('newMail');
                }
            });
        }
    });

    $('#newonly').change(function() {
        if($(this).is(':checked')) {
            $('#allMail').css('display', 'none');
            $('#unreadMail').css('display', 'block');
        } else {
            $('#allMail').css('display', 'block');
            $('#unreadMail').css('display', 'none');
        }
    });

    $('.reply').click(function() {
        var title = $(this).parent().find('.mailTitle').text();
        title = title.replace('Title: ', '');
        title = title.replace('Re: ', '');
        title = "Re: " + title;

        var sender = $(this).parent().find('.mailName').text();
        sender = sender.replace('From: ', '');

        $('#recieverName').val(sender);
        $('#sendMsgSubjects').val(title);
        $('.compose').trigger('click');
    });

    $('.report').click(function() {
        var reportID = $(this).attr('id');
        var current = $(this);
        $.post("app/tpl/skins/Habbo/scripts/mail/report.php", {id: reportID, type: 'report'}, function(data) {
            if(!current.parent().hasClass('reported')) {
               // var oldText = current.parent().find('.mailTitle').text();
               // current.parent().find('.mailTitle').html(
               //     oldText + ' <span style="position: absolute; top: 10px; left: 150px;"">Status: --Reported--</span>'
               // );
            }
            current.parent().addClass('reported');
            var id = current.parent().attr('id');
            $('.inbox #unreadMail .' + id + ' .mailText').addClass('reported');
            $('.inbox #unreadMail .' + id + ' .mailText .reportedText').css('opacity', '1');
            $('.inbox #allMail .' + id + ' .mailText').addClass('reported');
            $('.inbox #allMail .' + id + ' .mailText .reportedText').css('opacity', '1');
        })
    });

    $('.staff .mailBox .mailText').click(function() {
        var reportID = $(this).attr('id');
        var current = $(this);
        $.post("app/tpl/skins/Habbo/scripts/mail/report.php", {id: reportID, type: 'checked'}, function(data) {
            current.removeClass('reported');
        });
    });
});
});