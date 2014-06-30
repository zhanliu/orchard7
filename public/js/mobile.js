
/** ========================================================================================/
 * Misc Helpers
 */
function getTid() {
	var tid = $.cookie('tid');
	if (!tid) {
		tid = getURLParameter('tid');
	}
	if (!tid || tid.length == 0) {
		tid = 'mobile-web';
	}
	try {
	//console.log("Found tid value of: " + tid)
	//
	} catch(e){};
	return tid;
}

function track(action, pageVariation) {
	if (action !== undefined) {
		$.ajax({
			cache: false,
			async: false,
			url: '/action/track',
			data: {
				'tid': getTid(),
				'action': action,
				'lp': pageVariation
			}
		});
	}
}

function isIphoneOrIpod() {
	if ( navigator.userAgent.indexOf('iPhone') > -1 || navigator.userAgent.indexOf('iPod') > -1 ) {
		return true;
	}
	return false;
}

function isAndroid() {
	if ( navigator.userAgent.toLowerCase().indexOf('android') > -1 ) {
		return true;
	}
	return false;
}

function getURLParameter(name) {
	return decodeURI(
		(new RegExp('[?|&]'+name + '=' + '([^&].+?)(&|$)').exec(location.search)||[,''])[1]
	);
}

// ios app launcher
function launchApp(eventId) {
	// try to launch the app
	window.location = "zulily://?event="+eventId;

	// and check to see if we need to prompt for install
	var time = (new Date()).getTime();
	setTimeout(function(){
		var now = (new Date()).getTime();
		if ((now-time)<400) {
			if (confirm('You do not appear to have the zulily app installed, would you like to install it now?')) {
				track('User went to app store', 'iPhone');
				window.document.location = 'http://itunes.apple.com/us/app/zulily/id454607051?mt=8&uo=4';
			}
			else {
				track('User did not go to app store', 'iPhone');
			}
		}
	}, 300);
}

/**
 * Lazy image-loading
 * TODO -- Add some options (numbuckets, onload callback, onerror callback
 */
(function($) {

	var buckets = [[],[],[],[]];
	var index = 0;

	$.fn.lazyload1 = function() {

		var numBuckets = buckets.length;

		$(this).each(function(i, el) {
			index = (index + 1 < numBuckets) ? index + 1 : 0;
			buckets[index].unshift(el);
		});

		for (var i = 0; i < numBuckets; i++) {
			wake(buckets[i]);
		}

	};

	var wake = function(bucket) {
		try {
			var img = $(bucket.pop());
			if (!img) return;
			$('<img/>')
				.one('load', function() {
					img.attr('src', $(this).attr('src'))
						.addClass('loaded wasted');
					wake(bucket);
				})
				.one('error', function() {
					img.attr('src', 'https://a248.e.akamai.net/media.zulily.com/images/cache/event/200x200/placeholder.jpg')
						.addClass('loaded wasted');
					wake(bucket);
				})
				.attr('src', img.data('original'));
		}
		catch(e) {
			// Screw it -- load the next image anyway!
			wake(bucket);
		}
	};

}(jQuery));

/**
 * Self-contained modal
 */
(function($) {

	var modal = $('<div id="jquery-modal" class="close" style="position: absolute; top: 0; right: 0; left: 0; background: rgba(0,0,0,.7); z-index: 5;"></div>');
	var body = $('body');

	$.fn.modal = function(method) {
		switch (method) {
			case 'close':
				close();
				break;
			case 'empty':
				empty();
				break;
			case 'open':
			default:
				open(this);
				break;
		}
		return this;
	};

	function open(content) {
		modal.css('height', window.innerHeight)
			.append(content)
			.appendTo('body');
	}

	function close() {
		modal.detach();
	}

	function empty() {
		modal.empty();
	}

}(jQuery));

/**
 *  *  * Mobile Interstitial
 *   *   */
