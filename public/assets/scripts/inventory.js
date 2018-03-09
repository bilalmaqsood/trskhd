if (typeof(TRSKD) === 'undefined') TRSKD = {};

TRSKD.inventory = {
    cacheDOMElements: function () {

        this.addButton = $('#add');
        this.inventoryWrapper = $(".inventory-wrapper");
        this.inventoryTemplate = Handlebars.compile($('#inventory-template').html());
        this.credit = 0.00;
        this.debit = 0.00;
        this.balance = 0.000;
    },

    bindElements: function () {
        this.inventoryWrapper.on('click', "#add", this.addinventoryRow);
        $(document).on('click', '.deleteRow', this.deleteinventory);
    },

    initialize: function () {
        this.cacheDOMElements();
        this.bindElements();

    },

    addinventoryRow: function (event) {
        event.preventDefault();
        var that = TRSKD.inventory;

        var index = $('.inventory-row:last').data("index") + 1;
        if (isNaN(index))
            index = 0;
        var template = that.inventoryTemplate;
        var html = template({index: index});
        $(".inventory-container").append(html);
        return false;
    },

    calculateBill: function (e) {
        var that = TRSKD.inventory;
        // alert("callled");
        that.credit = 0.00;
        that.debit = 0.00;
        that.balance = 0.000;

        $(".inventory-row").each(function (index, val) {
            var qty = parseFloat($(val).find(".qty").val());
            var unit_price = parseFloat($(val).find(".unit_price").val());
            var type = parseFloat($(val).find(".type").val());
            var amountEl = $(val).find(".total_amount");
            var balanceEl = $(val).find(".balance");
            var creditEl = $(val).find(".credit");
            var debitEl = $(val).find(".debit");

            var amount = parseFloat(qty) * parseFloat(unit_price);
            creditEl.val(0.00);
            debitEl.val(0.00);
            if (!isNaN(amount)) {
                //1 is debit
                if (type == 1) {
                    that.balance = that.balance + amount;
                    that.debit = that.debit + amount;
                    debitEl.val(amount);


                } else if (type == 2) { //2 is credit
                    that.credit = that.credit + amount;
                    that.balance = that.balance - amount;
                    creditEl.val(amount);

                }

                console.log(that.balance);
                console.log(balanceEl);

                amountEl.val(amount);
                balanceEl.val(that.balance);


                $("span.balance").text(that.balance);
                $("span.credit").text(that.credit);
                $("span.debit").text(that.debit);
            }
        });
    },

    deleteinventory: function (event) {
        event.preventDefault();
        var that = TRSKD.inventory;
        var index = $(this).data('index');
        $('.inventory-' + index).remove();
        that.calculateBill();
    },

}

$(document).ready(function () {
    TRSKD.inventory.initialize();
})