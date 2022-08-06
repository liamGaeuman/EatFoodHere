"use strict";
// vanilla Javscript
var totalPrice = 0;
var items = [];
window.addEventListener("load", function(){
	
	// get all the elements with the addButton class
    var addButtons = document.getElementsByClassName("addButton");
    
    //Loop through all the addButtons' elements
    for (var i = 0; i < addButtons.length; i++) {
        addButtons[i].addEventListener("click", calculate);
    }
	
	var body = document.querySelector('body');
	
	var xmlContent = "";
	
	fetch('pics.xml').then((response)=>{
		response.text().then((xml)=>{
			xmlContent = xml;
			var parser = new DOMParser();
			var xmlDOM = parser.parseFromString(xmlContent, 'application/xml');
			var pics = xmlDOM.querySelectorAll('pic');
			var rowContent = "<div class='row pb-2'>";
			pics.forEach(picXMLnode =>{
				rowContent += "<div class='col'>"
				+ "<img src='assets/" + picXMLnode.innerHTML + "' class='galleryPics img-fluid' alt='...'>"
				+ "</div>";
			})
			rowContent += "</div>"
			if(body.contains(document.getElementById("thumbnails"))){
				document.getElementById('thumbnails').innerHTML = rowContent;
			}
		});
	});
	if(body.contains(document.getElementById("cardNumber"))){
		document.getElementById("cardNumber").oninput = validateNumber;
		document.getElementById("expMonth").onchange = validateMonth;
		document.getElementById("expYear").onchange = validateYear;
		document.getElementById("orderButton").onclick = runSubmit;
	}
});

function calculate(e){
	var foodItem = e.target.getAttribute("data-item");
	var item = e.target.getAttribute("data-item");	
	items.push(foodItem);
	console.log(items);
	
	var price = e.target.getAttribute("data-price");
	totalPrice += parseFloat(price);
	
	document.getElementById("totalView").innerHTML = ("total: $" + totalPrice.toFixed(2));
	
	if(arrayOccurences(items, item) > 1){
		var foodItems = document.getElementsByClassName('removeItem');
		for(var x = 0; x < foodItems.length; ++x){
			if(foodItems[x].getAttribute("data-item") == item){
				//set quantity to new value
				foodItems[x].nextElementSibling.innerHTML = arrayOccurences(items, item);
			}
		}
	}else{
		//create the list item
		var listItem = document.createElement("li");
		var att = document.createAttribute("class");      
		att.value = "list-group-item";                          
		listItem.setAttributeNode(att);
		
		//create the button
		var button = document.createElement("input");
		
		var valueAtt = document.createAttribute("value");      
		valueAtt.value = "Remove";                          
		button.setAttributeNode(valueAtt);
		var typeAtt = document.createAttribute("type");      
		typeAtt.value = "Button";                          
		button.setAttributeNode(typeAtt);
		var classAtt = document.createAttribute("class");      
		classAtt.value = "removeItem";                          
		button.setAttributeNode(classAtt);
		var itemAtt = document.createAttribute("data-item");      
		itemAtt.value = foodItem;                          
		button.setAttributeNode(itemAtt);
		var priceAtt = document.createAttribute("data-price");      
		priceAtt.value = price;                          
		button.setAttributeNode(priceAtt);
		
		
		listItem.innerHTML = (foodItem + " $" + price + " ");
		
		listItem.appendChild(button);
		
		var quantity = document.createElement("span");
		quantity.innerHTML = '1'
		
		var color = document.createAttribute("class");      
		color.value = 'text-primary';    
		quantity.setAttributeNode(color);
		
		listItem.appendChild(quantity);
		
		document.getElementById("orderList").appendChild(listItem);
		
		button.addEventListener('click', removeItem);
	}
	
	
	
}
function arrayOccurences(arrayOfItems, item){
	var OccurenceCount = 0;
	for(var i = 0; i < arrayOfItems.length; ++i){
		if(item == arrayOfItems[i]){
			OccurenceCount++;
		}			
	}
	return OccurenceCount;
}
function removeArrayItem(arrayOfItems, item){
	
	for(var i = 0; i < arrayOfItems.length; ++i){
		if(item == arrayOfItems[i]){
			console.log(arrayOfItems[i]);
			arrayOfItems.splice(i,1);
			break;
		}
	console.log(arrayOfItems);
	}
}
console.log("v")
function removeItem(e){
	var price = e.target.getAttribute("data-price");
	var item = e.target.getAttribute("data-item");
	totalPrice -= parseFloat(price);
	document.getElementById("totalView").innerHTML = ("total: $" + totalPrice.toFixed(2));
	
	//remove the item from the array
	removeArrayItem(items, item)
	
	if(arrayOccurences(items, item) > 0){
		e.target.nextElementSibling.innerHTML = arrayOccurences(items, item);
	}else{
		//remove the list item!
		e.target.parentNode.parentNode.removeChild(e.target.parentNode);
	}
}

function runSubmit(){
	validateName();
	validateNumber();
	validateMonth();
	validateYear();
	validateCVC();
}

function validateCVC() {
	var cardCVC = document.getElementById("cvc");
	
	
	if (cardCVC.validity.valueMissing) {
		cardCVC.setCustomValidity("Enter your CVC number");
	} else if (/^\d{3}$/.test(cardCVC.value) === false) {
		cardCVC.setCustomValidity("Enter a 3-digit CVC number");
	} else {
		cardCVC.setCustomValidity("");
	}
}

