const { default: Axios } = require("axios");

var app = new Vue({
    
    el: "#root",

    data: {
        pastries: [],
    },

    mounted() {
        axios.get("http://127.0.0.1:8000/api/backoffice-pastries")
        .then(result => {

            result.data.pastries.forEach(element => {

                // impostare le due cifre decimali nel prezzo
                element.price = element.price.toFixed(2);

                // impostare le due cifre decimali nel prezzo scontato (se esiste)
                if (element.discount_price) {
                    element.discount_price = element.discount_price.toFixed(2);
                }
            });

            this.pastries = result.data.pastries;

        });
    }

});