if(typeof(TRSKD) === 'undefined') TRSKD = {};

TRSKD.inventory = {
  cacheDOMElements: function() {

    this.addButton = $('#add');
    this.inventoryWrapper = $(".inventory-wrapper");
    this.inventoryTemplate = Handlebars.compile($('#inventory-template').html());

  },

  bindElements: function() {
      this.inventoryWrapper.on('click',"#add",this.addinventoryRow);
      $(document).on('click', '.delete-inventory', this.deleteinventory);
},

  initialize: function() {
    this.cacheDOMElements();
    this.bindElements();
    
  },

    addinventoryRow: function(event) {
    event.preventDefault();
    var that = TRSKD.inventory;

    var index = $('.inventory-row:last').data("index")+1;
    var template = that.inventoryTemplate;
    var html = template({index: index});
    $(".inventory-container").append(html);
    return false;
  },

    addUserinventory: function(event) {
        event.preventDefault();
        var that = TRSKD.inventory;

        var index = $('.inventory-row:last').data("index")+1;
        if(isNaN(index))
            index = 0;
        var template = that.inventoryTemplate;
        var html = template({index: index});
        console.log(html);
        $(".inventorycontainder").append(html);
        $('.cp2').colorpicker();
        return false;
    },

  deleteinventory: function(event) {
    event.preventDefault();
      var that = TRSKD.inventory;
      var index = $(this).data('index');
      $('.inventory-' + index).remove();
  },

}

$(document).ready(function() {
  TRSKD.inventory.initialize();
})