define([
'jquery',
  'underscore',
  'backbone',
  'text!../../templates/delivery/deliveryTemplate.html',
  'collections/delivery/deliveryCollection'
 ],function($,_,Backbone,Deliverytemplate,DeliveryCollections){

//homeTemplate = _.template( $("#home-content").html());

var DeliveryView = Backbone.View.extend({
  el: $("#content"),
	render : function(){

    $('.menu li').removeClass('active');
      $("#menu").parent().addClass('active');
     //this.$el.html(Deliverytemplate);
var onDataHandler = function(collection,response) {
 // var data = collection.models;
 //alert("ONDATA HANDLER Response"+response);
  var delivery_data = response;


      var Deliverycompiledtemplate = _.template(Deliverytemplate,{
          deliveryitem: delivery_data
         });
     $("#content").html(Deliverycompiledtemplate);

      }

      
  var deliveryCollection = new DeliveryCollections();
   deliveryCollection.fetch({ success : onDataHandler, dataType: "json" });
}

});

 return DeliveryView;
});