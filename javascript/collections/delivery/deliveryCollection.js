define([
  'jquery',
  'underscore',
  'backbone'
], function($, _, Backbone){
  var DeliveryCollections = Backbone.Collection.extend({
  
    //id :[1,2,3],
 initialize : function(models, options) {
  //$this.id = new Array();
  //this.getid();
 
 },


   url : function() {

   
        return 'http://localhost:8888/hotel_app/PHP/web_service/cartdetails_webservice.php?getid_qty='+Global.getCookie("order_list");
      
      },

getid_qty : function(){
var id_qty = Global.getCookie("order_list");
return id_qty


}

    });
  return DeliveryCollections;
});