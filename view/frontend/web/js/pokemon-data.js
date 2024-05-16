/**
 * file: pokemon-data.js
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

define([
    'jquery',
    'uiComponent',
    'ko'
], function ($, Component, ko) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Szybo_Pokemon/pokemon-data',
            pokemonName: '',
            pokemonAttributes: '',
        },

        initialize: function () {

            this._super();
            this.pokemonAttributes = ko.observable('');
            this.loadData();

        },

        loadData: function () {
            var self = this;
            $.ajax({
                url: '/pokemon/pokemon/data/id/' + this.pokemonName, // Replace this with the actual URL of your controller
                type: 'GET',
                dataType: 'html',
                success: function (response) {
                    self.pokemonAttributes(response);
                },
                error: function () {
                }
            });
        },

        objectToArray: function (data) {
            var entries = Object.entries(data);
            var mappedData = [];

            mappedData = entries.map(function (entry) {
                return {
                    key: entry[0],
                    value: entry[1]
                };
            });

            console.log(mappedData);

            return mappedData;
        }
    });
});
