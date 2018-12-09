define([
    'uiComponent',
    'jquery',
    'ko'
], function (Component, $, ko) {
    'use strict';

    return Component.extend({
        reviewrName: ko.observable(''),
        reviewrMessage: ko.observable(''),
        isLoading: ko.observable(false),
        url: '',

        initialize: function () {
            this._super();
            this.nextReview();
            return this;
        },

        nextReview: function () {
            this.isLoading(true);
            var self = this;
            $.ajax({
                url: self.url,
                type: 'POST',
                dataType: 'json'
            }).done(function (data) {
                var my_data = JSON.parse(data);
                if (my_data.name && my_data.message) {
                    self.reviewrName(my_data.name);
                    self.reviewrMessage(my_data.message);
                }
            }).always(function () {
                self.isLoading(false);
            });
        }
    });
});
