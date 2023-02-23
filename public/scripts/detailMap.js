let addressElement = document.getElementById('address');
let myMap
ymaps.ready(init);


function init() {
    myMap = new ymaps.Map('map', {
        center: [55.753994, 37.622093],
        zoom: 9
    });
    ymaps.geocode(addressElement.value, {
        results: 1
    }).then(function (res) {

        var firstGeoObject = res.geoObjects.get(0),
            coords = firstGeoObject.geometry.getCoordinates(),
            bounds = firstGeoObject.properties.get('boundedBy');

        firstGeoObject.options.set('preset', 'islands#darkBlueDotIconWithCaption');

        firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());

        console.log(firstGeoObject)
        myMap.geoObjects.add(firstGeoObject);

        myMap.setBounds(bounds, {
            checkZoomRange: true
        });
    });
}
