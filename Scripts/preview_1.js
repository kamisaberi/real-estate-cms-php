$(window).load(function() {
    function h() {
        $(".br-tt").remove();
        $("#br").bannerRotator("destroy");
        c.empty().html(k);
        var r = {effect: l.val(), easing: d.val(), cpanelAlign: q.val(), cpanelOutside: o.filter(":checked").val() == "outside", thumbnails: p.val(), navButtons: n.val(), tooltip: j.val(), playButton: f.prop("checked"), timer: a.val(), pauseOnHover: g.prop("checked"), cpanelOnHover: i.prop("checked"), navButtonsOnHover: m.prop("checked")};
        if (r.thumbnails === "text") {
            r.thumbWidth = 100;
            r.thumbHeight = 28
        } else {
            if (r.thumbnails === "image") {
                r.thumbWidth = 40;
                r.thumbHeight = 40
            } else {
                r.thumbWidth = 28;
                r.thumbHeight = 28
            }
        }
        $("#br").bannerRotator($.extend({}, e, r))
    }
    function b() {
        var r = ("small" !== n.val() && !f.prop("checked") && "none" === p.val());
        i.attr("disabled", "outside" === o.filter(":checked").val() || r);
        o.attr("disabled", r);
        q.attr("disabled", r)
    }
    var c = $(".main"), k = c.html(), l = $(":input[name='effect']"), d = $(":input[name='easing']"), q = $(":input[name='cpAlign']"), o = $(":input[name='cpPosition']"), p = $(":input[name='thumbnails']"), n = $(":input[name='navButtons']"), j = $(":input[name='tooltip']"), f = $(":input[name='displayPlayButton']"), a = $(":input[name='timer']"), g = $(":input[name='pauseOnHover']"), i = $(":input[name='cpOnHover']"), m = $(":input[name='navOnHover']");
    $(":button[name='submit']").click(h);
    $(":button[name='reset']").click(function() {
        l.val("random");
        d.val("swing");
        q.val("bottom");
        o.filter("[value='inside']").prop("checked", true);
        p.val("number");
        n.val("small");
        j.val("image");
        f.prop("checked", "checked");
        a.val("pie");
        g.prop("checked", "");
        i.prop("checked", "");
        m.prop("checked", "");
        $(":input").attr("disabled", false);
        m.attr("disabled", true);
        h()
    });
    l.change(function() {
        d.attr("disabled", "none" === $(this).val())
    });
    o.change(function() {
        i.attr("disabled", "outside" === $(this).filter(":checked").val())
    });
    p.change(function() {
        j.attr("disabled", "none" === $(this).val());
        b()
    });
    n.change(function() {
        m.attr("disabled", "large" !== $(this).val());
        b()
    });
    f.change(function() {
        b()
    });
    var e = {width: 1000, height: 325, borderWidth: 8, delay: 6000, effect: "random", tooltip: "image", blockCols: 10, blockRows: 4, verticalSlices: 14, horizontalSlices: 6, shuffle: true};
    $("#br").bannerRotator(e)
});