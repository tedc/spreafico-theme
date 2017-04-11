module.exports = ->
    instagram =
        controller : [ '$scope', 'InstagramPosts', "$attrs", ($scope, InstagramPosts, $attrs)->
            $scope.follow = $attrs.followText
            $scope.resize = (url)->
                return url.replace('150x150/', '640x640/')
            InstagramPosts.get (res)->
                $scope.items = res.data
                $scope.username = res.data[0].user.username
                return
            $scope.scrollmagic = (i)->
                y = if i%2 is 0 then 40 else -40
                {"tween":[{"y":y},{"y":+y*-1}],"triggerElement":".instagram","duration":"150vh","triggerHook":1}
            return
        
        ]
        templateUrl: (element, attr)->
            return "#{assets}/tpl/instagram.tpl.html"