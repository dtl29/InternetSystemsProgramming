/*
Daniel Louis
Internet Systems Programming - Fall
Term project: Scryfall scrapper
*/

function scrap(searchText)
{

    fetch('https://api.scryfall.com/cards/search?order=cmc&q=' + searchText)
    .then(res => res.json())
    .then(json => {
        let searchResults = json.data;
        let output='<div>'+searchResults[0].name+' & brawl is: '
            +searchResults[0].legalities.brawl+'</div><img src="'
            +searchResults[0].image_uris.small+'">';
        document.getElementById("demo").innerHTML = output;
        console.log(searchResults[0]);
        
    });
}