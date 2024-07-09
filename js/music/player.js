/**
 * author : İlker YILMAZ
 * url : https://github.com/kuantal/Multiple-circular-player
 * inspired by https://github.com/frumbert/circular-player
 */
(function (root, factory) {

    if (typeof define === 'function' && define.amd) {
        define(factory);
    } else if (typeof exports === 'object') {
        module.exports = factory;
    } else {
        root.lunar = factory();
    }
})(this, function () {

    'use strict';

    var lunar = {};

    lunar.hasClass = function (elem, name) {
        return new RegExp('(\\s|^)' + name + '(\\s|$)').test(elem.attr('class'));
    };

    lunar.addClass = function (elem, name) {
        !lunar.hasClass(elem, name) && elem.attr('class', (!!elem.getAttribute('class') ? elem.getAttribute('class') + ' ' : '') + name);
    };

    lunar.removeClass = function (elem, name) {
        var remove = elem.attr('class').replace(new RegExp('(\\s|^)' + name + '(\\s|$)', 'g'), '$2');
        lunar.hasClass(elem, name) && elem.attr('class', remove);
    };

    lunar.toggleClass = function (elem, name) {
        lunar[lunar.hasClass(elem, name) ? 'removeClass' : 'addClass'](elem, name);
    };

    lunar.className = function (elem, name) {
        elem.attr('class', name);
        console.log('className', elem);
    };

    return lunar;

});

(function ($) {

    var _ = {

        cursorPoint: function (evt, el) {
            _.settings.pt.x = evt.clientX;
            _.settings.pt.y = evt.clientY;
            var playObject  = el.find('svg').attr('id'); 
            playObject      = document.getElementById(playObject); 
            return _.settings.pt.matrixTransform(playObject.getScreenCTM().inverse());
        },

        angle: function (ex, ey) {
            var dy    = ey - 50; // 100;
            var dx    = ex - 50; // 100;
            var theta = Math.atan2(dy, dx); // range (-PI, PI]
            theta *= 180 / Math.PI; // rads to degs, range (-180, 180]
            theta     = theta + 90; // in our case we are animating from the top, so we offset by the rotation value;
            if (theta < 0) theta = 360 + theta; // range [0, 360)
            return theta;
        },

        setGraphValue: function (obj, val, el) {

            var audioObj = el.find(_.settings.audioObj),
                pc       = _.settings.pc,
                dash     = pc - parseFloat(((val / audioObj[0].duration) * pc), 10);

            $(obj).css('strokeDashoffset', dash);

            if (val === 0) {
                $(obj).addClass(obj, 'done');
                if (obj === $(_.settings.progress)) $(obj).attr('class', 'ended');
            }
        },

        reportPosition: function (el, audioId) {
            var progress = el.find(_.settings.progress),
                audio    = el.find(_.settings.audioObj);

            _.setGraphValue(progress, audioId.currentTime, el);
        },

        stopAllSounds: function () {

            document.addEventListener('play', function (e) {
                var audios = document.getElementsByTagName('audio');
                for (var i = 0, len = audios.length; i < len; i++) {
                    if (audios[i] != e.target) {
                        audios[i].pause();
                    }
                    if (audios[i] != e.target) $(audios[i]).parent('div').find('.playing').attr('class', 'paused');
                }
            }, true);
        },

        settings: {},

        /**
         * Main Function for plugin
         * @param options
         */
        init: function (options) {

            /**
             * Default Options
             */   
			 
            var svgId = $(this).find('svg').attr('id'); 
			
            svgId     = document.getElementById(svgId); 
			
            _.defaults = {
                this        : this, 
                thisSelector: this.selector.toString(),
                playObj     : 'playable',
                progress    : '.progress-bar',
                precache    : '.precache-bar',
                audioObj    : 'audio',
                controlsObj : '.controls',
                pt          : svgId.createSVGPoint(),
                pc          : 298.1371428256714 // 2 pi r                                
            }; 
            lunar = {}; 
            _.settings = $.extend({}, _.defaults, options);

            $(_.settings.controlsObj).on('click', function (e) {
                e.preventDefault();
                var el = $(e.currentTarget).closest($(_.settings.thisSelector)); 
                var obj = {
                    el         : el,
                    activeAudio: el.find(_.settings.audioObj),
                    playObj    : el.find('[data-play]'),
                    precache   : el.find(_.settings.precache),
					elementID :  el.find('[data-iv]')
                };
				
                obj.class = obj.playObj.attr('class');
				objID = obj.elementID.attr('data-iv');  
				
				var objectClass = $('#playable'+objID).attr('class');
				var theID = $('#playable'+objID).attr('id'); 
               switch (objectClass.replace('playable', '').trim()) {
                        
                    case 'not-started':
                        _.stopAllSounds();
                        obj.activeAudio[0].play(); 
						
                       var audioId = document.getElementById(obj.activeAudio.attr('id')); 
                        audioId.addEventListener('timeupdate', function (e) {
                            _.reportPosition(el, audioId)
                        });
                        obj.playObj.attr('class', 'playing');
                        break;
                    case 'playing':
                        obj.playObj.attr('class', 'playable paused');
                        obj.activeAudio[0].pause();
                        $(audioId).off('timeupdate');
						
                        break;
                    case 'paused':
                        obj.playObj.attr('class', 'playable playing');
                        obj.activeAudio[0].play();
                        break;
                    case 'ended':
                        obj.playObj.attr('class', 'not-started playable');
                        obj.activeAudio.off('timeupdate', _.reportPosition);
                        break;
                } 
				 
            });

            $(_.defaults.audioObj).on('progress', function (e) {
                if (this.buffered.length > 0) {
                    var end = this.buffered.end(this.buffered.length - 1);
                    var cache = $(e.currentTarget).parent().find(_.settings.precache),
                        el    = $(this).closest($(_.settings.thisSelector));
                    _.setGraphValue(cache, end, el);
                }
            });

        }

    };

    // Add Plugin to Jquery
    $.fn.mediaPlayer = function (methodOrOptions) {
        if (_[methodOrOptions]) {
            return _[methodOrOptions].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof methodOrOptions === 'object' || !methodOrOptions) {
            // Default to "init"
            return _.init.apply(this, arguments);
        } else {
            $.error('Method ' + methodOrOptions + ' does not exist on jQuery.mediaPlayer');
        }
    };
})(jQuery);