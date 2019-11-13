/*
Daniel Louis
Internet Systems Programming - Fall
Term project: Scryfall scrapper
*/

function scrap(searchText) {

    /*fetch('https://api.scryfall.com/cards/search?order=cmc&q=' + searchText)
     need to change things for this to work again (needs to take a array not single card)*/
    var url = 'https://api.scryfall.com/cards/multiverse/' + searchText;
    document.getElementById("demo").innerHTML += url;

    fetch(url)
        .then(res => { return res.json() })
        .then(data => {

            console.log(data);

            let output = '<form name="myForm" id="myForm" action="./ScryfallScrapper.php" method="post"><input name="name" type="text" value="'
                + data.name
                + '"><input type="text" name="cmc" value="' + data.mana_cost
                + '"><input type="text" name="cardType" value="' + data.type_line
                + '"><input type="text" name="color" value="' + data.colors
                + '"><input type="text" name="legBrawl" value="' + data.legalities.brawl
                + '"><input type="text" name="legCommander" value="' + data.legalities.commander
                + '"><input type="text" name="legDuel" value="' + data.legalities.duel
                + '"><input type="text" name="legFuture" value="' + data.legalities.future
                + '"><input type="text" name="legHistoric" value="' + data.legalities.historic
                + '"><input type="text" name="legLegacy" value="' + data.legalities.legacy
                + '"><input type="text" name="legModern" value="' + data.legalities.modern
                + '"><input type="text" name="legOlderschool" value="' + data.legalities.oldschool
                + '"><input type="text" name="legPauper" value="' + data.legalities.pauper
                + '"><input type="text" name="legPenny" value="' + data.legalities.penny
                + '"><input type="text" name="legPioneer" value="' + data.legalities.pioneer
                + '"><input type="text" name="legStandard" value="' + data.legalities.standard
                + '"><input type="text" name="legVintage" value="' + data.legalities.vintage
                + '"><input type="text" name="power" value="' + data.power
                + '"><input type="text" name="rarity" value="' + data.rarity
                + '"><input type="text" name="setName" value="' + data.set_name
                + '"><input type="text" name="toughness" value="' + data.toughness
                + '"><input type="text" name="image" value="' + data.image_uris.large
                + '"><input type="submit" name="submit" value="Submit">'
                +'<div id="text"></div>'
                + '<script>window.onload=func(); function func(){document.getElementById("test").innerHTML = "This loaded correctly";}</script>'
                + '</form > '
                + '<image src="' + data.image_uris.large + '">';
            document.getElementById("demo").innerHTML += output;
        });

}