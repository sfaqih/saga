//!function(e,o,a,n){e.fn.DevGoogleMaps=function(){if(e.fn.gmap3){var a,n=e.now();return function(t,s,i,r){if(a)return a;var l=e.Deferred(),g=function(){l.resolve(o.google&&o.google.maps?o.google.maps:!1)},c="loadGoogleMaps_"+n++;return s=e.extend({sensor:r||"false"},s?{key:s}:{},i?{language:i}:{}),o.google&&o.google.maps?g():o.google&&o.google.load?o.google.load("maps",t||3,{other_params:e.param(s),callback:g}):(s=e.extend(s,{v:t||3,callback:c}),o[c]=function(){g(),setTimeout(function(){try{delete o[c]}catch(e){}},20)},e.ajax({dataType:"script",data:s,url:"//maps.googleapis.com/maps/api/js"})),a=l.promise()}().done(e.proxy(function(){this.each(function(){var a,n,t,s={},i=e(this).data(),r=[];for(t in i)switch(t){case"center":s[t]=i[t].split(",");break;case"parallaxmap":i[t]===!0&&(a=!0);break;case"mapTypeId":s[t]=o.google.maps.MapTypeId[i[t]];break;case"markers":r=e.map(i[t]||[],function(e){var o;return o="undefined"!=typeof e.bounced?"BOUNCE"==e.bounced?google.maps.Animation.BOUNCE:"DROP"==e.bounced?google.maps.Animation.DROP:!1:!1,{latLng:[e.lat,e.lng],data:e.data?e.data:!1,options:{animation:o!==!1?o:!1,icon:e.icon?new google.maps.MarkerImage(e.icon):new google.maps.MarkerImage("https://www.google.com/mapfiles/marker_black.png")}}});break;case"background":n=i[t];break;case"monochrome":i[t]&&(s.styles=[{stylers:[{saturation:i.saturation},{hue:i.background}]}]);break;default:s[t]=i[t]}e(this).gmap3({map:{options:s,events:{idle:function(){if(1==a){var o=e(this).gmap3("get"),n=$(o.getDiv()).offset();google.maps.event.clearListeners(o,"idle"),o.panBy(($(window).scrollLeft()-n.left)/4,($(window).scrollTop()-n.top)/4),google.maps.event.addDomListener(window,"scroll",function(){var e=$(window).scrollTop(),a=$(window).scrollLeft(),n=o.get("scroll");n&&o.panBy(-((n.x-a)/3),-((n.y-e)/3)),o.set("scroll",{x:a,y:e})})}}}},marker:{values:r,events:{click:function(o,a,n){var t=e(this).gmap3("get"),s=e(this).gmap3({get:{name:"infowindow"}});s?(s.open(t,o),s.setContent(n.data)):e(this).gmap3({infowindow:{anchor:o,options:{content:n.data}}})}}}})})},this)),this}}}(jQuery,window,document);

