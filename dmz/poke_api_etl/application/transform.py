import json

class TransformPokemonData():

    def __init__(self):
        pass

    def construct_dataframe(self):
        """Make DataFrame out of data received from Pokemon API."""
        pass

    def make_pokemon_body_with_stats(self, pokemon):
        """Create a JSON body for pokemon stats"""
        er = 'error'
        if er in pokemon.keys():
            return pokemon
        pokeDictStats = {}
        pokeType = pokemon['types']
        pokeStats = pokemon['stats']
        pokeImg = pokemon['sprites']['front_default']
        pokeDictStats['types'] = pokeType
        pokeDictStats['stats'] = pokeStats
        pokeDictStats['image'] = pokeImg
        return pokeDictStats

    def make_pokemon_move_body():
        pass
    
    def make_pokemon_item_body():
        pass
