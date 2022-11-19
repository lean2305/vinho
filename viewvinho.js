function togglediv(mydiv){
	const arrowdiv = document.getElementById('arrow'+mydiv.id);
	const bodydiv = document.getElementById('body'+mydiv.id);
	
	bodydiv.querySelectorAll('.listing-item')
  .forEach(listingItem => listingItem.classList.toggle('listing-item-active'));
	console.log(arrowdiv.style.transform);
	if(arrowdiv.style.transform == ''){
		arrowdiv.style.transform = "rotate(180deg)";
	}else{
		arrowdiv.style.transform = '';
	}
}