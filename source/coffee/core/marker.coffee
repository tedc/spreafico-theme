class Marker
    @prototype = new google.maps.OverlayView()
    constructor : (bounds, map)->
        markerEl = document.createElement('div')
        markerEl.className = 'marker'
        html = '<i class="icon-marker"></i>'
        markerEl.innerHTML = html
        #compile(markerEl)(scope)
        self = @
        self._point = bounds
        self._map = map
        self._div = null
        self._markerEl = markerEl
        self.setMap map
    draw: ()->
        overlayProjection = @getProjection()
        pixelPoint = overlayProjection.fromLatLngToDivPixel(@_point)
        div = @_div
        div.style.left = ~~( ( pixelPoint.x )  )  + 'px'
        div.style.top = ~~( (pixelPoint.y ) ) + 'px'
        return
    onAdd : ()->
        @_div = @_markerEl
        panes = @getPanes()
        panes.floatPane.appendChild(@_div)
        return
    onRemove : ()->
        @div_.parentNode.removeChild(@_div)
        @div_ = null
        return
    updateBounds : (bounds)->
        @_point = bounds;
        @draw()
        return
module.exports = Marker