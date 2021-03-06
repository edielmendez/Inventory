var app = angular.module('myAppLog', []);

app.controller('logController', function($scope, $http){
	$scope.getAllRegistros = function(){
		
		$http.get("../methods/read_registros.php").success(function(response){
			//console.log(response);
			$scope.registros = response.records;
			
		});
	}	


});


app.controller('maquinasController', function($scope, $http){
	

	$scope.generarFechaYHora = function(){
		var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		var f=new Date();
		$scope.fecha = (f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
		

	}


	$scope.generarFechaYHora();

	$scope.createTime = function(){
		var f=new Date();
		cad=f.getHours()+":"+f.getMinutes()+":"+f.getSeconds(); 
		 return cad;
	}

	$scope.setFecha = function(){
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();

		if(dd<10) {
		    dd='0'+dd
		} 

		if(mm<10) {
		    mm='0'+mm
		} 

		today = yyyy+'-'+mm+'-'+dd;
		
		return today;
	}



	$scope.createRegistro = function(){


		if ($scope.numero_de_maquina==undefined) {
			Materialize.toast("Eliga un numero de maquina", 4000);
			return;
		}
		var f = new Date();
		var date = $scope.setFecha();

		
		$http.post('../methods/create_registro.php', {
	            'numero_de_maquina' : $scope.numero_de_maquina, 
	            'matricula' : $scope.matricula, 
	            'fecha' : date,
	            'hora_entrada' : $scope.createTime()


	        }
	    ).success(function (data, status, headers, config) {
	        console.log(data);

	        window.location.reload();
	        
	      	
	         
	        
	       
	        $scope.clearForm();
	    });
	}

	$scope.clearForm = function(){
		$scope.matricula = "";
	}

	

	
	
	
});
