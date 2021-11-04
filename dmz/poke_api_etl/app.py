#!/usr/bin/env python
import sys, json
from application.pokemonfetch import FetchPokemonData
from application.transform import TransformPokemonData

def main(argv):
    strArg = str(argv[1])
    if (strArg == 'All'):
        # Initialize 
        pokeDic = {}
        fetchPokemonData = FetchPokemonData()
        transformPokemonData = TransformPokemonData()
        # Fetch Poke API Data
        pokemonOfGenerationEigtht = fetchPokemonData.get_total_number_of_pokemon_generation(8)
        pokemons = pokemonOfGenerationEigtht['pokemon_species']
        # Transform Poke API Data
        for pokemon in pokemons:
            name = pokemon['name']
            pokemonGetStats = fetchPokemonData.get_pokemon_stats(name)
            pokemonDicStats = transformPokemonData.make_pokemon_body_with_stats(pokemonGetStats)
            pokeDic[name] = pokemonDicStats
        pokeJson = json.dumps(pokeDic)        
        return pokeJson

    elif (strArg == 'move'):
        return 0
    elif (strArg == 'item'):
        return 0
    else:
        return -1

if __name__ == "__main__":
   main(sys.argv[1:])