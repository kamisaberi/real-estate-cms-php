$(document).ready(
	function () {
	    var $panel = $(".slide");
	    var $container = $panel.find(".container");
	    var $infoSec = $panel.find(".info-section");

	    $container.wtRotator({
	        width: 960,
	        height: 300,
	        thumb_width: 25,
	        thumb_height: 25,
	        button_width: 25,
	        button_height: 25,
	        button_margin: 5,
	        auto_start: true,
	        delay: 6000,
	        transition: "fade",
	        transition_speed: 800,
	        block_size: 60,
	        vert_size: 60,
	        horz_size: 60,
	        cpanel_align: "BL",
	        timer_align: "top",
	        display_thumbs: true,
	        display_dbuttons: false,
	        display_playbutton: false,
	        display_thumbimg: false,
	        display_side_buttons: false,
	        tooltip_type: "none",
	        display_numbers: true,
	        display_timer: true,
	        mouseover_select: false,
	        mouseover_pause: false,
	        cpanel_mouseover: false,
	        text_mouseover: false,
	        text_effect: "right",
	        text_sync: true,
	        shuffle: false,
	        block_delay: 25,
	        vstripe_delay: 73,
	        hstripe_delay: 183
	    });

	    //		var $submitButton = $("#submit-btn");
	    //		var $resetButton =  $("#reset-btn");
	    //		var $trans = 		$("#transitions");
	    //		var $easings =		$("#easing");
	    //		var $textEffects = 	$("#texteffects");
	    //		var $cpAlign = 		$("#cpalignments");
	    //		var $cpPos = 		$("input[name='cp-pos']");
	    //		var $cpanelCB = 	$("#cpanel-cb");
	    //		var $ttType = 		$("#tt-type");
	    //		var $thumbCB = 		$("#thumbs-cb");
	    //		var $dBtnsCB = 		$("#dbuttons-cb");
	    //		var $playBtnCB = 	$("#playbutton-cb");
	    //		var $timerCB = 		$("#timer-cb");
	    //		var $thumbImgCB =	$("#img-cb");
	    //		var $sideBtnsCB =	$("#sidebtns-cb");		
	    //		var $pauseCB = 		$("#pause-cb");
	    //		var $textCB = 		$("#text-cb");
	    //		
	    //		var $mouseCpLabel = $("label#mouse-cp-label");
	    //		var $thumbImgLabel = $("label#thumb-img-label");
	    //		var $insideLabel = $("label#inside-label");
	    //		var $outsideLabel = $("label#outside-label");
	    //		
	    //		$trans.change(
	    //			function() {		
	    //				$easings.attr("disabled", $(this).val() == "none"); 
	    //			}
	    //		);
	    //		
	    //		$cpPos.change(
	    //			function() {
	    //				var disable = $(this).filter(":checked").val() == "outside";
	    //				$cpanelCB.attr("disabled", disable);
	    //				$mouseCpLabel.toggleClass("disable", disable);
	    //			}
	    //		);
	    //		
	    //		$thumbCB.change(
	    //			function() {
	    //				var disable = !$(this).prop("checked");
	    //				$ttType.attr("disabled", disable); 
	    //				$thumbImgCB.attr("disabled", disable);
	    //				$thumbImgLabel.toggleClass("disable", disable);
	    //				checkCPanel();	
	    //			}
	    //		);
	    //		
	    //		$dBtnsCB.change(
	    //			function() { 
	    //				if ($(this).prop("checked")) {
	    //					$sideBtnsCB.prop("checked", "");
	    //				}
	    //				checkCPanel(); 
	    //			}
	    //		);
	    //		
	    //		$sideBtnsCB.change(
	    //			function() { 
	    //				if ($(this).prop("checked")) {
	    //					$dBtnsCB.prop("checked", "");
	    //				}
	    //				checkCPanel();
	    //			}
	    //		);
	    //		
	    //		$playBtnCB.change(function() { checkCPanel(); });			

	    var init = function () {
	        $trans.val("random");
	        $easings.val("").attr("disabled", false);
	        $textEffects.val("fade");
	        $cpAlign.val("BR").attr("disabled", false);
	        $cpPos.attr("disabled", false);
	        $("input#pos-inside").prop("checked", true);
	        $ttType.val("image").attr("disabled", false);
	        $thumbCB.prop("checked", "checked");
	        $dBtnsCB.prop("checked", "checked");
	        $playBtnCB.prop("checked", "checked");
	        $timerCB.prop("checked", "checked");
	        $thumbImgCB.prop("checked", "").attr("disabled", false);
	        $sideBtnsCB.prop("checked", "");
	        $pauseCB.prop("checked", "");
	        $textCB.prop("checked", "");
	        $cpanelCB.prop("checked", "").attr("disabled", false);

	        $mouseCpLabel.removeClass("disable");
	        $thumbImgLabel.removeClass("disable");
	        $insideLabel.removeClass("disable");
	        $outsideLabel.removeClass("disable");
	    }

	    var checkCPanel = function () {
	        var disable = !($thumbCB.prop("checked") || $dBtnsCB.prop("checked") || $playBtnCB.prop("checked"));
	        var disable2 = (disable || $cpPos.filter(":checked").val() == "outside") && !$sideBtnsCB.prop("checked");
	        $cpanelCB.attr("disabled", disable2);
	        $cpPos.attr("disabled", disable);
	        $cpAlign.attr("disabled", disable);

	        $mouseCpLabel.toggleClass("disable", disable2);
	        $insideLabel.toggleClass("disable", disable);
	        $outsideLabel.toggleClass("disable", disable);
	    }

	    init();
	}
);