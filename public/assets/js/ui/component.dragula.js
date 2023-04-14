(function(jQuery) {
    "use strict";
    function t() {
        this.$body = jQuery("body")
    }
    t.prototype.init = function() {
        jQuery('[data-plugin="dragula"]').each(function() {
            var t = jQuery(this).data("containers"),
                a = [];
            if (t)
                for (var n = 0; n < t.length; n++)
                    a.push(jQuery("#" + t[n])[0]);
            else
                a = [jQuery(this)[0]];
            var i = jQuery(this).data("handleclass");
            i ? dragula(a, {
                moves: function(t, a, n) {
                    return n.classList.contains(i)
                }
            }) : dragula(a)
        })
    },
    jQuery.Dragula = new t,
    jQuery.Dragula.Constructor = t
}(jQuery),
function() {
    "use strict";
    window.jQuery.Dragula.init()
}());