var zuInterstitial = {
    cookie_name: 'dismiss-interstitial',
    cookie_promo: 'bdaypromo',
    cookie_enforced:'enf',
    isCustomer: 'ma',
    isNewCustomer:'nc_24',
    android_device_key: "Android",
    iphone_device_key: "Iphone",
    tidWhitelist: ["pandoradisp","googmsrch", "googmdisp", "ydisp", "aolmobiledisplay", "aolmobileasl", "msdispl", "hipcrick"],
    markup :'<div id="interstitialWrapper">' +
                '<div id="toTheStore">&nbsp;</div>' +
                '<div id="remindLater" class="interstitialText">Remind me later</div>' +
                '<div id="haveit" class="interstitialText">I already have the app</div>' +
            '</div>',

    initInterstitial: function ()
    {
        if($.cookie(this.isCustomer) && !($.cookie(this.isNewCustomer)) && $.cookie(this.isLoggedIn) && window.location.pathname.indexOf( "tid=") < 0) {
            if ( !$.cookie(this.cookie_name) &&  !$.cookie(this.cookie_promo) && !this.blockInterstitial() && this.showInterstitial() ) {

                // part of MvTest::showAppInterstitial()
                if ( typeof window.showInterstitial == 'undefined' || window.showInterstitial == true ) {
                    if ( isAndroid() ) {
                        this.configureAndShowInterstitial(this.android_device_key);
                    }
                    else if ( isIphoneOrIpod() ) {
                        this.configureAndShowInterstitial(this.iphone_device_key);
                    }
                }
            }
        }
    },

    configureAndShowInterstitial: function ( anInterstitialType ) {
        if ( anInterstitialType == null ) return;

        $(this.markup).prependTo('body');

        $('html').addClass('interstitial');

        var d = new Date();
        d.setDate(d.getDate() + 3);

        if ( anInterstitialType == this.iphone_device_key ) {
            $('#interstitialWrapper').addClass( 'interstitialIphone' );
            $('#toTheStore').bind('click', function() {
                track( 'sent to store', this.iphone_device_key );
                zuInterstitial.pauseInterstitial('ss');
                zuInterstitial.dismiss(d, false);
                window.location = "http://itunes.apple.com/us/app/zulily/id454607051?mt=8&uo=4";
            });
        }
        else if ( anInterstitialType == this.android_device_key ) {
            $('#interstitialWrapper').addClass( 'interstitialAndroid' );
            $('#toTheStore').bind('click', function() {
                track( 'sent to store', this.android_device_key);
                zuInterstitial.pauseInterstitial('ss');
                zuInterstitial.dismiss(d, false);
                window.location = "http://market.android.com/details?id=com.zulily.android&referrer=" + getTid();
            });
        }

        $( '#interstitialWrapper #remindLater' ).bind('click', function(e) {
            e.stopPropagation();
            zuInterstitial.pauseInterstitial('rl');
            zuInterstitial.dismiss(d, true);
            track( 'remind later', anInterstitialType );
        });

        $( '#interstitialWrapper #haveit' ).bind('click', function(e) {
            e.stopPropagation();
            d.setFullYear(d.getFullYear() + 1);
            zuInterstitial.pauseInterstitial('hi');
            zuInterstitial.dismiss(d, true);
            track( 'have it', anInterstitialType );
        });
    },

    dismiss: function (ttl, shouldReload) {
        $.cookie(zuInterstitial.cookie_name, '1', { expires: ttl, path: '/' });

        if (shouldReload) {
            window.location.reload();
        }
    },

    showInterstitial: function(){
          if($.cookie(this.cookie_enforced) && $.cookie(this.cookie_enforced) > 3){
              return false;
          }
        return true;
    },

    pauseInterstitial:function (action) {
        if (!$.cookie(this.cookie_enforced)) {
            $.cookie(this.cookie_enforced, 0, {expires:30, path:'/'});
        }
        var val = $.cookie(this.cookie_enforced);
        if((val <= 4) && (action == 'rl')) {
            val++;
            $.cookie(this.cookie_enforced, val, {expires:30, path:'/'});
        }
        if(action != 'rl'){
            $.cookie(this.cookie_enforced, 5, {expires:30, path:'/'});
        }
    },

    blockInterstitial: function() {
        var tidPrefix = getTid().substr(0, getTid().indexOf('_'));
        if( zuInterstitial.tidWhitelist.indexOf( tidPrefix ) > -1 && window.location.pathname.indexOf( "/auth/") > -1 )
            return true;

        var theQuerystringCollection = zuMobile.parseQuery(window.location.href);
        var theEmailAddress = theQuerystringCollection['email'];

        if( theEmailAddress != null )
        {
            return true;
        }

        return false;
    }

}

//Show interstitial if needed
$(document).ready( function(){
    zuInterstitial.initInterstitial();
});


