module.exports = ()->
    serializeData = (data)->
        if not require('angular').isObject data
            string = if not data? then "" else data.toString()
            return string
        buffer = []
        for k, v of data
            if require('angular').isObject v
                values = []
                for key, value of v
                    values.push "#{encodeURIComponent( if not value? then '' else value )}"
                v = values.join( ", " ).replace( /%20/g, " " )
            if not data.hasOwnProperty k
                continue
            buffer.push "#{encodeURIComponent( k )}=#{encodeURIComponent( if not v? then '' else v )}"
        source = buffer.join( "&" ).replace( /%20/g, "+" )
        return source
    transformRequest = (data, getHeaders)->
        headers = getHeaders()
        headers[ "Content-type" ] = "application/x-www-form-urlencoded; charset=utf-8";
        serializeData data