function validateName() {
	var cardName = document.getElementById("cardName");
	if (cardName.validity.valueMissing) {
		cardName.setCustomValidity("Enter your name as it appears on the card");
	} else {
		cardName.setCustomValidity("");	
	}
}

function validateMonth() {
	var cardMonth = document.getElementById("expMonth");
	if (cardMonth.selectedIndex === 0) {
		cardMonth.setCustomValidity("Select the expiration month");		
	} else {
		cardMonth.setCustomValidity("");
	}
}

function validateYear() {
	var cardYear = document.getElementById("expYear");
	if (cardYear.selectedIndex === 0) {
		cardYear.setCustomValidity("Select the expiration year");
	} else {
		cardYear.setCustomValidity("");
	}
}

function sumDigits(numStr) {
	var digitTotal = 0;
	for (var i = 0; i < numStr.length; i++) {
		digitTotal += parseInt(numStr.charAt(i));
	}
	return digitTotal;
}
function luhn(idNum) {
	var string1 = "";
	var string2 = "";
	// retrieve the odd-numbered digits
	for (var i = idNum.length - 1; i >= 0; i -= 2) {
		string1 += idNum.charAt(i);
	}
	// Retrieve the even-numbered digits and double them
	for (var i = idNum.length - 2; i >= 0; i -= 2) {
		string2 += 2*idNum.charAt(i);
	}
	// Return whether the sum of the difits is divisible by 10
	return sumDigits(string1 + string2) % 10 === 0;
}

function validateNumber() {
	var cardNumber = document.getElementById("cardNumber");
	if (cardNumber.validity.valueMissing) {
		cardNumber.setCustomValidity("Enter your card number");
	} else if (cardNumber.validity.patternMismatch) {
		cardNumber.setCustomValidity("Enter a valid card number");
	} else if (luhn(cardNumber.value) === false) {
		cardNumber.setCustomValidity("Enter a legitimate card number");
	} else {
		cardNumber.setCustomValidity("");
	}
}

// J Q U E R Y
$(document).ready(function() {
	//event listener 1
	$('#transfer').dblclick(function(){
		window.location.href='maintenance.php';
	});
	
	//self made plugin
	(function($) {
		$.fn.moveFadeOut = function() {    
			this.animate({'opacity': '0', 'margin-left': '700px'},{duration: 1000, queue:true});
		};
		$.fn.moveFadeIn = function() {    
			this.animate({'opacity': '1', 'margin-left': '0px'},{duration: 1000, queue:true});
		};
	})(jQuery);
	
	//event listener 2
	//create image gallery functionality
	$('#thumbnails').on('click', ".galleryPics", function(){
		var $newImage = $(this).attr('src');
		$('#bigGalleryImage img').moveFadeOut();
		setTimeout(function() {
			$('#bigGalleryImage img').attr('src', $newImage);
		}, 1000);
		$('#bigGalleryImage img').moveFadeIn();
	});

	$('#orderModel').modal('show');
	
	//event listener 3
	$('#mainLogo').hover(function() {
		$(this).css('width','40px');
		$(this).css('height','40px');
	}, function(){ 
		$(this).css('width','35px');
		$(this).css('height','35px');
	});
		
    $( "#accordion" ).accordion({icons: false});

	//event listener 4
	var $speed = 1000;
	$(document).keyup(function(event) {
		var key = (event.keyCode);
		switch(key){
			case 38:
				console.log("UP");
				$speed += 200;
				break;
			case 40:
				$speed -= 200;
				console.log("DOWN");
				break;
			};
		$('.carousel').carousel({
			interval: $speed
		})
	});
	
	//event listener 5
	$('.addButton').on('click', function(){
		$(this).addClass('btn-dark');
		setTimeout(function() {
			$('.addButton').removeClass('btn-dark');
		}, 300);
	});
	// Recipe AJAX
	var count = 0;
	var str = '<div class="row">'
	var content='<ul class="list-group">'
	$.get('recipes.xml', function(data) {
		$(data).find('Recipe').each(function(){
			count++;
			str += '<div class="col-12 col-md-6 p-2"><div class="card">'
			+'<div class="card-body">'
			+'<h4 class="card-title">'+ $(this).find("ItemName").text()+'</h4>'
			+'<h5 class="card-subtitle mb-2 text-muted">'+ $(this).find("CookTime").text()+ '</h5>'
			+'<h6 class="card-text">Ingredients</h6>'+ $(this).find("Ingredients").html()+ '<h6 class="card-text">Instructions</h6>'+ $(this).find("Instructions").html()+ ''
			+'<a name='+ $(this).find("id").text()+'></a>'
			+'</div></div></div>'
			if(count == 2){
				count = 0;
				str += '</div><div class="row">';
			}
			content += '<li class=" text-center list-group-item"><a href="#'+ $(this).find("id").text()+'">'+ $(this).find("ItemName").text()+'</a></li>';
		});
		$('#recipeDIY').html(str);
		$('#menuNav').html(content);
	});
	
	//additional plugin 1
	$( function() {
		$('#modifyMenu').tooltip({});
	} );
	$( "#hide-option" ).tooltip({
      hide: {
        effect: "explode",
        delay: 250
      }
    });
	//additional plugin 2
	$( function() {
		$(".fancyCheckBox").checkboxradio({icon:false});
	 });
});
