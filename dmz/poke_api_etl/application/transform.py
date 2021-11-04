import json

class TransformPokemonData():

    def __init__(self):
        pass

    def construct_dataframe(self):
        """Make DataFrame out of data received from Pokemon API."""
        pass
    @staticmethod
    def dict_to_json_string(self, pokemon_dict):
        """Convert dict to JSON to string."""
        pokemon_json_string = json.dumps(pokemon_dict)
        pokemon_json = json.loads(pokemon_json_string)
        return pokemon_json

    def make_pokemon_body_with_stats(self, pokemon):
        """Create a JSON body for pokemon stats"""
        pokeDictStats = {}
        pokeType = pokemon['types']
        pokeStats = pokemon['stats']
        pokeDictStats['types'] = pokeType
        pokeDictStats['stats'] = pokeStats
        return pokeDictStats

    def make_pokemon_move_body():
        pass
    
    def make_pokemon_item_body():
        pass
