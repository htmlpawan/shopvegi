setTimeout(function () {
	loadCartCount();
	// searchArray();
}, 500);

function selectWeight(id, proid) {
	var wei = document.getElementById("weight" + id).value;
	$.ajax({
		url: "http://localhost/vegefoods/product-price",
		type: "post",
		data: {
			id: proid,
			wei: wei
		},
		success: function (d) {
			var data = JSON.parse(d);
			console.log(data);
			document.getElementById("price" + id).innerHTML = data.price;
			document.getElementById("desc" + id).innerHTML = data.discout;
		}
	});
}


function selectWeightSingle(proid) {
	var wei = document.getElementById("weight00").value;
	$.ajax({
		url: "http://localhost/vegefoods/product-price",
		type: "post",
		data: {
			id: proid,
			wei: wei
		},
		success: function (d) {
			var data = JSON.parse(d);
			console.log(data);
			document.getElementById("price00").innerHTML = data.price;
			document.getElementById("desc00").innerHTML = data.discout;
		}
	});
}

function addmin(id, proid) {
	var wei = document.getElementById("weight" + id).value;
	$.ajax({
		url: "http://localhost/vegefoods/add-cart",
		type: "post",
		data: {
			id: proid,
			wei: wei,
			quantity: 1
		},
		success: function (d) {
			var data = JSON.parse(d);
			document.getElementById("cartCount").innerHTML = "[" + data + "]";
			document.getElementById("cartCount10").innerHTML = "[" + data + "]";


		}
	});
}

function addinner(proid) {
	var wei = document.getElementById("weight00").value;
	var quantity = document.getElementById("quantity00").value;
	$.ajax({
		url: "http://localhost/vegefoods/add-cart",
		type: "post",
		data: {
			id: proid,
			wei: wei,
			quantity: quantity
		},
		success: function (d) {
            console.log(d);
			document.getElementById("cartCount").innerHTML = "[" + d + "]";
			document.getElementById("cartCount10").innerHTML = "[" + d + "]";
		}
	});
}

function loadCartCount() {
	$.ajax({
		url: "http://localhost/vegefoods/load-cart-count",
		success: function (d) {
			var data = JSON.parse(d);
			document.getElementById("cartCount").innerHTML = "[" + data + "]";
			document.getElementById("cartCount10").innerHTML = "[" + data + "]";

		}
	});
}

function removeCartitem(id) {
	//  document.getElementById("closeid"+id).
	$.ajax({
		url: "http://localhost/vegefoods/cart-delete-item",
		type: "post",
		data: {
			cartid: id
		},
		success: function (d) {
			var data = JSON.parse(d);
			console.log(data);
			if (data.count == 0) {
				$("#cart-wrap").hide();
			}
			$("#closeid" + id).remove();
			document.getElementById("cartCount").innerHTML = "[" + data.count + "]";
			document.getElementById("cartCount10").innerHTML = "[" + data.count + "]";
			document.getElementById("subtotal").innerHTML = "&#8377; " + data.subtotal;
			document.getElementById("deliveryCh").innerHTML = "&#8377; " + data.delivery;
			document.getElementById("total").innerHTML = "&#8377; " + data.total;
			//    if(d)
			//    location.reload();
		}
	});
}

function searchArray() {
	$.ajax({
		url: "http://localhost/vegefoods/searchbox-array",
		success: function (d) {
			//var data = JSON.parse(d);
			localStorage.setItem("searchitem", d);
			console.log(d);
		}
	});
}

function login() {
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var email = document.getElementById("lusername").value;
	var password = document.getElementById("lpassword").value;
	if (!email || !reg.test(email)) {
		$("#lmess1").css('visibility', 'visible');
		setTimeout(function () {
			$("#lmess1").css('visibility', 'hidden');
		}, 5000);
	} else if (!password) {
		$("#lmess2").css('visibility', 'visible');
		setTimeout(function () {
			$("#lmess2").css('visibility', 'hidden');
		}, 5000);
	} else {
		var alldata = {
			user: email,
			password: password,
		}
		//console.log(alldata);

		$.ajax({
			url: "http://localhost/vegefoods/user-login",
			type: "post",
			data: alldata,
			success: function (d) {
				console.log(d);
				d = JSON.parse(d);
				if (d) {
					document.getElementById("lusername").value = '';
					document.getElementById("lpassword").value = '';
					$("#myModal").modal('hide');
					location.reload();
				} else {
					$(".passerror").css('visibility', 'visible');
					setTimeout(function () {
						$(".passerror").css('visibility', 'hidden');
					}, 5000);
				}

			}
		});
	}

}

