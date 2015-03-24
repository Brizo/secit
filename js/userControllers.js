//Angular Modules
var receipt = angular.module('receipt',[]);

receipt.controller('receiptCreate',['$scope','$http', function($scope, $http){
	$scope.rectype = {name:"SPU ACCOUNT", gl:"HF008888000"};
	$scope.recno = "A00000";
	$scope.recDate = Date().toString();
	$scope.customer = {acc:1000000001, name:"Dovoza Mamba", addr1:"P O Box 43", addr2:"Matata"};
	$scope.recamt = 0;
	$scope.rectot = 0;
	$scope.payMeth = "--None--";
	$scope.tendamt = 0;
	$scope.changeamt = 0;
	$scope.cashier = {uname:"SEC3031", name:"Mpendulo Mamba"};
	$scope.st = {num:"08", name:"Siteki", code:"A"};
	$scope.banks = [{code:"FNB", name:"First National Bank"},{code:"NED", name:"NEDBANK"}];
	$scope.cheqnum = null;

	/*$scope.cont = null;
	data = {};

	Get all container objects
	$http.post('/getCont', data).success(function(resp){
		$scope.cont = resp;
	});*/

	$scope.receiptSave = function(){
		console.log('printing')
	}

	$scope.calcChange = function(){
		//if ($scope.tendamt >= $scope.recamt) {
	    	$scope.changeamt = Number($scope.tendamt) - Number($scope.recamt);
	    	console.log($scope.changeamt);
	    //}
	}

}]);

receipt.controller('receiptLogin',['$scope','$http', function($scope, $http){
	
	$scope.loginstatus = true;
	
	//$scope.user = {uname:"SEC3031", passkey:"P@ssw0rd", roles:["admin","sup","cashier","report"]};
	$scope.loginState = "Not Logged In!"
	$scope.adminrole = false;
	$scope.suprole = false;
	$scope.cashierrole = false;
	$scope.reprole = false;
	$scope.isAdmin = false;
	$scope.isSup = false;
	$scope.isCashier= false;
	$scope.isReporter = false;

	$scope.validate = function(){

		var id = $scope.uname;
		
		$http.get('/getUser/' + id).success(function(data) {
		
	      	$scope.username = data[0].uname;
	      	$scope.userpass = data[0].passkey;
	      	$scope.useroles = data[0].roles;


			if ($scope.uname == $scope.username && $scope.passkey == $scope.userpass) {

				$scope.loginstatus = false;
				$scope.loginState = "Logged In";

				if ($scope.adminrole && ($scope.useroles.indexOf("admin") > -1)) {
					$scope.isAdmin = true;
				};

				if ($scope.suprole && ($scope.useroles.indexOf("sup") > -1)) {
					$scope.isSup = true;
				};

				if ($scope.cashierrole && ($scope.useroles.indexOf("cashier") > -1)) {
					$scope.isCashier = true;
				};

				if ($scope.reprole && ($scope.useroles.indexOf("report") > -1)) {
					$scope.isReporter = true;
				};


			}else{
				$scope.loginState = "Invalid Login Combo!!"
			}

		});

	}


	$scope.addUser = function(){

		if ($scope.usernme == '') {
			alert("Enter ID");
			return; 
		}

		$scope.cashier = false;
		$scope.administrator = false;
		$scope.supervisor = false;
		$scope.report = false;

		var userroles = [];

		if ($scope.adminrole) {
			userroles.push ("admin");
		}

		if ($scope.cashierrole){
			userroles.push ("cashier");
		}

		if ($scope.suprole){
			userroles.push ("sup");
		}
		if ($scope.reprole){
			userroles.push ("report");
		}

		var newuser = {uname: $scope.usernme, passkey:$scope.userpss, firstname : $scope.firstname, lastname: $scope.lastname, roles:userroles};

		$http.post('/addNewUser', newuser ).success(function (resp) {
			alert(resp);
			$scope.clear();

		}).error(function () {
			alert("Error");
		});
	}

	$scope.showUsers = function(){
		
		$http.get('/showAllUsers').success(function (data) {
			$scope.users = data;
		}).error(function () {
			alert("An unexpected error occured!");
		});
	}

	$scope.clearNewUser = function () {
		$scope.usernme = '';
		$scope.userpss = '';
		$scope.firstname = '';
		$scope.lastname = '';
		$scope.adminRole = '';
		$scope.roleSup = '';
		$scope.cashierRole = '';
		$scope.reportRole = '';
	}

	$scope.clearLogin = function () {
		$scope.uname = '';
		$scope.passkey = '';
		$scope.adminrole = '';
		$scope.suprole = '';
		$scope.cashierrole = '';
		$scope.reprole = '';
	
	}


}]);

