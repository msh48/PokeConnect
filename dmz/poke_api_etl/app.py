#!/usr/bin/env python
from application.pokemonfetch import FetchPokemonData
import sys

def main(argv):
    strArg = str(argv[1])
    if (strArg == 'All'):
        fetchPokemonData = FetchPokemonData()
        pokemonOfGenerationEigtht = fetchPokemonData.get_total_number_of_pokemon_generation(8)
        pokemons = pokemonOfGenerationEigtht['pokemon_species']
        # Get other data
        
        return pokemons
    elif (strArg == 'move'):
        0
    else:
        0

if __name__ == "__main__":
   main(sys.argv[1:])