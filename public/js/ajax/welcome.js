$(document).ready(function() {
    var unique_id = $.gritter.add({
        title: 'Welcome to Admin!',
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        image: '/assets/images/admin.jpg',
        sticky: false,
        time: 8000,
        class_name: 'my-sticky-class'
    });

    return false;
});

$(document).ready(function() {
    $("#date-popover").popover({
        html: true,
        trigger: "manual"
    });
    $("#date-popover").hide();
    $("#date-popover").click(function(e) {
        $(this).hide();
    });

    $("#my-calendar").zabuto_calendar({
        action: function() {
            return myDateFunction(this.id, false);
        },
        action_nav: function() {
            return myNavFunction(this.id);
        },
        ajax: {
            url: "show_data.php?action=1",
            modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
        },
            {
                type: "block",
                label: "Regular event",
            }
        ]
    });
});

function myNavFunction(id) {
    $("#date-popover").hide();
    var nav = $("#" + id).data("navigation");
    var to = $("#" + id).data("to");
    console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}
