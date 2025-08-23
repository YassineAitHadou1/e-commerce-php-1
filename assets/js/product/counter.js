let counters = document.querySelectorAll('.counter');
// console.log(counters);
counters.forEach((counter)=>{
   let counterUp = counter.querySelector('.counterUp');    
counterUp.addEventListener('click',()=>{
    let quantity = counterUp.parentElement.querySelector('.quantity');  
    quantity.value=(parseInt(quantity.value))+1;
      if (quantity.value > 99) {
        quantity.value = 0;
    }
 })
let counterDown = counter.querySelector('.counterDown');
counterDown.addEventListener('click',()=>{
    let quantity = counterDown.parentElement.querySelector('.quantity');
    quantity.value=(parseInt(quantity.value))-1;
     if (quantity.value < 0) {
        quantity.value = 0;
    }
 })
})
