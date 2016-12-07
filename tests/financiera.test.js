suite('Movimiento Model', function() {

    setup(function() {
        this.mov = new Movimiento({
			id: 7,
            descripcion: "Prueba descripción",
            cantidad: 10.5
        });
    });

    test('should exist', function() {
        expect(this.mov).to.be.ok; // Tests this.mov is truthy
    });
	
	test('should have a getId() method', function() {
        expect(typeof this.mov.getId).to.equal('function');
    });

    test('should have a getDescripcion() method', function() {
        expect(typeof this.mov.getDescripcion).to.equal('function');
    });
	
	test('should have a getCantidad() method', function() {
        expect(typeof this.mov.getCantidad).to.equal('function');
    });
	
	test('calling getId should return id', function() {
        expect(this.mov.getId()).to.equal(7);
    });

    test('calling getDescripcion should return descripcion', function() {
        expect(this.mov.getDescripcion()).to.equal('Prueba descripción');
    });
	
	test('calling getCantidad should return cantidad', function() {
        expect(this.mov.getCantidad()).to.equal(10.5);
    });

	teardown(function() {
        this.mov = null;
    });
});
