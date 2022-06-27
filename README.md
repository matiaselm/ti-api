## Twilight Imperium API

PHP-Laravel rajapintasovellus, joka kommunikoi MySQL-tietokantapalvelimen kanssa.

Tehty mielenkiinnosta [peliä](https://www.fantasyflightgames.com/en/products/twilight-imperium-fourth-edition/) kohtaan. Tarkoituksena mallintaa lautapelin data ja toiminnallisuudet relaatioihin siten, että dataa hyödyntämällä voidaan parhaimmillaan mallintaa erilaisia pelitilanteita tai laskea onnistumistodennäköisyyksiä.

Nykytilanne:
 - Ryhmittymät ja ryhmittymien järjestelmät planeettoineen valmiit alustavasti
     - `get` `post` `put` `delete` -metodit valmiit ryhmittymille mukaanlukien järjestelmät, järjestelmien planeetat ja mahdolliset poikkeamat
 - Teknologioiden, teknologiatyyppien, alusten ym... mallit, suhteet ja controllerit luotu

TODO:
 - `post` `put` `delete` -reitit kirjautumis-middlewaren taakse
 - Teknologioiden, teknologiatyyppien, alusten ym... tietojen syöttö ja jatkokehitys
 
