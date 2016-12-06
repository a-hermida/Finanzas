$(function(){
	
	//Model de un movimiento
	var Movimiento = Backbone.Model.extend({
		getId: function() {
            return this.get('id');
        },
		getDescripcion: function() {
            return this.get('descripcion');
        },
		getCantidad: function() {
            return this.get('cantidad');
        },
		//Conexión a la API
		url: this.url
	});
	
	//Collection que representa el listado de movimientos realizados
	var Movimientos = Backbone.Collection.extend({
		
		model: Movimiento,
		
		//Conexión a la API
		url: this.url,
		parse: function(response) {
			return response._embedded.getlist;
		}
	});
	
	var movs = new Movimientos;
	
	//View del bloque de movimientos realizados
	var MovimientoView = Backbone.View.extend({
		tagName:  "tr",
		
		// Template para un único movimiento
		itemTemplate: _.template($('#item-template').html()),
		
		//Listeners de eventos
		events: {
			"click #borrar": "borraMovimiento"
		},
		
		initialize: function() {
			//Elimina un elemento del DOM cuando se llama a la  función destroy
			this.listenTo(this.model, 'destroy', this.remove);
		},
		
		//Al renderizarlo, se le agrega al template las variables de descripción y cantidad
		render: function() {
			this.$el.html(this.itemTemplate({descripcion:this.model.getDescripcion(),cantidad:this.model.getCantidad()}));
			return this;
		},
		
		borraMovimiento: function(e){
			this.model.destroy({url:'/api/public/delete/'+this.model.getId()});
		}
	});

	//View principal
	var AppView = Backbone.View.extend({
		// Elemento principal del view
		el: '#container',
		
		// Template del formulario para añadir un nuevo movimiento
		nuevoMovTemplate: _.template($('#nuevoMov-template').html()),
		
		//Listeners de eventos
		events: {
			"click #anadir": "nuevoMovimiento"
		},
		
		initialize: function(){
			//Listener que llama a agregarMovimiento si se añaden nuevos elementos a movs
			this.listenTo(movs, 'add', this.agregarMovimiento);

			//Sacamos los elementos que ya estaban guardados a través la API
			movs.fetch({url:'/api/public/getlist'});

			this.nuevoMov = $('#nuevoMov');
			this.render();
		},

		render: function(){
			this.nuevoMov.html(this.nuevoMovTemplate());
		},
		
		//Creamos un nuevo movimiento y lo insertamos en el view
		agregarMovimiento: function(elem) {
			var view = new MovimientoView({model:elem});
			this.$("#movList").append(view.render().el);
		},
		
		nuevoMovimiento: function(e){
			if (!this.$("#descripcion").val()) return;
			if (!this.$("#cantidad").val()) return;
			//Añadimos una nueva instancia de model dentro de movs
			movs.create({descripcion: this.$("#descripcion").val(),cantidad: this.$("#cantidad").val()},{url:'/api/public/add'});
			//Reseteamos los input
			this.$("#descripcion").val('');
			this.$("#cantidad").val('');
		},
	});

	var appView = new AppView();
});