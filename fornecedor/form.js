new Vue({
    el: '#APP',
    data: {
        bancos: null
    },
    created: function () {
        var self = this;
        var url = baseUri + '/banco/lista_json/';
        setTimeout(function () {
            $.getJSON(url, {}, function (rs) {
                self.bancos = rs;
            });
        }, 500)
    }
});