$(document).ready(function () {
    // $(".main-form").keyup(() => {
    //     console.log($(this).val());
    // })
    $(".main-form").on('keyup', function () {
        $(this).removeClass('is-invalid')
    })
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    setProgressBar(current);
    $(".next").click(function () {
        // var validation = [];
        var next = [];
        var dataForm = $(".main-form");
        for (let i = 0; i < dataForm.prevObject[0].forms.msform.length; i++) {
            const e = dataForm?.prevObject[0]?.forms?.msform[i];
            var tagname = e.id
            var data = dataForm?.prevObject[0]?.all[tagname]?.value
            if (data !== undefined && data === '') {
                next.push(tagname);
            }
        }
        if (next.length <= 0) {
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(++current);
        } else {
            next.forEach(e => {
                $("#" + e + "").addClass('is-invalid')
            });
            alert('data masih kosong pada field\n' + next)
        }
    });
    $(".previous").click(function () {
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
    });
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }
    $(".submit").click(function () {
        return false;
    })
});