function register() {
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var mob = /^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/;
	var name = document.getElementById("rname").value;
	var mobile = document.getElementById("rmobile").value;
	var email = document.getElementById("remail").value;
	var password = document.getElementById("rpassword").value;
	var con_password = document.getElementById("rcon_password").value;
	if (!name) {
		$("#mess1").css('visibility', 'visible');
		setTimeout(function () {
			$("#mess1").css('visibility', 'hidden');
		}, 5000);
	} else if (!mobile || mobile.length != 10 || !mob.test(mobile)) {
		$("#mess2").css('visibility', 'visible');
		setTimeout(function () {
			$("#mess2").css('visibility', 'hidden');
		}, 5000);
	} else if (!email || !reg.test(email)) {
		$("#mess3").css('visibility', 'visible');
		setTimeout(function () {
			$("#mess3").css('visibility', 'hidden');
		}, 5000);
	} else if (!password) {
		$("#mess4").css('visibility', 'visible');
		setTimeout(function () {
			$("#mess4").css('visibility', 'hidden');
		}, 5000);
	} else if (con_password != password) {
		$("#mess5").css('visibility', 'visible');
		setTimeout(function () {
			$("#mess5").css('visibility', 'hidden');
		}, 5000);
	} else {
		var alldata = {
			name: name,
			mobile: mobile,
			email: email,
			password: password,
			conpass: con_password
		}
		console.log(alldata);

		$.ajax({
			url: "http://localhost/vegefoods/user-register",
			type: "post",
			data: alldata,
			success: function (d) {
				console.log(d);
				if(d=='malerdy'){
					$(".mobileRerror").css('visibility', 'visible');
					setTimeout(function () {
						$(".mobileRerror").css('visibility', 'hidden');
					}, 5000);
				}
				else if(d=='ealerdy'){
					$(".emailRerror").css('visibility', 'visible');
					setTimeout(function () {
						$(".emailRerror").css('visibility', 'hidden');
					}, 5000);
				}else{
				document.getElementById("rname").value = '';
				document.getElementById("rmobile").value = '';
				document.getElementById("remail").value = '';
				document.getElementById("rpassword").value = '';
				document.getElementById("rcon_password").value = '';
				$("#myModal").modal('hide');
				location.reload();
				}
			}
		});
	}


}

function isNumber(event) {
	var mobile = document.getElementById('rmobile');
	var keycode = event.which;
	console.log(keycode);
	if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
		event.preventDefault();
	}
	if (mobile.value.length != 10) {

    } else {
		event.preventDefault();
	}
}

function isNumber1(event) {
	var billmobile = document.getElementById('bil_mobile');
	var keycode = event.which;
	console.log(keycode);
	if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
		event.preventDefault();
	}
	if (billmobile.value.length != 10) {

    } else {
		event.preventDefault();
	}
}

function logout() {
	$.ajax({
		method: "get",
		url: "http://localhost/vegefoods/log-out",
		success: function (d) {
			console.log(d);
			window.location.href = 'http://localhost/vegefoods/';
		}
	});
}

