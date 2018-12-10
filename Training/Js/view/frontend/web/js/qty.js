define([
    'uiComponent',
    'jquery',
    'ko'
], function (Component, $, ko) {
    'use strict';

    return Component.extend({
        qtyProduct: ko.observable(''),
        isLoading: ko.observable(false),
        url: '',
        id: '',

        getQtyProduct: function () {
            this.isLoading(true);
            var self = this;
            $.ajax({
                url: self.url,
                type: 'POST',
                dataType: 'json',
                data: {"id_product":self.id}
            }).done(function (data) {
                var my_data = JSON.parse(data);
                if (my_data.qty) {
                    self.qtyProduct(my_data.qty);
                }
            }).always(function () {
                self.isLoading(false);
            });
        }
    });
});