(function(e, t, n, r) {
    e.fn.DevGoogleMaps = function() {
        if (e.fn.gmap3) {
            var n = e.now(),
                r;
            (function(i, s, o, u) {
                if (r) return r;
                var a = e.Deferred(),
                    f = function() {
                        a.resolve(t.google && t.google.maps ? t.google.maps : !1)
                    },
                    l = "loadGoogleMaps_" + n++;
                s = e.extend({
                    sensor: u || "false"
                }, s ? {
                    key: s
                } : {}, o ? {
                    language: o
                } : {});
                t.google && t.google.maps ? f() : t.google && t.google.load ? t.google.load("maps", i || 3, {
                    other_params: e.param(s),
                    callback: f
                }) : (s = e.extend(s, {
                    v: i || 3,
                    callback: l
                }), t[l] = function() {
                    f();
                    setTimeout(function() {
                        try {
                            delete t[l]
                        } catch (e) {}
                    }, 20)
                }, e.ajax({
                    dataType: "script",
                    data: s,
                    url: "//maps.googleapis.com/maps/api/js"
                }));
                return r = a.promise()
            })().done(e.proxy(function() {
                this.each(function() {
                    var n = {},
                        p, r = e(this).data(),
                        i, s, o, u = [];
                    for (o in r) switch (o) {
                        case "center":
                            n[o] = r[o].split(",");
                            break;
                        case "parallaxmap":
                            if (r[o] === true) {
                                p = true;
                            }
                            break;
                        case "mapTypeId":
                            n[o] = t.google.maps.MapTypeId[r[o]];
                            break;
                        case "markers":
                            u = e.map(r[o] || [], function(e) {
                                var bounced;
                                if (typeof e.bounced !== "undefined") {
                                    if (e.bounced == 'BOUNCE') {
                                        bounced = google.maps.Animation.BOUNCE
                                    } else if (e.bounced == 'DROP') {
                                        bounced = google.maps.Animation.DROP
                                    } else {
                                        bounced = false;
                                    }
                                } else {
                                    bounced = false;
                                }
                                return {
                                    latLng: [e.lat, e.lng],
                                    data: (e.data ? e.data : false),
                                    options: {
                                        animation: (bounced !== false ? bounced : false),
                                        icon: (e.icon ? new google.maps.MarkerImage(e.icon) : new google.maps.MarkerImage("https://www.google.com/mapfiles/marker_black.png"))
                                    }
                                }
                            });
                            break;
                        case "background":
                            i = r[o];
                            break;

                        case "styles":

                            // Grey Style
                            if(r.styles === 'grey' && r.monochrome == false){
                                var stylemap = [
                                    {
                                        "featureType": "all",
                                        "elementType": "labels.text.fill",
                                        "stylers": [
                                            {
                                                "saturation": 36
                                            },
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 40
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "all",
                                        "elementType": "labels.text.stroke",
                                        "stylers": [
                                            {
                                                "visibility": "on"
                                            },
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 16
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "all",
                                        "elementType": "labels.icon",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "administrative",
                                        "elementType": "geometry.fill",
                                        "stylers": [
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 20
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "administrative",
                                        "elementType": "geometry.stroke",
                                        "stylers": [
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 17
                                            },
                                            {
                                                "weight": 1.2
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "landscape",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 20
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "poi",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 21
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.highway",
                                        "elementType": "geometry.fill",
                                        "stylers": [
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 17
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.highway",
                                        "elementType": "geometry.stroke",
                                        "stylers": [
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 29
                                            },
                                            {
                                                "weight": 0.2
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.arterial",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 18
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.local",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 16
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "transit",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 19
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "water",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#000000"
                                            },
                                            {
                                                "lightness": 17
                                            }
                                        ]
                                    }
                                ];

                                r[o] && (n.styles = stylemap);
                            }
                            // End Grey

                            break;
                        case "monochrome":
                            if(r.monochrome == true){
                                r[o] && (n.styles = [

                                    {stylers: [{
                                        saturation: r.saturation
                                    }, {
                                        hue: r.background
                                    }]}

                                ]);
                            }
                            break;
                        default:
                            n[o] = r[o]
                    }
                    e(this).gmap3({
                        map: {
                            options: n,
                            events: {
                                idle: function() {
                                    if (p == true) {
                                        var map = e(this).gmap3('get'),
                                            offset = $(map.getDiv()).offset();
                                        google.maps.event.clearListeners(map, 'idle');
                                        map.panBy((($(window).scrollLeft() - offset.left) / 4), (($(window).scrollTop() - offset.top) / 4));
                                        google.maps.event.addDomListener(window, 'scroll', function() {
                                            var scrollY = $(window).scrollTop(),
                                                scrollX = $(window).scrollLeft(),
                                                scroll = map.get('scroll');
                                            if (scroll) {
                                                map.panBy(-((scroll.x - scrollX) / 3), -((scroll.y - scrollY) / 3));
                                            }
                                            map.set('scroll', {
                                                x: scrollX,
                                                y: scrollY
                                            });
                                        });
                                    }
                                }
                            }
                        },
                        marker: {
                            values: u,
                            events: {
                                click: function(marker, event, context) {
                                    var map = e(this).gmap3("get"),
                                        infowindow = e(this).gmap3({
                                            get: {
                                                name: "infowindow"
                                            }
                                        });
                                    if (infowindow) {
                                        infowindow.open(map, marker);
                                        infowindow.setContent(context.data);
                                    } else {
                                        e(this).gmap3({
                                            infowindow: {
                                                anchor: marker,
                                                options: {
                                                    content: context.data,
                                                }
                                            }
                                        });
                                    }
                                }, 
                                // mouseover: function(marker, event, context) {
                                //     var map = e(this).gmap3("get"),
                                //         infowindow = e(this).gmap3({
                                //             get: {
                                //                 name: "infowindow"
                                //             }
                                //         });
                                //     if (infowindow) {
                                //         infowindow.open(map, marker);
                                //         infowindow.setContent(context.data);
                                //     } else {
                                //         e(this).gmap3({
                                //             infowindow: {
                                //                 anchor: marker,
                                //                 options: {
                                //                     content: context.data
                                //                 }
                                //             }
                                //         });
                                //     }
                                // },
                                // mouseout: function() {
                                //     var infowindow = e(this).gmap3({
                                //         get: {
                                //             name: "infowindow"
                                //         }
                                //     });
                                //     if (infowindow) {
                                //         infowindow.close();
                                //     }
                                // }
                            }
                        }
                    })
                })
            }, this));
            return this
        }
    }
})(jQuery, window, document);