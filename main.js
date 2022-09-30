const switcher = [...document.querySelectorAll('.switcher')];

switcher.forEach(item =>{
    item.addEventListener('click', function(){
        switcher.forEach(item => item.parentElement.classList.remove('is-active'))
        this.parentElement.classList.add('is-active')
    })
})