function saveAddress() {
	var mob = /^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/;
	var fname = document.getElementById("bil_name").value;
	var address = document.getElementById("bil_address").value;
	var city = document.getElementById("bil_city").value;
	var postcode = document.getElementById("bil_postcode").value;
	var mobile = document.getElementById("bil_mobile").value;
	var addressid = document.getElementById("bil_editid").value;
	if (!fname) {
		$("#bil_mess1").css('visibility', 'visible');
		setTimeout(function () {
			$("#bil_mess1").css('visibility', 'hidden');
		}, 5000);
	}
	else if (!mobile || mobile.length != 10 || !mob.test(mobile)) {
		$("#bil_mobile").css('visibility', 'visible');
		setTimeout(function () {
			$("#bil_mobile").css('visibility', 'hidden');
		}, 5000);
	}
	else{

	}


	var alldata = {
		fname: fname,
		address: address,
		city: city,
		postcode: postcode,
		mobile: mobile,
		addressid: addressid
	};
	console.log(alldata);

	$.ajax({
		url: "http://localhost/vegefoods/checkout-address", 
		type: "post",
		data: alldata,
		success: function (d) {
			console.log(d);
			location.reload();
		}
	});


}

function order(){
	var method = $('input[name=optradio]:checked', '#methodpay').val();
	var billid = $('input[name=billadd]:checked', '#billId').val();
	$.ajax({
		url: "http://localhost/vegefoods/order-success", 
		type: "post",
		data:{method:method, billid:billid},
		success: function (d) {
			console.log(d);
			if(d)
			{
				window.location.href = 'http://localhost/vegefoods/successfully';	
			}
			else{
				alert("Server error 404 not Found!")
			}
		}
	});
}
function backtohome(){
	window.location.href = 'http://localhost/vegefoods/my-order';
}
function orderlist(id){
	window.location.href = 'http://localhost/vegefoods/order-list?id='+id;
}
var oid=0;
function cancelItem(ido){
	oid=ido;
	$("#myModal1").modal('show');
}
function confirm(){
	console.log(oid);
	$.ajax({
		url: "http://localhost/vegefoods/ordercancel", 
		type: "post",
		data:{orderid:oid},
		success: function (d) {
			console.log(d);
			if(d)
			{
			 location.reload();
			//window.location.href = 'http://localhost/vegefoods/successfully';	
			}
			else{
				alert("Server error 404 not Found!")
			}
		}
	});

}
var oldpass =''; 
function editprofile(oldpa){
	oldpass = oldpa;
	$("#editmyModal").modal("show");
}

function editRegister() {
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var mob = /^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/;
	var name = document.getElementById("ername").value;
	var mobile = document.getElementById("ermobile").value;
	var email = document.getElementById("eremail").value;
	var password = document.getElementById("erpassword").value;
	var con_password = document.getElementById("ercon_password").value;
	if(mobile){
	 if (mobile.length != 10 || !mob.test(mobile)) {
		$("#emess2").css('visibility', 'visible');
		setTimeout(function () {
			$("#emess2").css('visibility', 'hidden');
		}, 5000);
		return false;
	}} 
	if(email){
	if (reg.test(email)) {
		$("#emess3").css('visibility', 'visible');
		setTimeout(function () {
			$("#emess3").css('visibility', 'hidden');
		}, 5000);
		return false;
	}} 
	if (password != oldpass) {
		$("#emess4").css('visibility', 'visible');
		setTimeout(function () {
			$("#emess4").css('visibility', 'hidden');
		}, 5000);
	}else {
		var alldata = {
			name: name,
			mobile: mobile,
			email: email,
			password: con_password
		}
		console.log(alldata);

		$.ajax({
			url: "http://localhost/vegefoods/edit-register",
			type: "post",
			data: alldata,
			success: function (d) {
				console.log(d);
				if(d=='malerdy'){
					$(".emobileRerror").css('visibility', 'visible');
					setTimeout(function () {
						$(".emobileRerror").css('visibility', 'hidden');
					}, 5000);
				}
				else if(d=='ealerdy'){
					$(".eemailRerror").css('visibility', 'visible');
					setTimeout(function () {
						$(".eemailRerror").css('visibility', 'hidden');
					}, 5000);
				}else{
				document.getElementById("ername").value = '';
				document.getElementById("ermobile").value = '';
				document.getElementById("eremail").value = '';
				document.getElementById("erpassword").value = '';
				document.getElementById("ercon_password").value = '';
				$("#editmyModal").modal('hide');
				location.reload();
				}
			}
		});
	}


}