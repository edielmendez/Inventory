var app = angular.module('myApp', []);
app.controller('softwareController', function($scope, $http) {
    // more angular JS codes will be here
    $scope.showCreateForm = function(){
	    // clear form
	    
	    $scope.clearForm();
	     
	    // change modal title
	    $('#modal-product-title').text("Nuevo Registro de Software");
	     
	    // hide update product button
	    $('#btn-update-product').hide();
	     
	    // show create product button
	    $('#btn-create-product').show();

	    $("#modal-product-form").openModal();
	    $("#form-nombre").focus();

     
	}

	// clear variable / form values
	$scope.clearForm = function(){
	    $scope.id = "";
	    $scope.nombre = "";
	    $scope.version = "";
	    $scope.marca = "";
	    $scope.documento_de_amparo = "";
	    $scope.numero_licencias = "";
	    $scope.plataforma = "";
	    $scope.clasificacion = "";
	    $scope.observaciones = "";
	}

	// create new product 
	$scope.createProduct = function(){
		var software = {
			'nombre' : $scope.nombre, 
	        'version' : $scope.version, 
	        'marca' : $scope.marca,
	        'documento_de_amparo' : $scope.documento_de_amparo,
	        'numero_licencias' : $scope.numero_licencias,
	        'plataforma' : $scope.plataforma,
	        'clasificacion' : $scope.clasificacion
		};

		for(var a in software){
			if(software[a]===''){
				Materialize.toast("Falta algun dato",3000);
				return;
			}
		}

		
	        
	    // fields in key-value pairs
	    $http.post('../methods/create_softare.php', {
	            'nombre' : $scope.nombre, 
	            'version' : $scope.version, 
	            'marca' : $scope.marca,
	            'documento_de_amparo' : $scope.documento_de_amparo,
	            'numero_licencias' : $scope.numero_licencias,
	            'plataforma' : $scope.plataforma,
	            'clasificacion' : $scope.clasificacion,
	            'observaciones' : $scope.observaciones


	        }
	    ).success(function (data, status, headers, config) {
	        console.log(data);
	        // tell the user new product was created
	        
	         
	        // close modal
	        $('#modal-product-form').closeModal();
	        Materialize.toast(data, 4000);
	         
	        // clear modal content
	        $scope.clearForm();
	         
	        // refresh the list
	        $scope.getAll();
	    });
	}

	$scope.getAll = function(){
		
		$http.get("../methods/read_softwares.php").success(function(response){
		
			$scope.softwares = response.records;
		});
	}

	// retrieve record to fill out the form
	$scope.readOne = function(id){
	     console.log(id);
	    // change modal title
	    $('#modal-product-title').text("Editar Registro");
	     
	    // show udpate product button
	    $('#btn-update-product').show();
	     
	    // show create product button
	    $('#btn-create-product').hide();
	     
	    // post id of product to be edited
	    $http.post('../methods/read_one_software.php', {
	        'id' : id 
	    })
	    .success(function(data, status, headers, config){
	         
	        // put the values in form
	        console.log(data)
	        $scope.id = data[0]["id"];
		    $scope.nombre = data[0]["nombre"];
		    $scope.version = data[0]["version"];
		    $scope.marca = data[0]["marca"];
		    $scope.documento_de_amparo = data[0]["documento_de_amparo"];
		    $scope.numero_licencias = data[0]["numero_licencias"];
		    $scope.plataforma = data[0]["plataforma"];
		    $scope.clasificacion = data[0]["clasificacion"];
		    $scope.observaciones = data[0]["clasificacion"];
	         
	        // show modal
	        $('#modal-product-form').openModal();
	    })
	    .error(function(data, status, headers, config){
	        Materialize.toast('Unable to retrieve record.', 4000);
	    });
	}

	// update product record / save changes
	$scope.updateProduct = function(){
	    $http.post('../methods/update_software.php', {
	    	'id' : $scope.id,
	        'nombre' : $scope.nombre, 
	        'version' : $scope.version, 
	        'marca' : $scope.marca,
	        'documento_de_amparo' : $scope.documento_de_amparo,
	        'numero_licencias' : $scope.numero_licencias,
	        'plataforma' : $scope.plataforma,
	        'clasificacion' : $scope.clasificacion,
	        'observaciones' : $scope.observaciones
	    })
	    .success(function (data, status, headers, config){             
	        // tell the user product record was updated
	        Materialize.toast(data, 4000);
	        console.log(data);
	        // close modal
	        $('#modal-product-form').closeModal();
	         
	        // clear modal content
	        $scope.clearForm();
	         
	        // refresh the product list
	        $scope.getAll();
	    });
	}

	// delete product
	$scope.deleteSoftware = function(id){
		$scope.id = id;
		$("#modal_eliminar_software").openModal();
	     /*
	    // ask the user if he is sure to delete the record
	    if(confirm("Are you sure?")){
	        // post the id of product to be deleted
	        $http.post('delete_product.php', {
	            'id' : id
	        }).success(function (data, status, headers, config){
	             
	            // tell the user product was deleted
	            Materialize.toast(data, 4000);
	             
	            // refresh the list
	            $scope.getAll();
	        });
	    }*/
	}

	$scope.aceptDeleteSoftware = function(){
		$http.post('../methods/delete_software.php', {
	            'id' : $scope.id
	        }).success(function (data, status, headers, config){
	            console.log(data)
		        $('#modal_eliminar_software').closeModal();
		         
		        // clear modal content
		        $scope.clearForm();
		         
		        // refresh the product list
		        $scope.getAll();
		        Materialize.toast(data, 4000);
	        });
	}


});