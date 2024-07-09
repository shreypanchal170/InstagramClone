// JavaScript Document
$(document).ready(function() {
  $("#reg_password").passwordRulesValidator();
  // Check Typeing STARTED
  $(".form-control").bind("keyup", function() {
    var count = $(this).val().length;
    if (count > 0) {
      $(".rules-list")
        .removeClass("hidden")
        .addClass("opened");
    } else {
      $(".rules-list")
        .addClass("hidden")
        .removeClass("opened");
    }
  });
  // Check Typing FINISHED
  $("body").on("click", ".popif", function() {
    if ($(".wmBox_overlay").hasClass("opened")) {
      $(".wmBox_overlay").removeClass("opened");
      stopPlay();
    } else {
      $(".wmBox_overlay").addClass("opened");
    }
  });
  //Open Register Arae  STARTED
  $("body").on("click", ".opcl", function() {
    var container = $(".full");
    if ($(container).hasClass("moveFull")) {
      $(".registerBg").addClass("remregBg");
      setTimeout(function() {
        $(".registerBg").removeClass("showregBg");
      }, 1000);
      $(container)
        .removeClass("moveFull")
        .addClass("displayFull");
    } else {
      $(".registerBg")
        .addClass("showregBg")
        .removeClass("remregBg");
      $(container)
        .addClass("moveFull")
        .removeClass("displayFull");
    }
  });
  // Open Register Area FINISHED
  //Open Login Arae  STARTED
  $("body").on("click", ".oplf", function() {
    var container = $(".full");
    if ($(container).hasClass("moveFull")) {
      $(".loginBg").addClass("remregBg");
      setTimeout(function() {
        $(".loginBg").removeClass("showregBg");
      }, 1000);
      $(container)
        .removeClass("moveFull")
        .addClass("displayFull");
    } else {
      $(".loginBg")
        .addClass("showregBg")
        .removeClass("remregBg");
      $(container)
        .addClass("moveFull")
        .removeClass("displayFull");
    }
  });
  // Open Login Area FINISHED
  function stopPlay() {
    var iframe = document.getElementById("playerID");
    iframe.src = iframe.src;
  }
  // Add Randomize Class STARTED
  setRandomClass();
  setInterval(function() {
    setRandomClass();
  }, 2000);

  function setRandomClass() {
    var ul = $(".oobenn-features-list");
    var items = ul.find(".oobenn-feature-box");
    var number = items.length;
    var random = Math.floor(Math.random() * number);
    items.removeClass("special");
    items.eq(random).addClass("special");
  }
  // Add Randomize Class FINISHED
  //Click To Show Feature Details
  $("body").on("click", ".oobenn-feature-box", function() {
    var favatar = $(this).attr("data-avatar");
    var ftitle = $(this).attr("data-titl");
    var fdescription = $(this).attr("data-description");
    $("body").append(
      '<div class="featureDetailsContainer"> <div class="featureDetailsWrapper"> <div class="featureDetails"> <div class="featureAvatar oobenn-feature-' +
        favatar +
        '"></div><div class="e-modal"> <div class="closefPop"></div> <div class="featureTitle">' +
        ftitle +
        '</div><div class="featureDescription">' +
        fdescription +
        "</div></div></div></div></div>"
    );
  });
  // Close Feature Details PopUp
  $("body").on("click", ".closefPop", function() {
    $(".featureDetailsContainer").remove();
  });
  //Canvas STARTED
  var Canvas = document.getElementById("canvas");
  var ctx = Canvas.getContext("2d");

  var resize = function() {
    Canvas.width = Canvas.clientWidth;
    Canvas.height = Canvas.clientHeight;
  };
  window.addEventListener("resize", resize);
  resize();

  var elements = [];
  var presets = {};

  presets.o = function(x, y, s, dx, dy) {
    return {
      x: x,
      y: y,
      r: 12 * s,
      w: 5 * s,
      dx: dx,
      dy: dy,
      draw: function(ctx, t) {
        this.x += this.dx;
        this.y += this.dy;

        ctx.beginPath();
        ctx.arc(
          this.x + +Math.sin((50 + x + t / 10) / 100) * 3,
          this.y + +Math.sin((45 + x + t / 10) / 100) * 4,
          this.r,
          0,
          2 * Math.PI,
          false
        );
        ctx.lineWidth = this.w;
        ctx.strokeStyle = "#33c5b1";
        ctx.stroke();
      }
    };
  };

  presets.x = function(x, y, s, dx, dy, dr, r) {
    r = r || 0;
    return {
      x: x,
      y: y,
      s: 20 * s,
      w: 5 * s,
      r: r,
      dx: dx,
      dy: dy,
      dr: dr,
      draw: function(ctx, t) {
        this.x += this.dx;
        this.y += this.dy;
        this.r += this.dr;

        var _this = this;
        var line = function(x, y, tx, ty, c, o) {
          o = o || 0;
          ctx.beginPath();
          ctx.moveTo(-o + _this.s / 2 * x, o + _this.s / 2 * y);
          ctx.lineTo(-o + _this.s / 2 * tx, o + _this.s / 2 * ty);
          ctx.lineWidth = _this.w;
          ctx.strokeStyle = c;
          ctx.stroke();
        };

        ctx.save();

        ctx.translate(
          this.x + Math.sin((x + t / 10) / 100) * 5,
          this.y + Math.sin((10 + x + t / 10) / 100) * 2
        );
        ctx.rotate(this.r * Math.PI / 180);

        line(-1, -1, 1, 1, "#33c5b1");
        line(1, -1, -1, 1, "#33c5b1");

        ctx.restore();
      }
    };
  };

  for (var x = 0; x < Canvas.width; x++) {
    for (var y = 0; y < Canvas.height; y++) {
      if (Math.round(Math.random() * 19000) == 1) {
        var s = (Math.random() * 5 + 1) / 10;
        if (Math.round(Math.random()) == 1)
          elements.push(presets.o(x, y, s, 0, 0));
        else
          elements.push(
            presets.x(
              x,
              y,
              s,
              0,
              0,
              (Math.random() * 3 - 1) / 10,
              Math.random() * 360
            )
          );
      }
    }
  }

  setInterval(function() {
    ctx.clearRect(0, 0, Canvas.width, Canvas.height);

    var time = new Date().getTime();
    for (var e in elements) elements[e].draw(ctx, time);
  }, 10);
  //Canvas FINISHED
});
