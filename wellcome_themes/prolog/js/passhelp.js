!(function(a) {
  a.fn.passwordRulesValidator = function(b) {
    function d(b, c, d, e) {
      b.test(c)
        ? a("#" + e + " li." + d)
            .removeClass("ko " + f.koClass)
            .addClass("ok " + f.okClass)
        : a("#" + e + " li." + d)
            .removeClass("ok " + f.okClass)
            .addClass("ko " + f.koClass);
    }
    function e(b, c, e) {
      a.each(f.rules, function(a, b) {
        b.enable && d(new RegExp(b.regex, "g"), c, b.name, e);
      });
    }
    var c = {
        rules: {
          length: {
            regex: ".{8,}",
            name: "length",
            message: "8 characters",
            enable: !0
          },
          lowercase: {
            regex: "[a-z]{1,}",
            name: "lowercase",
            message: "1 lowercase",
            enable: !0
          },
          uppercase: {
            regex: "[A-Z]{1,}",
            name: "uppercase",
            message: "1 uppercase",
            enable: !0
          },
          number: {
            regex: "[0-9]{1,}",
            name: "number",
            message: "1 digit",
            enable: !0
          },
          specialChar: {
            regex: "[^a-zA-Z0-9]{1,}",
            name: "special-char",
            message: "1 special character",
            enable: !0
          }
        },
        msgRules: "Your password must contain :",
        container: void 0,
        containerClass: null,
        containerId: "checkRulesList",
        okClass: null,
        koClass: null,
        onLoad: void 0
      },
      f = a.extend(!0, c, b);
    return this.each(function() {
      a.isFunction(f.onLoad) && f.onLoad(),
        (oRulesBuilder = '<span class="rules">' + f.msgRules + "</span>"),
        (oRulesBuilder += '<ul class="rules">'),
        a.each(f.rules, function(a, b) {
          b.enable &&
            (oRulesBuilder +=
              '<li class="ko ' +
              f.koClass +
              " " +
              b.name +
              '">' +
              b.message +
              "</li>");
        }),
        (oRulesBuilder += "</ul>"),
        "undefined" == typeof f.container
          ? (a(this).after(
              '<div class="rules-list hidden ' +
                f.containerClass +
                '" id="' +
                f.containerId +
                '"></div>'
            ),
            a(oRulesBuilder).appendTo("#" + f.containerId))
          : (f.container.addClass("rules-list"),
            a(oRulesBuilder).appendTo(f.container));
      var b =
        "undefined" == typeof f.container
          ? f.containerId
          : f.container.attr("id");
      e(f, a(this).val(), b),
        a(this).keyup(function() {
          e(f, a(this).val(), b);
        }),
        a(this).on("paste", function() {
          e(f, a(this).val(), b);
        }),
        a(this).change(function() {
          e(f, a(this).val(), b);
        });
    });
  };
})(jQuery);
