function handelOnCityCardClick() {
    let cityCards = document.querySelectorAll(".city-card");

    console.log("cityCards: ", cityCards);

    cityCards.forEach(cityCard => {
        cityCard.addEventListener("click", function() {
            let cityName = cityCard.childNodes[3].innerText;
            city_name_feild.setAttribute('value', cityName);
            city_submit_btn.click();
        })
    })

}

handelOnCityCardClick();