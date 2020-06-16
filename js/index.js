
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
    $http.get("http://localhost/wsdl.php?method=load_user")
        .then(function (response) {$scope.users = response.data.records;});
    $http.get("http://localhost/wsdl.php?method=load_menu")
        .then(function (response) {$scope.menus = response.data.records;});
    $http.get("http://localhost/wsdl.php?method=load_user1")
        .then(function (response) {$scope.user = response.data;});
            
    // Create new menu
    $scope.submitMenu = function() {
        var count = 0;

        var x = document.getElementById("field_name");
        if ($scope.menu_name === undefined || $scope.menu_name === "") {   
            x.style.display = "block";
            count++;
        } else {
            x.style.display = "none";
        }

        var x = document.getElementById("field_type");
        if ($scope.menu_type === undefined || $scope.menu_type === "") {   
            x.style.display = "block";
            count++;
        } else {
            x.style.display = "none";
        }

        var x = document.getElementById("field_cuisine");
        if ($scope.menu_cuisine === undefined || $scope.menu_cuisine === "") {   
            x.style.display = "block";
            count++;
        } else {
            x.style.display = "none";
        }

        var x = document.getElementById("field_price");
        if ($scope.menu_price === undefined || $scope.menu_price === "") {   
            x.style.display = "block";
            count++;
        } else {
            x.style.display = "none";
        }

        var x = document.getElementById("field_desc");
        if ($scope.menu_desc === undefined || $scope.menu_desc === "") {   
            x.style.display = "block";
            count++;
        } else {
            x.style.display = "none";
        }

        if (count === 0) {
            console.log("processing");
            var request = $http({ 
                method: 'post',
                url: "http://localhost/insert_menu.php",
                data: {
                    name: $scope.menu_name,
                    type: $scope.menu_type,
                    cuisine: $scope.menu_cuisine,
                    price: $scope.menu_price,
                    description: $scope.menu_desc
                },
                headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
            });

            location.reload();
        }  
    };

            // Update user
            $scope.submitUser = function() {
                var count = 0;

                var x = document.getElementById("field_fname");
                if ($scope.user.fname === "") {   
                    x.style.display = "block";
                    count++;
                } else {
                    x.style.display = "none";
                }

                var x = document.getElementById("field_lname");
                if ($scope.user.lname === "") {   
                    x.style.display = "block";
                    count++;
                } else {
                    x.style.display = "none";
                }

                var x = document.getElementById("field_address");
                if ($scope.user.address === "") {   
                    x.style.display = "block";
                    count++;
                } else {
                    x.style.display = "none";
                }

                var x = document.getElementById("field_phone");
                if ($scope.user.phone=== "") {   
                    x.style.display = "block";
                    count++;
                } else {
                    x.style.display = "none";
                }

                if (count === 0) {
                    console.log("Processing");
                    var request = $http({ 
                    method: 'post',
                    url: "http://localhost/update_user.php",
                    data: {
                        fname: $scope.user.fname,
                        lname: $scope.user.lname,
                        address: $scope.user.address,
                        phone: $scope.user.phone
                    },
                    headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
                    });

                    location.reload();
                } 

                
            };

            // Delete Menu
            $scope.deleteMenu = function(menu_id) {
                console.log(menu_id);
                console.log("processing");
                var request = $http({ 
                method: 'post',
                url: "http://localhost/delete_menu.php",
                data: {
                    id: menu_id
                },
                headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
                });

                location.reload();
            };
        });
        
        function newMenu() {
            document.getElementsByTagName("input").value = "";
            var x = document.getElementById("new-menu");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        };

        function editUser() {
            var x = document.getElementById("user-info");
            var y = document.getElementById("edit-user");
            // x.style.display = "none";
            // if (x.style.display === "none") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";
            // }
            x.style.display = "none";
            y.style.display = "block";
            
        };

        function cancelEdit() {
            var x = document.getElementById("user-info");
            var y = document.getElementById("edit-user");
            // x.style.display = "none";
            // if (x.style.display === "none") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";
            // }
            x.style.display = "block";
            y.style.display = "none";           
        }
