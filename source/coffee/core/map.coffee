em = (val)->
    val / 16

mapInit = (id, coords, scope, compile)->
    style = [{"featureType": "administrative","elementType": "labels.text.fill","stylers": [{"color": "#444444"}]},{"featureType": "landscape","elementType": "all","stylers": [{"color": "#f2f2f2"}]},{"featureType": "poi","elementType": "all","stylers": [{"visibility": "off"}]},{"featureType": "road","elementType": "all","stylers": [{"saturation": -100},{"lightness": 45}]},{"featureType": "road","elementType": "geometry.stroke","stylers": [{"color": "#c2b59b"}]},{"featureType": "road.highway","elementType": "all","stylers": [{"visibility": "simplified"}]},{"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color": "#c2b59b"}]},{"featureType": "road.highway","elementType": "geometry.stroke","stylers": [{"color": "#c2b59b"}]},{"featureType": "road.arterial","elementType": "geometry.fill","stylers": [{"color": "#c2b59b"}]},{"featureType": "road.arterial","elementType": "geometry.stroke","stylers": [{"color": "#c2b59b"}]},{"featureType": "road.arterial","elementType": "labels.text.fill","stylers": [{"color": "#7b7b7b"}]},{"featureType": "road.arterial","elementType": "labels.icon","stylers": [{"visibility": "off"}]},{"featureType": "road.local","elementType": "geometry.fill","stylers": [{"color": "#beb8ac"}]},{"featureType": "road.local","elementType": "geometry.stroke","stylers": [{"visibility": "off"}]},{"featureType": "transit","elementType": "all","stylers": [{"visibility": "off"}]},{"featureType": "transit","elementType": "geometry.stroke","stylers": [{"color": "#c2b59b"}]},{"featureType": "water","elementType": "all","stylers": [{"color": "#46bcec"},{"visibility": "on"}]},{"featureType": "water","elementType": "geometry.fill","stylers": [{"color": "#070722"}]}]    
    ## MARKER
    marker = require './marker.coffee'
    
    ## CENTER
    
    bounds = new google.maps.LatLngBounds()
    for i in [0...coords.length]
        pos = new google.maps.LatLng(coords[i][0],coords[i][1])
        bounds.extend pos
    ## INIT
    
    opt = 
        zoom : 18
        center : bounds.getCenter()
        disableDefaultUI : on
        scrollwheel : off
        maxZoom : 20
        minZoom : 3
        mapTypeId : google.maps.MapTypeId.ROADMAP
        backgroundColor : '#c4c4c4'
        noClear : true
        disableDoubleClickZoom: on
        draggable : if isMobile then off else on
    scope.map = new google.maps.Map(id, opt)
    
    ## MARKERS

    overlay = []
    positions = []
    for i in [0...coords.length]
        pos = new google.maps.LatLng(coords[i][0],coords[i][1])
        overlay[i] = new marker pos, scope.map

    styleOptions =
        name: 'Spreafico'
    mapType = new google.maps.StyledMapType(style, styleOptions)
    scope.map.mapTypes.set('Spreafico', mapType)
    scope.map.setMapTypeId('Spreafico')
    google.maps.event.addDomListener(window, 'resize', ()->
        scope.map.setCenter(bounds.getCenter())
        for i in [0...coords.length]
            pos = new google.maps.LatLng(coords[i][0],coords[i][1])
            overlay[i].updateBounds(pos)
        return
    )
    return
module.exports = (id, lat, scope, compile)->
    mapInit(id, lat, scope, compile)