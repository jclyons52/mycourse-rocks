export default {

    data: {
        zoom: 4
    },
    methods: {
        changeZoom: function(){
            that = this;
            $('iframe').each(function(){
                var height = that.zoom * 315/3;
                var width = that.zoom * 560/3;
                $(this).css('height', height);
                $(this).css('width',width);
            });
        }
    }

}