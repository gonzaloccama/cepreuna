!function (r) {
    "use strict";
    var t = function () {
    };
    t.prototype.init = function () {
        r("#basic-colorpicker").colorpicker(), r("#hexa-colorpicker").colorpicker({format: "auto"}), r("#component-colorpicker").colorpicker({format: null}), r("#horizontal-colorpicker").colorpicker({horizontal: !0}), r("#inline-colorpicker").colorpicker({
            color: "#DD0F20",
            inline: !0,
            container: !0
        }), r(".clockpicker").clockpicker({donetext: "Done"}), r("#single-input").clockpicker({
            placement: "bottom",
            align: "left",
            autoclose: !0,
            default: "now"
        }), r("#check-minutes").click(function (t) {
            t.stopPropagation(), r("#single-input").clockpicker("show").clockpicker("toggleView", "minutes")
        });
        var n = {cancelClass: "btn-light", applyButtonClasses: "btn-success"};
        r('[data-toggle="date-picker"]').each(function (t, o) {
            var e = r.extend({}, n, r(o).data());
            r(o).daterangepicker(e)
        });
        var c = {
            startDate: moment().subtract(29, "days"),
            endDate: moment(),
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
            }
        };
        r('[data-toggle="date-picker-range"]').each(function (t, o) {
            var e = r.extend({}, c, r(o).data()), n = e.targetDisplay;
            r(o).daterangepicker(e, function (t, o) {
                n && r(n).html(t.format("MMMM D, YYYY") + " - " + o.format("MMMM D, YYYY"))
            })
        })
    }, r.FormPickers = new t, r.FormPickers.Constructor = t
}(window.jQuery), function (t) {
    "use strict";
    window.jQuery.FormPickers.init()
}();
