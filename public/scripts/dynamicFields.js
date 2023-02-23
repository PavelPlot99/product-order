// Добавление блока
let number = 1;

$('.add_b').on('click', function(e) {
    console.log(number)
    e.preventDefault();
    let $element = $('#dynamic')
    let $clone = $element.clone();
    $clone.attr("data-selector", number );
    $clone.find('select').attr('name', `products[${number}]`)
    $clone.find('input').attr('name', `count[${number}]`)
    $element.after($clone);
    $clone.find('input').val('').focus();
    number = number + 1

});

$('.del_b').on('click', function(e) {
    if(number > 1){
        e.preventDefault();
        let element = document.querySelector(`div[data-selector='${number-1}']`);
        element.remove()
        number = number - 1
    }
});
