let phoneMask = () => {
    let element = document.getElementById('phoneInput')
    IMask(element, {
        mask: '+{7}(000)000-00-00'
    })
}

phoneMask();
